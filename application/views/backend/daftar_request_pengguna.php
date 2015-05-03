<script >
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
	var popup = window.open('......');
popup.document.title = "my title";
	window.alert("Input salah, masukkan angka");
        return false;
		
		}
    return true;
}


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
                <a href="<?php echo base_url();?>user/daftar_pengguna">Daftar Pengguna</a>
            </li>
            <li>
               <a href="<?php echo base_url();?>user/daftar_request_pengguna">Daftar Request Pengguna</a>
            </li>
        </ul>
    </div>
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Daftar Pengguna</h2>

      
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
        <th>Nama Lengkap</th>
        <th>Nama Panggilan</th>
		<th>Peran</th>
		 <th>Kwarganegaraan</th>
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
	<?php echo $row->nama_lengkap; ?>
	</td>
	
	<td>
	<?php echo $row->nama_panggilan; ?>
	</td>
	
	<td>
	<?php if($row->role==1){echo "Admin";} 
			else if($row->role==2){ echo "Dokter Gigi";}
				else if($row->role==3){ echo "Klinik";} 
					else{ echo "DVI";} 
					?>
	</td>
	
	
		
		<td>
	<?php echo $row->kewarganegaraan; ?>
	</td>
	<td>
	<?php if($row->status==0){
 echo '<span class="label label-warning">Pending</span>';
	} else{  echo '<span class="label label-success">Disetujui</span>'; } ?>
	</td>
	 <td class="center">
	  <a class="btn btn-info" onclick="PopupCenterDual('<?php echo base_url(); ?>user/detail_user/<?php echo $row->id_user;?>','NIGRAPHIC','450','450');  " href="javascript:void(0);" ">
                <i class="glyphicon glyphicon-search icon-white" >  </i>
                View Detail
            </a>
			
            <a class="btn btn-info"  href="<?php echo base_url(); ?>user/edit/<?php echo $row->id_user;?>  ">
                <i class="glyphicon glyphicon-edit icon-white" >  </i>
                Edit
            </a>
            <a class="btn btn-danger"  onclick="return confirm('Anda Yakin untuk Menghapus user <?php echo $row->username;; ?> ?')"  href="<?php echo base_url(); ?>user/delete/<?php echo $row->id_user;?> "> 
                <i class="glyphicon glyphicon-trash icon-white"></i> 
                Delete
            
			</a>
			
			 <a class="btn btn-success"  onclick="return confirm('Anda Yakin untuk Menyutujui <?php echo $row->nama_lengkap; ?> ?')"  href="<?php echo base_url(); ?>user/delete/<?php echo $row->id_user;?> "> 
                <i class="glyphicon glyphicon-ok-sign icon-white"></i> 
                Setujui
            
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
