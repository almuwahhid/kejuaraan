<?php
  $query_pelatih = mysqli_query($h, "SELECT * from pelatih  WHERE id_kejuaraan_dojang = '$id_kejuaraan_dojang'");
  $data_pelatih = mysqli_fetch_assoc($query_pelatih);
 ?>
 <div class="col-md-12 alert alert-success">
   <div class="w-100">
     <nav class="head-triangle-right label label-info col-xs-2 marg-1p-left" style="float:left;" style="position:absolute;">
       <b>PELATIH</b>
     </nav>
     <div class="w-100 marg15-top">
       <form id="formpelatih" action="index.php?p=detail&id=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data">
         <div class="col-xs-4 tengah-text">
           <div class="w-100">
             <input type="file" name="fotopelatih" value="">
           </div>
           <div class="bayang col-xs-8 bg-gambar marg15-top" style="height:250px; background-image: url('img_pelatih/<?php echo $data_pelatih['foto_pelatih']?>');">
           </div>
         </div>
         <div class="col-xs-8">
           <div class="w-100">
             <div class="col-xs-3 pad5-top">
               Nama
             </div>
             <div class="col-xs-9">
               <input name="nama_pelatih" type="text" placeholder="Nama Lengkap" class="alert pad5 w-100 no-border h-30" value="<?php echo $data_pelatih["nama_pelatih"]; ?>">
             </div>
           </div>
           <div class="w-100">
             <div class="col-xs-3 pad5-top">
               No Telepon
             </div>
             <div class="col-xs-9">
               <input type="text" name="telp_pelatih" value="<?php echo $data_pelatih["telp_pelatih"]; ?>" type="number" class="alert pad5 w-100 no-border h-30" placeholder="Nomor Telepon">
             </div>
           </div>
           <div class="w-100">
             <div class="col-xs-3 pad5-top">
               Alamat
             </div>
             <div class="col-xs-9">
               <textarea name="alamat_pelatih" class="alert pad5 no-border w-100" rows="4"><?php echo $data_pelatih["alamat_pelatih"]; ?></textarea>
             </div>
           </div>
           <div class="w-100">
             <div class="col-xs-3 pad5-top">
               Sertifikasi Pelatih
             </div>
             <div class="col-xs-9">
               <input name="sertifikat" value="<?php echo $data_pelatih["sertifikat"]; ?>" type="text" placeholder="Sertifikasi Pelatih" class="alert pad5 w-100 no-border h-30">
             </div>
           </div>
           <div class="w-100">
             <div class="col-xs-3 pad5-top">
               Tingkatan Sabuk
             </div>
             <div class="col-xs-9">
               <input name="sabuk" value="<?php echo $data_pelatih["sabuk"]; ?>" type="text" placeholder="Tingkatan Sabuk" class="alert pad5 w-100 no-border h-30" >
             </div>
           </div>
         </div>
         <div class="col-xs-12 tengah-text">
           <input type="submit" class="btn btn-success marg15-top pad5" name="asd" value="TAMBAHKAN">
         </div>
       </form>
     </div>
   </div>
 </div>

<?php
  if(isset($_POST["nama_pelatih"])){
    $id_pelatih = $data_pelatih["id_pelatih"];
    $nama_pelatih = $_POST["nama_pelatih"];
    $telp_pelatih = $_POST["telp_pelatih"];
    $alamat_pelatih = $_POST["alamat_pelatih"];
    $sertifikat = $_POST["sertifikat"];
    $sabuk = $_POST["sabuk"];
    echo $_FILES["fotopelatih"]["name"];
    if(!empty($_FILES["fotopelatih"]["name"])){
			echo "FUCK";
			$namaFile = $id_pelatih.".png";
			$tmp_file = $_FILES['fotopelatih']['tmp_name'];
			$path = "img_pelatih/".$namaFile;
			if(move_uploaded_file($tmp_file, $path)){
				$query_update_kejuaraan = mysqli_query($h, "UPDATE pelatih SET nama_pelatih='$nama_pelatih', sertifikat='$sertifikat', sabuk='$sabuk', telp_pelatih='$telp_pelatih', alamat_pelatih='$alamat_pelatih', foto_pelatih='$namaFile' WHERE id_pelatih='$id_pelatih'");
				if($query_update_kejuaraan){
					echo "sukses 1";
          header("Location: index.php?p=detail&id=".$id_kejuaraan);
				}else{
					echo "gagal 1";
          header("Location: index.php?p=detail&id=".$id_kejuaraan);
				}

			}
		}else{
			echo "fuck";
			$query_update_kejuaraan = mysqli_query($h, "UPDATE pelatih SET nama_pelatih='$nama_pelatih', sertifikat='$sertifikat', sabuk='$sabuk', telp_pelatih='$telp_pelatih', alamat_pelatih='$alamat_pelatih' WHERE id_pelatih='$id_pelatih'");
			if($query_update_kejuaraan){
				echo "sukses 2";
        header("Location: index.php?p=detail&id=".$id_kejuaraan);
			}else{
				echo "gagal 2";
        header("Location: index.php?p=detail&id=".$id_kejuaraan);
			}
		}
  }
?>
