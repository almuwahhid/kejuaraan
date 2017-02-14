<script type="text/javascript">
$("#pendaftaran-close").click(function(){
  $("body").css("overflow", "scroll");
  $("#form-peserta").fadeOut();
  $("#form-peserta").html("");
});
</script>
<?php
  include "../../koneksi.php";
 if(isset($_GET["id"])){
    $id_kejuaraan = $_GET["id"];
    $query_kejuaraan = mysqli_query($h, "SELECT detail from kejuaraan WHERE id_kejuaraan = '$id_kejuaraan'");
    $data_kejuaraan = mysqli_fetch_assoc($query_kejuaraan);
}else{
  header("Location:index.php");
}
?>
<div class="col-xs-12 marg15-top tengah-text font-putih">
  <h2>Syarat & Ketentuan</h2>
</div>
<div class="col-xs-8 col-xs-offset-2 alert alert-success font-justify">
  <?php echo $data_kejuaraan["detail"] ?>
</div>
<div class="col-md-12 marg15-top kanan-text" style="position:fixed;">
  <a id="pendaftaran-close" href="#" class="btn btn-danger alert"><img src="img/close.png" alt="Close Form" style="width:20px; height:20px"></a>
</div>
