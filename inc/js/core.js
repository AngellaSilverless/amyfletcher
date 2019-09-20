//@prepros-prepend magnific-popup.js
//@prepros-prepend owl.carousel.min.js

jQuery(document).ready(function( $ ) {

/* ADD CLASS ON LOAD*/

    $("html").delay(1500).queue(function(next) {
        $(this).addClass("loaded");

        next();
    });
 
//Smooth Scroll

    $('nav a, a.button, a.next-section').click(function(){
	    if($(this).attr('href') != "#") {
	        $('html, body').animate({
	            scrollTop: $( $(this).attr('href') ).offset().top -100
	        }, 500);
	        return false;
	    }
    });
    
/* LOAD MAP */
			
	if($("#bell-map-contact").length > 0 && JSON.parse($("#bell-map-contact").attr("points"))) {
	    var points = JSON.parse($("#bell-map-contact").attr("points"));
	    
        mapboxgl.accessToken = 'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';
        
		var map = new mapboxgl.Map({
		    container:  'bell-map-contact',
		    style:      'mapbox://styles/oke/cjvnw465y0bl91cmionu5nqmo',
		    center:     points.geometry.coordinates,
		    zoom:       11,
		    scrollZoom: false
		});
		
		map.addControl(new mapboxgl.NavigationControl(), 'bottom-right');
		
		var geocoder = new MapboxGeocoder({
			accessToken: mapboxgl.accessToken,
			marker: {
				color: 'grey'
			},
			countries: 'gb',
			mapboxgl: mapboxgl,
			flyTo: false
		});
		
		map.addControl(geocoder, 'top-left');
		
		var geojson = {
			type: 'FeatureCollection',
			features: [points]
		};
		
		var coorPoints = [];
		
		geojson.features.forEach(function(marker) {

			var el = document.createElement('div');
			el.className = 'marker';
			
			new mapboxgl.Marker(el)
				.setLngLat(marker.geometry.coordinates)
				.setPopup(new mapboxgl.Popup({ offset: 25 })
				.setHTML(
			    	'<div class="title">The Bell <span>at</span> Ramsbury</div>' +
			    	'<div class="address">' + marker.properties.address  + '</div>' +
			    	'<div class="phone">'   + marker.properties.phone    + '</div>' +
			    	'<div class="email">'   + marker.properties.email    + '</div>'))
				.addTo(map);
			
			el.addEventListener('click', function(e){
				position = marker.geometry.coordinates[1] - 0.0200;
				map.flyTo({
				    center: [marker.geometry.coordinates[0], position],
				    zoom: 11
			    });
			});
			
			coorPoints.push(new mapboxgl.LngLat(marker.geometry.coordinates[0], marker.geometry.coordinates[1]));
		});
		
		geocoder.on("result", function(e) {
			var distance = [];
			var searchPoint = new mapboxgl.LngLat(e.result.geometry.coordinates[0], e.result.geometry.coordinates[1]);
			
			coorPoints.forEach(function(markerPoint) {
				distance.push({
					'point': markerPoint,
					'distance': distanceBetweenPoints(searchPoint, markerPoint)
				});
			});
			
			var minDistance = distance.reduce(function(prev, curr) {
			    return prev.distance < curr.distance ? prev : curr;
			});
			
			var bounds = new mapboxgl.LngLatBounds();

			bounds.extend(minDistance.point);
			bounds.extend(searchPoint);
			
			map.fitBounds(bounds, { padding: 100 });
		});
		
		$(window).bind('mousewheel DOMMouseScroll', function(event) {
		    if(event.ctrlKey == true) {
		        map['scrollZoom'].enable();
		    }
		    else {
		        map['scrollZoom'].disable();
		    }
		});
		
		function distanceBetweenPoints(point1, point2) {
			var R = 6371e3; // metres
			var φ1 = point1.lat.toRadians();
			var φ2 = point2.lat.toRadians();
			var Δφ = (point2.lat-point1.lat).toRadians();
			var Δλ = (point2.lng-point1.lng).toRadians();
			
			var a = Math.sin(Δφ/2) * Math.sin(Δφ/2) +
			        Math.cos(φ1) * Math.cos(φ2) *
			        Math.sin(Δλ/2) * Math.sin(Δλ/2);
			var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
			
			var d = R * c;
			return d;
		}
		
		function getMiddlePoint(point1, point2) {
			var lat = (point1.lat + point2.lat) / 2;
			var lng = (point1.lng + point2.lng) / 2;
			return [lng, lat];
		}
		
		Number.prototype.toRadians = function() {
			return this * Math.PI / 180;
		};
	}


// ========== Controller for lightbox elements
	
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
	
	$(".owl-carousel").each(function(gallery) {
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
	
	$('.single-image').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		image: {
			verticalFit: true,
		}
	});
 
// GLOBAL OWL CAROUSEL SETTINGS
    
    $(".owl-carousel").owlCarousel({
		margin: 0,
		autoWidth:true,
		items:4
    });

/* CLASS AND FOCUS ON CLICK */
    
    $(".menu-trigger").click(function() {
	    $(".menu-collapse").toggleClass("visible");
	    $(".current-menu-item").toggleClass("loaded");
	    $(".menu-trigger").toggleClass("opened");
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

});//Don't remove ---- end of jQuery wrapper
