<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
      <div class="well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> Form Tambah Metode perhitungan usaha  <?php if(isset($edit)){ echo'<span class="label label-info">Edit</span>';} ?> </h2>

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
            <label for="exampleInputEmail1">Nama  Metode Usaha</label>
            <input type="text" name="nama_metode_usaha"class="form-control" id="text"  value="<?php if(isset($nama_metode_usaha)) echo $nama_metode_usaha; ?>"   placeholder="Masukkan nama_metode_usaha" style="width:400px" >
			<?php if(isset($errnama_metode_usaha)){ echo'<p><font color="red">nama metode usaha belum diisi</font></p>'; }?>

		 </div>
		 
		 <div class="form-group">
            <label for="exampleInputEmail1">Nilai Staff Hour</label>
            <input type="text" name="nilai"class="form-control" id="text"  value="<?php if(isset($nilai)) echo $nilai; ?>"   placeholder="Masukkan nilai" style="width:400px" >
			<?php if(isset($errnilai)){ echo'<p><font color="red">nilai metode usaha belum diisi</font></p>'; }?>

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