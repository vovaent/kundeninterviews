<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="Article">

        <div class="container">
            <div class="ArticleTop">
                <div class="ArticleTopStat">
                    <div class="ArticleTopStatDate"> <?php echo (get_the_date('F d, Y')); ?> </div>

                    <svg width="6" height="5" viewBox="0 0 6 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 0L5.59808 4.5H0.401924L3 0Z" fill="black" />
                    </svg>

                    <div class="ArticleTopStatTime"> <?php echo reading_time(get_the_ID()); ?> </div>
                </div>
                <div class="ArticleTopTitle">
                    <?php echo get_the_title(); ?>
                </div>
                <?php if ($tags = get_the_tags()) { ?>
                    <?php $i = 1; ?>
                    <div class="ArticleTopTags">
                        <?php foreach ($tags as $item) { ?>
                            <a class="ArticleTopTagsItem" href="<?php echo get_tag_link($item) ?>">
                                #<?php echo $item->name; ?>
                            </a>
                            <?php if ($i < count($tags)) { ?>
                                <svg width="6" height="5" viewBox="0 0 6 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 0L5.59808 4.5H0.401924L3 0Z" fill="black" />
                                </svg>
                            <?php } ?>
                            <?php $i++; ?>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="ArticleTopImage">
                    <?php if ($article_img = get_field('image')) { ?>
                        <img src="<?php echo $article_img['url'] ?>" alt="<?php echo $article_img['alt'] ?>">
                    <?php } elseif ($article_img = get_the_post_thumbnail_url(get_the_ID(), 'full')) { ?>
                        <img src="<?php echo $article_img ?>" alt="thumbnail">
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="entry-content">
            <div class="container">
                <div class="ArticleContainer">
                    <?php
                    the_content()
                    ?>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="ArticleBottom">
                <?php if ($author_id = get_the_author_meta('ID')) { ?>
                    <div class="ArticleBottomAutor">
                        <?php if ($avatar = get_field('avatar', 'user_' . $author_id)) { ?>
                            <div class="ArticleBottomAutorAvatar">
                                <img src="<?php echo $avatar['url'] ?>" alt="<?php echo $avatar['alt'] ?>">
                            </div>
                        <?php } ?>
                        <div class="ArticleBottomAutorInfo">
                            <?php if ($display_name = get_the_author_meta('display_name')) { ?>
                                <div class="ArticleBottomAutorInfoName">
                                    <?php echo $display_name ?>
                                </div>
                            <?php } ?>
                            <?php if ($description = get_the_author_meta('description')) { ?>
                                <div class="ArticleBottomAutorInfoExcerpt">
                                    <?php echo $description ?>
                                </div>
                            <?php } ?>
                            <div class="ArticleBottomAutorInfoSocial">
                                <?php if ($instagram = get_field('instagram', 'user_' . $author_id)) { ?>
                                    <a class="ArticleBottomAutorInfoSocialLink" href="<?php echo $instagram ?>">
                                        <?php echo esc_html__('Instagram', 'kundeninterviews') ?>
                                    </a>
                                <?php } ?>
                                <?php if ($twitter = get_field('twitter', 'user_' . $author_id)) { ?>
                                    <a class="ArticleBottomAutorInfoSocialLink" href="<?php echo $twitter ?>">
                                        <?php echo esc_html__('Twitter', 'kundeninterviews') ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="ArticleBottomSocial">
                    <div class="ArticleBottomSocialShare">
                        <div class="ArticleBottomSocialShareTitle">
                            <?php echo esc_html__('Teilen:', 'kundeninterviews') ?>
                        </div>
                        <div class="ArticleBottomSocialShareButtons">
                            <a href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>/<?php if (get_the_excerpt()) {
                                                                                                                        echo ('&description=' . get_the_excerpt());
                                                                                                                    } ?>" class="ArticleBottomSocialShareButtonsItem">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_4616_67332)">
                                        <path d="M8.885 12.55C8.48111 14.2635 8.08581 15.9146 7.22432 17.2167C6.96007 17.6156 6.69475 18.1177 6.2436 18.3333C5.57761 15.0073 6.97082 12.2083 7.5208 9.41249C6.81936 8.02394 7.25547 5.6729 8.75825 5.40624C10.9345 5.02082 10.3609 7.56665 9.99248 8.74999C9.78839 9.39999 9.42424 10.0219 9.47902 10.7344C9.6004 12.2354 11.5479 12.3333 12.5458 11.5594C13.9766 10.4542 14.3912 8.31769 14.2505 6.56249C14.0389 3.89061 10.9184 2.56245 8.16208 3.63016C6.74094 4.18019 5.45193 5.44582 5.26502 7.30519C5.16834 8.28436 5.37996 9.06665 5.7774 9.61874C5.83648 9.70311 6.04273 9.85103 6.07388 10.075C6.13618 10.5271 5.85904 11.0146 5.60554 11.3521C4.19406 10.9583 3.46577 9.7302 3.34976 8.17499C3.08117 4.63332 6.08032 1.94162 9.60685 1.68954C13.374 1.42183 16.3581 3.53015 16.6352 6.60415C16.8414 8.88853 16.0047 11.1875 14.677 12.426C13.678 13.3552 11.5565 14.2667 9.82169 13.3771C9.4382 13.1792 9.26633 12.9375 8.885 12.55Z" fill="#19C79D" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4616_67332">
                                            <rect width="20" height="20" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                            <a href="https://www.facebook.com/sharer?u=<?php echo get_permalink(); ?>;<?php if (get_the_excerpt()) {
                                                                                                            echo ('&t=' . get_the_excerpt());
                                                                                                        } ?>" class="ArticleBottomSocialShareButtonsItem">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.6663 11.25H13.7497L14.583 7.91666H11.6663V6.24999C11.6663 5.39166 11.6663 4.58332 13.333 4.58332H14.583V1.78332C14.3113 1.74749 13.2855 1.66666 12.2022 1.66666C9.93967 1.66666 8.33301 3.04749 8.33301 5.58332V7.91666H5.83301V11.25H8.33301V18.3333H11.6663V11.25Z" fill="#19C79D" />
                                </svg>
                            </a>
                            <a href="http://twitter.com/intent/tweet<?php if (get_the_excerpt()) {
                                                                        echo ('?text=' . get_the_excerpt() . ';');
                                                                    } ?>&url=<?php echo get_permalink(); ?>" class="ArticleBottomSocialShareButtonsItem">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_5047_74944)">
                                        <path d="M15.2995 5.54999C14.5395 5.54987 13.8098 5.84811 13.2674 6.38056C12.7251 6.913 12.4134 7.63709 12.3995 8.39699L12.3715 9.97199C12.3699 10.0566 12.3504 10.1398 12.3143 10.2163C12.2782 10.2928 12.2264 10.3608 12.1622 10.4159C12.098 10.4709 12.0228 10.5118 11.9417 10.5358C11.8606 10.5597 11.7754 10.5663 11.6915 10.555L10.1305 10.343C8.07653 10.063 6.10853 9.11699 4.22053 7.54399C3.62253 10.854 4.79053 13.147 7.60353 14.916L9.35053 16.014C9.43354 16.0662 9.5025 16.1379 9.55138 16.2228C9.60026 16.3078 9.62757 16.4035 9.63093 16.5015C9.63428 16.5995 9.61358 16.6968 9.57062 16.7849C9.52767 16.873 9.46378 16.9493 9.38453 17.007L7.79253 18.17C8.73953 18.229 9.63853 18.187 10.3845 18.039C15.1025 17.097 18.2395 13.547 18.2395 7.69099C18.2395 7.21299 17.2275 5.54999 15.2995 5.54999ZM10.3995 8.35999C10.417 7.39604 10.7184 6.45866 11.2661 5.66521C11.8138 4.87177 12.5833 4.25751 13.4784 3.89936C14.3736 3.54121 15.3544 3.45507 16.2983 3.65174C17.2421 3.84841 18.107 4.31914 18.7845 5.00499C19.4955 4.99999 20.1005 5.17999 21.4535 4.35999C21.1185 5.99999 20.9535 6.71199 20.2395 7.69099C20.2395 15.333 15.5425 19.049 10.7765 20C7.50853 20.652 2.75653 19.581 1.39453 18.159C2.08853 18.105 4.90853 17.802 6.53853 16.609C5.15953 15.7 -0.329469 12.47 3.27753 3.78599C4.97053 5.76299 6.68753 7.10899 8.42753 7.82299C9.58553 8.29799 9.86953 8.28799 10.4005 8.36099L10.3995 8.35999Z" fill="#19C79D" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_5047_74944">
                                            <rect width="24" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="ArticleBottomSocialLine">

                    </div>

                    <div class="ArticleBottomSocialLike">
                        <div class="ArticleBottomSocialLikeTitle">
                            <?php echo esc_html__('Der Beitrag hat Ihnen gefallen?:', 'kundeninterviews') ?>
                        </div>
                        <?php echo do_shortcode('[posts_like_dislike]'); ?>
                    </div>
                </div>

                <div class="ArticleBottomCloud">
                    <div class="ArticleBottomCloudTitle">
                        <?php echo esc_html__('Tag-Cloud', 'kundeninterviews') ?>
                    </div>
                    <?php if ($tags = get_tags(['hide_empty' => false])) { ?>
                        <div class="ArticleBottomCloudTags">
                            <?php foreach ($tags as $item) { ?>
                                <div class="ArticleBottomCloudTagsItem" data-tagid="<?php echo $item->term_id ?>" onClick="location.href='<?php echo get_tag_link($item) ?>'">
                                    <?php echo $item->name ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

            </div>

            <?php

            $postsarg = array(
                'post_type' => 'post',
                'posts_per_page' => 8,
                'paged' => 1,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'cat' => implode(',', wp_get_post_categories(get_the_ID(), ['fields' => 'ids']))
            );

            $lastposts = new WP_Query($postsarg);



            ?>
            <?php if ($lastposts) { ?>
                <div class="ArticleLast">

                    <div class="ArticleLastTitle">
                        <?php echo esc_html__('Andere Beiträge', 'kundeninterviews') ?>
                    </div>

                    <div class="ArticleLastContent">
                        <?php if ($lastposts->have_posts()) {
                            $i = 1;
                            while ($lastposts->have_posts()) : $lastposts->the_post();
                                if ($i == 6) {
                                    echo get_template_part('cards/card', 'cta_medium', get_field('cta_content', 'option'));
                                }
                                echo get_template_part('cards/card', 'article_medium');
                                $i++;
                            endwhile;
                            if ($i != 6) {
                                echo get_template_part('cards/card', 'cta_medium', get_field('cta_content', 'option'));
                            }
                        } ?>
                    </div>

                    <div class="ArticleLastContent Mobile">
                        <?php if ($lastposts->have_posts()) {
                            $i = 1;
                            while ($lastposts->have_posts()) : $lastposts->the_post();
                                if ($i == 6) {
                                    echo get_template_part('cards/card', 'cta_medium', get_field('cta_content', 'option'));
                                }
                                echo get_template_part('cards/card', 'article_mini');
                                $i++;
                            endwhile;
                            if ($i != 6) {
                                echo get_template_part('cards/card', 'cta_medium', get_field('cta_content', 'option'));
                            }
                        } ?>
                    </div>

                </div>
            <?php } ?>

        </div>
    </div>

    <div class="ArticleSidebar hide close">
        <div class="ArticleSidebarIcon">
            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 1L2 6L7 11" stroke="white" stroke-width="2" />
            </svg>
        </div>
        <div class="ArticleSidebarIcon Mobile">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="17.6572" y="4.92871" width="2" height="18" transform="rotate(45 17.6572 4.92871)" fill="white" />
                <rect x="19.0713" y="17.6567" width="2" height="18" transform="rotate(135 19.0713 17.6567)" fill="white" />
            </svg>
        </div>
        <div class="ArticleSidebarTitle">
            <?php echo esc_html__('Inhaltsverzeichnis:', 'kundeninterviews') ?>
        </div>
        <div class="ArticleSidebarMenu">

        </div>
        <div class="ArticleSidebarButton">
            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 1L2 6L7 11" stroke="white" stroke-width="2" />
            </svg>
        </div>
    </div>


    <script>
        $(function() {

            $('.ArtTitel').each(function() {
                $('.ArticleSidebarMenu').append('<a data-top="' + $(this).offset().top + '" href="#' + this.id + '">' + $(this).data('title') + '</a>')
            })
            setTimeout(function() {
                $('.ArticleSidebar').removeClass('hide');
            }, 200)

            $('.ArticleSidebarMenu > a').removeClass('active');

            $(window).on("scroll", function() {
                $('.ArticleSidebarMenu > a').each(function() {

                    if ($(window).scrollTop() > $(this).data('top') && $(this).data('top') > $('.ArticleSidebarMenu > a.active').data('top')) {
                        $(this).addClass('active');
                    } else {
                        $(this).removeClass('active');
                    }

                    if ($(window).scrollTop() < $(this).data('top')) {
                        $(this).removeClass('active');
                    }

                    if ($(window).scrollTop() > $(this).data('top') && $('.ArticleSidebarMenu > a.active').length == 0) {
                        $(this).addClass('active');

                    }
                })

            })

            $('.ArticleSidebarButton').click(function() {
                $('.ArticleSidebar').toggleClass('close');
            })

            $('.ArticleSidebarIcon').click(function() {
                $('.ArticleSidebar').toggleClass('close');
            })


        })
    </script>


</article><!-- #post-<?php the_ID(); ?> -->