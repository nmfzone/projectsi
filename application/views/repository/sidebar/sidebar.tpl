	<div id="sidebar">
		<div class="new-box">
			<div class="ttl-box"><b>New Collection</b></div>
			<div class="content-box">
			{foreach $listbuku->result() as $row}
				<div class="list"><a href="{base_url()}read/{$row->link}">{$row->judul}</a></div><br/>
			{/foreach}
			</div>
		</div>
	</div>