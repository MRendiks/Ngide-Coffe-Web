<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$pre = "ME";
$field = "kd_merek";

$sqlc   = "SELECT COUNT($field) as jumlah FROM table_merek";
$querys = mysqli_query($connection,$sqlc);
$number = mysqli_fetch_assoc($querys);
if($number['jumlah'] > 0){
    $sql    = "SELECT MAX($field) as kode FROM table_merek";
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

?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Merek</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./store.php" method="POST" enctype="multipart/form-data">
            <table cellpadding="8" class="w-100">
            <tr>
                <td>Kode Merek </td>
                <td><input class="form-control" type="text" name="kd_merek" disabled value="<?= $kode ?>"></td>
              </tr>
              <tr>
                <td>Nama Merek</td>
                <td><input class="form-control" type="text" name="merek" required></td>
              </tr>
              <tr>
                <td>Foto Merek</td>
                <td><input class="form-control" id="inputFile" type="file" name="gambar" accept="image/*" required></td>
              </tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                  <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>