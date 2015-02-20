<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-08 01:34:32
         compiled from "..\application\views\repository\login\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:349854cb75717ba3f4-47294060%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89bd2210319f715783708cedf165b94e810137e8' => 
    array (
      0 => '..\\application\\views\\repository\\login\\login.tpl',
      1 => 1422995181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '349854cb75717ba3f4-47294060',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54cb75717ef4c3_27100386',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cb75717ef4c3_27100386')) {function content_54cb75717ef4c3_27100386($_smarty_tpl) {?>		<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		    <div class="modal-dialog" style="top:100px;">
			    <div class="modal-content">
				    <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title" id="myModalLabel">LOGIN</h4>
				    </div>
				    <div class="modal-body">
				        <div class="row clear_fix">
				            <div class="col-md-6 col-md-offset-3">
				                <p class="alert alert-danger" id="responsez"></p>
				                <form id="frm_login" role="form" action="<?php echo base_url('auth/login/start');?>
" method="POST">
				                    <div class="form-group">
				                        <label for="">User name</label>
				                        <input type="text" class="form-control username" name="username"  placeholder="User name">
				                    </div>
				                    <div class="form-group">
				                        <label for="">Password</label>
				                        <input type="password" class="form-control password" name="password"  placeholder="Password">
				                    </div>
				                    <input type="submit" class="btn btn-info btn-block" id="sbmvalue" value="Login">
				                </form>
				            </div>
		            	</div>
				    </div>
			    </div>
			</div>
		</div><?php }} ?>
