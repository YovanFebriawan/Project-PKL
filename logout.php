<?php 
// mengaktifkan session
 
// menghapus semua session
session_destroy();
echo "<script>alert('Anda Berhasil Keluar');document.location='login.php';</script>";
 
// mengalihkan halaman sambil mengirim pesan logout
// header("location:login.php?pesan=logout");
?>