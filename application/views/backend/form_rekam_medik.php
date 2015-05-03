

<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
      <div class="well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> Form Rekam Medik Pasien  <?php if(isset($edit)){ echo'<span class="label label-info">Edit</span>';} ?> </h2>
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
	  
	  <div class="row">

        <div class="col-md-6">
           <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().$urlAction ; ?>" >
          <div class="form-group">
            <label for="exampleInputEmail1">Nama pasien</label>
            <input type="text" name="nama_pasien"class="form-control" id="text" value="<?php if(isset($nama_pasien)) echo $nama_pasien; ?>"   placeholder="Masukkan Nama lengkap" style="width:400px" >
			<?php if(isset($errnama_pasien)){ echo'<p><font color="red">Nama Pasien belum diisi</font></p>'; }?>

		  <div class="form-group">
            <label for="exampleInputEmail1">Nama Penyakit</label>
            <input type="text"  name="kewarganegaraan" class="form-control" id="text" value="<?php if(isset($kewarganegaraan)) echo $kewarganegaraan; ?>"   placeholder="Masukkan Kewarganegaraan" style="width:400px" >
			<?php if(isset($errkewarganegaraan)){ echo'<p><font color="red">Kewarganegaraan belum diisi</font></p>'; }?>
		  </div>
		 
		   <div class="form-group">
            <label for="exampleInputFile">File Foto</label>
            <input type="file" name="pasien" id="exampleInputFile">
            <p class="help-block">Example block-level help text here.</p>
			
          </div>
          
          <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      
       
       
    </div>
	
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
				
       
	  </div>
    </div>
  </div>
  <!--/span-->
</div>
<!--/row-->