<?php
include("function/koneksi.php");
    // Mengecek apakah form berhasil ditambah dan memasukkan data ke database.
    if(isset($_POST['submit'])) {
        $nama_pengguna = $_POST['nama_pengguna'];
        $kata_sandi = $_POST['kata_sandi'];
        $konfirmasikata_sandi = $_POST['konfirmasikata_sandi'];
        $status_pengguna= $_POST['status_pengguna'];
        $bagian= $_POST['bagian'];

    $query = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE nama_pengguna='$nama_pengguna'");
        
        if(mysqli_num_rows($query) == 1){
            echo "
                <script>
                    alert('Maaf, nama pengguna telah digunakan, silahkan ulangi kembali');
                    document.location.href = 'daftar.php' ;
                </script>
            ";
        }else{
            if (strlen($kata_sandi) < 5 ) {
                echo "<script>alert('Password Harus 5 Karakter Atau Lebih')</script>";
            }else{
                if ($kata_sandi != $konfirmasikata_sandi) {
                    echo"<script>alert('Kata Sandi dan Konfirmasi tidak sama')</script>";
                }
                else{
                    $daftar = mysqli_query($koneksi, "INSERT INTO pengguna SET nama_pengguna='$nama_pengguna', kata_sandi='$kata_sandi', status_pengguna='$status_pengguna', bagian='$bagian'");
                echo "
                    <script>
                        alert('Berhasil Mendaftar');
                        document.location.href = 'login.php' ;
                    </script>
                ";
                }
            }
        }   
    }    
            
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Daftar</title>
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="shortcut icon" href="gambar/icon.png" />
</head>
<body>
    <main class="container">
        <div align="center">
    <img class="logo" src="gambar/pos.png" style="">    
    </div>
        <h4 align="center">Sistem Informasi Inventaris Barang Elektronik</h4><br>
        <form action="" method="post">
            <div class="input-field">
                <input type="text" name="nama_pengguna" id="nama_pengguna"
                    placeholder="Nama Pengguna" required="">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="text" name="bagian" id="bagian" placeholder="Bagian" required="">
                <div class="underline"></div>
            </div>
            <br>
            <div class="input-field">
                <input type="password" name="kata_sandi" id="kata_sandi"
                    placeholder="Kata Sandi" required="">
                <div class="underline"></div>
            </div>
            <br>
            <div class="input-field">
                <input type="password" name="konfirmasikata_sandi" id="konfirmasikata_sandi"
                    placeholder="Konfirmasi" required="">
                <div class="underline"></div>
            </div>
            <br>
            <div>
                <input type= "hidden" name="status_pengguna" value="pengguna"> 
            </div> 
            <input type="submit" name="submit" value="Daftar">
            <br>
            <h5 align="center">Punya Akun? <a href="login.php">Login</a></h5> 
            <br>
        </form>
    </main>
</body>
</html>