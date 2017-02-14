<?php
$query_atlet = mysqli_query($h, "SELECT * from atlet
                                  JOIN kategori_kejuaraan
                                  ON atlet.id_kategori = kategori_kejuaraan.id_kategori
                                  JOIN kejuaraan_dojang
                                  ON kejuaraan_dojang.id_kejuaraan_dojang = atlet.id_kejuaraan_dojang
                                  WHERE kejuaraan_dojang.id_kejuaraan = '$id_kejuaraan'
                                  AND kejuaraan_dojang.id_dojang = '$id_dojang'
                                  ORDER BY id_atlet DESC ");
$jumlah = mysqli_num_rows($query_atlet);
$banyak_data = floor($jumlah/10)+1;
$limit = 1;

if(isset($_GET["r"])){
	$active_list = $_GET["r"];
	$first = ($_GET["r"]*10);
	$limit = $first-10;
	$query_atlet = mysqli_query($h, "SELECT * from atlet
                                    JOIN kejuaraan_dojang
                                    ON kejuaraan_dojang.id_kejuaraan_dojang = atlet.id_kejuaraan_dojang
                                    JOIN kategori_kejuaraan
                                    ON atlet.id_kategori = kategori_kejuaraan.id_kategori
                                    WHERE kejuaraan_dojang.id_kejuaraan = '$id_kejuaraan' AND kejuaraan_dojang.id_dojang = '$id_dojang'
                                    ORDER BY id_atlet DESC
                                    LIMIT 10 OFFSET ".$limit);
	if($_GET["r"]!=1){
		$nomor = $limit+1;
	}else{
		$nomor = $_GET["r"];
	}
}else{
	$nomor = 1;
	if($banyak_data>1){
		$query_atlet = mysqli_query($h, "SELECT * from atlet
                                      JOIN kejuaraan_dojang
                                      ON kejuaraan_dojang.id_kejuaraan_dojang = atlet.id_kejuaraan_dojang
                                      JOIN kategori_kejuaraan
                                      ON atlet.id_kategori = kategori_kejuaraan.id_kategori
                                      WHERE kejuaraan_dojang.id_kejuaraan = '$id_kejuaraan' AND kejuaraan_dojang.id_dojang = '$id_dojang'
                                      ORDER BY id_atlet DESC
                                      LIMIT 10");
	}else{
		$query_atlet = mysqli_query($h, "SELECT * from atlet
                                      JOIN kejuaraan_dojang
                                      ON kejuaraan_dojang.id_kejuaraan_dojang = atlet.id_kejuaraan_dojang
                                      JOIN kategori_kejuaraan
                                      ON atlet.id_kategori = kategori_kejuaraan.id_kategori
                                      WHERE kejuaraan_dojang.id_kejuaraan = '$id_kejuaraan' AND kejuaraan_dojang.id_dojang = '$id_dojang'
                                      ORDER BY id_atlet DESC");
	}
}
 ?>
<div class="col-md-12 alert alert-success">
  <div class="w-100">
    <nav class="head-triangle-right label label-primary col-xs-3 marg-1p-left" style="float:left;" style="position:absolute;">
      <b>PESERTA SAYA</b>
    </nav>
    <!-- jika terbuka -->
    <?php
      if(cekHari($data_kejuaraan['tgl_tutup_daftar'])){
        ?>
        <div class="kanan kanan-text w-30">
          <!-- <div class=" marg8-top col-xs-10 font-sedang">
            0 Peserta
          </div> -->
          <div class="col-xs-offset-10 col-xs-2 kanan-text">
            <a href="#" class="btn btn-warning alert" onclick="tambahP(<?php echo $kejuaraan_dojang["id_kejuaraan_dojang"] ?>, <?php echo $data_kejuaraan["id_kejuaraan"] ?>)"><i class="fa fa-plus" aria-hidden="true"></i></a>
          </div>
        </div>
        <?php
      }
     ?>
  </div>
  <div class="w-100 marg20-top">
    <table class="table table-bordered">
    <thead>
      <tr>
        <th class='tengah-text'>No</th>
        <th class="col-xs-4 tengah-text">Nama Atlet</th>
        <th class="col-xs-2 tengah-text">Jenis Kelamin</th>
        <th class="col-xs-2 tengah-text">Kategori</th>
        <th class="col-xs-1 tengah-text">Berat</th>
        <th class="col-xs-1 tengah-text">Tinggi</th>
        <th class="col-xs-2 tengah-text">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while($row = $query_atlet->fetch_array()){

          if($row['status_atlet']==1){
            $status_atlet = "Terkonfirmasi";
          }else{
            $status_atlet = " Belum Terkonfirmasi";
          }

          echo '<tr class="trhover" onclick="detailAtlet('.$row["id_atlet"].')">';
          echo "<td class='tengah-text'>".$nomor."</td>";
          echo "<td class='tengah-text'>".$row['nama_atlet']."</td>";
          echo "<td class='tengah-text'>".$row['jk']."</td>";
          echo "<td class='tengah-text'>".$row['nama_kategori']."</td>";
          echo "<td class='tengah-text'>".$row['berat']." kg</td>";
          echo "<td class='tengah-text'>".$row['tinggi']."</td>";
          echo "<td class='tengah-text'>".$status_atlet."</td>";
          echo "</tr>";
          $nomor++;
        }
       ?>
    </tbody>
  </table>
  <div class="w-100">
    <ul class="pagination kanan">
      <?php
      if($banyak_data>1){
        for($i=1;$i<=$banyak_data;$i++){
          if(isset($active_list)){
            if($active_list==$i){
              echo '<li class="active"><a>'.$i.'</a></li>';
            }else{
              echo "<li><a href='index.php?p=detail&id=".$id_kejuaraan."&r=".$i."'>".$i."</a></li>";
            }
          }else{
            if($i==1){
              echo '<li class="active"><a>'.$i.'</a></li>';
            }else{
              echo "<li><a href='index.php?p=detail&id=".$id_kejuaraan."&r=".$i."'>".$i."</a></li>";
            }
          }
        }
      }
      ?>
    </ul>
  </div>
  </div>
</div>
