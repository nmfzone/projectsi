<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-30 12:14:45
         compiled from "..\application\views\adminarea\v_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2173654cb75b5d24265-63033934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '273b105a454bb623d9ef752afccb4c9fb3ff7f3d' => 
    array (
      0 => '..\\application\\views\\adminarea\\v_admin.tpl',
      1 => 1422586007,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2173654cb75b5d24265-63033934',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54cb75b5dc5e69_60851489',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cb75b5dc5e69_60851489')) {function content_54cb75b5dc5e69_60851489($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('adminarea/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="row clear_fix">
    <div class="col-md-12">
    <center>
        <a class="btn btn-lg btn-success" href="<?php echo base_url('adminarea/data/peminjaman');?>
">Data Peminjaman</a><br/><br/>
        <a class="btn btn-lg btn-success" href="<?php echo base_url('adminarea/data/buku');?>
">Data Buku</a><br/><br/>
        <a class="btn btn-lg btn-success" href="<?php echo base_url('adminarea/data/member');?>
">Data Member</a><br/><br/>
        <a class="btn btn-lg btn-success" href="<?php echo base_url('adminarea/data/booking');?>
">Data Booking</a><br/><br/>
        <a class="btn btn-lg btn-success" href="<?php echo base_url('adminarea/data/denda');?>
">Data Denda</a><br/><br/>
    </center>


    </div>
</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('adminarea/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
