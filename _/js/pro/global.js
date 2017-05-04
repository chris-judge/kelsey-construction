//--- Variables ---//

//--- Variables ---//
// Hero Image Load
function imgOp(){
	if($(window).width() > 1024){
		$('.img-op').each(function(index, el) {
			var heroImg = $(this).attr('img-full');
			$(this).css('background-image','url('+heroImg+')');
			$(this).removeClass('img-op');
		});
	}else if($(window).width() <= 1024){
		$('.img-op').each(function(index, el) {
			var heroImg = $(this).attr('img-large');
			$(this).css('background-image','url('+heroImg+')');
			$(this).removeClass('img-op');
		});
	}
}


//Wheel
function wheel(){
	if($('.timeline .wheel').length){
		$('.wheel li').click(function(event) {
			event.preventDefault();
			if(!$(this).hasClass('active')){
				$('.wheel li.active').removeClass('active');
				$(this).addClass('active');
				$('.display .image-wrap').css('background-image', 'url('+$(this).attr('data-image')+')');
				$('.display h3').html('<span class="txt-orange">'+$(this).attr('data-year')+':</span> '+$(this).attr('data-headline')+'');
				$('.display p').html(''+$(this).attr('data-description')+'');
			}
		});
		$('.arrow').click(function(event) {
			event.preventDefault();
			if(!$(this).hasClass('hide')){
				if($(this).hasClass('up')){
					if(!$('.list-wrap li').first().hasClass('in')){
						$('.arrow.down.hide').removeClass('hide');
						$('.wheel .list-wrap').attr('data-scroll', ''+(parseInt($('.wheel .list-wrap').attr('data-scroll')) + 86)+'');
						$('.wheel .list-wrap').css('transform', 'translateY('+$('.wheel .list-wrap').attr('data-scroll')+'px)');
						$('.list-wrap .in').first().prev().addClass('in');
						$('.list-wrap .in').last().removeClass('in');
						if($('.list-wrap li').first().hasClass('in')){
							$('.arrow.up').addClass('hide');
						}
					}
				}else if($(this).hasClass('down')){
					if(!$('.list-wrap li').last().hasClass('in')){
						$('.arrow.up.hide').removeClass('hide');
						$('.wheel .list-wrap').attr('data-scroll', ''+(parseInt($('.wheel .list-wrap').attr('data-scroll')) - 86)+'');
						$('.wheel .list-wrap').css('transform', 'translateY('+$('.wheel .list-wrap').attr('data-scroll')+'px)');
						$('.list-wrap .in').first().removeClass('in');
						$('.list-wrap .in').last().next().addClass('in');
						if($('.list-wrap li').last().hasClass('in')){
							$('.arrow.down').addClass('hide');
						}
					}
				}
			}
		});
	}
}


//Map
function map(){
	if($('.map-container').length){
		$('.map-container')
			.click(function(){
					$(this).find('iframe').addClass('clicked')})
			.mouseleave(function(){
					$(this).find('iframe').removeClass('clicked')});
	}
}


//Nav

function nav(){
	$('.nav-btn .ham').click(function(event) {
		$(this).toggleClass('open');
		$('nav').toggleClass('active');
	});
}
//--- Ready ---//
$(document).ready(function() {

	//Optmize Hero
	imgOp();

	//Wheel Init
	wheel();

	//Map
	map();

	//Nav
	nav();

});
//--- Ready ---//
//--- Scroll ---//
$(document).scroll(function(event) {

});
//--- Scroll ---//