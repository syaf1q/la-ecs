<?php session_start(); ?>
<div class="">
  <div class="widget-header"> <i class="icon-bookmark"></i>
    <h4>
      <div align="right"> <?php echo date('d M Y') ?></div>
    </h4>
    <HR>
    <h3>
      <div> <i class="glyphicon glyphicon-tag"></i> Menu</div>
    </h3>
    <BR>
  </div>
  <div class="row">
	<?php if($_SESSION['usertype'] == '1' || $_SESSION['usertype'] == '3'){ ?>
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail"><a href="page.php?menushort=written_main"><img src="img/writter.jpg" alt="Written Marks Entry"></a>
        <div class="caption">
          <h3 class="glyphicon glyphicon-pencil"><font color="#009933"> Written Marks Entry</font></h3>
          <p></p>
        </div>
      </div>
    </div>
	<?php } ?>
	<?php if($_SESSION['usertype'] == '1' || $_SESSION['usertype'] == '2'){ ?>
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail"><a href="page.php?menushort=oral_main_filter"><img src="img/oral.jpg" alt="Oral Marks Entry"></a>
        <div class="caption">
          <h3 class="glyphicon glyphicon-pencil"><font color="#FF00FF"> Oral Marks Entry</font></h3>
          <p></p>
        </div>
      </div>
    </div>
	<?php } ?>
	<?php if($_SESSION['usertype'] == '1' || $_SESSION['usertype'] == '2'){ ?>
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail"><a href="page.php?menushort=reports"><img src="img/carianmaklumat.jpg" alt="List of Students"></a>
        <div class="caption">
          <h3 class="glyphicon glyphicon-list-alt"><font color="#6666CC"> Reports</font></h3>
          <p></p>
        </div>
      </div>
    </div>
	<?php } ?>
  </div>
  <!--
  <div class="row">
  	<div class="col-sm-6 col-md-4">
      <div class="thumbnail"><a href="page.php?menushort=carian_maklumat_main"><img src="img/carianmaklumat.jpg" alt="Carian Maklumat"></a>
        <div class="caption">
          <h3 class="glyphicon glyphicon-briefcase"><font color="#009933"> Carian Rekod Maklumat</font></h3>
          <p>Menu ini digunakan untuk membuat carian maklumat-maklumat pelanggan. Carian boleh dibuat dari maklumat No Kad Pengenalan, Nama, No Kenderaan , No Polisi & No Bill </p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail"><a href="page.php?menushort=rekod_duit_keluar"><img src="img/transfer.jpg" alt="Rekod Duit Keluar eServices"></a>
        <div class="caption">
          <h3 class="glyphicon glyphicon-usd"><font color="#009933"> Rekod Duit Keluar</font></h3>
          <p>Menu ini digunakan untuk merekodkan duit keluar</p>
        </div>
      </div>
    </div>
  	<div class="col-sm-6 col-md-4">
      <div class="thumbnail"><a href="page.php?menushort=senarai_laporan"><img src="img/report.jpg" alt="Laporan eServices"></a>
        <div class="caption">
          <h3 class="glyphicon glyphicon-book"><font color="#009933"> Senarai Laporan</font></h3>
          <p>Untuk menyemak laporan pembayaran, komisen dan etc</p>
        </div>
      </div>
    </div>
  </div>
  -->
  
</div>
