$(document).ready(function() {
  $("#btn-tambah-kategori").click(function(){
    $("body").css("overflow", "hidden");
    $("#form-konten").load("include/panitia/form-kategori.php");
    $("#form-konten").fadeIn();
  });
  $("#btn-tambah-kelas").click(function(){
    $("body").css("overflow", "hidden");
    $("#form-konten").load("include/panitia/form-kelas.php");
    $("#form-konten").fadeIn();
  });
  $("#konten-close").click(function(){
    $("body").css("overflow", "scroll");
    $("#form-konten").fadeOut();
    $("#form-konten").html("");
  });

  // TODO : untuk perintah button tambah kategori
  $("#submit-kategori").click(function(){
    if($("input").val()==""){
      alert("isi terlebih dahulu kolomnya");
    }else{
      $.ajax({
        type : 'POST',
        url : $("#form-kategori").attr("action"),
        data : $("#form-kategori").serialize(),
        beforeSend:function(){
          $("#form-loading").fadeIn();
				},
        success : function(data){
          $("#form-loading").fadeOut();
          window.location.replace("index.php?p=create");
          alert("BERHASIL MENAMBAH KATEGORI KEJUARAAN");
        },
        error:function(event, textStatus, errorThrown) {
					alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
				}
      });
    }
  });
  $("#submit-kelas").click(function(){
    if($("input").val()==""){
      alert("isi terlebih dahulu kolomnya");
    }else{
      $.ajax({
        type : 'POST',
        url : $("#form-kelas").attr("action"),
        data : $("#form-kelas").serialize(),
        beforeSend:function(){
          $("#form-loading").fadeIn();
				},
        success : function(data){
          $("#form-loading").fadeOut();
          window.location.replace("index.php?p=create");
          alert("BERHASIL MENAMBAH KELAS KEJUARAAN");
        },
        error:function(event, textStatus, errorThrown) {
					alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
				}
      });
    }
  });
  $("#submit-cp").click(function(){
    if($("input[name='nama_cp']").val()=="" || $("input[name='no_telp']").val()==""){
      alert("isi terlebih dahulu kolomnya");
    }else{
      $.ajax({
        type : 'POST',
        url : $("#form-cp").attr("action"),
        data : $("#form-cp").serialize(),
        beforeSend:function(){
          $("#form-loading").fadeIn();
				},
        success : function(data){
          $("#form-loading").fadeOut();
          window.location.replace("index.php?p=create");
          alert("BERHASIL MENAMBAH CP Panitia");
        },
        error:function(event, textStatus, errorThrown) {
					alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
				}
      });
    }
  });
  $("#form-kejuaraan").submit(function(e){
    e.preventDefault();
    var nicInstance = nicEditors.findEditor('area');
    var messageContent = nicInstance.getContent();
    var formData = new FormData($(this)[0]);
    $.ajax({
      url: $("#form-kejuaraan").attr("action"),
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
        window.location.replace("index.php?p=create");
        alert("BERHASIL MENGUBAH KEJUARAAN");
      },
      error:function(event, textStatus, errorThrown) {
        alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
      }
    });
    //dataForm.append("file", $("#file_gambar").prop("files")[0]);
    //alert(messageContent);
    //alert($("#form-kejuaraan").serializeArray());
   });

});
function aktifkan(){
  $.ajax({
    url: "index.php?p=create",
    type: 'GET',
    data: 'active=true',
    contentType: false,
    processData: false,
    beforeSend:function(){
      $("#form-loading").fadeIn();
      //alert(data_kejuaraan["tempat_kejuaraan"]);
    },
    success : function(data){
      $("#form-loading").fadeOut();
      window.location.replace("index.php?p=create");
      alert("Berhasil Mengaktifkan Kejuaraan");

    },
    error:function(event, textStatus, errorThrown) {
      alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
    }
  });
}
function showD(id){
  $("."+id).on("mousemove", function(e) {
    $("#"+id).stop(1, 1).fadeIn();
    $("#"+id).css("display", "inline-block");
    $("#"+id).css("position", "absolute");
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
