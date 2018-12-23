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
      <div class="container-share"> <!--главная рамка-->
            <div class="left"> <!--position column left main-->
                <h2>Last updates</h2>
<?php foreach($pics as $arr): ?>
<img src="/img/<?php echo $arr['img']; ?> " alt="<?php echo $arr['img'];?> ">
<p><a href="/rating/pic/<?php echo $arr['id'];?>"> Подробнее </a></p>
<?php endforeach;?>

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
                <h1><?php echo $header;?></h1>
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
                <div><img src="/img/horizont_adv.png" alt='horizontal adv'></div>
           </div>    
            <div class="right"> <!-- begin share right side -->
                <img src="/img/ad.png" alt="advertising">
            </div><!-- begin share right side -->
       </div> <!--конец главной рамки-->
      

<script src="/js/collection.js"></script>