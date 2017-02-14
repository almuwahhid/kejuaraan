<?php include 'koneksi.php'; ?>
<?php
session_start();
if(isset($_SESSION['tag'])){
	header("Location: index.php");
} ?>
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
		<div class="row">
		    <div class="col-xs-4 col-xs-offset-4 marg80-top">
					<header class="w-100">
						<div class="tabs w-100 bg-header bayang2">
				      <a href="#" class="tab tabopen col-xs-6">PESERTA</a>
				      <a href="#" class="tab col-xs-6">PANITIA</a>
				    </div>
					</header>
					<section class="w-100 body-login bg-body bayang">
							<div class="col-md-12 pad10-top-bot">
									<h3 class="tengah-text">LOGIN</h3>
									<form class="" action="login.php" method="POST">
										<input type="hidden" id="tag" name="tag" value="PESERTA">
										<div class="col-xs-offset-1">
											<div class="col-xs-12 marg20-top">
												<div class="w-12 same-width">
													<i style="font-size:25px" class="fa fa-user" aria-hidden="true"></i>
												</div>
												<div class="w-75">
													<input type="text" placeholder="Username" class="pad5 w-100 no-border" style="height:30px" name="username" value="">
												</div>
											</div>
											<div class="col-xs-12 marg20-top">
												<div class="w-12 same-width">
													<i style="font-size:25px" class="fa fa-key" aria-hidden="true"></i>
												</div>
												<div class="w-75">
													<input type="password" placeholder="Password" class="pad5 w-100 no-border" style="height:30px" name="password" value="">
												</div>
											</div>
									</div>
									<center><input type="submit" class="no-outline btn btn-primary btn-lg marg20-top" name="" value="MASUK"></center>
									<div class="tengah-text w100 marg20-top" id="daftar-disini">
											 Belum memiliki akun ? daftar <a class="merah-text" href="pendaftaran.php">disini</a>
									</div>
								</form>
							</div>
					</section>
					<footer>

					</footer>
				</div>
		</div>
	</body>
</html>

<?php
	if(isset($_POST["tag"])){
		$tag = $_POST["tag"];
		$username = $_POST["username"];
		$password = md5($_POST["password"]);
		if($tag=="PESERTA"){
			$sql = mysqli_query($h, "SELECT * FROM dojang WHERE username LIKE '".$username."' AND password LIKE '".$password."'");
			$jml = mysqli_num_rows($sql);
			if($jml != 0){
				$data = mysqli_fetch_assoc($sql);
				$_SESSION['username'] = $data['username'];
				$_SESSION['tag'] = "PESERTA";
				$_SESSION['id'] = $data['id_dojang'];
				header("Location: index.php");
			}else {
				echo "<script type='text/javascript'>alert('Username / Password Salah')</script>";
			}
		}else if($tag=="PANITIA"){
			$sql = mysqli_query($h, "SELECT * FROM panitia WHERE username LIKE '".$username."' AND password LIKE '".$password."'");
			$jml = mysqli_num_rows($sql);
			if($jml != 0){
				$data = mysqli_fetch_assoc($sql);
				$_SESSION['username'] = $data['username'];
				$_SESSION['tag'] = "PANITIA";
				$_SESSION['id'] = $data['id_panitia'];
				header("Location: index.php");
			}else {
				echo "<script type='text/javascript'>alert('Username / Password Salah')</script>";
			}

		}
	}
?>
