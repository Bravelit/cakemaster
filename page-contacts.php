<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="page">
        <div class="page__header">
          <h1 class="page__title">Контакты</h1>
        </div>
        <div class="page-content">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <div class="map">
                <?php while (have_posts()) : the_post();
            the_content();
            endwhile;
          ?>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <div class="contact">
                <ul class="contact__list">
                  <li class="contact__item">Телефон: <?php echo get_field('phone'); ?></li>
                  <li class="contact__item">Адрес: <?php echo get_field('adress'); ?></li>
                  <li class="contact__item">Время работы: <?php echo get_field('working_time'); ?></li>
                </ul>
              </div>
              <form class="form">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
                    <input class="form-control" id="exampleInputAmount" type="text" placeholder="Ваше имя">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
                    <input class="form-control" id="exampleInputAmount" type="text" placeholder="Ваш почтовый ящик">
                  </div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="5" placeholder="Задайте вопрос или напишите Ваши пожелания"></textarea>
                </div>
                <button class="btn btn-danger" type="submit">Отправить сообщение админинстратору</button>
              </form>
              <form class="form">
                <?php echo do_shortcode( '[contact-form-7 id="65" title="Контактная форма 1"]' ); ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
