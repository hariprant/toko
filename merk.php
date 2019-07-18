<html>
    <head>
        <title>HALAMAN MERK</title>
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
            <h2 class="text-center">HALAMAN MERK TOKO</h2>
            <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Merk
            </button>
            <br><br>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="create_merk.php" method="post">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Merk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                <div class="form-group">
                    <label>NAMA MERK</label>
                    <input class="form-control" type="text" name="nama_merk" placeholder="NAMA MERK">
                </div>
              
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </div>
            </div>
            </form>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Id Merk</th>
                    <th>Nama Merk</th>
                    <th>Pilihan</th>
                </tr>
                <!-- datanya disini -->
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
                    $sql = "SELECT id_merk,nama_merk FROM merk";
                   
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) { ?>
                            <tr><td> <?php echo $row["id_merk"] ?> </td><td> <?php echo $row["nama_merk"]; ?> </td><td>
                            <a class="btn btn-danger btn-sm" href='edit_merk.php?id_merk=<?php echo $row["id_merk"]; ?>'>EDIT</a>
                            <a class="btn btn-warning btn-sm" href='delete_merk.php?id_merk=<?php echo $row["id_merk"]; ?>'>HAPUS</a></td></tr>
                        <?php }
                    } else { ?>
                        <tr><td colspan="5" class="text-center">Data tidak ditemukan</td></tr>
                    <?php }
                    mysqli_close($conn);
                    ?>
            </table>
        </div>
   
</body>
</html>