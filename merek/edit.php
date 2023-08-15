<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$kd_merek = $_GET['kd_merek'];
$query = mysqli_query($connection, "SELECT * FROM table_merek WHERE kd_merek='$kd_merek'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Merek</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="./update.php" method="post" enctype="multipart/form-data">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <table cellpadding="8" class="w-100">
              <input type="hidden" name="kd_merek" value="<?= $row['kd_merek'] ?>">
                <tr>
                  <td>Nama Merek</td>
                  <td><input class="form-control" type="text" name="merek" required value="<?= $row['merek'] ?>"></td>
                </tr>
                <tr>
                  <td>Foto Merek</td>
                  <td><input class="form-control" id="inputFile" type="file" name="gambar" accept="image/*" required></td>
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