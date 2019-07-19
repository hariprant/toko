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

// sql to delete a record
$sql = "DELETE FROM merk WHERE id_merk=".$_GET['id_merk'];

if (mysqli_query($conn, $sql)) {
    header("location:merk.php");
} else {
    echo '<script language="javascript">
    alert("Maaf Data tidak dapat dihapus !!")
    window.location.href = "merk.php"
    </script>';
}

mysqli_close($conn);
?>