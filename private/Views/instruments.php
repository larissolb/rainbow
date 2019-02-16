<div class="container-rating"> 
    <div class="left"> <!--position column left main-->
        <h2>Last updates</h2>
        <div><img src="/img/<?php echo $last_pic['img_path']; ?> " alt="last pic" class="img">
        <a href="/rating/pic/<?php echo $last_pic['id'];?>"> More details </a></div>
        <p></p>
        
        <?php foreach ($rand_pics as $rand_pic):?>
        <div class="hrefleft"><img src="/img/<?php echo $rand_pic['img_path']; ?> " alt="<?php echo $rand_pic['img_path'];?> " class="img">
        <a href="/rating/pic/<?php echo $rand_pic['id'];?>"> More details </a></div>
        <?php endforeach;?>

        <div class="link-instr"><p><a href="#authorization">Join us and Share your pics!</a></div>
    </div> <!--end share left side -->
    <div class="center"> <!-- center -->
        <h1><?php echo $header; ?></h1>

    <div class="about-pic">
        <?php foreach ($pics as $pic):?>
         <div class="hrefleft"><img src="/img/<?php echo $pic['img_path']; ?> " alt="<?php echo $pic['img_path'];?> " class="img">
        <a href="/rating/pic/<?php echo $pic['id'];?>"> More details </a></div>
        <?php endforeach;?>

</div>
        
    </div> <!--finish center--> 
    <div class="right"> <!-- beginright   -->
        <h2>Watch others</h2> 
        <?php if($title === "Watch&Rate|Paints by markers"):?>
                <?php echo "<a href='/pencils'><img src='/img/a_pencils.jpg' alt='watch paints by pencils' class='img'></a>
                      <a href='/paints'><img src='/img/a_watercolors.png' alt='watch paints by paints' class='img'></a>" 
        ;?>
        <?php elseif($title === "Watch&Rate|Paints by paints") :?>
           <?php echo "<a href='/pencils'><img src='/img/a_pencils.jpg' alt='watch paints by pencils' class='img'></a>
                  <a href='/markers'><img src='/img/a_markers.jpg' alt='watch paints by markers' class='img'></a>"
        ;?>
        <?php else:?>
            <?php echo "<a href='/paints'><img src='/img/a_watercolors.png' alt='watch paints by paints' class='img'></a>
                 <a href='/markers'><img src='/img/a_markers.jpg' alt='watch paints by markers' class='img'></a>"
        ;?>
        <?php endif;?>
    </div><!-- finish right  -->
</div> <!--finish container-->    
