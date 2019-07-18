<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="assets/bootstrap.css">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toko";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_GET['id_produk'])){
    $id_produk = $_GET['id_produk'];
}
$sql = "SELECT id_produk,nama_produk,warna,jumlah,id_merk,id_kategori FROM produk WHERE id_produk='$id_produk'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {?>

        <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 mt-5 mb-3">    
                <h1 class="h4 text-gray-900 mb-3 text-center">Edit Data Karyawan</h1>
                <hr>
                <form action="update_produk.php" method="post">
                    <div class="form-group row">
                        <label for="id_produk" class="col-sm-3 col-form-label">ID Produk</label>
                        <div class="col-sm-7">
                        <input type="text" readonly="readonly" class="form-control" id="id_produk" name="id_produk" placeholder="ID" value="<?php echo $row['id_produk']?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_produk" class="col-sm-3 col-form-label">Nama Produk</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama" value="<?php echo $row['nama_produk']?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="warna_produk" class="col-sm-3 col-form-label">Warna Produk</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="warna_produk" name="warna_produk" placeholder="Warna" value="<?php echo $row['warna']?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah_produk" class="col-sm-3 col-form-label">Jumlah Produk</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="jumlah_produk" name="jumlah_produk" placeholder="Jumlah" value="<?php echo $row['jumlah']?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="merk_produk" class="col-sm-3 col-form-label">Merk Produk</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="merk_produk" name="merk_produk" placeholder="Merk" value="<?php echo $row['id_merk']?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kategori_produk" class="col-sm-3 col-form-label">Kategori Produk</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="kategori_produk" name="kategori_produk" placeholder="Kategori" value="<?php echo $row['id_kategori']?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    <?php
        }
    }
    ?>
    
</body>
</html>