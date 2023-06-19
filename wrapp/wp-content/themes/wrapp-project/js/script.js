
$(document).ready(function(){
	$('.single-item').slick({
    
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: true,
		arrows: false,
		// autoplay: true,
		autoplaySpeed: 3000,
		fadeSpeed: 1000,
	   
	  });
	
	  $('[data-fancybox="gallery"]').fancybox({
		// Options will go here
	});

	$(window).scroll(function(){
		if($(window).scrollTop() >= 1000){
			$('.brainstorm .brain-text .btn, .afternav-section .btn, .growfast .grow-top .btn, .multi-images .btn, .brainstorm-now .btn').addClass('animated infinite bounce');
		} else {  
		}
		if($(window).scrollTop() >= 1200) {
			$('.content-box .content-1 figure').addClass('animated infinite animate__zoomIn');

		}
	});
});
