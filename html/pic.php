<?php 
$pics = [
[
'id' => 1,
'nameBook' => 'Cat',
'theme' => 'Animals',
'type' => 'pencil',
'amount' => 5,
'describe' => 'It is my favorite pic among my arts',
'img' => 'cat.png'
],
[
'id' => 2,
'nameBook' => 'Kengo',
'theme' => 'Animals',
'type' => 'gouache',
'amount' => 15,
'describe' => 'from my dreams about Australia',
'img' => 'kengoo.png'
],
[
'id' => 3,
'nameBook' => 'flowers',
'theme' => 'Nature',
'type' => 'watercolour',
'amount' => 10,
'describe' => 'Summer..where are u?',
'img' => 'flowers.jpg'
],
[
'id' => 4,
'nameBook' => 'Speedy',
'theme' => 'Cars',
'type' => 'pen',
'amount' => 1,
'describe' => 'it is my mood today',
'img' => 'ferrari.jpg'
],
[
'id' => 5,
'nameBook' => 'Houses',
'theme' => 'Cities',
'type' => 'markers',
'amount' => 3,
'describe' => 'the house of Spider-man',
'img' => 'house.png'
]


];
?>

function getInfoAboutPic($id, $pics) {
    foreach ($pics as $arr){
        if ($arr['id'] == $id){
            return $arr;
        }
    }
    return false;
}
$get = $_GET;
$id = $get['id']; 
$info = getInfoAboutPic($id, $pics);

<!DOCTYPE html>
<!--
Страница на php: карточка описания загруженной картинки(страницы раскраски)
-->
<html>
    <head>
        <title>Rainbow - let's this world colour!</title>
        <meta charset="UTF-8">
        <meta name="description" content="Сообщество любителей раскраски и делать этот мир ярким">
        <meta name="keywords" content="раскраски, хобби, творчество, сообщество, общение, радужные события">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="../img/icon.jpg">
        <link rel="stylesheet" href="../CSS/style.css">
    </head>
    <body>
        <div id="header"> <!--header-->
            <h1 id='txt'>Welcome to Rainbow world</h1>
        </div> <!-- final header-->
    <div class="top">  <!-- top -->
        <nav class="menu"> <!-- menu -->
                <ul>
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="about.html">Why I am here?</a></li>
                    <li><a href="share.html">Share art &#10000;</a></li>
                    <li><a href="https://www.instagram.com/ShareRainbow">Goods for creation</a></li>
                    <li><a href="rating.html">Watch&Rate</a>
                    <ul>
                        <li><a href="#">Pencils</a></li>
                        <li><a href="#">Paints</a></li>
                        <li><a href="#">Markers</a></li>
                    </ul></li>
                    <li><a href="#footer">Join us</a></li>
                </ul>       
        </nav> <!-- final menu -->
        <nav class="mobile-menu"> <!-- mobile menu -->
            <ul>
                <li><a href="#"><img src="../img/icon/menu.png" alt="Menu"></a>
                    <ul>
                        <li><a href="../index.html">Home</a></li>
                        <li><a href="about.html">Why I am here?</a></li>
                        <li><a href="rating.html">Watch&Rate</a></li>
                        <li><a href="https://www.instagram.com/ShareRainbow">Goods for creation</a></li>
                        <li><a href="#footer">Join us</a></li>
                    </ul>
                </li>      
            </ul>        
        </nav> <!-- final mobile menu -->
        <div class="authorization"><a href="#authorization">Sign in</a> <!-- authorization -->
            <form action="index.html" method="post" name="authorization">
                <fieldset id="authorization" class="open-window">
                    <div><input id="email" type="email" placeholder="Your Email" required></div>
                    <div><input id="psw" type="password" placeholder="Your Password" required></div>           
                    <button type="submit" name="signIN"  id='BtnEnter'>enter</button>
                    <a href="#" id="aBtnlater"><input type="button" value="later" class="Btn"></a>
                    <div class="links-authorization"> <!-- links inside form authorization-->
                        <a href="#forgot">Forgot?</a>
                        <a href="#register">Register</a>
                    </div> <!-- final links inside authorization-->
                    <div class="mobile-links-authorization"> <!-- links inside form  mobile authorization-->
                       <a href="forgot-m.html" target="_self">Forgot?</a>
                       <a href="register-m.html" target="_self">Register</a>
                    </div> <!-- final links inside mobile authorization-->
                </fieldset>
            </form>
            </div> <!-- final authorization-->
        <a href="#" class="recovery" id="forgot"></a> <!--recovery psw -->
        <div class="recovery-window">
            <form action="../index.html" method="post" name="recovery">
                <fieldset id="recovery">
                    <legend><h4>Recovery your password</h4></legend>
                    <div>
                        <label for="emailRec">Please input your email:</label>
                        <input id="emailRec" type="email" placeholder="Your Email" required> 
                    </div>
                    <button type="submit" name="Recovery" class="Btn">Send new password</button>
                    <a href="#register">Register</a>
                </fieldset>  
                </form>
                <a  href="#close" class="close-button" title="Close"></a>
        </div><!--final recovery psw -->
            <a href="#" class="register" id="register"></a> <!-- form register-->
            <div class="register-window">
                <form action="../index.html" method="post" name="create">
                <fieldset id="create">
                    <legend><h4>Creat an account</h4></legend>
                    <div>
                        <label for="loginReg">Your name</label> 
                        <input id="loginReg" type="text" placeholder="Your name" required>
                    </div>
                     <div id="busyLogin">It is occupied!</div>
                    <div>
                        <label for="emailReg">Your email</label> 
                        <input id="emailReg" type="email" placeholder="Your email" required>
                    </div>
                      <div id="busyEmail">It is occupied!</div>
                    <div>
                        <label for="pswReg">Your password</label> 
                        <input id="pswReg" type="password" placeholder="Your password" required>
                    </div>
                    <div id="info">Password must content min 5 characters, 1 upper letter and 1 number</div>
                    <div><label for="country">Your country</label>
                        <select id="country" required> 
                            <option selected>Choose country</option> 
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
</div> <!-- final top -->
    
        <div class="container-rating"> <!--begin container -->
        <div class="left"> <!-- left advertising  -->
            <img src="../img/ad.png" alt="advertising">
         </div>  <!--final left -->   
        <div class="center"> <!-- center -->
    <div class="about-pic">
