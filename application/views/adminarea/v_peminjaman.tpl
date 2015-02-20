{include file='adminarea/header.tpl'}
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

<script type="text/javascript">
$(document).ready(function (){
    //fill data member
    var btnedit='';
    var btndelete = '';
    showpinjam();

    //add new member
    $("#newpinjam").on('click', function (e){
        e.preventDefault();
        $.colorbox({
            href:"{base_url('adminarea/data/peminjaman/viewnew')}",
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
            url:'{base_url('adminarea/data/peminjaman/show')}',
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
                href:"{base_url('adminarea/data/peminjaman/edit-')}"+editid,
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
</script>
{include file='adminarea/footer.tpl'}