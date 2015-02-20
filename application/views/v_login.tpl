<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>{$judul}</title>

        <!-- Stylesheet Area -->
            <link href="{base_url('asset/css/bootstrap.min.css')}" rel="stylesheet" />
            <link href="{base_url('asset/css/colorbox.css')}" rel="stylesheet" />
        <!-- Stylesheet Area -->

        <!-- Scripts Area -->
            <script src="{base_url('asset/js/jquery.js')}"></script>
            <script src="{base_url('asset/js/bootstrap.min.js')}"></script>
        <!-- Scripts Area -->

        <link href="{base_url('asset/images/icon.png')}" rel='icon' type='image/x-icon' />

        <style>
        {literal}
            #response{display: none}
        {/literal}
        </style>
    </head>
    <body>
        <div class="container" style="margin-top: 10%">
            <div class="row clear_fix">
                <div class="col-md-6 col-md-offset-3">
                    <p class="alert alert-danger" id="response"></p>
                    <form id="frm_login" role="form" action="{base_url('auth/login/start')}" method="POST">
                        <div class="form-group">
                          <label for="">User name</label>
                          <input type="text" class="form-control username" name="username" placeholder="User name">
                        </div>
                        <div class="form-group">
                          <label for="">Password</label>
                          <input type="password" class="form-control password" name="password"  placeholder="Password">
                        </div>
                        <input type="submit" class="btn btn-info btn-block" value="Login">
                      </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function (){
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
                    $("#response").hide();
                    $("#response").show('slow');
                    $("#response").html('- Username belum dimasukkan!<br/>- Password belum dimasukkan!');
                    return false;
                } else if (u || ua) { // Check the username values is empty or not
                    username.focus(); // focus to the filed
                    $("#response").hide();
                    $("#response").show('slow');
                    $("#response").html('Username belum dimasukkan!');
                    return false;
                } else if (p || pa) { // Check the password values is empty or not
                    password.focus(); // focus to the filed
                    $("#response").hide();
                    $("#response").show('slow');
                    $("#response").html('Password belum dimasukkan!');
                    return false;
                }

                if((!u || !ua) && (!p || !pa)) { 
                    $.ajax({
                       url:url,
                       type:method,
                       data:data
                    }).done(function(data){
                       if(data != '1' && data != '0') {
                            $("#response").hide();
                            $("#response").show('slow');
                            //$("#response").effect("shake");
                            $("#frm_login")[0].reset();
                            $("#response").html(data);
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
             
            $( "div" ).each(function( index ) {
            var cl = $(this).attr('class');
            if(cl =='')
                {
                    $(this).hide();
                }
            });
        });
        </script>
         
    </body>
</html>