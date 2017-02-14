<?php
	$id_dojang = $_SESSION['id'];
	$query_dojang = mysqli_query($h, "SELECT * from dojang WHERE id_dojang = '$id_dojang'");
	$data_dojang = mysqli_fetch_assoc($query_dojang);
?>
<main>
	 <script src="controller/dojang-profil.js"></script>
	<section class="col-md-12 pad10-top-bot">
		<h4 class=" margin-20-left alert alert-success col-xs-2 tag">Profil Dojang</h4>
		<div class="container">
			<div class="col-md-12 alert alert-success">

				<div class="col-xs-7">
					<form id="form-dojang" action="index.php?p=profil" method="post">
						<aside class="w-100">
							<div class="col-xs-3 marg5-top">
								Nama Dojang
							</div>
							<div class="col-xs-6">
								<input name="nama_dojang" type="text" class="alert pad5 w-100 no-border h-30" value="<?php echo $data_dojang["nama_dojang"] ?>">
							</div>
						</aside>
						<aside class="w-100">
							<div class="col-xs-3 marg5-top">
								Nomor Telepon
							</div>
							<div class="col-xs-6">
								<input name="no_telp" type="text" class="alert pad5 w-100 no-border h-30" value="<?php echo $data_dojang["no_telp"] ?>">
							</div>
						</aside>
						<aside class="w-100">
							<div class="col-xs-3 pad5-top">
								Alamat
							</div>
							<div class="col-xs-6">
								<textarea name="alamat" class="alert pad5 no-border w-100" rows="4"><?php echo $data_dojang["alamat_dojang"] ?></textarea>
							</div>
						</aside>
					</form>
					<div class="col-xs-12 pad5-top">
						<input id="btn-edit-dojang" type="button" class="btn btn-success col-xs-9 marg15-top pad10" name="asd" value="SIMPAN">
					</div>
				</div>
				<div id="bg-pendaftaran" class=" col-xs-5 bg-gambar" style="background-image: url('img/tendang2.png');">
					<!-- TODO : pendaftaran.php - end of form -->
				</div>
			</div>
			<div class="col-md-12 alert alert-success">
				<!-- TODO : pendaftaran.php - mulai form -->
				<div class="col-xs-6">
					<aside class="w-100">
						<div class="col-xs-3 marg15-top">
							Username
						</div>
						<div class="col-xs-6 marg15-top">
							<?php echo $data_dojang["username"]; ?>
						</div>
						<div class="col-xs-2 marg5-top">
							<a href="#" id="btn-edit-username" class="font-big"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						</div>
					</aside>
					<aside class="w-100">
						<div class="col-xs-3 marg15-top">
							password
						</div>
						<div class="col-xs-6 marg15-top">
							**********
						</div>
						<div class="col-xs-2 marg5-top">
							<a href="#" id="btn-edit-password" class="font-big"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						</div>
					</aside>
				</div>
				<div class=" col-xs-6">
					<aside class="w-100 display-none" id="form-edit-username">
						<div class="col-xs-10 marg5-top">
							<input type="text" class="w-100 alert pad5 w-100 no-border h-30" name="username" value="<?php echo $data_dojang["username"]; ?>"/>
						</div>
						<div class="col-xs-1">
							<a href="#" id="edit-username" class="font-big"><i class="fa fa-check" aria-hidden="true"></i></a>
						</div>
					</aside>
					<aside class="w-100 display-none" id="form-edit-password">
						<div class="col-xs-5 marg5-top">
							<input name="password_lama" type="password" placeholder="Password Lama" class="w-100 alert pad5 w-100 no-border h-30"/>
						</div>
						<div class="col-xs-5 marg5-top">
							<input name="password_baru" type="password" placeholder="Password Baru" class="w-100 alert pad5 w-100 no-border h-30"/>
						</div>
						<div class="col-xs-1">
							<a id="edit-password" href="#" class="font-big"><i class="fa fa-check" aria-hidden="true"></i></a>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
		if(isset($_POST["nama_dojang"])){
			$nama_dojang = $_POST["nama_dojang"];
			$no_telp = $_POST["no_telp"];
			$alamat_dojang = $_POST["alamat"];

			$query_edit = mysqli_query($h, "UPDATE dojang SET nama_dojang='$nama_dojang', alamat_dojang='$alamat_dojang', no_telp='$no_telp' WHERE id_dojang='$id_dojang'");
			if($query_edit){
	      echo "true";
	    }
		}
?>
