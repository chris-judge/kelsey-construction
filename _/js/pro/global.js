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
//--- Ready ---//
$(document).ready(function() {

	//Optmize Hero
	imgOp();

});
//--- Ready ---//
//--- Scroll ---//
$(document).scroll(function(event) {

});
//--- Scroll ---//