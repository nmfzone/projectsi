<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-30 12:14:54
         compiled from "..\application\views\adminarea\v_peminjaman.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1988654cb75be35f5a7-13517070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc7bfbc1efcbc76d58f4d1f4e41b899d0918cb49' => 
    array (
      0 => '..\\application\\views\\adminarea\\v_peminjaman.tpl',
      1 => 1422586155,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1988654cb75be35f5a7-13517070',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54cb75be43e1b6_90755902',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cb75be43e1b6_90755902')) {function content_54cb75be43e1b6_90755902($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('adminarea/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="row clear_fix">
    <div class="col-md-12">

        <a class="btn btn-lg btn-success" id="newpinjam" style="float:right;">Tambah Peminjaman</a>
        <div class="space h30"></div>
        <div id="response"></div>
        <table class="table">
            <thead><tr><th>No.</th><th>ID Peminjaman</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>ID Buku</th><th>ID Member</th><th>ID Booking</th><th>Action</th></tr></thead>
            <tbody id="listpinjam">
            
            </tbody>
            <tfoot></tfoot>
        </table>

    </div>
</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function (){
    //fill data member
    var btnedit='';
    var btndelete = '';
    showpinjam();

    //add new member
    $("#newpinjam").on('click', function (e){
        e.preventDefault();
        $.colorbox({
            href:"<?php echo base_url('adminarea/data/peminjaman/viewnew');?>
",
            top:50,
            width:500,
            onClosed:function() {
                $.colorbox.close();
                showpinjam();
            }
            });
    });

    function showpinjam() {
        $("#loader").show();
        $.ajax({
            url:'<?php echo base_url('adminarea/data/peminjaman/show');?>
',
            type:'GET'
        }).done(function (data){
            $("#listpinjam").html(data);
            $("#loader").hide();
            btnedit = $("#listpinjam .btnedit");
            btndelete = $("#listpinjam .btndelete");
            var deleteurl = btndelete.attr('href');
            var editurl = btnedit.attr('href');
            //delete peminjaman
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
                        showpinjam();
                    });
                }
            });
            
            //edit peminjaman
            btnedit.on('click', function (e){
                e.preventDefault();
                var editid = $(this).data('id');
                $.colorbox({
                href:"<?php echo base_url('adminarea/data/peminjaman/edit-');?>
"+editid,
                top:50,
                width:500,
                onClosed:function() {
                    showpinjam();
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
