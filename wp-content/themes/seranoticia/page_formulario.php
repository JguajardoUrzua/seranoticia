<?php 

/*
*Template Name: Formulario
*Description: Plantilla Formulario
*/

get_header();?>
			
		
		<section id="single"  class="formulario">
			<section id="posts" class="inline">
				
			
				 <h2 class="titulos-grande verde-borde" ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					
				<!-- <article id="post-single"> -->
				<?php if(have_posts()):while(have_posts()):the_post(); ?>
				 	<h2 id="texto_pagina_formulario"><?php the_content(); ?></h2>
				 <?php endwhile; ?>
				<?php endif; ?>
					<?php get_template_part('formulario'); ?>
				<!-- </article> -->
			</section>
		

		<section id="sidebar-resto" class="inline sidebar">
			<?php get_sidebar(); ?>
		</section>	<!-- END sidebar -->
	</section><!--End single--> 
<?php  get_footer(); ?>

				