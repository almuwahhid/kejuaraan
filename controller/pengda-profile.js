var form_identitas = $("#form-identitas").html();
$(function(){
  $("#btn-identitas").click(function(){
    if($("input[name='nama']").val()=="" || $("textarea").val()=="" || $("input[name='no_telp']").val()=="" ){
      alert("isi terlebih dahulu kolomnya");
    }else{
      $.ajax({
        type : 'POST',
        url : $("#form-identitas").attr("action"),
        data : $("#form-identitas").serialize(),
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
        url : $("#form-identitas").attr("action"),
        data : 'username='+$("input[name='username']").val(),
        beforeSend:function(){
          $("#form-loading").fadeIn();
				},
        success : function(data){
          $("#form-loading").fadeOut();
          window.location.replace("pengda-login.php");
          alert("BERHASIL MENGUBAH IDENTITAS");
        },
        error:function(event, textStatus, errorThrown) {
					alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
				}
      });
    }
  });
});
