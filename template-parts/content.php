<div class="page single">
	<div class="page__header">
		<h1 class="page__title"><?php the_title(); ?></h1>
	</div>
	<div class="page__content">
		<div class="slider"><img src="<?php the_post_thumbnail_url(); ?>" alt=""></div>
		<div class="single__description">
			<?php the_content(); ?>
		</div>
	</div>
</div>
