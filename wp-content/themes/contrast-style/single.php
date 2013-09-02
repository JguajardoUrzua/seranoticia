<?php get_header(); ?>
<div class="left-navi-blog">

	<?php include "left-sidebar.php";?>
    
</div>
<div class="center-blog">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	

		
	
<div class="post-title">
			<h1><?php the_title(); ?></h1>
</div>
<div class="post-content">	

				<?php the_content(''); ?>
<div class="clear"></div>
<div class="single-meta">
		 <!--<?php trackback_rdf(); ?>-->
			
	      				

							<?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> by <?php the_author(); ?> <br/>Category: <?php the_category(', '); ?><br/><?php the_tags( 'Tags: ', ', ', ''); ?><br/><?php wp_link_pages(array('before' => '<p><strong>Seiten:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
 </div>         
</div>
<div class="post-meta"></div>
						
					
						
					


	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		No Comments


<?php endif; ?>

</div>


<div class="right-navi-blog">

	<?php include "right-sidebar.php";?>
    
</div>

<?php get_footer(); ?>
