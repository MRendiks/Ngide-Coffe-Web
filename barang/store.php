<?php
session_start();
require_once '../helper/connection.php';

$pre = "BR";
$field = "kd_barang";

$sqlc   = "SELECT COUNT($field) as jumlah FROM table_barang";
$querys = mysqli_query($connection,$sqlc);
$number = mysqli_fetch_assoc($querys);
if($number['jumlah'] > 0){
    $sql    = "SELECT MAX($field) as kode FROM table_barang";
    $query  = mysqli_query($connection,$sql);
    $number = mysqli_fetch_assoc($query);
    $strnum = substr($number['kode'], 2,3);
    $strnum = $strnum + 1;
    if(strlen($strnum) == 3){ 
        $kode = $pre.$strnum;
    }else if(strlen($strnum) == 2){ 
        $kode = $pre."0".$strnum;
    }else if(strlen($strnum) == 1){ 
        $kode = $pre."00".$strnum;
    }
}else{
    $kode = $pre."001";
}



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

$query = mysqli_query($connection, "INSERT INTO table_barang values('$kode','$nama_barang', '$kd_merek', '$kd_distributor', CURDATE(), '$harga_barang', '$stok_barang','$nama_gambar', '$keterangan')");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
} elseif ($kd_merek == "") {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => 'Silahkan Pilih Merek'
  ];
  header('Location: ./create.php');
}elseif ($kd_distributor == "") {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => 'Silahkan Pilih Distributor'
  ];
  header('Location: ./create.php');
}
else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./create.php');
}
