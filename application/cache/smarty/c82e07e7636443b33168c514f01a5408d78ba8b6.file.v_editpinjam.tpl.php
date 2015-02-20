<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-30 12:15:00
         compiled from "..\application\views\adminarea\repository\v_editpinjam.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1013554cb75c4ed8038-08011752%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c82e07e7636443b33168c514f01a5408d78ba8b6' => 
    array (
      0 => '..\\application\\views\\adminarea\\repository\\v_editpinjam.tpl',
      1 => 1422590638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1013554cb75c4ed8038-08011752',
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
  'unifunc' => 'content_54cb75c50a12d4_04887556',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cb75c50a12d4_04887556')) {function content_54cb75c50a12d4_04887556($_smarty_tpl) {?>	<div class="well">
	    <div class="errorresponse">
	        
	    </div>
	    <?php echo form_open('adminarea/data/member/update',$_smarty_tpl->tpl_vars['form']->value);?>

		<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['query']->value->result(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
	            <div class="form-group">
	                <label for="idbuku">ID Buku</label>
	                <input type="text" name="idbuku" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->id_buku;?>
">
	            </div>
	            <div class="form-group">
	                <label for="idmember">ID Member</label>
	                <input class="form-control" name="idmember" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->id_member;?>
">
	            </div>
	            <div class="form-group">
	            	<input type="hidden" name="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
	                <input type="submit" class="btn btn-success" id="btneditpinjam" value="Update Peminjaman">
	            </div>
	    <?php } ?>
	    <?php echo form_close();?>

	</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function (){
    $("#frmeditpinjam").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?php echo base_url('adminarea/data/peminjaman/update');?>
',
            type:'POST',
            dataType:'json',
            data: $("#frmeditpinjam").serialize()
        }).done(function (data){
            window.mydata = data;
                if(mydata['error'] !=""){
                    $(".errorresponse").html(mydata['error']);
                }
                else {
	                $(".errorresponse").text('');
	                $('#frmeditpinjam')[0].reset();
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
