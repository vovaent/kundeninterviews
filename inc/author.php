<?php
function kundeninterviews_add_meta_tags_to_author_page()
{
    if (is_admin()) {
        return;
    }
    if (is_author()) {
        echo '<meta name="robots" content="noindex">' . PHP_EOL;
    }
}

add_action('wp_head', 'kundeninterviews_add_meta_tags_to_author_page', 10);
