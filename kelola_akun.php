<?php  
include 'function/koneksi.php';

	if (isset($_GET['nama_pengguna'])) {
		$nama_pengguna = $_GET['nama_pengguna'];
		$hapus = mysqli_query($koneksi, "DELETE FROM pengguna WHERE nama_pengguna='$nama_pengguna'");
		
		if ($hapus) {
			echo "<script>
					alert('Data Berhasil Dihapus');
					document.location = 'index.php';
				  </script>";
		} else{
			echo "<script>
					alert('Data Gagal Dihapus');
					document.location = 'index.php';
				  </script>";
		}
	}


	// Ubah data
	if (isset($_POST['tombolUbah'])) {
	 	$tampil = mysqli_query($koneksi, "SELECT *FROM pengguna");

	 	$data = mysqli_fetch_array($tampil);
	 	if($data){
	 		// Tabel Perangkat
	 		$nama_pengguna 			= $data['nama_pengguna'];
	 		$bagian 				= $data['bagian'];
	 		$status_pengguna 		= $data['status_pengguna'];
	 		$kata_sandi 			= $data['kata_sandi'];
		}
	}

	// Simpan perubahan data
	if (isset($_POST['tubah'])) {
				// Tabel Pengguna
			$nama_pengguna 			= $_POST['nama_pengguna'];
	 		$bagian 				= $_POST['bagian'];
	 		$status_pengguna 		= $_POST['status_pengguna'];
	 		$kata_sandi 			= $_POST['kata_sandi'];

			 	$ubah = mysqli_query($koneksi,"UPDATE pengguna SET nama_pengguna = '$nama_pengguna',kata_sandi = '$kata_sandi',bagian='$bagian',status_pengguna='$status_pengguna' WHERE nama_pengguna = '$nama_pengguna'");
			
			 	if ($ubah) {
			 				echo "<script>
								alert('Berhasil Menjadi Admin');
							
						  	</script>";
				} 
				else{
					echo "<script>
							alert('Data Gagal Diubah inputan : $status_pengguna');
							
						  </script>";

				}
			}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>
		
	</title>
</head>
<body>
	<img src="gambar/logo.png" style="width: 100px;height: 100px;">
	<br>
	<h3 style="color: white;">Kelola Akun</h3>
	<br>

	<!-- tampil data -->

<div class="card mt-3">
	  <div class="card-header bg-primary text-white">
	    Daftar Pengguna
	  </div>
	  <div class="card-body">
	    <table class="table table-bordered table-striped">
	    	<tr align="center">
	    		<th>No</th>
		    	<th>Nama Pengguna</th>
		    	<th>Bagian</th>
		    	<th>Status</th>
		    	<th>Kata Sandi</th>
		    	<th>Aksi</th>	
	    	</tr>
	    	<?php
	    		$no = 1; 
	    		$tampil = mysqli_query($koneksi, "SELECT * from pengguna");
	    		while($data = mysqli_fetch_array($tampil)) :
	    			
	    	?>
	    	<tr>
	    		<td><?=$no++?></td>
	    		<td><?=$data['nama_pengguna']?></td>
	    		<td><?=$data['bagian']?></td>
	    		<td><?=$data['status_pengguna']?></td>
	    		<td><?=$data['kata_sandi']?></td>
	    		<?php $i = $no;?>
	    		<td>
	    			<a href="kelola_akun.php?nama_pengguna=<?=$data['nama_pengguna']?>" class="btn btn-danger text-white" name="tombolHapus" id="tombolHapus" onclick="return confirm('Apakah Anda yakin ingin menghapus akun dengan nama pengguna <?=$data['nama_pengguna'] ?>')"><img src="Gambar/hapus.png"> Hapus</a>
	    			<a class="btn btn-warning text-white" name="tombolUbah" id="tombolUbah" data-toggle="modal" data-target="#ubahModal"
	    				data-nama 			= "<?= $data['nama_pengguna']; ?>"
	    				data-bagian			= "<?= $data['bagian']; ?>"
	    				data-status			= "<?= $data['status_pengguna']; ?>"
	    				data-sandi			= "<?= $data['kata_sandi']; ?>"
	    				>
	    				<img src="Gambar/ubah.png"> Ubah</a><br><br>
	    		</td>
	    	</tr>
	    	<?php endwhile; ?>
	    </table>

	  </div>
	 </div>

	 <!-- ubah data -->

	 	<form method="post" action="">
	<div class="modal fade" id="ubahModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ubahModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="ubahModalLabel">Form Ubah Data</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      
	      <div class="modal-body">
	      	<div class="form-group">
	        	<label for="ubah_nama_pengguna">Nama Pengguna</label>
	        	<input type="text" name="nama_pengguna" id="ubah_nama_pengguna" class="form-control" readonly>
	        </div>
	        <div class="form-group">
	        	<label for="ubah_bagian">Bagian</label>
	        	<input type="text" name="bagian" id="ubah_bagian" class="form-control" readonly>
	        </div>
	        <div class="form-group">
	        	<label for="ubah_status_pengguna">Status Pengguna</label>
	        	<input type="text" name="status_pengguna" id="ubah_status_pengguna" class="form-control" required>
	        </div>
	        <div class="form-group">
	        	<label for="ubah_kata_sandi">Kata Sandi</label>
	        	<input type="text" name="kata_sandi" id="ubah_kata_sandi" class="form-control" readonly>
	        </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary" name="tubah" id="tubah">Simpan Perubahan</button>
	      </div>
	    </div>
	  </div>
	</div>
	</form>
<!--  -->

<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
 
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- Tampilkan nilai setiap kolom saat ubah data -->
<script>
	$(document).on("click", "#tombolUbah", function(){
		let nama 		= $(this).data('nama');
		let bagian 		= $(this).data('bagian');
		let status 		= $(this).data('status');
		let sandi 		= $(this).data('sandi');
		
		$(".modal-body #ubah_nama_pengguna").val(nama);
		$(".modal-body #ubah_bagian").val(bagian);
		$(".modal-body #ubah_status_pengguna").val(status);
		$(".modal-body #ubah_kata_sandi").val(sandi);
	});
</script>

</body>
</html>
