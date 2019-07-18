<?php
if(isset($_GET['id_merk'])){
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
    $sql = "SELECT id_merk,nama_merk FROM merk WHERE id_merk=".$_GET['id_merk'];
    $result = mysqli_query($conn, $sql);
    $arrSiswa = array();
    // die(var_dump($result));
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $arrSiswa['id_merk'] = $row['id_merk'];
            $arrSiswa['nama_merk'] = $row['nama_merk'];
           
        }
    } else {
        echo "0 results";
    }
    mysqli_close($conn);
}
?>
<html>
    <head>
        <title>Tabel Edit Merk</title>
        <link rel="stylesheet" href="assets/bootstrap.css">
        <script type="text/javascript" src="assets/jquery-3.3.1.slim.min.js"></script>
        <script src="assets/bootstrap.js"></script>
        <style rel="stylesheet">
            .container {
                padding-top : 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2 class="text-center">Edit Tabel Merk</h2>
            <br>
            <form action="update_merk.php" method="post">
                <input type="hidden" name="id_merk_ori" value="<?php echo $_GET['id_merk'] ?>">
                <div class="form-group">
                    <label>ID MERK</label>
                    <input class="form-control" value="<?php echo $arrSiswa['id_merk']; ?>" type="number" name="id_merk" readonly="readonly" placeholder="ID MERK">
                </div>
                <div class="form-group">
                    <label>NAMA MERK</label>
                    <input class="form-control" value="<?php echo $arrSiswa['nama_merk']; ?>" type="text" name="nama_merk" placeholder="NAMA MERK">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>

                </form>
        </div>
    
</body>
</html>