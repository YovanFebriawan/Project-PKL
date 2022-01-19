<?php
    session_start();
    include ("function/koneksi.php");
    $nama_pengguna = $_POST['nama_pengguna'];
    $kata_sandi = $_POST['kata_sandi'];
        $login = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE nama_pengguna='$nama_pengguna' AND kata_sandi='$kata_sandi'");
        $cek = mysqli_num_rows($login);
        if($cek > 0){
            $data = mysqli_fetch_assoc($login); 
            
            if($data['status_pengguna']=="admin"){
                $_SESSION['nama_pengguna'] = $nama_pengguna;
                $_SESSION['status_pengguna'] = "admin";
                $_SESSION['status_login'] = "login";
                header("location:index.php");
         
            
            }else if($data['status_pengguna']=="pengguna"){
                $_SESSION['nama_pengguna'] = $nama_pengguna;
                $_SESSION['status_pengguna'] = "pengguna";
                $_SESSION['status_login'] = "login";
                header("location:index_user.php");
         
            }else{
                header("location:login.php?pesan=gagal");
            }	
        }
        else{
            header("location:login.php?pesan=gagal");
        }
?>