<?php 
if(isset($_GET['id_kategori'])){
    // dapetin data
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

    // sql to delete a record
    $sql = "SELECT id_kategori, nama_kategori FROM Kategori WHERE id_kategori=".$_GET['id_kategori'];
    $result = mysqli_query($conn, $sql);
    $arrKategori = array();
    // die(var_dump($result));
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $arrKategori['id_kategori'] = $row['id_kategori'];
            $arrKategori['nama_kategori'] = $row['nama_kategori'];
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
}
?>


<html>
    <head>
        <title>Tabel Kategori</title>
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
            <script type="text/javascript" src="assets/jquery-3.3.1.slim.min.js"></script>
            <script type="text/javascript" src="assets/bootstrap.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="alert alert-secondary" role="alert">
                <h3><center>Tabel Kategori</center></h3>
            </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <form action="update_kategori.php" method="post">
                                <div class="form-group">
                                <label>Id Kategori</label>
                                <input type="number" class="form-control" name="id_kategori" readonly="readonly" value=<?php echo $arrKategori['id_kategori'];?>>
                                </div>
                                    <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <input type="text" class="form-control" name="nama_kategori" value="<?php echo $arrKategori['nama_kategori']; ?>" >
                                    </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>