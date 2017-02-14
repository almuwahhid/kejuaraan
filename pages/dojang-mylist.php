<?php
include "function/function.php";
$id_dojang = $_SESSION["id"];


$jumlah = mysqli_num_rows(mysqli_query($h, "SELECT * from kejuaraan_dojang"));
$banyak_data = floor($jumlah/10)+1;
$limit = 1;
if(isset($_GET["r"])){
	$active_list = $_GET["r"];
	$first = ($_GET["r"]*10);
	$limit = $first-10;
	$data = mysqli_query($h, "SELECT * from kejuaraan_dojang
														JOIN kejuaraan
														ON kejuaraan_dojang.id_kejuaraan = kejuaraan.id_kejuaraan
														JOIN panitia
														ON kejuaraan.id_panitia = panitia.id_panitia
														WHERE id_dojang = '$id_dojang'
														ORDER BY id_kejuaraan_dojang DESC
														LIMIT 10 OFFSET ".$limit);
	if($_GET["r"]!=1){
		$nomor = $limit+1;
	}else{
		$nomor = $_GET["r"];
	}
}else{
	$nomor = 1;
	if($banyak_data>1){
		$data = mysqli_query($h, "SELECT * from kejuaraan_dojang
															JOIN kejuaraan
															ON kejuaraan_dojang.id_kejuaraan = kejuaraan.id_kejuaraan
															JOIN panitia
															ON kejuaraan.id_panitia = panitia.id_panitia
															WHERE id_dojang = '$id_dojang'
															ORDER BY id_kejuaraan_dojang DESC
		  												LIMIT 10");
	}else{
		$data = mysqli_query($h, "SELECT * from kejuaraan_dojang
															JOIN kejuaraan
															ON kejuaraan_dojang.id_kejuaraan = kejuaraan.id_kejuaraan
															JOIN panitia
															ON kejuaraan.id_panitia = panitia.id_panitia
															WHERE id_dojang = '$id_dojang'
															ORDER BY id_kejuaraan_dojang DESC");
	}
}
?>
		<main>
			<section id="new-kejuaraan" class="col-md-12 pad10-top-bot">
				<h4 class=" margin-20-left alert alert-success col-xs-3 tag">Daftar Kejuaraan Saya</h4>
				<div class="container">
					<div class="col-md-12 alert alert-success">
						<table class="table table-bordered">
            <thead>
              <tr>
                <th class="tengah-text">No</th>
                <th class="tengah-text col-xs-4">Kejuaraan</th>
                <th class="col-xs-3 tengah-text">Penyelenggara</th>
								<th class="col-xs-2 tengah-text">Tanggal Pelaksanaan</th>
                <th class="col-xs-2 tengah-text">Tempat</th>
                <th class="col-xs-1 tengah-text">Jumlah Peserta</th>
              </tr>
            </thead>
            <tbody>
							<?php
								$no=0;
								while($row = $data->fetch_array()){
										$id_kejuaraan_dojang = $row["id_kejuaraan_dojang"];
										$query_jumlah_atlet = mysqli_query($h, "SELECT * from atlet WHERE id_kejuaraan_dojang = '$id_kejuaraan_dojang'");
										$jumlah_atlet = mysqli_num_rows($query_jumlah_atlet);
									?>
									<tr class="trhover" onclick="location.href='index.php?p=detail&id=<?php echo $row['id_kejuaraan'] ?>'"><?php
									echo "<td class='tengah-text'>".$nomor."</td>";
									echo "<td class='tengah-text'>".$row['nama_kejuaraan']."</td>";
									echo "<td class='tengah-text'>".$row['penyelenggara']."</td>";
									echo "<td class='tengah-text'>".showMonth($row['tgl_pelaksanaan'])."</td>";
									echo "<td class='tengah-text'>".$row['tempat']."</td>";
									echo "<td class='tengah-text'>".$jumlah_atlet."</td>";
									// echo '<td>
									// 				<a href="index.php?p=detail&id='.$row['id_kejuaraan'].'" class="btn btn-warning w-100">DETAIL</a>
									// 			</td>';
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
