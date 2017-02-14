<?php
  include "../../koneksi.php";
  $id_atlet = $_GET["id"];
  $query_atlet = mysqli_query($h, "SELECT * from atlet
  																	WHERE id_atlet = '$id_atlet'");
  $data_atlet = mysqli_fetch_assoc($query_atlet);
  $query_kejuaraan = mysqli_query($h, "SELECT * from atlet
                                        JOIN kejuaraan_dojang
                                        ON atlet.id_kejuaraan_dojang = kejuaraan_dojang.id_kejuaraan_dojang
  																	    WHERE id_atlet = '$id_atlet'");
  $data_kejuaraan = mysqli_fetch_assoc($query_kejuaraan);
?>
<script src="controller/kejuaraan-detail.js"></script>
<script src="controller/controller.js"></script>
<div class="col-xs-12 marg15-top tengah-text font-putih">
  <h2>EDIT PESERTA</h2>
</div>
<div class="col-xs-8 col-xs-offset-2 alert alert-success">
  <form id="editpeserta" class="" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" id="tag" value="<?php echo $data_kejuaraan["id_kejuaraan"]; ?>">
    <div class="col-xs-12">
      <div class="col-xs-6 kanan-text">
        Nama Lengkap
      </div>
      <div class="col-xs-6">
        <input name="nama" type="text" placeholder="Nama Lengkap" class="alert pad5 w-100 no-border h-40" value="<?php echo $data_atlet["nama_atlet"] ?>">
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-xs-6 kanan-text marg5-top">
        Tanggal Lahir
      </div>
      <div class="col-xs-6">
        <input name="tgl_lahir" type="date" class="alert pad5 no-border h-40" value="<?php echo $data_atlet["tgl_lahir"] ?>">
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-xs-6 kanan-text marg5-top">
        Jenis Kelamin
      </div>
      <div class="col-xs-6">
        <select name="jk" id="" class="no-outline no-border no-outline col-xs-4">
          <?php if($data_atlet["jk"]=="Laki Laki"){
            echo '
              <option class="pad5" value="Laki Laki">Laki - Laki</option>
              <option class="pad5" value="Perempuan">Perempuan</option>
            ';
          }else{
            echo '
              <option class="pad5" value="Perempuan">Perempuan</option>
              <option class="pad5" value="Laki Laki">Laki - Laki</option>
            ';
          } ?>

        </select>
      </div>
    </div>
    <div class="col-md-12 marg15-top">
      <div class="col-xs-6 kanan-text marg5-top">
        Alamat
      </div>
      <div class="col-xs-6">
        <textarea name="alamat" class="alert pad5 no-border w-100" rows="2"><?php echo $data_atlet["alamat_atlet"] ?></textarea>
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-xs-6 kanan-text">
        Tinggi
      </div>
      <div class="col-xs-6">
        <input name="tinggi" type="text" placeholder="Tinggi" class="alert pad5 w-100 no-border h-40" value="<?php echo $data_atlet["tinggi"] ?>">
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-xs-6 pad5-top kanan-text">
        Berat
      </div>
      <div class="col-xs-6">
        <input name="berat" type="tel" placeholder="Berat Badan" class="alert pad5 col-xs-4 no-border h-40" value="<?php echo $data_atlet["berat"] ?>">
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-xs-6 pad5-top kanan-text">
        Golongan Darah
      </div>
      <div class="col-xs-6">
        <input name="gol_darah" type="text" placeholder="Golongan Darah" class="alert pad5 col-xs-4 no-border h-40" value="<?php echo $data_atlet["gol_darah"] ?>">
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-xs-6 kanan-text">
        Foto
      </div>
      <div class="col-xs-6">
        <input name="foto" type="file" class="alert pad5 col-xs-4 no-border h-40" value="">
      </div>
    </div>
    <div class="col-md-12 marg15-top tengah-text">
      <input type="submit" class="font-sedang btn btn-success col-xs-12 pad10" value="EDIT"/>
      <!-- <a id="btn-daftar-peserta" href="#" class="btn btn-danger">SUBMIT</a> -->
    </div>
  </form>
</div>
<div class="col-md-12 marg15-top kanan-text" style="position:fixed;">
  <a id="konten-close" href="#" class="btn btn-danger alert"><img src="img/close.png" alt="Close Form" style="width:20px; height:20px"></a>
</div>

<?php
if(isset($_POST["nama"])){
  $nama_atlet = $_POST["nama"];
  $tgl_lahir = $_POST["tgl_lahir"];
  $jk = $_POST["jk"];
  $alamat_atlet = $_POST["alamat"];
  $tinggi = $_POST["tinggi"];
  $berat = $_POST["berat"];
  $gol_darah = $_POST["gol_darah"];
  echo "string";
  
  if(!empty($_FILES["foto"]["name"])){
    echo "FUCK";
    $namaFile = $id_atlet.".png";
    $tmp_file = $_FILES['foto']['tmp_name'];
    $path = "../../img_atlet/".$namaFile;
    if(move_uploaded_file($tmp_file, $path)){
      $query_atlet = mysqli_query($h, "UPDATE atlet SET nama_atlet = '$nama_atlet', berat = '$berat', tinggi = '$tinggi', jk = '$jk', tgl_lahir = '$tgl_lahir', gol_darah = '$gol_darah', alamat_atlet = '$alamat_atlet' WHERE id_atlet = '$id_atlet'");
      if($query_atlet){
        echo "sukses 1";
      }else{
        echo "gagal 1";
      }
    }
  }else{
    $query_atlet = mysqli_query($h, "UPDATE atlet SET nama_atlet = '$nama_atlet', berat = '$berat', tinggi = '$tinggi', jk = '$jk', tgl_lahir = '$tgl_lahir', gol_darah = '$gol_darah', alamat_atlet = '$alamat_atlet' WHERE id_atlet = '$id_atlet'");
    if($query_atlet){
      echo "sukses 2";
    }else{
      echo "gagal 2";
    }
  }
}
?>
