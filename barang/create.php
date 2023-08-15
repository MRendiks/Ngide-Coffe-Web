<?php
require_once '../layout/_top.php';
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

?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Barang</h1>
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
                <td>Kode Barang</td>
                <td><input class="form-control" type="text" name="kd_barang" disabled value="<?= $kode ?>"></td>
              </tr>
              <tr>
                <td>Nama Barang</td>
                <td><input class="form-control" type="text" name="nama_barang" required></td>
              </tr>
              <tr>
                <td>Jenis Merek</td>
                <td>
                  <select name="kd_merek" class="form-control" style="color: black; ">
                  <option value="">Pilih Merek</option>
                  <?php
                    $data_merek = mysqli_query($connection, "SELECT kd_merek,merek FROM table_merek");
                    if (mysqli_num_rows($data_merek) > 0) {
                      foreach ($data_merek as $data) {
                          ?>
                              <option value="<?= $data['kd_merek'];?>"><?= $data['merek']; ?></option>
                          <?php
                      }
                    ?>
                  </select>
                  <?php }?>
                    </td>
              </tr>
              <tr>
                <td>Distributor</td>
                <td><select name="kd_distributor" class="form-control" style="color: black;">
                  <option value="">Pilih Distributor</option>
                  <?php
                    $data_merek = mysqli_query($connection, "SELECT kd_distributor,nama_distributor FROM table_distributor");
                    if (mysqli_num_rows($data_merek) > 0) {
                      foreach ($data_merek as $data) {
                          ?>
                          
                              <option value="<?= $data['kd_distributor'];?>"> <?= $data['nama_distributor']; ?></option>
                          <?php
                      }

                    ?>
                  </select>
                  <?php }?>
                  </td>
              </tr>
              <tr>
                <td>Harga Barang</td>
                <td><input class="form-control" type="number" name="harga_barang" required></td>
              </tr>
              <tr>
                <td>Stok Barang</td>
                <td><input class="form-control" type="number" name="stok_barang" required></td>
              </tr>
              <tr>
                <td>Foto</td>
                <td><input class="form-control" id="inputFile" type="file" name="gambar" accept="image/*" required></td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td><input class="form-control" type="text" name="keterangan" required></td>
              </tr>
                <td>
                  <input class="btn btn-success" type="submit" name="proses" value="Simpan">
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
<!-- Page Specific JS File -->
<?php
if (isset($_SESSION['info'])) :
  if ($_SESSION['info']['status'] == 'success') {
?>
    <script>
      iziToast.success({
        title: 'Sukses',
        message: `<?= $_SESSION['info']['message'] ?>`,
        position: 'topCenter',
        timeout: 5000
      });
    </script>
  <?php
  } else {
  ?>
    <script>
      iziToast.error({
        title: 'Gagal',
        message: `<?= $_SESSION['info']['message'] ?>`,
        timeout: 5000,
        position: 'topCenter'
      });
    </script>
<?php
  }

  unset($_SESSION['info']);
  $_SESSION['info'] = null;
endif;
?>