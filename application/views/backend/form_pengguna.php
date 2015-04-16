<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
      <div class="well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> Form Pengguna  <?php if(isset($edit)){ echo'<span class="label label-info">Edit</span>';} ?> </h2>
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
				
        <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().$urlAction ; ?>" >
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" name="nama"class="form-control" id="text" value="<?php if(isset($nama)) echo $nama; ?>"   placeholder="Masukkan Nama" style="width:400px" >
			<?php if(isset($errnama)){ echo'<p><font color="red">Nama belum diisi</font></p>'; }?>

		 </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text"  name="username" class="form-control" id="text" value="<?php if(isset($username)) echo $username; ?>"   placeholder=Masukkan Username" style="width:400px" >
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
            Peneliti
            </label>
            <label>
            <input type="radio" name="peran" id="optionsRadios1" value="3" <?php if(isset($role) && $role==3 ) echo 'checked'; ?>>
            CEO/Owner
            </label>
            <label>
            <input type="radio" name="peran" id="optionsRadios1" value="4" <?php if(isset($role) && $role==4 ) echo 'checked'; ?>>
            Manager
            </label>
          </div>
          
		  
		  <div class="form-group">
            <label for="exampleInputFile">File Foto</label>
            <input type="file" name="fotouser" id="exampleInputFile">
            <p class="help-block">Example block-level help text here.</p>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <!--/span-->
</div>
<!--/row-->