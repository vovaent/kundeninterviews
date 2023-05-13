<?php
/**
 * The tag pages actions and filters
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kundeninterviews
 */

/**
 * Remove all archive title prefixes.
 */
add_filter( 'get_the_archive_title_prefix', '__return_false' );
