<script src="controller/panitia-kejuaraan.js" type="text/javascript"></script>
<script type="text/javascript">

</script>
<div class="col-xs-12 marg15-top tengah-text font-putih">
  <h2>TAMBAH KELAS KEJUARAAN</h2>
</div>
<div class="col-xs-8 col-xs-offset-2 alert alert-success">
  <form id="form-kelas" class="" action="index.php?p=create" method="post">
    <div class="col-xs-12">
      <div class="col-xs-6 kanan-text">
        Nama Kelas
      </div>
      <div class="col-xs-6">
        <input type="text" placeholder="Nama Kelas" class="alert pad5 w-100 no-border h-40" name="nama_kelas" value="">
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-xs-6 kanan-text marg5-top">
        Minimum Berat
      </div>
      <div class="col-xs-6">
        <input type="text" name="min_berat" placeholder="Minimum Berat" class="alert pad5 no-border h-40">
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-xs-6 kanan-text marg5-top">
        Maksimum Berat
      </div>
      <div class="col-xs-6">
        <input type="text" name="max_berat" placeholder="Maksimum Berat" class="alert pad5 no-border h-40">
      </div>
    </div>
  </form>
  <div class="col-md-12 marg15-top tengah-text">
    <input type="submit" id="submit-kelas" class="btn btn-danger" value="SUBMIT"/>
  </div>
</div>
<div class="col-md-12 marg15-top kanan-text" style="position:fixed;">
  <a id="konten-close" href="#" class="btn btn-danger alert"><img src="img/close.png" alt="Close Form" style="width:20px; height:20px"></a>
</div>
