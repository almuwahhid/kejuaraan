function bayar(id){
  $("body").css("overflow", "hidden");
  $("#form-konten").load("include/dojang/form-pembayaran.php?id="+id);
  $("#form-konten").fadeIn();
}
$(document).ready(function(){
  $("#konten-close").click(function(){
    $("body").css("overflow", "scroll");
    $("#form-konten").fadeOut();
    $("#form-konten").html("");
  });
  $('#bg-pendaftaran').height(function(){
    return $(this).parent().height();
  });
  $("#btn-bayar").click(function(){
    if($("input").val()=="" || $("textarea").val()=="" ){
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
          window.location.replace("index.php?p=pembayaran");
          alert("BERHASIL TAMBAH DATA");
        },
        error:function(event, textStatus, errorThrown) {
					alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
				}
      });
    }
  });
});
