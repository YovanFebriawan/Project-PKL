<?php
include('function/koneksi.php');
$output ='';
$data = mysqli_query($koneksi, "SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.kode_bagian, iv.tanggal_pengecekan FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) WHERE iv.kode_bagian='9' ORDER BY pr.kode_perangkat ASC");
	if (mysqli_num_rows($data) > 0) {
		$output .= '
			<h3 align="center">Laporan Inventaris Perangkat Pengolahan</h3>

			<table class="table" border="1">
				<tr>
					<th>No</th>
					<th>Kode Perangkat</th>
			    	<th>Nama Perangkat</th>
			    	<th>Merk</th>
			    	<th>Tahun Perolehan</th>
			    	<th>Spesifikasi Perangkat</th>
			    	<th>Status</th>
			    	<th>Keterangan</th>
			    	<th>Terakhir Diubah</th>
				</tr>
		';
		$no = 1;
		foreach ($data as $row){
			$output .= '
				<tr>
					<td>'.$no.'</td>
					<td>'.$row["kode_perangkat"].'</td>
					<td>'.$row["nama_perangkat"].'</td>
					<td>'.$row["merk_perangkat"].'</td>
					<td>'.$row["tahun_perangkat"].'</td>
					<td>'.$row["spesifikasi_perangkat"].'</td>
					<td>'.$row["status_perangkat"].'</td>
					<td>'.$row["keterangan_perangkat"].'</td>
					<td>'.$row["tanggal_pengecekan"].'</td>
				</tr>
			';
			$no++;
		}
		$output .= '</table>';
		header("Content-Type: application/xls");
		header("Content-Disposition:attachment; filename=Laporan Inventaris Perangkat Ruangan Pengolahan.xls");
		echo $output;
	}
?>