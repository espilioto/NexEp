//I'll leave that here for historical reasons

var $root = $('html, body');

$('a').click(function(){
    $('html, body').animate({
        scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
    }, 500);
    return false;
});

$(function() {
	$.scrollify({
		section : ".scrollhere",
		sectionName:false,
		interstitialSection : ".footer",
		easing: "easeOutExpo",
		scrollSpeed: 1100,
		offset : 0,
		scrollbars: false,
		standardScrollElements: "",
		setHeights: true,
		overflowScroll: true
	});
});

// $( document ).ready(function() {

// });