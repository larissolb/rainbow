<script src="/js/slider.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script src="/galleria/galleria-1.4.2.min.js"></script>

<div class="container-rating"> 
    <div class="left"> <!--position column left main-->
        <h2>Last updates</h2>
        <div><?php echo "<img src=\"../img/" . $last_pic['img_path'] . "\" alt=\"last loaded pic\" />";?>
        <a href="/rating/pic/<?php echo $last_pic['id'];?>"> More details </a></div>
    
        
        
        <?php foreach ($pics as $rand_pic):?>
        <div class="hrefleft"><img src="/img/<?php echo $rand_pic['img_path']; ?> " alt="<?php echo $rand_pic['img_path'];?> ">
        <a href="/rating/pic/<?php echo $rand_pic['id'];?>"> More details </a></div>
        <?php endforeach;?>

        <div><p><a href="#authorization">Join us and Share your pics!</a></div>
    </div> <!--end share left side -->
    <div class="center"> <!-- center -->
        <h1><?php echo $header; ?></h1>
        <div class="galleria">
            
        <div id="slider"></div></div>
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
<script src="/js/index.js"></script>
<script src="/js/galleria.js"></script>