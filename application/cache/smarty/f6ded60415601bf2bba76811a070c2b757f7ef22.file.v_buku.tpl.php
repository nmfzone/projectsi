<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-30 12:15:15
         compiled from "..\application\views\adminarea\v_buku.tpl" */ ?>
<?php /*%%SmartyHeaderCode:938554cb75d3983000-38539729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6ded60415601bf2bba76811a070c2b757f7ef22' => 
    array (
      0 => '..\\application\\views\\adminarea\\v_buku.tpl',
      1 => 1422589172,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '938554cb75d3983000-38539729',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54cb75d3a3f8b2_89198398',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cb75d3a3f8b2_89198398')) {function content_54cb75d3a3f8b2_89198398($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('adminarea/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="row clear_fix">
    <div class="col-md-12">

        <a class="btn btn-lg btn-success" id="newbuku" style="float:right;">Tambah Buku</a>
        <div class="space h30"></div>
        <div id="response"></div>
        <table class="table">
            <thead><tr><th>No.</th><th>Kode</th><th>Judul</th><th>Pengarang</th><th>Penerbit</th><th>Halaman</th><th>Tahun</th><th>Jenis</th><th>Masuk</th><th>Sumber</th><th>Status</th><th>Keterangan</th><th>Action</th></tr></thead>
            <tbody id="listbuku">
            
            </tbody>
            <tfoot></tfoot>
        </table>

    </div>
</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function (){
    //fill data buku
    var btnedit='';
    var btndelete = '';
    showbuku();

    //add new buku
    $("#newbuku").on('click', function (e){
        e.preventDefault();
        $.colorbox({
            href:"<?php echo base_url('adminarea/data/buku/viewnew');?>
",
            top:35,
            width:550,
            onClosed:function() {
                $.colorbox.close();
                showbuku();
            }
            });
    });

    function showbuku() {
        $("#loader").show();
        $.ajax({
            url:'<?php echo base_url('adminarea/data/buku/show');?>
',
            type:'GET'
        }).done(function (data){
            $("#listbuku").html(data);
            $("#loader").hide();
            btnedit = $("#listbuku .btnedit");
            btndelete = $("#listbuku .btndelete");
            var deleteurl = btndelete.attr('href');
            var editurl = btnedit.attr('href');
            //delete buku
            btndelete.on('click', function (e){
                e.preventDefault();
                var deleteid = $(this).data('id');
                if(confirm("Are you sure?")){
                    $("#loader").show();
                    $.ajax({
                    url:deleteurl,
                    type:'POST' ,
                    data:'id='+deleteid
                    }).done(function (data) {
                        $("#response").html(data).slideDown(300).delay(3000).slideUp(300);
                        $("#loader").hide();
                        showbuku();
                    });
                }
            });
            
            //edit buku
            btnedit.on('click', function (e){
                e.preventDefault();
                var editid = $(this).data('id');
                $.colorbox({
                href:"<?php echo base_url('adminarea/data/buku/edit-');?>
"+editid,
                top:35,
                width:550,
                onClosed:function() {
                    showbuku();
                }
                });
            });
        });
    }
});
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ('adminarea/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
