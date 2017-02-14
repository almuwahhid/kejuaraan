<?php
$id_dojang = $_SESSION['id'];

$query_pembayaran = mysqli_query($h, "SELECT * from pembayaran
                                      JOIN kejuaraan_dojang
                                      ON kejuaraan_dojang.id_kejuaraan_dojang = pembayaran.id_kejuaraan_dojang
                                      WHERE kejuaraan_dojang.id_dojang = '$id_dojang'");

$jumlah = mysqli_num_rows($query_pembayaran);
$banyak_data = floor($jumlah/10)+1;
$limit = 1;

// menghitung banyak uang yang habis
//$data_kejuaraan_dojang = mysqli_fetch_assoc(mysqli_query($h, "SELECT * from atlet  WHERE id_kejuaraan_dojang = '$id_dojang'"));
//$id_kejuaraan_dojang = $data_kejuaraan_dojang["id_kejuaraan_dojang"];
//$query_atlet = mysqli_query($h, "SELECT * from atlet  WHERE id_kejuaraan_dojang = '$id_kejuaraan_dojang' AND status_atlet = '0'");
// end of menghitung banyak uang yang habis
$status_biaya = true;
$biaya = 0;



if(isset($_GET["k"])){
	$active_list = $_GET["k"];
	$first = ($_GET["k"]*10);
	$limit = $first-10;
	$query_konfirmasi = mysqli_query($h, "SELECT * from pembayaran
                                        JOIN kejuaraan_dojang
                                        ON kejuaraan_dojang.id_kejuaraan_dojang = pembayaran.id_kejuaraan_dojang
                                        JOIN kejuaraan
                                        ON kejuaraan_dojang.id_kejuaraan = kejuaraan.id_kejuaraan
                                        WHERE kejuaraan_dojang.id_dojang = '$id_dojang'
                                        LIMIT 10 OFFSET ".$limit);
	if($_GET["k"]!=1){
		$nomor = $limit+1;
	}else{
		$nomor = $_GET["k"];
  }
}else{
	$nomor = 1;
	if($banyak_data>1){
		$query_konfirmasi = mysqli_query($h, "SELECT * from pembayaran
                                          JOIN kejuaraan_dojang
                                          ON kejuaraan_dojang.id_kejuaraan_dojang = pembayaran.id_kejuaraan_dojang
                                          JOIN kejuaraan
                                          ON kejuaraan_dojang.id_kejuaraan = kejuaraan.id_kejuaraan
                                          WHERE kejuaraan_dojang.id_dojang = '$id_dojang'
	                                        LIMIT 10");
	}else{
		$query_konfirmasi = mysqli_query($h, "SELECT * from pembayaran
                                          JOIN kejuaraan_dojang
                                          ON kejuaraan_dojang.id_kejuaraan_dojang = pembayaran.id_kejuaraan_dojang
                                          JOIN kejuaraan
                                          ON kejuaraan_dojang.id_kejuaraan = kejuaraan.id_kejuaraan
                                          WHERE kejuaraan_dojang.id_dojang = '$id_dojang'");
	}
}
?>
<script src="controller/dojang-konfirmasi.js" type="text/javascript"></script>
<div class="col-md-12 alert alert-success" id="atlet">
  <div class="w-100">
    <nav class="head-triangle-right label label-warning col-xs-4 marg-1p-left" style="float:left;" style="position:absolute;">
      <b>DAFTAR PEMBAYARAN</b>
    </nav>
  </div>
	<div class="w-100 marg20-top">
		<table class="table table-bordered marg20-top">
			<thead>
				<tr>
					<th>No</th>
          <th class="col-xs-1 tengah-text">Kode Bayar</th>
					<th class="col-xs-3 tengah-text">Kejuaraan</th>
					<th class="col-xs-2 tengah-text">Tanggal Bayar</th>
					<th class="col-xs-3 tengah-text">Nama</th>
					<th class="col-xs-1 tengah-text">Nomor Rekening</th>
					<th class="col-xs-2 tengah-text">Jumlah Bayar</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while($row = $query_konfirmasi->fetch_array()){

					echo '<tr>';
					//  echo '<td class="tengah-text"  onclick="detailAtlet('.$row["id_atlet"].')">'.$nomor."</td>";
					 echo '<td class="tengah-text"  >'.$nomor."</td>";
					 echo '<td class="tengah-text"  >'.$row['kode_bayar']."</td>";
					 echo '<td class="tengah-text"  >'.$row['nama_kejuaraan']."</td>";
					 echo '<td class="tengah-text"  >'.showMonth($row['tgl_bayar'])."</td>";
           echo '<td class="tengah-text"  >'.$row['nama_pembayar']."</td>";
           echo '<td class="tengah-text"  >'.$row['no_rekening']."</td>";
           echo '<td class="tengah-text"  >'.number_format($row['jumlah_bayar'],2,",",".")."</td>";
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
            echo "<li><a href='index.php?p=pembayaran&k=".$i."'>".$i."</a></li>";
          }
        }else{
          if($i==1){
            echo '<li class="active"><a>'.$i.'</a></li>';
          }else{
            echo "<li><a href='index.php?p=pembayaran&k=".$i."'>".$i."</a></li>";
          }
        }
      }
    }
    ?>
  </ul>
</div>
</div>
