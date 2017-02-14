var body = $(body).html();
$(function(){
  $("input[type='button']").click(function(){
    if($("input[name='penyelenggara']").val()=="" || $("textarea").val()=="" ){
      alert("isi terlebih dahulu kolomnya");
    }else{
      $.ajax({
        type : 'POST',
        url : $("form").attr("action"),
        data : $("form").serialize(),
        beforeSend:function(){
          $("#form-loading").fadeIn();
				},
        success : function(data){
          $("#form-loading").fadeOut();
          window.location.replace("index.php");
          alert("BERHASIL TAMBAH DATA");
        },
        error:function(event, textStatus, errorThrown) {
					alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
				}
      });
    }
  });
});
