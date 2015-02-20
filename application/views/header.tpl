<!DOCTYPE html>
<html>
    <head>
        <title>{$judul}</title>

        <!-- Stylesheet Area -->
            <link rel="stylesheet" href="{base_url('asset/css/bootstrap.min.css')}" />
            <link href="{base_url('asset/css/media.css')}" rel="stylesheet" />
            <link href="{base_url('asset/css/font.css')}" rel="stylesheet" />
            <link href="{base_url('asset/css/colorbox.css')}" rel="stylesheet" />
        <!-- Stylesheet Area -->

        <!-- Scripts Area -->
            <script src="{base_url('asset/js/jquery.js')}"></script>
            <script src="{base_url('asset/js/bootstrap.min.js')}"></script>
            <script src="{base_url('asset/js/jquery.colorbox-min.js')}"></script>
            <script src="{base_url('asset/js/nicescroll.min.js')}"></script>
        <!-- Scripts Area -->

        <link href="{base_url('asset/images/icon.png')}" rel='icon' type='image/x-icon' />

        <style type="text/css">
        {literal}
            #response,#responsez{display: none}.nicescroll-rails{z-index: 10000 !important;}
        {/literal}
        </style>

    </head>
    <body>
        <div id="wrapper" class="clearfix">

        {if $log != "not" }
            {include file='repository/menu/overmenu.tpl'}
        {/if}
        {include file='repository/menu/menu.tpl'}

        <div id="response"></div>

        {if $log != "not" }
            <!--<div class="cont-area2">
                <a class="btn btn-lg btn-success" href="<?php echo base_url().$link ?>"><?php echo $nm; ?></a>
            </div>-->
        {else}
            <div class="cont-area">
                <a class="btn btn-lg btn-success" data-toggle="modal" data-target="#login">Log In</a>
                <a class="btn btn-lg btn-success" data-toggle="modal" data-target="#register" style="margin-left:30px;">Register</a>
            </div>
            <br/><br/><br/><br/>
            {include file='repository/login/login.tpl'}
            {include file='repository/register/register.tpl'}
        {/if}