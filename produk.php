<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="assets/bootstrap.css">
</head>
<body>

<div class="container">
<h1 class="text-gray-900 mb-3 text-center">Data Produk Toko</h1>
<hr>
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahProduk">Tambah Produk</button>
<a type="button" class="btn btn-success mb-3" href="merk.php" role="button">Tambah Merk</a>
<a type="button" class="btn btn-secondary mb-3" href="create_kategori.php" role="button">Tambah Kategori</a>
    <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
        <th scope="col">ID Produk</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Warna</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Merk</th>
        <th scope="col">Kategori</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
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
    $sql = "SELECT * FROM produk INNER JOIN merk ON merk.id_merk = produk.id_merk INNER JOIN kategori ON kategori.id_kategori = produk.id_kategori";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {?>
            <tr>
                <td><?php echo $row['id_produk']?></td>
                <td><?php echo $row['nama_produk']?></td>
                <td><?php echo $row['warna']?></td>
                <td><?php echo $row['jumlah']?></td>
                <td><?php echo $row['nama_merk']?></td>
                <td><?php echo $row['nama_kategori']?></td>
                <td><a class="btn btn-warning mr-2 btn-sm" href="edit_produk.php?id_produk=<?php echo $row['id_produk']?>" role="button">Edit</a>
                <a class="btn btn-danger mr-2 btn-sm" href="delete_produk.php?id_produk=<?php echo $row['id_produk']?>"  role="button">Hapus</a>
                </td>
            </tr>
            <?php
            }
        }else {
            echo "0 results";
        }
        ;?>
    </tbody>
</table>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="tambahProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Input Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <form action="create_produk.php" method="post">
            <div class="form-group row">
                <label for="nama_produk" class="col-sm-3 col-form-label">Nama Produk</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="warna_produk" class="col-sm-3 col-form-label">Warna Produk</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" id="warna_produk" name="warna_produk" placeholder="Warna" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="jumlah_produk" class="col-sm-3 col-form-label">Jumlah Produk</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" id="jumlah_produk" name="jumlah_produk" placeholder="Jumlah" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="merk_produk" class="col-sm-3 col-form-label">Merk Produk</label>
                <div class="col-sm-7">
                <select class="custom-select">
                <option selected>Pilih Merk</option>
                    <?php    
                    $result = mysqli_query($conn,"SELECT * FROM merk");
                    if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {?>
                        <option value="<?php echo $row['id_merk']?>"><?php echo $row['nama_merk']?></option>
                            <?php
                        }
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="kategori_produk" class="col-sm-3 col-form-label">Kategori Produk</label>
                <div class="col-sm-7">
                    <select class="custom-select">
                    <option selected>Pilih Merk</option>
                    <?php    
                    $result = mysqli_query($conn,"SELECT * FROM kategori");
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_array($result)) {?>
                        <option value="<?php echo $row['id_kategori']?>"><?php echo $row['nama_kategori']?></option>
                    <?php
                    }
                }
                mysqli_close($conn)?>
                </select>
                </div>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Komfirmasi Hapus -->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script src="assets/jquery-3.3.1.slim.min.js"></script>
<script src="assets/bootstrap.js"></script>
</body>
</html>
