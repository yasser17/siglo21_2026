<div class="loop animatedParent row">

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<?php 

	$queried_object = get_queried_object();
	$taxonomy = $queried_object->taxonomy;
	$term_id = $queried_object->term_id;
	$categoria_thumbnail_url = get_field('imagen', $taxonomy . '_' . $term_id);

	?> 

	<div class="col-xs-12 col-sm-6 col-md-4 col-md-3 fadeInUp animated">
		<div class="news_box">
			<a href="<?php the_permalink(); ?>">
				<div class="news_thumbnail" style="background-image: url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url('', 'listados-thumbnail') : $categoria_thumbnail_url ?>);"></div>
				<div class="news_info_wrapper">
					<div class="news_info">
						<h5> <?php the_title(); ?> </h5>
						<h6> <?php the_time('d \d\e F, Y') ?> </h6>
					</div>
				</div>
				<div class="hover">
					<span class="triggerNews">
						Ver más
					</span>
				</div>
			</a>
		</div> 
	</div>

	<?php endwhile; endif; ?>

</div>