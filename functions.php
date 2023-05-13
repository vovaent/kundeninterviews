<?php

/**
 * kundeninterviews functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kundeninterviews
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kundeninterviews_setup()
{
    /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on kundeninterviews, use a find and replace
		* to change 'kundeninterviews' to the name of your theme in all the template files.
		*/
    load_theme_textdomain('kundeninterviews', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
    add_theme_support('title-tag');

    /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'header' => esc_html__('Header', 'kundeninterviews'),
            'footer' => esc_html__('Footer', 'kundeninterviews'),
            'footerprivacy' => esc_html__('FooterPrivacy', 'kundeninterviews'),
        )
    );

    /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'kundeninterviews_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'kundeninterviews_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kundeninterviews_content_width()
{
    $GLOBALS['content_width'] = apply_filters('kundeninterviews_content_width', 640);
}
add_action('after_setup_theme', 'kundeninterviews_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kundeninterviews_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'kundeninterviews'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'kundeninterviews'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'kundeninterviews_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function kundeninterviews_scripts()
{
    wp_enqueue_style('kundeninterviews-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('kundeninterviews-style', 'rtl', 'replace');

    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.6.0.min.js');
    wp_enqueue_script('jquery');

    wp_enqueue_script('kundeninterviews-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), _S_VERSION, true);

    wp_enqueue_script('kundeninterviews-swiper', get_template_directory_uri() . '/js/swiper-bundle.min.js', array('jquery'), _S_VERSION, true);

    wp_enqueue_script('kundeninterviews-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'kundeninterviews_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Register Acf Theme General Settings.
 */

add_action('acf/init', 'theme_settings_init');
function theme_settings_init()
{

    // Check function exists.
    if (function_exists('acf_add_options_page')) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Allgemeine Einstellungen des Themas'),
            'menu_title'    => __('Themen Einstellungen'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}

/**
 * Register Gutenberg new category.
 */

add_filter('block_categories_all', function ($categories) {

    $categories[] = array(
        'slug'  => 'custom-for-post',
        'title' => 'For Post'
    );

    return $categories;
});

/**
 * Register Acf + Gutenberg file.
 */

function includeAcfGuten()
{

    $dir_gutenberg_blocks = get_template_directory() . "/gutenberg_blocks/register";
    if (function_exists('acf_register_block')) {
        $catalog_gutenblock = opendir($dir_gutenberg_blocks);
        while ($filename = readdir($catalog_gutenblock)) {

            if ($filename !== '.' && $filename !== '..') {
                $filename = $dir_gutenberg_blocks . "/" . $filename;
                include_once($filename);
            }
        }
        closedir($catalog_gutenblock);
    }
}
add_action('acf/init', 'includeAcfGuten');

/**
 * Render Acf + Gutenberg file.
 */

function my_acf_block_render_callback($block, $content = '', $is_preview = false, $post_id = 0, $wp_block = false, $context = false)
{

    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "template-parts/block" folder
    if (file_exists(get_theme_file_path("/gutenberg_blocks/blocks/section-{$slug}.php"))) {
        include(get_theme_file_path("/gutenberg_blocks/blocks/section-{$slug}.php"));
    } else {
        echo (get_theme_file_path("/gutenberg_blocks/blocks/section-{$slug}.php"));
        echo ('file not exist');
    }
}

/**
 * AJAX Render cards.
 */

function kundeninterviews_card_load()
{


    $ajaxpostsarg = array(
        'post_type' => 'post',
        'posts_per_page' => $_POST['q_posts'],
        'paged' => $_POST['paged'],
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    );

    if ($posts = $_POST['posts']) {
        $ajaxpostsarg['post__in'] = explode(',', $posts);
    }

    if ($categories = $_POST['categories']) {
        $ajaxpostsarg['cat'] = explode(',', $categories);
    }

    if ($tags = $_POST['tags']) {
        $ajaxpostsarg['tag__in'] = explode(',', $tags);
    }

    if ($_POST['card_type'] == 'medium') {
        $number_row = $_POST['number_row'];
    } else {
        $number_row = 3;
    }


    if ($_POST['cta_on'] == 'on' && $_POST['paged'] == 1 && $ajaxpostsarg['posts_per_page'] % $number_row == 0 && $_POST['cta_content']) {
        $ajaxpostsarg['posts_per_page'] = $ajaxpostsarg['posts_per_page'] - 1;
    }

    if ($_POST['cta_on'] == 'on' && $_POST['paged'] >= 2 && $ajaxpostsarg['posts_per_page'] % $number_row == 0 && $_POST['cta_content']) {
        $ajaxpostsarg['offset'] = $number_row - 1;
        $ajaxpostsarg['paged'] = $_POST['paged'] - 1;
    }

    $ajaxposts = new WP_Query($ajaxpostsarg);
    $response = '';

    if ($ajaxposts->have_posts()) {
        $i = 1;
        while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
            $response .= get_template_part('cards/card', 'article_' . $_POST['card_type']);

            if ($_POST['cta_on'] == 'on' && $_POST['paged'] == 1 && $_POST['cta_content'] && $i == 5) {
                $response .= get_template_part('cards/card', 'cta_' . $_POST['card_type'], $_POST['cta_content']);
            }

            if ($_POST['full_cta_on'] == 'on' && $_POST['paged'] == 1 && $_POST['cta_content'] && $i == 11) {
                $response .= get_template_part('cards/card', 'cta_full', $_POST['cta_content']);
            }

            $i++;
        endwhile;
    } else {
        $response = '';
    }


    if ($ajaxposts->max_num_pages > $_POST['paged'] && $_POST['show_more'] == 'on') {
        $response .= "<div id='show_more' class='ShowMore' > Show more  </div>";
    }

    echo $response;
    exit;
}
add_action('wp_ajax_kundeninterviews_card_load', 'kundeninterviews_card_load');
add_action('wp_ajax_nopriv_kundeninterviews_card_load', 'kundeninterviews_card_load');








// reading_time
if (!function_exists('reading_time')) {
    function reading_time()
    {
        $total_word_count = 0;
        $text = get_the_content('');
        $total_word_count = $total_word_count + str_word_count(strip_tags($text));
        $readingtime = ceil($total_word_count / 200);

        if ($readingtime <= 1) {
            $timer = esc_html__(' min', 'kundeninterviews');
        } else {
            $timer = esc_html__(' min', 'kundeninterviews');
        }
        if ($readingtime == 0) {
            $totalreadingtime = '<span>1 </span>' . '<span>' . $timer . '</span>';
        } else {
            $totalreadingtime = '<span>' . $readingtime . ' </span>' . '<span>' . $timer . '</span>';
        }

        return $totalreadingtime;
    }
}
