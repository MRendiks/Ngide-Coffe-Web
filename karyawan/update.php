<?php
session_start();
require_once '../helper/connection.php';

$kd_user = $_POST['kd_user'];
$nama_user = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];

$FOLDER = '../assets/img/gambar_upload/';

#FOTO
$gambar         = $_FILES['gambar']['tmp_name'];
$nama_gambar    = $_FILES['gambar']['name'];
move_uploaded_file($gambar,$FOLDER.$nama_gambar);


$query = mysqli_query($connection, "UPDATE table_user SET nama_user = '$nama_user', username = '$username', password = '$password', foto_user='$nama_gambar' WHERE kd_user = '$kd_user'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
}
