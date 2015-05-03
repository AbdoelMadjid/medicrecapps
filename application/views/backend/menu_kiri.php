<div class="col-sm-2 col-lg-2">
    <div class="sidebar-nav">
        <div class="nav-canvas">
            <div class="nav-sm nav nav-stacked">

            </div>
            <ul class="nav nav-pills nav-stacked main-menu">
                <li class="nav-header">Main</li>
				 <li><a class="ajax-link" href="<?php echo base_url(); ?>homepage"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                     
					 </li>
				
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-user"></i><span> Pengguna</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        					
						<li><a class="ajax-link" href="<?php echo base_url(); ?>user/form_pengguna"><i
                                    class="glyphicon glyphicon-plus-sign"></i><span> Tambah Pengguna</span></a>
									</li>
						
						<li><a class="ajax-link" href="<?php echo base_url(); ?>user/daftar_pengguna"><i
                                    class="glyphicon glyphicon-align-justify"></i> <span> Daftar Pengguna</span></a>
									</li>
									
                    </ul>
                </li>
				
				<li class="accordion">
                    <a href="#"><i class="glyphicon  glyphicon-heart"></i><span> Modul Pasien</span></a>
                    <ul class="nav nav-pills nav-stacked">
                       										
                       <li><a class="ajax-link" href="<?php echo base_url(); ?>pasien/form_pasien"><i
                                   class="glyphicon glyphicon-plus-sign "></i><span> Tambah Pasien</span></a>
									</li>
						<li><a class="ajax-link" href="<?php echo base_url(); ?>pasien/daftar_pasien"><i
                                     class="glyphicon glyphicon-align-justify"></i><span> Lihat Pasien</span></a>
									</li>
                    </ul>
                </li>
				
				<li class="accordion">
                    <a href="#"><i class="glyphicon  glyphicon glyphicon-pencil"></i><span> Rekam Medik</span></a>
                    <ul class="nav nav-pills nav-stacked">
                       										
                       <li><a class="ajax-link" href="<?php echo base_url(); ?>pasien/form_rekam_medik"><i
                                   class="glyphicon glyphicon-plus-sign "></i><span> Tambah Rekam medik</span></a>
									</li>
						
                    </ul>
                </li>
				
				

				

        </div>
    </div>
</div>
<!--/span-->
<noscript>
    <div class="alert alert-block col-md-12">
        <h4 class="alert-heading">Warning!</h4>

        <p>You need to have <a href="<?php echo base_url(); ?>http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
    </div>
</noscript>

<div id="content" class="col-lg-10 col-sm-10">