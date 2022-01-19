<?php
include 'function/koneksi.php';

//tampilkan Jumlah Perangkat
$perangkat1 = mysqli_query($koneksi,"SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.kode_bagian FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) WHERE iv.kode_bagian='1' ORDER BY pr.kode_perangkat ASC");
$count_perangkat1 = mysqli_num_rows($perangkat1);

$perangkat2 = mysqli_query($koneksi,"SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.kode_bagian FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) WHERE iv.kode_bagian='2' ORDER BY pr.kode_perangkat ASC");
$count_perangkat2 = mysqli_num_rows($perangkat2);

$perangkat3 = mysqli_query($koneksi,"SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.kode_bagian FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) WHERE iv.kode_bagian='3' ORDER BY pr.kode_perangkat ASC");
$count_perangkat3 = mysqli_num_rows($perangkat3);

$perangkat4 = mysqli_query($koneksi,"SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.kode_bagian FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) WHERE iv.kode_bagian='4' ORDER BY pr.kode_perangkat ASC");
$count_perangkat4 = mysqli_num_rows($perangkat4);

$perangkat5 = mysqli_query($koneksi,"SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.kode_bagian FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) WHERE iv.kode_bagian='5' ORDER BY pr.kode_perangkat ASC");
$count_perangkat5 = mysqli_num_rows($perangkat5);

$perangkat6 = mysqli_query($koneksi,"SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.kode_bagian FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) WHERE iv.kode_bagian='6' ORDER BY pr.kode_perangkat ASC");
$count_perangkat6 = mysqli_num_rows($perangkat6);

$perangkat7 = mysqli_query($koneksi,"SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.kode_bagian FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) WHERE iv.kode_bagian='7' ORDER BY pr.kode_perangkat ASC");
$count_perangkat7 = mysqli_num_rows($perangkat7);

$perangkat8 = mysqli_query($koneksi,"SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.kode_bagian FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) WHERE iv.kode_bagian='8' ORDER BY pr.kode_perangkat ASC");
$count_perangkat8 = mysqli_num_rows($perangkat8);

$perangkat9 = mysqli_query($koneksi,"SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.kode_bagian FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) WHERE iv.kode_bagian='9' ORDER BY pr.kode_perangkat ASC");
$count_perangkat9 = mysqli_num_rows($perangkat9);

$perangkat10 = mysqli_query($koneksi,"SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.kode_bagian FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) WHERE iv.kode_bagian='10' ORDER BY pr.kode_perangkat ASC");
$count_perangkat10 = mysqli_num_rows($perangkat10);

$perangkat11 = mysqli_query($koneksi,"SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.kode_bagian FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) WHERE iv.kode_bagian='11' ORDER BY pr.kode_perangkat ASC");
$count_perangkat11 = mysqli_num_rows($perangkat11);

