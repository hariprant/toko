<?php

// ini untuk nambah data ke database
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

$sql = "INSERT INTO kategori (id_kategori, nama_kategori)
VALUES ('".$_POST['id_kategori']."', '".$_POST['nama_kategori']."')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
  
header("location: create_kategori.php");
?>