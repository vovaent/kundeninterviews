<?php 

if(get_field('uniq_id')){
        $unique_id = get_field('uniq_id');
        }
        else{
            $unique_id = uniqid('ArtSlider_') ;
        }

?>
<?php if($galery = get_field('galery')){ ?>
<section class="ArtSlider" id="<?php echo $unique_id ?>" >
	<div class="ArtSliderContent ">
		<div class="swiper-button-prev ArtSliderButton"> 
			<svg width="19" height="33" viewBox="0 0 19 33" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M17.5 1L1.5 16.5L17.5 32" stroke="black" stroke-width="1.5"/>
			</svg>
		</div>
		<div class="Swiper">
			<div class="swiper-wrapper ArtSliderWrapper"> 
				<?php foreach($galery as $item){ ?>
					<?php if($item['type'] == 'image'){ ?>
					<div class="swiper-slide ArtSliderImage"> 
					  <img src="<?php echo $item['url'] ?>" alt="">  
					</div>
					<?php } ?>
					<?php if($item['type'] == 'video'){ ?>
						<div class="swiper-slide ArtSliderImage"> 
							<img src="<?php echo $item['url'] ?>" alt="">  
						  	<video controls>
								<source src="<?php echo $item['url'] ?>" type="video/webm">
								
							</video>
                        </div>
						<?php } ?>
					<?php } ?>
			</div>
		</div>
  		<div class="swiper-button-next ArtSliderButton"> 
			<svg width="19" height="33" viewBox="0 0 19 33" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M1.5 1L17.5 16.5L1.5 32" stroke="black" stroke-width="1.5"/>
			</svg> 
		</div>	
	</div>
</section>

<script>
	$(function(){
		const swiper = new Swiper('#<?php echo $unique_id ?> .Swiper', {
		  speed: 400,
		  spaceBetween: 100,
		  grabCursor: true,
		  navigation: {
			nextEl: '#<?php echo $unique_id ?> .swiper-button-next',
			prevEl: '#<?php echo $unique_id ?> .swiper-button-prev',
		  }
		});
	})
</script>


<?php } ?>
