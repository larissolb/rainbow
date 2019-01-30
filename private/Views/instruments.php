<div class="container-rating"> 
    <div class="left"> <!--position column left main-->
        <h2>Last updates</h2>
        <div><?php echo "<img src=\"../img/" . $last_pic['img_path'] . "\" alt=\"last loaded pic\" />";?>
        <a href="/rating/pic/<?php echo $last_pic['id'];?>"> More details </a></div>
    
        
        
        <?php foreach ($rand_pics as $rand_pic):?>
        <div class="hrefleft"><img src="/img/<?php echo $rand_pic['img_path']; ?> " alt="<?php echo $rand_pic['img_path'];?> ">
        <a href="/rating/pic/<?php echo $rand_pic['id'];?>"> More details </a></div>
        <?php endforeach;?>

        <div class="link-instr"><p><a href="#authorization">Join us and Share your pics!</a></div>
    </div> <!--end share left side -->
    <div class="center"> <!-- center -->
        <h1><?php echo $header; ?></h1>

        <div class="about-pic">
    <h2><?php echo $pics['nameBook'];?> </h2>
    <a href="/rating/pic/<?php echo $pics['id']-1;?>" title="next"> 
      <img src="/img/<?php echo $pics['img_path']; ?> " alt="<?php echo $pics['img_path'];?> ">
    </a>
<p><?php echo $pics['text'];?></p>
<div><span>Theme: <?php echo $pics['Themes_id'];?></span>
<span>Instruments: <?php echo $pics['Types_id'];?></span>
<span>Amount of colours: <?php echo $pics['amount'];?></span></div>
</div>
        <div class="actions">
            <div id="like">
            <form action="/rating/like" name="like" id="formLike">
            <fieldset>   
                <div>
                <textarea name='like' class="like"><?php echo $likes; ?></textarea>
            <img src='/img/icon/like.png' alt='like'>
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
                        <div><?php echo $comment['comment']; ?></div>
                        <?php endforeach;?>
                    </div>
                </fieldset>
            </form>
        </div>
        <div id="print"><img src="/img/icon/print.png" alt="print"></div>
      </div>
    </div> <!--finish center--> 
    <div class="right"> <!-- beginright   -->
        <h2>Watch others</h2> 
        <?php if($title === "Watch&Rate|Paints by markers"){
                echo "<a href='/pencils'><img src='/img/a_pencils.jpg' alt='watch paints by pencils'></a>
                      <a href='/paints'><img src='/img/a_watercolors.png' alt='watch paints by paints'></a>" 
        ;}elseif($title === "Watch&Rate|Paints by paints"){
            echo "<a href='/pencils'><img src='/img/a_pencils.jpg' alt='watch paints by pencils'></a>
                  <a href='/markers'><img src='/img/a_markers.jpg' alt='watch paints by markers'></a>"
        ;} else{
            echo "<a href='/paints'><img src='/img/a_watercolors.png' alt='watch paints by paints'></a>
                 <a href='/markers'><img src='/img/a_markers.jpg' alt='watch paints by markers'></a>"
        ;}
        ?>
    </div><!-- finish right  -->
</div> <!--finish container-->    
