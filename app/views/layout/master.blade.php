﻿<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Kigoda Cha Taaluma Cha Mwalimu Nyerere</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    {{HTML::style("scripts/bootstrap/css/bootstrap.min.css") }}
    {{HTML::style("scripts/bootstrap/css/bootstrap-responsive.min.css") }}

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Icons -->
    {{HTML::style("scripts/icons/general/stylesheets/general_foundicons.css") }}
    {{HTML::style("scripts/icons/social/stylesheets/social_foundicons.css" ) }}
    <!--[if lt IE 8]>
    {{HTML::style("scripts/icons/general/stylesheets/general_foundicons_ie7.css") }}
    {{HTML::style("scripts/icons/social/stylesheets/social_foundicons_ie7.css") }}
    <![endif]-->

    {{HTML::style("scripts/camera/css/camera.css") }}

    <link href="http://fonts.googleapis.com/css?family=Chewy" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Terminal+Dosis+Light" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet" type="text/css">

    {{HTML::style("styles/custom.css") }}

<!--    facebook codes-->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</head>
<body id="pageBody">

<div id="divBoxed" class="container">

<div class="transparent-bg" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: -1;zoom: 1;"></div>

<div class="divPanel notop nobottom">
    <div class="row-fluid">
        <div class="span12">

            <div id="divLogo" style="text-align: center">
                {{ HTML::image("logo.png","",array("class"=>"pull-left","style"=>"padding-right:60px")) }}
                {{ HTML::image("img/udsm.png","",array("class"=>"pull-right","style"=>"padding-left:40px")) }}
                <a href='{{ url("/") }}' id="divSiteTitle">
                   <small>UNIVERSITY OF DAR ES SALAAM </small><br>
                    THE MWALIMU NYERERE PROFESSORIAL CHAIR IN PAN AFRICAN STUDIES</a><br />
<!--                <a href="{{ url("festival") }}" id="divTagLine">6th Mwalimu Nyerere Intellectual Festival – 9th- 11th April 2014</a>-->
                @include("layout.topmenu")
            </div>

        </div>
    </div>
@yield("top-contents")


</div>
<div class="row-fluid">
    <div class="span9">
        @yield("contents")
    </div>
    <div class="span3" style="padding-top:25px; margin: 5px ">
        <div class="row-fluid" style="font-family: Maven Pro;">
            <h4>Prof. Penina M. Mlama Appointment</h4>
            <img src="{{ asset('img/Mlama.png') }}" style="width: 300px;height: 210px" class="img-rounded"/>
            <p>
                This is  to inform the University of Dar es Salaam community and the public that, following the retirement of Prof. Issa Shivji, the position of Mwalimu Nyerere Professorial Chair in Pan-African Studies fell vacant.  The University Council at its 220th meeting held on 30th January 2014  appointed Prof. Penina M. Mlama to the position of Mwalimu Julius K. Nyerere Professorial Chair in Pan-African Studies.</p>
        </div>
<!--        <div class="row-fluid fb-like-box" data-href="https://www.facebook.com/kigodachamwalimunyerere" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false">-->
        <img src="{{ asset('img/nkurumah.jpg') }}" />
        </div>

    </div>
</div>



<div id="footerOuterSeparator"></div>

@include("layout.footer")
<br /><br /><br />

{{ HTML::script("scripts/jquery-1.8.2.min.js") }}
{{ HTML::script("scripts/bootstrap/js/bootstrap.min.js") }}
{{ HTML::script("scripts/default.js") }}


{{ HTML::script("scripts/camera/scripts/camera.min.js") }}
{{ HTML::script("scripts/easing/jquery.easing.1.3.js") }}
{{ HTML::script("scripts/camera/scripts/jquery.mobile.customized.min.js") }}
<script type="text/javascript">function startCamera() {$('#camera_wrap').camera({ fx: 'scrollLeft', time: 2000, loader: 'none', playPause: false, height: '65%', pagination: true });}$(function(){startCamera()});</script>


</body>
</html>
