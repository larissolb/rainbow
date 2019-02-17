        <link href="/CSS/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />
        <script src="/js/jquery.min.js"></script>
        <script src="/js/jquery.Jcrop.min.js"></script>
        <script src="/js/script.js"></script>

<div class="container-share"> <!--главная рамка-->
    <!-- center-mobile -->    
    <?php if($_POST == NULL) :?>
    <?php $asnwer = 1;?>
    <?php endif; ?>
    <div class="center-mobile">
    <?php if ($answer == "LOAD_SUCCESS"): ?>
        <div><img src="/img/horizont_adv.png" alt="thank you" class='img'></div>
        <a href="/share"><button  id='BtnEnter'>Load once more</button></a>
    <?php else: ?>
<!--    <form action="/share/loadpicsM" method="post" autocomplete="on" enctype="multipart/form-data" name="Upload">-->
            <form id="upload_form" name="Upload" enctype="multipart/form-data" method="post" action="/share/loadpicsM" onsubmit="return checkForm()">
                   <!-- hidden crop params -->
                    <input type="hidden" id="x1" name="x1" />
                    <input type="hidden" id="y1" name="y1" />
                    <input type="hidden" id="x2" name="x2" />
                    <input type="hidden" id="y2" name="y2" />
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
                <label><input type="radio" name='type' value='paints'> Paints </label> 
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
<!--                <input id="pics" name="picture[]" type="file" multiple accept="image/*">-->
                <div><input type="file" name="picture" id="pics" onchange="fileSelectHandler()" /></div>
                <div class="error"></div>
                <div class="step2">
                <img id="preview" />
                    <input type="hidden" id="w" name="w" />
                    <input type="hidden" id="h" name="h" />
                    <input type="submit" class="button default" value="Crop&Share" id='createBtn' id='shareBtn' class="Btn"/>
                </div>
            </div>
        </fieldset>
        <?php if ($answer == "TYPE_ERROR") :?>
        <div id="red">Problem with the type of your pic - only jpeg/jpg/png</div>
        <?php elseif ($answer == "NO_PIC") :?>
        <div id="red">You've forgotten a pic</div>
        <?php elseif ($answer == "SIZE_ERROR") :?>
        <div id="red">Problem with the size of your pic - no more 500kb</div>
        <?php else :?>   
        <?php endif; ?>
        <fieldset class="button-shareit">
<!--            <input type="submit" value="Share" id="shareMob" id='createBtn' id='shareBtn' class="Btn">-->
            <input type="reset" value="Reset" id='BtnEnter' class="Btn">
        </fieldset>  
        </fieldset>  
    </form>
    </div>
    <?php endif; ?>
</div> <!--конец главной рамки-->