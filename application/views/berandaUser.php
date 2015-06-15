<?php $url= str_replace("index.php/", "", base_url()); ?>
<script>
        $(document).ready(function(){
        $("#ContactForm").validationEngine();
        });
        $(document).ready(function(){
        $("#form_1").validationEngine();
        });
</script>
<body id="page1">
<div class="main">
    <!--header -->
    <header>
        <div class="wrapper">
            <h1><a href="index.html" id="logo">Air lines</a></h1>
            <div style="float:left;position:relative;padding-top: 25px;" ><img src="<?php echo $url; ?>images/maskot.png"></div>
            <span id="slogan" style="font-size: 25pt;">IE Games 8th Edition</span>
            <div style="float:right;position:relative;padding-top: 30px;padding-right: 25px;" ><img src="<?php echo $url; ?>images/hmti.jpg" height="100" width="190"></div>
        </div>
        <nav>
            <ul id="menu">
                    <li id="menu_active"><a href="<?php base_url().'home/berandaUser'; ?>"><span><span>Profil Team</span></span></a></li>
                    <!--<li class="end"><a href="Contacts.html"><span><span>Contacts</span></span></a></li>-->
            </ul>
        </nav>
    </header>
    <!-- / header -->
    <!--content -->
    <!--<img src="<?php echo $url; ?>images/LAMBANG_HMTI-ITS.JPG" width="250" height="90">-->
    <section id="content">
        <div class="for_banners">
            <div id="gallery">
                <a href="#" class="show">
                    <img src="<?php echo $url; ?>images/banner1.jpg" alt="img1" width="970" height="350" title="" alt="" rel="<h3>Malam Keakraban Seluruh Peserta IE Games 7th Edition</h3>"/>
                </a>
                <a href="#">
                    <img src="<?php echo $url; ?>images/banner2.jpg" alt="img2" width="970" height="350" title="" alt="" rel="<h3>Pemenang IE Games 7th Edition</h3>"/>
                </a>
                <a href="#">
                    <img src="<?php echo $url; ?>images/banner3.jpg" alt="img3" width="970" height="350" title="" alt="" rel="<h3>Suasana Babak Penyisihan Region Surabaya</h3>"/>
                </a>
                <div class="caption"><div class="content"></div></div>
            </div>
        </div>
        <div class="wrapper pad1">
                <article class="col1">
                        <div class="box1">
                            <h2 class="top">Change Password</h2>
                            <div class="pad">
                                    <?php $this->load->view('changePass'); ?>
                            </div>
                            <br/>
                            <h2 class="top">Sponsor</h2>
                            <div class="pad">
                                <?php $this->load->view('sponsor'); ?>
                            </div>
                            <br/>
                            <h2 class="top">Supported by</h2>
                            <div class="pad">
                                <?php $this->load->view('support'); ?>
                            </div>
                            <br/>
                            <h2 class="top">Media Partner</h2>
                            <div class="pad">
                                <ul class="pad_bot1 list1">
                                    <li>
                                        Phoenix
                                    </li>
                                </ul>
                                <ul class="pad_bot1 list1">
                                    <li>
                                        Media Bali
                                    </li>
                                </ul>
                                <ul class="pad_bot1 list1">
                                    <li>
                                        Info Gorontalo
                                    </li>
                                </ul>
                                <ul class="pad_bot1 list1">
                                    <li>
                                        Info Palembang
                                    </li>
                                </ul>
                            </div>
                            <br/>
                            <h2 class="top">Contact Person</h2>
                            <div class="pad">
                                <?php $this->load->view('contact'); ?>
                            </div>
                        </div>
                </article>
                <article class="col2">
                    <div class="tabs2" style="margin-top: -40px;">
                        <div class="content">
                            <h2 class="top">Data Tim dan Peserta</h2>
                                <form id="ContactForm" name="register" method="post" action="<?php echo base_url().'home/updateBerandaUser'; ?>" enctype="multipart/form-data">
                                    <div>
                                        <div  class="wrapper"  style="margin-left: 32px;">
                                            <span style="width: 500px;color: red;font-size: 11pt;"><b>- Max Upload File 200KB<br/>- Refresh Halaman jika Gambar yang Diupload Tidak Sesuai</b></span>
                                        </div>
                                        <?php foreach ($tim as $row): ?>
                                        <div  class="wrapper"  style="margin-left: 32px;">
                                            <span style="width: 500px;"><?php echo validation_errors(); ?></span>
                                        </div>
                                        <div  class="wrapper"  style="margin-left: 32px;">
                                            <span>Name Tim</span>
                                            <input type="text" value="<?php echo $row->NAMA_TIM;  ?>" style="float:right;margin-right: 150px;" class="input validate[required,minSize[3],maxSize[20]] text-input" name="nama_tim" >
                                        </div>
                                        <div  class="wrapper"  style="margin-left: 32px;">
                                            <span>Asal SMA</span>
                                        <input type="text" value="<?php echo $row->NAMA_SMA;  ?>" style="float:right;margin-right: 150px;" class="input validate[required,minSize[5],maxSize[60]] text-input" name="asal_sma" >
                                        </div>
                                        <div  class="wrapper"  style="margin-left: 32px;">
                                            <span style="width: 150px;">Alamat SMA</span>
                                            <input type="text" value="<?php echo $row->ALAMAT_SMA;  ?>" style="float:right;margin-right: 150px;" class="input validate[required,minSize[5],maxSize[60]] text-input" name="alamat_sma" >
                                        </div>
                                        <div  class="wrapper"  style="margin-left: 32px;">
                                            <span>Kota</span>
                                            <input type="text" value="<?php echo $row->KOTA;  ?>" style="float:right;margin-right: 150px;" class="input validate[required,minSize[3],maxSize[30]] text-input" name="kota" >
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                            <span style="width: 100px;"><b>Lokasi Tes</b></span>
                                            <select name="lokasi" class="select1" style="float:left;margin-left: 70px;">
                                                <option value="<?php echo $row->lokasi; ?>"><?php echo $row->lokasi; ?></option>
                                                <?php if(isset($lokasi)): foreach ($lokasi as $row2): ?>
                                                <option value="<?php echo $row2->lokasi; ?>"><?php echo $row2->lokasi; ?></option>
                                                <?php endforeach; endif; ?>
                                            </select>
                                        </div>
                                        <?php endforeach; ?>

                                        <?php $count=0;
                                        foreach ($peserta as $row): 
                                            if($count==0){ $count+=1; ?>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                            <span  style="width: 150px;">Ketua Kelompok</span>
                                            <input type="hidden" value="<?php echo $row->ID_PENDAFTAR; ?>" name="id<?php echo $count; ?>" >
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                            <span>Nama</span>
                                            <input type="text" value="<?php echo $row->NAMA; ?>" style="float:right;margin-right: 150px;" class="input validate[required,minSize[3],maxSize[60]] text-input" name="nama<?php echo $count; ?>" >
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                            <span>No Telp</span>
                                            <input type="text" value="<?php echo $row->NO_TELP; ?>" style="float:right;margin-right: 150px;" class="input validate[required,custom[phone]] text-input" name="no_telp<?php echo $count; ?>" >
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                            <span>Email</span>
                                            <input type="text" value="<?php echo $row->EMAIL; ?>" style="float:right;margin-right: 150px;" class="input validate[required,custom[email]] text-input" name="email" >
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                            <span>Foto 3x4</span>
                                            <input type="file" style="float:right;margin-right: 150px;" name="foto<?php echo $count; ?>" id="file" />
                                        </div>
                                        <?php if(isset($err)):
                                            foreach ($err as $row3) :
                                                if($row3['count']==$count) : ?>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <?php echo $row3['error']; ?>
                                        </div>    
                                        <?php endif; endforeach; endif; ?>
                                        <?php if($row->GAMBAR!=''): ?>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                            <?php $nameImg=  preg_split("/[\/]/", $row->GAMBAR); ?>
                                            <span><input type="button" class="button1" onclick="window.location = '<?php echo base_url().'home/delete/image/'.$row->ID_PENDAFTAR.'/pendaftar/'.$nameImg[6]; ?>';" value="Delete Image"></span>
                                            <img src="<?php echo $row->GAMBAR; ?>" style="float:right;margin-right: 150px;padding-top: 10px;" width="120" height="150">
                                        </div>
                                        <?php endif; ?>
                                        <?php } else { $count+=1; ?>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                            <span>Anggota <?php echo $count; ?></span>
                                            <input type="hidden" value="<?php echo $row->ID_PENDAFTAR; ?>" name="id<?php echo $count; ?>" >
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                            <span>Nama</span>
                                            <input type="text" value="<?php echo $row->NAMA; ?>" style="float:right;margin-right: 150px;" class="input validate[required,minSize[3],maxSize[60]] text-input" name="nama<?php echo $count; ?>" >
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                            <span>No_telp</span>
                                            <input type="text" value="<?php echo $row->NO_TELP; ?>" style="float:right;margin-right: 150px;" class="input validate[required,custom[phone]] text-input" name="no_telp<?php echo $count; ?>" >
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                            <span>Foto 3x4</span>
                                            <input type="file" style="float:right;margin-right: 150px;" name="foto<?php echo $count; ?>" id="file" /> 
                                        </div>
                                        <?php if(isset($err)):
                                            foreach ($err as $row3) :
                                                if($row3['count']==$count) : ?>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <?php echo $row3['error']; ?>
                                        </div>
                                        <?php endif; endforeach; endif; ?>
                                        <?php if($row->GAMBAR!=''): ?>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                            <?php $nameImg=  preg_split("/[\/]/", $row->GAMBAR); ?>
                                            <span><input type="button" class="button1" onclick="window.location = '<?php echo base_url().'home/delete/image/'.$row->ID_PENDAFTAR.'/pendaftar/'.$nameImg[6]; ?>';" value="Delete Image"></span>
                                            <img src="<?php echo $row->GAMBAR; ?>" style="float:right;margin-right: 150px;padding-top: 10px;" width="120" height="150">
                                        </div>
                                        <?php endif; ?>
                                        <?php  } endforeach; ?>
                                        
                                        <div  class="wrapper" style="margin-left: 32px;">
                                            <span  style="width: 150px;">Gambar Bukti Resi</span>
                                            <input type="file" style="float:right;margin-right: 150px;" name="resi" id="resi" />
                                        </div>
                                        <?php if(isset($err)):
                                            foreach ($err as $row3) :
                                                if($row3['count']==4) : ?>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <?php echo $row3['error']; ?>
                                        </div>
                                        <?php endif; endforeach; endif; ?>
                                        <?php 
                                        foreach ($status as $row):
                                            if($row->RESI!=''): ?>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                            <?php $nameImg=  preg_split("/[\/]/", $row->RESI); ?>
                                            <span><input type="button" class="button1" onclick="window.location = '<?php echo base_url().'home/delete/image/'.$row->ID_TIM.'/peserta/'.$nameImg[6]; ?>';" value="Delete Image"></span>
                                                <img src="<?php echo $row->RESI; ?>" style="float:right;margin-right: 150px;padding-top: 10px;padding-bottom: 20px;" width="270" height="200">
                                        </div>
                                            <?php endif; ?>
                                        
                                        <div  class="wrapper" style="margin-left: 32px;font-size: 15pt;">
                                            <span style="width: 200px;">Status Pembayaran</span>
                                                <?php if($row->BAYAR=='0') { ?>
                                            <strong>BELUM LUNAS</strong>
                                                <?php } else { ?>
                                            <strong>SUDAH LUNAS</strong>
                                                    <?php } ?>
                                        </div>       
                                        <?php endforeach; ?>
                                        
                                        <div style="padding-left:32px;padding-top: 30px;position: relative;">
                                            <input type="submit" class="button1" name="submit" value="Update">
                                            <a target="_blank" class="button1" href="<?php echo base_url().'show/idCard/'.$this->session->userdata('id_tim'); ?>">Print ID Card</a>
                                            <input type="button" class="button1" onclick="window.location = '<?php echo base_url().'home'; ?>';" value="Logout">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br/><br/>
                    </article>
            </div>
        </section>
        <!--content end-->
	<!--footer -->
	<footer>
		<div class="wrapper">
			<div class="links">
				Copyright 2012 IE FAIR 2013
                        </div>
		</div>
	</footer>
	<!--footer end-->
</div>
<script type="text/javascript"> Cufon.now(); </script>
<script>
	$(document).ready(function() {
		tabs.init();
	});
	jQuery(document).ready(function($) {
		$('#form_1, #form_2, #form_3, #form_5','#ContactForm').jqTransform({imgPath:'jqtransformplugin/img/'});	
	});
	$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'fade', //Specify sets like: 'fold,fade,sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDown, sliceUpDownLeft' 
		slices:15,
		animSpeed:500,
		pauseTime:6000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false, //Next & Prev
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		controlNavThumbsFromRel:false, //Use image rel for thumbs
		controlNavThumbsSearch: '.jpg', //Replace this with...
		controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
		keyboardNav:true, //Use left & right arrows
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:1, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
	});
</script>
</body>
