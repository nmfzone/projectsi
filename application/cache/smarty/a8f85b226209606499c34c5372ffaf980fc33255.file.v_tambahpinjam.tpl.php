<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-30 12:15:06
         compiled from "..\application\views\adminarea\repository\v_tambahpinjam.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1218954cb75caeab0f4-29317045%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8f85b226209606499c34c5372ffaf980fc33255' => 
    array (
      0 => '..\\application\\views\\adminarea\\repository\\v_tambahpinjam.tpl',
      1 => 1422589976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1218954cb75caeab0f4-29317045',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54cb75cb021623_28798499',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cb75cb021623_28798499')) {function content_54cb75cb021623_28798499($_smarty_tpl) {?>	<div class="well">
	    <div class="errorresponse">
	        
	    </div>
	    <?php echo form_open('adminarea/data/peminjaman/new',$_smarty_tpl->tpl_vars['form']->value);?>

	            <div class="form-group">
	                <label for="idbuku">ID Buku</label>
	                <input type="text" name="idbuku" class="form-control">
	            </div>
	            <div class="form-group">
	                <label for="idmember">ID Member</label>
	                <input class="form-control" name="idmember" type="text">
	            </div>
	            <div class="form-group">
	                <input type="submit" class="btn btn-success" id="btnnewpinjam" value="Tambah Peminjaman">
	            </div>
	    <?php echo form_close();?>

	</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function (){
    $("#frmnewpinjam").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?php echo base_url('adminarea/data/peminjaman/new');?>
',
            type:'POST',
            dataType:'json',
            data: $("#frmnewpinjam").serialize()
        }).done(function (data){
            window.mydata = data;
                if(mydata['error'] !=""){
                    $(".errorresponse").html(mydata['error']);
                }
                else {
	                $(".errorresponse").text('');
	                $('#frmnewpinjam')[0].reset();
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
