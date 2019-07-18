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
    // sql to delete a record
    $sql = "DELETE FROM produk WHERE id_produk = '$id_produk'";

    if ($conn->query($sql) === TRUE) {
        header("Location: produk.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
?>