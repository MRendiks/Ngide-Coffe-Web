<?php
require_once '../helper/connection.php';

function IndonesiaTgl($tanggal){
	$tgl=substr($tanggal,8,2);
	$bln=substr($tanggal,5,2);
	$thn=substr($tanggal,0,4);
	$tanggal="$tgl-$bln-$thn";
	return $tanggal;
}

$tgl = date('Y-m-d');
$sql = "SELECT * FROM detailbarang";
$query = mysqli_query($connection,$sql);

$pagedesc = "Laporan Data Barang - Periode " . IndonesiaTgl($tgl);
$pagetitle = str_replace(" ", "_", $pagedesc)
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo $pagetitle ?></title>

	<link href="libs/images/logo.jpg" rel="icon" type="images/x-icon">


	<!-- Bootstrap Core CSS -->
	<link href="../libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<!-- <link href="dist/css/offline-font.css" rel="stylesheet"> -->
	<link href="../assets/css/custom-report.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<!-- <link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
	
	<!-- jQuery -->
	<script src="../libs/jquery/dist/jquery.min.js"></script>

</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td class="text-left" width="20%">
							<img src="libs/images/logo.jpg" alt="logo-dkm" width="70" />
						</td>
						<td class="text-center" width="60%">
						<b>Ngide Coffe</b> <br>
						<td class="text-right" width="20%">
							<img src="libs/images/logo.jpg" alt="logo-dkm" width="130" height="70"/>
						</td>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>

	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center">LAPORAN DATA Barang</h4>
			<h5 class="text-center">Periode <?php echo IndonesiaTgl($tgl) ?></h5>
			<br />
			<table class="table table-bordered table-keuangan">
				<thead>
					<tr>
						<th>Kode Barang</th>
						<th>Nama Barang</th>
						<th>Merek Barang</th>
						<th>Distributor</th>
						<th>Tanggal Masuk</th>
						<th>Harga</th>
						<th>Stok</th>
						<th>Gambar</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$i=1;
						while($data = mysqli_fetch_array($query)) {
							echo '<tr>';
							echo '<td class="text-center">'. $data['kd_barang'] .'</td>';
							echo '<td>'. $data['nama_barang'] .'</td>';
							echo '<td>'. $data['merek'] .'</td>';
							echo '<td>'. $data['nama_distributor'] .'</td>';
							echo '<td>'. $data['tanggal_masuk'] .'</td>';
							echo '<td>'. $data['harga_barang'] .'</td>';
							echo '<td>'. $data['stok_barang'] .'</td>';
							echo '<td><img src="../assets/img/gambar_upload/'. $data['stok_barang'] .'" alt="Foto" width="150px"></td>';
						
							echo '</tr>';
						} 
					?>
				</tbody>
			</table>
			<br />
		</div><!-- /.container -->
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>

<!-- Bootstrap Core JavaScript -->
<script src="../libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="../libs/jTerbilang/jTerbilang.js"></script>

</body>
</html>