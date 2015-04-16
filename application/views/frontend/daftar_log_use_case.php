<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-book"></i> Daftar Log Use Case </h2>

      
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
        <th>Nama Use Case</th>
		<th>Jumlah Transaksi</th>
        <th>Kategori Use Case</th>
		 <th>Bobot</th>
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
	<?php echo $row->NAMA_USE_CASE; ?>
	</td>
	
	<td>
	<?php echo $row->JUM_TRANSAKSI; ?>
	</td>
	
	<td>
	<?php echo $row->TIPE; ?>
	</td>
	<td>
	<?php echo $row->LOG_BOBOT; ?>
	</td>

	 <td class="center">
            <a class="btn btn-success" href="#">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
           
			<a class="btn btn-danger"   href="<?php echo base_url(); ?>ecf/delete/<?php ?> " > 
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
