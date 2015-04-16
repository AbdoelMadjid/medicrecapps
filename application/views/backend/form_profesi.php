<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
      <div class="well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> Form Tambah Profesi  <?php if(isset($edit)){ echo'<span class="label label-info">Edit</span>';} ?> </h2>

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
            <label for="exampleInputEmail1">Nama profesi</label>
            <input type="text" name="nama_profesi"class="form-control" id="text"  value="<?php if(isset($nama_profesi)) echo $nama_profesi; ?>"   placeholder="Masukkan nama_profesi" style="width:400px" >
			<?php if(isset($errnama_profesi)){ echo'<p><font color="red">nama Profesi belum diisi</font></p>'; }?>

		 </div>
		 <div class="form-group">
		   <label for="exampleInputEmail1">Gaji /bulan</label>
		            <input type="text" name="gaji"class="form-control" id="text"  value="<?php if(isset($gaji)) echo $gaji; ?>"   placeholder="Masukkan gaji" style="width:400px" >

          			<?php if(isset($errgaji)){ echo'<p><font color="red">Gaji belum diisi</font></p>'; }?>
		  </div>
                   
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <!--/span-->
</div>
<!--/row-->