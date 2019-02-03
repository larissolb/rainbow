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
    </head>
    <body>
   <div id="header"> <!-- header-->
            <h1 id='txt'>Welcome to Rainbow world</h1>
    </div> <!-- final header-->
   <div class="top"> <!--   top -->
                
        <nav class="mobile-menu" > <!-- mobile menu -->
                <ul>
                    <li><a href="#"><img src="../img/icon/menu.png" alt="Menu"></a>
                    <ul>    
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">Why I am here?</a></li>
                           <?php if (isset($_SESSION['auth'])): ?>                        
                    <li><a href="/share">Share art &#10000;</a></li>
<!--                    <li><a href="https://www.instagram.com/ShareRainbow">Goods for creation</a></li>-->
                    <?php endif; ?>
                    <li><a href="/rating/pic/<?php echo $last_pic['id'];?>">Watch&Rate</a></li>
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
    <?php if($answer == "EMAIL_ERROR") :?>
        <div id="red"><?php echo 'EMAIL ERROR, try again'; ?></div>
        <?php elseif($answer == "PSW_ERROR") :?>
        <div id="red"><?php echo 'PASSWORD ERROR, try again'; ?></div>
    <?php endif; ?>   
        
        <?php include_once $view; ?>
        
    <div> <!-- footer -->
        <div id="footer" class="footer">
            <div class="socnet">
                <a href="https://www.whatsapp.com" target="_blank">
                <img src="/img/icon/whatsup.png" alt="Whats'up"></a>
                <a href="https://www.viber.com/download" target="_blank">
                <img src="/img/icon/viber.png" alt="Viber"></a>
                <a href="https://www.instagram.com/ShareRainbow" target="_blank">
                <img src="/img/icon/instagram.png" alt="Instagram"></a>
                <a href="https://www.vk.com" target="_blank">
                <img src="/img/icon/vk.png" alt="Vkontakte"></a>
            </div>
            <div>
                <a href="#" target="_blank">  
                <img src="/img/icon/donate2.png" alt="Donate"></a> 
            </div>
        </div>
        <div class="footer footer-m">
            <span>2018, ShareRainbow. All rights reserved</span>
            <div class="up"><a href="#header"><img src="/img/icon/up.png" alt="Up"></a></div>
        </div>
</div>   <!--       finish footer           -->
    <script src="/js/header.js"></script>
    <script src="/js/users.js"></script>
    </body>
</html>