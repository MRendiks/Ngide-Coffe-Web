<?php
session_start();
require_once '../helper/connection.php';

$kd_distributor = $_POST['kd_distributor'];
$nama_distributor = $_POST['nama_distributor'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];


$query = mysqli_query($connection, "UPDATE table_distributor SET nama_distributor = '$nama_distributor', alamat='$alamat', no_telp='$no_telp' WHERE kd_distributor = '$kd_distributor'");
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
