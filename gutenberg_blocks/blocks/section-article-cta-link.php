<?php 

if(get_field('uniq_id')){
        $unique_id = get_field('uniq_id');
        }
        else{
            $unique_id = uniqid('ArtCTA_') ;
        }

?>
<?php if($link = get_field('link')){ ?>
<section class="ArtCTALink" id="<?php echo $unique_id ?>" >
	<a href="<?php echo $link['url'] ?>"><?php echo $link['title'] ?></a>
</section>
<?php } ?>
