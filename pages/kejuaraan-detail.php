<script src="controller/kejuaraan-detail.js"></script>
<?php
	$peserta = false;
	if(!isset($_GET['id'])){
		header("Location: index.php");
	}else{
		$id_kejuaraan = $_GET['id'];
		$query_kejuaraan = mysqli_query($h, "SELECT * from kejuaraan  WHERE id_kejuaraan = '$id_kejuaraan'");
		$data_kejuaraan = mysqli_fetch_assoc($query_kejuaraan);

		if(isset($_SESSION['tag']) && $_SESSION['tag']=="PESERTA"){
			$id_dojang = $_SESSION['id'];
			$peserta = true;
			// TODO : mengecek sudah terdaftar kejuaraan belum
			$query_cek_available = mysqli_query($h, "SELECT * from kejuaraan_dojang WHERE id_dojang = '$id_dojang' AND id_kejuaraan = '$id_kejuaraan'");
			$cek_available = mysqli_num_rows($query_cek_available);
		}
	}
 ?>
<main>
	<aside id="form-peserta" class="w-100 form-2 form-peserta">
	</aside>
	<section id="new-kejuaraan" class="col-md-12 pad10-top-bot">
		<h4 class=" margin-20-left alert alert-success col-xs-2 tag">Detail Kejuaraan</h4>
		<div class="container">
			<?php
			include 'include/detail-kejuaraan/detail.php';
			if(cekHari($data_kejuaraan['tgl_tutup_daftar'])){
				if($peserta){
					if($cek_available==1){
						$kejuaraan_dojang = mysqli_fetch_assoc(mysqli_query($h, "SELECT * from kejuaraan_dojang WHERE id_dojang = '$id_dojang' AND id_kejuaraan = '$id_kejuaraan'"));
						$id_kejuaraan_dojang = $kejuaraan_dojang["id_kejuaraan_dojang"];
						include "include/detail-kejuaraan/form-pelatih.php";
						include "include/detail-kejuaraan/peserta-saya.php";
					}
				}
			}else{
				if($peserta){
					if($cek_available==1){
						include "include/detail-kejuaraan/peserta-saya.php";
					}
				}
				include "include/detail-kejuaraan/peserta.php";
			}
			?>
		</div>
	</section>
	</main>
