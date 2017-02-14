$(function() {
	var x = false;
	var lebar;
	var llebar;

	$('#bg-pendaftaran').height(function(){
		return $(this).parent().height();
	});

	$('main').attr('style','min-height:580px');

	$("#form-login").width($(window).width());
	$("#form-login").height($(window).height());

	$(".same-width").each(function(){
		lebar = $(this).width();
	});
	$(".same-width-2").each(function(){
		llebar = $(this).width();
	});

	$(".get-height").each(function(){
		$(this).height(lebar);
	});
	$(".get-height-2").each(function(){
		$(this).height(llebar);
	});
	$(".get-width").each(function(){
		$(this).width(lebar);
	});



	$("#masuk").click(function(){
		$("#form-login").load("login.php");
		$("#form-login").fadeIn("slow");
	});
	$("#masuk").click(function(){
		$("#form-login").load("login.php");
		$("#form-login").fadeIn("slow");
	});

	$("#daftar").click(function(){
		$("#form-login").load("daftar.php");
		$("#form-login").fadeIn("slow");
	});
	$("#form-login").click(function(){
		$("#form-login").fadeOut("slow");
		$("#form-login").empty();
	});
	// --------------------------------------
	$("#navigasi").click(function(){
		if(x == false){
			$("#bar-nav").animate({width:'toggle'},300);
			$("#bg-nav").fadeIn("slow");
			$("#navigasi").html('<i class="fa fa-chevron-left"></i>');
			x = true;
		}else{
			$("#bar-nav").animate({width:'toggle'},300);
			$("#bg-nav").fadeOut("slow");
			$("#navigasi").html('<i class="fa fa-align-justify"></i>');
			x = false;
		}
	});
	$("#bg-nav").click(function(){
		$("#bar-nav").animate({width:'toggle'},300);
		$("#bg-nav").fadeOut("slow");
		$("#navigasi").html('<i class="fa fa-align-justify"></i>');
		x = false;
	});

	$(window).scroll(function(){
		var sticky = $('#filter'),
	    scroll = $(window).scrollTop();

		if (scroll >= 500) {
			sticky.addClass('fix-search');
		}
		else {
			sticky.removeClass('fix-search ');
		}
	});

	// TODO: controller login.php
	$('.tab').click(function () {
	    $('.tabopen').removeClass('tabopen');
	    $(this).addClass('tabopen');
			$("#tag").attr('value', $(this).html());
			if($(this).html()=='PESERTA'){
				$('#daftar-disini').fadeIn();
			}else {
				$('#daftar-disini').fadeOut();
			}
	});
	// TODO: end of login.php
	// --------------------------------------------------------------

	// TODO : controller of panitia-dojang
	$("#tatacara-bayar").click(function(){
		$("body").css("overflow", "hidden");
		$("#form-tambah").load("include/panitia/form-kategori.php");
		$("#form-tambah").fadeIn();
	});
	// TODO : end of controller of panitia-dojang

	// TODO : controller of pembayaran
	$("#tatacara-bayar").click(function(){
		$("body").css("overflow", "hidden");
		$("#form-tatacara-bayar").load("include/pembayaran/tatacara.php");
		$("#form-tatacara-bayar").fadeIn();
	});
	// TODO : end of controller of pembayaran

	// TODO : controller of edit username & password.php
	$("#btn-edit-username").click(function(){
		$("#form-edit-username").fadeIn();
	});
	$("#btn-edit-password").click(function(){
		$("#form-edit-password").fadeIn();
	});
	// TODO : end of controller of edit username & password
	$("#konten-close").click(function(){
		$("body").css("overflow", "scroll");
		$("#form-konten").fadeOut();
		$("#form-konten").html("");
	});
});
function detailAtlet(id){
  $("body").css("overflow", "hidden");
  $("#form-konten").load("include/panitia/detail-atlet.php?id="+id);
  $("#form-konten").fadeIn();
}
