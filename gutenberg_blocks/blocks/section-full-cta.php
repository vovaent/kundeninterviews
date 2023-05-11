<?php 

if(get_field('uniq_id')){
        $unique_id = get_field('uniq_id');
        }
        else{
            $unique_id = uniqid('FullCTA_') ;
        }

?>


<section class="FullCTA" id="<?php echo $unique_id ?>">
	<div class="container">
		<div class="FullCTAContent">
			<div class="FullCTAContentImage">
				<img src="<?php echo(get_template_directory_uri() . '/img/FullCTA.svg') ?>" alt="">
			</div>
			<?php if($description = get_field('description')){ ?>
			<div class="FullCTAContentDescription">
				<?php echo $description ?>
			</div>
			<?php } ?>
			<?php if($button = get_field('button')){ ?>
			<div class="FullCTAContentButton" onClick="location.href='<?php echo $button['url'] ?>'">
				<?php echo $button['title'] ?>
			</div>
			<?php } ?>
		</div>
	</div>
</section>