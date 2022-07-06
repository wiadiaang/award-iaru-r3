$(document).ready(function(){

	var swiper = new Swiper('.swiperHeader',{
		autoplay: {
			delay: 5000,
			disableOnInteraction: true,
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		navigation: {
	        nextEl: '.slide-next',
	        prevEl: '.slide-prev',
	    },

	});

});