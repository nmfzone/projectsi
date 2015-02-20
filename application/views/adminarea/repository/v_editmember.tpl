	<div class="well">
	    <div class="errorresponse">
	        
	    </div>
	    {form_open('adminarea/data/member/update', $form)}
		{foreach $query->result() as $row}
	            <div class="form-group">
	                <label for="noid">No Identitas</label>
	                <input type="text" name="noid" class="form-control" value="{$row->no_identitas}">
	            </div>
	            <div class="form-group">
	                <label for="nama">Nama</label>
	                <input class="form-control" name="nama" type="text" value="{$row->nama}">
	            </div>
	        <table><tr>
	            <td><div class="form-group">
	                <label for="username">Username</label>
	                <input type="text" name="username" class="form-control" value="{$row->username}">
	            </div></td>
	            <td style="padding-left:10px;"><div class="form-group">
	                <label for="password">New Password</label>
	                <input type="password" name="password" class="form-control">
	            </div></td>
	        </tr></table>
	            <div class="form-group">
	                <label for="alamat">Alamat</label>
	            	<textarea name="alamat" cols="30" rows="3" class="form-control">{$row->alamat}</textarea>
	            </div>
	            <div class="form-group">
	                <label for="nohp">No Handphone</label>
	                <input type="text" name="nohp" class="form-control" value="{$row->no_hp}">
	            </div>
	            <div class="form-group">
	            	<input type="hidden" name="hidden" value="{$id}"/>
	                <input type="submit" class="btn btn-success" id="btneditmbr" value="Update Member">
	            </div>
	    {/foreach}
	    {form_close()}
	</div>
</div>

<script type="text/javascript">
$(document).ready(function (){
    $("#frmeditmember").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'{base_url('adminarea/data/member/update')}',
            type:'POST',
            dataType:'json',
            data: $("#frmeditmember").serialize()
        }).done(function (data){
            window.mydata = data;
                if(mydata['error'] !=""){
                    $(".errorresponse").html(mydata['error']);
                }
                else {
	                $(".errorresponse").text('');
	                $('#frmeditmember')[0].reset();
	                $.colorbox.close();
	                $("#response").html(mydata['success']).slideDown(300).delay(3000).slideUp(300);
                }
        });
    });    
});

    
</script>
</body>
</html>