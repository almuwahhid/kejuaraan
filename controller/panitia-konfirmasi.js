function edit(id){
  $("#form-konten").html("");
  $("#form-konten").load("include/detail-kejuaraan/edit-peserta.php?id="+id);
}
function konfirmasi(id, link){
  //var confirm = confirm("Apakah Anda ingin mengkonfirmasi ? ");
    $.ajax({
      type : 'POST',
      url : link,
      data : "id_atlet="+id,
      beforeSend:function(){
        $("#form-loading").fadeIn();
      },
      success : function(data){
        $("#form-loading").fadeOut();
        window.location.replace(link);
        alert("BERHASIL MENAMBAH KATEGORI KEJUARAAN");
      },
      error:function(event, textStatus, errorThrown) {
        alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
      }
    });

}
$(document).ready(function(){
  $("#konten-close").click(function(){
    $("body").css("overflow", "scroll");
    $("#form-konten").fadeOut();
    $("#form-konten").html("");
  });
  $("#konten-close").click(function(){
    $("body").css("overflow", "scroll");
    $("#form-konten").fadeOut();
    $("#form-konten").html("");
  });
});
