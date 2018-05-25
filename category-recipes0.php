<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
      <div class="category">
        <div class="category__header">
          <h1 class="category__title"><?php echo single_cat_title(); ?></h1>
          <form>
          <ul class="category__navigation">
            <li><a href="http://cakemastering.loc/category/recipes/">Все</a></li>
            <li><a href="http://cakemastering.loc/category/recipes/?type=zak">Закуски</a></li>
            <li><a href="http://cakemastering.loc/category/recipes/?type=meat">Мясо</a></li>
            <li><a href="http://cakemastering.loc/category/recipes/?type=luqids">Напитки</a></li>
            <li><a href="http://cakemastering.loc/category/recipes/?type=pasta">Паста</a></li>
            <li><a href="http://cakemastering.loc/category/recipes/?type=salats">Салаты</a></li>
            <li><a href="http://cakemastering.loc/category/recipes/?type=salsa">Соусы</a></li>
            <li><a href="http://cakemastering.loc/category/recipes/?type=soaps">Супы</a></li>
          </ul>
        </form>
        </div>
        <div class="category__content">
          <div class="row">
            <?php
              global $query_string;
              if ($_GET && !empty($_GET)) {
            	 go_filter();}
            if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
