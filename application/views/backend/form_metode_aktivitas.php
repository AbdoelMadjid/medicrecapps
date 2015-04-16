<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
      <div class="well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> Form Tambah Metode Aktivitas  <?php if(isset($edit)){ echo'<span class="label label-info">Edit</span>';} ?> </h2>

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
				
        <form status="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().$urlAction ; ?>" >
          <div class="form-group">
            <label for="exampleInputEmail1">Nama  Metode Aktivitas</label>
            <input type="text" name="nama_metode_aktivitas"class="form-control" id="text"  value="<?php if(isset($nama_metode_aktivitas)) echo $nama_metode_aktivitas; ?>"   placeholder="Masukkan nama_metode_aktivitas" style="width:400px" >
			<?php if(isset($errnama_metode_aktivitas)){ echo'<p><font color="red">nama metode aktivitas belum diisi</font></p>'; }?>

		 </div>
		   <label for="exampleInputEmail1">Status</label>
		<div class="radio">
            <label>
            <input type="radio" name="status" id="optionsRadios1" value="0"   <?php if(isset($status) && $status==0 ) echo 'checked'; ?> >
            Tidak Aktif
            </label>
            <label>
            <input type="radio" name="status" id="optionsRadios1" value="1" <?php if(isset($status) && $status==1 ) echo 'checked'; ?>>
             Aktif
            </label>
          
          			<?php if(isset($errmetode)){ echo'<p><font color="red">metode belum diisi</font></p>'; }?>
		  
           </div>
         
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <!--/span-->
</div>
<!--/row-->