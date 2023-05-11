// JavaScript Document

$(function(){
	//Position header Logo
	if($('body').width() >= 768){
	var W_Searh = $('#masthead .HeaderTopSearch').width();
	var W_Social = $('#masthead .HeaderTopSocial').width();
	$('#masthead .HeaderTopLogo').css({'left' : (W_Social - W_Searh) / 2 + 'px', 'visibility': 'visible'} );
	}else{
		$('.HeaderTopBurgerMenu').css({'height': 'calc(100vh - ' +$('.HeaderTop').height()+'px)'})
	}
	
	$('.HeaderTopBurger').click(function(){
				$(this).toggleClass('open');
				$('.HeaderTopBurgerMenu').toggleClass('open');
				if($('.HeaderTopBurgerMenu').hasClass('open')){
					$('body').css({'overflow': 'hidden'});
				}else{
					$('body').css({'overflow': ''});   
				}
			})
	
	
	$('body').on('click','a[href^="#"]', function (event) {
		event.preventDefault();
		var id  = $(this).attr('href'),
			top = $(id).offset().top;
		$('body,html').animate({scrollTop: top}, 1500);
	});
	
	
})