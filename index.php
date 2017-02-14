<?php include "koneksi.php" ?>
<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>Kejuaraan Tae Kwon Do</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="controller/controller.js"></script>
	</head>
	<body>
		<aside id="form-loading" class="w-100 form-2">
			<div class="col-xs-offset-4 marg80-top">
				<img style="width:400px; height:400px" src="img/loading.gif" alt="loading..." />
			</div>
		</aside>
		<aside id="form-konten" class="w-100 form-2 form-peserta">

		</aside>
		<?php
		session_start();
		if(isset($_SESSION["tag"]) && $_SESSION["tag"]=="PESERTA"){
			include "include/header/header_main.php";
			if(isset($_GET["p"])){
				switch ($_GET["p"]) {
					case 'mylist':
					include "/pages/dojang-mylist.php";
					break;
					case 'pembayaran':
					include "/pages/dojang-pembayaran.php";
					break;
					case 'profil':
					include "/pages/dojang-profil.php";
					break;
					case 'detail':
					include "/pages/kejuaraan-detail.php";
					break;
					default:
					header("Location: index.php");
					break;
				}
			}else{
				include "/pages/kejuaraan-index.php";
			}
		}else if (isset($_SESSION["tag"]) && $_SESSION["tag"]=="PANITIA") {
			include "include/header/header_panitia.php";
			if(isset($_GET["p"])){
				switch ($_GET["p"]) {
					case 'create':
					include "pages/panitia-kejuaraan.php";
					break;
					case 'konfirmasi':
					include "pages/panitia-konfirmasi.php";
					break;
					case 'detail-konfirmasi':
					include "pages/panitia-konfirmasi-detail.php";
					break;
					case 'profil':
					include "pages/panitia-profile.php";
					break;
					default:
					header("Location: index.php");
					break;
				}
			}else{
				include "pages/panitia-main.php";
			}
		}else if (isset($_SESSION["tag"]) && $_SESSION["tag"]=="PENGDA") {
			include "include/header/header_pengda.php";
			if(isset($_GET["p"])){
				switch ($_GET["p"]) {
					case 'create':
						include "pages/pengda-create.php";
					break;
					case 'detail':
						include "pages/kejuaraan-detail.php";
					break;
					case 'profil':
					include "pages/pengda-profile.php";
					break;
					case 'detail':
					include "pages/kejuaraan-detail.php";
					break;
					default:
					header("Location: index.php");
					break;
				}
			}else{
				include "pages/pengda-main.php";
			}
		}else {
			include "include/header/header_main.php";
			if(isset($_GET["p"])){
				switch ($_GET["p"]) {
					case 'detail':
						include "pages/kejuaraan-detail.php";
						break;
					default:
						header("Location: index.php");
						break;
				}
			}else{
				include "pages/kejuaraan-index.php";
			}
		}
		 ?>
		<footer>
			<?php include "include/footer.php"; ?>
		</footer>
		<?php
			mysqli_close($h);
		?>
	</body>
</html>
