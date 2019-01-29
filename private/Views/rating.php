<div class="container-rating"> <!--begin container -->
    <div class="left"> <!-- left advertising  -->
        <img src="/img/ad.png" alt="advertising">
    </div>  <!--final left -->   
    <div class="center">
        <div class="about-pic">
            <h2><?php echo $pics['nameBook'];?> </h2>
            <img src="/img/<?php echo $pics['img_path']; ?> " alt="<?php echo $pics['img_path'];?> ">
        </div>
        <div class="icons-rate">
            <form action="/rating/like" name="like">
            <div id="like"><img src='/img/icon/like.png' alt='like'>
                <textarea name='like' class="like"><?php echo $likes; ?></textarea>   
            </div></form>
        <div id="info"><a href="/rating/pic/<?php echo $pics['id'];?>" target="_blank"><img src='/img/icon/info.png' alt='more details'> </a></div>
        <div id="print"><img src="/img/icon/print.png" alt="print"></div>
        </div>
    </div> <!--finish center--> 
    <div class="right"> <!-- beginright   -->
        <a href='/pencils'><img src="/img/a_pencils_rat.jpg" alt="watch paints by pencils"></a>
        <a href='/paints'><img src="/img/a_watercolors_rat.png" alt="watch paints by paints"></a>
        <a href='/markers'><img src="/img/a_markers_rat.jpg" alt="watch paints by markers"></a>
    </div><!-- finish right  -->
</div> <!--finish container-->                         
<!--      скрипты          -->
<script src="/js/like.js"></script>
<script src="/js/print.js"></script>