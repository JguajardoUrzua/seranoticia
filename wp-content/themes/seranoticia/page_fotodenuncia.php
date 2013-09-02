<?php 

/*
*Template Name: Foto Denuncia
*Description: Plantilla para mostrar una pagina con todos las Foto denuncias
*/

get_header();?>
			
		
		<section id="single"  class="fotodenuncia">
				
			<section id="posts" class="inline">
				<h2 class="titulos-grande azul-borde" ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
			 <?php echo do_shortcode("[nggallery id=1]");  ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
			<!-- <article id="post-single"> -->
				<!-- <div class="textos inline"> -->
					
					
				<!-- 	<div id="small" class="azul-borde">
						Por <?php the_author_posts_link();?> el <a href="<?php the_permalink(); ?>"><?php the_time('l d F, Y'); ?></a>
					</div> -->
					<!-- <div id="noticia" >
					
					</div> -->
				<!-- </div> --><!--END textos inline-->
			<!-- </article> --><!--end post-->
			<?php endwhile; else: ?>
				<p><?php _e("No existen noticias relacionadas!"); ?></p>
			<?php endif; ?>
		</section><!-- END posts -->
			<section id="sidebar-resto" class="inline sidebar">
			<?php get_sidebar(); ?>
		</section>	<!-- END sidebar -->
	</section><!--End single--> 
<?php  get_footer(); ?>

				