<?php $url= str_replace("index.php/", "", base_url()); ?>
<body id="page1">
<div class="main">
<!--header -->
    <header>
        <div class="wrapper">
            <h1><a href="index.html" id="logo">IE Games</a></h1>
            <div style="float:left;position:relative;padding-top: 25px;" ><img src="<?php echo $url; ?>images/maskot.png"></div>
            <span id="slogan" style="font-size: 25pt;">IE Games 8th Edition</span>
            <div style="float:right;position:relative;padding-top: 30px;padding-right: 25px;" ><img src="<?php echo $url; ?>images/hmti.jpg" height="100" width="190"></div>
        </div>
        <nav>
            <ul id="menu">
                    <li id="menu_active"><a href="<?php base_url().'home'; ?>"><span><span>Registrasi</span></span></a></li>
                    <li><a href="<?php base_url().'home/berandaUser'; ?>"><span><span>Profil Team</span></span></a></li>
                    <!--<li class="end"><a href="Contacts.html"><span><span>Contacts</span></span></a></li>-->
            </ul>
        </nav>
    </header>
<!-- / header -->
<!--content -->
    <section id="content">
        <div class="clear"></div>
        <div class="for_banners">
            <div id="gallery">
                <a href="#" class="show">
                    <img src="<?php echo $url; ?>images/banner1.jpg" alt="img1" width="970" height="350" title="" alt="" rel="<h3>Malam Keakraban Seluruh Peserta IE Games 7th Edition</h3>"/>
                </a>
                <a href="#" class="">
                    <img src="<?php echo $url; ?>images/banner2.jpg" alt="img2" width="970" height="350" title="" alt="" rel="<h3>Pemenang IE Games 7th Edition</h3>"/>
                </a>
                <a href="#" class="">
                    <img src="<?php echo $url; ?>images/banner3.jpg" alt="img3" width="970" height="350" title="" alt="" rel="<h3>Suasana Babak Penyisihan Region Surabaya</h3>"/>
                </a>
                <div class="caption"><div class="content"></div></div>
            </div>
        </div>
        <div class="wrapper pad1">
                <article class="col1">
                        <div class="box1">
                            <h2 class="top">Login</h2>
                            <div class="pad">
                                <?php $this->load->view('login'); ?>
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
                            <h2 class="top">Registrasi</h2>
                                <form id="ContactForm" name="form_2" method="post" action="<?php echo base_url().'home/cek_validate'; ?>">
                                    <div>
                                        <div  class="wrapper"  style="margin-left: 32px;">
                                            <span style="width: 500px;"><?php echo validation_errors(); ?></span>
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <span>Name Tim</span>
                                                <input type="text" style="float:right;margin-right: 150px;" class="input validate[required,minSize[3],maxSize[20]] text-input" name="nama_tim" >
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <span>Password</span>
                                                <input type="password" style="float:right;margin-right: 150px;" id="password" class="input validate[required,minSize[5],maxSize[20]] text-input" name="password" >								
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <span  style="width: 150px;">Konfirmasi Password</span>
                                                <input type="password" style="float:right;margin-right: 150px;" class="input validate[required,equals[password]] text-input" name="password2" >								
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <span>Asal SMA</span>
                                                <input type="text" style="float:right;margin-right: 150px;" class="input validate[required,minSize[5],maxSize[60]] text-input" name="asal_sma" >							
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <span style="width: 150px;">Alamat SMA</span>
                                                <input type="text" style="float:right;margin-right: 150px;" class="input validate[required,minSize[5],maxSize[60]] text-input" name="alamat_sma" >							
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <span>Kota</span>
                                                <input type="text" style="float:right;margin-right: 150px;" class="input validate[required,minSize[3],maxSize[30]] text-input" name="kota" >							
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                            <span style="width: 100px;"><b>Lokasi Tes</b></span>
                                            <select name="lokasi" class="select1" style="float:left;margin-left: 70px;">
                                                <?php if(isset($lokasi)): foreach ($lokasi as $row): ?>
                                                <option value="<?php echo $row->lokasi; ?>"><?php echo $row->lokasi; ?></option>
                                                <?php endforeach; endif; ?>
                                            </select>							
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <span style="width: 150px;">Ketua Kelompok</span>
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <span>Nama</span>
                                                <input type="text" style="float:right;margin-right: 150px;" class="input validate[required,minSize[3],maxSize[60]] text-input" name="nama1" >							
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <span>No Telp</span>
                                                <input type="text" style="float:right;margin-right: 150px;" class="input validate[required,custom[phone]] text-input" name="no_telp1" >
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <span>Email</span>
                                                <input type="text" style="float:right;margin-right: 150px;" class="input validate[required,custom[email]] text-input" name="email" >
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <span>Anggota 1</span>
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <span>Nama</span>
                                                <input type="text" style="float:right;margin-right: 150px;" class="input validate[required,minSize[3],maxSize[60]] text-input" name="nama2" >						
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <span>No Telp</span>
                                                <input type="text" style="float:right;margin-right: 150px;" class="input validate[required,custom[phone]] text-input" name="no_telp2" >
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <span>Anggota 2</span>
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <span>Nama</span>
                                                <input type="text" style="float:right;margin-right: 150px;" class="input validate[required,minSize[3],maxSize[60]] text-input" name="nama3" >							
                                        </div>
                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <span>No Telp</span>
                                                <input type="text" style="float:right;margin-right: 150px;" class="input validate[required,custom[phone]] text-input" name="no_telp3" >
                                        </div>

                                        <div  class="wrapper" style="margin-left: 32px;">
                                                <input type="checkbox" value="setuju" id="check" onclick="cekSubmit()"> Dengan mencentang ini maka anda setuju dengan peraturan yang kami berikan
                                        </div>
                                        <div style="padding-left:32px;padding-top: 30px;float: left;">
                                            <input type="submit" class="button1" name="submit" value="Submit" id="button" disabled >
                                        </div>
                                        <br/><br/><br/>
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
		$('#form_1, #form_2, #form_3, #form_5').jqTransform({imgPath:'jqtransformplugin/img/'});	
	});
	$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'fade', //Specify sets like: 'fold,fade,sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDown, sliceUpDownLeft' 
		slices:15,
		animSpeed:5000,
		pauseTime:1000,
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