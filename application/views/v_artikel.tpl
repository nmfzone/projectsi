{include file='header.tpl'}
	
			<div id="main">
				{foreach $query->result() as $row}
				{if $log == 'mbr'}
				<a class="btn btn-lg btn-success" id="booking" data-id="{$row->id_buku}" style="float:right;">Booking</a>
				<br/><br/><br/>
				{/if}
				<div style="clear:both"></div><br/>
				<div id="wrap-area">
					<div id="articlee">
						<div class="judul">
							<h3>{$row->judul}</h3>
						</div>
						<div style="clear:both"></div><br/>
						<div class="images">
							<img src='' title='{$row->judul}' width='350px' height='400px' />
						</div>
						<div style="clear:both"></div><br/>
				        <div class="detail">
				        	<table>
				        		<tr>
				        			<td>Pengarang</td>
				        			<td> : </td>
				        			<td>&nbsp;&nbsp;{$row->pengarang}</td>
				        		</tr>
				        		<tr>
				        			<td>Penerbit</td>
				        			<td> : </td>
				        			<td>&nbsp;&nbsp;{$row->penerbit}</td>
				        		</tr>
				        		<tr>
				        			<td>Halaman</td>
				        			<td> : </td>
				        			<td>&nbsp;&nbsp;{$row->halaman}</td>
				        		</tr>
				        		<tr>
				        			<td>Tahun Terbit</td>
				        			<td> : </td>
				        			<td>&nbsp;&nbsp;{$row->tahun_terbit}</td>
				        		</tr>
				        		<tr>
				        			<td>Jenis</td>
				        			<td> : </td>
				        			<td>&nbsp;&nbsp;{$row->jenis}</td>
				        		</tr>
				        		<tr>
				        			<td>Sumber Buku</td>
				        			<td> : </td>
				        			<td>&nbsp;&nbsp;{$row->sumber_buku}</td>
				        		</tr>
				        		<tr>
				        			<td>Status</td>
				        			<td> : </td>
				        			<td>&nbsp;&nbsp;<b style="color:green;">
				        			{if $row->status == 0}
				        				Tersedia
				        			{elseif $row->status == 1}
				        				Boooked
				        			{else}
				        				Dipinjam
				        			{/if}</b></td>
				        		</tr>
				        	</table>
				        </div>
				        <div class="ringkasan">
				        	<table>
				        		<tr>
				        			<td>Deskripsi</td>
				        			<td> : </td>
				        		</tr>
				        	</table>
				        	{$row->deskripsi}
				        </div>
				    </div><!-- End Articlee -->
			    {/foreach}
				    <div class="asidebar">
				   		{include file='repository/sidebar/sidebar.tpl'}
				    </div>
			    </div><!-- End Wrap Area -->
			</div>

	<script type="text/javascript">
		$(document).ready(function (){
			$("#booking").on('click', function (e){
                e.preventDefault();
                var booking = '{base_url('member/mb/booking')}';
                var bukuid  = $(this).data('id');
                var nama    = '{$nmmember}';
                if(confirm("Anda serius ingin melakukan Booking buku ini?")){
                    $("#loader").show();
                    $.ajax({
                    url:booking,
                    type:'POST' ,
                    data:'id='+bukuid+'&nama='+nama
                    }).done(function (data) {
                        $("#response").html(data).slideDown(300).delay(20000).slideUp(300);
                        $("#loader").hide();
                    });
                }
            });
        });
	</script>

{include file='footer.tpl'}