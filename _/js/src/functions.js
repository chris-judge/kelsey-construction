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

//Wheel mobile
function wheelMobile(){
	if($('.timeline .wheel').length){
		if($(window).width() <= 1024 && $('.display').length == 1){
			$('.wheel li').each(function(index, el) {
				if(index == 0){
					$('.display .image-wrap').css('background-image', 'none');
					$('.display .image-wrap').append('<img src="'+$(this).attr('data-image')+'"" alt="'+$(this).attr('data-headline')+'"/>');
					$('.display h3').html('<span class="txt-orange">'+$(this).attr('data-year')+':</span> '+$(this).attr('data-headline')+'');
					$('.display p').html(''+$(this).attr('data-description')+'');
				}else{
					$('.display.original').clone().addClass('display'+index+'').removeClass('original').appendTo('.timeline .flex');
					$('.display'+index+' .image-wrap').css('background-image', 'none');
					$('.display'+index+' .image-wrap img').attr({ src: $(this).attr('data-image'), alt: $(this).attr('data-headline') });
					$('.display'+index+' h3').html('<span class="txt-orange">'+$(this).attr('data-year')+':</span> '+$(this).attr('data-headline')+'');
					$('.display'+index+' p').html(''+$(this).attr('data-description')+'');
				}
			});
			$('.wheel li.active').removeClass('active');
		}else if($(window).width() > 1024 && $('.display').length > 1){
			$('.display').each(function(index, el) {
				if(!$(this).hasClass('original')){
					$(this).remove();
				}
			});
			$('.display img').remove();
			$('.wheel li').first().click();
		}
	}
}


//Map
function map(){
	if($('.map-container').length){
		$('.map-container')
			.click(function(){
					$(this).find('.wpgmza_map').addClass('clicked')})
			.mouseleave(function(){
					$(this).find('.wpgmza_map').removeClass('clicked')});
	}
}


//Nav
function nav(){
	$('.nav-btn .ham').click(function(event) {
		$(this).toggleClass('open');
		$('nav').toggleClass('active');
	});
}


//Nav Hide Init
function navHide(){
	setInterval(function() {
	  if (didScroll) {
	    hasScrolled();
	    didScroll = false;
	  }
	}, 250);
}


//Check Nav Scroll
function hasScrolled() {
    var st = $(this).scrollTop();
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('header').removeClass('nav-down').addClass('nav-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('header').removeClass('nav-up').addClass('nav-down');
        }
    }
    
    lastScrollTop = st;
}


//Hero slider
function heroSlider(){
	$('.slider-dots .dot').click(function(event) {
		$('.slider-dots .dot.active').removeClass('active')
		$('.slides .slide.active').removeClass('active');

		$(this).addClass('active');
		$('.slides .slide[data-index="'+$(this).attr('data-index')+'"]').addClass('active');

		if($(window).width() > 1024){
			$('.slides .slide[data-index="'+$(this).attr('data-index')+'"]').each(function(index, el) {
				var heroImg = $(this).attr('img-full');
				$(this).css('background-image','url('+heroImg+')');
				$(this).removeClass('img-op');
			});
		}else if($(window).width() <= 1024){
			$('.slides .slide[data-index="'+$(this).attr('data-index')+'"]').each(function(index, el) {
				var heroImg = $(this).attr('img-large');
				$(this).css('background-image','url('+heroImg+')');
				$(this).removeClass('img-op');
			});
		}
	});
}


//Reveals
function reveals(){
	if($('.rev').length > 0){
		$('.rev').each(function(index, el) {
			if(($(window).scrollTop() + ($(window).height()/3) * 2) > $(this).closest('section').offset().top){
				$(this).removeClass('rev');
				if($(this).hasClass('statistics')){
					counter();
				}
			}
		});
	}
}


//Counter
function counter(){
	$('.counter').each(function() {
	  var $this = $(this),
	      countTo = $this.attr('data-count');
	  
	  $({ countNum: $this.text()}).animate({
	    countNum: countTo
	  },

	  {

	    duration: 2000,
	    easing:'linear',
	    step: function() {
	      $this.text(Math.floor(this.countNum));
	    },
	    complete: function() {
	      $this.text(this.countNum);
	      //alert('finished');
	    }

	  });  
	  
	  

	});
}