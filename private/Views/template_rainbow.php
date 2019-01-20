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
    <div id="header"> <!--header-->
            <h1 id='txt'>Welcome to Rainbow world</h1>
    </div> <!-- final header-->
    <div class="top">  <!-- top -->
        <nav class="menu"> <!-- menu -->
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">Why I am here?</a></li>
                           <?php if (isset($_SESSION['auth'])): ?>                        
                    <li><a href="/share">Share art &#10000;</a></li>
<!--                    <li><a href="https://www.instagram.com/ShareRainbow">Goods for creation</a></li>-->
                    <?php endif; ?>
                    <li><a href="/rating">Watch&Rate</a>
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
<!--                               <div class="authorization">-->
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
                    <div class="mobile-links-authorization"> <!-- links inside form  mobile authorization-->
                       <a href="html/forgot-m.html" target="_self">Forgot?</a>
                       <a href="html/register-m.html" target="_self">Register</a>
                    </div> <!-- final links inside mobile authorization-->
                </fieldset>
            </form>         
<!--            </div>  final authorization-->
        <a href="#" class="recovery" id="forgot"></a> <!--recovery psw -->
        <div class="recovery-window">
            <form action="/user/recovery" method="post" name="recovery">
                <fieldset id="recovery">
                    <legend><h4>Recovery your password</h4></legend>
                    <div>
                        <label for="emailRec">Please input your email:</label>
                        <input id="emailRec" type="email" name="emailRec" placeholder="Your Email" required> 
                    </div>
                    <button type="submit" name="Recovery" class="Btn">Send new password</button>
                    <a href="#register">Register</a>
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
        <nav class="mobile-menu"> <!-- mobile menu -->
            <ul>
                <li><a href="#"><img src="../img/icon/menu.png" alt="Menu"></a>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">Why I am here?</a></li>
<!--                    <li><a href="/share">Share art &#10000;</a></li>-->
<!--                    <li><a href="https://www.instagram.com/ShareRainbow">Goods for creation</a></li>-->
                        <li><a href="/rating">Watch&Rate</a></li>
                        <li><a href="#footer">Join us</a></li>
                    </ul>
                </li>      
            </ul>        
        </nav> <!-- final mobile menu -->
</div> <!-- final top -->
        
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
    </div>     <!-- finish footer -->          
    <p id='BtnEnter'></p>
        <p id='createBtn'></p>
<!--      скрипты          -->
    <script src="/js/header.js"></script>
    <script src="/js/users.js"></script>
    </body>
</html>