<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
      <div class="category">
        <div class="category__header">
          <h1 class="category__title"><?php echo single_cat_title(); ?></h1>
        </div>
        <div class="category__content">
          <div class="row">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="col-sm-4 col-md-3 category__one">
              <a class="other" href="<?php echo get_permalink(); ?>">
                <div class="other__transform">
                  <div class="other__front">
                    <div class="other__thumb">
                      <?php the_post_thumbnail( array() ); ?>
                    </div>
                  </div>
                  <div class="other__back">
                    <h2 class="other__name center-block"><?php the_title(); ?></h2>
                    <div class="other__description center-block">
                      <?php the_excerpt(); ?>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <?php endwhile; endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
