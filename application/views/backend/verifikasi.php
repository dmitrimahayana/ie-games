<?php $this->load->view('backend/containerBackendHead'); ?>
<?php $url= str_replace("index.php/", "", base_url()); ?>

		<!--  start nav -->
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
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->
 
 <div class="clear"></div>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Verifikasi</h1></div>


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
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>

                <!-- start id-form -->
                <form id="verifikasi" name="verifikasi" method="post" action="<?php echo base_url().'beranda/Do/verifikasi/'.$this->uri->segment(3); ?>">
                <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                <?php foreach ($tim as $row): ?>
                <input type="hidden" value="<?php echo $row->ID_TIM; ?>" name="ID_TIM"  />
		<tr>
                    <th valign="top">Nama Tim:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->NAMA_TIM;  ?>"  disabled="disabled" /></td>
                    <td></td>
		</tr>
		<tr>
                    <th valign="top">Nama SMA:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->NAMA_SMA;  ?>"  disabled="disabled" /></td>
                    <td>
                    </td>
		</tr>
                <tr>
                    <th valign="top">Asal SMA:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->ALAMAT_SMA;  ?>"  disabled="disabled" /></td>
                    <td>
                    </td>
		</tr>
                <tr>
                    <th valign="top">Kota:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->KOTA;  ?>"  disabled="disabled" /></td>
                    <td>
                    </td>
		</tr>
                <tr>
                    <th valign="top">Lokasi Test:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->lokasi;  ?>"  disabled="disabled" /></td>
                    <td>
                    </td>
		</tr>
                
                <?php endforeach; ?>
		<?php $count=0;
                foreach ($peserta as $row): 
                    if($count==0){ $count+=1; ?>
                <input type="hidden" value="<?php echo $row->ID_PENDAFTAR; ?>" name="id<?php echo $count; ?>"  />
		<tr>
                    <th valign="top">Nama Ketua:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->NAMA; ?>"  disabled="disabled" /></td>
                    <td></td>
		</tr>
                <tr>
                    <th valign="top">No Telp:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->NO_TELP; ?>"  disabled="disabled" /></td>
                    <td></td>
		</tr>
                <tr>
                    <th valign="top">Email:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->EMAIL; ?>"  disabled="disabled" /></td>
                    <td></td>
		</tr>
                <?php if($row->GAMBAR!=''): ?>
                <tr>
                    <th valign="top">Gambar Ketua:</th>
                    <td><img src="<?php echo $row->GAMBAR; ?>" style="" width="100" height="150" /></td>
                    <td></td>
		</tr>
                <?php endif; ?>
                <?php } else { $count+=1; ?>
                <input type="hidden" value="<?php echo $row->ID_PENDAFTAR; ?>" name="id<?php echo $count; ?>"  />
		<tr>
                    <th valign="top">Nama Anggota <?php echo $count; ?>:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->NAMA; ?>"  disabled="disabled" /></td>
                    <td></td>
		</tr>
                <tr>
                    <th valign="top">No Telp:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->NO_TELP; ?>"  disabled="disabled" /></td>
                    <td></td>
		</tr>
                <?php if($row->GAMBAR!=''): ?>
                <tr>
                    <th valign="top">Gambar Anggota <?php echo $count; ?>:</th>
                    <td><img src="<?php echo $row->GAMBAR; ?>" style="" width="100" height="150"></td>
                    <td></td>
		</tr>
                <?php endif; ?>
                <?php } endforeach; ?>
                <?php foreach ($status as $row):
                    if($row->RESI!=''): ?>
                <tr>
                    <th valign="top">Gambar Resi:</th>
                    <td><img src="<?php echo $row->RESI; ?>" style="" width="300" height="200"></td>
                    <td></td>
		</tr>
                    <?php endif; ?>
                <?php if($row->BAYAR=='0') { ?>
                <tr>
                    <th valign="top">Status Pembayaran:</th>
                    <td><strong>BELUM LUNAS</strong></td>
                    <td></td>
		</tr>
                <?php } else { ?>
                <tr>
                    <th valign="top">Status Pembayaran:</th>
                    <td><strong>SUDAH LUNAS</strong></td>
                    <td></td>
		</tr>
                <?php } ?>
                </div>       
                <?php endforeach; ?>
                <tr>
                    <th>&nbsp;</th>
                    <td valign="top">
                        <input type="submit" name="submit" value="Setujui" class="form-submit" />
                        <input type="button" value="Edit" onclick="window.location = '<?php echo base_url().'beranda/show/edit/'.$this->uri->segment(3).'/'.$this->uri->segment(5); ?>';" class="" />
                        <input type="button" value="Back" onclick="window.location = '<?php echo base_url().'beranda/show/'.$this->uri->segment(3); ?>';" class=""/>
                    </td>
                    <td></td>
                </tr>
                </table>
                </form>
                <!-- end id-form  -->
	</td>
	<td>
</td>
</tr>
<tr>
<td><img src="<?php echo $url; ?>images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
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
<!--  end content-outer -->
<?php $this->load->view('backend/containerBackendFoot'); ?>