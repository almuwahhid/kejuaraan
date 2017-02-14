<?php

$id_dojang = $_SESSION['id'];

$query_kejuaraan_dojang = mysqli_query($h, "SELECT * from kejuaraan_dojang  WHERE id_dojang = '$id_dojang'");

$jumlah = mysqli_num_rows($query_kejuaraan_dojang);
$banyak_data = floor($jumlah/10)+1;
$limit = 1;

// status pembayaran



if(isset($_GET["r"])){
	$active_list = $_GET["r"];
	$first = ($_GET["r"]*10);
	$limit = $first-10;
	$query_konfirmasi = mysqli_query($h, "SELECT * from kejuaraan_dojang
                                        JOIN kejuaraan
                                        ON kejuaraan_dojang.id_kejuaraan = kejuaraan.id_kejuaraan
                                        WHERE id_dojang = '$id_dojang'
                                        LIMIT 10 OFFSET ".$limit);
	if($_GET["r"]!=1){
		$nomor = $limit+1;
	}else{
		$nomor = $_GET["r"];
	}
}else{
	$nomor = 1;
	if($banyak_data>1){
		$query_konfirmasi = mysqli_query($h, "SELECT * from kejuaraan_dojang
                                          JOIN kejuaraan
                                          ON kejuaraan_dojang.id_kejuaraan = kejuaraan.id_kejuaraan
                                          WHERE id_dojang = '$id_dojang'
	                                        LIMIT 10");
	}else{
		$query_konfirmasi = mysqli_query($h, "SELECT * from kejuaraan_dojang
                                          JOIN kejuaraan
                                          ON kejuaraan_dojang.id_kejuaraan = kejuaraan.id_kejuaraan
                                          JOIN panitia
                                          ON panitia.id_panitia = kejuaraan.id_panitia
                                          WHERE id_dojang = '$id_dojang'");
	}
}
?>
<script src="controller/dojang-konfirmasi.js" type="text/javascript"></script>
<div class="col-md-12 alert alert-success" id="atlet">
  <div class="w-100">
    <nav class="head-triangle-right label label-success col-xs-4 marg-1p-left" style="float:left;" style="position:absolute;">
      <b>DAFTAR KEJUARAAN</b>
    </nav>
  </div>
	<div class="w-100 marg20-top">
		<table class="table table-bordered marg20-top">
			<thead>
				<tr>
					<th>No</th>
          <th class="col-xs-3 tengah-text">Kejuaraan</th>
					<th class="col-xs-3 tengah-text">Penyelenggara</th>
					<th class="col-xs-2 tengah-text">Tanggal Daftar</th>
					<th class="col-xs-2 tengah-text">Tanggal Pelaksanaan</th>
					<th class="col-xs-2 tengah-text">Jumlah Bayar</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while($row = $query_konfirmasi->fetch_array()){
					$status_biaya = true;
					$biaya = 0;

          $id_kejuaraan_dojang = $row["id_kejuaraan_dojang"];
          $query_biaya = mysqli_query($h, "SELECT * from atlet
                                                JOIN kategori_kejuaraan
                                                ON atlet.id_kategori = kategori_kejuaraan.id_kategori
                                                WHERE atlet.id_kejuaraan_dojang = '$id_kejuaraan_dojang'
																								AND atlet.status_atlet = '0'");
          while($kategori = $query_biaya->fetch_array()){
            if($kategori["status_kelompok"]==1 && $status_biaya==true){
              $biaya += $kategori["biaya"];
              $status_biaya = false;
            }else if($kategori["status_kelompok"]==0){
              $biaya += $kategori["biaya"];
            }
          }

					echo '<tr class="trhover" onclick="bayar('.$row["id_kejuaraan_dojang"].')">';
					//  echo '<td class="tengah-text"  >'.$nomor."</td>";
					 echo '<td class="tengah-text"  >'.$nomor."</td>";
					 echo '<td >'.$row['nama_kejuaraan']."</td>";
					 echo '<td class="tengah-text"  >'.$row['penyelenggara']."</td>";
					 echo '<td class="tengah-text"  >'.showMonth($row['tgl_buka_daftar']).' - '.showMonth($row['tgl_tutup_daftar'])."</td>";
					 echo '<td class="tengah-text"  >'.showMonth($row['tgl_pelaksanaan']).' - '.showMonth($row['tgl_berakhir'])."</td>";
					 echo '<td class="tengah-text"  >Rp. '.number_format($biaya,2,",",".")."</td>";
					echo "</tr>";
					$nomor++;
				}
				?>
			</tbody>
		</table>
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
            echo "<li><a href='index.php?p=pembayaran&r=".$i."'>".$i."</a></li>";
          }
        }else{
          if($i==1){
            echo '<li class="active"><a>'.$i.'</a></li>';
          }else{
            echo "<li><a href='index.php?p=pembayaran&r=".$i."'>".$i."</a></li>";
          }
        }
      }
    }
    ?>
  </ul>
</div>
</div>
