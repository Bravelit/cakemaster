<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="page blog">
        <div class="page__header">
          <h1 class="page__title"></h1>
        </div>
        <div class="page__content blog__content">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <section class="blog__one">
            <div class="row">
              <div class="col-sm-5 col-md-4 col-lg-3">
                <a href="#">
                  <div class="blog__thumb">
                    <?php the_post_thumbnail( array() ); ?>
                  </div>
                </a>
              </div>
              <div class="col-sm-7 col-md-8 col-lg-9">
                <div class="blog__headline">
                  <h3 class="blog__name"><a class="blog__link" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <div class="blog__date"><?php the_time(); ?></div>
                </div>
                <a class="blog__link" href="<?php echo get_permalink(); ?>">
                  <div class="blog__description">
                    <?php the_excerpt(); ?>
                  </div>
                </a>
                <a class="btn btn-success" href="<?php echo get_permalink(); ?>">Подробнее</a>
              </div>
            </div>
          </section>
          <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
