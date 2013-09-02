<?php get_header();?>
			
	<section id="single"  >
		<section id="posts" class="inline"> 
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
			<article id="post-single">
				
				<div class="textos inline">
					
					<h2 class="titulos-grande" >
						<a class="titulo-single" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<div id="small"  class="verde-borde">
						Por <?php the_author_posts_link();?> el <a href="<?php the_permalink(); ?>"><?php the_time('l d F, Y'); ?> en <?php the_category(', '); ?></a>
					</div>
					<div id="noticia" >
						<?php the_content(); ?>
					</div>
					
				</div><!--END textos inline-->
				
			</article><!--end post-->

			<?php endwhile; else: ?>
				<p><?php _e("No existen noticias relacionadas!"); ?></p>
			<?php endif; ?>

			<!-- COMENTARIOS -->
			<div id="comentarios">
				<div id="comentario_wp" class="inline">
					<?php comments_template(); ?>
				</div><!--  -->
				<div id="comentario_fb" class="inline">
					<div class="fb-comments" data-href="<?php get_permalink(); ?>" data-colorscheme="ligth" data-width="480"></div>
				</div>
			</div>
			<!-- END-COMENTARIOS -->
		</section><!-- END posts -->
		<section id="sidebar-resto" class="inline sidebar">
			<?php get_sidebar(); ?>
		</section>	<!-- END sidebar -->
	</section><!--End single--> 
 
 

<?php  get_footer(); ?>
