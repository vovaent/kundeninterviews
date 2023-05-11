<?php 

if(get_field('uniq_id')){
        $unique_id = get_field('uniq_id');
        }
        else{
            $unique_id = uniqid('ArtHighlights_') ;
        }

?>

<section class="ArtHighlights" id="<?php echo $unique_id ?>" >
	<div class="ArtHighlightsContent">
		<?php if($image = get_field('image')){ ?>
		<div class="ArtHighlightsContentImage">
			<img src="" alt="">
		</div>
		<?php }else{ ?>
		<div class="ArtHighlightsContentImage">
			<img src="<?php echo(get_template_directory_uri() . '/img/Highlights.png') ?>" alt="Highlights">
		</div>
		<?php } ?>
		<?php if($text = get_field('text')){ ?>
		<div class="ArtHighlightsContentText">
			<?php echo $text ?>
		</div>
		<?php } ?>
	</div>
</section>
