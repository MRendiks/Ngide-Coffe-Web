<?php
session_start();
require_once '../helper/connection.php';

$kd_barang = $_GET['kd_barang'];

$result = mysqli_query($connection, "DELETE FROM table_barang WHERE kd_barang='$kd_barang'");

if (mysqli_affected_rows($connection) > 0) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menghapus data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
