<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-30 12:14:45
         compiled from "..\application\views\adminarea\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2776754cb75b5e2e2a3-05718926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbc2685aaf71cb3357f309138c6421fff1e4d477' => 
    array (
      0 => '..\\application\\views\\adminarea\\header.tpl',
      1 => 1422589196,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2776754cb75b5e2e2a3-05718926',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54cb75b5eccd88_31520141',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cb75b5eccd88_31520141')) {function content_54cb75b5eccd88_31520141($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['title_page']->value;?>
</title>

        <!-- Stylesheet Area -->
            <link href="<?php echo base_url('asset/css/adm.css');?>
" rel="stylesheet" />
            <link href="<?php echo base_url('asset/css/all.css');?>
" rel="stylesheet" />
            <link href="<?php echo base_url('asset/css/bootstrap.min.css');?>
" rel="stylesheet"  />
            <link href="<?php echo base_url('asset/css/colorbox.css');?>
" rel="stylesheet" />
            <link href="<?php echo base_url('asset/css/jquery-ui.css');?>
" rel="stylesheet" />
        <!-- Stylesheet Area -->

        <!-- Scripts Area -->
            <?php echo '<script'; ?>
 src="<?php echo base_url('asset/js/jquery.js');?>
"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo base_url('asset/js/bootstrap.min.js');?>
"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo base_url('asset/js/jquery.colorbox-min.js');?>
"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo base_url('asset/js/jquery-ui.js');?>
"><?php echo '</script'; ?>
>
        <!-- Scripts Area -->

        <link href="<?php echo base_url('asset/images/icon.png');?>
" rel='icon' type='image/x-icon' />

        <style>#response{display: none}</style>
    </head>
    <body>
        <?php echo $_smarty_tpl->getSubTemplate ('adminarea/repository/menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="container" style="margin-top:130px;"><?php }} ?>
