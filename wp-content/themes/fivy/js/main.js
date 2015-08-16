/*-----------------------------------------------------------------------------------*/
/* 		Mian Js Start 
/*-----------------------------------------------------------------------------------*/
$(document).ready(function($) {
"use strict"
/*-----------------------------------------------------------------------------------*/
/*    STICKY NAVIGATION
/*-----------------------------------------------------------------------------------*/
$(".sticky").sticky({topSpacing:0});
/*-----------------------------------------------------------------------------------*/
/*  ISOTOPE PORTFOLIO
/*-----------------------------------------------------------------------------------*/
var $container = $('.portfolio-wrapper .items');
   $container.imagesLoaded(function () {
   $container.isotope({
   itemSelector: '.item',
   layoutMode: 'fitRows'
  });
});
$('.filter li a').click(function () {
   $('.filter li a').removeClass('active');
   $(this).addClass('active');
   var selector = $(this).attr('data-filter');
   $container.isotope({
   filter: selector
   });
   return false;
});
/*-----------------------------------------------------------------------------------*/
/* 	MENU
/*-----------------------------------------------------------------------------------*/
$().ownmenu();
/*-----------------------------------------------------------------------------------*/
/* 	FLEX SLIDER
/*-----------------------------------------------------------------------------------*/
$('.flexslider').flexslider({
    animation: "fade",
	slideshow: true,                //Boolean: Animate slider automatically
    slideshowSpeed: 6000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
    animationSpeed: 500,            //Integer: Set the speed of animations, in milliseconds
	autoPlay : true
});
/*-----------------------------------------------------------------------------------*/
/* 	WOW ANIMATION
/*-----------------------------------------------------------------------------------*/
var wow = new WOW({
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       10,          // distance to the element when triggering the animation (default is 0)
    mobile:       false,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    callback:     function(box) {
}});
wow.init();
/*-----------------------------------------------------------------------------------*/
/*    Parallax
/*-----------------------------------------------------------------------------------*/
jQuery.stellar({
    horizontalScrolling: false,
    scrollProperty: 'scroll',
    positionProperty: 'position'
});
/*-----------------------------------------------------------------------------------*/
/*    BANNER SLIDER
/*-----------------------------------------------------------------------------------*/
$(".bnr-itms").owlCarousel({ 
    autoPlay: 5000, //Set AutoPlay to 6 seconds 
    items : 1,
	singleItem	: true,
    navigation : true, // Show next and prev buttons
	pagination : false,
	navigationText: ["<i class='fa fa-angle-up'></i>","<i class='fa fa-angle-down'></i>"]
});
/*-----------------------------------------------------------------------------------*/
/*    Feature Slider
/*-----------------------------------------------------------------------------------*/
$('.today-top').owlCarousel({
    loop:true,
	autoPlay: 6000, //Set AutoPlay to 6 seconds 
    items : 4,
    margin:30,
	navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:4,
            nav:true,
            loop:false
        }}
	});
});
/*-----------------------------------------------------------------------------------*/
/*    Feature Slider
/*-----------------------------------------------------------------------------------*/
$(".fea-cate").owlCarousel({ 
    autoPlay: 6000, //Set AutoPlay to 6 seconds 
    items : 4,
	margin:30,
	responsiveClass:true,
	navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:4,
            nav:true,
            loop:false
        }
}});
/*-----------------------------------------------------------------------------------*/
/*    CONTACT FORM
/*-----------------------------------------------------------------------------------*/
function checkmail(input){
  var pattern1=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  	if(pattern1.test(input)){ return true; }else{ return false; }}     
    function proceed(){
    	var name = document.getElementById("name");
		var email = document.getElementById("email");
		var company = document.getElementById("company");
		var web = document.getElementById("website");
		var msg = document.getElementById("message");
		var errors = "";
		  if(name.value == ""){ 
		  	name.className = 'error';
		  return false;}    
		  else if(email.value == ""){
		  email.className = 'error';
		  return false;}
		    else if(checkmail(email.value)==false){
		        alert('Please provide a valid email address.');
		        return false;}
		    else if(company.value == ""){
		        company.className = 'error';
		        return false;}
		   else if(web.value == ""){
		        web.className = 'error';
		        return false;}
		   else if(msg.value == ""){
		        msg.className = 'error';
		        return false;}
		   else 
		  {
    	$.ajax({
			type: "POST",
			url: "submit.php",
			data: $("#contact_form").serialize(),
			success: function(msg){
			//alert(msg);
            if(msg){
                $('#contact_form').fadeOut(1000);
                $('#contact_message').fadeIn(1000);
                document.getElementById("contact_message");
            return true;
        }}
    });
}};






























