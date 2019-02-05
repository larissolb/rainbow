<div class="container-share"> <!--главная рамка-->
    <div class="left"> <!--position column left main-->
        <h2>Last updates</h2>
        <div><?php echo "<img src=\"../img/" . $last_pic['img_path'] . "\" alt=\"last loaded pic\" />";?>
        <a href="/rating/pic/<?php echo $last_pic['id'];?>"> More details </a></div>
        <p></p>
        <?php foreach ($pics as $rand_pic):?>
        <div class="hrefleft"><img src="/img/<?php echo $rand_pic['img_path']; ?> " alt="<?php echo $rand_pic['img_path'];?> ">
        <a href="/rating/pic/<?php echo $rand_pic['id'];?>"> More details </a></div>
        <?php endforeach;?>
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
                <label for="pics">Upload your best picture</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="512000">         
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
    <!-- center-mobile -->    
    <?php if($_POST == NULL) :?>
    <?php $type = 1;?>
    <?php endif; ?>
    <div class="center-mobile">
    <?php if ($type == "LOAD_SUCCESS"): ?>
        <div><img src="/img/horizont_adv.png" alt="thank you"></div>
        <a href="/share"><button  id='BtnEnter'>Load once more</button></a>
    <?php else: ?>
    <form action="/share/loadpicsM" method="post" autocomplete="on" enctype="multipart/form-data" name="Upload">
        <fieldset class="field"> 
            <div class="item-mobile">
                <label id="label" for="nameBook">Name of coloring-book's</label>
                <input id="nameBook" name="nameBook" type="text" autofocus required>
            </div>
            <div class="item-list" id="theme" name='theme'>
                <label id="label" for="theme">What theme?</label>
                <p></p>
                <label><input type="radio" name='theme' value='Nature'>Nature</label>
                <label><input type="radio" name='theme' value='Space' >Space</label>
                <label><input type="radio" name='theme' value='Animals'>Animals</label>
                <label><input type="radio" name='theme' value='Cars'>Cars</label>
                <label><input type="radio" name='theme' value='Cities'>Cities</label>
                <label><input type="radio" name='theme' value='Other' checked>Other</label>
            </div> 
            <div class="item-list" id="type" name="type">
                <label id="label" for="type">What instruments did you use?</label>
                <p></p>
                <label><input type="radio" name='type' value='pen'> Colour pens</label>
                <label><input type="radio" name='type' value='pencil' checked> Colour pencils</label>
                <label><input type="radio" name='type' value='paints'> Paints </label> <br>
                <label><input type="radio" name='type' value='monochrome'>Monochrome</label>
                <label><input type="radio" name='type' value='markers'> Markers</label>
            </div>
            <div class="item-list">
                <label id="label" for="amount">How many colours did you use?</label> 
                <input id="amount" name="amount" type="number" min="1" step="1" value="0">
            </div>
            <div class="item-mobile">
                <label  id="label" for="describe">&#9999; Describe it</label>
                <textarea id="describe" name="text" placeholder="I choosed this pic because..." cols="70" rows="3" maxlength="100"></textarea>
            </div>  
        <fieldset id="share">
            <div>
                <label id="label" for="pics">Upload your best picture</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="512000">         
                <input id="pics" name="picture[]" type="file" multiple accept="image/*">
            </div>
        </fieldset>
        <?php if ($type == "TYPE_ERROR") :?>
        <div id="red">Problem with the type of your pic - only jpeg/jpg/png</div>
        <?php elseif ($type == "NO_PIC") :?>
        <div id="red">You've forgotten a pic</div>
        <?php elseif ($type == "SIZE_ERROR") :?>
        <div id="red">Problem with the size of your pic - no more 500kb</div>
        <?php else :?>   
        <?php endif; ?>
        <fieldset class="button-shareit">
            <input type="submit" value="Share" id="shareMob" id='createBtn' id='shareBtn' class="Btn">
            <input type="reset" value="Reset" id='BtnEnter' class="Btn">
        </fieldset>  
        </fieldset>  
    </form>
    </div>
    <?php endif; ?>
<div class="right"> <!-- begin share right side -->
    <img src="../img/ad.png" alt="advertising">
</div>
</div> <!--конец главной рамки-->

<script src="/js/collection.js"></script>
      