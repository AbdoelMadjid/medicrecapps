<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="<? echo base_url();?>user/daftar_request_pengguna" data-original-title="<?php echo $user_request; ?> Request Data Pasien Baru.">
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Total Pengguna</div>
            <div><?php echo $user; ?></div>
            <span  class="notification red"><?php echo $user_request; ?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="<? echo base_url();?>pasien/daftar_pasien" data-original-title="<?php echo $user_request; ?> Request Data Pasien Baru.">
            <i class="glyphicon glyphicon-star green"></i>

            <div>Total Data Pasien</div>
            <div><?php echo $pasien; ?></div>
            <span class="notification red"><?php echo $pasien_request; ?></span>
        </a>
    </div>

   
</div>

<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
	
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-home"></i> Selamat Datang</h2>
		
    </div>
	
    <div class="box-content">
    <section id="icons1">

    <div class="row">

        <div class="col-md-8">
            <h3>Selamat Datang Admin</h3>

            <p>Ini merupakan Halaman utama aplikasi  Rekam Data Medik Pasien. Untuk menggunakan fitur yang ada
			klik menu-menu yang ada di samping kiri</p>
                   
        </div>
        <div class="col-md-4">
		<br>
            <img src="<?php echo base_url();?>img/happy_tooth.png" alt="" height="300" width="300" />
        </div>
    </div>
    </section>

    </div>
	</div>
    </div>
    <!--/span-->

    </div><!--/row-->
