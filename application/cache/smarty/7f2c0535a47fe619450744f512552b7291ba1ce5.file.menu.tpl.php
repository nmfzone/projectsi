<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-30 12:14:45
         compiled from "..\application\views\adminarea\repository\menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:907554cb75b5f1bc95-50047101%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f2c0535a47fe619450744f512552b7291ba1ce5' => 
    array (
      0 => '..\\application\\views\\adminarea\\repository\\menu.tpl',
      1 => 1422553667,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '907554cb75b5f1bc95-50047101',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54cb75b5f3a751_90845462',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cb75b5f3a751_90845462')) {function content_54cb75b5f3a751_90845462($_smarty_tpl) {?><div id='navigasi'>
	<div class="mn-topz">
		<div class="mn-userz">
			<div class="kirrri">
				<div><a onClick='window.self.history.back()' title="Klik Untuk Kembali ke Sebelumnya">Kembali</a></div>
			</div> 
			<div class="kannnan">
				<div><a href="<?php echo base_url();?>
">Home</a></div>
				<div><a href="<?php echo base_url('adminarea');?>
">Admin Area</a></div>
			</div>
		</div>

	<div class="mn-prf">
		<div class="skiri">

		</div>
		<div class="skanan">
		     <span class="name">Admin</span>
		</div>
		<div class="brrdr"></div>
		<a href="<?php echo base_url('auth/logout');?>
" title="Klik Untuk Keluar">
		<div class="skeluar">
		     <span class="klrr">Keluar</span>
		</div>
		</a>
		</div>

		<div style="clear:both;"></div>
	</div>
</div><?php }} ?>
