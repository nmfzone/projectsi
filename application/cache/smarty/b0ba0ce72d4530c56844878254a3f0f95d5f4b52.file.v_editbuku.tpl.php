<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-30 12:15:37
         compiled from "..\application\views\adminarea\repository\v_editbuku.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2027354cb75e96c3541-21879241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0ba0ce72d4530c56844878254a3f0f95d5f4b52' => 
    array (
      0 => '..\\application\\views\\adminarea\\repository\\v_editbuku.tpl',
      1 => 1422588146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2027354cb75e96c3541-21879241',
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
  'unifunc' => 'content_54cb75e978e304_83925592',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cb75e978e304_83925592')) {function content_54cb75e978e304_83925592($_smarty_tpl) {?>	<div class="well">
	    <div class="errorresponse">
	        
	    </div>
	    <?php echo form_open('adminarea/data/buku/update',$_smarty_tpl->tpl_vars['form']->value);?>

		<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['query']->value->result(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
	            <table>
		        	<tr>
			            <td width="35%"><div class="form-group">
	                		<label for="nokode">Kode Buku</label>
	                		<input type="text" name="nokode" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->kode;?>
">
	            		</div></td>
			            <td style="padding-left:10px;" width="55%"><div class="form-group">
			                <label for="pengarang">Pengarang</label>
			                <input type="text" name="pengarang" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->pengarang;?>
">
			            </div></td>
		        	</tr>
		       	</table>
	            <div class="form-group">
	                <label for="judul">Judul</label>
	                <input class="form-control" name="judul" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->judul;?>
">
	            </div>
		        <table>
		        	<tr>
			            <td><div class="form-group">
			                <label for="penerbit">Penerbit</label>
			                <input type="text" name="penerbit" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->penerbit;?>
">
			            </div></td>
			            <td style="padding-left:10px;"><div class="form-group">
			                <label for="jenis">Jenis</label>
			                <input type="text" name="jenis" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->jenis;?>
">
			            </div></td>
			            <td style="padding-left:10px;"><div class="form-group">
			                <label for="halaman">Halaman</label>
			                <input type="text" name="halaman" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->halaman;?>
">
			            </div></td>
		        	</tr>
		       	</table>
		       	<table>
		        	<tr>
			            <td><div class="form-group">
			                <label for="tahun">Tahun Terbit</label>
			                <input type="text" name="tahun" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->tahun_terbit;?>
">
			            </div></td>
			            <td style="padding-left:10px;"><div class="form-group">
			                <label for="tglmasuk">Tanggal Masuk</label>
			                <input type="date" name="tglmasuk" class="form-control" id="datepicker" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->tanggal_masuk;?>
">
			            </div></td>
			            <td style="padding-left:10px;"><div class="form-group">
			                <label for="sumber">Sumber Buku</label>
			                <input type="text" name="sumber" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->sumber_buku;?>
">
			            </div></td>
		        	</tr>
		        </table>
	            <div class="form-group">
	                <label for="keterangan">Keterangan</label>
	            	<textarea name="keterangan" cols="30" rows="3" class="form-control"><?php echo $_smarty_tpl->tpl_vars['row']->value->keterangan;?>
</textarea>
	            </div>
	            <div class="form-group">
	            	<input type="hidden" name="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
	                <input type="submit" class="btn btn-success" id="btneditbuku" value="Update Buku">
	            </div>
	    <?php } ?>
	    <?php echo form_close();?>

	</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function (){
	$(function() {
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd'});
    });
    $("#frmeditbuku").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?php echo base_url('adminarea/data/buku/update');?>
',
            type:'POST',
            dataType:'json',
            data: $("#frmeditbuku").serialize()
        }).done(function (data){
            window.mydata = data;
                if(mydata['error'] !=""){
                    $(".errorresponse").html(mydata['error']);
                } else {
	                $(".errorresponse").text('');
	                $('#frmeditbuku')[0].reset();
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
