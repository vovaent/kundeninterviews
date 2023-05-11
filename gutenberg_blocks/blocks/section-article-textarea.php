<?php 

if(get_field('uniq_id')){
        $unique_id = get_field('uniq_id');
        }
        else{
            $unique_id = uniqid('ArtTextarea_') ;
        }

?>
<?php if($textarea = get_field('textarea')){ ?>
<section class="ArtTextarea" id="<?php echo $unique_id ?>" >
	<div class="ArtTextareaContent">
		<?php echo $textarea ?>
	</div>
</section>
<?php } ?>