<?php get_header(); ?>

<div class="left-navi-blog">

	<?php include "left-sidebar.php";?>
    
</div>
<div class="center-blog">

		<?php if (have_posts()) : ?>
<div class="post-title">
		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>				

 <h1>Category: <?php single_cat_title(); ?></h1>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		Day: f&uuml;r den <?php the_time('j. F Y'); ?>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		Month: <?php the_time('F Y'); ?>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		Year: f&uuml;r <?php the_time('Y'); ?>
				
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		Autoren Archiv

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		Blog Archiv
		<?php } ?>
</div>
<div class="post-content">

					<?php echo category_description(); ?>
                    <div class="clear"></div>
</div>

<div class="post-meta"></div>	
		
		<?php while (have_posts()) : the_post(); ?>
<div class="post-title">

	<strong><a id="post-<?php the_ID(); ?>" href="<?php the_permalink() ?>" rel="bookmark" title=" <?php the_title(); ?>"><?php the_title(); ?></a></strong> - 

    <?php the_time('F j, Y') ?> by 

    <?php the_author() ?>
</div>

<div class="post-content">

					<?php the_content('read this entry &#187;'); ?>
                    <div class="clear"></div>
</div>
				    
<div class="post-meta">                   
		 <!--<?php trackback_rdf(); ?>-->

Category <?php the_category(', ') ?> <strong>|</strong> <?php comments_popup_link('0 Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('edit','<strong>|</strong> ',''); ?> 
</div>	

	
		<?php endwhile; ?>

<?php next_posts_link('&laquo; old entrys') ?>
<?php previous_posts_link('new entrys &raquo;') ?>

	
	<?php else : ?>

		Not Found
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		
	
</div>

<div class="right-navi-blog">

	<?php include "right-sidebar.php";?>
    
</div>
<?php get_footer(); ?>
