<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-30 12:15:23
         compiled from "..\application\views\adminarea\repository\v_tambahbuku.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2540954cb75dbd99a46-51366222%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e5cec176801defd7c61ba3cccd8c23464d4d510' => 
    array (
      0 => '..\\application\\views\\adminarea\\repository\\v_tambahbuku.tpl',
      1 => 1422589103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2540954cb75dbd99a46-51366222',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54cb75dbe73ee7_92665756',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cb75dbe73ee7_92665756')) {function content_54cb75dbe73ee7_92665756($_smarty_tpl) {?>	<div class="well">
	    <div class="errorresponse">
	        
	    </div> 
	    <?php echo form_open('adminarea/buku/newbuku',$_smarty_tpl->tpl_vars['form']->value);?>

	            <table>
		        	<tr>
			            <td width="35%"><div class="form-group">
	                		<label for="nokode">Kode Buku</label>
	                		<input type="text" name="nokode" class="form-control">
	            		</div></td>
			            <td style="padding-left:10px;" width="55%"><div class="form-group">
			                <label for="pengarang">Pengarang</label>
			                <input type="text" name="pengarang" class="form-control">
			            </div></td>
		        	</tr>
		       	</table>
	            <div class="form-group">
	                <label for="judul">Judul</label>
	                <input class="form-control" name="judul" type="text">
	            </div>
		        <table>
		        	<tr>
			            <td><div class="form-group">
			                <label for="penerbit">Penerbit</label>
			                <input type="text" name="penerbit" class="form-control">
			            </div></td>
			            <td style="padding-left:10px;"><div class="form-group">
			                <label for="jenis">Jenis</label>
			                <input type="text" name="jenis" class="form-control">
			            </div></td>
			            <td style="padding-left:10px;"><div class="form-group">
			                <label for="halaman">Halaman</label>
			                <input type="text" name="halaman" class="form-control">
			            </div></td>
		        	</tr>
		       	</table>
		       	<table>
		        	<tr>
			            <td><div class="form-group">
			                <label for="tahun">Tahun Terbit</label>
			                <input type="text" name="tahun" class="form-control" >
			            </div></td>
			            <td style="padding-left:10px;"><div class="form-group">
			                <label for="tglmasuk">Tanggal Masuk</label>
			                <input type="date" name="tglmasuk" class="form-control" id="datepicker">
			            </div></td>
			            <td style="padding-left:10px;"><div class="form-group">
			                <label for="sumber">Sumber Buku</label>
			                <input type="text" name="sumber" class="form-control">
			            </div></td>
		        	</tr>
		        </table>
	            <div class="form-group">
	                <label for="keterangan">Keterangan</label>
	            	<textarea name="keterangan" cols="30" rows="3" class="form-control"></textarea>
	            </div>
	            <div class="form-group">
	                <input type="submit" class="btn btn-success" id="btnnewbuku" value="Tambah Buku">
	            </div>
	    <?php echo form_close();?>

	</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function (){
    $(function() {
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd'});
    });
    $("#frmnewbuku").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?php echo base_url('adminarea/data/buku/new');?>
',
            type:'POST',
            dataType:'json',
            data: $("#frmnewbuku").serialize()
        }).done(function (data){
            window.mydata = data;
                if(mydata['error'] !=""){
                    $(".errorresponse").html(mydata['error']);
                }
                else {
	                $(".errorresponse").text('');
	                $('#frmnewbuku')[0].reset();
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
