<!DOCTYPE html>
 <html>
    <head>
        <title>Rainbow - let's this world colour! <?php echo  $title; ?> </title>
        <meta charset="UTF-8">
        <meta name="description" content="Сообщество любителей раскраски и делать этот мир ярким">
        <meta name="keywords" content="раскраски, хобби, творчество, сообщество, общение, радужные события">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="img/icon.jpg">
        <link rel="stylesheet" href="/CSS/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
   <div id="header"> <!-- header-->
            <h1 id='txt'>Welcome to Rainbow world</h1>
    </div> <!-- final header-->
   <div class="top"> <!--   top -->
                
        <nav class="mobile-menu" > <!-- mobile menu -->
                <ul>
                    <li><a href="#"><img src="../img/icon/menu.png" alt="Menu" class='img'></a>
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
                    <?php if($answer == "EMAIL_ERROR") :?>
                    <?php echo 'email error';?>
                    <?php elseif($answer == "PSW_ERROR") :?>
                    <?php echo 'password error';?>
                         <?php endif; ?>   
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
    </div>  <!--final top -->
    <?php if($answer == 1) :?>
    <?php elseif($answer == "EMAIL_ERROR") :?>
        <div id="red"><?php echo 'EMAIL ERROR, try again'; ?></div>
        <?php elseif($answer == "PSW_ERROR") :?>
        <div id="red"><?php echo 'PASSWORD ERROR, try again'; ?></div>
    <?php endif; ?>   
        
        <?php include_once $view; ?>
        
    <div> <!-- footer -->
        <div id="footer" class="footer">
            <div class="socnet">
                <a href="https://www.whatsapp.com" target="_blank">
                <img src="/img/icon/whatsup.png" alt="Whats'up" class='img'></a>
                <a href="https://www.viber.com/download" target="_blank">
                <img src="/img/icon/viber.png" alt="Viber" class='img'></a>
                <a href="https://www.instagram.com/ShareRainbow" target="_blank">
                <img src="/img/icon/instagram.png" alt="Instagram" class='img'></a>
                <a href="https://www.vk.com" target="_blank">
                <img src="/img/icon/vk.png" alt="Vkontakte" class='img'></a>
            </div>
            <div class="donate">
                <a href="https://yasobe.ru/na/sharerainbow" target="_blank">  
                <img src="/img/icon/yadonate.png" alt="DonateRub" class='img'></a> 
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                    <input type="hidden" name="cmd" value="_donations" />
                    <input type="hidden" name="business" value="S5QW568GFZHYS" />
                    <input type="hidden" name="item_name" value="for developing" />
                    <input type="hidden" name="currency_code" value="USD" />
                    <input type="image" src="/img/icon/donate2.png" border="0" name="submit" class="img" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                    <img alt="" border="0" src="https://www.paypal.com/en_RU/i/scr/pixel.gif" width="1" height="1" />
                </form>
            </div>
        </div>
        <div class="footer footer-m">
            <span>2018, ShareRainbow. All rights reserved</span>
            <div class="up"><a href="#header"><img src="/img/icon/up.png" alt="Up" class='img'></a></div>
        </div>
</div>   <!--       finish footer           -->
    <script src="/js/header.js"></script>
    <script src="/js/users.js"></script>
    </body>
</html>