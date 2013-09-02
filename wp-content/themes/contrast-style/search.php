<?php get_header(); ?>


	<?php if (have_posts()) : ?>

                        Suchergebnisse:
		
<?php next_posts_link('&laquo; Vorherige Eintr&auml;ge') ?>
<?php previous_posts_link('N&auml;chste Eintr&auml;ge &raquo;') ?>
                  

		<?php while (have_posts()) : the_post(); ?>

				<a href="<?php the_permalink() ?>" id="post-<?php the_ID(); ?>" rel="bookmark" title=" <?php the_title(); ?>"><?php the_title(); ?></a>

                             <?php the_time('l, j. F Y') ?>
				

					<?php the_excerpt() ?>
				

				Kategorie <?php the_category(', ') ?> <strong>|</strong> <?php comments_popup_link('0 Kommentare &#187;', '1 Kommentar &#187;', '% Kommentare &#187;'); ?> <?php edit_post_link('Bearbeiten','<strong>|</strong>',''); ?>
			

		<?php endwhile; ?>


<?php next_posts_link('&laquo; Vorherige Eintr&auml;ge') ?>
<?php previous_posts_link('N&auml;chste Eintr&auml;ge &raquo;') ?>
                  

	
	<?php else : ?>

		Nicht gefunden

		<?php include (TEMPLATEPATH . '/searchform.php'); ?>


	<?php endif; ?>
		
	


<?php get_sidebar(); ?>

<?php get_footer(); ?>
