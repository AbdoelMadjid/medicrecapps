<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Halaman Registrasi Aplikasi Rekam Medik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="<?php echo base_url();?>css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>css/charisma-app.css" rel="stylesheet">
    <link href='<?php echo base_url(); ?><?php echo base_url(); ?>bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='<?php echo base_url(); ?>bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/jquery.noty.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/noty_theme_default.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/elfinder.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/elfinder.theme.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/uploadify.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="<?php echo base_url();?><?php echo base_url();?>bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>img/favicon.ico">

</head>

<body>
<div class="ch-container">
    <div class="row">
     
    <div class="row">
  <div  class="box col-md-12">
    <div class="box-inner">
      <div class="well" data-original-title="">
        <h2><i  class="glyphicon glyphicon-edit"></i> Form Registrasi Pengguna Baru  <?php if(true){ echo'<span class="label label-info">New</span>';} ?> </h2>
        <!--
          <div class="box-icon">
              <a href="<?php echo base_url(); ?>#" class="btn btn-setting btn-round btn-default"><i
                      class="glyphicon glyphicon-cog"></i></a>
              <a href="<?php echo base_url(); ?>#" class="btn btn-minimize btn-round btn-default"><i
                      class="glyphicon glyphicon-chevron-up"></i></a>
              <a href="<?php echo base_url(); ?>#" class="btn btn-close btn-round btn-default"><i
                      class="glyphicon glyphicon-remove"></i></a>
          </div>
          -->
      </div>
      <div class="box-content">
	   <?php 
	if(isset($pesan)){
		echo'
	<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong>'.$pesan.'.
                </div>
				';
	}
				?>
				
	  <div class="row">

        <div class="col-md-6">
		<h3> | Biodata Pengguna | </h3>
           <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().$urlAction ; ?>" >
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input type="text" name="nama_lengkap"class="form-control" id="text" value="<?php if(isset($nama_lengkap)) echo $nama_lengkap; ?>"   placeholder="Masukkan Nama lengkap" style="width:400px" >
			<?php if(isset($errnama_lengkap)){ echo'<p><font color="red">Nama Lengkap belum diisi</font></p>'; }?>

		 </div>
		 <div class="form-group">
            <label for="exampleInputEmail1">Nama Panggilan</label>
            <input type="text" name="nama_panggilan"class="form-control" id="text" value="<?php if(isset($nama_panggilan)) echo $nama_panggilan; ?>"   placeholder="Masukkan Nama Paggilan " style="width:400px" >
			<?php if(isset($errnama_panggilan)){ echo'<p><font color="red">Nama Panggilan belum diisi</font></p>'; }?>

		 </div>
		 
		   <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <textarea name="alamat"class="form-control" id="text"   placeholder="Masukkan Alamat " style="width:400px" ><?php if(isset($alamat)) echo $alamat; ?></textarea>
			<?php if(isset($erralamat)){ echo'<p><font color="red">Alamat belum diisi</font></p>'; }?>

		 </div>
		 
		 <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" name="email"class="form-control" id="text" value="<?php if(isset($email)) echo $email; ?>"   placeholder="Masukkan Email Pengguna" style="width:400px" >
			<?php if(isset($erremail)){ echo'<p><font color="red">Email Belum diisi</font></p>'; }?>

		 </div>
		 
		  <div class="form-group">
            <label for="exampleInputEmail1">Kewarganegaraan</label>
            <input type="text"  name="kewarganegaraan" class="form-control" id="text" value="<?php if(isset($kewarganegaraan)) echo $kewarganegaraan; ?>"   placeholder="Masukkan Kewarganegaraan" style="width:400px" >
			<?php if(isset($errkewarganegaraan)){ echo'<p><font color="red">Kewarganegaraan belum diisi</font></p>'; }?>
		  </div>
		 
		
		 
          
          
         
      
        </div>
        <div class="col-md-6">
		  <h3> | Data Login | </h3>
		  <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text"  name="username" class="form-control" id="text" value="<?php if(isset($username)) echo $username; ?>"   placeholder="Masukkan Username" style="width:400px" >
			<?php if(isset($errusername)){ echo'<p><font color="red">Username belum diisi</font></p>'; }?>
		  </div>
          <?php if(isset($edit)){
            echo'
            <div class="form-group">
                              <label for="exampleInputPassword1">Recent Password</label>
                              <input type="password" name="recpassword" class="form-control" id="exampleInputPassword1" placeholder="Password" style="width:400px">
							  
                          </div>';
            
            }?>
          <div class="form-group">
            <label for="exampleInputPassword1">New Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" style="width:400px">
			<?php if(isset($errpassword)){ echo'<p><font color="red">Password belum diisi</font></p>'; }?>
          </div>
          <label for="exampleInputEmail1">Peran</label>
		  <?php if(isset($errperan)){ echo'<p><font color="red">Peran belum diisi</font></p>'; }?>
          <div class="radio">
            <label>
            <input type="radio" name="peran" id="optionsRadios1" value="2"   <?php if(isset($role) && $role==2 ) echo 'checked'; ?> >
            Dokter Gigi
            </label>
            <label>
            <input type="radio" name="peran" id="optionsRadios1" value="3" <?php if(isset($role) && $role==3 ) echo 'checked'; ?>>
            Klinik
            </label>
            <label>
            <input type="radio" name="peran" id="optionsRadios1" value="4" <?php if(isset($role) && $role==4 ) echo 'checked'; ?>>
            DVI
            </label>
          </div>
		  
		 
		   <div class="form-group">
            <label for="exampleInputFile">File Foto</label>
            <input type="file" name="fotouser" id="exampleInputFile">
            <p class="help-block">Example block-level help text here.</p>
			
          </div>
		  <?php if(isset($url_foto) && $url_foto != ''.base_url().'img/fotouser/default.jpg' ){
			  
			  echo '<img src="'.base_url().$url_foto.'" alt="" />';
		  }
		else{
	  echo '<img src="'.base_url().'img/fotouser/default.jpg" alt="" />'; 
	  }?>
				
         
		 
         <br>
		 <br>
      <button type="submit"  class="btn btn-success btn-lg ">Simpan</button>
        </form>
        </div>
		
		
    </div>
	
	  
       
	  </div>
    </div>
  </div>
  <!--/span-->
</div>
<!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="<?php echo base_url();?>js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='<?php echo base_url();?>bower_components/moment/min/moment.min.js'></script>
<script src='<?php echo base_url();?>bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='<?php echo base_url();?>js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="<?php echo base_url();?>bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="<?php echo base_url();?>bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="<?php echo base_url();?>js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="<?php echo base_url();?>bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="<?php echo base_url();?>bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="<?php echo base_url();?>js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="<?php echo base_url();?>js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="<?php echo base_url();?>js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="<?php echo base_url();?>js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="<?php echo base_url();?>js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="<?php echo base_url();?>js/charisma.js"></script>


</body>
</html>
