<?php 

if(get_field('uniq_id')){
        $unique_id = get_field('uniq_id');
        }
        else{
            $unique_id = uniqid('ArtTitel_') ;
        }

?>
<?php if($title = get_field('title')){ ?>
<section class="ArtTitel" id="<?php echo $unique_id ?>" data-title="<?php echo $title ?>">
	<div class="ArtTitelContent">
		<?php echo $title ?>
	</div>
</section>
<?php } ?>