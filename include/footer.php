<div class="w-100 bg-header bayang pad10">
  <?php
    if(!isset($_SESSION["tag"]) || (isset($_SESSION["tag"]) && $_SESSION["tag"]!="PENGDA")){
      $query_pengda =  mysqli_query($h, "SELECT * from pengurus_daerah");
      $data_pengda = mysqli_fetch_assoc($query_pengda);
      echo "<div class='tengah-text'>Hubungi Kami untuk Pengajuan Proposal : </div>";
      ?>
        <div class="col-xs-4 col-xs-offset-4 bayang pad10 marg8-top">
          <section class="w-100 tengah-text font-10">
            Pengurus Daerah Taekwondo DIY
          </section>
          <div class="font-12">
            <section class="w-100 ">
              <div class="col-xs-5 kanan-text">
                Nama
              </div>
              <div class="col-xs-1">
                :
              </div>
              <div class="col-xs-5">
                <?php echo $data_pengda["nama"] ?>
              </div>
            </section>
            <section class="w-100">
              <div class="col-xs-5 kanan-text">
                Alamat
              </div>
              <div class="col-xs-1">
                :
              </div>
              <div class="col-xs-6">
                <?php echo $data_pengda["alamat"] ?>
              </div>
            </section>
            <section class="w-100">
              <div class="col-xs-5 kanan-text">
                No Telp.
              </div>
              <div class="col-xs-1">
                :
              </div>
              <div class="col-xs-6">
                <?php echo $data_pengda["telp"] ?>
              </div>
            </section>
          </div>
        </div>
      <?php
    }
   ?>
  <div class="w-100 tengah-text font-10 marg8-top">
    @copyright 2017 Belu Wijaya Kusuma
  </div>
</div>
