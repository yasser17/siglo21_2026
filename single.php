<?php get_header(); ?>

<?php while ( have_posts() ) : the_post();
	$categoria = get_the_category();
	$categoria_slug = ! empty( $categoria ) ? $categoria[0]->slug : '';
	$categoria_nombre = ! empty( $categoria ) ? $categoria[0]->name : '';
?>

<section class="section blog single-post">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<article class="post-details" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php if ( has_post_thumbnail() && 'noticias-musicales' === $categoria_slug ) : ?>
						<img class="featured-image" src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" alt="<?php the_title_attribute(); ?>">
					<?php endif; ?>

					<h4 class="title small">
						<span class="gray">Publicado por:</span> <?php the_author(); ?>
						<?php if ( $categoria_nombre ) : ?>
							| <?php echo esc_html( $categoria_nombre ); ?>
						<?php endif; ?>
					</h4>

					<h1 class="title post-detail"><?php the_title(); ?></h1>

					<p class="quote-post"><?php echo esc_html( get_the_time( 'j \d\e F, Y' ) ); ?></p>

					<div class="text_widget post-content">
						<?php the_content(); ?>
					</div>

					<?php if ( 'informes' === $categoria_slug ) : ?>

					<div class="voffset50"></div>
					<div class="post-source">
						<h4 class="title small">Información por</h4>
						<a href="https://canal8salto.com.uy/" target="_blank" rel="noopener noreferrer">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/basic/logo_canal8.png" alt="Logo de Canal 8">
						</a>
						<a href="http://www.cablevisionsalto.com.uy/" target="_blank" rel="noopener noreferrer">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/basic/logo_cvs.png" alt="Logo de CVS">
						</a>
					</div>

					<?php endif; ?>

					<div class="voffset50"></div>
					<hr>
					<div class="voffset30"></div>

					<ul class="channels_list row">
						<li class="col-xs-12 col-sm-4">
							<a href="#" class="st-custom-button btn rounded" data-network="facebook">
								<i class="fa fa-facebook"></i> Compartila en Facebook
							</a>
						</li>
						<li class="col-xs-12 col-sm-4">
							<a href="#" class="st-custom-button btn rounded" data-network="whatsapp">
								<i class="fa fa-whatsapp"></i> Mandala por WhatsApp
							</a>
						</li>
						<li class="col-xs-12 col-sm-4">
							<a href="#" class="st-custom-button btn rounded" data-network="twitter">
								<i class="fa fa-twitter"></i> Compartila en Twitter
							</a>
						</li>
					</ul>

					<?php if ( comments_open() || get_comments_number() ) : ?>
						<div class="voffset80"></div>
						<?php comments_template(); ?>
					<?php endif; ?>

				</article>

			</div>
		</div>
	</div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
