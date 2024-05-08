<?php
session_start();
require "koneksi.php";

$NIM = $_POST['nim'];
$Password = $_POST["password"];

//query to db
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$NIM' ");

$row = mysqli_fetch_assoc($result);

if (password_verify ($Password, $row['password'])) {
    $_SESSION['login'] = true;
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['foto'] = $row['foto'];
    $_SESSION['hakakses'] = 'mahasiswa';
    header("Location: index.php");
}else {
    echo "
    <script> 
    alert('Username atau Password salah');
    document.location.href='login.php';
    </script>
    ";
}