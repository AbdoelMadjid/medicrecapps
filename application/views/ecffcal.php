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

$(document).ready(function(){

    $('.nav li').attr('class', 'disabled');
    $('#info').addClass('active');

    $('.selectKid').click(function(e){
        if ( $('.disabled').length > 0 ) {
           $('.disabled').removeClass('disabled');
           return false;
        }
    });

});

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
            

           
        </div>
    </div>
    
<div class="ch-container">
        <div class="row">	
		 <div class="box col-md-12">
        <div class="box-inner">
            <div class="well">
                <h2><i class="glyphicon glyphicon-usd"></i> Form Estimasi Harga Perangkat Lunak</h2>

               
            </div>
            <div class="box-content">
                <ul class="nav nav-tabs" id="myTab">
                    <li ><a href="#info">Use Case Weight</a></li>
					<li ><a href="#custom" data-toggle="tab" >Actor Weight</a></li>
                    <li><a href="#messages" data-toggle="tab" >Technical Complexity Factor (TCF)</a></li>
                    <li  ><a href="#" data-toggle="tab" >Environmental Complexity Factor(ECF)</a></li>
					<li  ><a href="#" data-toggle="tab" >Environmental Complexity Factor(ECF)</a></li>
					<li ><a href="#" data-toggle="tab" >Effort/Cost Result</a></li>
                </ul>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active" id="info">
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
                    </div>
                    
            
			</div>
        
		</div>
    </div>
    <!--/span-->
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
