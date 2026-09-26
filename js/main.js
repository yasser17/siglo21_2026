jQuery(function($) {
    "use strict";

    /*============
	1-Hero Header
	2-Navigation
	3-Video Banner
	4-Gallery
	5-Fraction Slider
	6-Parallax
	7-Carousel fredsel
	8-Owl Slider
	9-Vegas Slider
	10-Tweet
	11-JPlayer
	12- Contact Form
	==============*/

    var isStickyPlayer = $(".sticky_player").attr("data-sticky"),
        isStickyNav = $("#sticktop").attr("data-sticky"),
        naviheight = $("#sticktop").height(),
        playerHeight = $(".sticky_player").height(),
        navTopSpace = 0,
        NavOffset = 0;
    var $winHeight = $(window).height(),
        $winWidth = $(window).width();
    /*=======================================
	1-Hero Header
	=======================================*/

    /* $(window).on('resize', function () {
		$winHeight = $(window).height() - 63;
		$winWidth = $(window).width();

		$('.hero_section').css('height', $winHeight + 'px');
		var $hero_height = $('.hero_section').height(),
			$hero_content_height = $('.hero_content').height();

		if ($hero_height < $hero_content_height) { $('.hero_section').css('height', $hero_content_height + 70 + 'px'); }
		$('.hero_section').css('padding-top', ($hero_height / 2) - ($hero_content_height / 2) + 'px');

	}).resize(); */

    $(".list_scroll").mCustomScrollbar({
        advanced: { updateOnContentResize: true },
    });

    /*=======================================
	2-Navigation
	=======================================*/

    if (isStickyNav != "false") {
        NavOffset = naviheight + 10;
    }
    if (isStickyPlayer != "false") {
        NavOffset = playerHeight + 10;
    }
    if (isStickyNav != "false" && isStickyPlayer != "false") {
        NavOffset = naviheight + playerHeight + 10;
    }
    $("body").attr("data-offset", NavOffset + 10);

    $(".navbar-nav a[href^='#'],.ScrollTo,.btn-scroll").click(function(e) {
        e.preventDefault();
        $("html, body")
            .stop()
            .animate(
                { scrollTop: $($.attr(this, "href")).offset().top - NavOffset },
                1000,
                "swing"
            );
    });

    if ($winWidth > 700) {
        if ($(".sticky_player").attr("data-sticky") != "false") {
            navTopSpace = playerHeight;
        }
        if (isStickyNav != "false") {
            $("#sticktop").sticky({ topSpacing: navTopSpace });
        }
        if ($(".sticky_player").attr("data-sticky") != "false") {
            $(".sticky_player").sticky({ topSpacing: 0 });
        }
        $("#sticktop").on("sticky-start", function() {
            if ($(".sticky_player").attr("data-sticky") != "false")
                $(".rock_player").removeClass("pre_sticky");
        });
        $("#sticktop").on("sticky-end", function() {
            if ($(".sticky_player").attr("data-sticky") != "false")
                $(".rock_player").addClass("pre_sticky");
        });
    }

    /*=======================================
	3-Video Banner
	=======================================*/
    if ($(".video-banner").length != 0) {
        var BV = new $.BigVideo({ useFlashForFirefox: false });
        BV.init();
        BV.getPlayer().poster("assets/video/video-poster.jpg");
        BV.show("assets/video/demo.mp4", { doLoop: true });

        $(".video-load").show();
        BV.getPlayer().on("seeking", function() {
            $(".video-load").hide();
            $(".video-pause").show();
            $(".video-play").hide();
            console.log("seeking");
        });

        BV.getPlayer().on("play", function() {
            $(".video-load").hide();
            $(".video-pause").show();
            $(".video-play").hide();
        });
        BV.getPlayer().on("ended", function() {
            $(".video-load").hide();
            $(".video-play").show();
            $(".video-pause").hide();
        });
        BV.getPlayer().on("loadstart", function() {
            $(".video-load").show();
            $(".video-pause").hide();
            $(".video-play").hide();
        });
        BV.getPlayer().on("loadeddata", function() {
            $(".video-load").hide();
            $(".video-pause").show();
            $(".video-play").hide();
            console.log("data loaded for curent time");
        });
        $(".video-pause").click(function() {
            BV.getPlayer().pause();
            $(".video-load").hide();
            $(".video-pause").hide();
            $(".video-play").show();
        });
        $(".video-play").click(function() {
            BV.getPlayer().play();
            $(".video-play").hide();
            $(".video-pause").show();
        });
    }

    /*=======================================
	4-Gallery
	=======================================*/

    /*
	$('.sliderGallery,.trigger_slider').click(function (e) {
		e.preventDefault();
		var $this = $(this),
			p = $this.parents(".modal"),
			gallayoutOption = p.find('.gallayoutOption'),
			gal_list = p.find('.gal_list'),
			socialShare = p.find('.social_share');

		gallayoutOption.children("li").removeClass('active');
		$this.parent('li').addClass('active');

		gal_list.children("li").each(function () {
			$(this).removeClass('trigger_slider').addClass('gallery-item');
		});

		gal_list.addClass('owl-carousel owl-gallery');
		gal_list.owlCarousel({
			slideSpeed: 1000,
			pagination: false,
			singleItem: true,
			navigation: true,
		});
		socialShare.slideDown();
	});

	$('.gridGallery').on('click', function (e) {
		e.preventDefault();
		var $this = $(this),
			p = $this.parents(".modal"),
			gallayoutOption = p.find('.gallayoutOption'),
			socialShare = p.find('.social_share'),
			gal_list = p.find('.gal_list'),
			owlGal = p.find(".owl-gallery");

		gallayoutOption.children("li").removeClass('active');
		$this.parent('li').addClass('active');

		socialShare.slideUp();

		if (owlGal.length) {
			owlGal.data('owlCarousel').destroy();
			gal_list.children("li").each(function () {
				$(this).addClass('trigger_slider').removeClass('gallery-item');
			});
			gal_list.removeClass('owl-carousel owl-gallery');
		}
	});

	*/

    /*=======================================
	5-Fraction Slider
	=======================================*/
    /*
	$('.fractionSlide').fractionSlider({
		dimensions: '1970,1000',
		responsive: true,
		backgroundAnimation: true,
		slideTransitionSpeed: 200,
		pager: true,
		startCallback: function () {
			$('.fractionSlide .slide').show();
		}
	});
	*/

    /*=======================================
	6-Parallax
	=======================================*/

    $.stellar({
        horizontalScrolling: false,
        verticalOffset: 0,
        responsive: true,
    });

    /*=======================================
	7-Carousel fredsel
	=======================================*/

    /*
	$('.news_carousel').waitForImages(function () {
		$('.news_carousel').carouFredSel({
			width: "100%",
			circular: false,
			infinite: false,
			auto: false,
			align: "centre",

			scroll: {
				items: 1, easing: "linear"
			},
			prev: { button: "#news-prev", key: "left" },
			next: { button: "#news-next", key: "right" },
		});
	});

	$('.members_carousel').waitForImages(function () {
		$('.members_carousel').carouFredSel({
			width: "100%",
			circular: false,
			infinite: false,
			auto: false,
			align: false,
			scroll: {
				items: 1, easing: "linear"
			},
			prev: { button: "#member-prev", key: "left" },
			next: { button: "#member-next", key: "right" },
		});
	});
	*/

    /*==========================================
	8-Owl Slider
	=======================================*/

    /*
	$(".testimonial_quotes").owlCarousel({
		slideSpeed: 1000,
		paginationSpeed: 500,
		singleItem: true,
		navigation: false,
		transitionStyle: "backSlide",
		afterAction: function () { $(window).trigger("resize"); },
	});
	*/

    /*============================
   9-Vegas Slider
   ============================*/

    if ($(".vegas-slides").length) {
        var vegas_BG_imgs = [],
            $vegas_img = $(".vegas-slides li img"),
            vegas_slide_length = $(".vegas-slides li").length;

        for (var i = 0; i < vegas_slide_length; i++) {
            var new_vegas_img = {};
            new_vegas_img["src"] = $vegas_img.eq(i).attr("src");
            new_vegas_img["fade"] = $vegas_img.eq(i).attr("data-fade");
            vegas_BG_imgs.push(new_vegas_img);
        }

        var slideSpeed = $(".vegas-slides").data("speed");
        $.vegas("slideshow", {
            delay: slideSpeed,
            backgrounds: vegas_BG_imgs,
        });
        $(".vegas-controls a").click(function(e) {
            e.preventDefault();
            var $parent = $(this).parent("li");
            if (!$parent.hasClass("active")) {
                $(".vegas-controls li").removeClass("active");
                $parent.addClass("active");
                $.vegas("jump", $parent.index());
            }
        });
        $("body").bind("vegaswalk", function(e, bg, step) {
            $(".vegas-controls li").removeClass("active");
            $(".vegas-controls li")
                .eq(step)
                .addClass("active");
        });
    }

    if ($winWidth < 760) {
        $.vegas("pause");
    }

    reanimate();
    function reanimate() {
        $(".ScrollTo > i")
            .animate({ top: 0 }, 1000)
            .animate({ top: 20 }, 1000, function() {
                setTimeout(reanimate, 100);
            });
    }

    /*==========================================
	11-JPlayer
	=======================================*/

    // Settings generales
    var streamingsUrls = [
        "https://hmdsystem.info:8193/siglo",
        "https://emisiones.com.uy:8149/2als",
    ];
    var streamingIndex = 0;
    var selectedStreamingUrl = streamingsUrls[streamingIndex];
    var stream = {
        mp3: selectedStreamingUrl,
    };
    var ready = false;
    var currentVolume = 1;

    // Control de calidad del streaming
    $("#streaming-audio-quality li div").click(function() {
        // Establecer el texto de la opción seleccionada en el botón padre
        $(".btn:first-child")
            .text($(this).text())
            .append('<span class="fa fa-angle-down"></span>');
        // Recuperar el índice del streaming
        streamingIndex = $(this).data("streaming-index") || 0;
        // Establecer la URL del streaming que corresponde a la calidad seleccionada
        selectedStreamingUrl = streamingsUrls[streamingIndex];
        // Preparar el stream para el reporductor
        stream.mp3 = selectedStreamingUrl;
        // Destruir el reproductor actual
        $("#player-instance").jPlayer("destroy");
        // Recrear el reproductor con el nuevo streaming
        initjPlayer();
    });

    // Inicializar el reproductor
    initjPlayer();
    function initjPlayer() {
        $("#player-instance").jPlayer({
            ready: function(event) {
                ready = true;
                $(this)
                    .jPlayer("setMedia", stream)
                    .jPlayer("play");
            },
            pause: function() {
                $(this).jPlayer("clearMedia"); // Limpiar el audio
            },
            error: function(event) {
                if (
                    ready &&
                    event.jPlayer.error.type === $.jPlayer.error.URL_NOT_SET // Al pausar
                ) {
                    $(this)
                        .jPlayer("setMedia", stream)
                        .jPlayer("play"); // Retomar el audio pausado pero volviendo a solicitar el stream (en vivo)
                }
            },
            swfPath: "assets/jPlayer/jquery.jplayer.swf",
            supplied: "mp3",
            preload: "metadata",
            wmode: "window",
            useStateClassSkin: true,
            autoBlur: false,
            keyEnabled: true,
            cssSelectorAncestor: ".rock_player",
        });
    }

    // Mostrar el loading mientras se hace el request del streaming y se completa la carga en el reproductor
    $("#player-instance").bind($.jPlayer.event.loadstart, function(event) {
        if ($(".jp-loading").length == 0) {
            $(".rock_controls").prepend(
                '<div class="jp-loading-container"><div class="jp-loading"></div></div>'
            );
        }
    });
    // Ocultar el loading cuando se completa la carga del streaming en el reproductor
    $("#player-instance").bind($.jPlayer.event.canplay, function(event) {
        $(".jp-loading-container").remove();
    });

    // Control de volumen
    $(".jp-volume li a").click(function(e) {
        e.preventDefault();
        currentVolume =
            (($(this)
                .parent()
                .index() +
                1) /
                10) *
            2;
        $("#player-instance").jPlayer("volume", currentVolume);
        $("#jp-volume-toggle i").removeClass("fa-volume-off");
        $("#jp-volume-toggle i").addClass("fa-volume-up");
        $(".jp-volume li").removeClass("active");
        for (
            var i = 0;
            i <=
            $(this)
                .parent()
                .index();
            i++
        ) {
            $(".jp-volume li")
                .eq(i)
                .addClass("active");
        }
    });
    $("#jp-volume-toggle").click(function(e) {
        e.preventDefault();
        if (currentVolume > 0) {
            currentVolume = 0;
            $(".jp-volume li").removeClass("active");
            $("#jp-volume-toggle i").removeClass("fa-volume-up");
            $("#jp-volume-toggle i").addClass("fa-volume-off");
        } else {
            currentVolume = 1;
            $(".jp-volume li").removeClass("active");
            $(".jp-volume li").addClass("active");
            $("#jp-volume-toggle i").removeClass("fa-volume-off");
            $("#jp-volume-toggle i").addClass("fa-volume-up");
        }
        $("#player-instance").jPlayer("volume", currentVolume);
    });
    // $("#player-instance").bind($.jPlayer.event.volumechange, function (event) {
    //     currentVolume = event.jPlayer.options.volume;
    //     if (currentVolume > 0) {
    //         $(".jp-volume li").addClass("active");
    //     } else if(currentVolume === 1) {
    //         $(".jp-volume li").removeClass("active");
    //     }
    // });

    // Toggle de settings en mobile
    $("#streaming-settings-toggle").click(function(e) {
        e.preventDefault();
        $(".player-settings-container").slideToggle();
    });

    /*
	$('.playlist_expander').click(function (e) {
		e.preventDefault();
		$('.play_list').slideToggle();
	});

    $("#player-instance").bind($.jPlayer.event.error, function (event) {
        $("#player-instance").jPlayer("play");
    });
	*/

    // Actualizar ícono del botón principal al reproducir o pausar
    $(".playButton").click(function(e) {
        e.preventDefault();
        if ($("#player-instance").data().jPlayer.status.paused) {
            $("#player-instance")
                .jPlayer("setMedia", stream)
                .jPlayer("play");
            $(this).removeClass("fa-play");
            $(this).addClass("fa-pause");
        } else {
            $("#player-instance").jPlayer("pause");
            $(this).removeClass("fa-pause");
            $(this).addClass("fa-play");
        }
    });

    /*==========================
	Ajax Expander
	==========================*/

    $(".triggerTrack").click(function(e) {
        e.preventDefault();
        $(".trackLoading").show();
        console.log($("#tracksAjax").height());
        var $this = $(this),
            href = $this.attr("href"),
            key = $this.attr("data-number");
        if (!href === "#") {
            return;
        }
        $.ajax({
            url: href,
            dataType: "html",
            success: function(data) {
                var targetPageContent = $("<div />")
                    .html(data)
                    .find(".pageContentArea #album" + key);
                $("#tracksAjax")
                    .html(targetPageContent)
                    .slideDown();
                $(".closeTrackAjax").show();
                $(".trackLoading").hide();
                $("html, body")
                    .stop()
                    .animate(
                        {
                            scrollTop:
                                $("#tracksAjaxWrapper").offset().top -
                                NavOffset,
                        },
                        1000,
                        "swing"
                    );
            },
            error: function(request, status, error) {
                alert(request.responseText);
                $(".trackLoading").hide();
            },
        });
    });

    $(".closeTrackAjax").click(function(e) {
        e.preventDefault();
        $("html, body")
            .stop()
            .animate(
                { scrollTop: $($(this).attr("href")).offset().top - NavOffset },
                500,
                "swing"
            );
        $(this).hide();
        $("#tracksAjax").slideUp();
    });

    $(".closeNewsAjax").click(function(e) {
        e.preventDefault();
        $("html, body")
            .stop()
            .animate(
                { scrollTop: $($(this).attr("href")).offset().top - NavOffset },
                500,
                "swing"
            );
        $(this).hide();
        $("#newsAjax").slideUp();
    });

    /* $('.triggerNews').click(function (e) {
		e.preventDefault();
		$('.trackLoading').show();
		var $this = $(this), href = $this.attr('href'), key = $this.attr("data-number");
		if (!href === '#') { return }
		$.ajax({
			url: href,
			dataType: 'html',
			success: function (data) {
				var targetPageContent = $('<div />').html(data).find('.pageContentArea #xv-news' + key);
				$('#newsAjax').html(targetPageContent).slideDown();
				$('.trackLoading').hide();
				$('.closeNewsAjax').show();
				$('html, body').stop().animate({ scrollTop: $("#newsAjaxWrapper").offset().top - NavOffset }, 1000, "swing");

			},
			error: function (request, status, error) {
				alert(request.responseText);
				$('.trackLoading').hide();
			}

		});
	}); */

    /*==========================
	Connect Tabs
	==========================*/

    $("body").on("click", ".tab-link", function(e) {
        e.preventDefault();
        var $this = $(this),
            tabId = $this.data("tab");
        $(".tab-link").removeClass("active");
        $this.addClass("active");
        $(".tab-content").removeClass("active");
        $(".tab-content#" + tabId).addClass("active");
    });

    window.loadImage = function(src) {
        $("#conductor-imagen").attr("src", src);
    };
});