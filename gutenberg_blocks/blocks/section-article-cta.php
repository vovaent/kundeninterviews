<?php 

if(get_field('uniq_id')){
        $unique_id = get_field('uniq_id');
        }
        else{
            $unique_id = uniqid('ArtCTA_') ;
        }

?>

<section class="ArtCTA" id="<?php echo $unique_id ?>" >
	<div class="ArtCTAIcon Mobile">
		<img src="<?php echo(get_template_directory_uri() . '/img/CTALikeMobile.png') ?>" alt="">
	</div>
	<div class="ArtCTAImage">
		<img src="<?php echo(get_template_directory_uri() . '/img/FullCTA.png') ?>" alt="">
	</div>
	<div class="ArtCTAImage Mobile">
		<img src="<?php echo(get_template_directory_uri() . '/img/FullCTAMobile.png') ?>" alt="">
	</div>
	<div class="ArtCTAContent">
		<?php if($description = get_field('description')){ ?>
		<div class="ArtCTAContentDescription">
			<?php echo $description ?>
		</div>
		<?php } ?>
		<?php if($button = get_field('button')){ ?>
		<a class="ArtCTAContentButton" href="<?php echo $button['url'] ?>">
			<?php if($button['title']){ 
			echo $button['title'];
			 	  }else{ ?>
			Hier klicken
			<?php } ?>
		</a>
		<?php } ?>
	</div>
</section>
