
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
            <ul class="nav nav-tabs" id="myTab2">
               <li class="disabled" ><a href="#">Use Case Weight (UCW)</a></li>
               <li class="disabled"><a href="#"  >Actor Weight (AW)</a></li>
               <li class="disabled" ><a href="#"  >Technical Complexity Factor (TCF)</a></li>
               <li class="disabled" ><a href="#"  >Environmental Complexity Factor(ECF)</a></li>
               <li class="active " ><a href="#info"  >Effort/Cost Result</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
               <div class="tab-pane active" id="info"  >
			   
			    <section id="icons1">

    <div class="row">

        <div class="col-md-6">
           <label class="control-label" for="selectError">
                     <h3>Hasil Akhir Perhitungan Nilai UCP</h3>
                  </label>
                  <table width="400" height="287" border="0">
                     <tr>
                        <th width="227" scope="col">
                           <div align="left">Unajusted Use Case Weight </div>
                        </th>
                        <th width="10" scope="col">
                           <div align="left">:</div>
                        </th>
                        <td width="68" scope="col">
                           <div align="left"><?php echo $ucw; ?></div>
                        </td>
                       
                     </tr>
                     <tr>
                        <th scope="row">
                           <div align="left">Unajusted Actor Weight </div>
                        </th>
                        <td><strong> :</strong></td>
                        <td><?php echo $uaw; ?></td>
                       
                     </tr>
                     <tr>
                        <th scope="row">
                           <div align="left">Enviromental Complexity Factor </div>
                        </th>
                        <td><strong>:</strong></td>
                        <td><?php echo $ecf; ?></td>
                        
                     </tr>
                     <tr>
                        <th scope="row">
                           <div align="left">Tecnical Complexity Factor </div>
                        </th>
                        <td><strong>:</strong></td>
                        <td><?php echo $tcf; ?></td>
                       
                     </tr>
                     <tr>
                        <th scope="row">
                           <div align="left">Use Case Point </div>
                        </th>
                        <td><strong>:</strong></td>
                        <td><b><?php echo $nilai_ucp;?></b></td>
                        <td>&nbsp;</td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <div align="left"><a class="btn btn-success"   style="float: left;"  href="<?php echo base_url();?>estimasi/printRecapUCP"> 
                              Cetak Detail <i class="glyphicon glyphicon-print glyphicon-white"></i> 
                              </a>
                           </div>
                        </th>
                        <td><strong></strong></td>
                        <td></td>
                        <td>&nbsp;</td>
                     </tr>
                  </table>
                   
        </div>
        <div class="col-md-6">
             <label class="control-label" for="selectError">
                     <h3>Hasil Perhitungan Usaha</h3>
                  </label>
                  <table width="461" height="55" border="0">
                     <tr>
                        <th width="274" height="24" scope="row">
                           <div align="left">Metode</div>
                        </th>
                        <td width="12"><strong>:</strong></td>
                        <td width="300">
                           <?php echo $nama_metode_usaha; ?>
                           <div align="center">
                           </div>
                        </td>
                        <td width="47">     
                        </td>
                        <td width="45">    
                        </td>
                     </tr>
                     <tr>
                        <th height="25" scope="row">
                           <div align="left">Nilai Hour Effort </div>
                        </th>
                        <td><strong>:</strong></td>
                        <td colspan="3"><?php echo $nilai_hour_effort; ?></td>
                     </tr>
                  </table>
        </div>
    </div>
    </section>
	
                  
                
                  <label class="control-label" for="selectError">
                     <h3>Distribusi usaha dan biaya</h3>
                  </label>
				  <center>
                  <table width="700" border="1"  class="table-bordered" >
                     <tr>
                        <th width="219" rowspan="2" scope="col">Aktivitas</th>
                        <th colspan="2" scope="col">Effort</th>
                        <th colspan="4" scope="col">Biaya</th>
                     </tr>
                     <tr>
                        <td width="90">
                           <center>% </center>                        </td>
                        <td width="118">Hour of Effort </td>
                        <td width="190">Standard gaji/jam </td>
                        <td width="162">Biaya per Jam </td>
                        <td width="162">Biaya per bulan </td>
                     </tr>
                     <tr>
                        <th colspan="6" scope="row">
                           <div align="left"><b>SOFTWARE DEVELOPMENT</b></div>                        </th>
                     </tr>
                     <?php 
                        $total			=0;
                        $subpresentase	=0;
                        $subusaha		=0;
                        $subtotalgaji	=0;
                        foreach($distribusi_usaha->result() as $row){
							
							 if($row->ID_KATEGORI_AKTIVITAS!=1){
								continue;
							}
                         $hoe						=($row->PRESENTASE/100)*$nilai_hour_effort;
						 $biaya_per_bulan			=($row->PRESENTASE/100)*$nilai_hour_effort*($row->GAJI);
                         $biaya_per_jam				=($row->PRESENTASE/100)*$nilai_hour_effort*($row->GAJI/160);
                         $standard_gaji_per_jam		=$row->GAJI/160;
                        
                         
                       	 ?>
                     <tr>
                        <th scope="row"><?php echo $row->NAMA_AKTIVITAS; ?></th>
                        <td><?php echo $row->PRESENTASE; ?> %</td>
                        <td><?php echo number_format($hoe,2,',','.');?></td>
                        <td><?php echo 'Rp. ' . number_format($standard_gaji_per_jam,2,',','.'); ?> </td>
                        <td><?php echo 'Rp. ' . number_format($biaya_per_jam,2,',','.');?> </td>
                        <td><?php echo 'Rp. ' . number_format($biaya_per_bulan,2,',','.');?> </td>
                     </tr>
                     <? 
                        $subpresentase				=$subpresentase+$row->PRESENTASE;
                        $subusaha					=$subusaha+$hoe	;
                        $subtotalgaji				=$subtotalgaji+$biaya_per_jam;
                        }
						// memasukan kedalam subtotal
						$total=$total+$subtotalgaji;
						?>
                     <tr>
                        <th scope="row">Sub Total</th>
                        <td><?php echo number_format($subpresentase,2,',','.');  ?>%</td>
                        <td><?php echo number_format($subusaha,2,',','.');  ?></td>
                        <td>&nbsp;</td>
                        <td><?php echo 'Rp. ' . number_format($subtotalgaji,2,',','.');  ?></td>
                        <td>&nbsp;</td>
                     </tr>
                     <tr>
                        <th colspan="6" scope="row">
                           <div align="left"><b>ON GOING ACTIVITY</b></div>                        </th>
                     </tr>
                     <?php 
                     
                        $subpresentase	=0;
                        $subusaha		=0;
                        $subtotalgaji	=0;
                        foreach($distribusi_usaha->result() as $row){
							
							 if($row->ID_KATEGORI_AKTIVITAS!=2){
							continue;
                        }
						
                         $hoe						=($row->PRESENTASE/100)*$nilai_hour_effort;
                         $biaya_per_jam			=($row->PRESENTASE/100)*$nilai_hour_effort*($row->GAJI/176);
                         $standard_gaji_per_jam	=$row->GAJI/176;
						 
						 $subpresentase			=$subpresentase+$row->PRESENTASE;
                        $subusaha					=$subusaha+$hoe	;
                        $subtotalgaji				=$subtotalgaji+$biaya_per_jam;
                         
                        
                        ?>
                     <tr>
                        <th scope="row"><?php echo $row->NAMA_AKTIVITAS; ?></th>
                        <td><?php echo $row->PRESENTASE; ?> %</td>
                        <td><?php echo number_format($hoe,2,',','.');?></td>
                        <td><?php echo 'Rp. ' . number_format($standard_gaji_per_jam,2,',','.'); ?> </td>
                        <td><?php echo 'Rp. ' . number_format($biaya_per_jam,2,',','.');?> </td>
                        <td>&nbsp;</td>
                     </tr>
                     <?php }
					 // memasukan kedalam subtotal
						$total=$total+$subtotalgaji;
						?>
                      <tr>
                        <th scope="row">Sub Total</th>
                        <td><?php echo number_format($subpresentase,2,',','.');  ?>%</td>
                        <td><?php echo number_format($subusaha,2,',','.');  ?></td>
                        <td>&nbsp;</td>
                        <td><?php echo 'Rp. ' . number_format($subtotalgaji,2,',','.');  ?></td>
                        <td>&nbsp;</td>
                     </tr>
                     <tr>
                        <th colspan="6" scope="row">
                           <div align="left"><b>QUALITY AND TESTING</b></div>                        </th>
                     </tr>
                     <?php 
                        $subpresentase	=0;
                        $subusaha		=0;
                        $subtotalgaji	=0;
                        foreach($distribusi_usaha->result() as $row){
							
							 if($row->ID_KATEGORI_AKTIVITAS!=3){
                        continue;
                        }
                          $hoe						=($row->PRESENTASE/100)*$nilai_hour_effort;
                         $biaya_per_jam			=($row->PRESENTASE/100)*$nilai_hour_effort*($row->GAJI/176);
                         $standard_gaji_per_jam	=$row->GAJI/176;
						 
						 $subpresentase			=$subpresentase+$row->PRESENTASE;
                        $subusaha					=$subusaha+$hoe	;
                        $subtotalgaji				=$subtotalgaji+$biaya_per_jam;
                        
                       ?>
                     <tr>
                        <th scope="row"><?php echo $row->NAMA_AKTIVITAS; ?></th>
                        <td><?php echo $row->PRESENTASE; ?> %</td>
                        <td><?php echo number_format($hoe,2,',','.');?></td>
                        <td><?php echo 'Rp. ' . number_format($standard_gaji_per_jam,2,',','.'); ?> </td>
                        <td><?php echo 'Rp. ' . number_format($biaya_per_jam,2,',','.');?> </td>
                        <td>&nbsp;</td>
                     </tr>
                     <?php } 
					 
					 // memasukan kedalam subtotal
						$total=$total+$subtotalgaji; 
						?>
                      <tr>
                        <th scope="row">Sub Total</th>
                        <td><?php echo number_format($subpresentase,2,',','.');  ?>%</td>
                        <td><?php echo number_format($subusaha,2,',','.');  ?></td>
                        <td>&nbsp;</td>
                        <td><?php echo 'Rp. ' . number_format($subtotalgaji,2,',','.');  ?></td>
                        <td>&nbsp;</td>
                     </tr>
                     <?php 
                       
                        ?>
                     <tr>
                        <th colspan="4" scope="row">TOTAL BIAYA </th>
                        <td><b><?php echo 'Rp. ' . number_format($total,2,',','.');?>  </b>  </td>
                        <td>&nbsp;</td>
                     </tr>
                  </table>
				  </center>
				  <table>
                     <tr>
					 <form method="post" action="<?php echo base_url();?>/estimasi/submit" >
					 <div class="form-group">
                    <input type="hidden"  name="total"  class="form-control" value="<?php echo $total; ?>"id="total" style="width:400px">
                </div>	
<button type="submit" class="btn btn-success">Submit </button>
				
				</form>
                        
                        <td><strong></strong></td>
                        <td></td>
                        <td>&nbsp;</td>
                     </tr>
                  </table>
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