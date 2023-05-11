<?php 

if(get_field('uniq_id')){
        $unique_id = get_field('uniq_id');
        }
        else{
            $unique_id = uniqid('ArtList_') ;
        }

?>

<section class="ArtList" id="<?php echo $unique_id ?>">
	<?php if($title = get_field('title')){ ?>
	<div class="ArtListTitle">
		<?php echo $title ?>
	</div>
	<?php } ?>
	<?php $type_list = get_field('type');
		if($list = get_field('list')){ ?>
	<div class="ArtListContent">
		<?php $i = 1;
			foreach($list as $item){ ?>
			<div class="ArtListContentItem">
				<?php if($type_list == 'num'){ ?>
				<div class="ArtListContentItemNum">
					<?php echo $i ?>
				</div>
				<?php } ?>
				<?php if($type_list == 'ol'){ ?>
				<div class="ArtListContentItemOl">
					<svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle cx="4" cy="4" r="3.5" stroke="black"/>
					</svg>
				</div>
				<?php } ?>
				<div class="ArtListContentItemText">
					<?php echo $item['text'] ?>
				</div>
			</div>
		<?php $i++; } ?>
	</div>
	<?php } ?>
</section>
