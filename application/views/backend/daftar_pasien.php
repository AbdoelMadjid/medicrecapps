<div class="row">

    <div class="box col-md-12">
	
    <div class="box-inner">
	<div>
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url();?>pasien/daftar_pasien">Daftar Pasien</a>
            </li>
           
        </ul>
    </div>
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Daftar Pasien</h2>

      
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
        <th>Nama Pasien</th>
        <th>Usia Pasien</th>
		<th>Tanggal Lahir</th>
		 <th>Alamat Pasien</th>
        <th>Kwarganegaraan</th>
		<th>Rekam Medik</th>
  
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
	<?php echo $row->nama_pasien; ?>
	</td>
	
	<td>
	<?php echo $row->usia_pasien; ?>
	</td>
	<td>
	<?php echo $row->tanggal_lahir; ?>
	</td>
	<td>
	<?php echo $row->alamat_pasien; ?>
	</td>
	<td>
	<?php echo $row->kewarganegaraan; ?>
	</td>
	<td>
	 <a class="btn btn-primary"  href="<?php echo base_url(); ?>pasien/data_rekam_medik/<?php echo $row->id_pasien;?>  ">
                <i class="glyphicon glyphicon-eye-open" >  </i>
               Detail 
            </a>
	</td>
	 <td class="center">
            <a class="btn btn-info"  href="<?php echo base_url(); ?>pasien/edit/<?php echo $row->id_pasien;?>  ">
                <i class="glyphicon glyphicon-edit icon-white" >  </i>
                Edit
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
