<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="page masterclass">
        <div class="page__header">
          <h1 class="page__title"><?php echo single_cat_title(); ?></h1>
        </div>
        <div class="page__content">
          <div class="row">
            <?php
              $categories = get_categories( array(
            	  'hide_empty' => 0,
                'parent' => 4
              ) );
              foreach ($categories as $cat):
                  $id = $cat->cat_ID;
                  $link = get_category_link($id);
                  $img = get_field('illustration', 'category_'.$id);  ?>
                  <div class="col-xs-12 col-sm-3col-md-3 col-lg-3">
                    <article class="masterclass__one">
                      <div class="masterclass__thumb"><a href="<?php echo $link; ?>"><img src="<?php echo $img; ?>" alt=""></a></div>
                      <h3 class="masterclass__name"><a href="<?php echo $link; ?>"><?php echo $cat->cat_name; ?> </a></h3>
                      <div class="masterclass__text">
                        <p><?php echo $cat->category_description; ?></p>
                      </div>
                    </article>
                  </div>

            <?php endforeach; ?>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="masterclass__description">
                <p><?php echo category_description(); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
