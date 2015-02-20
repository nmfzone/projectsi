<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-30 12:14:15
         compiled from "..\application\views\v_artikel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1758054cb7597cfa651-69040865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f861c8222f8588935c34b1fc85fe23125f049fa4' => 
    array (
      0 => '..\\application\\views\\v_artikel.tpl',
      1 => 1422530272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1758054cb7597cfa651-69040865',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'query' => 0,
    'log' => 0,
    'row' => 0,
    'nmmember' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54cb7597eed843_57016930',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cb7597eed843_57016930')) {function content_54cb7597eed843_57016930($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
			<div id="main">
				<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['query']->value->result(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['log']->value=='mbr') {?>
				<a class="btn btn-lg btn-success" id="booking" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value->id_buku;?>
" style="float:right;">Booking</a>
				<br/><br/><br/>
				<?php }?>
				<div style="clear:both"></div><br/>
				<div id="wrap-area">
					<div id="articlee">
						<div class="judul">
							<h3><?php echo $_smarty_tpl->tpl_vars['row']->value->judul;?>
</h3>
						</div>
						<div style="clear:both"></div><br/>
						<div class="images">
							<img src='' title='<?php echo $_smarty_tpl->tpl_vars['row']->value->judul;?>
' width='350px' height='400px' />
						</div>
						<div style="clear:both"></div><br/>
				        <div class="detail">
				        	<table>
				        		<tr>
				        			<td>Pengarang</td>
				        			<td> : </td>
				        			<td>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['row']->value->pengarang;?>
</td>
				        		</tr>
				        		<tr>
				        			<td>Penerbit</td>
				        			<td> : </td>
				        			<td>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['row']->value->penerbit;?>
</td>
				        		</tr>
				        		<tr>
				        			<td>Halaman</td>
				        			<td> : </td>
				        			<td>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['row']->value->halaman;?>
</td>
				        		</tr>
				        		<tr>
				        			<td>Tahun Terbit</td>
				        			<td> : </td>
				        			<td>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['row']->value->tahun_terbit;?>
</td>
				        		</tr>
				        		<tr>
				        			<td>Jenis</td>
				        			<td> : </td>
				        			<td>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['row']->value->jenis;?>
</td>
				        		</tr>
				        		<tr>
				        			<td>Sumber Buku</td>
				        			<td> : </td>
				        			<td>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['row']->value->sumber_buku;?>
</td>
				        		</tr>
				        		<tr>
				        			<td>Status</td>
				        			<td> : </td>
				        			<td>&nbsp;&nbsp;<b style="color:green;">
				        			<?php if ($_smarty_tpl->tpl_vars['row']->value->status==0) {?>
				        				Tersedia
				        			<?php } elseif ($_smarty_tpl->tpl_vars['row']->value->status==1) {?>
				        				Boooked
				        			<?php } else { ?>
				        				Dipinjam
				        			<?php }?></b></td>
				        		</tr>
				        	</table>
				        </div>
				        <div class="ringkasan">
				        	<table>
				        		<tr>
				        			<td>Deskripsi</td>
				        			<td> : </td>
				        		</tr>
				        	</table>
				        	<?php echo $_smarty_tpl->tpl_vars['row']->value->deskripsi;?>

				        </div>
				    </div><!-- End Articlee -->
			    <?php } ?>
				    <div class="asidebar">
				   		<?php echo $_smarty_tpl->getSubTemplate ('repository/sidebar/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				    </div>
			    </div><!-- End Wrap Area -->
			</div>

	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function (){
			$("#booking").on('click', function (e){
                e.preventDefault();
                var booking = '<?php echo base_url('member/mb/booking');?>
';
                var bukuid  = $(this).data('id');
                var nama    = '<?php echo $_smarty_tpl->tpl_vars['nmmember']->value;?>
';
                if(confirm("Anda serius ingin melakukan Booking buku ini?")){
                    $("#loader").show();
                    $.ajax({
                    url:booking,
                    type:'POST' ,
                    data:'id='+bukuid+'&nama='+nama
                    }).done(function (data) {
                        $("#response").html(data).slideDown(300).delay(20000).slideUp(300);
                        $("#loader").hide();
                    });
                }
            });
        });
	<?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
