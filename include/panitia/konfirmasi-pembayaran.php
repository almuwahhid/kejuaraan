<?php
  $query_pembayaran = mysqli_query($h, "SELECT * from pembayaran  WHERE id_kejuaraan_dojang = '$id_kejuaraan_dojang' AND id_pembayaran = '$id_bayar'");
  $data_pembayaran = mysqli_fetch_assoc($query_pembayaran);

  $query_dojang = mysqli_query($h, "SELECT * from dojang  WHERE id_dojang = '$id_dojang'");
  $data_dojang = mysqli_fetch_assoc($query_dojang);


?>
<div class="col-md-12 alert alert-success">
  <div class="w-100">
    <nav class="head-triangle-right label label-primary col-xs-4 marg-1p-left" style="float:left;" style="position:absolute;">
      <b>PEMBAYARAN DOJANG</b>
    </nav>
  </div>
  <div class="w-100 marg20-top">
    <div class="col-xs-6">
      <aside class="w-100 marg20-top">
        <div class="col-xs-12 marg5-top">
          Nama Dojang
        </div>
        <div class="col-xs-12 pad5-top">
          <span class="font-sedang tagPart"><?php echo $data_dojang["nama_dojang"]; ?></span>
        </div>
      </aside>
      <aside class="w-100 marg8-top">
        <div class="col-xs-12 pad5-top">
          Kode Bayar
        </div>
        <div class="col-xs-12 pad5-top">
          <span class="font-sedang tagPart"><?php echo $data_pembayaran["kode_bayar"]; ?></span>
        </div>
      </aside>
      <aside class="w-100 marg8-top">
        <div class="col-xs-12 marg5-top">
          Nama Pengirim :
        </div>
        <div class="col-xs-12 pad5-top">
          <span class="font-sedang tagPart"><?php echo $data_pembayaran["nama_pembayar"]; ?></span>
        </div>
      </aside>
      <aside class="w-100 marg8-top">
        <div class="col-xs-12 marg5-top">
          Jumlah Bayar
        </div>
        <div class="col-xs-12 pad5-top">
          <span class="font-sedang tagPart">Rp. <?php echo number_format($data_pembayaran["jumlah_bayar"],2,",","."); ?></span>
        </div>
      </aside>
      <aside class="w-100 marg8-top">
        <div class="col-xs-12 marg5-top">
          Nomor Rekening
        </div>
        <div class="col-xs-12 pad5-top">
          <span class="font-sedang tagPart"><?php echo $data_pembayaran["no_rekening"]; ?></span>
        </div>
      </aside>
      <aside class="w-100 marg5-top">
        <div class="col-xs-12 marg5-top">
          Nama BANK
        </div>
        <div class="col-xs-12 pad5-top">
          <span class="font-sedang tagPart"><?php echo $data_pembayaran["nama_bank"]; ?></span>
        </div>
      </aside>
    </div>
    <div class=" col-xs-6">
      <aside class="w-100 marg20-top">
        <div class="col-xs-12 pad5-top">
          Pesan
        </div>
        <div class="col-xs-12 pad5-top">
          <span class="tagPart w-100" style="text-align:justify;min-height:250px">
            <?php echo $data_pembayaran["pesan"]; ?>
          </span>
        </div>
      </aside>
    </div>
    <div class="col-xs-12 pad5-top">
    </div>
  </div>
</div>
