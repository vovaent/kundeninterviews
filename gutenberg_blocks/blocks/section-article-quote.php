<?php 

if(get_field('uniq_id')){
        $unique_id = get_field('uniq_id');
        }
        else{
            $unique_id = uniqid('ArtQuote_') ;
        }

?>

<section class="ArtQuote" id="<?php echo $unique_id ?>" >
	<div class="ArtQuoteIcon">
		<svg width="143" height="108" viewBox="0 0 143 108" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M141.454 1.2086L141.78 0.5H141H115.005H114.722L114.576 0.743046L94.5281 34.209C94.5273 34.2103 94.5265 34.2116 94.5257 34.2129C88.3318 44.1387 83.9822 52.225 81.4906 58.4637L81.4873 58.4718L81.4844 58.48C79.2397 64.7248 78.1127 70.733 78.1127 76.5017C78.1127 82.2881 79.4954 87.5821 82.2647 92.3731C85.0279 97.1532 88.6755 100.934 93.2058 103.707L93.2195 103.716L93.2337 103.723C98.0112 106.241 103.167 107.5 108.692 107.5C114.461 107.5 119.622 106.243 124.161 103.718L124.17 103.713L124.179 103.707C128.703 100.938 132.349 97.286 135.114 92.7552C137.887 88.2101 139.272 83.1602 139.272 77.6175C139.272 72.0772 137.888 67.148 135.11 62.8462C132.346 58.318 128.701 54.6676 124.179 51.8999C122.617 50.9442 120.982 50.1534 119.273 49.527L141.454 1.2086ZM63.8417 1.2086L64.167 0.5H63.3873H37.3926H37.1093L36.9637 0.743046L16.9129 34.2129C10.7191 44.1387 6.36942 52.225 3.87784 58.4637L3.8746 58.4718L3.87165 58.48C1.627 64.7248 0.5 70.733 0.5 76.5017C0.5 82.2881 1.88263 87.5821 4.652 92.3731C7.41516 97.1532 11.0628 100.934 15.5931 103.707L15.6068 103.716L15.621 103.723C20.3984 106.241 25.5539 107.5 31.0796 107.5C36.8486 107.5 42.0092 106.243 46.5481 103.718L46.5572 103.713L46.5661 103.707C51.09 100.938 54.7366 97.286 57.5011 92.7552C60.2743 88.2101 61.6591 83.1602 61.6591 77.6175C61.6591 72.0774 60.2755 67.1482 57.4978 62.8465C54.7337 58.3181 51.0882 54.6677 46.5661 51.8999C45.0047 50.9442 43.3694 50.1534 41.6608 49.527L63.8417 1.2086Z" fill="#19C79D" stroke="black"/>
		</svg>
	</div>
	<div class="ArtQuoteContent">
		<?php if($avatar = get_field('avatar')){ ?>
		<div class="ArtQuoteContentAvatar">
			<img src="<?php echo $avatar['url'] ?>" alt="<?php echo $avatar['alt'] ?>">
		</div>
		<?php } ?>
		<div class="ArtQuoteContentText">
			<?php if($name = get_field('name')){ ?>
			<div class="ArtQuoteContentTextName">
				<?php echo $name ?>
			</div>
			<?php } ?>
			<?php if($position = get_field('position')){ ?>
			<div class="ArtQuoteContentTextPosition">
				<?php echo $position ?>
			</div>
			<?php } ?>
			<?php if($text = get_field('text')){ ?>
			<div class="ArtQuoteContentTextArea">
				<?php echo $text ?>
			</div>
			<?php } ?>
		</div>
		
	</div>
	<?php if($text = get_field('text')){ ?>
		<div class="ArtQuoteArea Mobile">
			<?php echo $text ?>
		</div>
		<?php } ?>
</section>
