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

  if ($_REQUEST['type']) {
		$args['meta_query'][] = array(
			'key' => 'type',
			'value' => $_REQUEST['type'],
      'type' => 'text',
      'compare' => 'IN'
			);
	}

	query_posts(array_merge($args,$wp_query->query));
}

//Добавление изображенияк рубрике
add_action( 'category_edit_form_fields', 'mayak_update_category_image' , 10, 2 );
function mayak_update_category_image ( $term, $taxonomy ) {
?>
   <style>
   img{border:3px solid #ccc;}
   .term-group-wrap p{float:left;}
   .term-group-wrap input{font-size:18px;font-weight:bold;width:40px;}
   #bitton_images{font-size:18px;}
   #bitton_images_remove{font-size:18px;margin:5px 5px 0 0;}
   </style>
   <tr class="form-field term-group-wrap">
     <th scope="row">
       <label for="id-cat-images">Изображение</label>
     </th>
     <td>
       <p><input type="button" class="button bitton_images" id="bitton_images" name="bitton_images" value="+" /></br>
       <input type="button" class="button bitton_images_remove" id="bitton_images_remove" name="bitton_images_remove" value="&ndash;" /></p>
       <?php $id_images = get_term_meta ( $term -> term_id, 'id-cat-images', true ); ?>
       <input type="hidden" id="id-cat-images" name="id-cat-images" value="<?php echo $id_images; ?>">
       <div id="cat-image-miniature">
         <?php if (empty($id_images )) { ?>
         <img src="http://cakemastering.loc/wp-content/themes/cakemagic/assets/images/wp.png" alt="Zaglushka" width="84" height="89"/>
         <?php } else {?>
           <?php echo wp_get_attachment_image ( $id_images, 'thumbnail' ); ?>
         <?php } ?>
       </div>
     </td>
   </tr>
<?php
}
if(preg_match("#tag_ID=([0-9.]+)#", $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']))
add_action( 'admin_footer', 'mayak_loader'  );
function mayak_loader() { ?>
   <script>
     jQuery(document).ready( function($) {
       function mayak_image_upload(button_class) {
         var mm = true,
         _orig_send_attachment = wp.media.editor.send.attachment;
         $('body').on('click', button_class, function(e) {
           var mb = '#'+$(this).attr('id');
           var mt = $(mb);
           mm = true;
           wp.media.editor.send.attachment = function(props, attachment){
             if (mm) {
               $('#id-cat-images').val(attachment.id);
               $('#cat-image-miniature').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
               $('#cat-image-miniature .custom_media_image').attr('src',attachment.sizes.thumbnail.url).css('display','block');
             } else {
               return _orig_send_attachment.apply( mb, [props, attachment] );
             }
            }
         wp.media.editor.open(mt);
         return false;
       });
     }
     mayak_image_upload('.bitton_images.button');
     $('body').on('click','.bitton_images_remove',function(){
       $('#id-cat-images').val('');
       $('#cat-image-miniature').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
     });
     $(document).ajaxComplete(function(event, xhr, settings) {
       var mk = settings.data.split('&');
       if( $.inArray('action=add-tag', mk) !== -1 ){
         var mh = xhr.responseXML;
         $mr = $(mh).find('term_id').text();
         if($mr!=""){
           $('#cat-image-miniature').html('');
         }
       }
     });
   });
</script>
<?php }
add_action( 'edited_category','mayak_updated_category_image' , 10, 2 );
function mayak_updated_category_image ( $term_id, $tt_id ) {
   if( isset( $_POST['id-cat-images'] ) && '' !== $_POST['id-cat-images'] ){
     $image = $_POST['id-cat-images'];
     update_term_meta ( $term_id, 'id-cat-images', $image );
   } else {
     update_term_meta ( $term_id, 'id-cat-images', '' );
   }
}

//Вывод подрубрик
function mayak_cats_images(){
$ags = array(
'taxonomy'=>'category',
'parent' => get_query_var('cat'),
'meta_query' => array(array('key' => 'id-cat-images',)),
);
print_r($ags);
$terms = get_terms($ags);
print_r($terms);
 $count = count($terms);
 if($count > 0){
     foreach ($terms as $term) {
     $term_taxonomy_id = $term->term_taxonomy_id;
     $image_id = get_term_meta ( $term_taxonomy_id, 'id-cat-images', true );
     $image_array = wp_get_attachment_image_src( $image_id, full);
       echo '1';
     }
 }
}

//Дополнительные настройки
add_action('customize_register', function($customizer){
  $customizer->add_section(
    'example_section_one',
    array(
      'title' => 'Контакты',
      'description' => 'Контакты',
      'priority' => 11,
    )
  );
  $customizer->add_setting(
    'example_tel',
    array('default' => '')
  );
  $customizer->add_control(
    'example_tel',
    array(
      'label' => 'Телефона',
      'section' => 'example_section_one',
      'type' => 'text',
    )
  );
  $customizer->add_setting(
    'example_email',
    array('default' => '')
  );
  $customizer->add_control(
    'example_email',
    array(
      'label' => 'E-mail',
      'section' => 'example_section_one',
      'type' => 'text',
    )
  );
});
