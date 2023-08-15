<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.php">
        <img src="../assets/img/.jpg" alt="logo" width="30">
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.php">ES</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li><a class="nav-link" href="../"><i class="fas fa-home"></i> <span>Home</span></a></li>
      <?php 
      if ($_SESSION['is'] == "Admin") {
        ?>
      
      <li class="menu-header">Data Karyawan</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Karyawan</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="../karyawan/index.php">Data</a></li>
          <li><a class="nav-link" href="../karyawan/create.php">Tambah Data</a></li>
        </ul>
      </li>
    <?php
    }
    ?>
      <li class="menu-header">Data Barang</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Barang</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="../barang/index.php">List</a></li>
          <li><a class="nav-link" href="../barang/create.php">Tambah Data</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Distributor</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="../distributor/index.php">List</a></li>
          <li><a class="nav-link" href="../distributor/create.php">Tambah Data</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Merek</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="../merek/index.php">List</a></li>
          <li><a class="nav-link" href="../merek/create.php">Tambah Data</a></li>
        </ul>
      </li>
    </ul>
  </aside>
</div>