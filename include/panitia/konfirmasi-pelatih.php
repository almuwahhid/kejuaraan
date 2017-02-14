<?php
  $query_pelatih = mysqli_query($h, "SELECT * from pelatih  WHERE id_kejuaraan_dojang = '$id_kejuaraan_dojang'");
  $data_pelatih = mysqli_fetch_assoc($query_pelatih);
?>
<div class="col-md-12 alert alert-success">
  <div class="w-100">
    <nav class="head-triangle-right label label-warning col-xs-4 marg-1p-left" style="float:left;" style="position:absolute;">
      <b>PELATIH DOJANG</b>
    </nav>
  </div>
  <div class="w-100 marg20-top">
    <div class="col-xs-6">
      <aside class="w-100 marg20-top">
        <div class="col-xs-12 marg5-top">
          Nama Pelatih
        </div>
        <div class="col-xs-12 pad5-top">
          <span class="font-sedang tagPart"><?php echo $data_pelatih["nama_pelatih"]; ?></span>
        </div>
      </aside>
      <aside class="w-100 marg8-top">
        <div class="col-xs-12 pad5-top">
          Sertifikat Pelatih
        </div>
        <div class="col-xs-12 pad5-top">
          <span class="font-sedang tagPart"><?php echo $data_pelatih["sertifikat"]; ?></span>
        </div>
      </aside>
      <aside class="w-100 marg8-top">
        <div class="col-xs-12 marg5-top">
          Tingkatan Sabuk
        </div>
        <div class="col-xs-12 pad5-top">
          <span class="font-sedang tagPart"><?php echo $data_pelatih["sabuk"]; ?></span>
        </div>
      </aside>
      <aside class="w-100 marg8-top">
        <div class="col-xs-12 marg5-top">
          Telp
        </div>
        <div class="col-xs-12 pad5-top">
          <span class="tagPart" style="text-align:justify"><?php echo $data_pelatih["telp_pelatih"]; ?></span>
        </div>
      </aside>
    </div>
    <div class=" col-xs-6">
      <aside class="w-100 marg20-top">
        <div class="bayang col-xs-5 bg-gambar marg15-top" style="height:250px; background-image: url('img_pelatih/<?php echo $data_pelatih['foto_pelatih']?>');">
      </aside>
      <aside class="w-100 marg8-top">
        <div class="col-xs-12 pad5-top">

        </div>
      </aside>
    </div>
    <div class="col-xs-12 pad5-top">
    </div>
  </div>
</div>
