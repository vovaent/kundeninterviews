<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package kundeninterviews
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <section class="error-404 not-found Notfound">

            <div class="NotfoundInfo">
                <div class="NotfoundInfoTitle">
                    <?php echo esc_html__('Ooops...Fehler!', 'kundeninterviews') ?>
                </div>
                <div class="NotfoundInfoDesc">
                    <?php echo esc_html__('Diese Seite wurde noch nicht erstellt oder existiert nicht. Bitte kehren Sie nach Startseite zurück', 'kundeninterviews') ?>
                </div>
            </div>

            <div class="NotfoundImage">
                <img src="<?php echo (get_template_directory_uri() . '/img/404Image.png') ?>" alt="">
            </div>

        </section><!-- .error-404 -->
    </div>
</main><!-- #main -->

<?php
get_footer();
