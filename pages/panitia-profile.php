<?php
		$id_panitia = $_SESSION['id'];
    $query_panitia = mysqli_query($h, "SELECT * from panitia WHERE id_panitia = '$id_panitia'");
    $data_panitia = mysqli_fetch_assoc($query_panitia);
 ?>
 <script src="controller/panitia-profil.js"></script>
		<main>
			<section id="new-kejuaraan" class="col-md-12 pad10-top-bot">
				<h4 class=" margin-20-left alert alert-success col-xs-2 tag">Profil Panitia</h4>
				<div class="container">
					<div class="col-md-12 alert alert-success">

						<!-- TODO : pendaftaran.php - mulai form -->
						<div class="col-xs-7">
							<form action="index.php?p=profil" id="form-profil" method="POST">
								<aside class="w-100">
									<div class="col-xs-3 marg5-top">
										Nama Penyelenggara
									</div>
									<div class="col-xs-6">
										<input name="nama_penyelenggara" type="text" class="alert pad5 w-100 no-border h-30" value="<?php echo $data_panitia["penyelenggara"] ?>">
									</div>
								</aside>
								<aside class="w-100">
									<div class="col-xs-3 pad5-top">
										Alamat
									</div>
									<div class="col-xs-6">
										<textarea name="alamat" class="alert pad5 no-border w-100" rows="4"><?php echo $data_panitia["alamat"] ?></textarea>
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
                    <?php echo $data_panitia["username"] ?>
								</div>
								<div class="col-xs-2 marg5-top">
										<button id="btn-edit-username" class="font-big"><i class="fa fa-pencil" aria-hidden="true"></i></button>
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
										<button id="btn-edit-password" class="font-big"><i class="fa fa-pencil" aria-hidden="true"></i></button>
								</div>
							</aside>
						</div>
						<div class=" col-xs-6">
							<aside class="w-100 display-none" id="form-edit-username">
								<div class="col-xs-10 marg5-top">
                    <input name="username" type="text" class="w-100 alert pad5 w-100 no-border h-30" value="<?php echo $data_panitia["username"] ?>">
								</div>
								<div class="col-xs-1">
                    <a href="#" id="edit-username" class="font-big"><i class="fa fa-check" aria-hidden="true"></i></a>
								</div>
							</aside>
							<aside class="w-100 display-none" id="form-edit-password">
								<div class="col-xs-5 marg5-top">
                    <input name="password_lama" type="password" placeholder="Password Lama" class="w-100 alert pad5 w-100 no-border h-30" value="">
								</div>
								<div class="col-xs-5 marg5-top">
                    <input name="password_baru" type="password" placeholder="Password Baru" class="w-100 alert pad5 w-100 no-border h-30" value="">
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
	if(isset($_POST['nama_penyelenggara'])){
		$nama_panitia = $_POST['nama_penyelenggara'];
		$alamat = $_POST['alamat'];
		$update_panitia = mysqli_query($h, "UPDATE panitia SET penyelenggara='$nama_panitia', alamat='$alamat' WHERE id_panitia='$id_panitia'");
    if($update_panitia){
      echo "true";
    }
	}
 ?>
