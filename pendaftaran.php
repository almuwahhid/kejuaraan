<?php
	if(isset($_SESSION["PESERTA"])||isset($_SESSION["PANITIA"])||isset($_SESSION["PENGDA"])){
		header("Location: index.php");
	}
 ?>

<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<title>Kejuaraan Tae Kwon Do</title>
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="controller/controller.js"></script>
		<script src="controller/pendaftaran.js"></script>
	</head>
	<body>
    <?php include "include/header/header_main.php"; ?>
		<section class="col-md-12 pad10-top-bot">
				<h4 class=" margin-20-left alert alert-success col-xs-2 tag">Pendaftaran</h4>
				<div class="container">
					<div class="col-md-12 alert alert-success">
						<!-- TODO : pendaftaran.php - mulai form -->
						<div class="col-xs-7">
							<form id="form-pendaftaran" class="" action="include/controller/pendaftaran.php" method="post">
								<aside class="w-100">
									<div class="col-xs-3 marg5-top">
										Nama Dojang
									</div>
									<div class="col-xs-6">
										<input name="nama_dojang" type="text" class="alert pad5 w-100 no-border h-30" value="">
									</div>
								</aside>
								<aside class="w-100">
									<div class="col-xs-3 pad5-top">
										Alamat
									</div>
									<div class="col-xs-6">
										<textarea name="alamat_dojang" class="alert pad5 no-border w-100" rows="4"></textarea>
									</div>
								</aside>
								<aside class="w-100">
									<div class="col-xs-3 marg5-top">
										Nomor Telepon
									</div>
									<div class="col-xs-6">
										<input name="telp_dojang" type="text" class="alert pad5 w-100 no-border h-30" value="">
									</div>
								</aside>
								<aside class="w-100">
									<div class="col-xs-3 pad5-top">
										Username
									</div>
									<div class="col-xs-6">
										<input name="username" type="text" class="alert pad5 w-100 no-border h-30" value="">
									</div>
								</aside>
								<aside class="w-100">
									<div class="col-xs-3 pad5-top">
										Password
									</div>
									<div class="col-xs-6">
										<input name="password" type="password" class="alert pad5 w-100 no-border" style="height:30px" value="">
									</div>
								</aside>
								<aside class="w-100">
									<div class="col-xs-3 pad5-top">
										Ulangi
									</div>
									<div class="col-xs-6">
										<input type="password" name="password_ulang" class="alert pad5 w-100 no-border h-30" value="">
									</div>
								</aside>
							</form>
							<div class="col-xs-12">
								<input id="btn-pendaftaran" type="button" class="btn btn-success col-xs-9 marg15-top pad10" name="asd" value="DAFTAR">
							</div>
						</div>
						<div id="bg-pendaftaran" class=" col-xs-5 bg-gambar" style="background-image: url('img/tendang.png');">
						</div>
					</div>
				</div>
			</section>
		<footer>

		</footer>
	</body>
</html>
