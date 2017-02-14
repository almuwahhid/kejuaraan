	<script src="controller/pengda-create.js"></script>
		<main>
			<section id="new-kejuaraan" class="col-md-12 pad10-top-bot">
				<h4 class=" margin-20-left alert alert-success col-xs-2 tag">Buat Kejuaraan</h4>
				<div class="container">
					<div class="col-md-12 alert alert-success">
						<div class="col-xs-7">
							<form name="create" class="" action="index.php?p=create" method="POST">
								<aside class="w-100">
									<div class="col-xs-3 marg5-top">
										Nama Kejuaraan
									</div>
									<div class="col-xs-6">
										<input type="text" class="alert pad5 w-100 no-border h-30" name="nama_kejuaraan" value="">
									</div>
								</aside>
								<aside class="w-100">
									<div class="col-xs-3 marg5-top">
										Penyelenggara
									</div>
									<div class="col-xs-6">
										<input type="text" class="alert pad5 w-100 no-border h-30" name="penyelenggara" value="">
									</div>
								</aside>
								<aside class="w-100">
									<div class="col-xs-3 pad5-top">
										Alamat
									</div>
									<div class="col-xs-6">
										<textarea name="alamat" class="alert pad5 no-border w-100" rows="4"></textarea>
									</div>
								</aside>
								<div class="col-xs-12">
									<input type="button" class="btn btn-success col-xs-9 marg15-top pad10" name="asd" value="BUAT KEJUARAAN">
								</div>
							</form>
						</div>
						<div id="bg-pendaftaran" class=" col-xs-5 bg-gambar" style="background-image: url('img/tendang3.png');">
							<!-- TODO : pendaftaran.php - end of form -->
						</div>
					</div>
				</div
			</section>
		</main>

<?php
if(isset($_POST['nama_kejuaraan'])){
	$nama_kejuaraan = $_POST['nama_kejuaraan'];
	$penyelenggara = $_POST['penyelenggara'];
	$alamat = $_POST['alamat'];
	$nomor=rand(0, 9);
	for($i=0;$i<=4;$i++) {
		$nomor= $nomor.rand(0, 9);
	};
	$username = "kejuaraan_".date("d").date("m").date("y");
	$password = $nomor;
  $md5 = md5($nomor);
	$username_pengda = $_SESSION['username'];
	$result = mysqli_query($h, "INSERT INTO panitia(username, password, penyelenggara, alamat) VALUES('$username', '$md5', '$penyelenggara', '$alamat' )");
	if($result){
		$id_panitia = mysqli_fetch_row(mysqli_query($h, "SELECT MAX(id_panitia) FROM panitia ORDER BY id_panitia  ASC"));
		$id_pengda = mysqli_fetch_row(mysqli_query($h, "SELECT id_pengda FROM  pengurus_daerah WHERE username = '$username_pengda'"));
		$result2 = mysqli_query($h, "INSERT INTO kejuaraan(nama_kejuaraan, id_pengda, id_panitia) VALUES('$nama_kejuaraan', '$id_pengda[0]', '$id_panitia[0]')");
		if($result2){
			$content = "Username : ".$username;
			$content = $content."\n Password : ".$password;
			$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/panitia.txt","wb");
			fwrite($fp,$content);
			fclose($fp);
		}
	}
}
?>
