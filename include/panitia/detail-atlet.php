<script src="controller/panitia-konfirmasi.js" type="text/javascript"></script>
<?php
session_start();
include "/../../koneksi.php";
include "/../../function/function.php";
$id_atlet = $_GET["id"];

$query_detail_atlet = mysqli_query($h, "SELECT * from atlet  WHERE id_atlet = '$id_atlet'");
$data_atlet = mysqli_fetch_assoc($query_detail_atlet);
$id_kategori = $data_atlet["id_kategori"];

$query_kategori = mysqli_query($h, "SELECT * from kategori_kejuaraan  WHERE id_kategori = '$id_kategori'");
$data_kategori = mysqli_fetch_assoc($query_kategori);

$query_kejuaraan = mysqli_query($h, "SELECT * from atlet
                                      JOIN kejuaraan_dojang
                                      ON atlet.id_kejuaraan_dojang = kejuaraan_dojang.id_kejuaraan_dojang
                                      WHERE id_atlet = '$id_atlet'");
$data_kejuaraan = mysqli_fetch_assoc($query_kejuaraan);
$id_kejuaraan = $data_kejuaraan["id_kejuaraan"];
$query_kelas = mysqli_query($h, "SELECT * from kelas_kejuaraan  WHERE id_kejuaraan = '$id_kejuaraan'");
?>
<div class="col-xs-12 marg15-top tengah-text font-putih">
  <h2>DETAIL ATLET</h2>
</div>
<div class="col-xs-8 col-xs-offset-2 alert alert-success">
  <div class="col-xs-12 tengah-text">
    <div class="bayang bg-gambar marg15-top" style="margin-left:45%;width:100px;height:120px; background-image: url('img_atlet/<?php echo $data_atlet['foto_atlet']?>');"></div>
  </div>
  <div class="col-xs-12 marg5-top tengah-text font-sedang">
    <b><?php echo $data_atlet["nama_atlet"] ?></b>
  </div>
  <div class="col-md-12 marg20-top">
    <div class="col-xs-6 kanan-text">
      Kategori
    </div>
    <div class="col-xs-6">
      <?php echo $data_kategori["nama_kategori"] ?>
    </div>
  </div>
  <div class="col-md-12 marg8-top">
    <div class="col-xs-6 kanan-text">
      Kelas
    </div>
    <div class="col-xs-6">
      <?php getKelas($query_kelas, $data_atlet["berat"]); ?>
    </div>
  </div>
  <div class="col-md-12 marg8-top">
    <div class="col-xs-6 kanan-text">
      Jenis Kelamin
    </div>
    <div class="col-xs-6">
      <?php echo $data_atlet["jk"]; ?>
    </div>
  </div>
  <div class="col-md-12 marg8-top">
    <div class="col-xs-6 kanan-text">
      Tanggal Lahir
    </div>
    <div class="col-xs-6">
      <?php echo showMonth($data_atlet['tgl_lahir']) ?>
    </div>
  </div>
  <div class="col-md-12 marg8-top">
    <div class="col-xs-6 kanan-text">
      Golongan Darah
    </div>
    <div class="col-xs-6">
      <?php echo $data_atlet["gol_darah"] ?>
    </div>
  </div>
  <div class="col-md-12 marg8-top">
    <div class="col-xs-6 kanan-text">
      Alamat
    </div>
    <div class="col-xs-6">
      <?php echo $data_atlet["alamat_atlet"]; ?>
    </div>
  </div>
  <div class="col-md-12 marg8-top">
    <div class="col-xs-6 kanan-text">
      Tinggi
    </div>
    <div class="col-xs-6">
      <?php echo $data_atlet["tinggi"]; ?>
    </div>
  </div>
  <?php
    if(isset($_SESSION["tag"]) && $_SESSION["tag"]=="PESERTA"){
  ?>
    <div class="col-md-6" style="position:fixed">
      <a onclick="edit('<?php echo $id_atlet ?>')" href="#" class="btn btn-success alert">EDIT</a>
    </div>
  <?php
    }
  ?>
</div>
<div class="col-md-12 marg15-top kanan-text" style="position:fixed;">
  <a id="konten-close" href="#" class="btn btn-danger alert"><img src="img/close.png" alt="Close Form" style="width:20px; height:20px"></a>
</div>
