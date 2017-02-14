<?php
$id_panitia = $_SESSION['id'];

$query_atlet = mysqli_query($h, "SELECT * from atlet  WHERE id_kejuaraan_dojang = '$id_kejuaraan_dojang'");
//$data_atlet = mysqli_fetch_assoc($query_atlet);

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
																		JOIN dojang
																		ON kejuaraan_dojang.id_dojang = dojang.id_dojang
																		JOIN kejuaraan
																		ON kejuaraan.id_kejuaraan = kejuaraan_dojang.id_kejuaraan
																		WHERE kejuaraan_dojang.id_kejuaraan_dojang = '$id_kejuaraan_dojang'
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
																			JOIN dojang
																			ON kejuaraan_dojang.id_dojang = dojang.id_dojang
																			JOIN kejuaraan
																			ON kejuaraan.id_kejuaraan = kejuaraan_dojang.id_kejuaraan
																			WHERE kejuaraan_dojang.id_kejuaraan_dojang = '$id_kejuaraan_dojang'
	                                    LIMIT 10");
	}else{
		$query_atlet = mysqli_query($h, "SELECT * from atlet
																			JOIN kejuaraan_dojang
																			ON kejuaraan_dojang.id_kejuaraan_dojang = atlet.id_kejuaraan_dojang
																			JOIN kategori_kejuaraan
																			ON atlet.id_kategori = kategori_kejuaraan.id_kategori
																			JOIN dojang
																			ON kejuaraan_dojang.id_dojang = dojang.id_dojang
																			JOIN kejuaraan
																			ON kejuaraan.id_kejuaraan = kejuaraan_dojang.id_kejuaraan
																			WHERE kejuaraan_dojang.id_kejuaraan_dojang = '$id_kejuaraan_dojang'");
	}
}
?>
<script src="controller/panitia-konfirmasi.js" type="text/javascript"></script>
<div class="col-md-12 alert alert-success" id="atlet">
  <div class="w-100">
    <nav class="head-triangle-right label label-success col-xs-4 marg-1p-left" style="float:left;" style="position:absolute;">
      <b>ATLET DOJANG</b>
    </nav>
  </div>
	<div class="w-100 marg20-top">
		<table class="table table-bordered marg20-top">
			<thead>
				<tr>
					<th>No</th>
					<th class="col-xs-3 tengah-text">Nama Atlet</th>
					<th class="col-xs-2 tengah-text">Jenis Kelamin</th>
					<th class="col-xs-1 tengah-text">Kategori</th>
					<th class="col-xs-1 tengah-text">Berat</th>
					<th class="col-xs-1 tengah-text">Tinggi</th>
					<th class="col-xs-1 tengah-text">Tgl lahir</th>
					<th class="col-xs-3 tengah-text">Asal Dojang</th>
					<th class="col-xs-1 tengah-text">Konfirmasi</th>

				</tr>
			</thead>
			<tbody>
				<?php
				while($row = $query_atlet->fetch_array()){
					echo '<tr class="trhover">';
					echo '<td class="tengah-text"  onclick="detailAtlet('.$row["id_atlet"].')">'.$nomor."</td>";
					echo '<td onclick="detailAtlet('.$row["id_atlet"].')">'.$row['nama_atlet']."</td>";
					echo '<td class="tengah-text"  onclick="detailAtlet('.$row["id_atlet"].')">'.$row['jk']."</td>";
					echo '<td class="tengah-text"  onclick="detailAtlet('.$row["id_atlet"].')">'.$row['nama_kategori']."</td>";
					echo '<td class="tengah-text"  onclick="detailAtlet('.$row["id_atlet"].')">'.$row['berat']." kg</td>";
					echo '<td class="tengah-text"  onclick="detailAtlet('.$row["id_atlet"].')">'.$row['tinggi']."</td>";
					echo '<td class="tengah-text"  onclick="detailAtlet('.$row["id_atlet"].')">'.showMonth($row['tgl_lahir'])."</td>";
					echo '<td class="tengah-text"  onclick="detailAtlet('.$row["id_atlet"].')">'.$row['nama_dojang']."</td>";
					if($row['status_atlet']==1){
						echo '<td class="tengah-text">Confirmed</td>';
					}else{
						echo "<td class='tengah-text'><button class='btn btn-warning w-100' onclick=konfirmasi(".$row["id_atlet"].",'".$_SERVER['REQUEST_URI']."')>Konfirmasi</button></td>";
					}
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
</div>
