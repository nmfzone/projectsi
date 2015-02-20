{include file='adminarea/header.tpl'}
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

<script type="text/javascript">
$(document).ready(function (){
    //fill data member
    var btnedit='';
    var btndelete = '';
    showmember();

    //add new member
    $("#newmember").on('click', function (e){
        e.preventDefault();
        $.colorbox({
            href:"{base_url('adminarea/data/member/viewnew')}",
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
            url:'{base_url('adminarea/data/member/show')}',
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
                href:"{base_url('adminarea/data/member/edit-')}"+editid,
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
</script>
{include file='adminarea/footer.tpl'}