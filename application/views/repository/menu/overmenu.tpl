<div id='navigasi'>
	<div class="mn-topz">
		<div class="mn-userz">
			<div class="kirrri">
				<div><a onClick='window.self.history.back()' title="Klik Untuk Kembali ke Sebelumnya">Kembali</a></div>
			</div> 
			<div class="kannnan">
				<div><a href="{base_url()}">Home</a></div>
				<div><a href="{base_url()}{$link}">{$nm}</a></div>
			</div>
		</div>

	<div class="mn-prf">
		<div class="skiri">

		</div>
		<div class="skanan">
		     <span class="name">
		     	{if $log == "mbr" }
		     		{$nmmember}
		     	{else}
		     		Admin
		     	{/if}
		     </span>
		</div>
		<div class="brrdr"></div>
		<a href="{base_url('auth/logout')}" title="Klik Untuk Keluar">
		<div class="skeluar">
		     <span class="klrr">Keluar</span>
		</div>
		</a>
		</div>

		<div style="clear:both;"></div>
	</div>
</div>
<br/><br/><br/><br/>