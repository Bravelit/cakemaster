<!DOCTYPE html>
<html>
	<head>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
  </head>
  <body class="body">
    <div class="site">
      <header class="header site__header">
        <nav class="navbar navbar-inverse navbar-static-top header__navbar">
          <div class="container-fluid">
            <div class="navbar-header">
              <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#header__navigation" aria-expanded="false"><span class="sr-only">Открыть меню</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="#"><img src="assets/images/logo/logo.png" alt="Logo"></a>
            </div>
            <div class="collapse navbar-collapse" id="header__navigation">
              <?php
                wp_nav_menu( array(
                  'theme_location' => 'header',
                  'container'      => false,
                  'menu_class'     => 'nav navbar-nav'
                 ) );
              ?>
              <div class="navbar-text navbar-right header__phone"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span>+7 (123) 456-78-90</div>
            </div>
          </div>
        </nav>
      </header>
      <div class="site__content content">
