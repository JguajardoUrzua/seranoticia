<?php 

/*
*Template Name: Camara Testigo
*Description: Plantilla para mostrar una pagina con todos los reportajes
*/

get_header();?>
			
		
		<section id="single"  class="camaratestigo">
					
					
			<section id="posts" class="inline">
				<h2 class="titulos-grande azul-borde" ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
					<article id="post-single">
						<?php the_content(); ?>
					</article><!--end post-->
				<?php endwhile; else: ?>
					<p><?php _e("No existen noticias relacionadas!"); ?></p>
				<?php endif; ?>
			</section><!-- END posts -->
			<section id="sidebar-resto" class="inline sidebar">
				<?php get_sidebar(); ?>
			</section>	<!-- END sidebar -->
		</section><!--End single--> 
<?php  get_footer(); ?>

				