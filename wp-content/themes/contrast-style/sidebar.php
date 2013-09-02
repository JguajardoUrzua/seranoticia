

<?php /**/ wp_list_bookmarks('categorize=0&show_description=1&title_before=&title_after&title_li=&category_before=&category_after= '); ?>
		<ul>
			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar') ) : else : ?>
			<li>
                        
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</li>


            <?php if ( is_404() || is_category() || is_day() || is_month() || 
			is_year() || is_search() || is_paged() ) { 
			?> <li> 
			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<p>du durchsuchst derzeit das Archiv der <?php single_cat_title(''); ?> Kategorie.</p>
			
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<p>du durchsuchst derzeit das <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('url'); ?></a> Archiv
			nach <?php the_time('l,'); ?> den <?php the_time('j. F Y'); ?>.</p>
			
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p>du durchsuchst derzeit das <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('url'); ?></a> Archiv
			nach dem Monat <?php the_time('F Y'); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p>du durchsuchst derzeit das <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('url'); ?></a> Archiv
			nach dem Jahr <?php the_time('Y'); ?>.</p>
			
			<?php /* more links to find */ } elseif (is_search()) { ?>
			<p>du hast das <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('url'); ?></a> Archiv nach
			<strong>'<?php the_search_query(); ?>'</strong> durchsucht. Wenn du in den Ergebnissen nichts gefunden hast, helfen dir eventuell die folgenden Links.</p>

			<?php /* If this is not a specified archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p>du durchsuchst derzeit das <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('url'); ?></a> Archiv.</p>

			<?php } ?>
			</li> <?php }?> 
                        
			<?php wp_list_pages('title_li=<h2>Seiten</h2>' ); ?>

			<li><h2>Archiv</h2>
				<ul>
                               
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>
			
			<?php wp_list_categories('show_count=1&title_li=<h2>Kategorien</h2>'); ?>



<?php if (function_exists('wp_theme_switcher')) { ?>
	<h2><?php _e('Themes'); ?></h2>
	<?php wp_theme_switcher(); ?>
<?php } ?>



			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>				
				

                                       <?php wp_list_bookmarks(); ?>
				 
				
				<li><h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<li><a href="http://wordpress-deutschland.org/" title="WordPress Deutschland">WPD</a></li>
					<?php wp_meta(); ?>
				</ul>
				</li>
			<?php } ?>


			<?php endif; ?> 
		</ul>
	


