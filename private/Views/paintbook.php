<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="pragma" content="no-cache"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name ="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta charset="utf-8"/>
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
                        <?php else: ?>     
                    <li>
            <a href="#authorization" class="authorization">Sign in</a> <!-- authorization -->
            <form action="/user/authorization" method="post" name="authorization">
                <fieldset id="authorization" class="open-window">
                    <div><input id="email" name="email" type="email" placeholder="Your Email" required></div>
                    <div><input id="psw" name="psw" type="password" placeholder="Your Password" required></div>           
                    <button type="submit" name="signIN"  id='BtnEnter'>enter</button>
                    <a href="#" id="aBtnlater"><input type="button" value="later" class="Btn"></a>
                    <div class="links-authorization"> <!-- links inside form authorization-->
                        <a href="#forgot">Forgot?</a>
                        <a href="#register">Register</a>
                    </div> <!-- final links inside authorization-->
                </fieldset>
            </form>         
        <a href="#" class="recovery" id="forgot"></a> <!--recovery psw -->
        <div class="recovery-window">
            <form action="/user/recovery" method="post" name="recovery">
                <fieldset id="recovery">
                    <legend><h4>Recovery your password</h4></legend>
                    <div>
                        <label for="emailRec" id="emtext">Please input your email:</label>
                        <input id="emailRec" type="email" name="emailRec" placeholder="Your Email" required> 
                    </div>
                    <button id="send" type="submit" name="Recovery" class="Btn">Send new password</button>
                    <a href="/" id="back" class="Btn">OK</a>
                    <a href="#register" id="sendhref">Register</a>
                    
                </fieldset>  
                </form>
                <a  href="#close" class="close-button" title="Close"></a>
        </div><!--final recovery psw -->
            <a href="#" class="register" id="register"></a> <!-- form register-->
            <div class="register-window">
                <form action="/user/registration" method="post" name="create">
                <fieldset id="create">
                    <legend><h4>Creat an account</h4></legend>
                    <div>
                        <label for="loginReg">Your name</label> 
                        <input id="loginReg" type="text" name='login' placeholder="Your name" required>
                    </div>
                     <div id="busyLogin">It is occupied!</div>
                    <div>
                        <label for="emailReg">Your email</label> 
                        <input id="emailReg" type="email" name="email" placeholder="Your email" required>
                    </div>
                      <div id="busyEmail">It is occupied!</div>
                    <div>
                        <label for="pswReg">Your password</label> 
                        <input id="pswReg" type="password" name='psw' placeholder="Your password" required>
                    </div>
                    <div id="info">Password must content min 5 characters, 1 upper letter and 1 number</div>
                    <div><label for="country">Your country</label>
                        <select id="country" name='country' required> 
                            <option>Choose country</option> 
                            <optgroup label="Europe"> 
                            <option value="E1">Portugal</option> 
                            <option value="E2">Spain</option> 
                            <option value="E3">France</option> 
                            <option value="E4">Italy</option>
                            <option value="E5">Germany</option>
                            <option value="E6">Great Britain</option>
                            <option value="E7">Russia</option>
                            </optgroup>
                            <optgroup label="Asia">
                            <option value="A1">Japan</option> 
                            <option value="A2">China</option> 
                            <option value="A3">Thailand</option> 
                            <option value="A4">Vietnam</option>
                            </optgroup>
                        </select>
                    </div>
                    <div id="noCountry">Choose your country</div>
                    <button type="submit" name="signUP" id="createBtn">join</button>
                    <button type="reset" class="Btn">Reset</button>
                </fieldset>
                </form>
                 <a  href="#close" class="close-button" title="Закрыть"></a>
                </div> <!-- final form register-->        
                <?php endif; ?>
                        
                    </li>
                </ul>       
        </nav> <!-- final menu -->
        
        <nav class="mobile-menu" > <!-- mobile menu -->
                <ul>
                    <li><a href="#"><img src="../img/icon/menu.png" alt="Menu" class="img"></a>
                    <ul>    
                    <li><a href="/">Home</a></li>
                           <?php if (isset($_SESSION['auth'])): ?>                        
                    <li><a href="/share/">Share art &#10000;</a></li>
<!--                    <li><a href="https://www.instagram.com/ShareRainbow">Goods for creation</a></li>-->
                    <?php endif; ?>
                    <li><a href="/rating/pic/<?php echo $last_pic['id'];?>">Watch&Rate</a></li>
                    <li><a href="/pencils">By Pencils</a></li>
                    <li><a href="/paints">By Paints</a></li>
                    <li><a href="/markers">By Markers</a></li>
                </ul>
               </li>      
            </ul>                               
        </nav> 
        <nav class="mobile-menu">    <ul>    
                   <?php if (isset($_SESSION['auth'])): ?>                        
                    <li><a href="#" class="authorization"><?php echo $_SESSION['login'] . " ;-)"; ?></a>
                    <ul>
                        <li><a href="/out">Go out</a> </li>
                    </ul>
                    </li>
                        <?php else: ?>     
                    <li>
            <a href="#openwindow" class="authorization">Sign in</a> <!-- authorization -->
            <form action="/user/authorizationM" method="post" name="authorization">
                <fieldset id="openwindow" class="open-window">
                    <div><input id="email" name="email" type="email" placeholder="Your Email" required></div>
                    <div><input id="psw" name="psw" type="password" placeholder="Your Password" required></div>           
                    <button type="submit" name="signIN"  id='BtnEnter'>enter</button>
                    <a href="#" id="aBtnlater"><input type="button" value="later" class="Btn"></a>
                    <div class="links-authorization"> 
                        <a href="/forgot">Forgot?</a>
                        <a href="/register">Register</a>
                    </div>  <!--final links inside authorization-->
                 </fieldset>
            </form>         
                <?php endif; ?>   
                    </li>
        </ul>
        </nav> <!-- final mobile menu         -->
        
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
        <!-- Run the game code -->
        <script type="text/javascript" src="/SAM/coloringbook.js"></script>
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
        <div class="footer footer-m">
            <span>2018, ShareRainbow. All rights reserved</span>
            <div class="up"><a href="#header"><img src="/img/icon/up.png" alt="Up" class="img"></a></div>
        </div>
    </div>     <!-- finish footer -->          
    <div id='hide'>
    <p id='BtnEnter'></p>
        <p id='createBtn'></p></div>
<!--      скрипты          -->
    <script src="/js/users.js"></script>