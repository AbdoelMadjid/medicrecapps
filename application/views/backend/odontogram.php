<script >

function PopupCenterDual(url, title, w, h) {
    // Fixes dual-screen position   Most browsers   Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;
    width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
    var top = ((height / 2) - (h / 2)) + dualScreenTop;
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) {
        newWindow.focus();
    }
}
</script>


<div class="row">

    <div class="box col-md-12">
	
    <div class="box-inner">
	<div>
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url();?>pasien/daftar_pasien">Daftar Pasien</a>
            </li>
            <li>
               <a href="<?php echo base_url();?>pasien/data_rekam_medik">Data Rekam Medik</a>
            </li>
			<li>
               <a href="<?php echo base_url();?>pasien/odontogram">Data Odontogram</a>
            </li>
			
        </ul>
    </div>
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Data Odontogram <?php echo $nama_pasien; ?></h2>

      
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
				
				<a class="btn btn-primary" onclick="PopupCenterDual('<?php echo base_url(); ?>pasien/form_pasien','NIGRAPHIC','450','450');" href="javascript:void(0);" >
                <i class="glyphicon glyphicon-plus icon-white" >  </i>
                Tambah
            </a>
			
			<a class="btn btn-primary" href="http://localhost/dentisapps/pasien/data_rekam_medik/1  ">
                <img src="<?php echo base_url();?>img/happy_tooth.png" alt="" height="20" width="20" /> 
               Odontogram 
            </a>
			
			
			<br>
			</br>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
		<th>No</th>
        <th>Nama Penyakit</th>
		<th>Data Odontogram</th>
  
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	
	
	
    
   
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->
