

<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
      <div class="well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> Form Registrasi Pengguna  <?php if(isset($edit)){ echo'<span class="label label-info">Edit</span>';} ?> </h2>
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
		 
		
		 
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text"  name="username" class="form-control" id="text" value="<?php if(isset($username)) echo $username; ?>"   placeholder="Masukkan Username" style="width:400px" >
			<?php if(isset($errusername)){ echo'<p><font color="red">Username belum diisi</font></p>'; }?>
		  </div>
         
          <div class="form-group">
            <label for="exampleInputPassword1">New Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" style="width:400px">
			<?php if(isset($errpassword)){ echo'<p><font color="red">Password belum diisi</font></p>'; }?>
          </div>
		  <div class="form-group">
                              <label for="exampleInputPassword1">Konfirmasi  Password</label>
                              <input type="password" name="confirmpassword" class="form-control" id="exampleInputPassword1" placeholder="Password" style="width:400px">
							  
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
          
          <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      
        </div>
        <div class="col-md-6">
          <br>
		  <br>
		  <br>
		  <?php if(isset($url_foto) && $url_foto != ''.base_url().'img/fotouser/default.jpg' ){
			  
			  echo '<img src="'.base_url().$url_foto.'" alt="" />';
		  }
		else{
	  echo '<img src="'.base_url().'img/fotouser/default.jpg" alt="" />'; 
	  }?>
				
         
		 
         
      
        </div>
    </div>
	
	 
       
	  </div>
    </div>
  </div>
  <!--/span-->
</div>
<!--/row-->