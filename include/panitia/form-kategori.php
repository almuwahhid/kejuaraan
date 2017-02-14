<?php
session_start();
$id_panitia = $_SESSION["id"];
?>
<script src="controller/panitia-kejuaraan.js" type="text/javascript"></script>
<script type="text/javascript">

</script>
<div class="col-xs-12 marg15-top tengah-text font-putih">
  <h2>TAMBAH KATEGORI</h2>
</div>
<div class="col-xs-8 col-xs-offset-2 alert alert-success">
  <form id="form-kategori" class="" action="index.php?p=create" method="post">
    <div class="col-xs-12">
      <div class="col-xs-6 kanan-text">
        Nama Kategori
      </div>
      <div class="col-xs-6">
        <input type="text" placeholder="Nama Kategori" class="alert pad5 w-100 no-border h-40" name="nama_kategori" value="">
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-xs-6 kanan-text marg5-top">
        Biaya
      </div>
      <div class="col-xs-6">
        <input type="text" name="biaya_kategori" placeholder="Biaya" class="alert pad5 no-border h-40">
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-xs-6 kanan-text marg5-top">
        Status Kelompok
      </div>
      <div class="col-xs-6">
        <select id="" class="no-outline no-border no-outline col-xs-4" name="status_kategori">
          <option class="pad5" value="kelompok">Berkelompok</option>
          <option class="pad5" value="individu">Individu</option>
        </select>
      </div>
    </div>
  </form>
  <div class="col-md-12 marg15-top tengah-text">
    <input type="submit" id="submit-kategori" class="btn btn-danger" value="SUBMIT"/>
  </div>
</div>
<div class="col-md-12 marg15-top kanan-text" style="position:fixed;">
  <a id="konten-close" href="#" class="btn btn-danger alert"><img src="img/close.png" alt="Close Form" style="width:20px; height:20px"></a>
</div>
