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
$sql = "DELETE FROM kategori WHERE id_kategori=".$_GET['id_kategori'];

if (mysqli_query($conn, $sql)) {
    header("location:create_kategori.php");
} else {
    echo '<script language="javascript">
        alert("Maaf Data tidak dapat dihapus !!")
        window.location.href = "create_kategori.php"
        </script>';
}

mysqli_close($conn);

?>