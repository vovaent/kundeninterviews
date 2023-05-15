<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kundeninterviews
 */

$is_landing = is_page_template('landing-page-template.php');
?>

<footer id="colophon" class="site-footer Footer">
    <div class="container">
        <?php if ($footer_logo = get_field('footer_logo', 'option')) { ?>
            <div class="FooterLogo" onClick="location.href='<?php echo home_url(); ?>'">
                <img src="<?php echo $footer_logo['url'] ?>" alt="<?php echo $footer_logo['alt'] ?>">
            </div>
        <?php } ?>
    </div>

    <?php if (!$is_landing) : ?>
        <?php if ($footer_categories = get_field('footer_categories', 'option')) { ?>
            <div class="FooterCategories">
                <div class="container">
                    <?php foreach ($footer_categories as $item) { ?>

                        <div class="FooterCategoriesItem">
                            <div class="FooterCategoriesItemTop">
                                <div class="FooterCategoriesItemTitle">
                                    <?php echo $item->name ?>
                                </div>
                                <div class="FooterCategoriesItemTopIcon">
                                    <svg class="FooterCategoriesItemTopIconClose" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.5H8V8.5L0 8.5V10.5H8V18.5H10V10.5H18V8.5L10 8.5V0.5Z" fill="white" />
                                    </svg>
                                    <svg class="FooterCategoriesItemTopIconOpen" width="18" height="3" viewBox="0 0 18 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 0.500001V2.5L0 2.5L8.74228e-08 0.5L18 0.500001Z" fill="white" />
                                    </svg>
                                </div>
                            </div>
                            <div class="FooterCategoriesItemContent">
                                <?php $cat_posts = new WP_Query([
                                    'post_type' => 'post',
                                    'posts_per_page' => 4,
                                    'tag_id' => $item->term_ID,
                                    'post_status' => 'publish',
                                    'orderby' => 'date',
                                    'order' => 'DESC'
                                ]); ?>

                                <?php if ($cat_posts->have_posts()) { ?>
                                    <?php while ($cat_posts->have_posts()) : $cat_posts->the_post(); ?>

                                        <div class="FooterCategoriesItemPost" onClick="location.href='<?php echo get_permalink(); ?>'">
                                            <div class="FooterCategoriesItemPostTitle">
                                                <?php echo get_the_title(); ?>
                                            </div>
                                        </div>

                                    <?php endwhile; ?>
                                <?php } ?>

                                <div class="FooterCategoriesItemButton" onClick="location.href='<?php echo get_category_link($item) ?>'">
                                    <div class="FooterCategoriesItemButtonTitle">
                                        Alle sehen
                                    </div>
                                    <div class="FooterCategoriesItemButtonIcon">
                                        <svg width="14" height="6" viewBox="0 0 14 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14 3L9 0.113249V5.88675L14 3ZM0 3.5H9.5V2.5H0V3.5Z" fill="#19C79D" />
                                        </svg>

                                    </div>
                                </div>

                            </div>

                        </div>

                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    <?php endif; ?>

    <div class="container">
        <div class="FooterInfo">
            <?php if ($copyriting = get_field('copyriting', 'option')) { ?>
                <div class="FooterInfoCopi">
                    <?php echo $copyriting ?>
                </div>
            <?php } ?>
            <div class="FooterInfoDaten">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footerprivacy',
                        'menu_id'        => 'footerprivacy-menu',
                    )
                );
                ?>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->

<script>
    $(function() {
        if ($('body').width() < 1024) {

            $('.FooterCategoriesItemContent').slideUp(0);

            $('.FooterCategoriesItemTop').click(function() {
                $(this).parent().find('.FooterCategoriesItemContent').slideToggle(500);
                $(this).find('.FooterCategoriesItemTopIcon').toggleClass('open')
            })
        }
    })
</script>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>