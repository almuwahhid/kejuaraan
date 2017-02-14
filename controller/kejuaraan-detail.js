$(function(){
  $("#daftar_harga").html($("#daftar_pilih_harga").children().eq(0).attr("label"));
  $("#daftar_pilih_harga").change(function(){
    $("#daftar_harga").html($(this).children(":selected").attr("label"));
  });
  $("#pendaftaran-close").click(function(){
    $("body").css("overflow", "scroll");
    $("#form-peserta").fadeOut();
    $("#form-peserta").html("");
  });
  $("#formpeserta").submit(function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    if($("input").val()=="" || $("textarea").val()==""){
      alert("isi terlebih dahulu kolomnya");
    }else{
      // alert($("#formpeserta").s  erialize());
      $.ajax({
        url: $("#formpeserta").attr("action"),
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend:function(){
          $("#form-loading").fadeIn();
          //alert(data_kejuaraan["tempat_kejuaraan"]);
        },
        success : function(data){
          $("#form-loading").fadeOut();
          window.location.replace("index.php?p=detail&id="+$("#tag").val());
          alert("Berhasil Menambah Mendaftarkan Peserta");
        },
        error:function(event, textStatus, errorThrown) {
          alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
        }
      });
    }
  });
  $("#editpeserta").submit(function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    if($("input").val()=="" || $("textarea").val()==""){
      alert("isi terlebih dahulu kolomnya");
    }else{
      // alert($("#formpeserta").s  erialize());
      $.ajax({
        url: $("#editpeserta").attr("action"),
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend:function(){
          $("#form-loading").fadeIn();
          //alert(data_kejuaraan["tempat_kejuaraan"]);
        },
        success : function(data){
          $("#form-loading").fadeOut();
          window.location.replace("index.php?p=detail&id="+$("#tag").val());
          alert("Berhasil Mengedit Atlet");
        },
        error:function(event, textStatus, errorThrown) {
          alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
        }
      });
    }
  });
});
function tambahP(id, idKej){
  $("#form-peserta").load("include/detail-kejuaraan/form-peserta.php?id="+id+"&idkej="+idKej);
  $("body").css("overflow", "hidden");
  $("#form-peserta").fadeIn();
}
function syarat(id){
  $("#form-peserta").load("include/detail-kejuaraan/syarat-ketentuan.php?id="+id);
  $("body").css("overflow", "hidden");
  $("#form-peserta").fadeIn();
}
function aktifkan(id, id2){
  $.ajax({
    url: id,
    type: 'GET',
    data: '',
    contentType: false,
    processData: false,
    beforeSend:function(){
      $("#form-loading").fadeIn();
      //alert(data_kejuaraan["tempat_kejuaraan"]);
    },
    success : function(data){
      $("#form-loading").fadeOut();
      window.location.replace(id2);
      alert("Berhasil Mendaftar Kejuaraan");
    },
    error:function(event, textStatus, errorThrown) {
      alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
    }
  });
}
function showD(id){
  $("."+id).on("mousemove", function(e) {
    $("#"+id).css("display", "inline-block");
    $("#"+id).css("position", "absolute");
    $("#"+id).stop(1, 1).fadeIn();
    $("#"+id).offset({
      top: e.pageY - $("#"+id).outerHeight(),
      left: e.pageX - ($("#"+id).outerWidth()/2)
    }).mouseleave(function() {
        $("#"+id).fadeOut();
    });
  });
}
function hideD(id){
  $("."+id).on("mouseleave", function(e) {
    $("#"+id).fadeOut();
  });
}
