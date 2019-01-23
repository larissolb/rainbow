<!DOCTYPE html>
<!--
здесь можно посмотреть и оценить загруженные рисунки
-->
       <script src="/js/slider.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
        <script src="/galleria/galleria-1.4.2.min.js"></script>

      <div class="container-rating"> <!--begin container -->
        <div class="left"> <!-- left advertising  -->
            <img src="/img/ad.png" alt="advertising">
         </div>  <!--final left -->   
        <div class="center"> <!-- center -->
    <div class="galleria">
    <div id="slider"></div></div>
    <div class="actions">
        <div id="like"><img src='/img/icon/like.png' alt='like'></div>
        <span class="like"></span>
        <div class="comments">
            <form action="/rating/comment" method="post" name='formComment'>
                <fieldset>
                  <div>
                  <textarea name='comment'> </textarea> 
                  </div>
                  <div>
                    <input type='submit' name='commentBtn' value='comment' class="btn-comment"></div>
                </fieldset>
                <fieldset>
                    <div id="comments"> </div>
                </fieldset>
            </form>
        </div>
        <div id="print"><img src="/img/icon/print.png" alt="print"></div>
      </div>
          </div> <!--finish center--> 
        <div class="right"> <!-- right last updates random pics php  -->
          <a href='/pencils'><img src="/img/a_pencils.jpg" alt="watch paints by pencils"></a>
          <a href='/paints'><img src="/img/a_watercolors.png" alt="watch paints by watercolors"></a>
          <a href='/markers'><img src="/img/a_markers.jpg" alt="watch paints by markers"></a>
          </div><!-- finish right  -->
          </div> <!--finish container-->                         
<!--      скрипты          -->
<script src="/js/index.js"></script>
<script src="/js/galleria.js"></script>
<script src="/js/like.js"></script>
<script src="/js/print.js"></script>
<script src="/js/comments.js"></script>