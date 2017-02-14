<?php
include "function/function.php";
if(isset($_GET['id'])&isset($_GET['bayar'])){
	$id_kejuaraan_dojang = $_GET['id'];
	$id_bayar = $_GET['bayar'];
	$query_kejuaraan_dojang = mysqli_query($h, "SELECT * from kejuaraan_dojang  WHERE id_kejuaraan_dojang = '$id_kejuaraan_dojang'");
	$data_kejuaraan_dojang = mysqli_fetch_assoc($query_kejuaraan_dojang);
	$id_dojang = $data_kejuaraan_dojang["id_dojang"];

	if(empty($data_kejuaraan_dojang)){
		header("Location:index.php?p=konfirmasi");
	}
}else {
	header("Location:index.php?p=konfirmasi");
}
$id_panitia = $_SESSION['id'];
?>
		<main>
			<section id="new-kejuaraan" class="col-md-12 pad10-top-bot">
				<h4 class=" margin-20-left alert alert-success col-xs-2 tag">Detail Pembayaran</h4>
				<div class="container">
					<?php include "include/panitia/konfirmasi-pembayaran.php";  ?>
					<?php include "include/panitia/konfirmasi-pelatih.php";  ?>
					<?php include "include/panitia/konfirmasi-atlet.php";  ?>
				</div
			</section>
		</main>
<?php
	if(isset($_POST["id_atlet"])){
		$id_update = $_POST["id_atlet"];
		$query_update = mysqli_query($h, "UPDATE atlet SET status_atlet='1' WHERE id_atlet='$id_update'");
		if($query_update){
			echo "berhasil";
		}else{
			echo "gagal";
		}
	}
?>
