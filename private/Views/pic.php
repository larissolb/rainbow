<div class="container-share"> <!--главная рамка-->

            <div class="center">
                <div class="about-pic">
<h2><?php echo $pics['nameBook'];?> </h2>
<img src="/img/<?php echo $pics['img_path']; ?> " alt="<?php echo $pics['img_path'];?> ">
<p><?php echo $pics['text'];?></p>
<div><span>Theme: <?php echo $pics['Themes_id'];?></span>
<span>Instruments: <?php echo $pics['Types_id'];?></span>
<span>Amount of colours: <?php echo $pics['amount'];?></span></div>
</div>
   <div class="actions">
        <form action="/rating/like" name="like" id="formLike">
            <div id="like"><img src='/img/icon/like.png' alt='like'>
                <textarea name='like' class="like"><?php echo $likes; ?></textarea>   
            </div>
        </form>
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
                        <div><?php echo $comment['comment']; ?></div>
                        <?php endforeach;?>
                        
                    </div>
                </fieldset>
            </form>
        </div>
        <div id="print"><img src="/img/icon/print.png" alt="print"></div>
      </div>
          </div> <!--finish center--> 

        <div class="right"> 
          <a href='/pencils'><img src="/img/a_pencils.jpg" alt="watch paints by pencils"></a>
          <a href='/paints'><img src="/img/a_watercolors.png" alt="watch paints by watercolors"></a>
          <a href='/markers'><img src="/img/a_markers.jpg" alt="watch paints by markers"></a>
          </div><!-- finish right  -->
          </div> <!--finish container-->  

<script src="/js/like.js"></script>
<script src="/js/print.js"></script>
<script src="/js/comments.js"></script>
