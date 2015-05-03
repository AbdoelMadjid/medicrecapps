
<script>
// jika success maka windows popup akan di close
 window.close();
 
 // alert menunjukan melakukan refresh page utama untuk melihat daftar user.
</script>
<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
      <div class="well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> Form Pasien  <?php if(isset($edit)){ echo'<span class="label label-info">Edit</span>';} ?> </h2>
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

		 </div>
		 <div class="form-group">
            <label for="exampleInputEmail1">Usia Pasien</label>
            <input type="text" name="usia_pasien"class="form-control" id="text" value="<?php if(isset($usia_pasien)) echo $usia_pasien; ?>"   placeholder="Masukkan Usia " style="width:40px" >
			<?php if(isset($errusia_pasien)){ echo'<p><font color="red">Usia pasien belum diisi</font></p>'; }?>

		 </div>
		 <div class="form-group">
            <label for="exampleInputEmail1">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir"class="form-control" id="text" value="<?php if(isset($tanggal_lahir)) echo $tanggal_lahir; ?>"   placeholder="Masukkan Tanggal lahir " style="width:400px" >
			<?php if(isset($errtanggal_lahir)){ echo'<p><font color="red">Tanggal Lahir diisi</font></p>'; }?>

		 </div>
		 
		   <div class="form-group">
            <label for="exampleInputEmail1">Alamat Pasien</label>
            <textarea name="alamat_pasien"class="form-control" id="text"   placeholder="Masukkan Alamat Pasien " style="width:400px" ><?php if(isset($alamat_pasien)) echo $alamat_pasien; ?></textarea>
			<?php if(isset($erralamat_pasien)){ echo'<p><font color="red">Alamat Pasien belum diisi</font></p>'; }?>

		 </div>
		 
		
		  <div class="form-group">
            <label for="exampleInputEmail1">Kewarganegaraan</label>
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
        <div class="col-md-6">
          <br>
		  <br>
		  <br>
		  <?php if(isset($url_foto) ){
			  
			  echo '<img src="'.base_url().$url_foto.'" alt="" />';
		  }
		else{
	echo '<img src="'.base_url().'img/fotouser/default.jpg" alt="" />'; 
		}		  
         
		 ?>
         
      
        </div>
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