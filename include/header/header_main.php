<nav class="pad5-top-bot bg-header navbar-fixed-top bayang" style="z-index:9999">
      <div class="col-md-12">
        <div class="navbar-header">
          <?php
          if(isset($_SESSION['tag']) && $_SESSION['tag']=="PESERTA"){ ?>
            <a class="navbar-brand" href="#" style="font-size:21px" id="navigasi"><i class="fa fa-align-justify"></i></a>
          <?php
          }
          ?>
          <a class="navbar-brand" href="index.php">KEJUARAAN TAE KWON DO</a>
        </div>
        <div class="navbar-header kanan marg8-top">
          <?php
          if(isset($_SESSION['tag']) && $_SESSION['tag']=="PESERTA"){ ?>
          <ul class="nav navbar-nav">
            <li class="font-sedang pad5-top" style="margin-right:5px">
              Selamat Datang <?php echo $_SESSION['username']; ?>
            </li>
            <!-- <li class="font-sedang pad5-top">
              &nbsp; Biaya : Rp. 250.000 &nbsp;
            </li> -->
			      <li><button class="btn btn-danger" onclick="window.open('logout.php', '_self')" id="masuk">KELUAR</button></li>
		      </ul>
          <?php
          }else{
          ?>
          <ul class="nav navbar-nav">
            <li><button class="btn btn-primary" onclick="window.open('pendaftaran.php', '_self')" id="daftar">DAFTAR</button></li>
            <li><button class="btn btn-success" onclick="window.open('login.php', '_self')" id="masuk">MASUK</button></li>
           </ul>
          <?php
          }
          ?>
		    </div><!--/.nav-collapse -->
      </div>
</nav>
<header class="marg50-top">
</header>
<?php
if(isset($_SESSION['tag']) && $_SESSION['tag']=="PESERTA"){
  include "include/navbar.php";
}
?>
<aside id="form-loading" class="w-100 form-2">
  <div class="col-xs-offset-4 marg80-top">
    <img style="width:400px; height:400px" src="img/loading.gif" alt="loading..." />
  </div>
</aside>
