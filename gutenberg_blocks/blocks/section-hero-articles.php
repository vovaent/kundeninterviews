<?php
		if(get_field('uniq_id')){
        $unique_id = get_field('uniq_id');
        }
        else{
            $unique_id = uniqid('HeroArticles_') ;
        }

    $topPosts = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    ));

    $topPosts2 = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'offset' => 1,
    ));

?>
<section class="HeroArticles" id="<?php $unique_id ?>">
	<div class="container">
		<div class="HeroArticlesFlex">
			<div class="HeroArticlesFlexMainColumn">

				<?php if ($topPosts->have_posts()) : ?>
                <?php while ($topPosts->have_posts()) : $topPosts->the_post(); ?>

				<div class="HeroBigArticle ">
					<a href="<?php echo get_permalink(); ?>" class="HeroBigArticleLink"></a>
					<div class="HeroBigArticleTop">
						<div class="HeroBigArticleTopTime">
							<?php echo reading_time(get_the_ID()); ?>
						</div>
						<div class="HeroBigArticleTopImage">
							<?php if($article_img = get_the_post_thumbnail_url(get_the_ID(), 'medium')){ ?>
                                <img src="<?php echo $article_img ?>" alt="thumbnail">
                            <?php } ?>
						</div>
					</div>
					<div class="HeroBigArticleBottom">
						<div class="HeroBigArticleBottomDate">
                                <?php echo(get_the_date('F d, Y')); ?>
                        </div>
						<div class="HeroBigArticleBottomTitle">
								<?php if($title = get_field('title', get_the_ID())){
                                echo $title;
								}else{
									the_title();
								}?>
						</div>
						<div class="HeroBigArticleBottomExerpt">
							<?php echo mb_strimwidth(get_the_excerpt(), 0, 120, "..."); ?>
						</div>
					</div>
				</div>
				
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
				<?php endif; ?>

			</div>
			<div class="HeroArticlesFlexAdditionalColumn">

				<?php if ($topPosts2->have_posts()) : ?>
				<?php while ($topPosts2->have_posts()) : $topPosts2->the_post(); ?>
                  
					<div class="HeroMinArticle">
						<a href="<?php echo get_permalink(); ?>" class="HeroMinArticleLink"></a>
						<div class="HeroMinArticleTop">
						<div class="HeroMinArticleTopTime">
							<?php echo reading_time(get_the_ID()); ?>
						</div>
						<div class="HeroMinArticleTopImage">
							<?php if($article_img = get_the_post_thumbnail_url(get_the_ID(), 'medium')){ ?>
                                <img src="<?php echo $article_img ?>" alt="thumbnail">
                            <?php } ?>
						</div>
					</div>
					<div class="HeroMinArticleBottom">
						<div class="HeroMinArticleBottomDate">
                                <?php echo(get_the_date('F d, Y')); ?>
                        </div>
						<div class="HeroMinArticleBottomTitle">
								<?php if($title = get_field('title', get_the_ID())){
                                echo $title;
								}else{
									the_title();
								}?>
						</div>
						<div class="HeroMinArticleBottomExerpt">
							<?php echo mb_strimwidth(get_the_excerpt(), 0, 120, "..."); ?>
						</div>
					</div>
					</div>
						
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<?php endif; ?>

			</div>
		</div>
	</div>
</section>
