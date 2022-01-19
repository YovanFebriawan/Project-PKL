<?php
    session_start();
    if(!isset($_SESSION['status_login'])){
    header("login.php");
    exit;
    }

    include_once("function/koneksi.php");
    include_once("function/helper.php");

    $page = isset($_GET['page']) ? $_GET['page'] : false;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <title>Sistem Inventaris Kantor Pos</title>
        <link rel="shortcut icon" href="gambar/icon.png" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" >
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="assets/datatables/css/dataTables.bootstrap4.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <script type="text/javascript" src="Chart.js"></script>
    </head>
    <body class="sb-nav-fixed" style="background-color: rgba(255, 128, 16, 1);">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="text-white navbar-brand ps-3" href="">Sistem Inventaris POS</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 " id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!--<div class="input-group">
                    <<input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>-->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class=" nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo BASE_URL."index_user.php?page=profil_user"; ?>">Akun Saya</a></li>
                        <li><a class="dropdown-item" href="<?php echo BASE_URL."index_user.php?page=logout"; ?>">Keluar</a></li>
                    </ul>
                </li>
                
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="<?php echo BASE_URL."index_user.php?page=dashboard_user"; ?>">
                                <div class="sb-nav-link-icon"></div>
                                <img src="gambar/homis.png" style="width: 26px; height: 26px; margin-right: 23px; ">Beranda
                            </a>
                            <a class="nav-link collapsed" href="<?php echo BASE_URL;?>" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"></div>
                                <img src="gambar/bagiano.png" style="width: 24px; height: 24px; margin-right: 25px;">Bagian 
                                <div class="sb-sidenav-collapse-arrow"></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class=" bg-dark sb-sidenav-menu-nested nav">
                                    <a class=" nav-link" href="<?php echo BASE_URL."index_user.php?page=kepala_kantor_user"; ?>">Kepala Kantor</a>
                                    <a class="nav-link" href="<?php echo BASE_URL."index_user.php?page=sdm_user"; ?>">SDM</a>
                                    <a class="nav-link" href="<?php echo BASE_URL."index_user.php?page=it_user"; ?>">IT</a>
                                    <a class="nav-link" href="<?php echo BASE_URL."index_user.php?page=pelayanan_user"; ?>">Pelayanan</a>
                                    <a class="nav-link" href="<?php echo BASE_URL."index_user.php?page=customer_service_user"; ?>">Customer Service</a>
                                    <a class="nav-link" href="<?php echo BASE_URL."index_user.php?page=penjualan_user"; ?>">Penjualan</a>
                                    <a class="nav-link" href="<?php echo BASE_URL."index_user.php?page=akuntansi_user"; ?>">Akuntansi</a>
                                    <a class="nav-link" href="<?php echo BASE_URL."index_user.php?page=slpk_user"; ?>">SLPK</a>
                                    <a class="nav-link" href="<?php echo BASE_URL."index_user.php?page=pengolahan_user"; ?>">Pengolahan</a>
                                    <a class="nav-link" href="<?php echo BASE_URL."index_user.php?page=sarana_user"; ?>">Sarana</a>
                                    <a class="nav-link" href="<?php echo BASE_URL."index_user.php?page=logistik_user"; ?>">Logistik</a>
                                    <a class="nav-link" href="<?php echo BASE_URL."index_user.php?page=kurir_user"; ?>">Kurir</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="<?php echo BASE_URL."index_user.php?page=logout"; ?>">
                                <div class="sb-nav-link-icon"></div>
                                <img src="gambar/keluar.png" style="width: 24px; height: 24px; margin-right: 25px;">Keluar 
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"> Copyright &copy; 2021 SI UPN "Veteran" Jatim</div>
                        
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <?php
                            $filename = "$page.php";
                            
                            if(file_exists($filename)){
                                include_once($filename);
                            }else{
                                include_once("dashboard_user.php");
                            }
                        ?>
                    </div> 
                </main>
                <br><br>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>