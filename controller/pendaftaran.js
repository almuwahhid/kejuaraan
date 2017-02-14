$(function(){
  $("#btn-pendaftaran").click(function(){
    if($("input").val()=="" || $("textarea").val()==""){
      alert("isi terlebih dahulu kolomnya");
    }else{
      if($("input[name='password']").val()==$("input[name='password_ulang']").val()){
        $.ajax({
          type : 'POST',
          url : $("#form-pendaftaran").attr("action"),
          data : $("#form-pendaftaran").serialize(),
          beforeSend:function(){
            $("#form-loading").fadeIn();
          },
          success : function(data){
            $("#form-loading").fadeOut();
            if(data=="tidak tersedia"){
              alert("Username tidak tersedia")
            }else if (data=="sukses"){
              window.location.replace("login.php");
              alert("BERHASIL MENDAFTAR");
            }else{
              alert("Gagal Mendaftar, cek koneksi Anda")
            }
          },
          error:function(event, textStatus, errorThrown) {
            alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
          }
        });
      }else{
        alert("Password Salah");
      }
    }
  });
});
