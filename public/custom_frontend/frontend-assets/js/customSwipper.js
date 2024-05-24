$(document).ready(function() {
    // var e, i = document.querySelector("#scroll-swiper");
    
    // if (typeof Swiper !== "undefined" && i !== null) {
    //     e = new Swiper(".mySwiper", {
    //         slidesPerView: 1,
    //         spaceBetween: 0,
    //         speed: 600,
    //         autoplay: false, 
    //         pagination: {
    //             el: ".swiper-pagination",
    //             clickable: true 
    //         },
            
    //     });
    // }
    // window.onload = function() {
    //     // Your code snippet
    //     setTimeout(() => {
    //         if (typeof Swiper !== "undefined" && i !== null && $(window).width() > 991) {
            
    //             e = new Swiper(".mySwiper", {
    //                 slidesPerView: 1,
    //                 spaceBetween: 0,
    //                 speed: 600,
    //                 autoplay: false,
    //                 pagination: {
    //                     el: ".swiper-pagination",
    //                     clickable: true,
    //                 },
    //                 freeMode: true,
    //                 mousewheel: {
    //                     sensitivity: 1,
    //                     releaseOnEdges: true,
    //                 },
    //                 passiveListeners: false,
    //             });
    //         }
    //     }, 1000);
    // };
    
    // e.mousewheel.update({ passive: false });
    // console.log(e.mousewheel.enabled);
    var n = document.querySelector(".blogSwiper");
    if ("undefined" != typeof Swiper && null !== n) var s = new Swiper(".blogSwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        autoplay: {
            delay: 3e3
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        breakpoints: {
            320: {
                slidesPerView: 1
            },
            425: {
                slidesPerView: 1
            },
            768: {
                slidesPerView: 2
            },
            900: {
                slidesPerView: 3
            },
            1280: {
                slidesPerView: 3
            },
            1380: {
                slidesPerView: 3
            }
        }
    });
    var t = document.querySelector(".mySwiper2");
    if ("undefined" != typeof Swiper && null !== t) var s = new Swiper(".mySwiper2", {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: !0
        }
    });
    var a = document.querySelector(".videoSwiper");
    if ("undefined" != typeof Swiper && null !== a) {
        var slider = new Swiper(".videoSwiper", {
            slidesPerView: 1,
            speed: 300,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: !0
            }
        });
        slider.on("slideChange", function() {
            // if($(window).width()<991){
            //     setWrapperHeight();
            // }
            $(".play-icon").css("opacity","1");
            var currentSlide = slider.slides[slider.activeIndex];
            var previousSlide = slider.slides[slider.previousIndex];
            var introductoryVideo = $(previousSlide).find(".introductory-video")[0];
        
            if (introductoryVideo) {
                introductoryVideo.pause();
                $(previousSlide).find(".play-svg").css("display", "block");
                $(previousSlide).find(".pause-svg").css("display", "none");
                $(previousSlide).removeClass("hovered");
            }
        });

        // $(window).on('resize', function () { 
        //     if($(window).width()<991){
        //         setWrapperHeight();
        //     }
        //  });

        // if($(window).width()<991){
        //     setWrapperHeight();
        // }

        // function setWrapperHeight() {
        //     const activeSlide = slider.slides[slider.activeIndex];
        //     const wrapper = slider.wrapperEl;
        //     wrapper.style.height = activeSlide.offsetHeight + 'px';
        // }
    }
    // $(".next-button").on("click", function() {
    //     $(this).closest(".mySwiper").find(".swiper-pagination-bullet-active").next(".swiper-pagination-bullet").click()
    // }), $(".prev-button").on("click", function() {
    //     $(this).closest(".mySwiper").find(".swiper-pagination-bullet-active").prev(".swiper-pagination-bullet").click()
    // });
    
    var technologySwiper = document.querySelector(".technologySwiper");

    if (typeof Swiper !== "undefined" && technologySwiper !== null) {
    var techSwiper = new Swiper(".technologySwiper", {
        slidesPerView: 4,
        spaceBetween: 20,
        slidesPerGroup: 1,
        loop: true,
        centeredSlides: false,
        centerInsufficientSlides:true,
        autoplay: {
            delay: 3000,
        },
        breakpoints: {
        320: {
            spaceBetween: 20,
            slidesPerView:1,
        },
        375: {
            spaceBetween: 20,
            slidesPerView: 1,
        },
        768: {
            spaceBetween: 30,
            slidesPerView: 2,
        },
        1024: {
            spaceBetween: 40,
            slidesPerView: 3,
        },
        1200: {
            spaceBetween: 50,
            slidesPerView: 4,
        },
        },
        
    });
  
    }


    var technologyDevelopmentElement = document.querySelector(".technologyDevelopment");

    if (typeof Swiper !== "undefined" && technologyDevelopmentElement !== null) {
        var swiper = new Swiper(".technologyDevelopment", {
            slidesPerView: "auto",
            spaceBetween: 80,
            loop: true,
            
            breakpoints: {
                320: {
                    spaceBetween: 20
                },
                768: {
                    spaceBetween: 30
                },
                991: {
                    spaceBetween: 40
                },
                1024: {
                    spaceBetween: 50
                },
                1200: {
                    spaceBetween: 80
                }
            }
        });
        
    }

    if ("undefined" != typeof Swiper) var s = new Swiper(".technologyDevelopment2", {
        slidesPerView: 4,
        spaceBetween: 80,
        loop: true,
        centeredSlides: false,
        centerInsufficientSlides:true,
        autoplay:{
            delay: 3000,
        },
        breakpoints: {
            320: {
                spaceBetween: 20,
                slidesPerView: 1,
            },
            768: {
                spaceBetween: 40,
                slidesPerView: 2,
            },
            991: {
                spaceBetween: 50,
                slidesPerView: 3,
            },
            1024: {
                spaceBetween: 70,
                slidesPerView: 3,
            },
            1200: {
                spaceBetween: 80,
                slidesPerView: 4,
            }
        }
    });
    var r = document.querySelector(".serviceSwiper");
    if ("undefined" != typeof Swiper && null != r) var s = new Swiper(".serviceSwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        centeredSlides: false,
        caches: true,
        centerInsufficientSlides:true,
        loop: true,
        autoplay: {
            // delay: 3000
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 30
            },
            991: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            2225: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        }
    });
    var o = document.querySelector(".clientsSwiper");

    if ("undefined" != typeof Swiper && null !== o) var s = new Swiper(".clientsSwiper", {
        slidesPerView: "auto",
        centeredSlides: false,
        centerInsufficientSlides:true,
        simulateTouch:false, 
        spaceBetween: 120,
        loop: true,
        autoplay: true,
        autoplay: {
            delay: 0
        },
        // freeMode: true,
        speed: 2000,
        // direction: "horizontal",
        breakpoints: {
            320: {
                // slidesPerView: 1,
                spaceBetween: 64
            },
            375: {
                // slidesPerView: 1,
                spaceBetween: 64
            },
            600: {
                // slidesPerView: 2,
                spaceBetween: 64
            },
            768: {
                // slidesPerView: 3,
                spaceBetween: 64
            },
            1024: {
                // slidesPerView: 3,
                spaceBetween: 70
            },
            1200: {
                // slidesPerView: 4,
                spaceBetween: 80
            }
        }
    })
});