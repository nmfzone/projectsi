<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-08 01:34:32
         compiled from "..\application\views\v_depan.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1290254cb75714a9fb9-18937077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '481b4d470d009e13ac2161824c76beacc07c960e' => 
    array (
      0 => '..\\application\\views\\v_depan.tpl',
      1 => 1422994771,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1290254cb75714a9fb9-18937077',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54cb7571582fc6_50319731',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cb7571582fc6_50319731')) {function content_54cb7571582fc6_50319731($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	    	<div style="clear:both;"></div>

	    	<style type="text/css">
	    	
	    		#footer {background:none;text-align: center;margin-top:60px;}
	    	
	    	</style>

	    	<div id="main">
	    		<div id="m-left">
	    			<div class="search-area"><center>
					    <div class="stitle">Search Buku</div>
						<input type="text" id="searchid" class="search form-control" autocomplete="off">

						<div id="hasil">
							<ul id="results"></ul>
						</div></center>
					</div>
				</div>

				<div id="m-right">
					<?php echo $_smarty_tpl->getSubTemplate ('repository/sidebar/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				</div>

			</div>

	<?php echo '<script'; ?>
>
        $(document).ready(function (){
			$(".search").keyup(function() { 
				var searchid = $(this).val();
				var dataString = 'search='+ searchid;
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('index/search');?>
",
					data: dataString,
					cache: false,
					success: function(html) {
						if(html != ' ') {
							$("#hasil").show();
							$("#results").html(html).show();
						} else {
							$("#hasil").hide();
						}
					   	
					}
				});
				return false;    
			});
		});
	<?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
