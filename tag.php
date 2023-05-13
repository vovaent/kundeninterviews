<?php
/**
 * The template for displaying tag pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kundeninterviews
 */

get_header();

$tag_id       = get_queried_object()->term_id;
$number_cards = 15;

$args = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'tag_id'         => $tag_id,
	'posts_per_page' => $number_cards,
);

$myquery       = new WP_Query( $args );
$max_num_pages = $myquery->max_num_pages;

$tag_cta     = get_field( 'cta', 'term_' . $tag_id );
$cta_on      = $tag_cta ? 'on' : '';
$full_cta_on = $tag_cta ? 'on' : '';
?>

<main id="primary" class="site-main">
	<div class="container">
		<div class="Category">
		<h1 class="CategoryTitle">
				<?php the_archive_title(); ?>
				</h1>

				<div class="CategoryPosts">
					
				</div>
			
				<div class="CategoryPagination">
					<div class="CategoryPaginationPrew">
						<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7 1L2 6L7 11" stroke="black" stroke-width="2"/>
						</svg>
					</div>
					<div class="CategoryPaginationNumber">
					
					</div>
					<div class="CategoryPaginationNext">
						<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 1L6 6L1 11" stroke="black" stroke-width="2"/>
						</svg>
					</div>
				</div>
			
				<div class="CategoryCloud">
					<div class="CategoryCloudTitle">
						<?php echo esc_html__( 'Tag-Cloud', 'kundeninterviews' ); ?>
					</div>
					<?php if ( $tags = get_tags( array( 'hide_empty' => false ) ) ) { ?>
					<div class="CategoryCloudTags">
						<?php foreach ( $tags as $item ) { ?>
							<div class="CategoryCloudTagsItem" data-tagid="<?php echo $item->term_id; ?>" onClick="location.href='<?php echo get_tag_link( $item ); ?>'">
								<?php echo $item->name; ?>
							</div>
						<?php } ?>
					</div>
					<?php } ?>
				</div>	
			
			<style>
				.CategoryPosts .MediumArticle{
						width: calc(100%/3 - 16px);
					}
				
				.CategoryPosts .CTAMedium {
					width: calc(100%/3 - 16px);
				}
			</style>
			
			<script>
				$(document).ready(function() {
					var page = 1;
					
					function render_pagination(page){
						$('.CategoryPaginationNumber').empty();
						var i = 1;
						var max_num_pages = <?php echo esc_js( $max_num_pages ); ?>;
						console.log(max_num_pages);

						if(max_num_pages > 5){
							if(page > 1){
								$('.CategoryPaginationNumber').append('<div>...</div>')	
							}
							while(i <= page+1){
								if(i <= page+1 && i >= page ){
									if(i == page){
										$('.CategoryPaginationNumber').append('<div class="CategoryPaginationNumberItem this-page" data-num="'+i+'">'+i+'</div>')
									}else{
										$('.CategoryPaginationNumber').append('<div class="CategoryPaginationNumberItem" data-num="'+i+'">'+i+'</div>')	
									}
								}
								i++;
							}
							
							if(page+2 >= max_num_pages-1 || page >= max_num_pages-1 ){
								
							}else{
								$('.CategoryPaginationNumber').append('<div>...</div>')
							}
							
							while(i <= max_num_pages){
								if( i >= max_num_pages-1){
									if(i == page){
									$('.CategoryPaginationNumber').append('<div class="CategoryPaginationNumberItem this-page" data-num="'+i+'">'+i+'</div>')
									}else{
										$('.CategoryPaginationNumber').append('<div class="CategoryPaginationNumberItem" data-num="'+i+'">'+i+'</div>')	
									}
								}
								i++;
							}
							
							
						}else{
							while(i <= max_num_pages){
								if(i == page){
									$('.CategoryPaginationNumber').append('<div class="CategoryPaginationNumberItem this-page" data-num="'+i+'">'+i+'</div>')
								}else{
									$('.CategoryPaginationNumber').append('<div class="CategoryPaginationNumberItem" data-num="'+i+'">'+i+'</div>')	
								}
								
								i++;
							}
						}
						
						if(page <= 1){
							$('.CategoryPaginationPrew').addClass('inactive');
							$('.CategoryPaginationNext').removeClass('inactive');
						}else if(page >= max_num_pages){
							$('.CategoryPaginationNext').addClass('inactive');
							$('.CategoryPaginationPrew').removeClass('inactive');
						}else{
							$('.CategoryPaginationPrew, .CategoryPaginationNext').removeClass('inactive');	 
						}
					}
					
					render_pagination(page);
					
					function card_load(page){
						$.ajax({
							type: 'POST',
							url: frontendajax.ajaxUrl,
							data: {
								action: 'kundeninterviews_card_load',
								nonce: frontendajax.nonce,
								tag_ids: '<?php echo esc_js( $tag_id ); ?>',
								card_type: 'medium',
								q_posts: '<?php echo esc_js( $number_cards ); ?>',
								paged: page,
								cta_on: '<?php echo esc_js( $cta_on ); ?>',
								full_cta_on: '<?php echo esc_js( $full_cta_on ); ?>',
								cta_content: <?php echo wp_json_encode( $tag_cta ); ?>,
								number_row: 3,
							},
							success: function (res) {
								
								$('.CategoryPosts').empty();
								$('.CategoryPosts').append(res);
							}
						});
					}
					
					card_load(page);
					
					$('body').on('click', '.CategoryPaginationNumberItem:not(.this-page)',function(){
						
						page = $(this).data('num');
						render_pagination(page);
						card_load(page);
					})
					
					$('body').on('click', '.CategoryPaginationPrew',function(){
						
						if(page - 1 > 0){
						page = page - 1;
						render_pagination(page);
						card_load(page);
						}
					})
					
					$('body').on('click', '.CategoryPaginationNext',function(){
						if(page + 1 <= <?php echo $max_num_pages; ?>){
						page = page + 1;
						render_pagination(page);
						card_load(page);
						}
					})
				});
			</script>

		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
