
<div class="container-rating"> <!--begin container -->
    <div class="left"> <!-- left advertising  -->
<!--        <img src="/img/ad.png" alt="advertising" class='img'>-->
        <a href="https://payeer.com/09539553" target="_blank"><img src="https://payeer.com/style/images/banner/en/160x600.gif" alt="Payeer" class="imgadv"></a>
    </div>  <!--final left -->   
    <div class="center">
        <div class="about-pic">
    <h2><?php echo $pics['nameBook'];?> </h2>
    <?php if($pics['id'] != 1):?>
    
    <a href="/rating/pic/<?php echo $link;?>" title="next">
        <?php else:?>
        <a href="/share#authorization" title="share">
            <?php endif;?>
      <img src="/img/<?php echo $pics['img_path']; ?> " alt="<?php echo $pics['img_path'];?> " class='img'>
    </a>
<p><?php echo $pics['text'];?></p>
<div class="mobile">
    <p class="aboutpic">Theme: <?php echo $pics['Themes_id'];?></p>
    <p class="aboutpic">Instruments: <?php echo $pics['Types_id'];?></p>
    <p class="aboutpic">Amount of colours: <?php echo $pics['amount'];?></p>
</div>
<div class="main">
    <p class="aboutpic">
        Theme: <?php echo $pics['Themes_id'];?>&nbsp;&nbsp;
        Instruments: <?php echo $pics['Types_id'];?>&nbsp;&nbsp;
        Amount of colours: <?php echo $pics['amount'];?>
    </p>
</div>
</div>
              
        <div class="actions">
            <div id="like">
            <form action="/rating/like" name="like" id="formLike">
            <fieldset>   
                <div>
                <textarea name='like' class="like"><?php echo $likes; ?></textarea>
            <img src='/img/icon/like.png' alt='like' class='img'>
                </div>
            </fieldset>
            </form></div>
        <div class="comments">
            <form action="/rating/comment" method="post" name='formComment'>
                <fieldset>
                  <div>
                  <textarea name='comment'> </textarea> 
                  </div>
                  <div><input type='submit' name='commentBtn' value='comment' class="btn-comment"></div>
                </fieldset>
                <fieldset>
                    <div id="comments">
                        
                        <?php foreach ($comments as $key=>$comment):?>
                        <div class="startend"><?php echo "From " . $comment['Users_login'] . ":"; ?>
                            <p id="text"><?php echo '"'.$comment['comment'] . '"'; ?></p>
                            <p class="startend"><?php echo $comment['Date']; ?></p>
                        
                        </div>
                        
                        <?php endforeach;?>
                        
                    </div>
                </fieldset>
            </form>
        </div>
        <div id="print"><img src="/img/icon/print.png" alt="print" class='img'></div>
      </div>

    </div> <!--finish center--> 
    <div class="right"> <!-- beginright   -->
        <a href='/pencils'><img src="/img/a_pencils_rat.jpg" alt="watch paints by pencils" class='img'></a>
        <a href='/paints'><img src="/img/a_watercolors_rat.png" alt="watch paints by paints" class='img'></a>
        <a href='/markers'><img src="/img/a_markers_rat.jpg" alt="watch paints by markers" class='img'></a>
    </div><!-- finish right  -->
</div> <!--finish container-->                         
<!--      скрипты          -->
<script src="/js/like.js"></script>
<script src="/js/print.js"></script>
<script src="/js/comments.js"></script>
