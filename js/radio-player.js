/**
 * Reproductor del streaming en vivo de Radio Siglo 21.
 *
 * No usa audiojs para el playback: audiojs retoma el audio pausado desde el
 * buffer viejo, lo que en un streaming en vivo se escucha como si el tiempo
 * se hubiera "congelado". En su lugar, se re-conecta al stream cada vez que
 * se reanuda, igual que hacía el reproductor jPlayer del tema anterior.
 */
(function ($) {
    'use strict';

    var $player = $('#radio-player');

    if (!$player.length) {
        return;
    }

    var streamUrls = $player.data('stream-urls') || [];
    var audio = $player.find('audio')[0];
    var $audiojs = $player.find('.audiojs');

    var isPlaying = false;
    var streamIndex = 0;

    function play() {
        $audiojs.removeClass('error playing').addClass('loading');
        audio.src = streamUrls[streamIndex];
        audio.load();

        var playPromise = audio.play();

        if (playPromise && typeof playPromise.catch === 'function') {
            playPromise.catch(function () {
                $audiojs.removeClass('loading').addClass('error');
                isPlaying = false;
            });
        }
    }

    function stop() {
        audio.pause();
        audio.removeAttribute('src');
        audio.load();
        $audiojs.removeClass('playing loading error');
    }

    $player.find('.play-pause').on('click', function () {
        if (!streamUrls.length) {
            return;
        }

        if (isPlaying) {
            stop();
            isPlaying = false;
        } else {
            play();
            isPlaying = true;
        }
    });

    audio.addEventListener('playing', function () {
        $audiojs.removeClass('loading error').addClass('playing');
    });

    audio.addEventListener('waiting', function () {
        $audiojs.addClass('loading');
    });

    audio.addEventListener('error', function () {
        if (isPlaying) {
            $audiojs.removeClass('loading playing').addClass('error');
        }
    });

    // Calidad: toggle estilo iOS que cambia entre stream normal (índice 0)
    // y alta (índice 1). Si ya está sonando, reconecta al nuevo stream en
    // caliente en vez de esperar a que el usuario le dé play de nuevo.
    var $qualityToggle = $player.find('.quality-toggle');

    $qualityToggle.on('change', function () {
        streamIndex = this.checked ? 1 : 0;

        if (isPlaying) {
            play();
        }
    });

    // Volumen
    var $volumeSlider = $player.find('.volume-slider');
    var $volumeIcon = $player.find('.player-volume .fa');

    function updateVolumeIcon(value) {
        $volumeIcon
            .toggleClass('fa-volume-off', value === 0)
            .toggleClass('fa-volume-up', value > 0);
    }

    // Chrome/Safari no soportan un pseudo-elemento nativo para "rellenar"
    // el input[type=range] hasta el valor actual (Firefox sí, vía
    // ::-moz-range-progress en el CSS). Se simula con un gradiente.
    function updateVolumeFill(value) {
        var percent = value * 100;
        $volumeSlider[0].style.background =
            'linear-gradient(to right, var(--color-marca) ' + percent + '%, #3a3a3a ' + percent + '%)';
    }

    var initialVolume = parseFloat($volumeSlider.val());
    audio.volume = initialVolume;
    updateVolumeFill(initialVolume);

    $volumeSlider.on('input', function () {
        var value = parseFloat(this.value);
        audio.volume = value;
        updateVolumeIcon(value);
        updateVolumeFill(value);
    });

})(jQuery);
