/****  =====  Dropdown Menu On mobile  =====  ***** */

AOS.init({ once: true });

$('<span></span>').insertAfter('.offcanvas-body .menu-item-has-children .sub-menu')
$(document).on("click", ".menu-item-has-children span", function (event) {

	event.preventDefault();
	$(this).parent().children('.sub-menu').slideToggle();

});


$('#testimonal_slider').owlCarousel({
	items: 1,
	loop: true,
	margin: 10,
	navRewind: false,
	nav: true,
	dots: false,
// 	center: false,
	autoplay: true,
	autoplayTimeout: 2000,
	smartSpeed: 600,
	touchDrag: false,
	mouseDrag: false,

});

$('#testimonal_slider .owl-next').html('<img src="'+root_url+'/assets/images/arrow_right.svg" alt="img">');
$('#testimonal_slider .owl-prev').html('<img src="'+root_url+'/assets/images/arrow_right.svg" alt="img">');



$('#blog_slider').owlCarousel({
    margin:20,
    loop:true,
    autoWidth:true,
    items:4,
	autoplay: true,
	autoplayTimeout: 2000,
	smartSpeed: 600,
})

let blog_head = document.querySelector('.our_blog_wrap .container h3');
let blog_slider = document.querySelector('#blog_slider');
if(blog_head && blog_slider){
	let pad_left_val = (blog_head.offsetParent.offsetLeft + 15);
	blog_slider.style.paddingLeft = `${pad_left_val}px`;
}

window.onscroll = function(){
	let header = document.querySelector('header');
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    	header.classList.add('scrolled');
  	} else {
    	header.classList.remove('scrolled');
  	}
	
	if(blog_head && blog_slider){
		pad_left_val = (blog_head.offsetParent.offsetLeft + 15);
		blog_slider.style.paddingLeft = `${pad_left_val}px`;
	}
		
}





















