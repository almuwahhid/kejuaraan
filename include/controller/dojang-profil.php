<?php
  include "../../koneksi.php";
  session_start();
  $id_dojang = $_SESSION["id"];
  $query_dojang = mysqli_query($h, "SELECT * from dojang WHERE id_dojang = '$id_dojang'");
  $data_dojang = mysqli_fetch_assoc($query_dojang);
  if(isset($_POST["username"])){
    $username = $_POST["username"];
    $query_cek = mysqli_query($h, "SELECT * from dojang WHERE username = '$username' AND id_dojang != '$id_dojang'");
    $cek_data = mysqli_num_rows($query_cek);
    if($cek_data>0){
      echo "tidak tersedia";
    }else{
      $query_edit_username = mysqli_query($h, "UPDATE dojang SET username='$username' WHERE id_dojang='$id_dojang'");
      if($query_edit_username){
        echo "true";
        session_destroy();
      }else{
        echo "false";
      }
    }
  }else if(isset($_POST["password_baru"])){
    $password_lama = $_POST["password_lama"];
    $password_baru = $_POST["password_baru"];
    $md5_lama = md5($password_lama);
    if($md5_lama!=$data_dojang["password"]){
      echo "salah";
    }else{
      $md5_baru = md5($password_baru);
      $query_edit_password = mysqli_query($h, "UPDATE dojang SET password='$md5_baru' WHERE id_dojang='$id_dojang'");
      if($query_edit_password){
        echo "true";
        session_destroy();
      }else{
        echo "false";
      }
    }
  }else{
    echo "gagal";
  }
 ?>
