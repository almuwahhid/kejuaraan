
<?php
	$id_panitia = $_SESSION['id'];
	$query_kejuaraan = mysqli_query($h, "SELECT * from kejuaraan
																		WHERE id_panitia = '$id_panitia'");
   $data = mysqli_fetch_assoc($query_kejuaraan);
	 $query_kategori = mysqli_query($h, "SELECT * from kategori_kejuaraan
 																		WHERE id_kejuaraan = '".$data['id_kejuaraan']."'");
	 $query_kelas = mysqli_query($h, "SELECT * from kelas_kejuaraan
 																		WHERE id_kejuaraan = '".$data['id_kejuaraan']."'");
 ?>
<script src="js/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() {
		nicEditors.allTextAreas({fullPanel : true, iconsPath:'js/nicEditorIcons.gif'});
	});
</script>
<script src="controller/panitia-kejuaraan.js" type="text/javascript"></script>
		<main>
			<section id="new-kejuaraan" class="col-md-12 pad5-top-bot">
				<h4 class=" margin-20-left alert alert-success col-xs-2 tag">Edit Kejuaraan</h4>
				<?php
					if($data["status"]==0){
						?>
						<div class="w-100 tengah-text" style="position:absolute">
							<button onclick="aktifkan()" class="font-sedang btn btn-success pad10"> AKTIFKAN </button>
						</div>
						<?php
					}
				 ?>
				<div class="container">
					<div class="col-md-12 alert alert-success">
						<form id="form-kejuaraan" class="" action="index.php?p=create" method="POST" enctype="multipart/form-data">
							<div class="col-xs-6">
								<aside class="w-100 marg20-top">
									<div class="col-xs-12 marg5-top">
										Nama Kejuaraan
									</div>
									<div class="col-xs-12 pad5-top">
										<input type="text" placeholder="Nama Kejuaraan" class="alert pad5 w-100 no-border h-30" name="nama_kejuaraan" value="<?php echo $data['nama_kejuaraan'];  ?>">
									</div>
								</aside>
								<aside class="w-100">
									<div class="col-xs-12 pad5-top">
										Tempat Kejuaraan
									</div>
									<div class="col-xs-12 pad5-top">
										<input name="tempat_kejuaraan" type="text" placeholder="Tempat Kejuaraan" class="alert pad5 w-100 no-border h-30" value="<?php echo $data['tempat'];  ?>">
									</div>
								</aside>
								<aside class="w-100">
									<div class="col-xs-12 pad5-top">
										Nama CP
									</div>
									<div class="col-xs-12 pad5-top">
										<input name="nama_cp" type="text" placeholder="Tempat Kejuaraan" class="alert pad5 w-100 no-border h-30" value="<?php echo $data['nama_cp'];  ?>">
									</div>
								</aside>
								<aside class="w-100">
									<div class="col-xs-12 pad5-top">
										Nomor Telp
									</div>
									<div class="col-xs-12 pad5-top">
										<input name="telp_cp" type="text" placeholder="Tempat Kejuaraan" class="alert pad5 w-100 no-border h-30" value="<?php echo $data['telp_cp'];  ?>">
									</div>
								</aside>
								<aside class="w-100">
									<div class="col-xs-12 marg5-top">
										Tanggal Pelaksanaan
									</div>
									<div class="col-xs-6">
										<div class="w-100">
											<span class="info">Tgl Dimulai</span>
										</div>
										<input name="tgl_pelaksanaan" type="date" placeholder="Tanggal Dimulai" class="alert pad5 w-100 no-border h-30" value="<?php echo $data['tgl_pelaksanaan'];  ?>">
									</div>
									<div class="col-xs-6">
										<div class="w-100">
											<span class="info">Tgl Berakhir</span>
										</div>
										<input name="tgl_berakhir" type="text" placeholder="Tanggal Berakhir" class="alert pad5 w-100 no-border h-30" value="<?php echo $data['tgl_berakhir'];  ?>">
									</div>
								</aside>
								<aside class="w-100">
									<div class="col-xs-12 marg5-top">
										Tanggal Pendaftaran
									</div>
									<div class="col-xs-6">
										<div class="w-100">
											<span class="info">Tgl Dibuka</span>
										</div>
										<input name="tgl_buka_daftar"  type="text" placeholder="Tanggal Buka Pendaftaran" class="alert pad5 w-100 no-border h-30" value="<?php echo $data['tgl_buka_daftar'];  ?>">
									</div>
									<div class="col-xs-6">
										<div class="w-100">
											<span class="info">Tgl Tutup</span>
										</div>
										<input name="tgl_tutup_daftar" type="text" placeholder="Tanggal Tutup Pendaftaran" class="alert pad5 w-100 no-border h-30" value="<?php echo $data['tgl_tutup_daftar'];  ?>">
									</div>
								</aside>
								<aside class="w-100 marg5-top">
									<div class="col-xs-12 marg5-top">
										Kategori / <a href="#" id="btn-tambah-kategori">Tambah</a>
									</div>
									<div class="col-xs-12 marg5-top">
										<?php
										while($row = $query_kategori->fetch_array()){?>
				            <span onmouseover="showD('<?php echo $row["id_kategori"] ?>kt')" onmouseout="hideD('<?php echo $row["id_kategori"] ?>kt')" class="tagPart <?php echo $row["id_kategori"] ?>kt"><?php echo $row["nama_kategori"]; ?></span>
										<?php
										if($row["status_kelompok"] = 0){
											echo '<span id="'.$row["id_kategori"].'kt" class="display-none tagPart ">Perorangan</span>';
										}else{
											echo '<span id="'.$row["id_kategori"].'kt" class="display-none tagPart ">Perorangan</span>';
										}
				          } ?>
									</div>
								</aside>
								<aside class="w-100 marg5-top">
									<div class="col-xs-12 marg5-top">
										Kelas / <a href="#" id="btn-tambah-kelas">Tambah</a>
									</div>
									<div class="col-xs-12 marg5-top">
										<?php
										while($row = $query_kelas->fetch_array()){
											echo '<span onmouseover="showD('.$row["id_kelas"].')" onmouseout="hideD('.$row["id_kelas"].')" class="tagPart mouse '.$row["id_kelas"].'">'.$row["nama_kelas"].'</span>';
											echo '<span id="'.$row["id_kelas"].'" class="tagPart display-none">'.$row["min_berat"].'kg - '.$row["max_berat"].'kg</span>';

										}
										?>
									</div>
								</aside>
							</div>
							<div class=" col-xs-6">
								<aside class="w-100 marg20-top">
									<div class="col-xs-12 pad5-top">
										Syarat & Ketentuan
									</div>
									<div class="col-xs-12 pad5-top">
										<textarea name="syarat_ketentuan" id="area" class="alert pad5 no-border w-100" rows="14"><?php echo $data['detail'];?></textarea>
									</div>
								</aside>
								<aside class="w-100 marg20-top">
									<div class="col-xs-12 pad5-top">
										Foto Kejuaraan
									</div>
									<div class="col-xs-12 marg5-top">
										<?php
										$data_foto =  mysqli_fetch_assoc(mysqli_query($h, "SELECT * from kejuaraan WHERE id_panitia = '$id_panitia'"));
										if(!empty($data_foto["foto"])){
											$url_foto = $data_foto["foto"];?>
											<div class="bayang col-xs-3 same-width get-height pad5-top bg-gambar" style="background-image: url('img_kejuaraan/<?php echo $url_foto?>');margin-right:20px">
											</div>
											<?php
										}else{?>
											<div class="bayang col-xs-3 same-width get-height pad5-top bg-gambar" style="background-image: url('img/default.png');margin-right:20px">
											</div>
											<?php
										}
										?>
										<input name="foto" type="file" class="margin-20" id="file_gambar">
									</div>
								</aside>
							</div>
							<input type="submit" id="submit-kejuaraan" class="font-sedang btn btn-success col-xs-12 marg15-top pad10" value="KIRIM"/>
						</form>
						<!-- <button id="submit-kejuaraan" class="font-sedang btn btn-success col-xs-12 marg15-top pad10" name="asd">KIRIM</button> -->
						<div class="col-xs-12 pad5-top">
						</div>
					</div>
				</div>
			</section>
		</main>
<?php

$id_kejuaraan = $data["id_kejuaraan"];
	if(isset($_POST["nama_kategori"])){
		$nama_kategori = $_POST["nama_kategori"];
		$biaya = $_POST["biaya_kategori"];
		$status_kategori = $_POST["status_kelompok"];
		$query_tambah_kategori = mysqli_query($h, "INSERT INTO kategori_kejuaraan(id_kejuaraan, nama_kategori, biaya, status_kelompok) VALUES('$id_kejuaraan', '$nama_kategori', '$biaya', '$status_kategori') ");
		if($query_tambah_kategori){
			echo "true";
		}
	}
	else if(isset($_POST["nama_kelas"])){
		$nama_kelas = $_POST["nama_kelas"];
		$min_berat = $_POST["min_berat"];
		$max_berat = $_POST["max_berat"];
		$query_tambah_kelas = mysqli_query($h, "INSERT INTO kelas_kejuaraan(id_kejuaraan, nama_kelas, min_berat, max_berat) VALUES('$id_kejuaraan', '$nama_kelas', '$min_berat', '$max_berat') ");
		if($query_tambah_kelas){
			echo "true";
		}
	}
	else if(isset($_POST["nama_kejuaraan"])){
		$nama_kejuaraan = $_POST["nama_kejuaraan"];
		$tempat_kejuaraan = $_POST["tempat_kejuaraan"];
		$tgl_pelaksanaan = $_POST["tgl_pelaksanaan"];
		$tgl_berakhir = $_POST["tgl_berakhir"];
		$tgl_buka_daftar = $_POST["tgl_buka_daftar"];
		$tgl_tutup_daftar = $_POST["tgl_tutup_daftar"];
		$syarat_ketentuan = $_POST["syarat_ketentuan"];
		$nama_cp = $_POST["nama_cp"];
		$telp_cp = $_POST["telp_cp"];
		echo "string";
		if(!empty($_FILES["foto"]["name"])){
			echo "FUCK";
			$namaFile = $id_kejuaraan.".png";
			$tmp_file = $_FILES['foto']['tmp_name'];
			$path = "img_kejuaraan/".$namaFile;
			if(move_uploaded_file($tmp_file, $path)){
				$query_update_kejuaraan = mysqli_query($h, "UPDATE kejuaraan SET nama_kejuaraan='$nama_kejuaraan', tempat='$tempat_kejuaraan', tgl_pelaksanaan='$tgl_pelaksanaan', tgl_berakhir='$tgl_berakhir', tgl_buka_daftar='$tgl_buka_daftar', tgl_tutup_daftar='$tgl_tutup_daftar', detail='$syarat_ketentuan', foto='$namaFile', nama_cp='$nama_cp', telp_cp='$telp_cp' WHERE id_panitia='$id_panitia'");
				if($query_update_kejuaraan){
					echo "sukses 1";
				}else{
					echo "gagal 1";
				}
			}
		}else{
			echo "fuck";
			$query_update_kejuaraan = mysqli_query($h, "UPDATE kejuaraan SET nama_kejuaraan='$nama_kejuaraan', tempat='$tempat_kejuaraan', tgl_pelaksanaan='$tgl_pelaksanaan', tgl_berakhir='$tgl_berakhir', tgl_buka_daftar='$tgl_buka_daftar', tgl_tutup_daftar='$tgl_tutup_daftar', detail='$syarat_ketentuan', nama_cp='$nama_cp', telp_cp='$telp_cp' WHERE id_panitia='$id_panitia'");
			if($query_update_kejuaraan){
				echo "sukses 2";
			}else{
				echo "gagal 2";
			}
		}
	}else if(isset($_GET["active"])){
		$query_aktifkan_kejuaraan = mysqli_query($h, "UPDATE kejuaraan SET status='1' WHERE id_panitia='$id_panitia'");
		if($query_aktifkan_kejuaraan){
			echo "berhasil aktifkan";
		}
	}
 ?>
