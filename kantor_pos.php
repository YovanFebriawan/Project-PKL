<?php 
	include('function/koneksi.php');
?>
  
<html>
<head>
	<title>Daftar Perangkat Pos Jemur Andayani</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
	<img src="gambar/logo.png" class="logo">
	<br>
	<h3 style="color: white;">Daftar Perangkat Pos Jemur Andayani</h3>
	<br>
	<a href = "unduh_excel_kantorpos.php" class="btn btn-success"><img src="Gambar/file-excel.png"> Unduh Excel</a>

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
		    	<th>Terakhir diubah</th>	
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = "SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.tanggal_pengecekan FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) ORDER BY pr.kode_perangkat ASC";
	    		$hasil = mysqli_query($koneksi, $tampil);
	    		while($data = mysqli_fetch_array($hasil)) :
	    		$tahun = date("d-m-Y",strtotime($data['tahun_perangkat']));
	    		$tgl = date("d-m-Y",strtotime($data['tanggal_pengecekan']));

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
	    		<td><?=$tgl?></td>
	    		<?php $i = $no;?>
	    	</tr>
	    	<?php endwhile; ?>
	    </table>

	  </div>
	</div>
<!-- Akhir form tampil data -->

</div>

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