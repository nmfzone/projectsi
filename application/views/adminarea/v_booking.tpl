{include file='adminarea/header.tpl'}

<div class="row clear_fix">
    <div class="col-md-12">

        <a class="btn btn-lg btn-success" id="newbooking" style="float:right;">Tambah Peminjaman</a>
        <div class="space h30"></div>
        <div id="response"></div>
        <table class="table">
            <thead><tr><th>No.</th><th>ID Booking</th><th>Tanggal Booking</th><th>Tanggal Kadaluarsa</th><th>ID Buku</th><th>ID Member</th><th>Action</th></tr></thead>
            <tbody id="listbooking">
            
            </tbody>
            <tfoot></tfoot>
        </table>

    </div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function (){
    //fill data booking
    var btnedit='';
    var btndelete = '';
    showbooking();

    //add new member
    $("#newbooking").on('click', function (e){
        e.preventDefault();
        $.colorbox({
            href:"{base_url('adminarea/data/peminjaman/viewnew')}",
            top:50,
            width:500,
            onClosed:function() {
                $.colorbox.close();
                showbooking();
            }
            });
    });

    function showbooking() {
        $("#loader").show();
        $.ajax({
            url:'{base_url('adminarea/data/booking/show')}',
            type:'GET'
        }).done(function (data){
            $("#listbooking").html(data);
            $("#loader").hide();
            btnedit = $("#listbooking .btnedit");
            btndelete = $("#listbooking .btndelete");
            var deleteurl = btndelete.attr('href');
            var editurl = btnedit.attr('href');

            //delete booking
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
                        showbooking();
                    });
                }
            });
            
        });
    }
});
</script>
{include file='adminarea/footer.tpl'}