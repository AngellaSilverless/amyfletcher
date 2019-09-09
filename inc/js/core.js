//@prepros-prepend jquery.magnific-popup.js
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

	$(".gallery").each(function() {
		$(this).find(".lightbox-gallery").magnificPopup({
	        type: 'image',
	        gallery:{
	            enabled:true
	        }
	    });
	});
    
    $('.single-image').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		mainClass: 'mfp-no-margins mfp-with-zoom',
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300
		}
	});
	
	$('.post-image a').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		mainClass: 'mfp-no-margins mfp-with-zoom',
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300
		}
	});
 
// GLOBAL OWL CAROUSEL SETTINGS

    $('.owl-carousel').owlCarousel({
        loop:true,
        autoplay:false,
        autoplayHoverPause:true,
        nav:true,
    	    navClass: ['owl-prev', 'owl-next'],
        responsive:{
            0:{
                items: 1
            },
            768: {
	            items: 2
            },
            992:{
                items: 3
            },
            1200: {
	            items: 4
            }
        }
    });

/* CLASS AND FOCUS ON CLICK */
    
    $(".menu-trigger").click(function() {
	    $(".menu-collapse").toggleClass("visible");
	    $(".current-menu-item").toggleClass("loaded");
	    $(".menu-trigger").toggleClass("opened");
    });
    
    $(".read-more").click(function() {
	    $(this).prev().slideToggle();
	    $(this).text($(this).text() == "Read more" ? "Read less" : "Read more");
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
