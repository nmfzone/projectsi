<!DOCTYPE html>
<html>
    <head>
        <title>{$title_page}</title>

        <!-- Stylesheet Area -->
            <link href="{base_url('asset/css/adm.css')}" rel="stylesheet" />
            <link href="{base_url('asset/css/all.css')}" rel="stylesheet" />
            <link href="{base_url('asset/css/bootstrap.min.css')}" rel="stylesheet"  />
            <link href="{base_url('asset/css/colorbox.css')}" rel="stylesheet" />
            <link href="{base_url('asset/css/jquery-ui.css')}" rel="stylesheet" />
        <!-- Stylesheet Area -->

        <!-- Scripts Area -->
            <script src="{base_url('asset/js/jquery.js')}"></script>
            <script src="{base_url('asset/js/bootstrap.min.js')}"></script>
            <script src="{base_url('asset/js/jquery.colorbox-min.js')}"></script>
            <script src="{base_url('asset/js/jquery-ui.js')}"></script>
        <!-- Scripts Area -->

        <link href="{base_url('asset/images/icon.png')}" rel='icon' type='image/x-icon' />

        <style>{literal}#response{display: none}{/literal}</style>
    </head>
    <body>
        {include file='adminarea/repository/menu.tpl'}
        <div class="container" style="margin-top:130px;">