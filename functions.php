<?php
//aqui van tods las funciones extras
if(!is_admin()){
	wp_enqueue_style("main",get_bloginfo('stylesheet_url'));
  wp_enqueue_script("bootstrap",get_bloginfo('template_url')."/js/bootstrap.js", array('jquery'),'1.0');
	//wp_enqueue_script("bootstrap_ini",get_bloginfo('template_url')."/js/funciones.js", array('jquery','bootstrap'),'1.0');
}
add_action("template_redirect","slider");
function slider(){
	if (is_home()){
	wp_enqueue_script("easySlider1.7",get_bloginfo('template_url')."/js/easySlider1.7.js", array('jquery'),'1.0');
	//wp_enqueue_script("easySlider_inicio",get_bloginfo('template_url')."/js/banner.js", array('jquery','easySlider1.7'),'1.0');
	}
}

//imganes destacadas
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );
add_image_size('producto',270,270,true);
add_image_size('banner',1170,400,true);
add_image_size('gallery',100,100,true);
//phpthumbnails <--corta imagenes

//Agrego los menus
register_nav_menus(array(
	'principal' => 'menu principal'
    ));



register_sidebar(array(
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h2 class="widgettitle">',
'after_title' => '</h2>',
));

register_sidebar(array(
'name' => 'subfooterleft',
'before_widget' => '    ',
'after_widget' => '     ',
'before_title' => '<div class="title">',
'after_title' => '</div>',
));


register_sidebar(array(
'name' => 'subfootercenter',
'before_widget' => '    ',
'after_widget' => '     ',
'before_title' => '<div class="title">',
'after_title' => '</div>',
));

register_sidebar(array(
'name' => 'subfooterright',
'before_widget' => '    ',
'after_widget' => '     ',
'before_title' => '<div class="title">',
'after_title' => '</div>',
));

register_sidebar(array(
'name' => 'right',
'before_widget' => '    ',
'after_widget' => '     ',
'before_title' => '<div class="title">',
'after_title' => '</div>',
)); 


//Mostrar Ultimo twitter
function parse_feed($feed) {
    $stepOne = explode("<content type=\"html\">", $feed);
    $stepTwo = explode("</content>", $stepOne[1]);
    $tweet = $stepTwo[0];
    $tweet = str_replace("&lt;", "<", $tweet);
    $tweet = str_replace("&gt;", ">", $tweet);
    return $tweet;
}
 
function getTweet(){
$feed = "http://search.twitter.com/search.atom?q=from:freddy_LRI&rpp=1";
$twitterFeed = file_get_contents($feed);
echo parse_feed($twitterFeed);
}




// Agregar Opciones extras

add_action('init', 'product_register');

function product_register() {
	$args = array(
    	'label' => __('Products'),
    	'singular_label' => __('Product'),
    	'public' => true,
    	'show_ui' => true,
      'menu_icon' => get_stylesheet_directory_uri() . '/img/icon/cart-icon.png',
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'rewrite' => true,
    	'supports' => array('title', 'editor', 'thumbnail')
    );

	register_post_type( 'product' , $args );
}
	add_action("admin_init", "admin_init");
	add_action('save_post', 'save_price');
  add_action('save_post', 'guardar_fabricante'); //al guardar post guarda fabricante

	function admin_init(){
		add_meta_box("prodInfo-meta", "Opciones de Productos", "meta_options", "product", "side", "low");
    
	}

	function meta_options(){
		global $post;
		  $custom = get_post_custom($post->ID);
		  $price = $custom["price"][0];
      $fabricante = $custom["fabricante"][0];
		  echo '<label>Precio:</label><input type="text" name="price" value="'. $price .'" /> <br />';
      echo '<label>Fabricante:</label><input type="text" name="fabricante" value="'. $fabricante .'" />';
     
	}

	function save_price(){
		global $post;
		update_post_meta($post->ID, "price", $_POST["price"]);
  }
  // Creamos la funcion para guardar fabricante 
  function guardar_fabricante(){
    global $post;
    update_post_meta($post->ID, "fabricante", $_POST["fabricante"]);
}


// custom table columns
register_taxonomy("catalog", array("product"), array("hierarchical" => true, "label" => "Catalogs", "singular_label" => "Catalog", "rewrite" => true));  








?>















