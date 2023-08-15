<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$kd_user = $_GET['kd_user'];
$query = mysqli_query($connection, "SELECT * FROM table_user WHERE kd_user='$kd_user'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Karyawan</h1>
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
              <input type="hidden" name="kd_user" value="<?= $row['kd_user'] ?>">
                <tr>
                  <td>Nama Karyawan</td>
                  <td><input class="form-control" type="text" name="nama_user" required value="<?= $row['nama_user'] ?>"></td>
                </tr>
                <tr>
                  <td>Username</td>
                  <td><input class="form-control" type="text" name="username" required value="<?= $row['username'] ?>"></td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td><input class="form-control" type="text" name="password" required value="<?= $row['password'] ?>"></td>
                </tr>
                <tr>
                  <td>Foto</td>
                  <td><img src="../assets/img/gambar_upload/<?= $row['foto_user'] ?>" alt="Foto" width="150px"></td>
                  
                </tr>
                <tr>
                  <td></td>
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