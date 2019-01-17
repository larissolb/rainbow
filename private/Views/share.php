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
                    <li><a href="/share">Share art &#10000;</a></li>
<!--                    <li><a href="https://www.instagram.com/ShareRainbow">Goods for creation</a></li>-->
                    <li><a href="/rating">Watch&Rate</a>
                    <ul>
                        <li><a href="/pencils">Pencils</a></li>
                        <li><a href="/paints">Paints</a></li>
                        <li><a href="/markers">Markers</a></li>
                    </ul></li>
                    <li><a href="#footer">Join us</a></li>
                </ul>       
        </nav> <!-- final menu -->
        <nav class="mobile-menu"> <!-- mobile menu -->
            <ul>
                <li><a href="#"><img src="../img/icon/menu.png" alt="Menu"></a>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">Why I am here?</a></li>
                        <li><a href="/share">Share art &#10000;</a></li>
<!--                        <li><a href="https://www.instagram.com/ShareRainbow">Goods for creation</a></li>-->
                        <li><a href="/rating">Watch&Rate</a></li>
                        <li><a href="#footer">Join us</a></li>
                    </ul>
                </li>      
            </ul>        
        </nav> <!-- final mobile menu -->
        <div class="authorization"><a href="/">Go out</a> <!-- login -->
            </div> <!-- final authorization-->
</div> <!-- final top -->
<div class="container-share"> <!--главная рамка-->
            <div class="left"> <!--position column left main-->
                <h2>Last updates</h2>
<!--                <img src="../img/girl.jpg" alt="Picture must be here">-->
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
                <form action="/share/loadpics" method="post" autocomplete="on" enctype="multipart/form-data" name="Upload">
                    <fieldset class="field"> 
                        <div class="item">
                        <label for="nameBook">Name of coloring-book's</label>
                        <input id="nameBook" name="nameBook" type="text" autofocus required>
                        </div>
                    <div class="item" id="theme" name='theme'>
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
                        <select id="themeM" name="themeM" required> 
                            <option value="Nature"> Nature</option> 
                            <option value="Space">Space</option> 
                            <option value="Animals">Animals</option> 
                            <option value="Cars">Cars</option>
                            <option value="Cities">Cities</option>
                            <option value="Other">Other</option>
                        </select> 
                    </div>
                    <div class="item">
                        <label for="type">What instruments did you use?</label>
                        <select id="type" name="type" required> 
                            <option value="pen"> colour pens</option> 
                            <option selected value="pencil">colour pencils</option> 
                            <option value="gouache">gouache</option> 
                            <option value="watercolour">watercolour</option>
                            <option value="markers">markers</option>
                        </select> 
                    </div>
                    <div class="item">
                        <label for="amount">How many colours did you use?</label> 
                       <input id="amount" name="amount" type="number" min="1" step="1">
                    </div>
                    <div>
                        <label for="describe">&#9999; Describe it</label>
                        <textarea id="describe" name="text" placeholder="I choosed this pic because..." cols="70" rows="3" maxlength="100"></textarea>
                    </div>  
                    <fieldset id="share">
                    <div>
                        <label for="pics">Upload your best picture</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="51200">         
                        <input id="pics" name="picture[]" type="file" multiple accept="image/*">
                    </div>
                    </fieldset>
                    <fieldset class="button-shareit">
                        <input type="submit" value="Share" id='createBtn' id='shareBtn' class="Btn">
                        <input type="reset" value="Reset" id='BtnEnter' class="Btn">
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
                
<!--      скрипты          -->
    <script src="/js/header.js"></script>
      <script src="/js/collection.js"></script>
      
 
      
 </body>
</html> 