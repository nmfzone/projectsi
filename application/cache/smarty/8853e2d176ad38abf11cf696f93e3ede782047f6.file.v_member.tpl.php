<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-30 12:15:59
         compiled from "..\application\views\adminarea\v_member.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2342054cb75ff1f62b2-73671044%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8853e2d176ad38abf11cf696f93e3ede782047f6' => 
    array (
      0 => '..\\application\\views\\adminarea\\v_member.tpl',
      1 => 1422586146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2342054cb75ff1f62b2-73671044',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54cb75ff299844_47294214',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cb75ff299844_47294214')) {function content_54cb75ff299844_47294214($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('adminarea/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="row clear_fix">
    <div class="col-md-12">

        <a class="btn btn-lg btn-success" id="newmember" style="float:right;">Tambah Member</a>
        <div class="space h30"></div>
        <div id="response"></div>
        <table class="table">
            <thead><tr><th>No.</th><th>ID Member</th><th>No Identitas</th><th>Nama</th><th>Alamat</th><th>No Hp</th><th>Action</th></tr></thead>
            <tbody id="listmember">
            
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
    showmember();

    //add new member
    $("#newmember").on('click', function (e){
        e.preventDefault();
        $.colorbox({
            href:"<?php echo base_url('adminarea/data/member/viewnew');?>
",
            top:50,
            width:500,
            onClosed:function() {
                $.colorbox.close();
                showmember();
            }
            });
    });

    function showmember() {
        $("#loader").show();
        $.ajax({
            url:'<?php echo base_url('adminarea/data/member/show');?>
',
            type:'GET'
        }).done(function (data){
            $("#listmember").html(data);
            $("#loader").hide();
            btnedit = $("#listmember .btnedit");
            btndelete = $("#listmember .btndelete");
            var deleteurl = btndelete.attr('href');
            var editurl = btnedit.attr('href');
            //delete member
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
                        showmember();
                    });
                }
            });
            
            //edit member
            btnedit.on('click', function (e){
                e.preventDefault();
                var editid = $(this).data('id');
                $.colorbox({
                href:"<?php echo base_url('adminarea/data/member/edit-');?>
"+editid,
                top:50,
                width:500,
                onClosed:function() {
                    showmember();
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
