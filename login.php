<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="shortcut icon" href="gambar/icon.png" />
</head>
<body>

    <main class="container">
        <div align="center">
    <img class="logo" src="gambar/pos.png" style="">    
    </div>
        <h4 align="center">Sistem Informasi Inventaris Barang Elektronik</h4><br>
        <form action="ceklogin.php" method="post">
            <div class="input-field">
                <input type="text" name="nama_pengguna" id="nama_pengguna"
                    placeholder="Masukkan Nama Pengguna" required="">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="kata_sandi" id="kata_sandi"
                    placeholder="Masukkan Kata Sandi" required="">
                <div class="underline"></div>
            </div>

            <input type="submit" name="submit" value="Masuk">
            <br>
            <h5 align="center">Pengguna baru? <a href="daftar.php">Daftar</a></h5> 
            <br>
            <?php  
                if(isset($_GET['pesan'])){
                    if($_GET['pesan']=="gagal"){
                    echo "<p style='color: red;'><b>Nama Pengguna Atau Kata Sandi Tidak Sesuai</p>";
                }
            }
            ?>
        </form>
    </main>
</body>
</html>

