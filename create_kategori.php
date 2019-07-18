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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                              Tambah Data Kategori
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                       <form action="create_kategori2.php" method="post">
                                    <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <input type="text" class="form-control" name="nama_kategori" placeholder="Masukkan Nama Kategori">
                                    </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <br>
                            <br>
                         
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Id Kategori</th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col">Pilihan</th>
                            </tr>
                          </thead>
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

                                $sql = "SELECT id_kategori, nama_kategori FROM Kategori";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr><td>" . $row["id_kategori"]. "</td><td>" . $row["nama_kategori"]. "</td><td>" ."<a href='delete_kategori.php?id_kategori=".$row["id_kategori"]."'>hapus</a>"." | <a href='edit_kategori.php?id_kategori=".$row["id_kategori"]."'>Edit</a></td></tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }

                                mysqli_close($conn);
                                ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>