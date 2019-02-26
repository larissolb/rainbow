<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="pragma" content="no-cache"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name ="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta charset="utf-8"/>
        <link rel="shortcut icon" type="image/x-icon" href="/img/icon.jpg">
        <link rel="stylesheet" href="/CSS/style.css">
        <title>Rainbow - let's this world colour! <?php echo  $title; ?> </title>
        <style>
            canvas {
                      image-rendering: optimizeSpeed;
                      -webkit-interpolation-mode: nearest-neighbor;
                      margin: 0px;
                      padding: 0px;
                      border: 0px;
            }
            :-webkit-full-screen #canvas {
                 width: 100%;
                 height: 100%;
            }
            div.gm4html5_div_class
            {
              margin: 0px;
              padding: 0px;
              border: 0px;
            }
            /* START - Login Dialog Box */
            div.gm4html5_login
            {
                 padding: 20px;
                 position: absolute;
                 border: solid 2px #000000;
                 background-color: #404040;
                 color:#00ff00;
                 border-radius: 15px;
                 box-shadow: #101010 20px 20px 40px;
            }
            div.gm4html5_cancel_button
            {
                 float: right;
            }
            div.gm4html5_login_button
            {
                 float: left;
            }
            div.gm4html5_login_header
            {
                 text-align: center;
            }
            /* END - Login Dialog Box */
            :-webkit-full-screen {
               width: 100%;
               height: 100%;
            }
        </style>
    </head>
    <body>
    <div id="header"> <!--header-->
            <h1 id='txt'>Welcome to Rainbow world</h1>
    </div> <!-- final header-->
        <div class="top">  <!-- top -->
        <nav class="menu" > <!-- menu -->
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">Why I am here?</a></li>
                           <?php if (isset($_SESSION['auth'])): ?>                        
                    <li><a href="/share">Share art &#10000;</a></li>
<!--                    <li><a href="https://www.instagram.com/ShareRainbow">Goods for creation</a></li>-->
                    <?php endif; ?>
                    <li><a href="/rating/pic/<?php echo $last_pic['id'];?>">Watch&Rate</a>
                    <ul>
                        <li><a href="/pencils">Pencils</a></li>
                        <li><a href="/paints">Paints</a></li>
                        <li><a href="/markers">Markers</a></li>
                    </ul></li>
                    <li><a href="#footer">Join us</a></li>
                   <?php if (isset($_SESSION['auth'])): ?>                        
                    <li><a href="#" class="authorization"><?php echo $_SESSION['login'] . " ;-)"; ?></a>
                    <ul>
                        <li><a href="/out">Go out</a> </li>
                    </ul>
                    </li>
                    <?php endif; ?>
                </ul>       
        </nav> <!-- final menu -->
    </div> <!-- final top -->
    <div class="center-cb">
           <div class="left"> <!-- beginright   -->
        <a href='/pencils'><img src="/img/a_pencils_rat.jpg" alt="watch paints by pencils" class='img'></a>
        <a href='/paints'><img src="/img/a_watercolors_rat.png" alt="watch paints by paints" class='img'></a>
        <a href='/markers'><img src="/img/a_markers_rat.jpg" alt="watch paints by markers" class='img'></a>
    </div><!-- finish right  -->
        <div class="gm4html5_div_class" id="gm4html5_div_id">
        <img src="/SAM/splash.png" id="GM4HTML5_loadingscreen" alt="smilegames:HTML5 loading screen" style="display:none;"/>
            <!-- Create the canvas element the game draws to -->
            <canvas id="canvas" width="1024" height="768">
               <p>Your browser doesn't support HTML5 canvas.</p>
            </canvas>
        </div>
    <div class="right"> <!-- left advertising  -->
        <img src="/img/ad.png" alt="advertising" class='img'>
    </div>  <!--final left -->   
</div>

    <div class="footer-main"> <!-- footer -->
        <div id="footer" class="footer">
            <div class="socnet">
                <a href="https://www.whatsapp.com" target="_blank">
                <img src="/img/icon/whatsup.png" alt="Whats'up" class="img"></a>
                <a href="https://www.viber.com/download" target="_blank">
                <img src="/img/icon/viber.png" alt="Viber" class="img"></a>
                <a href="https://www.instagram.com/ShareRainbow" target="_blank">
                <img src="/img/icon/instagram.png" alt="Instagram" class="img"></a>
                <a href="https://www.vk.com" target="_blank">
                <img src="/img/icon/vk.png" alt="Vkontakte" class="img"></a>
            </div>
            <div>
                <a href="#" target="_blank">  
                <img src="/img/icon/donate2.png" alt="Donate" class="img"></a> 
            </div>
        </div>
    </div>     <!-- finish footer -->          
    <div id='hide'>
    <p id='BtnEnter'></p>
        <p id='createBtn'></p></div>
<!--      скрипты          -->
    <script src="/js/users.js"></script>
    <script type="text/javascript" src="/SAM/coloringbook.js"></script>