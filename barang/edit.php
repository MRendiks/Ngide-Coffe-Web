<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$kd_barang = $_GET['kd_barang'];
$query = mysqli_query($connection, "SELECT * FROM table_barang WHERE kd_barang='$kd_barang'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Barang</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post" enctype="multipart/form-data">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <table cellpadding="8" class="w-100">
              <input type="hidden" name="kd_barang" value="<?= $row['kd_barang'] ?>">
              <tr>
                <td>Nama Barang</td>
                <td><input class="form-control" type="text" name="nama_barang" required value="<?= $row['nama_barang'] ?>"></td>
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
                <td><input class="form-control" type="number" name="harga_barang" required value="<?= $row['harga_barang'] ?>"></td>
              </tr>
              <tr>
                <td>Stok Barang</td>
                <td><input class="form-control" type="number" name="stok_barang" required value="<?= $row['stok_barang'] ?>"></td>
              </tr>
              <tr>
                <td>Foto</td>
                <td><input class="form-control" id="inputFile" type="file" name="gambar" accept="image/*" required></td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td><input class="form-control" type="text" name="keterangan" required value="<?= $row['keterangan'] ?>"></td>
              </tr>
              <tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
                </tr>
              </table>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>