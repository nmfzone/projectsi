	    	<div style="clear:both"></div>
	    	<div id="footer">
	    		<p>Copyright NMFZONE</p>
	    	</div>
	    </div><!-- END Wrapper-->

	<script type="text/javascript">
        $(document).ready(function (){
            function set_static_header(position) {
                if (position > 0) {
                    if (!($("#wrapper").hasClass("static"))) {
                        $("#wrapper").addClass("static");
                    }

                } else {
                    if (($("#wrapper").hasClass("static"))) {
                        $("#wrapper").removeClass("static");
                    }
                }
            }
            // function to check is user is on touch device
            function is_touch_device() {
                return 'ontouchstart' in window // works on most browsers 
                        || 'onmsgesturechange' in window; // works on ie10
            }
            $("html").niceScroll().scrollstart(function(event) {
                if (!is_touch_device() && event.end.y > 0) {
                    set_static_header(1);
                }
            }).scrollend(function(event) {
                if (!is_touch_device() && event.end.y == 0) {
                    set_static_header(0);
                }
            });
            $("#frm_login").submit(function (e){
                e.preventDefault();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                var username = $('.username');
                var password = $('.password');
                var usr = username.val();
                var pas = password.val();
                var u = (/^\s+$/.test(username.val()));
                var p = (/^\s+$/.test(password.val()));
                var ua = (/^\s*$/.test(username.val()));
                var pa = (/^\s*$/.test(password.val()));

                if ((u || ua) && (p || pa)) {
                	username.focus(); // focus to the filed
                    $("#responsez").hide();
                    $("#responsez").show('slow');
                    $("#responsez").html('- Username belum dimasukkan!<br/>- Password belum dimasukkan!');
                    return false;
                } else if (u || ua) { // Check the username values is empty or not
                    username.focus(); // focus to the filed
                    $("#responsez").hide();
                    $("#responsez").show('slow');
                    $("#responsez").html('Username belum dimasukkan!');
                    return false;
                } else if (p || pa) { // Check the password values is empty or not
                    password.focus(); // focus to the filed
                    $("#responsez").hide();
                    $("#responsez").show('slow');
                    $("#responsez").html('Password belum dimasukkan!');
                    return false;
                }

                if((!u || !ua) && (!p || !pa)) {
	                $.ajax({
	                   url:url,
	                   type:method,
	                   data:data
	                }).done(function(data){
	                   if(data != '1' && data != '0') {
	                   		$("#responsez").hide();
	                        $("#responsez").show('slow');
	                        //$("#response").effect("shake");
	                        $("#frm_login")[0].reset();
	                        $("#responsez").html(data);
	                    } else if(data == '1') {
	                        window.location.href='{base_url('member/')}';
	                        throw new Error('go');
	                    } else if (data == '0') {
	                        window.location.href='{base_url('adminarea/')}';
	                        throw new Error('go');
	                    }
	                });
	            }
            });
        });
    </script>

    </body>
</html>