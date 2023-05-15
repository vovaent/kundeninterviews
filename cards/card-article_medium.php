<div class="MediumArticle">
    <a class="MediumArticleLinck" href="<?php echo get_permalink(); ?>"></a>
    <div class="MediumArticleTop">
        <div class="MediumArticleTopTime">
            <?php echo reading_time(get_the_ID()); ?>
        </div>
        <div class="MediumArticleTopImage">
            <?php if ($article_img = get_the_post_thumbnail_url(get_the_ID(), 'medium_large')) { ?>
                <img src="<?php echo $article_img ?>" alt="thumbnail">
            <?php } ?>
        </div>
    </div>
    <div class="MediumArticleBottom">
        <div class="MediumArticleBottomDate">
            <?php echo (get_the_date('d. F  Y')); ?>
        </div>
        <div class="MediumArticleBottomTitle">
            <?php
            if ($title = get_field('title', get_the_ID())) {
                echo $title;
            } else {
                the_title();
            }
            ?>
        </div>
        <div class="MediumArticleBottomDescription">
            <?php echo mb_strimwidth(get_the_excerpt(), 0, 120, "..."); ?>
        </div>
    </div>
</div>