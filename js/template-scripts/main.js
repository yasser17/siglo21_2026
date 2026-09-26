/* Loading */
(function($) {
  // Hide loader on window load
  function hideLoader() {
    $(".loader").delay(500).fadeOut();
    $("#mask").delay(1000).fadeOut("slow");
    $("body").addClass("loaded");
  }
  
  // Use multiple events to ensure loader is hidden
  $(window).on('load', hideLoader);
  
  // Fallback: hide loader after 5 seconds if not hidden by load event
  setTimeout(function() {
    if ($("body").hasClass("loaded") === false) {
      hideLoader();
    }
  }, 5000);

/*---------------------------------------------- 
            P L A Y E R   I N T R O
------------------------------------------------*/
$(function() { 

  function loadAudio() {
    // Setup the player to autoplay the next track
    var a = audiojs.createAll({
      trackEnded: function() {
        var next = $('ol.playlist li.playing').next();
        if (!next.length) next = $('ol.playlist li').first();
        next.addClass('playing').siblings().removeClass('playing');
        audio.load($('a', next).attr('data-src'));
        audio.play();
      }
    });

    // Load in the first track
    var audio = a[0];
        first = $('ol.playlist a').attr('data-src');
    $('ol.playlist li').first().addClass('playing');
    audio.load(first);

    // Load in a track on click
    $('ol.playlist li').click(function(e) {
      e.preventDefault();
      $(this).addClass('playing').siblings().removeClass('playing');
      audio.load($('a', this).attr('data-src'));
      audio.play();
    });

    $('.nextprev .next').click(function(e) {
        e.preventDefault();
        var next = $('ol.playlist li.playing').next();
        if (!next.length) next = $('ol.playlist li').first();
        next.click();  
    });
    $('.nextprev .prev').click(function(e) {
        var prev = $('ol.playlist li.playing').prev();
        if (!prev.length) prev = $('ol.playlist li').last();
        prev.click();
    });

    $('.btnloop').click(function(e) {
        if ($('audio').attr('loop')) {
            $('audio').removeAttr('loop');
            $(this).removeClass('active');
        } else {
            $('audio').attr('loop', 0);
            $(this).addClass('active');
        }
    });
  }

  // Sólo inicializar audiojs si hay una playlist real (el reproductor en
  // vivo del streaming usa su propia lógica, ver js/radio-player.js)
  if ($('.player .playlist').length>0 ) {
    loadAudio();
  };

});

if ($('#DateCountdown').length>0 ) {
  $(window).resize(function(){
    $("#DateCountdown").TimeCircles().rebuild();
  });
  $("#DateCountdown").TimeCircles({
    "animation": "smooth",
    "bg_width": 0.5,
    "fg_width": 0.023333333333333334,
    "circle_bg_color": "#000000",
      "time": {
        "Days": {
          "text": "Days",
          "color": "#EB2B29",
          "show": true
        },
            "Hours": {
          "text": "Hours",
          "color": "#EB2B29",
          "show": true
        },
        "Minutes": {
          "text": "Minutes",
          "color": "#EB2B29",
          "show": true
        },
        "Seconds": {
          "text": "Seconds",
          "color": "#EB2B29",
           "show": true
        }
      }
  });
}


$(document).ready(function(){
/*---------------------------------------------- 
            I N T R O  S L I D E R
------------------------------------------------*/
  $('#slides').superslides({
    hashchange: false,
    animation: 'fade',
    play: 10000
  });

  function slidertext() {
    $("#owl-main-text").owlCarousel({
      autoPlay: 10000,
      goToFirst: true,
      goToFirstSpeed: 2000,
      navigation: false,
      slideSpeed: 700,
      pagination: false,
      transitionStyle: "fadeUp",
      singleItem: true
    });
  }

  if ($('#owl-main-text').length>0 ) {
    slidertext();
  };

  /*---------------------------------------------- 
                   T W I T T E R 
  ------------------------------------------------*/
  function twitterfeed() {  
    var config5 = {
      "id": '702067549920485376',
      "domId": 'twitter-feed',
      "maxTweets": 4,
      "enableLinks": true,
      "showUser": true,
      "showTime": true,
      "dateFunction": '',
      "showRetweet": false,
      "customCallback": handleTweets,
      "showInteraction": false
    };

    function handleTweets(tweets){
      var x = tweets.length;
      var n = 0;
      var element = document.getElementById('twitter-feed');
      var html = '<ul class="slider-twitter">';
      while(n < x) {
        html += '<li class="gallery-cell">' + tweets[n] + '</li>';
        n++;
      }
      html += '</ul>';
      element.innerHTML = html;

      $('.slider-twitter').flickity({
        cellAlign: 'left',
        contain: true,
        wrapAround: true,
        prevNextButtons: false
      });
    }
    twitterFetcher.fetch(config5);
  }

  if ($('.twitterfeed').length>0 ) {
    twitterfeed();
  };

  /*---------------------------------------------- 
              S L I D E R  D A T E S
  ------------------------------------------------*/
  var $carouselDates = $('.jcarouselDates').flickity({
    cellAlign: 'left', 
    wrapAround: true, 
    contain: true, 
    prevNextButtons: false, 
    pageDots: false,
    draggable: false
  });
  $('.button-group').on( 'click', '.button', function() {
    var index = $(this).index();
    $carouselDates.flickity( 'select', index );
    $(this).addClass('active').siblings().removeClass('active');
  });

  /*----------------------------------------------
            S L I D E R S   C O N   A U T O P L A Y
  ------------------------------------------------*/
  // Flickity deja de auto-reproducir para siempre en cuanto alguien arrastra
  // el carrusel o hace click en un punto de paginación -"pointerDown" y
  // "uiChange" llaman a stopPlayer() y no hay nada en la librería que lo
  // vuelva a arrancar-. Sin esto, tocar el carrusel una sola vez lo frena
  // el resto de la visita, aunque el autoPlay esté configurado. Aplica a
  // los dos carruseles con autoPlay: Programas y Conductores.
  $( '#anchor01 .js-flickity, #anchor02 .js-flickity' ).each( function() {
    var flkty = $( this ).data( 'flickity' );
    if ( flkty ) {
      flkty.on( 'settle', function() {
        if ( !flkty.player.isPlaying ) {
          flkty.player.play();
        }
      });
    }
  });

  /*----------------------------------------------
          P O P U P   D E   P R O G R A M A
  ------------------------------------------------*/
  // La tarjeta del carrusel es un <div role="button">: Bootstrap solo la abre
  // con click, así que Enter y Espacio se agregan a mano para teclado.
  $( '#anchor01' ).on( 'keydown', '.cover[data-toggle="modal"]', function( e ) {
    if ( ( e.key === 'Enter' || e.key === ' ' ) && !e.repeat ) {
      e.preventDefault();
      $( this ).trigger( 'click' );
    }
  });

  // Badge "EN VIVO": se calcula en el navegador al abrir el popup (no en PHP)
  // para que una página cacheada no quede mostrando un estado viejo. Siempre
  // en hora de Montevideo, sin importar la zona horaria del visitante.
  var semana = [ 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ];

  function aMinutos( hhmm ) {
    var partes = /^(\d{1,2}):(\d{2})/.exec( hhmm || '' );
    return partes ? parseInt( partes[1], 10 ) * 60 + parseInt( partes[2], 10 ) : null;
  }

  function ahoraEnMontevideo() {
    try {
      var partes = new Intl.DateTimeFormat( 'en-US', {
        timeZone: 'America/Montevideo',
        weekday: 'long',
        hour: '2-digit',
        minute: '2-digit',
        hourCycle: 'h23'
      }).formatToParts( new Date() );
      var valores = {};
      partes.forEach( function( p ) { valores[ p.type ] = p.value; } );
      return {
        dia: semana.indexOf( valores.weekday ),
        minutos: ( parseInt( valores.hour, 10 ) % 24 ) * 60 + parseInt( valores.minute, 10 )
      };
    } catch ( err ) {
      return null;
    }
  }

  function estaAlAire( dias, inicio, fin, ahora ) {
    if ( !ahora || ahora.dia < 0 || inicio === null || fin === null || inicio === fin ) {
      return false;
    }
    var hoy = semana[ ahora.dia ];
    var ayer = semana[ ( ahora.dia + 6 ) % 7 ];
    if ( fin > inicio ) {
      return dias.indexOf( hoy ) !== -1 && ahora.minutos >= inicio && ahora.minutos < fin;
    }
    // Programa que cruza la medianoche (ej. 22:00 a 01:00).
    return ( dias.indexOf( hoy ) !== -1 && ahora.minutos >= inicio ) ||
           ( dias.indexOf( ayer ) !== -1 && ahora.minutos < fin );
  }

  $( '.program-modal' ).on( 'show.bs.modal', function() {
    var $badge = $( this ).find( '.program-modal__live' );
    if ( !$badge.length ) {
      return;
    }
    var alAire = estaAlAire(
      String( $badge.data( 'dias' ) || '' ).split( ',' ),
      aMinutos( String( $badge.data( 'inicio' ) ) ),
      aMinutos( String( $badge.data( 'fin' ) ) ),
      ahoraEnMontevideo()
    );
    $badge.prop( 'hidden', !alAire );
  });

  // El streaming embebido llega con data-src (ver siglo21_program_embed): se
  // carga al abrir el popup y se descarga al cerrarlo para que no siga sonando.
  $( '.program-modal' ).on( 'show.bs.modal', function() {
    $( this ).find( '.program-modal__embed iframe[data-src]' ).each( function() {
      this.src = this.getAttribute( 'data-src' );
    });
  }).on( 'hidden.bs.modal', function() {
    $( this ).find( '.program-modal__embed iframe[data-src]' ).removeAttr( 'src' );
  });

  /*----------------------------------------------
                L I G H T B O X
  ------------------------------------------------*/
  // Swipebox desactivado - causaba conflictos con otros elementos
  // $('.thumbnails .swipebox, #more-items .swipebox').swipebox();

  if ($(".playerVideo").length>0) { //If there are video backgrounds
    $(".playerVideo").mb_YTPlayer();
    $('.playerVideo').on("YTPPause",function(){
      $('.play-video').removeClass('playing');
    });
    $('.playerVideo').on("YTPPlay",function(){
      $('.play-video').addClass('playing');
    });
    $('.play-video').on('click', function(e) {
      if ($('.play-video').hasClass('playing')) {
        $(".playerVideo").pauseYTP();
      } else {
        $('audio').each(function (i,e) {
          this.pause(); 
        });
        $(".playerVideo").playYTP();
      }
    e.preventDefault();
  });
  }

});

  
/*---------------------------------------------- 
                 I S O T O P E
------------------------------------------------*/
$(window).load(function(){
  //ISOTOPE events
  var $container = $('.upevents').isotope({
    itemSelector: '.upevent',
    masonry: {
      columnWidth: '.upevent'
    }
  });

  //ISOTOPE media
  var $container = $('.thumbnails').isotope({
    itemSelector: '.thumbnail',
    masonry: {
      columnWidth: '.thumbnail.small'
    }
  });
  // filter items on button click
  $('.filters').on( 'click', 'li', function() {
    var filterValue = $(this).attr('data-filter');
    $container.isotope({ filter: filterValue });
  });

  // change is-checked class on buttons
  $('.filters').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'li', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $( this ).addClass('is-checked');
    });
  });

  // load more
  $('#append').click(function() {
    newItems = $('#more-items').appendTo('.thumbnails');
    $(".thumbnails").isotope('insert', newItems );
    $(this).hide();
    return false;
  });

});

