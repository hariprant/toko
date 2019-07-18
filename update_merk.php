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
$sql = "UPDATE merk SET id_merk = '".$_POST['id_merk']."' , nama_merk = '".$_POST['nama_merk']."' WHERE id_merk='".$_POST['id_merk_ori']."'";
// die(var_dump($sql));
if (mysqli_query($conn, $sql)) {
    header('Location:index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
header("location:merk.php");
?>