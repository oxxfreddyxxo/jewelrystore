<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
 
   <!-- METAS -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta charset="<?php bloginfo( 'charset' ); //cambiamos <meta charset="utf-8"> por su   ?>" />
   <!-- /METAS -->
 
   <title><?php
        /*Con este código agregamos a wordpress un titulo que cambia dependiendo 
        * del lugar donde te encuentres en el blog. También puede utilizar <?php bloginfo('name'); ?>
        * Muestra en la etiqueta <title> el nombre de lo que está viendo, la forma en la que lo estamos creando
        * es mucho más amigable para los navegadores ya que muestra información de cada lugar que estés.
        */
        global $page, $paged;
 
        wp_title( '|', true, 'right' );
 
        // Agrega el nombre del blog.
        bloginfo( 'name' );
 
        // Agrega la descripción del blog, en la página principal.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";
 
        // Agrega el número de página si es necesario:
        if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
        ?>
   </title>
 
   <!-- CSS -->
   <link href='<?php bloginfo( 'stylesheet_url' ); ?>' rel="stylesheet" />
   <!-- /CSS -->
 
   <!-- RSS & PINGBACKS -->
   <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
   <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
   <!-- /RSS & PINGBACKS -->
 
   <?php /* Para compatibilizar HTML5 con navegadores antiguos */ ?>
   <!--[if IE]>
   <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
 
   <?php
        /*Siempre agrege wp_head antes del cierre de </ head> de su thema,
        * si no lo agrega puede que muchos plugins no funcionen ya que
        * lo utilizan este gancho (hook)para agregar elementos al head.
        */
        wp_head();
   ?>

<script>
  $(document).ready(function() {
    $('.carousel').carousel({
      interval: 2000
    }) 
  });
</script>

  
</head>
<body <?php body_class(); ?>>
<div class="container">
