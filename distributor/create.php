<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$pre = "DS";
$field = "kd_distributor";

$sqlc   = "SELECT COUNT($field) as jumlah FROM table_distributor";
$querys = mysqli_query($connection,$sqlc);
$number = mysqli_fetch_assoc($querys);
if($number['jumlah'] > 0){
    $sql    = "SELECT MAX($field) as kode FROM table_distributor";
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
    <h1>Tambah Distributor</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./store.php" method="POST">
            <table cellpadding="8" class="w-100">
            <tr>
                <td>Kode Distributor </td>
                <td><input class="form-control" type="text" name="kd_distributor" disabled value="<?= $kode ?>"></td>
              </tr>
              <tr>
                <td>Nama Distributor</td>
                <td><input class="form-control" type="text" name="nama_distributor" required></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><input class="form-control" type="text" name="alamat" required></td>
              </tr>
              <tr>
                <td>No HP</td>
                <td><input class="form-control" type="text" name="no_telp" required></td>
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