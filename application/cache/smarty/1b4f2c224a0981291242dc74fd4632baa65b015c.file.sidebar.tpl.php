<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-30 12:13:37
         compiled from "..\application\views\repository\sidebar\sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3188254cb75718b55d5-08349911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b4f2c224a0981291242dc74fd4632baa65b015c' => 
    array (
      0 => '..\\application\\views\\repository\\sidebar\\sidebar.tpl',
      1 => 1422527086,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3188254cb75718b55d5-08349911',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listbuku' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54cb75719253c2_32896500',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cb75719253c2_32896500')) {function content_54cb75719253c2_32896500($_smarty_tpl) {?>	<div id="sidebar">
		<div class="new-box">
			<div class="ttl-box"><b>New Collection</b></div>
			<div class="content-box">
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listbuku']->value->result(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
				<div class="list"><a href="<?php echo base_url();?>
read/<?php echo $_smarty_tpl->tpl_vars['row']->value->link;?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value->judul;?>
</a></div><br/>
			<?php } ?>
			</div>
		</div>
	</div><?php }} ?>
