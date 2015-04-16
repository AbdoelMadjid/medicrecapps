<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-th-large"></i> Daftar distribusi aktivitas</h2>

      
    </div>
    <div class="box-content">
	
	<?php 
	if(isset($pesan)){
		echo'
	<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong>'.$pesan.'.
                </div>
				';
	}
				?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
		<th>No</th>
        <th>Nama Aktivitas</th>
		<th>Metode Aktivitas</th>
        <th>Pelaku Aktivitas</th>
		<th>Presentase</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php $no =0;
	foreach($isi->result() as $row){ $no++; ?>
	
	<tr>
	 <td>
	<?php echo $no; ?>
	</td>
	
	<td>
	<?php echo $row->NAMA_AKTIVITAS; ?>
	</td>
	
	<td>
	<?php echo $row->NAMA_METODE_AKTIVITAS;	?>
	</td>
	<td>
	<?php echo $row->NAMA_PROFESI; ?>
	</td>
	<td>
	<?php echo $row->PRESENTASE; ?>
	</td>
	
	
	
	
	 <td class="center">
            <a class="btn btn-info"  href="<?php echo base_url(); ?>aktivitas/edit/<?php echo $row->ID_AKTIVITAS;?>  ">
                <i class="glyphicon glyphicon-edit icon-white" >  </i>
                Edit
            </a>
            <a class="btn btn-danger"  onclick="return confirm('Anda Yakin untuk Menghapus user <?php echo $row->NAMA_AKTIVITAS;; ?> ?')"  href="<?php echo base_url(); ?>aktivitas/delete/<?php echo $row->ID_AKTIVITAS;?> "> 
                <i class="glyphicon glyphicon-trash icon-white"></i> 
                Delete
            
			</a>
        </td>
		
	</tr>
	<?php }?>
	
    
   
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->
