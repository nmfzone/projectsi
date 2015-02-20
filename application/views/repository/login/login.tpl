		<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		    <div class="modal-dialog" style="top:100px;">
			    <div class="modal-content">
				    <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title" id="myModalLabel">LOGIN</h4>
				    </div>
				    <div class="modal-body">
				        <div class="row clear_fix">
				            <div class="col-md-6 col-md-offset-3">
				                <p class="alert alert-danger" id="responsez"></p>
				                <form id="frm_login" role="form" action="{base_url('auth/login/start')}" method="POST">
				                    <div class="form-group">
				                        <label for="">User name</label>
				                        <input type="text" class="form-control username" name="username"  placeholder="User name">
				                    </div>
				                    <div class="form-group">
				                        <label for="">Password</label>
				                        <input type="password" class="form-control password" name="password"  placeholder="Password">
				                    </div>
				                    <input type="submit" class="btn btn-info btn-block" id="sbmvalue" value="Login">
				                </form>
				            </div>
		            	</div>
				    </div>
			    </div>
			</div>
		</div>