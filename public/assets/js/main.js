/***************************************************
==================== JS INDEX ======================
****************************************************
// Data js
// Preloader js
// Mobile Menu js
// Mobile Menu Overlay js
// Search Bar Js
// Sticky js
// Fun Fact js
// Video js
// Rating js
// Swiper js
// Testimonial Slider js
// Gallery Slider js
// Hero Thumb Slider 2 js
// Popup js
// Skillbar js
// Price js
// ScrollTop js
****************************************************/

(function ($) {
   "use strict";

   // Data js
   $("[data-bg-image]").each(function () {
      var $this = $(this),
         $image = $this.data("bg-image");
      $this.css("background-image", "url(" + $image + ")");
   });

   // Preloader js
   function loading() {
      document.querySelectorAll(".bar").forEach(function (current) {
         let startWidth = 0;
         const endWidth = current.dataset.size;
         const interval = setInterval(frame, 20);
         function frame() {
            if (startWidth >= endWidth) {
               clearInterval(interval);
            } else {
               startWidth++;
               current.style.width = `${endWidth}%`;
               current.firstElementChild.innerText = `${startWidth}%`;
            }
         }
      });
   }
   setTimeout(loading, 1000);
   $(window).on("load", function () {
      const preloader = $(".preloader");
      preloader.delay(600).fadeOut();
   });
   $(".preloader .tj-header-btn btn").on("click", function () {
      $(".preloader").fadeOut();
   });

   // Mobile Menu js
   $("#main-menu").meanmenu({
      meanMenuContainer: "#mobile-navbar-menu",
      meanScreenWidth: "991",
      meanExpand: ["<i class='fa-light fa-plus'></i> <i class='fa-light fa-minus'></i>"],
   });

   // Mobile Menu Overlay js
   var canva_expander = $(".canva_expander");
   if (canva_expander.length) {
      $(".canva_expander, #canva_close, #tj-overlay-bg").on("click", function (e) {
         e.preventDefault();
         $("body").toggleClass("canvas_expanded");
      });
   }

   // Search Bar Js
   $(".search-btn").on("click", function () {
      $(".search_popup").addClass("search-opened");
      $(".search-popup-overlay").addClass("search-popup-overlay-open");
   });

   $(".search_close_btn").on("click", function () {
      $(".search_popup").removeClass("search-opened");
      $(".search-popup-overlay").removeClass("search-popup-overlay-open");
   });
   $(".search-popup-overlay").on("click", function () {
      $(".search_popup").removeClass("search-opened");
      $(this).removeClass("search-popup-overlay-open");
   });

   // Sticky js
   $(window).scroll(function () {
      var Width = $(document).width();
      if ($("body").scrollTop() > 100 || $("html").scrollTop() > 100) {
         $(".header-sticky").addClass("sticky");
      } else {
         $(".header-sticky").removeClass("sticky");
      }
   });

   // Fun Fact js
   if ($(".odometer").length > 0) {
      $(".odometer").waypoint(
         function () {
            var odo = $(".odometer");
            odo.each(function () {
               var countNumber = $(this).attr("data-count");
               $(this).html(countNumber);
            });
         },
         {
            offset: "80%",
            triggerOnce: true,
         }
      );
   }

   // Video js
   var popupvideos = $(".popup-videos-button");
   if (popupvideos.length) {
      $(".popup-videos-button").magnificPopup({
         disableOn: 10,
         type: "iframe",
         mainClass: "mfp-fade",
         removalDelay: 160,
         preloader: false,
         fixedContentPos: false,
      });
   }

   // Rating js
   var star_rating_width = $(".fill-ratings span").width();
   $(".star-ratings").width(star_rating_width);

   // Swiper js
   var hero = new Swiper(".hero-slider", {
      speed: 3000,
      loop: true,
      slidesPerView: 1,
      autoplay: true,
      effect: "fade",
      pagination: {
         el: ".swiper-pagination",
         clickable: true,
         renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
         },
      },
   });

   // Testimonial Slider js
   var testimonial_thumb = new Swiper(".tj-testimonial-2", {
      spaceBetween: 20,
      slidesPerView: 1,
   });

   var testimonial1 = new Swiper(".tj-testimonial-slider", {
      slidesPerView: 1,
      spaceBetween: 0,
      thumbs: {
         swiper: testimonial_thumb,
      },
      autoplay: {
         delay: 8500,
      },
      navigation: {
         nextEl: ".testimonial-next",
         prevEl: ".testimonial-prev",
      },
      loop: true,
   });

   // Testimonial Slider js
   var testimonial = new Swiper(".tj-testimonial-slider3", {
      slidesPerView: 4,
      spaceBetween: 24,
      // autoplay: {
      //     delay: 8500,
      // },
      navigation: {
         nextEl: ".testimonial-next",
         prevEl: ".testimonial-prev",
      },
      pagination: {
         el: ".swiper-pagination",
         clickable: true,
      },
      loop: true,
      breakpoints: {
         320: {
            slidesPerView: 1,
         },
         576: {
            slidesPerView: 1,
         },
         640: {
            slidesPerView: 2,
         },
         768: {
            slidesPerView: 2,
         },
         992: {
            slidesPerView: 3,
         },
         1024: {
            slidesPerView: 4,
         },
      },
   });

   // Hero Thumb Slider 2 js
   var testimonial2_thumb = new Swiper(".thumb-testimonial-slider", {
      spaceBetween: 0,
      slidesPerView: 3,
   });

   var testimonial2 = new Swiper(".thumb-slider2", {
      spaceBetween: 0,
      thumbs: {
         swiper: testimonial2_thumb,
      },
      loop: false,
   });

   // Listen for slide change
   testimonial2.on("slideChange", function () {
      // Remove 'active' class from all testimonial_active_img elements
      $(".testimonial_active_img.active").fadeOut(300, function () {
         $(this).removeClass("active");
      });

      // Get the activeIndex directly from testimonial2
      var activeIndex = testimonial2.activeIndex;

      // Add 'active' class to the corresponding testimonial_active_img element
      $(".testimonial_active_img")
         .eq(activeIndex)
         .fadeIn(300, function () {
            $(this).addClass("active");
         });
   });

   // Gallery Slider js
   var gallery = new Swiper(".tj-gallery-slider", {
      slidesPerView: 2,
      autoplay: {
         delay: 8500,
      },
      navigation: {
         nextEl: ".swiper-button-next",
         prevEl: ".swiper-button-prev",
      },
      loop: true,
      breakpoints: {
         320: {
            slidesPerView: 1,
         },
         576: {
            slidesPerView: 2,
         },
         640: {
            slidesPerView: 2,
         },
         768: {
            slidesPerView: 2,
         },
         992: {
            slidesPerView: 3,
         },
         1024: {
            slidesPerView: 5,
         },
      },
   });

   // Gallery Slider js
   var service = new Swiper(".tj-service-slider", {
      slidesPerView: 2,
      spaceBetween: 24,
      autoplay: {
         delay: 8500,
      },
      navigation: {
         nextEl: ".swiper-button-next",
         prevEl: ".swiper-button-prev",
      },
      pagination: {
         el: ".swiper-pagination",
         clickable: true,
      },
      loop: true,
      breakpoints: {
         320: {
            slidesPerView: 1,
         },
         576: {
            slidesPerView: 1,
         },
         640: {
            slidesPerView: 2,
         },
         768: {
            slidesPerView: 2,
         },
         992: {
            slidesPerView: 3,
         },
         1024: {
            slidesPerView: 3,
         },
      },
   });

   // Gallery Slider js
   var wrapper = new Swiper(".tj-wrapper-slider", {
      slidesPerView: 2,
      spaceBetween: 24,
      autoplay: {
         delay: 8500,
      },
      navigation: {
         nextEl: ".swiper-button-next",
         prevEl: ".swiper-button-prev",
      },
      loop: true,
      breakpoints: {
         320: {
            slidesPerView: 1,
         },
         576: {
            slidesPerView: 1,
         },
         640: {
            slidesPerView: 1,
         },
         768: {
            slidesPerView: 1,
         },
         992: {
            slidesPerView: 1,
         },
         1024: {
            slidesPerView: 1,
         },
      },
   });

   // Gallery Slider js
   var wrapper = new Swiper(".tj-wrapper-slider2", {
      slidesPerView: 2,
      spaceBetween: 24,
      autoplay: {
         delay: 8500,
      },
      navigation: {
         nextEl: ".swiper-button-next",
         prevEl: ".swiper-button-prev",
      },
      loop: true,
      breakpoints: {
         320: {
            slidesPerView: 1,
         },
         576: {
            slidesPerView: 1,
         },
         640: {
            slidesPerView: 1,
         },
         768: {
            slidesPerView: 1,
         },
         992: {
            slidesPerView: 1,
         },
         1024: {
            slidesPerView: 1,
         },
      },
   });

   // Brand Slider js
   var brand = new Swiper(".tj-brand-slider", {
      slidesPerView: 4,
      spaceBetween: 180,
      // autoplay: {
      //     delay: 9000,
      // },
      loop: false,
      breakpoints: {
         320: {
            slidesPerView: 2,
            spaceBetween: 30,
         },
         576: {
            slidesPerView: 3,
            spaceBetween: 50,
         },
         640: {
            slidesPerView: 3,
         },
         768: {
            slidesPerView: 3,
            spaceBetween: 50,
         },
         992: {
            slidesPerView: 4,
         },
         1024: {
            slidesPerView: 4,
         },
      },
   });

   // Popup js
   $(document).ready(function () {
      $(".popup-gallery").magnificPopup({
         delegate: "a",
         type: "image",
         removalDelay: 300,
         mainClass: "mfp-fade",
         gallery: {
            enabled: true,
         },
      });
   });

   // Skillbar js
   $(document).ready(function () {
      startAnimation();
      function startAnimation() {
         jQuery(".skills").each(function () {
            jQuery(this)
               .find(".skillbar")
               .animate(
                  {
                     width: jQuery(this).attr("data-percent"),
                  },
                  4000
               );
         });
      }
   });

   // Price js
   var price = $(".price-number");
   var year = $("#year");
   var month = $("#month");
   year.on("click", function () {
      $(this).addClass("active");
      month.removeClass("active");
      price.each(function () {
         $(this).text($(this).data("year-price"));
      });
   });
   month.on("click", function () {
      $(this).addClass("active");
      year.removeClass("active");
      price.each(function () {
         $(this).text($(this).data("month-price"));
      });
   });

   // ScrollTop js
   var solarScrollTop = document.querySelector(".solar-scroll-top");
   if (solarScrollTop != null) {
      var scrollProgressPatch = document.querySelector(".solar-scroll-top path");
      var pathLength = scrollProgressPatch.getTotalLength();
      var offset = 50;
      scrollProgressPatch.style.transition = scrollProgressPatch.style.WebkitTransition = "none";
      scrollProgressPatch.style.strokeDasharray = pathLength + " " + pathLength;
      scrollProgressPatch.style.strokeDashoffset = pathLength;
      scrollProgressPatch.getBoundingClientRect();
      scrollProgressPatch.style.transition = scrollProgressPatch.style.WebkitTransition = "stroke-dashoffset 10ms linear";
      window.addEventListener("scroll", function (event) {
         var scroll = document.body.scrollTop || document.documentElement.scrollTop;
         var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
         var progress = pathLength - (scroll * pathLength) / height;
         scrollProgressPatch.style.strokeDashoffset = progress;
         var scrollElementPos = document.body.scrollTop || document.documentElement.scrollTop;
         if (scrollElementPos >= offset) {
            solarScrollTop.classList.add("progress-done");
         } else {
            solarScrollTop.classList.remove("progress-done");
         }
      });
      solarScrollTop.addEventListener("click", function (e) {
         e.preventDefault();
         window.scroll({
            top: 0,
            left: 0,
            behavior: "smooth",
         });
      });
   }
})(jQuery);
