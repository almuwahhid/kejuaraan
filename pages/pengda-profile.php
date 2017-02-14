<?php
		$username_pengda = $_SESSION['username'];
		$sql = mysqli_query($h, "SELECT * FROM pengurus_daerah WHERE username = '$username_pengda'");
		$data = mysqli_fetch_assoc($sql);
 ?>
 <script src="controller/pengda-profile.js"></script>
		<main>
			<section id="new-kejuaraan" class="col-md-12 pad10-top-bot">
				<h4 class=" margin-20-left alert alert-success col-xs-2 tag">Profil Pengda</h4>
				<div class="container">
					<div class="col-md-12 alert alert-success">

						<!-- TODO : pendaftaran.php - mulai form -->
						<div class="col-xs-7">
							<form action="index.php?p=profil" id="form-identitas" method="POST">
								<aside class="w-100">
									<div class="col-xs-3 marg5-top">
										Nama
									</div>
									<div class="col-xs-6">
										<input type="text" class="alert pad5 w-100 no-border h-30" name="nama" value="<?php echo $data["nama"] ?>">
									</div>
								</aside>
								<aside class="w-100">
									<div class="col-xs-3 pad5-top">
										Alamat
									</div>
									<div class="col-xs-6">
										<textarea name="alamat" class="alert pad5 no-border w-100" rows="4"><?php echo $data["alamat"] ?></textarea>
									</div>
								</aside>
								<aside class="w-100">
									<div class="col-xs-3 marg5-top">
										No Telepon
									</div>
									<div class="col-xs-6">
										<input type="text" class="alert pad5 w-100 no-border h-30" name="no_telp" value="<?php echo $data["telp"] ?>">
									</div>
								</aside>
								<div class="col-xs-12 pad5-top">
									<input type="button" class="btn btn-success col-xs-9 marg15-top pad10" id="btn-identitas" name="asd" value="SIMPAN">
								</div>
							</form>
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
                    <?php echo $data["username"] ?>
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
                    <input type="text" class="w-100 alert pad5 w-100 no-border h-30" name="username" value="<?php echo $data["username"] ?>">
								</div>
								<div class="col-xs-1">
                    <a href="#" id="edit-username" class="font-big"><i class="fa fa-check" aria-hidden="true"></i></a>
								</div>
							</aside>
							<aside class="w-100 display-none" id="form-edit-password">
								<div class="col-xs-5 marg5-top">
                    <input type="password" placeholder="Password Lama" class="w-100 alert pad5 w-100 no-border h-30" name="password" value="">
								</div>
								<div class="col-xs-5 marg5-top">
                    <input type="password" placeholder="Password Baru" class="w-100 alert pad5 w-100 no-border h-30" name="password" value="">
								</div>
								<div class="col-xs-1">
                    <a href="#" class="font-big"><i class="fa fa-check" aria-hidden="true"></i></a>
								</div>
							</aside>
						</div>
					</div>
				</div>
			</section>
		</main>
<?php
	if(isset($_POST['nama'])){
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];

		mysqli_query($h, "UPDATE pengurus_daerah SET nama='$nama', alamat='$alamat', telp='$no_telp' WHERE username='$username_pengda'");
	}else if(isset($_POST['username'])){
		$uname = $_POST['username'];
		$qr = mysqli_query($h, "UPDATE pengurus_daerah SET username='$uname' WHERE username='$username_pengda'");
		if($qr){
			session_destroy();
		}
	}
 ?>
