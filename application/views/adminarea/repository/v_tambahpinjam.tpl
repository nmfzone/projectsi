	<div class="well">
	    <div class="errorresponse">
	        
	    </div>
	    {form_open('adminarea/data/peminjaman/new', $form)}
	            <div class="form-group">
	                <label for="idbuku">ID Buku</label>
	                <input type="text" name="idbuku" class="form-control">
	            </div>
	            <div class="form-group">
	                <label for="idmember">ID Member</label>
	                <input class="form-control" name="idmember" type="text">
	            </div>
	            <div class="form-group">
	                <input type="submit" class="btn btn-success" id="btnnewpinjam" value="Tambah Peminjaman">
	            </div>
	    {form_close()}
	</div>
</div>

<script type="text/javascript">
$(document).ready(function (){
    $("#frmnewpinjam").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'{base_url('adminarea/data/peminjaman/new')}',
            type:'POST',
            dataType:'json',
            data: $("#frmnewpinjam").serialize()
        }).done(function (data){
            window.mydata = data;
                if(mydata['error'] !=""){
                    $(".errorresponse").html(mydata['error']);
                }
                else {
	                $(".errorresponse").text('');
	                $('#frmnewpinjam')[0].reset();
	                $.colorbox.close();
	                $("#response").html(mydata['success']).slideDown(300).delay(3000).slideUp(300);
                }
        });
    });    
});

    
</script>
</body>
</html>