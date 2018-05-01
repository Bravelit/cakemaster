<?php get_header(); ?>

<section class="main section">
  <div class="main__header">
    <h1 class="main__title text-center"><?php bloginfo('description'); ?></h1>
    <div class="main__subtitle text-center"><?php bloginfo('name'); ?></div>
  </div>
</section>
<section class="section service">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="section__title">Здесь Вы найдете:</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <article class="service__one">
          <div class="service__thumb"><a href="<?php echo get_field('master-link'); ?>"><img src="<?php echo get_field('master-image'); ?>" alt=""></a></div>
          <h3 class="service__name"><a href="#"><?php echo get_field('master-caption'); ?></a></h3>
          <div class="service__description">
            <p><?php echo get_field('master-description'); ?></p>
          </div>
        </article>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <article class="service__one">
          <div class="service__thumb"><a href="<?php echo get_field('recipe-link'); ?>"><img src="<?php echo get_field('recipe-image'); ?>" alt=""></a></div>
          <h3 class="service__name"><a href="#"><?php echo get_field('recipe-caption'); ?></a></h3>
          <div class="service__description">
            <p><?php echo get_field('recipe-description'); ?></p>
          </div>
        </article>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <article class="service__one">
          <div class="service__thumb"><a href="<?php echo get_field('blog-link'); ?>"><img src="<?php echo get_field('blog-image'); ?>" alt=""></a></div>
          <h3 class="service__name"><a href="#"><?php echo get_field('blog-caption'); ?></a></h3>
          <div class="service__description">
            <p><?php echo get_field('blog-description'); ?></p>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