<h2>About <?php echo $info['nameBook'];?> </h2>
<img src="/img/<?php echo $info['img']; ?> " alt=’<?php echo $info['img'];?> ">
<p><?php echo $info['describe'];?></p>
<p>Theme: <?php echo $info['theme'];?></p>
<p>Instruments: <?php echo $info['type'];?></p>
<p>Amount of colours: <?php echo $info['amount'];?></p>
</div>

    <div class="actions">
        <div id="like"><img src='../img/icon/like.png' alt='like'></div>
        <span class="like"></span>
        <div class="comments">
            <form name='formComment'>
                <fieldset>
                  <div>
                  <textarea name='text'> </textarea> 
                  </div>
                  <div><input type='submit' name='commentBtn' value='comment' class="btn-comment"></div>
                </fieldset>
                <fieldset>
                    <div id="comments"> </div>
                </fieldset>
            </form>
        </div>
        <div id="print"><img src="../img/icon/print.png" alt="print"></div>
      </div>
          </div> <!--finish center--> 

        <div class="right"> <!—begin right side-->
          <a href='#'><img src="../img/a_pencils.jpg" alt="watch paints by pencils"></a>
          <a href='#'><img src="../img/a_watercolors.png" alt="watch paints by watercolors"></a>
          <a href='#'><img src="../img/a_markers.jpg" alt="watch paints by markers"></a>
          </div><!-- finish right  -->
          </div> <!--finish container-->  
      
    <div> <!-- footer -->
        <div id='footer' class="footer">
            <div class="socnet">
                <a href="https://www.whatsapp.com" target="_blank">
                <img src="../img/icon/whatsup.png" alt="Whats'up"></a>
                <a href="https://www.viber.com/download" target="_blank">
                <img src="../img/icon/viber.png" alt="Viber"></a>
                <a href="https://www.instagram.com/ShareRainbow" target="_blank">
                <img src="../img/icon/instagram.png" alt="Instagram"></a>
                <a href="https://www.vk.com" target="_blank">
                <img src="../img/icon/vk.png" alt="Vkontakte"></a>
            </div>
            <div>
                <a href="#" target="_blank">  
                <img src="../img/icon/donate2.png" alt="Donate"></a> 
            </div>
        </div>
        <div class="footer footer-m">
            <span>2018, ShareRainbow. All rights reserved</span>
            <div class="up"><a href="#header"><img src="../img/icon/up.png" alt="Up"></a></div>
        </div>
    </div>     <!-- finish footer -->          
                
<!--      скрипты          -->
       <script src="../js/header.js"></script>
       <script src="../js/users.js"></script>
       <script src="../js/collection.js"></script>
    </body>
</html>

