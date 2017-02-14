<?php
include "function/function.php";
$id_panitia = $_SESSION['id'];
$query_kejuaraan = mysqli_query($h, "SELECT * from kejuaraan
																	WHERE id_panitia = '$id_panitia'");
$data_kejuaraan = mysqli_fetch_assoc($query_kejuaraan);
$id_kejuaraan = $data_kejuaraan['id_kejuaraan'];

$query_pembayaran = mysqli_query($h, "SELECT * from pembayaran
																	JOIN kejuaraan_dojang
																	ON pembayaran.id_kejuaraan_dojang = kejuaraan_dojang.id_kejuaraan_dojang
																	JOIN dojang
																	ON kejuaraan_dojang.id_dojang = dojang.id_dojang
																	WHERE kejuaraan_dojang.id_kejuaraan = '$id_kejuaraan'");
$jumlah = mysqli_num_rows($query_pembayaran);
$banyak_data = floor($jumlah/10)+1;
$limit = 1;

if(isset($_GET["r"])){
	$active_list = $_GET["r"];
	$first = ($_GET["r"]*10);
	$limit = $first-10;
	$query_atlet = mysqli_query($h, "SELECT * from pembayaran
																		JOIN kejuaraan_dojang
																		ON pembayaran.id_kejuaraan_dojang = kejuaraan_dojang.id_kejuaraan_dojang
																		JOIN dojang
																		ON kejuaraan_dojang.id_dojang = dojang.id_dojang
																		WHERE kejuaraan_dojang.id_kejuaraan = '$id_kejuaraan'
                                    LIMIT 10 OFFSET ".$limit);
	if($_GET["r"]!=1){
		$nomor = $limit+1;
	}else{
		$nomor = $_GET["r"];
	}
}else{
	$nomor = 1;
	if($banyak_data>1){
		$query_atlet = mysqli_query($h, "SELECT * from pembayaran
																			JOIN kejuaraan_dojang
																			ON pembayaran.id_kejuaraan_dojang = kejuaraan_dojang.id_kejuaraan_dojang
																			JOIN dojang
																			ON kejuaraan_dojang.id_dojang = dojang.id_dojang
																			WHERE kejuaraan_dojang.id_kejuaraan = '$id_kejuaraan'
	                                    LIMIT 10");
	}else{
		$query_atlet = mysqli_query($h, "SELECT * from pembayaran
																			JOIN kejuaraan_dojang
																			ON pembayaran.id_kejuaraan_dojang = kejuaraan_dojang.id_kejuaraan_dojang
																			JOIN dojang
																			ON kejuaraan_dojang.id_dojang = dojang.id_dojang
																			WHERE kejuaraan_dojang.id_kejuaraan = '$id_kejuaraan'");
	}
}
?>
		<main>
			<section id="new-kejuaraan" class="col-md-12 pad10-top-bot">
				<h4 class=" margin-20-left alert alert-success col-xs-2 tag">Konfirmasi Peserta</h4>
				<div class="container">
					<div class="col-md-12 alert alert-success">
						<table class="table table-bordered">
				    <thead>
				      <tr>
				        <th class="tengah-text">No</th>
								<th class="col-xs-2 tengah-text">Kode Bayar</th>
				        <th class="col-xs-5 tengah-text">Nama Dojang</th>
				        <th class="col-xs-3 tengah-text">Tanggal Bayar</th>
				        <th class="col-xs-2 tengah-text">Jumlah Bayar</th>
				      </tr>
				    </thead>
				    <tbody>
				      <?php
				        while($row = $query_pembayaran->fetch_array()){
					        ?><tr class="trhover" onclick="location.href='index.php?p=detail-konfirmasi&id=<?php echo $row['id_kejuaraan_dojang'] ?>&bayar=<?php echo $row['id_pembayaran'] ?>'"><?php
						          echo "<td class='tengah-text'>".$nomor."</td>";
						          echo "<td class='tengah-text'>".$row['kode_bayar']."</td>";
						          echo "<td class='tengah-text'>".$row['nama_dojang']."</td>";
						          echo "<td class='tengah-text'>".showMonth($row['tgl_bayar'])."</td>";
						          echo "<td class='tengah-text'>".number_format($row['jumlah_bayar'],2,",",".")."</td>";
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