/*---------------------------------------------- 
                 P A R A L L A X
------------------------------------------------*/
if($.fn.parallax) { 
    $('.parallax-section').parallax();
}

/*---------------------------------------------- 
            M E N U   A N C H O R S
------------------------------------------------*/
  $('a[href*=#]').click(function() {
   if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
     var $target = $(this.hash);
     $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
     if ($target.length) {
       var targetOffset = $target.offset().top;
        $('html,body').animate({scrollTop: targetOffset-42}, 1000);

        // collapse nav
        $('.navbar-collapse.in').removeClass('in').addClass('collapse');
        
        return false;
      }
    }
  });

/*---------------------------------------------- 
            M E N U   F I X E D
------------------------------------------------*/
$(function() {
  $(window).bind("scroll", function(){
      // El umbral original usaba la altura de ".jIntro" (el slider de
      // portada), que ya no existe en este tema -se sacó por no tener
      // contenido real-. Sin ese elemento la cuenta daba NaN y el header
      // nunca pasaba a "fixed". Se usa el mismo umbral que "overflow"
      // para que los dos pasen a la vez.
      if ($(window).scrollTop() >= 85) {
          $('#jHeader').addClass('overflow');
          $('#jHeader').addClass('fixed');
      } else {
          $('#jHeader').removeClass('overflow');
          $('#jHeader').removeClass('fixed');
      }
  });

$('.disc-tracklist').on('click', function() {
  alert( "CLICK" );
});

});

// more events
$('#more-events').click(function(){
    $('.upcomming-events-list li.more').slideToggle("slow");
    $(this).hide();
    return false;
});

})(jQuery);
