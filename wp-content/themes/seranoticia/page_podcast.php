<?php 

/*
*Template Name: Sera Noticia Radio
*Description: Plantilla para mostrar una pagina con todos los podcast
*/

get_header();?>
			
		
		<section id="single"  class="podcast">

					
			<section id="posts" class="inline">
			 <h2 class="titulos-grande azul-borde" ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
						<?php 
							$args = array( 'post_type' => 'podcast_sn');
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post(); 
						?>	
								<article id="post-single">
									<div class="textos inline">
										<h2 class="fecha-podcast">
											<?php the_title(); ?>
										</h2>
										 <div>
										 	<?php the_content(); ?>
										 </div>							
									</div>
									<div class="reproductor_podcast inline">
										<?php echo do_shortcode('[powerpress]'); ?>
									</div>
								</article><!--end post-single-->
							<?php endwhile;	?>
			
		
		
			<?php endwhile; else: ?>
				<p><?php _e("No existen noticias relacionadas!"); ?></p>
			<?php endif; ?>
		</section><!-- END posts -->
			<section id="sidebar-resto" class="inline sidebar">
			<?php get_sidebar(); ?>
		</section>	<!-- END sidebar -->
	</section><!--End single--> 
<?php  get_footer(); ?>

				