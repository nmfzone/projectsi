<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-08 01:34:32
         compiled from "..\application\views\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1661654cb75715cc6d2-67419502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '025cd07bec0faba93323d27503d32b0ec6ae3e10' => 
    array (
      0 => '..\\application\\views\\header.tpl',
      1 => 1422994888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1661654cb75715cc6d2-67419502',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54cb75716a86b5_23865527',
  'variables' => 
  array (
    'judul' => 0,
    'log' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cb75716a86b5_23865527')) {function content_54cb75716a86b5_23865527($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['judul']->value;?>
</title>

        <!-- Stylesheet Area -->
            <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css');?>
" />
            <link href="<?php echo base_url('asset/css/media.css');?>
" rel="stylesheet" />
            <link href="<?php echo base_url('asset/css/font.css');?>
" rel="stylesheet" />
            <link href="<?php echo base_url('asset/css/colorbox.css');?>
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
 src="<?php echo base_url('asset/js/nicescroll.min.js');?>
"><?php echo '</script'; ?>
>
        <!-- Scripts Area -->

        <link href="<?php echo base_url('asset/images/icon.png');?>
" rel='icon' type='image/x-icon' />

        <style type="text/css">
        
            #response,#responsez{display: none}.nicescroll-rails{z-index: 10000 !important;}
        
        </style>

    </head>
    <body>
        <div id="wrapper" class="clearfix">

        <?php if ($_smarty_tpl->tpl_vars['log']->value!="not") {?>
            <?php echo $_smarty_tpl->getSubTemplate ('repository/menu/overmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>
        <?php echo $_smarty_tpl->getSubTemplate ('repository/menu/menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        <div id="response"></div>

        <?php if ($_smarty_tpl->tpl_vars['log']->value!="not") {?>
            <!--<div class="cont-area2">
                <a class="btn btn-lg btn-success" href="<?php echo '<?php'; ?>
 echo base_url().$link <?php echo '?>'; ?>
"><?php echo '<?php'; ?>
 echo $nm; <?php echo '?>'; ?>
</a>
            </div>-->
        <?php } else { ?>
            <div class="cont-area">
                <a class="btn btn-lg btn-success" data-toggle="modal" data-target="#login">Log In</a>
                <a class="btn btn-lg btn-success" data-toggle="modal" data-target="#register" style="margin-left:30px;">Register</a>
            </div>
            <br/><br/><br/><br/>
            <?php echo $_smarty_tpl->getSubTemplate ('repository/login/login.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php echo $_smarty_tpl->getSubTemplate ('repository/register/register.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?><?php }} ?>
