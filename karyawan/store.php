<?php
session_start();
require_once '../helper/connection.php';

$pre = "US";
$field = "kd_user";

$sqlc   = "SELECT COUNT($field) as jumlah FROM table_user";
$querys = mysqli_query($connection,$sqlc);
$number = mysqli_fetch_assoc($querys);
if($number['jumlah'] > 0){
    $sql    = "SELECT MAX($field) as kode FROM table_user";
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



$nama_user = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];

$FOLDER = '../assets/img/gambar_upload/';

#FOTO
$gambar         = $_FILES['gambar']['tmp_name'];
$nama_gambar    = $_FILES['gambar']['name'];
move_uploaded_file($gambar,$FOLDER.$nama_gambar);


$query = mysqli_query($connection, "INSERT INTO table_user values('$kode','$nama_user', '$username', '$password', '$nama_gambar', 'Karyawan')");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
