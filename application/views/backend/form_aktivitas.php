<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
      <div class="well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> Form Tambah Aktivitas  <?php if(isset($edit)){ echo'<span class="label label-info">Edit</span>';} ?> </h2>
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
            <label for="exampleInputEmail1">Nama  Aktivitas</label>
            <input type="text" name="nama_aktivitas"class="form-control" id="text"  value="<?php if(isset($nama_aktivitas)) echo $nama_aktivitas; ?>"   placeholder="Masukkan nama_aktivitas" style="width:400px" >
			<?php if(isset($errnama_aktivitas)){ echo'<p><font color="red">nama aktivitas belum diisi</font></p>'; }?>

		 </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Metode Aktivitas</label>
             <div class="controls" >
                        <select id="selectError"  name="metode_aktivitas" data-rel="chosen" style="width:200px" >
						 <option value="0">Pilih Metode Aktivitas</option>
						 <?php foreach($metode_aktivitas->result() as $row){?>
                            <option value="<?php echo $row->ID_METODE_AKTIVITAS; ?>" <?php if(isset($id_metode_aktivitas) && $id_metode_aktivitas==$row->ID_METODE_AKTIVITAS )echo 'selected'; ?> ><?php echo $row->NAMA_METODE_AKTIVITAS;  ?></option>
                            
						 <?php } ?>
                        </select>
             </div>
			   
			 
					
			<?php if(isset($errmetode_aktivitas)){ echo '<p><font color="red">profesi belum diisi</font></p>'; }?>
		  </div>
		  
		  <div class="form-group">
		  <label for="exampleInputEmail1">Kategori Aktivitas</label>
			   <div class="controls" >
                        <select id="selectError"  name="id_kategori_aktivitas" data-rel="chosen" style="width:200px" >
						 <option value="0">Pilih Kategori Aktivitas</option>
						 <option value="1" <?php if(isset($id_kategori_aktivitas) && $id_kategori_aktivitas==1)echo 'selected'; ?> >Software Development</option>
                         <option value="2" <?php if(isset($id_kategori_aktivitas) && $id_kategori_aktivitas==2)echo 'selected'; ?> >On Going Activity</option>
						 <option value="3" <?php if(isset($id_kategori_aktivitas) && $id_kategori_aktivitas==3)echo 'selected'; ?> >Quality and Testing</option>

                        </select>
             </div>
			 
			 <?php if(isset($errid_kategori_aktivitas)){ echo '<p><font color="red">Kategori Aktivitas  belum diisi</font></p>'; }?>
		</div>
		   <div class="form-group">
            <label for="exampleInputEmail1">Profesi</label>
			<div class="controls" >
                        <select id="selectError" name="profesi" data-rel="chosen" style="width:200px" >
						 <option value="0">Pilih Profesi untuk Aktivitas</option>
                           <?php foreach($profesi->result() as $row){?>
                            <option value="<?php echo $row->ID_PROFESI; ?>" <?php if(isset($id_profesi) && $id_profesi==$row->ID_PROFESI)echo 'selected'; ?> ><?php echo $row->NAMA_PROFESI;  ?></option>
                            
						 <?php } ?>
                        </select>
                    </div>			<?php if(isset($errprofesi)){ echo'<p><font color="red">profesi belum diisi</font></p>'; }?>
		  </div>
		   <div class="form-group">
            <label for="exampleInputEmail1">Presentase Usaha</label>
            <input type="text"  name="presentase" class="form-control" id="text" value="<?php if(isset($presentase)) echo $presentase; ?>"   placeholder="Masukkan presentase" style="width:100px" >
			<?php if(isset($errpresentase)){ echo'<p><font color="red">presentase belum diisi</font></p>'; }?>
		  </div>
          
         
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <!--/span-->
</div>
<!--/row-->