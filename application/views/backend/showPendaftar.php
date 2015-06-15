<?php $this->load->view('backend/containerBackendHead'); ?>
<?php $url= str_replace("index.php/", "", base_url()); ?>

		<div class="nav">
		<div class="table">
		
		<!--<ul class="select"><li><a href="#nogo"><b>Dashboard</b></a>
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Dashboard Details 1</a></li>
				<li><a href="#nogo">Dashboard Details 2</a></li>
				<li><a href="#nogo">Dashboard Details 3</a></li>
			</ul>
		</div>
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>-->
		                    
		<ul class="current"><li><a href="#nogo"><b>Tim IE Games</b></a>
		<div class="select_sub show">
			<ul class="sub">
                            <li class="sub_show"><a href="<?php echo base_url().'beranda/show/'.$this->uri->segment(3); ?>"><?php echo ucfirst($this->uri->segment(3)); ?></a></li>
				<li><a href="<?php if($this->uri->segment(3)=="pendaftar") echo base_url().'beranda/show/peserta'; else echo base_url().'beranda/show/pendaftar'; ?>"><?php if($this->uri->segment(3)=="pendaftar") echo 'Peserta'; else echo 'Pendaftar'; ?></a></li>
			</ul>
		</div>
		</li>
		</ul>
		
		<!--<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="#nogo"><b>Categories</b></a>
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Categories Details 1</a></li>
				<li><a href="#nogo">Categories Details 2</a></li>
				<li><a href="#nogo">Categories Details 3</a></li>
			</ul>
		</div>
		</li>
		</ul>-->
                
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>

</div>
<div class="clear"></div>
</div>

 <div class="clear"></div>
 
<div id="content-outer">
<!-- start content -->
<div id="content">

	<div id="page-heading">
		<h1>Daftar Pendaftar</h1>
	</div>

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="<?php echo $url; ?>images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="<?php echo $url; ?>images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				<!--<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left">You have a new message. <a href="">Go to Inbox.</a></td>
					<td class="yellow-right"><a class="close-yellow"><img src="<?php echo $url; ?>images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>-->
				
				<!--<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error. <a href="">Please try again.</a></td>
					<td class="red-right"><a class="close-red"><img src="<?php echo $url; ?>images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>-->
				
				<div id="message-blue" >
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="blue-left">Welcome Admin</td>
					<td class="blue-right"><a class="close-blue"><img src="<?php echo $url; ?>images/table/icon_close_blue.gif"   alt="" onclick="hidestuff('message-blue');"/></a></td>
				</tr>
				</table>
				</div>
			
				<!--<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left">Product added sucessfully. <a href="">Add new one.</a></td>
					<td class="green-right"><a class="close-green"><img src="<?php echo $url; ?>images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>-->
		
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><a >ID Tim</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a >Nama Tim</a></th>
					<th class="table-header-repeat line-left"><a >Nama SMA</a></th>
					<th class="table-header-repeat line-left"><a >Kota</a></th>
					<th class="table-header-repeat line-left"><a >Lokasi Test</a></th>
					<th class="table-header-options line-left"><a >Options</a></th>
				</tr>
                                <?php if(isset($list)): 
                                    $count=0;
                                    foreach ($list as $row): 
                                        if($count%2==0):?>
				<tr>
					<!--<td><input  type="checkbox"/></td>-->
					<td><?php echo $row->ID_tim; ?></td>
					<td><?php echo $row->NAMA_TIM; ?></td>
					<td><?php echo $row->NAMA_SMA; ?></td>
					<td><?php echo $row->kota; ?></td>
					<td><?php echo $row->lokasi; ?></td>
					<td class="options-width">
					<a href="<?php echo base_url().'beranda/show/edit/'.$this->uri->segment(3).'/'.$row->ID_tim; ?>" title="Edit" class="icon-1 info-tooltip"></a>
					<a onclick="return confirm('Are you sure you want to change password tim to default hmti_its?')" href="<?php echo base_url().'beranda/changePass/'.$this->uri->segment(3).'/'.$row->ID_tim; ?>" title="Change Password" class="icon-3 info-tooltip"></a>
                                        <a href="<?php echo base_url().'beranda/show/'.$this->uri->segment(3).'/verifikasi/'.$row->ID_tim; ?>" title="Verifikasi" class="icon-5 info-tooltip"></a>
					</td>
				</tr>
                                    <?php endif;
                                    if($count%2!=0):?>
				<tr class="alternate-row">
					<!--<td><input  type="checkbox"/></td>-->
					<td><?php echo $row->ID_tim; ?></td>
					<td><?php echo $row->NAMA_TIM; ?></td>
					<td><?php echo $row->NAMA_SMA; ?></td>
					<td><?php echo $row->kota; ?></td>
					<td><?php echo $row->lokasi; ?></td>
					<td class="options-width">
					<a href="<?php echo base_url().'beranda/show/edit/'.$this->uri->segment(3).'/'.$row->ID_tim; ?>" title="Edit" class="icon-1 info-tooltip"></a>
					<a onclick="return confirm('Are you sure you want to change password tim to default hmti_its?')" href="<?php echo base_url().'beranda/changePass/'.$this->uri->segment(3).'/'.$row->ID_tim; ?>" title="Change Password" class="icon-3 info-tooltip"></a>
					<a href="<?php echo base_url().'beranda/show/'.$this->uri->segment(3).'/verifikasi/'.$row->ID_tim; ?>" title="Verifikasi" class="icon-5 info-tooltip"></a>
					</td>
				</tr>
                                <?php endif; $count++; endforeach; endif; ?>
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<div id="actions-box">
                            <?php $uri=$url."report_pendaftaran/Rekap_Pendaftaran_IE_Games.xlsx"; ?>
                            <input type="button" value="Download Excel" onClick="window.location.href='<?php echo $uri; ?>'">
				<!--<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
                            <a href="<?php echo base_url(); ?>beranda/download/excel" class="action-edit">Download Excel</a>
					<a href="" class="action-edit">Download Excel</a>
					<a href="" class="action-delete">Delete</a>
				</div>-->
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<!--<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="" class="page-far-left"></a>
				<a href="" class="page-left"></a>
				<div id="page-info">Page <strong>1</strong> / 15</div>
				<a href="" class="page-right"></a>
				<a href="" class="page-far-right"></a>
			</td>
			<td>
			<select  class="styledselect_pages">
				<option value="">Number of rows</option>
				<option value="">1</option>
				<option value="">2</option>
				<option value="">3</option>
			</select>
			</td>
			</tr>
			</table>-->
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->
<?php $this->load->view('backend/containerBackendFoot'); ?>