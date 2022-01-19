<?php 
include ("function/koneksi.php");
	
	//proses jika tombol rubah di klik
	if (isset($_POST['submit'])){
		$nama_pengguna			= $_POST['nama_pengguna'];
		$kata_sandi				= $_POST['kata_sandi'];
		$konfirmasi_password 	= $_POST['konfirmasi_password'];
		$bagian					= $_POST['bagian'];
		
		if (strlen($kata_sandi) < 5) {
				echo "<script>alert('Password Harus 5 Karakter Atau Lebih');location.replace('index.php'); </script>";
		}
			else{
				if($_POST['kata_sandi']!=$konfirmasi_password) {
						echo "<script>alert('Password dan Konfirmasi Password Tidak Sama');location.replace('index.php');</script>";
				}
					else{
					$query = "UPDATE pengguna SET nama_pengguna='$nama_pengguna', kata_sandi='$kata_sandi', bagian='$bagian' WHERE nama_pengguna='$nama_pengguna'";
					 mysqli_query($koneksi, $query); 
					 if(mysqli_error($koneksi)) {
						echo "<script>alert('Data gagal di simpan!');</script>";
					 }else{
						echo "<script>alert('Nama Pengguna dan Kata Sandi Berhasil diubah Nama Pengguna : $nama_pengguna dengan Kata Sandi : $kata_sandi dan Bagian : $bagian ' );location.replace('index.php');</script>";
					 }	
					}
			}

		// if ($password_baru==$password_lama) {
		// 	echo "<script>alert('Password Baru Dengan Password Lama Harus Berbeda');location.replace('ubahakunpos.php');</script>";
		// }else{
			
		// }
				
    }
			
			
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kelola Akun Saya</title>
	<link rel="stylesheet" type="text/css" href="desain.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
<head>	

<body style="background: rgba(255, 128, 16, 1);">
	<img src="gambar/logo.png" class="logo"><br>
	<h3 class="text-white">Ubah Profil</h3><br>
<form method="post" action="">
	<div class="container">
	<!-- -->
	<div class="card mt-3" style="width: 25rem;" align="center">
	  <div class="card-header bg-primary text-white">
	  	<div class="logo">
			<img src="gambar/user.png">
		</div>
	    Admin
	  </div>
	  <div class="card-body">
	    <table>
	    	<tr>
	    		<td><b>Nama Pengguna Baru</b></td>
				<td> </td>
				<td><input type="text" name="nama_pengguna" required=""></td>
	    	</tr>
	    	<tr>
	    		<td><b>Password Baru</b></td>
				<td> </td>
				<td><input type="password" name="kata_sandi" required=""></td>
	    		
	    	</tr>
	    	<tr>
	    		<td><b>Konfirmasi Password</b></td>
				<td> </td>
				<td><input type="password" name="konfirmasi_password" required=""></td>
	    	</tr>
			<tr>
	    		<td><b>Bagian</b></td>
				<td> </td>
				<td><input type="text" name="bagian" required=""></td>
	    	</tr>
	   		<tr>
	   			<td></td>
				<td></td>
				<td><br><input class="btn btn-primary" type="submit" name="submit" value="Simpan"></td> 		
	    	</tr>

	    </table>

	  </div>
	</div>
</div>
</form>

		
	<!-- selesai form rubah password -->
</body>
</html>