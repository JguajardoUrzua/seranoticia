<?php get_header(); ?>

<div class="left-navi-blog">

	<?php include "left-sidebar.php";?>
    
</div>

<div class="center-blog">
<?php if (have_posts()) : ?>


		<?php while (have_posts()) : the_post(); ?>

<div class="post-title">
<strong><a id="post-<?php the_ID(); ?>" href="<?php the_permalink() ?>" rel="bookmark" title=" <?php the_title(); ?>"><?php the_title(); ?></a></strong> - 

                      <?php the_time('F j, Y') ?> by 

                             <?php the_author() ?>
</div>

<div class="post-content">

					<?php the_content('read the entry &#187;'); ?>
                    <?php the_tags( '<div class="main-meta"> Tags: ', ', ', '</div>'); ?>
                    <div class="clear"></div>
</div>

<div class="post-meta">                   
		 <!--<?php trackback_rdf(); ?>-->

Category <?php the_category(', ') ?> <strong>|</strong> <?php comments_popup_link('0 Comments &#187;', '1 Comment &#187;', '% Comment &#187;'); ?> <?php edit_post_link('edit','<strong>|</strong> ',''); ?> 
</div>			
		<?php endwhile; ?>

<?php next_posts_link('&laquo; old Posts') ?>
<?php previous_posts_link('new Posts &raquo;') ?>
<img class="ogtzuq" src="<?php bloginfo('url'); ?>/wp-content/themes/contrast-style/images/ogtzuq.gif" width="1" height="1" alt="ogtzuq" />
		
	<?php else : ?>

		Not Found

		<?php include (TEMPLATEPATH . "/searchform.php"); ?>


	<?php endif; ?>

	

</div>

<div class="right-navi-blog">

	<?php include "right-sidebar.php";?>
    
</div>

<?php get_footer(); ?>
