        <div class="container-share"> <!--главная рамка-->

<!--form for upload - center 70% -->
            <div class="center">
                <div class="about-pic">
<h2>About <?php echo $pics['nameBook'];?> </h2>
<img src="/img/<?php echo $pics['img']; ?> " alt="<?php echo $pics['img'];?> ">
<p><?php echo $pics['describe'];?></p>
<div><span>Theme: <?php echo $pics['theme'];?></span>
<span>Instruments: <?php echo $pics['type'];?></span>
<span>Amount of colours: <?php echo $pics['amount'];?></span></div>
</div>
   <div class="actions">
        <div id="like"><img src='/img/icon/like.png' alt='like'></div>
        <span class="like"></span>
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
                       <?php foreach ($comments as $comment):?>
                        <div><?php echo $comment; ?></div>
                        <?php endforeach;?>
                        
                    </div>
                </fieldset>
            </form>
        </div>
        <div id="print"><img src="/img/icon/print.png" alt="print"></div>
      </div>
          </div> <!--finish center--> 

        <div class="right"> <!—begin right side-->
          <a href='/pencils'><img src="/img/a_pencils.jpg" alt="watch paints by pencils"></a>
          <a href='/paints'><img src="/img/a_watercolors.png" alt="watch paints by watercolors"></a>
          <a href='/markers'><img src="/img/a_markers.jpg" alt="watch paints by markers"></a>
          </div><!-- finish right  -->
          </div> <!--finish container-->  

<script src="/js/like.js"></script>
<script src="/js/print.js"></script>
<script src="/js/comments.js"></script>
