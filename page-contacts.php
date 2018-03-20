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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95777.33906373222!2d2.0787281749528796!3d41.394897593327535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49816718e30e5%3A0x44b0fb3d4f47660a!2sBarcelona!5e0!3m2!1sen!2ses!4v1516813835229" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <div class="contact">
                <ul class="contact__list">
                  <li class="contact__item">Телефон: +7 (123)456-99999</li>
                  <li class="contact__item">Адрес: Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                  <li class="contact__item">Время работы: с 09:00 до 20:00 без выходных</li>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
