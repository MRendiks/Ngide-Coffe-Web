<?php
session_start();
require_once '../helper/connection.php';

$kd_barang = $_POST['kd_barang'];
$nama_barang = $_POST['nama_barang'];
$kd_merek = $_POST['kd_merek'];
$kd_distributor = $_POST['kd_distributor'];
$harga_barang = $_POST['harga_barang'];
$stok_barang = $_POST['stok_barang'];
$keterangan = $_POST['keterangan'];

$FOLDER = '../assets/img/gambar_upload/';

#FOTO
$gambar         = $_FILES['gambar']['tmp_name'];
$nama_gambar    = $_FILES['gambar']['name'];
move_uploaded_file($gambar,$FOLDER.$nama_gambar);


$query = mysqli_query($connection, "UPDATE table_barang SET nama_barang = '$nama_barang', kd_merek = '$kd_merek', kd_distributor = '$kd_distributor',harga_barang = '$harga_barang', stok_barang = '$stok_barang', gambar='$nama_gambar' , keterangan = '$keterangan'WHERE kd_barang = '$kd_barang'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil Mengubah data'
  ];
  header('Location: ./index.php');
} elseif ($kd_merek == "") {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => 'Silahkan Pilih Merek'
  ];
  header('Location: ./index.php');
}elseif ($kd_distributor == "") {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => 'Silahkan Pilih Distributor'
  ];
  header('Location: ./index.php');
}
else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
