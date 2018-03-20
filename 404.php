<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page">
				<div class="page__header">
					<h1 class="page__title">Страница не найдена!</h1>
				</div>
				<div class="page__content">
					<div class="error-404__thumb"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/
assets/images/404/404.jpg" alt=""></div>
					<div class="error-404__description">
						<p>К сожалению, запрашиваемая страница не найдена. Воспользуйтесь основным меню сайта.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
