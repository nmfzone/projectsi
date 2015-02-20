<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-30 12:16:13
         compiled from "..\application\views\adminarea\repository\v_editmember.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1548354cb760d1f49d9-32678370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a93271bb0760d877ca4674daaf41ff52d7bad67f' => 
    array (
      0 => '..\\application\\views\\adminarea\\repository\\v_editmember.tpl',
      1 => 1422589236,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1548354cb760d1f49d9-32678370',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form' => 0,
    'query' => 0,
    'row' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54cb760d2a1d47_64518281',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cb760d2a1d47_64518281')) {function content_54cb760d2a1d47_64518281($_smarty_tpl) {?>	<div class="well">
	    <div class="errorresponse">
	        
	    </div>
	    <?php echo form_open('adminarea/data/member/update',$_smarty_tpl->tpl_vars['form']->value);?>

		<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['query']->value->result(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
	            <div class="form-group">
	                <label for="noid">No Identitas</label>
	                <input type="text" name="noid" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->no_identitas;?>
">
	            </div>
	            <div class="form-group">
	                <label for="nama">Nama</label>
	                <input class="form-control" name="nama" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->nama;?>
">
	            </div>
	        <table><tr>
	            <td><div class="form-group">
	                <label for="username">Username</label>
	                <input type="text" name="username" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->username;?>
">
	            </div></td>
	            <td style="padding-left:10px;"><div class="form-group">
	                <label for="password">New Password</label>
	                <input type="password" name="password" class="form-control">
	            </div></td>
	        </tr></table>
	            <div class="form-group">
	                <label for="alamat">Alamat</label>
	            	<textarea name="alamat" cols="30" rows="3" class="form-control"><?php echo $_smarty_tpl->tpl_vars['row']->value->alamat;?>
</textarea>
	            </div>
	            <div class="form-group">
	                <label for="nohp">No Handphone</label>
	                <input type="text" name="nohp" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->no_hp;?>
">
	            </div>
	            <div class="form-group">
	            	<input type="hidden" name="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
	                <input type="submit" class="btn btn-success" id="btneditmbr" value="Update Member">
	            </div>
	    <?php } ?>
	    <?php echo form_close();?>

	</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function (){
    $("#frmeditmember").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?php echo base_url('adminarea/data/member/update');?>
',
            type:'POST',
            dataType:'json',
            data: $("#frmeditmember").serialize()
        }).done(function (data){
            window.mydata = data;
                if(mydata['error'] !=""){
                    $(".errorresponse").html(mydata['error']);
                }
                else {
	                $(".errorresponse").text('');
	                $('#frmeditmember')[0].reset();
	                $.colorbox.close();
	                $("#response").html(mydata['success']).slideDown(300).delay(3000).slideUp(300);
                }
        });
    });    
});

    
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
