<?php
include "function/function.php";
$jumlah = mysqli_num_rows(mysqli_query($h, "SELECT * from kejuaraan WHERE status='1' ORDER BY id_kejuaraan DESC"));
$banyak_data = floor($jumlah/4)+1;
$limit = 1;

  if(!isset($_GET["search"])){
    $query_kejuaraan_terbaru = mysqli_query($h, "SELECT * from kejuaraan
                                                  JOIN panitia
                                                  ON panitia.id_panitia = kejuaraan.id_panitia
                                                  WHERE status='1' ORDER BY id_kejuaraan DESC ");
    $data_kejuaraan_terbaru = mysqli_fetch_assoc($query_kejuaraan_terbaru);
    $id_kejuaraan_terbaru = $data_kejuaraan_terbaru["id_kejuaraan"];

    if(isset($_GET["r"])){
      $active_list = $_GET["r"];
    	$first = ($_GET["r"]*4);
    	$limit = $first-4;
      $query_kejuaraan = mysqli_query($h, "SELECT * from kejuaraan
                                            JOIN panitia
                                            ON panitia.id_panitia = kejuaraan.id_panitia
                                            WHERE status='1'
                                            AND id_kejuaraan != '$id_kejuaraan_terbaru'
                                            ORDER BY id_kejuaraan DESC
                                            LIMIT 4 OFFSET ".$limit);
    }else{
      if($banyak_data>1){
    		$query_kejuaraan = mysqli_query($h, "SELECT * from kejuaraan
                                              JOIN panitia
                                              ON panitia.id_panitia = kejuaraan.id_panitia
                                              WHERE status='1'
                                              AND id_kejuaraan != '$id_kejuaraan_terbaru'
                                              ORDER BY id_kejuaraan DESC
                                              LIMIT 4");
    	}else{
    		$query_kejuaraan = mysqli_query($h, "SELECT * from kejuaraan
                                              JOIN panitia
                                              ON panitia.id_panitia = kejuaraan.id_panitia
                                              WHERE status='1'
                                              AND id_kejuaraan != '$id_kejuaraan_terbaru'
                                              ORDER BY id_kejuaraan DESC");
    	}
    }
  }else{
    $search = $_GET["search"];
    if(isset($_GET["r"])){
      $active_list = $_GET["r"];
    	$first = ($_GET["r"]*4);
    	$limit = $first-4;
      $query_kejuaraan = mysqli_query($h, "SELECT * from kejuaraan
                                            JOIN panitia
                                            ON panitia.id_panitia = kejuaraan.id_panitia
                                            WHERE status='1'
                                            AND nama_kejuaraan LIKE '%$search%'
                                            ORDER BY id_kejuaraan DESC
                                            LIMIT 4 OFFSET ".$limit);
    }else{
      if($banyak_data>1){
    		$query_kejuaraan = mysqli_query($h, "SELECT * from kejuaraan
                                              JOIN panitia
                                              ON panitia.id_panitia = kejuaraan.id_panitia
                                              WHERE status='1'
                                              AND nama_kejuaraan LIKE '%$search%'
                                              ORDER BY id_kejuaraan DESC
                                              LIMIT 4");
    	}else{
    		$query_kejuaraan = mysqli_query($h, "SELECT * from kejuaraan
                                              JOIN panitia
                                              ON panitia.id_panitia = kejuaraan.id_panitia
                                              WHERE status='1'
                                              AND nama_kejuaraan LIKE '%$search%'
                                              ORDER BY id_kejuaraan DESC");
    	}
    }
  }
 ?>
<main>

  <?php
  if(!isset($_GET["search"])){
    ?>
    <section id="new-kejuaraan" class="col-md-12 pad10-top-bot">
      <h4 class=" margin-20-left alert alert-success col-xs-2 tag">Kejuaraan Terbaru</h4>
      <div class="container">
        <div class="col-md-12 alert alert-success">
          <div class="col-md-9" style="height:300px;">
            <div class="col-xs-4 marg20-top">
              <div class="bayang col-xs-12 same-width get-height bg-gambar" style="background-image: url('img_kejuaraan/<?php echo $data_kejuaraan_terbaru['foto']?>');">
              </div>
            </div>
            <div class="col-xs-8">
              <div class="w-100">
                <div class="col-md-12">
                  <h1><?php echo $data_kejuaraan_terbaru["nama_kejuaraan"] ?></h1>
                  <span class="info">Oleh : <?php echo $data_kejuaraan_terbaru["penyelenggara"] ?></span>
                </div>
                <div class="col-xs-4">
                  Pelaksanaan
                </div>
                <div class="col-xs-1">
                  :
                </div>
                <div class="col-xs-7">
                  <?php echo getTgl($data_kejuaraan_terbaru['tgl_pelaksanaan'], $data_kejuaraan_terbaru['tgl_berakhir']);?>
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
                  <?php echo $data_kejuaraan_terbaru["tempat"]; ?>
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
                  <?php echo getTgl($data_kejuaraan_terbaru['tgl_buka_daftar'], $data_kejuaraan_terbaru['tgl_tutup_daftar']);?>
                </div>
              </div>
              <!-- ------------------------------ -->
            </div>
          </div>
          <?php
            if(cekHari($data_kejuaraan_terbaru['tgl_tutup_daftar'])){
              echo '<nav class="head-triangle-left hijau label col-xs-2 marg-1p-right" style="float:right;" style="position:absolute;">
                      <b>TERBUKA</b>
                    </nav>';
            }else{
              echo '<nav class="head-triangle-left merah label col-xs-2 marg-1p-right" style="float:right;" style="position:absolute;">
                      <b>TERTUTUP</b>
                    </nav>';
            }
           ?>
          <div class="w-100 marg8-top">
            <a class="btn btn-info kanan" href="index.php?p=detail&id=<?php echo $data_kejuaraan_terbaru["id_kejuaraan"]; ?>">DETAIL KEJUARAAN</a>
          </div>
        </div>
      </div>
    </section>
    <?php
  }
  ?>
  <section id="list-kejuaraan" class="col-md-12 pad10-top-bot">
    <h4 class="alert alert-success col-xs-2 tag margin-20-left" id="list-kejuaraan">Daftar Kejuaraan</h4>
    <div class="container">
    <div class="w-100">
      <div class="w-30 alert alert-warning marg2p-right filter" id="filter">
        FILTER
      </div>

      <!-- TODO : mulai berulang -->

      <div class="w-60 kanan" >
        <?php
        while($row = $query_kejuaraan->fetch_array()){
          ?>
          <div class="w-100 alert alert-success" >
            <div class="col-md-10" style="height:300px;">
              <div class="col-xs-4 marg20-top">
                <div class="bayang col-xs-12 same-width-2 get-height-2 bg-gambar" style="background-image: url('img_kejuaraan/<?php echo $row['foto']?>');">
                </div>
              </div>
              <div class="col-xs-8">
                <div class="w-100">
                  <div class="col-md-12">
                    <h2><?php echo $row["nama_kejuaraan"] ?></h2>
                  </div>
                  <div class="col-md-12">
                    <span class="info">Oleh : <?php echo $row["penyelenggara"] ?></span>
                  </div>
                  <div class="col-xs-3">
                    Pelaksanaan
                  </div>
                  <div class="col-xs-1">
                    :
                  </div>
                  <div class="col-xs-7">
                    <?php echo getTgl($row['tgl_pelaksanaan'], $row['tgl_berakhir']);?>
                  </div>
                </div>
                <!-- ------------------------------ -->
                <div class="w-100 marg8-top">
                  <div class="col-xs-3">
                    Tempat
                  </div>
                  <div class="col-xs-1">
                    :
                  </div>
                  <div class="col-xs-7">
                    <?php echo $row["tempat"]; ?>
                  </div>
                </div>
                <!-- ------------------------------ -->
                <div class="w-100 marg8-top">
                  <div class="col-xs-3">
                    Pendaftaran
                  </div>
                  <div class="col-xs-1">
                    :
                  </div>
                  <div class="col-xs-7">
                    <?php echo getTgl($row['tgl_buka_daftar'], $row['tgl_tutup_daftar']);?>
                  </div>
                </div>
                <!-- ------------------------------ -->
              </div>
            </div>
            <?php
              if(cekHari($row['tgl_tutup_daftar'])){
                echo '<nav class="triangle-left hijau col-xs-2 marg-2p-right" style="float:right;" style="position:absolute;">
                        TERBUKA
                      </nav>';
              }else{
                echo '<nav class="triangle-left merah col-xs-2 marg-2p-right" style="float:right;" style="position:absolute;">
                        TERTUTUP
                      </nav>';
              }
             ?>
            <div class="w-100 marg8-top">
              <a class="btn btn-info kanan" href="index.php?p=detail&id=<?php echo $row["id_kejuaraan"]; ?>">DETAIL KEJUARAAN</a>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
    </div>
    <div class="w-100">
      <ul class="pagination kanan">
        <?php
        if($banyak_data>1){
          for($i=1;$i<=$banyak_data;$i++){
            if(isset($active_list)){
              if($active_list==$i){
                echo '<li class="active"><a>'.$i.'</a></li>';
              }else{
                echo "<li><a href='index.php?r=".$i."'>".$i."</a></li>";
              }
            }else{
              if($i==1){
                echo '<li class="active"><a>'.$i.'</a></li>';
              }else{
                echo "<li><a href='index.php?r=".$i."'>".$i."</a></li>";
              }
            }
          }
        }
        ?>
      </ul>
    </div>
  </section>
</main>
