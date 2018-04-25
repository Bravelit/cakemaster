<?php

show_admin_bar( false );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'excerpt_more', function( $more ) {
  return '...';
});

if ( ! function_exists( 'cakemagic_setup' ) ) :
  function cakemagic_setup() {
    load_theme_textdomain( 'cakemagic', get_template_directory() . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
      'header' => esc_html__( 'Header Menu', 'cakemagic' ),
    ) );
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    add_theme_support( 'custom-background', apply_filters( 'cakemagic_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );

    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'custom-logo', array(
      'height'      => 60,
      'width'       => 60,
      'flex-width'  => true,
      'flex-height' => true,
    ) );
  }
endif;
add_action( 'after_setup_theme', 'cakemagic_setup' );

function cakemagic_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'cakemagic_content_width', 640 );
}
add_action( 'after_setup_theme', 'cakemagic_content_width', 0 );

function cakemagic_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'cakemagic' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'cakemagic' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'cakemagic_widgets_init' );

function cakemagic_scripts() {
  wp_enqueue_style( 'cakemagic-style', get_stylesheet_uri() );
  wp_enqueue_style('cakemagic-vendor-css', get_template_directory_uri() . '/libs/css/vendor.min.css', array(), null, false);
  wp_enqueue_style('cakemagic-common-css', get_template_directory_uri() . '/assets/css/common.min.css', array(), null, false);
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'cakemagic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
  wp_enqueue_script( 'cakemagic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
  wp_enqueue_script('cakemagic-vendor-js', get_template_directory_uri() . '/libs/js/vendor.min.js', array( 'jquery' ), null, true);
  wp_enqueue_script('cakemagic-common-js', get_template_directory_uri() . '/assets/js/common.min.js', array( 'jquery' ), null, true);
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'cakemagic_scripts' );

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

//Filter

function go_filter() {
	$args = array();
  $args['meta_query'] = array('relation' => 'AND');
	global $wp_query;

  if ($_REQUEST['theme']) {
    $themes = array('relation' => 'OR');
    foreach ($_REQUEST['theme'] as $value){
		$themes[] = array(
			'key' => 'theme',
			'value' => $value,
      'type' => 'text',
      'compare' => 'LIKE'
			);
    }
    $args['meta_query'][] = $themes;
	}

  if ($_REQUEST['place']) {
    $places = array('relation' => 'OR');
    foreach ($_REQUEST['place'] as $value){
		$places[] = array(
			'key' => 'place',
			'value' => $value,
      'type' => 'text',
      'compare' => 'LIKE'
			);
    }
    $args['meta_query'][] = $places;
	}

  if ($_REQUEST['period']) {
		$args['meta_query'][] = array(
			'key' => 'period',
			'value' => $_REQUEST['period'],
      'type' => 'text',
      'compare' => 'IN'
			);
	}


  if ($_REQUEST['genre']) {
		$args['meta_query'][] = array(
			'key' => 'genre',
			'value' => $_REQUEST['genre'],
      'type' => 'text',
      'compare' => 'IN'
			);
	}

	query_posts(array_merge($args,$wp_query->query));
}
