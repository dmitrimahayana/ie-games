<?php $url= str_replace("index.php/", "", base_url()); ?>
<div id="page-top-outer">    

<div id="page-top">

	<div id="logo" style="margin-top:10px;">
	<a href=""><img src="<?php echo $url; ?>images/shared/logo.png" width="156" height="80" alt="" /></a>
	</div>
	
	<div id="top-search">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input type="text" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
		<td>
		<select  class="styledselect">
			<option value=""> All</option>
			<option value=""> Products</option>
			<option value=""> Categories</option>
			<option value="">Clients</option>
			<option value="">News</option>
		</select> 
		</td>
		<td>
		<input type="image" src="<?php echo $url; ?>images/shared/top_search_btn.gif"  />
		</td>
		</tr>
		</table>
	</div>
 	<div class="clear"></div>

</div>

</div>