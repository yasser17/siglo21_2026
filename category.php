<?php get_header(); ?>

<main role="main">
	<section class="section_first">
		<div class="pageContentArea">
			<article class="newsContent">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="section_head_widget post-header animatedParent">
								<h2 class="animated fadeInLeft go"><?php single_cat_title(); ?></h2>
								<h5 class="animated bounceInUp go">

								<?php 

								$queried_object = get_queried_object();
								$taxonomy = $queried_object->taxonomy;
								$term_id = $queried_object->term_id;

								?> 
								
								<?php echo get_field('subtitulo',  $taxonomy . '_' . $term_id); ?> 

								</h5>
							</div>						
						</div>
					</div>
				</div>
												
				<?php get_template_part('loop'); ?>

				<div class="container">
					<div class="row">
						<div class="text-center">

						<?php get_template_part('pagination'); ?>

						</div>
					</div>
				</div>
			</article>
		</div>
	</section>
</main>

<?php get_footer(); ?>