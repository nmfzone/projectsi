{include file='adminarea/header.tpl'}

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

<script type="text/javascript">
$(document).ready(function (){
    //fill data buku
    var btnedit='';
    var btndelete = '';
    showbuku();

    //add new buku
    $("#newbuku").on('click', function (e){
        e.preventDefault();
        $.colorbox({
            href:"{base_url('adminarea/data/buku/viewnew')}",
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
            url:'{base_url('adminarea/data/buku/show')}',
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
                href:"{base_url('adminarea/data/buku/edit-')}"+editid,
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
</script>
{include file='adminarea/footer.tpl'}