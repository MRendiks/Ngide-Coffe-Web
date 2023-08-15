<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$barang = mysqli_query($connection, "SELECT COUNT(*) FROM table_barang");
$distributor = mysqli_query($connection, "SELECT COUNT(*) FROM table_distributor");
$merek = mysqli_query($connection, "SELECT COUNT(*) FROM table_merek");
$user = mysqli_query($connection, "SELECT COUNT(*) FROM table_user WHERE level='Karyawan'");


$total_barang = mysqli_fetch_array($barang)[0];
$total_distributor = mysqli_fetch_array($distributor)[0];
$total_merek = mysqli_fetch_array($merek)[0];
$total_user = mysqli_fetch_array($user)[0];
?>

<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="column">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Karyawan</h4>
            </div>
            <div class="card-body">
              <?= $total_user ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Barang</h4>
            </div>
            <div class="card-body">
              <?= $total_barang ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Distributor</h4>
              </div>
              <div class="card-body">
                <?= $total_distributor ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Merek</h4>
              </div>
              <div class="card-body">
                <?= $total_merek ?>
              </div>
            </div>
          </div>
        </div>
      
    </div>
      
    
  </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>