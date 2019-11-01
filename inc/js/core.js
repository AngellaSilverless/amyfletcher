//@prepros-prepend magnific-popup.js
//@prepros-prepend owl.carousel.min.js
 
jQuery(document).ready(function( $ ) {

/* Add class on load */

    $("html").delay(1500).queue(function(next) {
        $(this).addClass("loaded");

        next();
    });
 
/* Smooth scroll */

    $('nav a, a.button, a.next-section').click(function(){
	    if($(this).attr('href') != "#") {
	        $('html, body').animate({
	            scrollTop: $( $(this).attr('href') ).offset().top -100
	        }, 500);
	        return false;
	    }
    });

/* Magnific Popup */
	
	$(".gallery").each(function(gallery) {
		$(this).magnificPopup({
			delegate: 'a',
			type: 'image',
			closeOnContentClick: true,
			closeBtnInside: false,
			image: {
				verticalFit: true,
			},
			gallery: {
				enabled: true
			}
		});
	});
	
	/*$(".owl-carousel").each(function(gallery) {
		$(this).magnificPopup({
			delegate: 'a',
			type: 'image',
			closeOnContentClick: true,
			closeBtnInside: false,
			image: {
				verticalFit: true,
			},
			gallery: {
				enabled: true
			}
		});
	});
 
/* Owl carousel */
    
/*$(".owl-carousel").owlCarousel({
	margin: 0,
	autoWidth:true,
	items:4
});*/

    $('.large-carousel').owlCarousel({
        loop:true,
        nav:true,
    	    navClass: ['owl-prev', 'owl-next'],
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

/* Class and focus on click */

	$("#toggle-menu").click(function() {
		$("#main-menu").slideToggle();
        $('#nav').toggleClass('darker'); 
	});
    
    $(".read-more").click(function() {
	    $(this).prev().slideToggle();
	    $(this).text($(this).text() == "Read More" ? "Read Less" : "Read More");
    });
    
    $(".view-slideshow").click(function() {
	    $(".gallery__interior a").eq(0)[0].click();
    });
    
    $(".shop-items .item").click(function() {
	    $.ajax({
			type : "POST",
			dataType : "JSON",
			url : ajax_object.ajax_url,
			data : {
				action: "furniture_info",
				id: $(this).attr("furniture")
			},
			success: function(response) {
				if(response && response.success) {
				    $("#show-furniture .title").text(response.title);
				    $("#show-furniture .colour").text(response.colour);
				    $("#show-furniture .description p").text(response.description);
				    $("#show-furniture .image").css("background-image", "url(" + response.image + ")");
				    
				}
				
				$("#show-furniture").fadeIn();
			}
		});
    });
    
    $("#show-furniture .close").click(function() {
		$("#show-furniture").fadeOut();
	});
	
	if($("body").hasClass("page-template-shop")) {
		
		$(document).mouseup(function(e) {
			if($("#show-furniture").css("display") == "block") {
				var container = $(".product-info")
				if(!container.is(e.target) && container.has(e.target).length === 0) {
					$("#show-furniture .close")[0].click();
				}
			}
		});
	}
	
	$(".bespoke .item").click(function() {
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
		$(".bespoke-items .heading").text($(this).find(".label").text());
		$(".bespoke-items .brand-text p").text($(this).attr("description"));
	});

/* Nav background */

var nav = document.getElementById("nav");

document.addEventListener("scroll", (evt) => {
	let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
	if(scrollTop == 0)
		nav.classList.remove("scrolled");
	else
		nav.classList.add("scrolled");
}, { capture: false, passive: true})

// ========== Add class if in viewport on page load

	$.fn.isOnScreen = function(){
	    
	    var win = $(window);
	    
	    var viewport = {
	        top : win.scrollTop(),
	        left : win.scrollLeft()
	    };
	    viewport.right = viewport.left + win.width();
	    viewport.bottom = viewport.top + win.height();
	    
	    var bounds = this.offset();
	    bounds.right = bounds.left + this.outerWidth();
	    bounds.bottom = bounds.top + this.outerHeight();
	    
	    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	    
	};

	$('.slide-up, .slide-down, .slide-right, .slow-fade').each(function() {
		if ($(this).isOnScreen()) {
			$(this).addClass('active');    
		} 
	});

// ========== Add class on entering viewport

	$.fn.isInViewport = function() {
	var elementTop = $(this).offset().top;
	var elementBottom = elementTop + $(this).outerHeight();
	var viewportTop = $(window).scrollTop();
	var viewportBottom = viewportTop + $(window).height();
	return elementBottom > viewportTop && elementTop < viewportBottom;
	};
	
	$(window).on('resize scroll', function() {
		
		$('.slide-up, .slide-down, .slide-right, .slow-fade').each(function() {
			if ($(this).isInViewport()) {
				$(this).addClass('active');    
			} 
		});
	    
	});

// ===== Stop orphans on hero heading

/*
$(document).ready(function() {
    //Get last two words
    var headingBrand = $(".hero h1").text();
    var splitText = headingBrand.split(" ").splice(-2);
    splitText = '<span>' + splitText + '</span>';
    //Drop last two words

console.log(splitText);
//var headingBrand = $(".hero h1").replaceWith('<h1>' . headingBrand + splitText . '</h1>'); 
});

function wordCount(str){
    return str.split(" ").length;
}
var headingBrand = $(".hero h1").text();
console.log(wordCount(headingBrand));

var sample = $(".hero h1").text();
var words= sample.split(" ");
var lastStr = words.pop(); // removed the last.
var lastButStr= words.pop();
console.log(lastStr,lastButStr);
console.log(sample - lastStr, lastButStr);
*/
});//Don't remove ---- end of jQuery wrapper
