<?php 
	include('function/koneksi.php');

	// Tambah data
	if (isset($_POST['tsimpan'])) {
		// $id_perangkat			= $_POST['kode_perangkat'];
		$kode_perangkat 		= $_POST['kode_perangkat'];
		$nama_perangkat 		= $_POST['nama_perangkat'];
		$simpan = mysqli_query($koneksi, "INSERT INTO tbl_keterangan_kode_perangkat SET
											kode_perangkat 			= '$kode_perangkat',
											nama_perangkat 			= '$nama_perangkat' 
											");

		if ($simpan) {  
			echo "<script>
					alert('Data Berhasil Disimpan');
					document.location = 'index.php';
				  </script>";
		} else{
			// echo "<script>
			// 		alert('Data Gagal Disimpan');
			// 		document.location = 'index.php';
			// 	  </script>";
		var_dump($simpan);		  
		}
	}

	// Ubah data
	if (isset($_POST['tombolUbah'])) {
	 	$tampil = mysqli_query($koneksi, "SELECT * from perangkat WHERE kode_perangkat = '$_POST[kode_perangkat]'");
	 	$data = mysqli_fetch_array($tampil);
	 	if($data){
	 		$kode_perangkat 		= $data['kode_perangkat'];
	 		$nama_perangkat 		= $data['nama_perangkat'];
		}
	}

	// Simpan perubahan data
	if (isset($_POST['tubah'])) {
				$kode_perangkat 		= $_POST['kode_perangkat'];
			 	$nama_perangkat 		= $_POST['nama_perangkat'];
	
			 	$ubah = mysqli_query($koneksi,"UPDATE perangkat SET nama_perangkat ='$nama_perangkat'
			 																WHERE kode_perangkat ='$kode_perangkat'");
			 	
			 	if ($ubah) {
					echo "<script>
							alert('Data Berhasil Diubah');
							document.location = 'index.php';
						  </script>";
				} else{
					echo "<script>
							alert('Data Gagal Diubah');
							document.location = 'index.php';
						  </script>";
				}
			}
?>

<html>
<head>
	<title>Kepala Kantor</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<img src="gambar/logo.png" style="width: 100px;height: 100px;">
	<br>
	<h3 style="color: white;">Daftar Kode Perangkat</h3>
	<br>
	
<!-- Awal form tampil data -->
	<div class="card mt-3" style="width: 40rem;">
	  <div class="card-header bg-primary text-white">
	    Daftar Kode Perangkat
	  </div>
	  <div class="card-body">
	    <table class="table table-bordered table-striped">
	    	<tr align="center">
	    		<th width="1">No</th>
		    	<th width="1">Kode Perangkat</th>
		    	<th width="1">Nama Perangkat</th>
		    	<th width="125">Aksi</th>	
	    	</tr>
	    	<?php
	    		$no = 1; 
	    		$tampil = mysqli_query($koneksi, "SELECT nama_perangkat, kode_perangkat from perangkat");
	    		while($data = mysqli_fetch_array($tampil)) :
	    	?>
	    	<tr>
	    		<td><?=$no++?></td>
	    		<td><?=$data['kode_perangkat']?></td>
	    		<td><?=$data['nama_perangkat']?></td>
				<?php $i = $no;?>
	    		<td>
	    			<a class="btn btn-warning text-white" name="tombolUbah" id="tombolUbah" data-toggle="modal" data-target="#ubahModal"
	    				data-i				= "<?= $i; ?>"
	    				data-kode 			= "<?= $data['kode_perangkat']; ?>"
	    				data-nama			= "<?= $data['nama_perangkat']; ?>"
	    				><img src="Gambar/ubah.png"> Ubah</a><br><br>
	    		</td>
	    	</tr>
	    	<?php endwhile; ?>
	    </table>

	  </div>
	</div>
<!-- Akhir form tampil data -->

<!-- Awal modal tambah data -->
	<form method="post" action="">
	<div class="modal fade" id="tambahModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="tambahModalLabel">Form Tambah Data</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	<label for="kode_perangkat">Kode Perangkat</label>
	        	<input type="text" name="kode_perangkat" id="kode_perangkat" class="form-control" required>
	        </div>
	        <div class="form-group">
	        	<label for="nama_perangkat">Nama Perangkat</label>
	        	<input type="text" name="nama_perangkat" id="nama_perangkat" class="form-control" required>
	        </div>
	      </div>
	      <div class="modal-footer">
	      	<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	      	<button type="submit" class="btn btn-primary" name="tsimpan">Simpan</button>
	      </div>
	    </div>
	  </div>
	</div>
	</form>
<!-- Akhir modal tambah data -->

<!-- Awal modal ubah data -->
	<form method="post" action="">
	<div class="modal fade" id="ubahModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ubahModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="ubahModalLabel">Form Kode Perangkat</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<input type="hidden" name="i" id="i">
	        <div class="form-group">
	        	<label for="ubah_kode_perangkat">Kode Perangkat</label>
	        	<input type="text" name="kode_perangkat" id="ubah_kode_perangkat" class="form-control" readonly>
	        </div>
	        <div class="form-group">
	        	<label for="ubah_nama_perangkat">Nama Perangkat</label>
	        	<input type="text" name="nama_perangkat" id="ubah_nama_perangkat" class="form-control" required>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary" name="tubah" id="tubah">Simpan Perubahan</button>
	      </div>
	    </div>
	  </div>
	</div>
	</form>
<!-- Akhir modal ubah data -->
</div>

<script type="text/javascript" src="js/sweetalert.min.js"></script>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- Tampilkan nilai setiap kolom saat ubah data -->
<script>
	$(document).on("click", "#tombolUbah", function(){

		let i 			= $(this).data('i');
		let kode 		= $(this).data('kode');
		let nama 		= $(this).data('nama');
		
		$("#i").val(i);
		$(".modal-body #ubah_kode_perangkat").val(kode);
		$(".modal-body #ubah_nama_perangkat").val(nama);
	});
</script>
</body>
</html>