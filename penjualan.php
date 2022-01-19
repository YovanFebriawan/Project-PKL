<?php 
	include('function/koneksi.php');

	// Tambah data
	if (isset($_POST['tsimpan'])) {
		// Tabel Perangkat
		$kode_perangkat 		= $_POST['kode_perangkat'];
		$nama_perangkat 		= $_POST['nama_perangkat'];
		$merk_perangkat 		= $_POST['merk_perangkat'];
		$tahun_perangkat 		= $_POST['tahun_perangkat'];
		$spesifikasi_perangkat 	= $_POST['spesifikasi_perangkat'];
		$status_perangkat 		= $_POST['status_perangkat'];
		$keterangan_perangkat 	= $_POST['keterangan_perangkat'];

		// Tabel Inventaris
		$hari_ini 				= date("Y-m-d");
		$kode_bagian 			= $_POST['kode_bagian'];
		$nama_pengguna			= $_POST['nama_pengguna'];
		$tanggal_pengecekan		= $hari_ini;

		$query = mysqli_query($koneksi, "SELECT * FROM inventaris WHERE kode_perangkat='$kode_perangkat'");
        
    if(mysqli_num_rows($query) == 0){
      
			$simpan_perangkat = mysqli_query($koneksi, "INSERT INTO perangkat SET
												kode_perangkat 			= '$kode_perangkat',
												nama_perangkat 			= '$nama_perangkat', 
												merk_perangkat 			= '$merk_perangkat', 
												tahun_perangkat 		= '$tahun_perangkat',
												spesifikasi_perangkat 	= '$spesifikasi_perangkat',
												status_perangkat		= '$status_perangkat',
												keterangan_perangkat 	= '$keterangan_perangkat'");
			$simpan_inventaris = mysqli_query($koneksi, "INSERT INTO inventaris SET
												kode_perangkat 			= '$kode_perangkat',
												kode_bagian				= '$kode_bagian',
												nama_pengguna 			= '$nama_pengguna',
												tanggal_pengecekan 		= '$tanggal_pengecekan'");
					
			if ($simpan_perangkat) {
				if($simpan_inventaris){
					echo "<script>
						alert('Data Berhasil Disimpan');
						
					  </script>";
				} else{
					echo "<script>
						alert('Data Gagal Disimpan');
						
					  </script>";
				}
			} else{
				echo "<script>
						alert('Data Gagal Disimpan');
						
					  </script>";
				}
    }
    else{
    	echo "<script>
						alert('Kode perangkat telah digunakan');		
					  </script>";
    }
	}

	// Ubah data
	if (isset($_POST['tombolUbah'])) {
	 	$tampil = mysqli_query($koneksi, "SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.kode_bagian FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) WHERE pr.kode_perangkat = '$_POST[kode_perangkat]'");

	 	$data = mysqli_fetch_array($tampil);
	 	if($data){
	 		// Tabel Perangkat
	 		$kode_perangkat 		= $data['kode_perangkat'];
	 		$nama_perangkat 		= $data['nama_perangkat'];
	 		$merk_perangkat 		= $data['merk_perangkat'];
	 		$tahun_perangkat 		= $data['tahun_perangkat'];
	 		$spesifikasi_perangkat 	= $data['spesifikasi_perangkat'];
	 		$status_perangkat 		= $data['status_perangkat'];
	 		$keterangan_perangkat 	= $data['keterangan_perangkat'];
	 		
			// Tabel Inventaris
			$hari_ini 				= date("Y-m-d");
			$kode_bagian 			= $_POST['kode_bagian'];
			$nama_pengguna			= $_POST['nama_pengguna'];
			$tanggal_pengecekan		= $hari_ini;
		}
	}

	// Simpan perubahan data
	if (isset($_POST['tubah'])) {
				// Tabel Perangkat
				$kode_perangkat 		= $_POST['kode_perangkat'];
			 	$nama_perangkat 		= $_POST['nama_perangkat'];
			 	$merk_perangkat 		= $_POST['merk_perangkat'];
			 	$tahun_perangkat		= $_POST['tahun_perangkat'];
			 	$spesifikasi_perangkat 	= $_POST['spesifikasi_perangkat'];
			 	$status_perangkat 		= $_POST['status_perangkat'];
			 	$keterangan_perangkat 	= $_POST['keterangan_perangkat'];

			 	// Tabel Inventaris
				$hari_ini 				= date("Y-m-d");
				$tanggal_pengecekan		= $hari_ini;
			 	
			 	$ubah_perangkat = mysqli_query($koneksi,"UPDATE perangkat SET nama_perangkat 			= '$nama_perangkat',
			 																  merk_perangkat 			= '$merk_perangkat',
			 																  tahun_perangkat  			= '$tahun_perangkat',
			 																  spesifikasi_perangkat 	= '$spesifikasi_perangkat',
			 																  status_perangkat 			= '$status_perangkat',
			 																  keterangan_perangkat 		= '$keterangan_perangkat'
			 																  WHERE kode_perangkat 		= '$kode_perangkat'");
			 	$ubah_inventaris = mysqli_query($koneksi,"UPDATE inventaris SET	tanggal_pengecekan 		= '$tanggal_pengecekan'
																				WHERE kode_perangkat 	= '$kode_perangkat'");
			 	
			 	if ($ubah_perangkat) {
			 		if ($ubah_inventaris){
			 				echo "<script>
								alert('Data Berhasil Diubah');
							
						  	</script>";
						} else{
							echo "<script>
								alert('Data Gagal Diubah');
							
						  </script>";
						}
					
				} else{
					echo "<script>
							alert('Data Gagal Diubah');
							
						  </script>";
				}
			}
?>
  
<html>
<head>
	<title>Penjualan</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
	<img src="gambar/logo.png" class="logo">
	<br>
	<h3 style="color: white;">Ruangan | Penjualan</h3>
	<br>
		<a href = "unduh_excel_penjualan.php" class="btn btn-success"><img src="Gambar/file-excel.png"> Unduh Excel</a>
		<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#tambahModal">+ Tambah Data</button>
<!-- Awal form tampil data -->
	<div class="card mt-3">
	  <div class="card-header bg-primary text-white">
	    Daftar Perangkat
	  </div>
	  <div class="card-body">
	    <table class="table table-bordered table-striped">
	    	<tr align="center">
	    		<th width="1">No</th>
		    	<th width="1">Kode Perangkat</th>
		    	<th width="1">Nama Perangkat</th>
		    	<th width="1">Merk</th>
		    	<th width="120">Tahun Perolehan</th>
		    	<th>Spesifikasi Perangkat</th>
		    	<th>Status</th>
		    	<th>Keterangan</th>
		    	<th width="125">Aksi</th>	
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = "SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.kode_bagian FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) WHERE iv.kode_bagian='6' ORDER BY pr.kode_perangkat ASC";
	    		$hasil = mysqli_query($koneksi, $tampil);
	    		while($data = mysqli_fetch_array($hasil)) :
	    			$tahun = date("d-m-Y",strtotime($data['tahun_perangkat']));
	    	?>
	    	<tr>
	    		<td><?=$no++?></td>
	    		<td><?=$data['kode_perangkat']?></td>
	    		<td><?=$data['nama_perangkat']?></td>
	    		<td><?=$data['merk_perangkat']?></td>
	    		<td><?=$tahun?></td>
	    		<td><?=$data['spesifikasi_perangkat']?></td>
	    		<td><?=$data['status_perangkat']?></td>
	    		<td><?=$data['keterangan_perangkat']?></td>
	    		<?php $i = $no;?>
	    		<td>
	    			<a class="btn btn-warning text-white" name="tombolUbah" id="tombolUbah" data-toggle="modal" data-target="#ubahModal"
	    				data-i				= "<?= $i; ?>"
	    				data-kode 			= "<?= $data['kode_perangkat']; ?>"
	    				data-nama			= "<?= $data['nama_perangkat']; ?>"
	    				data-merk			= "<?= $data['merk_perangkat']; ?>"
	    				data-tahun			= "<?= $data['tahun_perangkat']; ?>"
	    				data-spesifikasi	= "<?= $data['spesifikasi_perangkat']; ?>"
	    				data-status			= "<?= $data['status_perangkat']; ?>"
	    				data-keterangan		= "<?= $data['keterangan_perangkat']; ?>">
	    				<img src="Gambar/ubah.png"> Ubah</a><br><br>
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
	        <h5 class="modal-title" id="tambahModalLabel">Form Tambah Data Ruangan Penjualan</h5>
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
	        	<input type="hidden" name="kode_bagian" id="kode_bagian" value="6" class="form-control" required>
	        </div>
	        <div class="form-group">
	        	<label for="nama_pengguna">Nama Pengguna</label>
	        	<input type="text" name="nama_pengguna" id="nama_pengguna" class="form-control" required>
	        </div>
	        <div class="form-group">
	        	<label for="nama_perangkat">Nama Perangkat</label>
	        	<input type="text" name="nama_perangkat" id="nama_perangkat" class="form-control" required>
	        </div>
	        <div class="form-group">
	        	<label for="merk_perangkat">Merk</label>
	        	<input type="text" name="merk_perangkat" id="merk_perangkat" class="form-control" required>
	        </div>
	        <div class="form-group">
	        	<label for="tahun_perangkat">Tahun Perolehan</label>
	        	<input type="date" name="tahun_perangkat" id="tahun_perangkat" class="form-control" required autofocus> 
	        </div>
	        <div class="form-group">
	        	<label for="spesifikasi_perangkat">Spesifikasi Perangkat</label>
	        	<input type="text" name="spesifikasi_perangkat" id="spesifikasi_perangkat" class="form-control" required>
	        </div>
	        <div class="form-group">
	        	<label for="status_perangkat">Status</label>
	        	<input type="text" name="status_perangkat" id="status_perangkat" class="form-control" required>
	        </div>
	        <div class="form-group">
	        	<label for="keterangan_perangkat">Keterangan</label>
	        	<input type="text" name="keterangan_perangkat" id="keterangan_perangkat" class="form-control" required>
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
	        <h5 class="modal-title" id="ubahModalLabel">Form Ubah Data</h5>
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
	        <div class="form-group">
	        	<label for="ubah_merk_perangkat">Merk</label>
	        	<input type="text" name="merk_perangkat" id="ubah_merk_perangkat" class="form-control" required>
	        </div>
	        <div class="form-group">
	        	<label for="ubah_tahun_perangkat">Tahun Perolehan</label>
	        	<input type="date" name="tahun_perangkat" id="ubah_tahun_perangkat" class="form-control" required>
	        </div>
	        <div class="form-group">
	        	<label for="ubah_spesifikasi_perangkat">Spesifikasi Perangkat</label>
	        	<input type="text" name="spesifikasi_perangkat" id="ubah_spesifikasi_perangkat" class="form-control" required>
	        </div>
	        <div class="form-group">
	        	<label for="ubah_status_perangkat">Status</label>
	        	<input type="text" name="status_perangkat" id="ubah_status_perangkat" class="form-control" required>
	        </div>
	        <div class="form-group">
	        	<label for="ubah_keterangan_perangkat">Keterangan</label>
	        	<input type="text" name="keterangan_perangkat" id="ubah_keterangan_perangkat" class="form-control" required>
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
<br>
<br>

<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
 
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- Tampilkan nilai setiap kolom saat ubah data -->
<script>
	$(document).on("click", "#tombolUbah", function(){
		// let id 			= $(this).data('id');
		let i 			= $(this).data('i');
		let kode 		= $(this).data('kode');
		let nama 		= $(this).data('nama');
		let merk 		= $(this).data('merk');
		let tahun 		= $(this).data('tahun');
		let spesifikasi = $(this).data('spesifikasi');
		let status 		= $(this).data('status');
		let keterangan 	= $(this).data('keterangan');

		$("#i").val(i);
		$(".modal-body #ubah_kode_perangkat").val(kode);
		$(".modal-body #ubah_nama_perangkat").val(nama);
		$(".modal-body #ubah_merk_perangkat").val(merk);
		$(".modal-body #ubah_tahun_perangkat").val(tahun);
		$(".modal-body #ubah_spesifikasi_perangkat").val(spesifikasi);
		$(".modal-body #ubah_status_perangkat").val(status);
		$(".modal-body #ubah_keterangan_perangkat").val(keterangan);
	});
</script>
</body>
</html>