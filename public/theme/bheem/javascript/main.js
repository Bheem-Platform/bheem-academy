(function($){
    (function($) {
        "use strict";

		$(document).ready(function() {

			$('.toggle-btn').click(function(){
				$('.offcanvas').toggleClass('open');
			});

			$('.edoo_navbar_user a.nav-link.d-inline-block.popover-region-toggle.position-relative').click(function(){
				$('.offcanvas').toggleClass('open');
			});
		
			// Close the offcanvas menu when clicking on the overlay
			$('.offcanvas-overlay').click(function(){
				$('.offcanvas').removeClass('open');
			});

			$('.mobile-navbar .float-right .notification-icon').click(function(){
				$('.offcanvas').removeClass('open');
			});
		
			// Close the offcanvas menu when clicking on a menu item (optional)
			$('.mobile-navbar .offcanvas-header .close-btn').click(function(){
				$('.offcanvas').removeClass('open');
			});

			$('#message-user-button .icon.iconsmall').replaceWith("<i class='bx bx-envelope'></i>");
			$('#toggle-contact-button .icon.iconsmall').replaceWith("<i class='bx bx-add-to-queue'></i>");

			// accordion
			$('.accordion-button').on('click', function () {
				const target = $(this).data('target');
		
				// Collapse other open accordions in the same container
				$(this)
					.closest('.accordion')
					.find('.accordion-collapse')
					.not(target)
					.slideUp()
					.prev('.accordion-button')
					.addClass('collapsed');
		
				// Toggle the current accordion
				$(target).slideToggle();
				$(this).toggleClass('collapsed');
			});
		});

		window.onload = function(){

			var current_site_url = $(".navbar-area .navbar-brand").attr("href");

			// Support Moodle MultiLang
			var langValue = $("html").attr("lang");
			$('.multilang').each(function(){
				var currentLangValue = $(this).attr("lang");
				if(langValue != currentLangValue) {
					$(this).addClass('d-none');
				}
			});
			
			if (current_site_url) {
				var site_urls = [
					'http://localhost:8888/moodle/edoo-4.5/',
				];
			
				// Loop through each site URL and replace it in href and src attributes
				site_urls.forEach(function (site_url) {
					if (current_site_url != site_url) {
						$('a').each(function () {
							var url = $(this).attr("href");
							if (url && url.includes(site_url)) {
								url = url.replace(site_url, current_site_url);
								$(this).attr('href', url);
							}
						});
			
						$('img').each(function () {
							var url = $(this).attr("src");
							if (url && url.includes(site_url)) {
								url = url.replace(site_url, current_site_url);
								$(this).attr('src', url);
							}
						});
					}
				});
			}

			$("body.role-standard:not(.path-contentbank):not(#page-contentbank) .bottom-region-main-box").each(function() {
                if (!$(this).find(".block").length && !$(this).find(".edoo-main").text().trim().length) {
                $(".bottom-region-main-box, .bottom-region-main-box #page-content").css({
                    'padding-top': '0',
                    'margin-top': '0',
                    'padding-bottom': '0px !important',
                });
                $(".edoo-main").remove();
                }
            });

            $(".dashbord_nav_list > a:first-child").prepend("<i class='bx bxs-dashboard' ></i>");
            $(".dashbord_nav_list > a:nth-child(2)").prepend("<i class='bx bx-user' ></i>");
            $(".dashbord_nav_list > a:nth-child(3)").prepend("<i class='bx bxs-graduation' ></i>");
            $(".dashbord_nav_list > a:nth-child(4)").prepend("<i class='bx bx-chat' ></i>");
            $(".dashbord_nav_list > a:nth-child(5)").prepend("<i class='bx bx-cog' ></i>");
            $(".dashbord_nav_list > a:nth-child(6)").prepend("<i class='bx bx-log-out' ></i>");
            $(".dashbord_nav_list > a:nth-child(7)").prepend("<i class='bx bx-user-plus' ></i>");
            $(".dashbord_nav_list > a:nth-child(8)").prepend("<i class='bx bx-log-out'></i>");
            $(".dashbord_nav_list > a").each(function() {
            $(this).removeClass("dropdown-item").wrap("<li></li>");
            });
            $(".dashbord_nav_list > li").wrapAll("<ul></ul>");

			// Header Sticky
			const getHeaderId = document.getElementById("navbar");
			if (getHeaderId) {
				window.addEventListener('scroll', event => {
					const height = 150;
					const { scrollTop } = event.target.scrollingElement;
					document.querySelector('#navbar').classList.toggle('sticky', scrollTop >= height);
				});
			}
			
			// Back to Top JS
			const getId = document.getElementById("backtotop");
			if (getId) {
				const topbutton = document.getElementById("backtotop");
				topbutton.onclick = function (e) {
					window.scrollTo({ top: 0, behavior: "smooth" });
				};
				window.onscroll = function () {
					if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
						topbutton.style.opacity = "1";
					} else {
						topbutton.style.opacity = "0";
					}
				};
			}

			// Preloader JS
			const getPreloaderId = document.getElementById('preloader');
			if (getPreloaderId) {
				getPreloaderId.style.display = 'none';
			}

			// Mixitup
			const getSortingId = document.getElementById('online-classes');
			if (getSortingId) {
				let mixer = mixitup('.online-classes', {
					controls: {
						toggleDefault: 'none'
					}
				});
			}

			// Background Images JS - Process data-background attributes
			// Find all elements with a "data-background" attribute
			var elements = document.querySelectorAll("[data-background]");

			// Loop through each element
			elements.forEach(function (element) {
				// Get the value of the "data-background" attribute
				var backgroundValue = element.getAttribute("data-background");

				// Set the "background-image" CSS property
				element.style.backgroundImage = "url(" + backgroundValue + ")";
			});
		};

		// ScrollCue JS
		scrollCue.init();

		// Banner Slide JS
		var swiper = new Swiper(".banner-slide", {
			slidesPerView: 1,
			spaceBetween: 0,
			centeredSlides: false,
			preventClicks: true,
			loop: true,
			autoplay: {
				delay: 8000,
				disableOnInteraction: false,
				pauseOnMouseEnter: true,
			},
			navigation: {
				nextEl: ".next",
				prevEl: ".prev",
			},
		});

		// Partner Slide JS
		var swiper = new Swiper(".partner-slide", {
			slidesPerView: 1,
			spaceBetween: 25,
			centeredSlides: false,
			preventClicks: true,
			loop: true, 
			autoplay: {
				delay: 3000,
				disableOnInteraction: false,
				pauseOnMouseEnter: true,
			},
			breakpoints: {
				0: {
					slidesPerView: 2,
				},
				576: {
					slidesPerView: 3,
				},
				768: {
					slidesPerView: 4,
				},
				992: {
					slidesPerView: 4,
				},
				1200: {
					slidesPerView: 5,
				},
				1440: {
					slidesPerView: 6,
				},
				1600: {
					slidesPerView: 6,
				},
			}
		});

		// Testimonial Slider JS
		var swiper = new Swiper(".testimonials-slide", {
			slidesPerView: 1,
			spaceBetween: 25,
			centeredSlides: true,
			preventClicks: true,
			loop: true, 
			autoplay: {
				delay: 8000,
				disableOnInteraction: false,
				pauseOnMouseEnter: true,
			},
			navigation: {
				nextEl: ".prev",
				prevEl: ".next",
			},
			breakpoints: {
				0: {
					slidesPerView: 1,
				},
				768: {
					slidesPerView: 1,
				},
				1199: {
					slidesPerView: 2,
				},
				1440: {
					slidesPerView: 3,
				},
				1600: {
					slidesPerView: 3,
				},
			}
		});

		// Testimonial Two Slider JS
		var swiper = new Swiper(".testimonials-slide-two", {
			slidesPerView: 1,
			spaceBetween: 25,
			centeredSlides: false,
			preventClicks: true,
			loop: true, 
			autoplay: {
				delay: 8000,
				disableOnInteraction: false,
				pauseOnMouseEnter: true,
			},
			navigation: {
				nextEl: ".prev",
				prevEl: ".next",
			},
			breakpoints: {
				0: {
					slidesPerView: 1,
				},
				768: {
					slidesPerView: 1,
				},
				1199: {
					slidesPerView: 1,
				},
				1440: {
					slidesPerView: 1,
				},
				1600: {
					slidesPerView: 1,
				},
			}
		});

		// Service Slider JS
		var swiper = new Swiper(".team-slide", {
			slidesPerView: 1,
			spaceBetween: 25,
			centeredSlides: false,
			preventClicks: true,
			loop: true, 
			autoplay: {
				delay: 8000,
				disableOnInteraction: false,
				pauseOnMouseEnter: true,
			},
			navigation: {
				nextEl: ".prev",
				prevEl: ".next",
			},
			breakpoints: {
				0: {
					slidesPerView: 1,
				},
				768: {
					slidesPerView: 2,
				},
				1199: {
					slidesPerView: 2,
				},
				1440: {
					slidesPerView: 3,
				},
				1600: {
					slidesPerView: 3,
				},
			}
		});

		// Testimonial Two Slider JS
		var swiper = new Swiper(".testimonials-slide-three", {
			slidesPerView: 1,
			spaceBetween: 25,
			centeredSlides: false,
			preventClicks: true,
			loop: true, 
			autoplay: {
				delay: 8000,
				disableOnInteraction: false,
				pauseOnMouseEnter: true,
			},
			navigation: {
				nextEl: ".prev",
				prevEl: ".next",
			},
			breakpoints: {
				0: {
					slidesPerView: 1,
				},
				768: {
					slidesPerView: 1,
				},
				1199: {
					slidesPerView: 1,
				},
				1440: {
					slidesPerView: 1,
				},
				1600: {
					slidesPerView: 1,
				},
			}
		});

		// Odometer JS
		if ("IntersectionObserver" in window) {  
			let counterObserver = new IntersectionObserver(function (entries, observer) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
					let counter = entry.target;
					let target = parseInt(counter.innerText);
					let step = target / 200;
					let current = 0;
					let timer = setInterval(function () {
						current += step;
						counter.innerText = Math.floor(current);
						if (parseInt(counter.innerText) >= target) {
						clearInterval(timer);
						}
					}, 10);
					counterObserver.unobserve(counter);
					}
				});
			});
			let counters = document.querySelectorAll(".counter");
			counters.forEach(function (counter) {
				counterObserver.observe(counter);
			});
		}

		// Background Images JS - Moved to ensure DOM is loaded
		// This code is intentionally placed here to run after all content loads

		// Radius Range Slider JS
		try {
			const slider = document.getElementById('sliderPrice');
			const rangeMin = parseInt(slider.dataset.min);
			const rangeMax = parseInt(slider.dataset.max);
			const step = parseInt(slider.dataset.step);
			const filterInputs = document.querySelectorAll('input.filter__input');
			noUiSlider.create(slider, {
				start: [rangeMin, rangeMax],
				connect: true,
				step: step,
				range: {
					'min': rangeMin,
					'max': rangeMax
				},
			
				// make numbers whole
				format: {
				to: value => value,
				from: value => value
				}
			});

			// bind inputs with noUiSlider 
			slider.noUiSlider.on('update', (values, handle) => { 
				filterInputs[handle].value = values[handle]; 
			});

			filterInputs.forEach((input, indexInput) => { 
				input.addEventListener('change', () => {
					slider.noUiSlider.setHandle(indexInput, input.value);
				})
			});
		} catch (err) {}
	})(window.jQuery);
}(jQuery));

// For Mobile Navbar JS
const list = document.querySelectorAll('.mobile-menu-list');
function accordion(e) {
    e.stopPropagation(); 
    if(this.classList.contains('active')){
        this.classList.remove('active');
    }
    else if(this.parentElement.parentElement.classList.contains('active')){
        this.classList.add('active');
    }
    else {
        for(i=0; i < list.length; i++){
            list[i].classList.remove('active');
        }
        this.classList.add('active');
    }
}
for(i = 0; i < list.length; i++ ){
    list[i].addEventListener('click', accordion);
}