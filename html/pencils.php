<?php 
$pics = [
[
'id' => 1,
'nameBook' => 'Cat',
'theme' => 'Animals',
'type' => 'pencil',
'amount' => 5,
'describe' => 'It is my favorite pic among my arts',
'img' => 'slide.jpg'
],
[
'id' => 2,
'nameBook' => 'Kengo',
'theme' => 'Animals',
'type' => 'gouache',
'amount' => 15,
'describe' => 'from my dreams about Australia',
'img' => 'slide1.jpeg'
],
[
'id' => 3,
'nameBook' => 'flowers',
'theme' => 'Nature',
'type' => 'watercolour',
'amount' => 10,
'describe' => 'Summer..where are u?',
'img' => 'youamongus.jpg'
],
[
'id' => 4,
'nameBook' => 'Speedy',
'theme' => 'Cars',
'type' => 'pen',
'amount' => 1,
'describe' => 'it is my mood today',
'img' => 'slide3.jpg'
],
[
'id' => 5,
'nameBook' => 'Houses',
'theme' => 'Cities',
'type' => 'markers',
'amount' => 3,
'describe' => 'the house of Spider-man',
'img' => 'slide2.jpg'
]
];

?>




<!DOCTYPE html>
<!--
Страница на php: переход с этой страницы на другую – подробнее о картинках
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
                        <li><a href="pencils.php">Pencils</a></li>
                        <li><a href="paints.html">Paints</a></li>
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
    
      <div class="container-share"> <!--главная рамка-->
            <div class="left"> <!--position column left main-->
                <h2>Last updates</h2>
<?php foreach($pics as $arr): ?>
<img src="/img/<?php echo $arr['img']; ?> " alt=’<?php echo $arr['img'];?> ">
<p><a href="pic.php?id=<?php echo $arr['id'];?>"> Подробнее </a></p>
<?php endforeach;?>



<!--                <img src="../img/girl.jpg" alt="Picture must be here">
                <?php
    $images1 = array(
        'girl.jpg',
        'pencils.jpg',
        'icon2.jpg',
        'colourbook.jpg',
        'share.jpeg',
        'leftpic.png',
        );
    $image1  = $images1[array_rand($images1)];
    $output = "<img src=\"../img/" . $image1 . "\" alt=\"random pic\" />";
    echo $output;
?>
               <div><p>Finally, rainbow people, we have the place where we can share our results from our paintbooks!</p></div>
<!--              <img src="../img/colourbook.jpg" alt="Picture must be here">-->
                               <?php
    $images2 = array(
        'girl.jpg',
        'pencils.jpg',
        'icon2.jpg',
        'colourbook.jpg',
        'share.jpeg',
        'leftpic.png',
    );
    $image2  = $images2[array_rand($images2)];
    $output = "<img src=\"../img/" . $image2 . "\" alt=\"random pic\" />";
    echo $output;
?> 
              <div><p><a href='#authorization'>Join us!</a>  Share your pics all the world ;-)</p></div>
                </div> <!--end share left side -->
<!--form for upload - center 70% -->
            <div class="center">
                <form action="#" method="post" autocomplete="on" enctype="multipart/form-data" name="Upload">
                    <fieldset class="field"> 
                        <div class="item">
                        <label for="nameBook">Name of coloring-book's</label>
                        <input id="nameBook" type="text" autofocus>
                        </div>
                    <div class="item" id="theme">
                        <label for="theme">What theme?</label>
                        <label><input type="radio" name='theme' value='Nature'>Nature</label>
                        <label><input type="radio" name='theme' value='Space' >Space</label>
                        <label><input type="radio" name='theme' value='Animals'>Animals</label>
                        <label><input type="radio" name='theme' value='Cars'>Cars</label>
                        <label><input type="radio" name='theme' value='Cities'>Cities</label>
                        <label><input type="radio" name='theme' value='Other' checked>Other</label>
                    </div> 
                    <div class="item-mobile">
                        <label for="themeM">What theme?</label>
                        <select id="themeM" required> 
                            <option value="Nature"> Nature</option> 
                            <option selected value="Space">Space</option> 
                            <option value="Animals">Animals</option> 
                            <option value="Cars">Cars</option>
                            <option value="Cities">Cities</option>
                            <option value="Other">Other</option>
                        </select> 
                    </div>
                    <div class="item">
                        <label for="type">What instruments did you use?</label>
                        <select id="type" required> 
                            <option value="pen"> colour pens</option> 
                            <option selected value="pencil">colour pencils</option> 
                            <option value="gouache">gouache</option> 
                            <option value="watercolour">watercolour</option>
                            <option value="markers">markers</option>
                        </select> 
                    </div>
                    <div class="item">
                        <label for="amount">How many colours did you use?</label> 
                       <input id="amount" type="number" min="1" step="1">
                    </div>
                    <div>
                        <label for="describe">&#9999; Describe it</label>
                        <textarea id="describe" placeholder="I choosed this pic because..." cols="70" rows="3" maxlength="100"></textarea>
                    </div>  
                    <fieldset id="share">
                    <div>
                        <label for="pics">Upload your best picture</label>
                        <input id="pics" type="file" multiple accept="image/*">
                    </div>
                    </fieldset>
                    <fieldset class="button-shareit">
                        <input type="submit" value="Share" id='shareBtn' class="Btn">
                        <input type="reset" value="Reset" class="Btn">
                    </fieldset>  
                    </fieldset>  
                </form>
                <div><img src="../img/horizont_adv.png" alt='horizontal adv'></div>
           </div>    
            <div class="right"> <!-- begin share right side -->
                <img src="../img/ad.png" alt="advertising">
            </div><!-- begin share right side -->
       </div> <!--конец главной рамки-->
      
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
