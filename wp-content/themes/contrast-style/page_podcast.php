<?php 

/*
*Template Name : Page_podcast
*Description : Plantilla para mostrar una pagina con todos los podcast
*/

get_header();?>
			
		
		<section id="single"  >
			<section id="posts" class="inline">
			 
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
			<article id="post-single">
				
				<div class="textos inline">
					
					<h2 class="titulos-grande" ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div id="small" class="azul-borde">
						Por <?php the_author_posts_link();?> el <a href="<?php the_permalink(); ?>"><?php the_time('l d F, Y'); ?></a>
					</div>
					<div id="noticia" >
						<?php 
							$args = array( 'post_type' => 'podcast_sn');
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
								the_title();
								echo do_shortcode('[powerpress]');
							endwhile;
						?>
					</div>
				</div><!--END textos inline-->
			</article><!--end post-->
			<?php endwhile; else: ?>
				<p><?php _e("No existen noticias relacionadas!"); ?></p>
			<?php endif; ?>
		</section><!-- END posts -->
			<section id="sidebar" class="inline">
			<?php get_sidebar(); ?>
		</section>	<!-- END sidebar -->
	</section><!--End single--> 
<?php  get_footer(); ?>

				