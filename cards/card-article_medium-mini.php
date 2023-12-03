<div class="MediumMiniArticle">
    <a class="MediumMiniArticleLinck" href="<?php echo get_permalink(); ?>"></a>
    <div class="MediumMiniArticleTop">
        <div class="MediumMiniArticleTopTime">
            <?php echo reading_time(get_the_ID()); ?>
        </div>
        <div class="MediumMiniArticleTopImage">
            <?php if ($article_img = get_the_post_thumbnail_url(get_the_ID(), 'medium_large')) { ?>
                <img src="<?php echo $article_img ?>" alt="thumbnail">
            <?php } ?>
        </div>
    </div>
    <div class="MediumMiniArticleBottom">
        <div class="MediumMiniArticleBottomDate">
            <?php echo (get_the_date('d. F  Y')); ?>
        </div>
        <div class="MediumMiniArticleBottomTitle">
            <?php
            if ($title = get_field('title', get_the_ID())) {
                echo $title;
            } else {
                the_title();
            }
            ?>
        </div>
    </div>
</div>