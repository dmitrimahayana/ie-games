<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login Admin</title>
<?php $url= str_replace("index.php/", "", base_url()); ?>
<link rel="stylesheet" href="<?php echo $url; ?>css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="<?php echo $url; ?>js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="<?php echo $url; ?>js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo $url; ?>js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 
 
<div id="login-holder">

    <div id="logo-login" style="padding-bottom:50px;margin-top: 80px;">
		<img src="<?php echo $url; ?>images/shared/logo.png" width="180" height="100" alt="" />
	</div>
	
	<div class="clear"></div>
	
	<div id="loginbox">
	
	<div id="login-inner">
		<form id="loginAdmin" name="loginAdmin" method="post" action="<?php echo base_url().'beranda/login'; ?>" >
                    <table border="0" cellpadding="0" cellspacing="0">
                    <?php if(isset($error)): ?>
                    <tr>
                        <td><?php echo $error; ?></td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                            <th>Username</th>
                            <td><input type="text" name="user" class="login-inp" /></td>
                    </tr>
                    <tr>
                            <th>Password</th>
                            <td><input type="password" name="pass"  onfocus="this.value=''" class="login-inp" /></td>
                    </tr>
                    <tr>
                            <th></th>
                            <td valign="top"><!--<input type="checkbox" class="checkbox-size" id="login-check" />
                                <label for="login-check">Remember me</label>-->
                            </td>
                    </tr>
                    <tr>
                            <th></th>
                            <td><input type="submit" name="submit" class="submit-login"  /></td>
                    </tr>
                    </table>
                </form>
	</div>
	<div class="clear"></div>
 </div>
</div>
</body>
</html>