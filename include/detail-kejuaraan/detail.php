<?php
	include "function/function.php";
		$query_panitia = mysqli_query($h, "SELECT * from panitia WHERE id_panitia = '".$data_kejuaraan['id_panitia']."'");
		$data_panitia = mysqli_fetch_assoc($query_panitia);
		//$query_cp = mysqli_query($h, "SELECT * from cp_panitia WHERE id_kejuaraan = '".$id_kejuaraan."'");
		$query_kelas = mysqli_query($h, "SELECT * from kelas_kejuaraan
  																		WHERE id_kejuaraan = '".$data_kejuaraan['id_kejuaraan']."'");

 ?>
 <script src="controller/kejuaraan-detail.js"></script>
<div class="col-md-12 alert alert-success">
  <div class="col-md-9">
    <div class="col-xs-4 marg20-top">
      <div class="bayang col-xs-12 same-width get-height bg-gambar" style="background-image: url('img_kejuaraan/<?php echo $data_kejuaraan['foto']?>');">
      </div>
    </div>
    <div class="col-xs-8">
      <div class="w-100">
        <div class="col-md-12">
          <h1><?php echo $data_kejuaraan["nama_kejuaraan"]; ?></h1>
          <span class="info">Oleh : <?php echo $data_panitia["penyelenggara"]; ?></span>
        </div>
        <div class="col-xs-4">
          Pelaksanaan
        </div>
        <div class="col-xs-1">
          :
        </div>
        <div class="col-xs-7">
          <?php echo getTgl($data_kejuaraan['tgl_pelaksanaan'], $data_kejuaraan['tgl_berakhir']);?>
        </div>
      </div>
      <!-- ------------------------------ -->
      <div class="w-100 marg8-top">
        <div class="col-xs-4">
          Tempat
        </div>
        <div class="col-xs-1">
          :
        </div>
        <div class="col-xs-7">
          <?php echo $data_kejuaraan['tempat']; ?>
        </div>
      </div>
      <!-- ------------------------------ -->
      <div class="w-100 marg8-top">
        <div class="col-xs-4">
          Tanggal Pendaftaran
        </div>
        <div class="col-xs-1">
          :
        </div>
        <div class="col-xs-7">
          <?php echo getTgl($data_kejuaraan['tgl_buka_daftar'], $data_kejuaraan['tgl_tutup_daftar']);?>
        </div>
      </div>
      <div class="w-100 marg8-top">
        <div class="col-xs-4">
          Kelas
        </div>
        <div class="col-xs-1">
          :
        </div>
        <div class="col-xs-7">
					<?php
					while($row = $query_kelas->fetch_array()){
						echo '<span onmouseover="showD('.$row["id_kelas"].')" onmouseout="hideD('.$row["id_kelas"].')" class="tagPart mouse '.$row["id_kelas"].'">'.$row["nama_kelas"].'</span>';
						echo '<span id="'.$row["id_kelas"].'" class="display-none tagPart ">'.$row["min_berat"].'kg - '.$row["max_berat"].'kg</span>';

					}
					?>
        </div>
      </div>
      <!-- ------------------------------ -->
      <div class="w-100 marg15-top">
        <div class="col-xs-4">
          Kategori
        </div>
        <div class="col-xs-1">
          :
        </div>
        <div class="col-xs-7">
          <?php
            $query_kategori = mysqli_query($h, "SELECT * from kategori_kejuaraan WHERE id_kejuaraan = '".$data_kejuaraan['id_kejuaraan']."'");
            while($data_kategori = $query_kategori->fetch_array()){?>
            <span onmouseover="showD('<?php echo $data_kategori["id_kategori"] ?>kt')" onmouseout="hideD('<?php echo $data_kategori["id_kategori"] ?>kt')" class="tagPart <?php echo $data_kategori["id_kategori"] ?>kt"><?php echo $data_kategori["nama_kategori"]; ?></span>
						<?php
						if($data_kategori["status_kelompok"] = 0){
							echo '<span id="'.$data_kategori["id_kategori"].'kt" class="display-none tagPart ">Perorangan</span>';
						}else{
							echo '<span id="'.$data_kategori["id_kategori"].'kt" class="display-none tagPart ">Perorangan</span>';
						}
          } ?>
        </div>
      </div>
      <div class="col-xs-12 marg8-top font-sedang">
        Biaya
      </div>
      <div class="col-xs-12 marg8-top">
        <select id="daftar_pilih_harga" class="btn btn-primary no-outline no-border col-xs-4" name="">
          <?php
            $query_kategori = mysqli_query($h, "SELECT * from kategori_kejuaraan WHERE id_kejuaraan = '".$data_kejuaraan['id_kejuaraan']."'");
            while($data_kategori = $query_kategori->fetch_array()){
            echo '<option class="pad5" value="Pomsae" label="'.number_format($data_kategori["biaya"],2,",",".").'">'.$data_kategori["nama_kategori"].'</option>';
          } ?>
        </select>
        <div class="col-xs-1">
        </div>
        <div class="col-xs-7 font-big">
          Rp. <span id="daftar_harga"></span>
        </div>
      </div>
      <div class="col-xs-12 marg8-top info">
        <a href="#" id="syarat-ketentuan" onclick="syarat(<?php echo $data_kejuaraan["id_kejuaraan"] ?>)">Syarat & Ketentuan</a>
    </div>
  </div>
  </div>
  <?php
    if(cekHari($data_kejuaraan['tgl_tutup_daftar'])){
      echo '<nav class="head-triangle-left hijau label col-xs-2 marg-1p-right" style="float:right;" style="position:absolute;">
              <b>TERBUKA</b>
            </nav>';
    }else{
      echo '<nav class="head-triangle-left merah label col-xs-2 marg-1p-right" style="float:right;" style="position:absolute;">
              <b>TERTUTUP</b>
            </nav>';
    }
   ?>

  <div class="col-xs-12 marg8-top info kanan-text">
    <b>Contact Person</b>
    <?php
      //while($data_cp = $query_cp->fetch_array()){
      echo '<span class="w-100">'.$data_kejuaraan["nama_cp"].' - '.$data_kejuaraan["telp_cp"].'</span>';
      //} ?>
  </div>
	<?php
		if(isset($_SESSION["tag"])){
			if($_SESSION["tag"] == "PESERTA" && $cek_available==0){?>
			<div class="kanan tengah-text w-100 marg8-top">
				<a onclick="aktifkan('<?php echo "index.php?p=detail&id=".$id_kejuaraan."&status=true" ?>','<?php echo "index.php?p=detail&id=".$id_kejuaraan ?>')" class="btn btn-warning alert">DAFTAR KEJUARAAN</a>
			</div>
	 <?php
 			}
		}
	 ?>

</div>

<?php
	if(isset($_GET["status"])){
		$query_status = mysqli_query($h, "INSERT INTO kejuaraan_dojang(id_kejuaraan, id_dojang)
										VALUES('$id_kejuaraan', '$id_dojang')");
	 if($query_status){
		 $data_kejuaraan_dojang = mysqli_fetch_row(mysqli_query($h, "SELECT MAX(id_kejuaraan_dojang) from kejuaraan_dojang  ORDER BY 'id_kejuaraan_dojang' ASC"));
		 $id_kejuaraan_dojang = $data_kejuaraan_dojang[0];
		 $query_pelatih = mysqli_query($h, "INSERT INTO pelatih (id_kejuaraan_dojang)
		  																	VALUES('$id_kejuaraan_dojang')");
		 if($query_pelatih){
			 //header("Location: index.php?p=detail&id=".$id_kejuaraan);
		 }
	 }
	}
?>
