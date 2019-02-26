        <link href="/CSS/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />
        <script src="/js/jquery.min.js"></script>
        <script src="/js/jquery.Jcrop.min.js"></script>
        <script src="/js/script.js"></script>
        
<div class="container-share"> <!--главная рамка-->
    <div class="left"> <!--position column left main-->
        <h2>Last updates</h2>
        <div><?php echo "<img src=\"../img/" . $last_pic['img_path'] . "\" alt=\"last loaded pic\" class='imgleft' />";?>
        <a href="/rating/pic/<?php echo $last_pic['id'];?>"> More details </a></div>
        <p></p>
        <?php foreach ($pics as $rand_pic):?>
        <div class="hrefleft"><img src="/img/<?php echo $rand_pic['img_path']; ?> " alt="<?php echo $rand_pic['img_path'];?>" class='imgleft'>
        <a href="/rating/pic/<?php echo $rand_pic['id'];?>"> More details </a></div>
        <?php endforeach;?>
    </div> <!--end share left side -->
<!--form for upload - center 70% -->
    <div class="center">
    <form id="upload_form" name="Upload" enctype="multipart/form-data" method="post" action="/share/loadpics" onsubmit="return checkForm()">
                   <!-- hidden crop params -->
                    <input type="hidden" id="x1" name="x1" />
                    <input type="hidden" id="y1" name="y1" />
                    <input type="hidden" id="x2" name="x2" />
                    <input type="hidden" id="y2" name="y2" />
        
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
            <div class="item">
                <label for="type">What instruments did you use?</label>
                <select id="type" name="type" required> 
                    <option value="pen"> colour pens</option> 
                    <option selected value="pencil">colour pencils</option> 
                    <option value="paints">paints</option> 
                    <option value="monochrome">monochrome</option>
                    <option value="markers">markers</option>
                </select> 
            </div>
            <div class="item">
                <label for="amount">How many colours did you use?</label> 
                <input id="amount" name="amount" type="number" min="1" step="1" value='0'>
            </div>
            <div class="describe">
                <label for="describe">&#9999; Describe it</label>
                <textarea id="describe" name="text" placeholder="I choosed this pic because..." cols="70" rows="3" maxlength="100"></textarea>
            </div>  
        <fieldset id="share">
            <div>
                <label for="pics">Upload your best picture (aspect ratio - 2.26 or 860x380)</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="10240000">         
                <div><input type="file" name="picture" id="pics" onchange="fileSelectHandler()" /></div>
                <div class="error"></div>
                <div class="step2">
                <div id="sizes">
                <input type="text" id="w" name="w" />
                <input type="text" id="h" name="h" />
                </div>
                    <img id="preview" />
                    <input type="submit" class="button default" value="Crop&Share" id='createBtn' id='shareBtn' class="Btn"/>
                </div>
            </div>
        </fieldset>
        <fieldset class="button-shareit">
            <input type="reset" value="Reset" id='BtnEnter' class="Btn">
        </fieldset>  
    </fieldset>  
        </form>
        <div><img src="../img/horizont_adv.png" alt='horizontal adv' class='img'></div>
    </div>

<div class="right"> <!-- begin share right side -->
    <img src="../img/ad.png" alt="advertising" class='img'>
</div>
</div> <!--конец главной рамки-->

<script src="/js/collection.js"></script>