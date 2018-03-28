<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
		<?php
			if (have_posts()) : while (have_posts()) : the_post();
			get_template_part( 'template-parts/content', get_post_format() );
			endwhile; endif;
		?>
		</div>
		<div class="hidden-xs col-sm-4 col-md-4 col-lg-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
