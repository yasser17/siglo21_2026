jQuery(function ($) {
    "use strict";

    var swiper_noticias = new Swiper('.swiper-container.noticias', {
        slidesPerView: 5,
        spaceBetween: 30,
        navigation: {
            nextEl: '#news-next',
            prevEl: '#news-prev',
        },
        breakpoints: {
            480: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            767: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            2000: {
                slidesPerView: 4,
                spaceBetween: 30
            }
        }
    });

    var swiper_staff = new Swiper('.swiper-container.staff', {
        slidesPerView: 4,
        spaceBetween: 30,
        navigation: {
            nextEl: '#member-next',
            prevEl: '#member-prev',
        },
        breakpoints: {
            480: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            767: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        }
    });
	
	var swiper_noticias = new Swiper('.swiper-container.noticias-musicales', {
        slidesPerView: 5,
        spaceBetween: 30,
        navigation: {
            nextEl: '#noticias-musicales-next',
            prevEl: '#noticias-musicales-prev',
        },
        breakpoints: {
            480: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            767: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            1199: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            2000: {
                slidesPerView: 4,
                spaceBetween: 30
            }
        }
    });

});