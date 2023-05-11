<?php 

if(get_field('uniq_id')){
        $unique_id = get_field('uniq_id');
        }
        else{
            $unique_id = uniqid('MultiArticles_') ;
        }


	if( get_field('artikel_on')=='on' ){
		if($artikel = get_field('artikel')){
		$posts = $artikel;
		}else{
		$posts = array();
		}
	}else{
		$posts = array();
	}
	
	if( get_field('category_on')=='on'){
		if($category = get_field('category')){
		$categories = $category;
		}else{
		$categories = array();
		}
	}else{
		$categories = array();
	}
	
	if(get_field('tags_on')=='on'){
		if($tags = get_field('tags')){
		$tags = $tags;
		}else{
		$tags = array();
		}
	}else{
		$tags = array();
	}

?>

<section class="MultiArticles" id="<?php echo $unique_id ?>">
	<div class="container">
		<?php if($title = get_field('title')){ ?>
			<div class="MultiArticlesTitle">
				<?php echo $title ?>
			</div>
		<?php } ?>
		<div class="MultiArticlesContant">
			
		</div>
	</div>
</section>
<?php if($number_row = get_field('number_row')){ ?>
<style>
	<?php if(get_field('card_type') == 'medium'){ ?>
	#<?php echo $unique_id ?> .MediumArticle{
		width: calc(100%/<?php echo $number_row ?> - 16px);
	}
	<?php if($number_row == 4){ ?>
	#<?php echo $unique_id ?> .MediumArticle{
		background-color: #CCF3EA;
	}
	
	#<?php echo $unique_id ?> .MediumArticle:nth-child(2n){
	background-color: #fff;
	}
	
	#<?php echo $unique_id ?> .MediumArticle .MediumArticleBottomDescription{
		display: none;
	}
	
	#<?php echo $unique_id ?> .MediumArticle .MediumArticleBottom{
		padding: 16px;
	}
	
	#<?php echo $unique_id ?> .CTAMedium{
		padding: 16px;
	}
	
	#<?php echo $unique_id ?> .CTAMedium .CTAMediumDescription{
		font-size: 20px;
	}
	
	<?php } ?>
	
	
	#<?php echo $unique_id ?> .CTAMedium{
		width: calc(100%/<?php echo $number_row ?> - 16px);
	}
	<?php } ?>
</style>
<?php } ?>

<script>
	<?php if( get_field('artikel_on')=='on' ){ ?>
	var posts = '<?php echo(implode("," , $posts)); ?>';
	<?php }else{ ?>
	var posts = '';
	<?php } ?>
	<?php if( get_field('category_on')=='on'){ ?>
	var categories = '<?php echo(implode("," , $categories)); ?>';
	<?php }else{ ?>
	var categories = '';
	<?php } ?>	
	<?php if(get_field('tags_on')=='on'){ ?>
	var tags = '<?php echo(implode("," , $tags)); ?>';
	<?php }else{ ?>
	var tags = '';
	<?php } ?>
	function card_load(paged){
		
		
		
		$.ajax({
			type: 'POST',
			url: '/wp-admin/admin-ajax.php',
			data: {
			  action: 'kundeninterviews_card_load',
			  categories: categories,
			  tags: tags,
			  card_type: '<?php echo get_field('card_type') ?>',
			  posts: posts,
			  q_posts: <?php echo get_field('count') ?>,
			  paged: paged,
			  show_more: '<?php echo get_field('show_more') ?>',
			  cta_on:'<?php echo get_field('cta_on') ?>',
			  cta_content: <?php echo json_encode(get_field('cta')) ?>,
			  number_row: <?php echo get_field('number_row') ?>	
			},
			success: function (res) {
				$('#<?php echo $unique_id ?> #show_more').remove();
				$('#<?php echo $unique_id ?> .MultiArticlesContant').append(res);
				
			}
		  });
	}
	var page = 1;
    card_load(page);
	
	$('#<?php echo $unique_id ?> .MultiArticlesContant').on('click', '#show_more' , function(e){
		page = page + 1;
		card_load(page);
	})
	
	

</script>
