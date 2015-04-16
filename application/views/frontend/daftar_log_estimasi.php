<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-book"></i> Daftar Log Estimasi Aplikasi</h2>

      
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
        <th>Tanggal estimasi</th>
        <th>Nama Aplikasi</th>
		<th>UUCW</th>
		<th>UAW</th>
		<th>ECF</th>
		<th>TCF</th>
		 <th>Biaya Estimasi</th>
		<th>Biaya Real</th>
		
		<th>Status</th>
             
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
	<?php echo $row->DATE_CREATED; ?>
	</td>
	
	<td>
	<?php echo $row->NAMA_APLIKASI; ?>
	
	</td>
	<td>
	<a href="<?php echo base_url() ?>estimasi/daftar_log_use_case/<?php echo $row->ID_APLIKASI; ?><?php ?>"><?php echo $row->UCW; ?> </a>
	</td>
	<td>
	<a href="<?php echo base_url() ?>estimasi/daftar_log_actor/<?php echo $row->ID_APLIKASI; ?><?php ?>"><?php echo $row->UAW; ?> </a>
	</td>
	<td>
	<a href="<?php echo base_url() ?>estimasi/daftar_log_tcf/<?php echo $row->ID_APLIKASI; ?><?php ?>"><?php echo $row->TCF; ?> </a>
	</td>
	<td>
	<a href="<?php echo base_url() ?>estimasi/daftar_log_use_ecf/<?php echo $row->ID_APLIKASI; ?><?php ?>"><?php echo $row->ECF; ?> </a>
	</td>
	<td>
	<a href="<?php echo base_url() ?>estimasi/daftar_log_biaya/<?php echo $row->ID_APLIKASI; ?><?php ?>"><?php echo 'Rp. ' . number_format($row->BIAYA_ESTIMASI,2,',','.');?> </a>
	
	</td>
	<td>
	<?php echo 'Rp. ' . number_format($row->BIAYA_REAL,2,',','.');?>
	</td>
	
	
	<td>
	<?php if($row->STATUS==0){ ?>
	<a href="<?php echo base_url() ?>hpik/delete/<?php ?>"><i class="btn-warning btn-sm" >Pending</i></a>
	<?php } 
	 else {?>
			<a href="<?php echo base_url() ?>hpik/delete/<?php ?>"><i class="btn-success btn-sm" >Success</i></a>

	<? } ?>
	</td>
	
	
	
	
	 <td class="center">
            <a class="btn btn-success" href="<?php echo base_url();?>estimasi/daftar_log_use_case/<?php echo $row->ID_APLIKASI; ?> ">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                Detail
            </a>
            <a class="btn btn-danger"  onclick="return confirm('Anda Yakin untuk Menghapus user <?php  ?> ?')"  href="<?php echo base_url(); ?>ecf/delete/<?php ?> "> 
                <i class="glyphicon glyphicon-trash icon-white"></i> 
                Delete
            
			</a>
			
			<a class="btn btn-default"   data-toggle="tooltip"  data-original-title="Cetak Penawaran" href="<?php echo base_url(); ?>ecf/delete/<?php ?> " > 
                <i class="glyphicon glyphicon-print icon-white"></i> 
                Cetak 
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
