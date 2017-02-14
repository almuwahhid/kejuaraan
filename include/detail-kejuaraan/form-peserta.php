<?php
  include "../../koneksi.php";
  $id_kejuaraan_dojang = $_GET["id"];
  $query_kategori = mysqli_query($h, "SELECT * from kejuaraan_dojang
  																	JOIN kejuaraan
  																	ON kejuaraan_dojang.id_kejuaraan = kejuaraan.id_kejuaraan
  																	JOIN kategori_kejuaraan
  																	ON kategori_kejuaraan.id_kejuaraan = kejuaraan.id_kejuaraan
  																	WHERE kejuaraan_dojang.id_kejuaraan_dojang = '$id_kejuaraan_dojang'");
?>
<script src="controller/kejuaraan-detail.js"></script>
<div class="col-xs-12 marg15-top tengah-text font-putih">
  <h2>FORMULIR PESERTA</h2>
</div>
<div class="col-xs-8 col-xs-offset-2 alert alert-success">
  <form id="formpeserta" class="" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" id="tag" value="<?php echo $_GET["idkej"]; ?>">
    <input type="hidden" name="kejuaraan_dojang" value="<?php echo $_GET["id"]; ?>">
    <div class="col-xs-12">
      <div class="col-xs-6 kanan-text">
        Nama Lengkap
      </div>
      <div class="col-xs-6">
        <input name="nama" type="text" placeholder="Nama Lengkap" class="alert pad5 w-100 no-border h-40" value="">
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-xs-6 kanan-text marg5-top">
        Tanggal Lahir
      </div>
      <div class="col-xs-6">
        <input name="tgl_lahir" type="date" class="alert pad5 no-border h-40">
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-xs-6 kanan-text marg5-top">
        Jenis Kelamin
      </div>
      <div class="col-xs-6">
        <select name="jk" id="" class="no-outline no-border no-outline col-xs-4">
          <option class="pad5" value="Laki Laki">Laki - Laki</option>
          <option class="pad5" value="Perempuan">Perempuan</option>
        </select>
      </div>
    </div>
    <div class="col-md-12 marg15-top">
      <div class="col-xs-6 kanan-text marg5-top">
        Alamat
      </div>
      <div class="col-xs-6">
        <textarea name="alamat" class="alert pad5 no-border w-100" rows="2"></textarea>
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-xs-6 kanan-text">
        Tinggi
      </div>
      <div class="col-xs-6">
        <input name="tinggi" type="text" placeholder="Tinggi" class="alert pad5 w-100 no-border h-40" value="">
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-xs-6 pad5-top kanan-text">
        Berat
      </div>
      <div class="col-xs-6">
        <input name="berat" type="tel" placeholder="Berat Badan" class="alert pad5 col-xs-4 no-border h-40" value="">
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-xs-6 pad5-top kanan-text">
        Golongan Darah
      </div>
      <div class="col-xs-6">
        <input name="gol_darah" type="text" placeholder="Golongan Darah" class="alert pad5 col-xs-4 no-border h-40" value="">
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
    <div class="col-md-12">
      <div class="col-xs-6 kanan-text">
        Kategori
      </div>
      <div class="col-xs-6">
        <select name="kategori_kejuaraan" id="" class="no-outline no-border no-outline col-xs-4" name="">
          <?php
          while($row = $query_kategori->fetch_array()){
            echo '<option class="pad5" value="'.$row["id_kategori"].'">'.$row["nama_kategori"].'</option>';
          }
          ?>
        </select>
      </div>
    </div>
    <div class="col-md-12 marg15-top tengah-text">
      <input type="submit" class="font-sedang btn btn-success col-xs-12 pad10" value="KIRIM"/>
      <!-- <a id="btn-daftar-peserta" href="#" class="btn btn-danger">SUBMIT</a> -->
    </div>
  </form>
</div>
<div class="col-md-12 marg15-top kanan-text" style="position:fixed;">
  <a id="pendaftaran-close" href="#" class="btn btn-danger alert"><img src="img/close.png" alt="Close Form" style="width:20px; height:20px"></a>
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
  $id_kategori = $_POST["kategori_kejuaraan"];
  $tgl_daftar = date("Y-m-d");
  echo "string";
  echo $_FILES["foto"]["name"];

  if(!empty($_FILES["foto"]["name"])){
    echo "FUCK";
    $query_atlet = mysqli_query($h, "INSERT INTO atlet(nama_atlet, status_atlet, id_kejuaraan_dojang, id_kategori, berat, tinggi, jk, tgl_lahir, gol_darah, alamat_atlet, tgl_daftar)
    VALUES('$nama_atlet', '0', '$id_kejuaraan_dojang', '$id_kategori', '$berat', '$tinggi', '$jk', '$tgl_lahir', '$gol_darah', '$alamat_atlet', '$tgl_daftar') ");

    if($query_atlet){
      $query_id_atlet = mysqli_query($h, "SELECT MAX(id_atlet) from atlet  ORDER BY 'id_atlet' ASC");
      $id_atlet = mysqli_fetch_row($query_id_atlet);
      $id = $id_atlet[0];
      echo $id;
      $namaFile = $id_atlet[0].".png";
      $tmp_file = $_FILES['foto']['tmp_name'];
      $path = "../../img_atlet/".$namaFile;
      $query_update = mysqli_query($h, "UPDATE atlet SET foto_atlet='$namaFile' WHERE id_atlet='$id'");
      if(move_uploaded_file($tmp_file, $path)){
        if($query_update){
          echo "sukses 1";
        }else{
          echo "gagal 1";
        }
      }
    }
  }
}
?>
