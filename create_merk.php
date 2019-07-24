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

$sql = "INSERT INTO merk (id_merk, nama_merk)
VALUES (' ', '".$_POST['nama_merk']."')";

if (mysqli_query($conn, $sql)) {
    header("location:merk.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>