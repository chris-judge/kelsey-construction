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

//Project 
function projectSort(){
	$('.projects .cat-menu .btn').click(function(event) {
		$('.projects .cat-menu .btn.active').removeClass('active');
		$(this).addClass('active');

		if($(this).attr('data-cat') == $('.map-wrap').attr('data-cat') && !$('.map-wrap').hasClass('active')){
			$('.map-wrap').removeClass('hidden');
			if($(window).width() > 1024){
				$('.map-wrap').addClass('active').html($('.map-wrap').attr('data-iframe'));
			}else{
				$('.map-wrap').addClass('active');
			}
			getProjects($(this).attr('data-cat'));
		}else if($(this).attr('data-cat') == $('.map-wrap').attr('data-cat') && $('.map-wrap').hasClass('hidden')){
			$('.map-wrap').removeClass('hidden');
			getProjects($(this).attr('data-cat'));
		}else if($(this).attr('data-cat') != $('.map-wrap').attr('data-cat')){
			$('.map-wrap').addClass('hidden');
			getProjects($(this).attr('data-cat'));
		}

	});
}

//Lightbox
function lightBoxInit(){
	$('.light-box .close').click(function(event) {
		$('.projects .tile').removeClass('active');
		$('body,html').removeClass('lock');
		$('.light-box').removeClass('active');
		$('.light-box h2').html('');
		$('.light-box h3').html('');
		$('.light-box .image-wrap').attr('style', '');
		$('.light-box .description-wrap .text-wrap').html('');
	});

	$('.light-box .btn.prev').click(function(event) {
		if($('.projects .tile').last().hasClass('active')){
			$('.projects .tile.active').removeClass('active');
			$('.projects .tile').first().addClass('active');
			$('.projects .tile.active').click();
		}else{
			$('.projects .tile.active').removeClass('active').next().addClass('active');
			$('.projects .tile.active').click();
		}
	});

	$('.light-box .btn.next').click(function(event) {
		if($('.projects .tile').first().hasClass('active')){
			$('.projects .tile.active').removeClass('active');
			$('.projects .tile').last().addClass('active');
			$('.projects .tile.active').click();
		}else{
			$('.projects .tile.active').removeClass('active').prev().addClass('active');
			$('.projects .tile.active').click();
		}
	});

	$('.light-box .side.next').click(function(event) {
		if($('.light-box .img').last().hasClass('active')){
			$('.light-box .img.active').removeClass('active');
			$('.light-box .img').first().addClass('active');
		}else{
			$('.light-box .img.active').removeClass('active').next().addClass('active');
		}
	});
	$('.light-box .side.prev').click(function(event) {
		if($('.light-box .img').first().hasClass('active')){
			$('.light-box .img.active').removeClass('active');
			$('.light-box .img').last().addClass('active');
		}else{
			$('.light-box .img.active').removeClass('active').prev().addClass('active');
		}
	});
}

//Project Init
function projectInit(){

	$('.projects .tile').click(function(event) {
		$(this).addClass('active');
		$('body,html').addClass('lock');

		$('.light-box h2').html($(this).attr('data-title'));
		$('.light-box h3').html($(this).attr('data-location'));
		$('.light-box .image-wrap').append('<div class="img image-bg top active" style="background-image:url('+$(this).attr('data-img')+');"></div>')
		if($(this).find('.img').length > 1 && $(window).width() > 880){
			$('.light-box .side.hide').removeClass('hide');
			$(this).find('.img').each(function(index, el) {
				$('.light-box .image-wrap').append('<div class="img image-bg top" style="background-image:url('+$(this).attr("data-url")+');"></div>')
			});
		}else{
			$('.light-box .side').addClass('hide');
		}
		if($('.projects .tile').length <= 1){
			$('.light-box .btn.prev').addClass('hide');
			$('.light-box .btn.next').addClass('hide');
		}else{
			$('.light-box .btn.hide').removeClass('hide');
			$('.light-box .btn.hide').removeClass('hide');
		}
		$('.light-box .description-wrap .text-wrap').html($(this).find('.description').html());

		$('.light-box').addClass('active');
	});
}


//Get Projects
function getProjects(category){
	$('.projects .grid.flex').html('');
	$('.loader').addClass('active');
	console.log(category);
	if(category == 'All'){
		$.get(wpJSON+'projects', function(data) {
			$('.loader').removeClass('active');
			if(data.length > 0){
				$.each(data, function() {
					var elements = '<div class="tile txt-white" data-cat="'+this['categories'].toString()+'" data-title="'+this['title']['rendered']+'" data-location="'+this['acf']['location']+'" data-img="'+this['featured_image_src']+'">';
					elements += '<div class="image-bg top" style="background-image:url('+this['featured_image_src']+');">';
					elements += '<div class="overlay flex">';
					elements += '<div class="inner-wrap">';
					elements += '<h2>'+this['title']['rendered']+'</h2>';
					elements += '<h3>'+this['acf']['location']+'</h3>';
					elements += '<div class="dn description">'+this['content']['rendered']+'</div>';

					if(this['acf']['gallery_images']){
						elements += '<div class="gallery-images dn">'
						for (var i = 0; i < this['acf']['gallery_images'].length; i++) {
							elements += '<div class="img" data-url="'+this['acf']['gallery_images'][i]['image']+'"></div>'
						}
						elements += '</div>';
					}

					elements += '<div class="btn">View Project</div>';
					elements += '</div></div></div></div>';
					$('.projects .grid.flex').append(elements);
				});
			}else{
				var elements = '<h2 class="tac db">Sorry, no posts were found.</h2>';
			}
			$('.projects .grid.flex').append(elements);
			projectInit();

		});
	}else{
		$.get(wpJSON+'projects?categories='+category, function(data) {
			$('.loader').removeClass('active');
			if(data.length > 0){
				$.each(data, function() {
					var elements = '<div class="tile txt-white" data-cat="'+this['categories'].toString()+'" data-title="'+this['title']['rendered']+'" data-location="'+this['acf']['location']+'" data-img="'+this['featured_image_src']+'">';
					elements += '<div class="image-bg top" style="background-image:url('+this['featured_image_src']+');">';
					elements += '<div class="overlay flex">';
					elements += '<div class="inner-wrap">';
					elements += '<h2>'+this['title']['rendered']+'</h2>';
					elements += '<h3>'+this['acf']['location']+'</h3>';
					elements += '<div class="dn description">'+this['content']['rendered']+'</div>';

					if(this['acf']['gallery_images']){
						elements += '<div class="gallery-images dn">'
						for (var i = 0; i < this['acf']['gallery_images'].length; i++) {
							elements += '<div class="img" data-url="'+this['acf']['gallery_images'][i]['image']+'"></div>'
						}
						elements += '</div>';
					}

					elements += '<div class="btn">View Project</div>';
					elements += '</div></div></div></div>';
					$('.projects .grid.flex').append(elements);
				});
			}else{
				var elements = '<h2 class="tac db">Sorry, no posts were found.</h2>';
			}
			$('.projects .grid.flex').append(elements);
			projectInit();

		});
	}
}