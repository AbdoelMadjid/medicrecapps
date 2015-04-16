
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

function makeAjaxCall(){
	
	
	$.ajax({
		type: "post",
		url: "http://localhost/ucpappsta/estimasi/add_ucw",
		cache: false,				
		data: $('#calucw').serialize(),
		success: function(json){						
		try{
		//try to get data count
		var obj = jQuery.parseJSON(json);
			//document.getElementById('nama_aplikasi').readOnly = obj['diasble'];
			document.getElementById('nama_aplikasi').style.display="none"
			document.getElementById('nama_uc').readOnly = obj['diasbleUC'];
			document.getElementById('jum_transaksi').readOnly = obj['diasbleTran'];
			document.getElementById('uc_complex').innerHTML=obj['Complex'] ;
			document.getElementById('uc_average').innerHTML=obj['Average'] ;
			document.getElementById('uc_simple').innerHTML=obj['Simple'] ;
			document.getElementById('hasil'). value =obj['hasil'];
			
			alert( obj['STATUS']);
					
			
		
		
		}catch(e) {		
			alert(e);
		}		
		},
		error: function(){						
			alert('Error while request..');
		}
 });
}



</script>

	
	

<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
      <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-usd"></i>Form Estimasi Harga Perangkat Lunak <?php if(isset($edit)){ echo'<span class="label label-info">Edit</span>';} ?> </h2>
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
                <ul class="nav nav-tabs" id="myTab">
                    <li ><a href="#info">Use Case Weight (UCW)</a></li>
					<li class="disabled"><a href="#"  >Actor Weight (AW)</a></li>
                    <li class="disabled" ><a href="#"  >Technical Complexity Factor (TCF)</a></li>
                    <li class="disabled" ><a href="#"  >Environmental Complexity Factor(ECF)</a></li>
					<li class="disabled" ><a href="#"  >Effort/Cost Result</a></li>
                </ul>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active" id="info">
                        <label class="control-label"  for="selectError"><h3>Use Case Weight</h3></label>
						
						
		<a  class="glyphicon glyphicon-question-sign" onclick="PopupCenterDual('<?php echo base_url(); ?>estimasi/popUCW','NIGRAPHIC','700','700');  " href="javascript:void(0);"></a>

                  <?php 
	if(isset($kirim)){
		echo'
	<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Siap digunakan!.</strong>' .$kirim.'.
                </div>
				';
	}
				?>
				  <form  name="calucw" id="calucw"  action="" >
				  
				  <div id="nama_aplikasi" class="form-group">
                    <label class="control-label" for="inputSuccess1"> Nama Aplikasi</label>
                    <input type="text"  name="nama_aplikasi"  class="form-control" id="nama_aplikasi" style="width:400px">
                </div>
				
				
				<div class="form-group">
                    <label class="control-label" for="inputSuccess1"> Nama Use Case</label>
                    <input type="text"  name="nama_uc" readonly class="form-control" id="nama_uc" style="width:400px">
                </div>
				
				<div class="form-group " >
                        <label for="exampleInputEmail1">Jumlah Transaksi</label>
                        <input type="number" name="jum_transaksi" readonly  min="0" class="form-control" id="jum_transaksi"  style="width:70px">
                    </div>
					
					<table class="form-group " >
					
					<tr>
					<td>
					<label for="exampleInputEmail1">Simple</label>
					</td>
					<td>
					<label for="exampleInputEmail1">:</label>
					</td>
					
					<td>
					<label id="uc_simple">0</label>
					</td>
					</tr>
					
					<tr>
					<td>
					 <label for="exampleInputEmail1">Average</label>
					</td>
					<td>
					<label for="exampleInputEmail1">:</label>
					</td>
					<td>
					<label id="uc_average">0</label>
					</td>
					</tr>
					
					<tr>
					<td>
					 <label for="exampleInputEmail1">Complex</label>
					</td>
					<td>
					<label for="exampleInputEmail1">:</label>
					</td>
					<td>
					 <label id="uc_complex">0</label>
					</td>
					</tr>
					</table>
					<form  name="calucw" id="calucw"  action="" >
			<div class="form-group " >
                        <label for="exampleInputEmail1">Nilai UUCW</label>
                        <input type="number" name="hasil" readonly  min="0" class="form-control" id="hasil"  style="width:70px">
                    </div>
					
                  
				   
					<input type="button" onclick="javascript:makeAjaxCall();" class="btn btn-success" value="Submit"/>
                  		
				<a class="btn btn-info"   onclick="return confirm('Anda Yakin?. Pastikan semua use case sudah dimasukan')"  style="float: right;"  href="http://localhost/ucpappsta/estimasi/form_aw"> 
               
                Next
				<i class="glyphicon glyphicon-chevron-right glyphicon-white"></i>
            
			</a>
			
			</form>
            </form>
			
			</div>
			
        
		</div>
		
		
    </div>
    <!--/span-->
        <!--/span-->
		
      </div>
    </div>
  </div>
  <!--/span-->
</div>
<!--/row-->