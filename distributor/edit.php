<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$kd_distributor = $_GET['kd_distributor'];
$query = mysqli_query($connection, "SELECT * FROM table_distributor WHERE kd_distributor='$kd_distributor'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Distributor</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <table cellpadding="8" class="w-100">
              <input type="hidden" name="kd_distributor" value="<?= $row['kd_distributor'] ?>">
                <tr>
                  <td>Nama Distributor</td>
                  <td><input class="form-control" type="text" name="nama_distributor" required value="<?= $row['nama_distributor'] ?>"></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td><input class="form-control" type="text" name="alamat" required value="<?= $row['alamat'] ?>"></td>
                </tr>
                <tr>
                  <td>No Telephone</td>
                  <td><input class="form-control" type="text" name="no_telp" required value="<?= $row['no_telp'] ?>"></td>
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