<?php get_header();?>
	<header>
		<a href="#"><h1><?php bloginfo ('name');?></h1></a>
	  <!--menu-->
    <?php

      $defaults = array(
        'theme_location'  => 'principal',
        'menu'            => 'principal',
        'container'       => 'div',
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
      );

      wp_nav_menu( $defaults );

    ?>
      <!--/menu-->
         
	</header>
    

  <div id="myCarousel" class="carousel slide">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"> </li>
          <li data-target="#myCarousel" data-slide-to="1"> </li>
          <li data-target="#myCarousel" data-slide-to="2"> </li>
        </ol>
        <!-- Carousel items -->
        <div class="carousel-inner">
          <div class="active item"><img src="<?php bloginfo ('template_url');?>/img/banner/banner01.png"  alt="banner"></div>
          <div class="item"><img src="<?php bloginfo ('template_url');?>/img/banner/banner01.png"  alt="banner"></div>
          <div class="item"><img src="<?php bloginfo ('template_url');?>/img/banner/banner01.png"  alt="banner"></div>
        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
  </div>

  <section class="content">
    <h2>Jewelry <span>&amp;</span> Shopping</h2>        
      <article>    
        <h2>Nuevos Productos</h2>
          <div class="row"> 
            <?php query_posts( 'category_name=producto&posts_per_page=8' ); //Definimos que muestra este loop ?>
            <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
                <div class="span3 producto">
                	<a href="<?php the_permalink() ?>">
                  <?php the_post_thumbnail('producto');?>
                  <span><!--<small>$ </small>--><?php the_title(); ?></span>
                  </a>
                  
                </div>
		        <?php endwhile; ?>
            <?php else : ?>
            <?php endif; ?>
			</div>
              




        </article> 

    



    </section>

  
<div class="clear"></div>

<?php get_footer();?>

