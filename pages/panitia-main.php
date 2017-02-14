<?php
$id_panitia = $_SESSION['id'];
$query_atlet = mysqli_query($h, "SELECT * from atlet
																	JOIN kejuaraan_dojang
																	ON kejuaraan_dojang.id_kejuaraan_dojang = atlet.id_kejuaraan_dojang
																	JOIN kategori_kejuaraan
																	ON atlet.id_kategori = kategori_kejuaraan.id_kategori
																	JOIN dojang
																	ON kejuaraan_dojang.id_dojang = dojang.id_dojang
																	JOIN kejuaraan
																	ON kejuaraan.id_kejuaraan = kejuaraan_dojang.id_kejuaraan
																	WHERE kejuaraan.id_panitia = '$id_panitia'");
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
																		WHERE kejuaraan.id_panitia = '$id_panitia'
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
																			WHERE kejuaraan.id_panitia = '$id_panitia'
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
																			WHERE kejuaraan.id_panitia = '$id_panitia'");
	}
}
?>
		<main>
			<section id="new-kejuaraan" class="col-md-12 pad10-top-bot">
				<h4 class=" margin-20-left alert alert-success col-xs-2 tag">Daftar Peserta</h4>
				<div class="container">
					<div class="col-md-12 alert alert-success">
						<table class="table table-bordered">
				    <thead>
				      <tr>
				        <th>No</th>
				        <th class="col-xs-3 tengah-text">Nama Atlet</th>
				        <th class="col-xs-1 tengah-text">Jenis Kelamin</th>
				        <th class="col-xs-1 tengah-text">Kategori</th>
				        <th class="col-xs-1 tengah-text">Berat</th>
				        <th class="col-xs-1 tengah-text">Tinggi</th>
				        <th class="col-xs-1 tengah-text">Tgl lahir</th>
				        <th class="col-xs-3 tengah-text">Asal Dojang</th>
				        <th class="col-xs-2 tengah-text">foto</th>
				      </tr>
				    </thead>
				    <tbody>
				      <?php
				        while($row = $query_atlet->fetch_array()){
				          echo '<tr class="trhover" onclick="detailAtlet('.$row["id_atlet"].')">';
				          echo "<td class='tengah-text'>".$nomor."</td>";
				          echo "<td>".$row['nama_atlet']."</td>";
				          echo "<td class='tengah-text'>".$row['jk']."</td>";
				          echo "<td class='tengah-text'>".$row['nama_kategori']."</td>";
				          echo "<td class='tengah-text'>".$row['berat']." kg</td>";
				          echo "<td class='tengah-text'>".$row['tinggi']."</td>";
				          echo "<td class='tengah-text'>".$row['tgl_lahir']."</td>";
				          echo "<td class='tengah-text'>".$row['nama_dojang']."</td>";
				          echo "<td class='tengah-text'>".$row['foto_atlet']."</td>";
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
				</div
			</section>
		</main>
