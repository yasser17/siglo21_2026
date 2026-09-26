	<!-- REPRODUCTOR EN VIVO -->
	<?php
	// current_time() usa el huso horario configurado en el sitio (Ajustes >
	// Generales), no el del servidor. Con date() a secas el servidor corre
	// en UTC mientras el sitio está en America/Montevideo (UTC-3), así que
	// terminaba comparando contra la hora equivocada y mostraba el
	// programa de 3 horas más tarde.
	$hoy_reproductor = current_time( 'l' );
	$hora_actual     = current_time( 'H:i' );

	$programa_en_vivo = new WP_Query( array(
		'post_type'      => 'programa',
		'posts_per_page' => 1,
		'meta_query'     => array(
			array(
				'key'     => 'dias',
				'value'   => '"' . $hoy_reproductor . '"',
				'compare' => 'LIKE',
			),
			array(
				'key'     => 'hora_inicio',
				'value'   => $hora_actual,
				'compare' => '<=',
			),
			array(
				'key'     => 'hora_fin',
				'value'   => $hora_actual,
				'compare' => '>=',
			),
		),
	) );

	$titulo_en_vivo = $programa_en_vivo->have_posts() ? get_the_title( $programa_en_vivo->posts[0] ) : 'En vivo';
	wp_reset_postdata();

	// [0] = normal, [1] = alta -el toggle de calidad cambia entre estos dos
	// índices y, si ya está sonando, reconecta el audio al nuevo stream.
	$stream_urls = array(
		'https://hmdsystem.info:8193/siglo',
		'https://emisiones.com.uy:8149/2als',
	);
	?>

	<div class="player horizontal" id="radio-player" data-stream-urls="<?php echo esc_attr( wp_json_encode( $stream_urls ) ); ?>">
		<div class="container">
			<div class="info-album-player">
				<div class="album-cover" style="background-image:url('<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/favicon-196x196.png');"></div>
				<p class="album-title"><?php bloginfo( 'name' ); ?></p>
				<p class="artist-name"><?php echo esc_html( $titulo_en_vivo ); ?></p>
			</div>
			<div class="player-content">
				<audio preload="none"></audio>
				<div class="audiojs">
					<div class="play-pause">
						<p class="play"><i class="fa fa-play"></i></p>
						<p class="pause"><i class="fa fa-pause"></i></p>
						<p class="loading"><i class="fa fa-spinner fa-spin"></i></p>
					</div>
				</div>
				<div class="player-volume">
					<i class="fa fa-volume-up"></i>
					<input type="range" class="volume-slider" min="0" max="1" step="0.05" value="1" aria-label="Volumen">
				</div>
				<div class="stream-quality">
					<span class="quality-label" data-quality-label="0">Normal</span>
					<label class="ios-toggle">
						<input type="checkbox" class="quality-toggle" aria-label="Cambiar a calidad alta">
						<span class="ios-toggle-slider"></span>
					</label>
					<span class="quality-label" data-quality-label="1">Alta</span>
				</div>
			</div>
		</div>
	</div>

	<!-- FOOTER -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="footer-content">
						<img class="footer-logo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/basic/logo2.png" alt="<?php bloginfo( 'name' ); ?>">
						<p class="footer-copy">&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php bloginfo( 'description' ); ?></p>
						<p class="footer-legal">En cumplimiento del Decreto del Poder Ejecutivo N&deg; 387/2011 se informa que el titular de la frecuencia 101.5 Mhz es el Sr. Carlos Leonardo Gelpi.</p>
						<div class="footer-divider" aria-hidden="true"></div>
						<p class="footer-credit">Sitio desarrollado por <a href="https://wa.me/59891336302" target="_blank" rel="noopener noreferrer">Yasser Mussa</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>