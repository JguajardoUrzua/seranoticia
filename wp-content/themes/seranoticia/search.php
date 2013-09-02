

<?php get_header(); ?>

  	<section id="main">
        <section id="single" class="resultado-busqueda inline">
          <section id="posts" class="inline">
  	       <h2 class="titulos-grande verde-borde">Búsqueda</h2>

          <?php if (is_search()) : ?>
              <?php // Muestra el numeros de resultados que se obtiene de una busqueda
                $results = new WP_Query("s=$s&amp;showposts=-1");
                $term = wp_specialchars($s, 1);
                $number = $results->post_count;
                wp_reset_query();?>
            <h2 class="detalles-busqueda"><?php echo $number; ?> <?php _e('Resultados para ',"wpct"); ?> " <?php echo $term; ?> "</h2>
          <?php endif; ?>

           <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
          <article id="post-single">
                <div class="thumbnail inline">
                    <?php
                        if ( has_post_thumbnail() ) {
                              the_post_thumbnail("thumb_seranoticia");
                        }
                        else{
                          echo '<img src="'.get_bloginfo('template_directory') . '/images/default-thumbnails.jpg' . '" width="300" height="180" alt="thumbnail" />';  
                        } 
                    ?>
                </div>
                <div class="textos inline">
                    <div id="small">
                       Por <?php the_author_posts_link() ?> , el <?php the_time('l d F, Y'); ?> 
                    </div>
                    <h2 class="titulo-pequenio" >
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    
                    <div id="noticia">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
              </article>
                <?php endwhile; ?>
                <?php if (function_exists("pagination")) {
                    pagination($additional_loop->max_num_pages);
                } ?>
                <?php  else: ?>
         
         
          <div class="entry"><?php _e('Lo sentimos, no hay resultados con este término de búsqueda.'); ?></div>
          <?php endif; ?>
        </section><!-- END POSTS -->
        <section id="sidebar-resto" class="inline sidebar">
        <?php  get_sidebar()?>
    </section>
      </section><!-- END SINGLE -->
    
  </section> <!-- Fin de main -->



<?php get_footer(); ?>
