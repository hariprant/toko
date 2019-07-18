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

    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $warna = $_POST['warna_produk'];
    $jumlah = $_POST['jumlah_produk'];
    $id_merk = $_POST['merk_produk'];
    $id_kategori = $_POST['kategori_produk'];

    $sql = "UPDATE produk SET id_produk='$id_produk', nama_produk='$nama_produk', warna='$warna', jumlah='$jumlah', id_merk='$id_merk', id_kategori='$id_kategori' WHERE id_produk=$id_produk";

    if ($conn->query($sql) === TRUE) {
        header("Location: produk.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>