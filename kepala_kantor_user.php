<?php 
	include('function/koneksi.php');
?>
  
<html>
<head>
	<title>Kepala Kantor</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
	<img src="gambar/logo.png" class="logo">
	<br>
	<h3 style="color: white;">Ruangan | Kepala Kantor</h3>
	<br>
	<a href = "unduh_excel_kepala_kantor.php" class="btn btn-success"><img src="Gambar/file-excel.png"> Unduh Excel</a>
	
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
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = "SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.kode_bagian FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) WHERE iv.kode_bagian='1' ORDER BY pr.kode_perangkat ASC";
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
	    	</tr>
	    	<?php endwhile; ?>
	    </table>

	  </div>
	</div>
<!-- Akhir form tampil data -->

<br>
<br>
<footer class="bg-primary text-center bg-light text-lg-start">
  <div class="text-center p-3">
    <?php
    	$tgl = mysqli_query($koneksi,"SELECT tanggal_pengecekan FROM inventaris WHERE kode_bagian = 1 ORDER BY tanggal_pengecekan DESC LIMIT 1");
    	if (!$tgl){
    		die(mysqli_error($koneksi));
    	}

    	if (mysqli_num_rows($tgl) > 0){
    		while($data = mysqli_fetch_assoc($tgl)){
    			$tanggal = date("d-m-Y",strtotime($data['tanggal_pengecekan']));
    			echo "<b>Terakhir diubah pada tanggal " .$tanggal;
    		}
    	}
    ?>
  </div>
</footer>

</body>
</html>