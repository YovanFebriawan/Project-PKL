<?php  
include_once("function/koneksi.php");
    
?>
<html>
<head>
	<title>Profil</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<img src="gambar/logo.png" class="logo">
	<br>
	<h3 style="color: white;">Akun Saya</h3>
	<br>
<div class="container">
	<!-- -->
	<div class="card mt-2" style="width: 25rem;" align="center">
	  <div class="card-header bg-warning text-white">
	  	<div class="logo">
			<img src="gambar/user.png">
		</div>
	    Pengguna
	  </div>
	  <div class="card-body">
	    <table>
		<?php    
        $query = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE nama_pengguna='$_SESSION[nama_pengguna]'");
		$data = mysqli_fetch_array($query);
		
?>
	    	<tr>
	    		<td><b><label>Nama Pengguna</label></b></td>
	    		<td></td>
	    		<td><input type="text" name="nama_pengguna" value="<?=$data['nama_pengguna']?>" style="width:150;"></td>
	    	</tr>
	    	<tr>
	    		<td><b><label>Kata Sandi</label></b></td>
	    		<td></td>
	    		<td><input type="password" name="kata_sandi" value="<?=$data['kata_sandi']?>" style="width:150;"></td>
	    	</tr>
	    	<tr>
	    		<td><b><label>Bagian</label></b></td>
	    		<td></td>
	    		<td><input type="text" name="bagian" value="<?=$data['bagian']?>" style="width:150;"></td>
	    	</tr>	
	   		<tr>
	   			<td></td>
	   			<td></td>
	   			<td align="left"> <br>
	    			<a class="btn btn-warning text-white" name="tombolUbah" id="tombolUbah" href="<?php echo BASE_URL."index.php?page=editprofil_user"; ?>">
	    				<img src="Gambar/ubah.png"> Ubah</a><br><br>
	    		</td> 		
	    	</tr>
	    		
	    	
	    	
	    </table>

	  </div>
	</div>
</div>
<!-- Akhir form tampil data -->

</body>
</html>