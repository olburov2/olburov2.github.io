/*ПЛАВНЫЙ СКРОЛЛИНГ К ЯКОРЮ*/

   
$(function(){
$('a[href^="#"]').click(function(){
var target = $(this).attr('href');
$('html, body').animate({scrollTop: $(target).offset().top}, 800);//800 - длительность скроллинга в мс
return false; 
}); 
});


/*АККОРДЕОН*/

$(document).ready(function(){
$('#accordion1-js').find('h2').click(function(){
$(this).next().stop().slideToggle(500);
}).next().stop().hide();
});


/*КНОПКА НАВЕРХ*/

var limit     = $(window).height()/3,
		$backToTop = $('#back-to-top');

	$(window).scroll(function () {
		if ( $(this).scrollTop() > limit ) {
			$backToTop.fadeIn();
		} else {
			$backToTop.fadeOut();
		}
	});
	
	// scroll body to 0px on click
	$backToTop.click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 1500);
		return false;
	});

