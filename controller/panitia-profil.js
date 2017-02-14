var form_identitas = $("#form-identitas").html();
$(function(){
  $("#btn-identitas").click(function(){
    if($("input[name='nama_penyelenggara']").val()=="" || $("textarea").val()==""){
      alert("isi terlebih dahulu kolomnya");
    }else{
      $.ajax({
        type : 'POST',
        url : $("#form-profil").attr("action"),
        data : $("#form-profil").serialize(),
        beforeSend:function(){
          $("#form-loading").fadeIn();
				},
        success : function(data){
          $("#form-loading").fadeOut();
          window.location.replace("index.php?p=profil");
          alert("BERHASIL MENGUBAH IDENTITAS");
        },
        error:function(event, textStatus, errorThrown) {
					alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
				}
      });
    }
  });
  $("#edit-username").click(function(){
    if($("input[name='username']").val()==""){
      alert("isi terlebih dahulu kolomnya");
    }else{
      $.ajax({
        type : 'POST',
        url : "include/controller/edit-panitia-profil.php",
        data : 'username='+$("input[name='username']").val(),
        beforeSend:function(){
          $("#form-loading").fadeIn();
				},
        success : function(data){
          $("#form-loading").fadeOut();
          if(data=="tidak tersedia"){
            alert("Username sudah Ada, ganti username lain !!");
          }else if(data=="true"){
            window.location.replace("login.php");
            alert("BERHASIL MENGUBAH IDENTITAS");
          }
        },
        error:function(event, textStatus, errorThrown) {
					alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
				}
      });
    }
  });
  $("#edit-password").click(function(){
    if($("input[name='password_lama']").val()=="" || $("input[name='password_baru']").val()=="" ){
      alert("isi terlebih dahulu kolomnya");
    }else{
      $.ajax({
        type : 'POST',
        url : "include/controller/edit-panitia-profil.php",
        data : 'password_lama='+$("input[name='password_lama']").val()+"&password_baru="+$("input[name='password_baru']").val(),
        beforeSend:function(){
          $("#form-loading").fadeIn();
				},
        success : function(data){
          $("#form-loading").fadeOut();
          if(data=="salah"){
            alert("Password yang Anda masukkan salah !!");
          }else if(data=="true"){
            window.location.replace("login.php");
            alert("BERHASIL MENGUBAH PASSWORD");
          }else{
            alert("GAGAL MENGUBAH PASSWORD");
          }
        },
        error:function(event, textStatus, errorThrown) {
					alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
				}
      });
    }
  });
});
