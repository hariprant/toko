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

// die (var_dump($_POST['alamat']));
$sql = "UPDATE kategori SET id_kategori ='".$_POST['id_kategori']."', nama_kategori = '".$_POST['nama_kategori']."' WHERE id_kategori='".$_POST['id_kategori']."'";

if (mysqli_query($conn, $sql)) {
    header('Location:create_kategori.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




mysqli_close($conn);

?>