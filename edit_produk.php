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
$sql = "SELECT * FROM produk WHERE id_produk=$id_produk";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);
    ?>
        <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 mt-5 mb-3">    
                <h1 class="h4 text-gray-900 mb-3 text-center">Edit Data Produk</h1>
                <hr>
                <form action="update_produk.php" method="post">
                    <div class="form-group row">
                        <label for="id_produk" class="col-sm-3 col-form-label">ID Produk</label>
                        <div class="col-sm-7">
                        <input type="text" readonly="readonly" class="form-control" id="id_produk" name="id_produk" placeholder="ID" value="<?php echo $data['id_produk']?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_produk" class="col-sm-3 col-form-label">Nama Produk</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama" value="<?php echo $data['nama_produk']?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="warna_produk" class="col-sm-3 col-form-label">Warna Produk</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="warna_produk" name="warna_produk" placeholder="Warna" value="<?php echo $data['warna']?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah_produk" class="col-sm-3 col-form-label">Jumlah Produk</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="jumlah_produk" name="jumlah_produk" placeholder="Jumlah" value="<?php echo $data['jumlah']?>" required>
                        </div>
                    </div>
            <div class="form-group row">
                <label for="merk_produk" class="col-sm-3 col-form-label">Merk Produk</label>
                <div class="col-sm-7">
                <select class="custom-select" name="merk">
                    <?php    
                    $result = mysqli_query($conn,"SELECT * FROM merk");
                    if (mysqli_num_rows($result) > 0) {
                    while($data_merk = mysqli_fetch_array($result)) {
                    if($data['id_merk'] == $data_merk['id_merk']){
                        $select = "selected"; 
                    }else{
                        $select = "";
                    }
                    echo "<option $select value=".$data_merk['id_merk'].">".$data_merk['nama_merk']."</option>";
                        }
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="kategori_produk" class="col-sm-3 col-form-label">Kategori Produk</label>
                <div class="col-sm-7">
                    <select class="custom-select" name="kategori">
                    <?php    
                    $result = mysqli_query($conn,"SELECT * FROM kategori");
                    if (mysqli_num_rows($result) > 0) {
                    while($data_kategori = mysqli_fetch_array($result)) {
                    if($data['id_kategori'] == $data_kategori['id_kategori']){
                        $select = "selected"; 
                    }else{
                        $select = "";
                    }
                    echo "<option $select value=".$data_kategori['id_kategori'].">".$data_kategori['nama_kategori']."</option>";
                        }
                    }
                    ?>
                </select>
                </div>
            </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>

    
</body>
</html>