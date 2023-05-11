<?php $cta_content = $args ?>

<div class="CardFullCTA" >
	<div class="CardFullCTAIcon Mobile">
		<img src="<?php echo(get_template_directory_uri() . '/img/CTALikeMobile.png') ?>" alt="">
	</div>
	<div class="CardFullCTAImage">
		<img src="<?php echo(get_template_directory_uri() . '/img/FullCTA.png') ?>" alt="">
	</div>
	<div class="CardFullCTAImage Mobile">
		<img src="<?php echo(get_template_directory_uri() . '/img/FullCTAMobile.png') ?>" alt="">
	</div>
	<div class="CardFullCTAContent">
		<?php if($description = $cta_content['description']){ ?>
		<div class="CardFullCTAContentDescription">
			<?php echo $description ?>
		</div>
		<?php } ?>
		<?php if($button = $cta_content['button']){ ?>
		<a class="CardFullCTAContentButton" href="<?php echo $button['url'] ?>">
			<?php if($button['title']){ 
			echo $button['title'];
			 	  }else{ ?>
			Hier klicken
			<?php } ?>
		</a>
		<?php } ?>
	</div>
</div>
