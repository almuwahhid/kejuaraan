<?php
include "../../koneksi.php";
if(isset($_POST["nama_dojang"])){
  $nama_dojang = $_POST["nama_dojang"];
  $alamat_dojang = $_POST["alamat_dojang"];
  $username = $_POST["username"];
  $tanggal = date('Y-m-d');
  $telp_dojang = $_POST["telp_dojang"];
  $password = md5($_POST["password"]);

  $query_cek = mysqli_query($h, "SELECT * from dojang WHERE username = '$username'");
  $cek_data = mysqli_num_rows($query_cek);
  if($cek_data>0){
    echo "tidak tersedia";
  }else{
    $query_tambah = mysqli_query($h, "INSERT INTO dojang(nama_dojang, tgl_daftar, username, password, alamat_dojang, no_telp) VALUES('$nama_dojang', '$tanggal', '$username', '$password', '$alamat_dojang', '$telp_dojang' )");
    if($query_tambah){
      echo "sukses";
    }else {
      echo "gagal";
    }
  }
}
?>
