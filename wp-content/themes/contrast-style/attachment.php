<?php get_header(); ?>
<!--das obere holt die  header.php -->
<!--attachment.php-->

	<!--loop startet-->

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!--navi beginnt-->
<?php next_posts_link('&laquo; Vorherige Eintr&auml;ge') ?>
<?php previous_posts_link('N&auml;chste Eintr&auml;ge &raquo;') ?>

<!--der link zum anhang attachment-->
<?php $attachment_link = get_the_attachment_link($post->ID, true, array(450, 800)); // This also populates the iconsize for the next line ?>
<!--holt sich das post mit der kleinen vorschau des anhanges-->
<?php $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; // This lets us style narrow icons specially ?>

		<!--ueberschrift titel als link-->
			<a id="post-<?php the_ID(); ?>" href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a>

			<!--link des anhanges soll so bleiben-->
				<p class="<?php echo $classname; ?>"><?php echo $attachment_link; ?><br /><?php echo basename($post->guid); ?></p>
                                <!--inhalt des beitrages mit link zum weiterlesen zwischen p tags-->
				<?php the_content('<p class="serif">Den ganzen Beitrag lesen &#187;</p>'); ?>

<!--gibt die anzahl der seiten an, wenn es mehrere sind-->
        <?php wp_link_pages(array('before' => '<p><strong>Seiten:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
        
        
				<!--meatadaten zum beitrag zeit, um uhr, kategorie, hinweise dass man kommentare per rss feed verfolgen kann  und alle einstellungen fuer die kommentare trackback pings-->
						Der Beitrag wurde
						
						am <?php the_time('l,') ?> den <?php the_time('j. F Y') ?> um <?php the_time('H:i') ?> Uhr ver&ouml;ffentlicht
						und wurde unter <?php the_category(', ') ?> abgelegt.
						du kannst die Kommentare zu diesen Eintrag durch den <?php comments_rss_link('RSS 2.0'); ?> Feed verfolgen.
						
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// komentare und pings erlaubt ?>
							du kannst einen <a href="#respond">Kommentar schreiben</a>, oder einen <a href="<?php trackback_url(true); ?>" rel="trackback">Trackback</a> auf deiner Seite einrichten.
						
						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// nur pings erlaubt ?>
							Kommentare sind derzeit geschlossen, aber du kannst dennoch einen <a href="<?php trackback_url(true); ?> " rel="trackback">Trackback</a> auf deiner Seite einrichten.
						
						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// kommentare erlaubt pings nicht ?>
							du kannst zum Ende springen und einen Kommentar hinterlassen. Pingen ist im Augenblick nicht erlaubt.
			
						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// weder kommentare noch pings erlaubt ?>
							Kommentare und Pings sind derzeit nicht erlaubt.			
						
						<?php } edit_post_link('Beitrag bearbeiten.','<strong>|</strong> ',''); ?>
						
					
<!--holt sich das  kommentar template also die comments.php-->

	<?php comments_template(); ?>
<!--nicht loeschen-->
	<?php endwhile; else: ?>

		leider es gibt keine Beitr&auml;ge
<!--loop endet hier-->
<?php endif; ?>

<!--include footer-->
<?php get_footer(); ?>
