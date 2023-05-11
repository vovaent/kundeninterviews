<div class="MinArticle">
	<a class="MinArticleLinck" href="<?php echo get_permalink(); ?>"></a>
  <div class="MinArticleTop">
    <div class="MinArticleTopImage">
      <?php if($article_img = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')){ ?>
      <img src="<?php echo $article_img ?>" alt="thumbnail">
      <?php } ?>
    </div>
  </div>
  <div class="MinArticleBottom">
	<div class="MinArticleBottomStat">
		<div class="MinArticleBottomStatDate"> <?php echo(get_the_date('F d, Y')); ?> </div>
		
		<svg width="6" height="5" viewBox="0 0 6 5" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M3 0L5.59808 4.5H0.401924L3 0Z" fill="black"/>
		</svg>
		
		<div class="MinArticleBottomStatTime"> <?php echo reading_time(get_the_ID()); ?> </div>
	</div>
    
    <div class="MinArticleBottomTitle">
      <?php
      if ( $title = get_field( 'title', get_the_ID() ) ) {
        echo $title;
      } else {
        the_title();
      }
      ?>
    </div>
  </div>
</div>
