<?php
  $id_kejuaraan_dojang = $_GET["id"];
  include "../../koneksi.php";
?>
<script src="controller/dojang-konfirmasi.js" type="text/javascript"></script>
<div class="col-md-12 alert alert-success">
  <div class="col-md-12 kanan-text">
    <a id="konten-close" href="#" class="btn btn-danger alert"><img src="img/close.png" alt="Close Form" style="width:20px; height:20px"></a>
  </div>
  <div class="col-xs-7">
    <div class="w-100">
      <nav class="head-triangle-right label label-success col-xs-6 marg-1p-left" style="float:left;" style="position:absolute;">
        <b>FORMULIR PEMBAYARAN</b>
      </nav>
    </div>
    <form class="" action="include/dojang/form-pembayaran.php?id=<?php echo $id_kejuaraan_dojang ?>" method="GET">
      <aside class="w-100 marg20-top">
        <div class="col-xs-3 pad5-top">
          Jumlah Bayar
        </div>
        <div class="col-xs-6">
          <input name="jumlah_bayar"  type="text" placeholder="Jumlah Bayar" class="alert pad5 w-100 no-border h-30" value="">
        </div>
      </aside>
      <aside class="w-100">
        <div class="col-xs-3 pad5-top">
          Atas Nama
        </div>
        <div class="col-xs-6">
          <input name="nama_pembayar" type="text" placeholder="Nama Pengirim" class="alert pad5 w-100 no-border h-30" value="">
        </div>
      </aside>
      <aside class="w-100">
        <div class="col-xs-3 pad5-top">
          Bank
        </div>
        <div class="col-xs-6 pad5-top">
          <input name="nama_bank" type="text" placeholder="Nama Bank" class="alert pad5 w-100 no-border h-30"  value="">
        </div>
      </aside>
      <aside class="w-100">
        <div class="col-xs-3 pad5-top">
          No Rekening
        </div>
        <div class="col-xs-6 pad5-top">
          <input name="no_rekening" type="text" placeholder="Nomor Rekening" class="alert pad5 w-100 no-border h-30"  value="">
        </div>
      </aside>
      <aside class="w-100">
        <div class="col-xs-3 pad5-top">
          Pesan
        </div>
        <div class="col-xs-6 pad5-top">
          <textarea  name="pesan" class="alert pad5 no-border w-100" rows="4"></textarea>
        </div>
      </aside>
    </form>
    <div class="col-xs-12 pad5-top">
      <input id="btn-bayar" type="button" class="btn btn-success col-xs-9 marg15-top pad10" value="KIRIM">
    </div>
  </div>
  <div id="bg-pendaftaran" class=" col-xs-5 bg-gambar" style="background-image: url('img/paid.png');">
  <!-- TODO : pendaftaran.php - end of form -->
  </div>
</div>
<?php
    if(isset($_POST["nama_pembayar"])){
      $kode_bayar = date("d").date("m").date("y");
      $tgl_bayar = date("Y-m-d");
      $jumlah_bayar = $_POST["jumlah_bayar"];
      $nama_pembayar = $_POST["nama_pembayar"];
      $no_rekening = $_POST["no_rekening"];
      $nama_bank = $_POST["nama_bank"];
      $pesan = $_POST["pesan"];
      $query_pembayaran = mysqli_query($h, "INSERT INTO pembayaran(kode_bayar, id_kejuaraan_dojang, tgl_bayar, jumlah_bayar, nama_pembayar, no_rekening, nama_bank, pesan)
                          VALUES('$kode_bayar', '$id_kejuaraan_dojang', '$tgl_bayar', '$jumlah_bayar', '$nama_pembayar', '$no_rekening', '$nama_bank', '$pesan' )");
      if($query_pembayaran){
        echo "berhasil";
        mysqli_close($h);
      }
    }
?>
