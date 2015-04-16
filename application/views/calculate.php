<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Administrator Use Case Point (UCP)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="<?php echo base_url(); ?>css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>css/charisma-app.css" rel="stylesheet">
    <link href='<?php echo base_url(); ?>bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='<?php echo base_url(); ?>bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/jquery.noty.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/noty_theme_default.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/elfinder.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/elfinder.theme.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/uploadify.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico">

</head>
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

	
<body>
<div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
			<center>
            <a class="navbar-brand" href="<?php echo base_url(); ?>index.html"> <img alt="Charisma Logo" src="<?php echo base_url(); ?>img/logo20.png" class="hidden-xs"/>
                <span>Estimasi Harga Perangkat Lunak dengan metode UCP </span></a>
</center>
           
		     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

       
    </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
			<!--
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
			<!--
                <li><a href="<?php echo base_url(); ?>#"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
                <li class="dropdown">
                    <a href="<?php echo base_url(); ?>#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Dropdown <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo base_url(); ?>#">Action</a></li>
                        <li><a href="<?php echo base_url(); ?>#">Another action</a></li>
                        <li><a href="<?php echo base_url(); ?>#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>#">One more separated link</a></li>
                    </ul>
                </li>
                <li>
                    <form class="navbar-search pull-left">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
					
                </li>
				-->
            </ul>

        </div>
    </div>
    
