{include file='header.tpl'}

	    	<div style="clear:both;"></div>

	    	<style type="text/css">
	    	{literal}
	    		#footer {background:none;text-align: center;margin-top:60px;}
	    	{/literal}
	    	</style>

	    	<div id="main">
	    		<div id="m-left">
	    			<div class="search-area"><center>
					    <div class="stitle">Search Buku</div>
						<input type="text" id="searchid" class="search form-control" autocomplete="off">

						<div id="hasil">
							<ul id="results"></ul>
						</div></center>
					</div>
				</div>

				<div id="m-right">
					{include file='repository/sidebar/sidebar.tpl'}
				</div>

			</div>

	<script>
        $(document).ready(function (){
			$(".search").keyup(function() { 
				var searchid = $(this).val();
				var dataString = 'search='+ searchid;
				$.ajax({
					type: "POST",
					url: "{base_url('index/search')}",
					data: dataString,
					cache: false,
					success: function(html) {
						if(html != ' ') {
							$("#hasil").show();
							$("#results").html(html).show();
						} else {
							$("#hasil").hide();
						}
					   	
					}
				});
				return false;    
			});
		});
	</script>

{include file='footer.tpl'}