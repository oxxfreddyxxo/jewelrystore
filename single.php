<?php

/*

Template Name: Page

*/

?>

<?php get_header();?>

<!--contenido-->

<!--single-->



<section class="content">
	<div class="row">
		<div class=" span3">
		 
		</div>
		<div>

		</div	

	</div>



	<div class="row-fluid">
	  <div class="span12">
	    <div class="row-fluid">
	      <div class="span4">
	      	 <?php if(has_post_thumbnail()):?>
	      	 <?php the_post_thumbnail('medium');?>
	      	 <?php endif; ?>
	      </div>
	      <div class="span8">

	      	<article>			
				<?php if(have_posts()) : ?>    <?php while(have_posts()) : the_post(); ?>
					 <?php
			             $custom = get_post_custom($post->ID);
			             $precio = $custom["price"][0];
			             $fabricante = $custom["fabricante"][0];
			           ?>

					<h2 id="post-<?php the_ID(); ?>"><?php the_title();?></h2>
					<aside style="withd:100%;">
					<?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings($pid); endif; ?>
					</aside>

					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
					
					<table>
						<tr>
							<th>Precio:</th>
							<td><?=$precio?></td>
						</tr>
						<tr>
							<th>fabricante:</th>
							<td><?=$fabricante?></td>
						</tr>
		            </table>
		        <?php endwhile; ?> <?php else : ?> <?php endif; ?>
			</article>
	      	
	      </div>	      	      
	    </div>
	  </div>
	</div>


	










<!--Fin contenido--> 

<div class="clear"></div>
</section>

<?php get_footer();?>



			