<div class="ch-container">
        <div class="row">	
		 <div class="box col-md-6">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-th"></i> Tabs</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#info">Info</a></li>
                    <li><a href="#custom">Custom</a></li>
                    <li><a href="#messages">Messages</a></li>
                </ul>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active" id="info">
                        <h3>Charisma
                            <small>a full featured template</small>
                        </h3>
                        <p>Its a full featured, responsive template for your admin panel. It is optimized for tablets
                            and mobile phones.</p>

                        <p>Check how it looks on different devices:</p>
                        <a href="http://www.responsinator.com/?url=usman.it%2Fthemes%2Fcharisma"
                           target="_blank"><strong>Preview on iPhone size.</strong></a>
                        <br>
                        <a href="http://www.responsinator.com/?url=usman.it%2Fthemes%2Fcharisma"
                           target="_blank"><strong>Preview on iPad size.</strong></a>
                    </div>
                    <div class="tab-pane" id="custom">
                        <h3>Custom
                            <small>small text</small>
                        </h3>
                        <p>Sample paragraph.</p>

                        <p>Your custom text.</p>
                    </div>
                    <div class="tab-pane" id="messages">
                        <h3>Messages
                            <small>small text</small>
                        </h3>
                        <p>Sample paragraph.</p>

                        <p>Your custom text.</p>
                    </div>
                </div>
            </div>
        
		</div>
    </div>
    <!--/span-->
        <!--/span-->
		
		
		<div class="box col-md-6">
            <div class="box-inner">
            <div class="well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Form Input UCP</h2>
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
			<label class="control-label" for="selectError"><h3>Use Case</h3></label>
		<a  class="glyphicon glyphicon-question-sign" onclick="PopupCenterDual('http://www.nigraphic.com','NIGRAPHIC','450','450');  " href="javascript:void(0);"></a>

                <form role="form">
				
                    <div class="form-group " width="13px">
                        <label for="exampleInputEmail1">Simple</label>
                        <input type="number" name="uc_simple" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" style="width:400px">
                    </div>
					
					
					<div class="form-group " width="13px">
                        <label for="exampleInputEmail1">Average</label>
                        <input type="number" name="uc_average" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" style="width:400px">
                    </div>
					
					<div class="form-group " width="13px">
                        <label for="exampleInputEmail1">Complex</label>
                        <input type="number" name="uc_complex" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" style="width:400px">
                    </div>

					<label class="control-label" for="selectError"><h3>Aktor</h3></label>
					<a  class="glyphicon glyphicon-question-sign" onclick="PopupCenterDual('http://www.nigraphic.com','NIGRAPHIC','450','450');  " href="javascript:void(0);"></a>

                
				
                    <div class="form-group " width="13px">
                        <label for="exampleInputEmail1">Simple</label>
                        <input type="number" name="ac_simple" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" style="width:400px">
                    </div>
					
					
					<div class="form-group " width="13px">
                        <label for="exampleInputEmail1">Average</label>
                        <input type="number" name="ac_average" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" style="width:400px">
                    </div>
					
					<div class="form-group " width="13px">
                        <label for="exampleInputEmail1">Complex</label>
                        <input type="number" name="ac_complex" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" style="width:400px">
                    </div>

					<label class="control-label" for="selectError"><h3>Technical Factor</h3></label>
					<a  class="glyphicon glyphicon-question-sign" onclick="PopupCenterDual('http://www.nigraphic.com','NIGRAPHIC','450','450');  " href="javascript:void(0);"></a>

                <br>
				
                    
					<div class="form-group has-success col-md-4" width="13px">
                        <label for="exampleInputEmail1">System terdistribusi</label>
                        <input type="number" name="ac_average" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" >
                    </div>
		
					<div class="form-group has-success col-md-4" width="13px">
                        <label for="exampleInputEmail1">Waktu respon</label>
                        <input type="number" name="ac_average" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" >
                    </div>
					
					
					<div class="form-group has-success col-md-4" width="13px">
                        <label for="exampleInputEmail1">Efisiensi pengguna</label>
                        <input type="number" name="ac_complex" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" >
                    </div>
					
					 
					<div class="form-group has-success col-md-4" width="13px">
                        <label for="exampleInputEmail1">Kompleksitas proses internal</label>
                        <input type="number" name="ac_average" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" >
                    </div>
		
					<div class="form-group has-success col-md-4" width="13px">
                        <label for="exampleInputEmail1">Penggunaan kode dari hasil daur ulang</label>
                        <input type="number" name="ac_average" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" >
                    </div>
					
					
					<div class="form-group has-success col-md-4" width="13px">
                        <label for="exampleInputEmail1">Kemudahan untuk instal</label>
                        <input type="number" name="ac_complex" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" >
                    </div>
					
					<div class="form-group has-success col-md-4" width="13px">
                        <label for="exampleInputEmail1">Kemudahan untuk digunakan</label>
                        <input type="number" name="ac_average" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" >
                    </div>
		
					<div class="form-group has-success col-md-4" width="13px">
                        <label for="exampleInputEmail1">Penggunaan kode dari hasil daur ulang</label>
                        <input type="number" name="ac_average" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" >
                    </div>
					
					
					<div class="form-group has-success col-md-4" width="13px">
                        <label for="exampleInputEmail1">Mudah dipakai di berbagai platfoem</label>
                        <input type="number" name="ac_complex" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" >
                    </div>
					
					<div class="form-group has-success col-md-4" width="13px">
                        <label for="exampleInputEmail1">Maintenance System</label>
                        <input type="number" name="ac_average" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" >
                    </div>
		
					<div class="form-group has-success col-md-4" width="13px">
                        <label for="exampleInputEmail1">Proses paralel</label>
                        <input type="number" name="ac_average" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" >
                    </div>
					
					
					<div class="form-group has-success col-md-4" width="13px">
                        <label for="exampleInputEmail1">Fitur keamanan</label>
                        <input type="number" name="ac_complex" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" >
                    </div>
					
					<div class="form-group has-success col-md-4" width="13px">
                        <label for="exampleInputEmail1">Fitur keamanan</label>
                        <input type="number" name="ac_average" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" >
                    </div>
		
					<div class="form-group has-success col-md-4" width="13px">
                        <label for="exampleInputEmail1">Akses pihak ke-3</label>
                        <input type="number" name="ac_average" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" >
                    </div>
					
					
					<div class="form-group has-success col-md-4" width="13px">
                        <label for="exampleInputEmail1">Pelatihan pengguna</label>
                        <input type="number" name="ac_complex" min="0" class="form-control" id="text"  onkeypress="return isNumberKey(event)"  placeholder="jumlah use case" >
                    </div>
                    
                    
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
				
            </div>
        </div>
    
	
	

		</div>

		
		
        <div class="box col-md-6">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-user"></i> Responsive, Swipable Table</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Date registered</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>


                        <tr>
                            <td>Muhammad Usman</td>
                            <td class="center">2012/03/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-warning label label-default">Pending</span>
                            </td>
                            <td class="center">
                                <a class="btn btn-success" href="#">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    View
                                </a>
                                <a class="btn btn-info" href="#">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Edit
                                </a>
                                <a class="btn btn-danger" href="#">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Abraham</td>
                            <td class="center">2012/03/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-warning label label-default">Pending</span>
                            </td>
                            <td class="center">
                                <a class="btn btn-success" href="#">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    View
                                </a>
                                <a class="btn btn-info" href="#">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Edit
                                </a>
                                <a class="btn btn-danger" href="#">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Brown Blue</td>
                            <td class="center">2012/03/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-warning label label-default">Pending</span>
                            </td>
                            <td class="center">
                                <a class="btn btn-success" href="#">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    View
                                </a>
                                <a class="btn btn-info" href="#">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Edit
                                </a>
                                <a class="btn btn-danger" href="#">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Worth Name</td>
                            <td class="center">2012/03/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-warning label label-default">Pending</span>
                            </td>
                            <td class="center">
                                <a class="btn btn-success" href="#">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    View
                                </a>
                                <a class="btn btn-info" href="#">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Edit
                                </a>
                                <a class="btn btn-danger" href="#">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        
		
		</div>
        <!--/span-->
    </div><!--/row-->

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="<?php echo base_url(); ?>js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="<?php echo base_url(); ?>bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="<?php echo base_url(); ?>bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="<?php echo base_url(); ?>js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="<?php echo base_url(); ?>bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="<?php echo base_url(); ?>js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="<?php echo base_url(); ?>js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="<?php echo base_url(); ?>js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="<?php echo base_url(); ?>js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="<?php echo base_url(); ?>js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="<?php echo base_url(); ?>js/charisma.js"></script>


</body>
</html>
