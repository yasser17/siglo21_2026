<?php
/**
 * Main template file
 *
 * @package Siglo21_2026
 */

get_header();
?>

<!-- INTRO -->
<section class="intro full-width jIntro" id="anchor00">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="slider-intro">
					<div id="slides">
						<div class="overlay"></div>
						<div class="slides-container">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/template-images/demo/intro/intro-slide1.jpg" alt="slide1">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/template-images/demo/intro/intro-slide2.jpg" alt="slide2">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/template-images/demo/intro/intro-slide3.jpg" alt="slide3">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="vcenter text-center text-overlay">
			<div class="logo-intro"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/template-images/demo/logo-intro.png" alt="<?php bloginfo( 'name' ); ?>"></div>
			<div id="owl-main-text" class="owl-carousel">
				<div class="item">
					<h1 class="primary-title"><?php bloginfo( 'name' ); ?></h1>
				</div>
				<div class="item">
					<h1 class="primary-title"><?php bloginfo( 'description' ); ?></h1>
				</div>
			</div>
			<h2 class="subtitle-text">Bienvenido a nuestro sitio</h2>
			<div class="voffset50"></div>
			<a href="#anchor01" class="btn btn-invert">Descubre más</a>
		</div>

	</div>
</section>

<!-- PLAYER -->
<div class="player horizontal">
	<div class="container">
		<div class="info-album-player">
			<div class="album-cover" id="bg-image3"></div>
			<p class="album-title"><?php bloginfo( 'name' ); ?></p>
			<p class="artist-name"><?php bloginfo( 'description' ); ?></p>
		</div>
		<div class="player-content">
			<audio preload></audio>
			<ol class="playlist">
				<li><a href="#" data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/template-images/mp3/01Electronica_Music_by_Igormaykop951_preview.mp3">Canción 1</a></li>
				<li><a href="#" data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/template-images/mp3/02Indie_Rock_Music_by_OctoSound_preview.mp3">Canción 2</a></li>
				<li><a href="#" data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/template-images/mp3/03preview_mp3.mp3">Canción 3</a></li>
			</ol>
			<div class="nextprev">
				<span class="prev">prev</span>
				<span class="next">next</span>
			</div>
			<span class="btnloop">loop</span>
		</div>
	</div>
</div>

<!-- UPCOMING EVENTS -->
<section class="section upcomming-events" id="anchor01">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="voffset70"></div>
				<div class="separator-icon">
					<i class="fa fa-ticket"></i>
				</div>
				<div class="voffset30"></div>
				<p class="pretitle">Próximos eventos</p>
				<div class="voffset20"></div>
				<h2 class="title">Eventos próximos</h2>
				<div class="voffset80"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="upevents">
					<?php
						$args = array(
							'post_type'      => 'post',
							'posts_per_page' => 6,
							'orderby'        => 'date',
							'order'          => 'DESC',
						);
						$query = new WP_Query( $args );

						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								?>
								<div class="upevent">
									<div class="contain">
										<?php if ( has_post_thumbnail() ) { ?>
											<div class="bg-image" style="background-image: url('<?php the_post_thumbnail_url( 'large' ); ?>')"></div>
										<?php } else { ?>
											<div class="bg-image" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/img/template-images/demo/events/photo-event1.jpg')"></div>
										<?php } ?>
										<div class="content">
											<div class="voffset80"></div>
											<div class="title"><?php the_title(); ?></div>
											<p><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
											<p class="buttons">
												<a href="<?php the_permalink(); ?>" class="btn rounded border">Ver detalles</a>
											</p>
											<div class="voffset70"></div>
											<div class="posted"><span>publicado:</span> <?php echo esc_html( get_the_date( 'd F, Y' ) ); ?></div>
										</div>
									</div>
								</div>
								<?php
							}
							wp_reset_postdata();
						}
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="voffset80"></div>
</section>

<?php get_footer(); ?>
