	<div class="well">
	    <div class="errorresponse">
	        
	    </div>
	    {form_open('adminarea/data/member/update', $form)}
		{foreach $query->result() as $row}
	            <div class="form-group">
	                <label for="idbuku">ID Buku</label>
	                <input type="text" name="idbuku" class="form-control" value="{$row->id_buku}">
	            </div>
	            <div class="form-group">
	                <label for="idmember">ID Member</label>
	                <input class="form-control" name="idmember" type="text" value="{$row->id_member}">
	            </div>
	            <div class="form-group">
	            	<input type="hidden" name="hidden" value="{$id}"/>
	                <input type="submit" class="btn btn-success" id="btneditpinjam" value="Update Peminjaman">
	            </div>
	    {/foreach}
	    {form_close()}
	</div>
</div>

<script type="text/javascript">
$(document).ready(function (){
    $("#frmeditpinjam").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'{base_url('adminarea/data/peminjaman/update')}',
            type:'POST',
            dataType:'json',
            data: $("#frmeditpinjam").serialize()
        }).done(function (data){
            window.mydata = data;
                if(mydata['error'] !=""){
                    $(".errorresponse").html(mydata['error']);
                }
                else {
	                $(".errorresponse").text('');
	                $('#frmeditpinjam')[0].reset();
	                $.colorbox.close();
	                $("#response").html(mydata['success']).slideDown(300).delay(3000).slideUp(300);
                }
        });
    });    
});

    
</script>
</body>
</html>