$perangkat12 = mysqli_query($koneksi,"SELECT pr.kode_perangkat, pr.nama_perangkat, pr.merk_perangkat, pr.tahun_perangkat, pr.spesifikasi_perangkat, pr.status_perangkat, pr.keterangan_perangkat, iv.kode_bagian FROM inventaris iv LEFT OUTER JOIN perangkat pr ON (iv.kode_perangkat = pr.kode_perangkat) WHERE iv.kode_bagian='12' ORDER BY pr.kode_perangkat ASC");
$count_perangkat12 = mysqli_num_rows($perangkat12);

 $count_total = $count_perangkat1 + $count_perangkat2 + $count_perangkat3 + $count_perangkat4 + $count_perangkat5 + $count_perangkat6 + $count_perangkat7 + $count_perangkat8 + $count_perangkat9 + $count_perangkat10 + $count_perangkat11 + $count_perangkat12;

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body style="background-color: orange;">
    <div>
    <img src="gambar/logo.png" style="width: 100px; height: 100px;">   
    </div>
    <h3 class="text-white">Beranda</h3>
    <div class="row mt-4">
        <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white o-hidden h-100" style="background-color:rgba(113, 124, 255, 1); ">
            <div class="card-body">
                <div class="card-body-icon">
                <i class="fas fa-globe"></i>   
                </div>
                <div class="mr-5">
                    <h2>Kantor Pos</h2>
                    <h5><?php echo $count_total ?>&nbsp;Perangkat</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1"
                href="<?php echo BASE_URL."index_user.php?page=kantor_pos_user"; ?>">
                <span class="float-left" >Lihat Detail</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <hr>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white o-hidden h-100" style="background-color:rgba(219, 55, 55, 1); ">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-user-tie"></i>
                </div>
                <div class="mr-5">
                    <h2>Kepala Kantor</h2>
                    <h5><?php echo $count_perangkat1 ?>&nbsp;Perangkat</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1"
                href="<?php echo BASE_URL."index_user.php?page=kepala_kantor_user"; ?>">
                <span class="float-left" >Lihat Detail</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white o-hidden h-100" style="background-color:rgba(219, 55, 55, 1); ">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="mr-5">
                    <h2>SDM</h2>
                    <h5><?php echo $count_perangkat2 ?>&nbsp;Perangkat</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1"
                href="<?php echo BASE_URL."index_user.php?page=sdm_user"; ?>">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white o-hidden h-100" style="background-color:rgba(219, 55, 55, 1); ">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-desktop"></i>
                </div>
                <div class="mr-5">
                    <h2>IT</h2>
                    <h5><?php echo $count_perangkat3 ?>&nbsp;Perangkat</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1"
                href="<?php echo BASE_URL."index_user.php?page=it_user"; ?>">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <hr>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white o-hidden h-100" style="background-color:rgba(227, 191, 0, 1); ">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-user-cog"></i> 
                </div>
                <div class="mr-5">
                    <h2>Pelayanan</h2>
                    <h5><?php echo $count_perangkat4 ?>&nbsp;Perangkat</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1"
                href="<?php echo BASE_URL."index_user.php?page=pelayanan_user"; ?>">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white o-hidden h-100" style="background-color:rgba(227, 191, 0, 1); ">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="far fa-question-circle"></i>
                </div>
                <div class="mr-5">
                    <h2>Customer Service</h2>
                    <h5><?php echo $count_perangkat5 ?>&nbsp;Perangkat</h5>
                    
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1"
                href="<?php echo BASE_URL."index_user.php?page=customer_service_user"; ?>">
                <span class="float-left" >View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white o-hidden h-100" style="background-color:rgba(227, 191, 0, 1); ">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="mr-5">
                    <h2>Penjualan</h2>
                    <h5><?php echo $count_perangkat6 ?>&nbsp;Perangkat</h5>
                    
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1"
                href="<?php echo BASE_URL."index_user.php?page=penjualan_user"; ?>">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <hr>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white o-hidden h-100" style="background-color:rgba(52, 174, 101, 1); ">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="mr-5">
                    <h2>Akuntansi</h2>
                    <h5><?php echo $count_perangkat7 ?>&nbsp;Perangkat</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1"
                href="<?php echo BASE_URL."index_user.php?page=akuntansi_user"; ?>">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white o-hidden h-100" style="background-color:rgba(52, 174, 101, 1); ">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="mr-5">
                    <h2>SLPK</h2>
                    <h5><?php echo $count_perangkat8 ?>&nbsp;Perangkat</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1"
                href="<?php echo BASE_URL."index_user.php?page=slpk_user"; ?>">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white o-hidden h-100" style="background-color:rgba(52, 174, 101, 1); ">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-recycle"></i>
                </div>
                <div class="mr-5">
                    <h2>Pengolahan</h2>
                    <h5><?php echo $count_perangkat9 ?>&nbsp;Perangkat</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1"
                href="<?php echo BASE_URL."index_user.php?page=pengolahan_user"; ?>">
                <span class="float-left" >Lihat Detail</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <hr>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white o-hidden h-100" style="background-color:rgba(112, 181, 231, 1); ">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="mr-5">
                    <h2>Sarana</h2>
                    <h5><?php echo $count_perangkat10 ?>&nbsp;Perangkat</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1"
                href="<?php echo BASE_URL."index_user.php?page=sarana_user"; ?>">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white o-hidden h-100" style="background-color:rgba(112, 181, 231, 1); ">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-truck-moving"></i>
                </div>
                <div class="mr-5">
                    <h2>Logistik</h2>
                    <h5><?php echo $count_perangkat11 ?>&nbsp;Perangkat</h5>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1"
                href="<?php echo BASE_URL."index_user.php?page=logistik_user"; ?>">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white o-hidden h-100" style="background-color:rgba(112, 181, 231, 1); ">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-biking"></i>
                </div>
                <div class="mr-5">
                    <h2>Kurir</h2>
                    <h5><?php echo $count_perangkat12 ?>&nbsp;Perangkat</h5>
                    
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1"
                href="<?php echo BASE_URL."index_user.php?page=kurir_user"; ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <hr>
</div>
    
</div>
</div>

<style>
.card-body-icon{
    position: absolute;
    z-index: 0;
    top: 1px;
    right: 20px;
    opacity: 0.4;
    font-size: 80px;
}
</style>
</body>
</html>
