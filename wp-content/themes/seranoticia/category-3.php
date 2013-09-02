<?php 
	/*
	Category Name: Policial
	Autor: Ignacio Guajardo.
	*/

	get_header();

 ?>

 <section id="single"  class="categoria-policial">
 	
			<section id="posts" class="inline">
			 <h2 class="titulos-grande rojo-borde">POLICIAL</h2>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
			<article id="post-single">
				<div class="thumbnail inline" >
					<?php
					if ( has_post_thumbnail() ) { 
						the_post_thumbnail("thumb_seranoticia");
					}else{
						echo '<img src="'.get_bloginfo('template_directory') . '/images/default-thumbnails.jpg' . '" width="300" height="180" alt="thumbnail" />';  
					} 
					?>
				</div>
				<div class="textos inline">
					<div id="small" >
						Por <?php the_author_posts_link();?> el <a href="<?php the_permalink(); ?>"><?php the_time('l d F, Y'); ?></a>
					</div>
					<h2 class="titulo-pequenio" ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				
					<div id="noticia">
						<?php the_excerpt(); ?>
					</div>
				</div><!--END textos inline-->
			</article><!--end post-single-->
			<?php endwhile; else: ?>
				<p><?php _e("No existen noticias relacionadas!"); ?></p>
			<?php endif; ?>
		</section><!-- END posts -->
		<section class="inline sidebar" id="sidebar-resto"> 
			<?php get_sidebar(); ?>
		 </section>
	</section><!--End single--> 

<?php get_footer(); ?>