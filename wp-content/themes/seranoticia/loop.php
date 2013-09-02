<div id="content" class="group">

		 
		<?php include('sidebar_izquierda.php'); ?>
 
	<section id="blog" class="left-col inline">

		<?php get_template_part('slider_principal', 'slider'); ?>
		
		
		<section id="inner-sidebar">
				<section id="last-post" class="inline">
					<?php 
						$foto = "noticias";
						$color = "verde";
						$titulo_normal="ÚLTIMOS";
						$titulo_negrita="POST";
						$subtitulo="Las últimas noticias del día";
						include("titulos-tema.php");
					?>
				<?php 
				  

				$postslist = get_posts('category_name=Noticias&numberposts=2&order=DESC'); 
				foreach ($postslist as $post) : setup_postdata($post); ?>
				<!-- <a href="<?php the_permalink(); ?>"> -->
					<article id="last-post-single" class="inline">
						<a  href="<?php the_permalink(); ?>"><?php the_post_thumbnail("thumb_seranoticia_mini");?></a>
						<aside id="last-post-single-textos">
							<p><?php the_time('l d F, Y') ?></p>
							<a class="titulo-index" title="Post: <?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?> &raquo;</a>
						</aside>
					</article>
				<!-- </a> -->
				<?php endforeach; ?>
			</section>
			<section id="podcast" class="inline">
				 	<?php 
						$foto = "podcast";
						$color = "azul";
						$titulo_normal="SERÁNOTICIA";
						$titulo_negrita="RADIO";
						$subtitulo="El Podcast con todas las noticas del día";
						include("titulos-tema.php");
					?> 
					 
 
					<?php 
						$args = array( 'post_type' => 'podcast_sn', 'posts_per_page' => 1 );
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
							the_title();
							echo do_shortcode('[powerpress]');
						endwhile;
					?>

				<?php 
					$link = "/podcast-2/";
					$color="azul";
					include("ver_mas.php"); 
				?>

			</section>
		</section><!--END inner-sidebar-->

		<section id="posts" class="inline">	
			<?php 
				$foto = "noticias";
				$color = "verde";
				$titulo_normal="NOTICIAS";
				$titulo_negrita="";
				$subtitulo="Todas las noticias";
				include("titulos-tema.php");
			?>
			<!-- <div class="titulo gris"><h2>NOTICIAS</h2><span class="verde"/></div> -->
			<!--?php query_posts('category_name=Noticias&posts_per_page=10'); ?-->
			<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts('posts_per_page=10&paged='.$paged.'&category_name=Noticias');
			// query_posts(  'posts_per_page=5&category_name=Noticias');
			// query_posts('category_name=Noticias'); ?>
			<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
			
			
			<article id="post"  >
			
				<div class="thumbnail inline" >
					<a id="tituloNoticias" href="<?php the_permalink(); ?>">
					<?php
					if ( has_post_thumbnail() ) { 
						the_post_thumbnail("thumb_seranoticia");
					}else{
						echo '<img src="'.get_bloginfo('template_directory') . '/images/default-thumbnails.jpg' . '" width="200" height="150" alt="thumbnail" />';  
					} 
					?>
				</a>
				</div>
				<div class="textos inline">
					<div id="small">
						Escrito por <?php the_author_posts_link();?> el <a href="<?php the_permalink(); ?>"><?php the_time('l d F, Y'); ?></a>
					</div>
					<h2><a class="titulo-index" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					
					<div id="noticia" >
						<?php the_excerpt(); ?>
					</div>
				</div><!--END textos inline-->
			
			</article><!--end post-->
					
			<?php endwhile;else: ?>
				<p><?php _e("No existen noticias relacionadas!"); ?></p>
			<?php endif; ?>

		<div class="navigation"><?php if(function_exists('pagenavi')) { pagenavi(); } ?></div>

		</section><!-- END posts -->
 
	</section><!--End blog-->
	 <section id="sidebar-loop" class="inline sidebar"> 
		<?php get_sidebar(); ?>
	 </section> 	<!-- END sidebar -->
 
</div><!--End content-->