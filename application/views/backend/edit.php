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


<div id="page-heading"><h1>Edit Tim dan Data</h1></div>


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
                <form id="editBackend" name="editBackend" method="post" action="<?php echo base_url().'beranda/Do/edit/'.$this->uri->segment(4).'/'.$this->uri->segment(5); ?>" enctype="multipart/form-data">
                <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                <?php foreach ($tim as $row): ?>
                <input type="hidden" value="<?php echo $row->ID_TIM; ?>" name="id_tim"  />
		<tr>
                    <th valign="top">Nama Tim:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->NAMA_TIM;  ?>" name="nama_tim" /></td>
                    <td></td>
		</tr>
		<tr>
                    <th valign="top">Nama SMA:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->NAMA_SMA;  ?>" name="asal_sma"/></td>
                    <td>
                    </td>
		</tr>
                <tr>
                    <th valign="top">Asal SMA:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->ALAMAT_SMA;  ?>" name="alamat_sma"/></td>
                    <td>
                    </td>
		</tr>
                <tr>
                    <th valign="top">Kota:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->KOTA;  ?>" name="kota" /></td>
                    <td>
                    </td>
		</tr>
                <tr>
                    <th valign="top">Lokasi Test:</th>
                    <td>
                        <select name="lokasi" class="styledselect_form_1">
                            <option value="<?php echo $row->lokasi; ?>"><?php echo $row->lokasi; ?></option>
                            <?php if(isset($lokasi)): foreach ($lokasi as $row2): ?>
                            <option value="<?php echo $row2->lokasi; ?>"><?php echo $row2->lokasi; ?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </td>
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
                    <td><input type="text" class="inp-form" value="<?php echo $row->NAMA; ?>" name="nama<?php echo $count; ?>"/></td>
                    <td></td>
		</tr>
                <tr>
                    <th valign="top">No Telp:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->NO_TELP; ?>" name="no_telp<?php echo $count; ?>"/></td>
                    <td></td>
		</tr>
                <tr>
                    <th valign="top">Email:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->EMAIL; ?>" name="email"/></td>
                    <td></td>
		</tr>
                <tr>
                    <th>Image <?php echo $count; ?>:</th>
                    <td>
                        <input type="file" class="file_1" name="foto<?php echo $count; ?>" id="file" />
                    </td>
                    <td>
                        <div class="bubble-left"></div>
                        <div class="bubble-inner">JPEG, GIF, PNG 200KB max per image</div>
                        <div class="bubble-right"></div>
                    </td>
                </tr>
                <?php if($row->GAMBAR!=''): ?>
                <?php $nameImg=  preg_split("/[\/]/", $row->GAMBAR); ?>
                <tr>
                    <th valign="top">Gambar Ketua:</th>
                    <td><img src="<?php echo $row->GAMBAR; ?>" style="" width="120" height="150" /></td>
                    <td><input type="button" class="button1" onclick="window.location = '<?php echo base_url().'beranda/delete/image/'.$this->uri->segment(4).'/'.$row->ID_PENDAFTAR.'/pendaftar/'.$nameImg[6]; ?>';" value="Delete Image"></td>
		</tr>
                <?php endif; ?>
                <?php } else { $count+=1; ?>
                <input type="hidden" value="<?php echo $row->ID_PENDAFTAR; ?>" name="id<?php echo $count; ?>"  />
		<tr>
                    <th valign="top">Nama Anggota <?php echo $count; ?>:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->NAMA; ?>" name="nama<?php echo $count; ?>"/></td>
                    <td></td>
		</tr>
                <tr>
                    <th valign="top">No Telp:</th>
                    <td><input type="text" class="inp-form" value="<?php echo $row->NO_TELP; ?>" name="no_telp<?php echo $count; ?>"/></td>
                    <td></td>
		</tr>
                <tr>
                    <th>Image <?php echo $count; ?>:</th>
                    <td>
                        <input type="file" class="file_1" name="foto<?php echo $count; ?>" id="file" />
                    </td>
                    <td>
                        <div class="bubble-left"></div>
                        <div class="bubble-inner">JPEG, GIF, PNG 200KB max per image</div>
                        <div class="bubble-right"></div>
                    </td>
                </tr>
                <?php if($row->GAMBAR!=''): ?>
                <?php $nameImg=  preg_split("/[\/]/", $row->GAMBAR); ?>
                <tr>
                    <th valign="top">Gambar Anggota <?php echo $count; ?>:</th>
                    <td><img src="<?php echo $row->GAMBAR; ?>" style="" width="120" height="150"></td>
                    <td><input type="button" class="button1" onclick="window.location = '<?php echo base_url().'beranda/delete/image/'.$this->uri->segment(4).'/'.$row->ID_PENDAFTAR.'/pendaftar/'.$nameImg[6]; ?>';" value="Delete Image"></td>
		</tr>
                <?php endif; ?>
                <?php } endforeach; ?>
                <tr>
                    <th>Image Resi:</th>
                    <td>
                        <input type="file" class="file_1" name="resi" id="resi" />
                    </td>
                    <td>
                        <div class="bubble-left"></div>
                        <div class="bubble-inner">JPEG, GIF, PNG 200KB max per image</div>
                        <div class="bubble-right"></div>
                    </td>
                </tr>
                <?php foreach ($status as $row):
                    if($row->RESI!=''): ?>
                <?php $nameImg=  preg_split("/[\/]/", $row->RESI); ?>
                <tr>
                    <th valign="top">Gambar Resi:</th>
                    <td><img src="<?php echo $row->RESI; ?>" style="" width="300" height="200"></td>
                    <td><input type="button" class="button1" onclick="window.location = '<?php echo base_url().'beranda/delete/image/'.$this->uri->segment(4).'/'.$row->ID_TIM.'/peserta/'.$nameImg[6]; ?>';" value="Delete Image"></td>
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
                        <input type="button" value="Back" onclick="window.location = '<?php echo base_url().'beranda/show/'.$this->uri->segment(4); ?>';" class=""/>
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