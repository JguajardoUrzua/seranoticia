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
</div>

<div class="post-meta">

				<?php wp_link_pages(array('before' => '<p><strong>Seiten:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

</div>
	      				

	  <?php endwhile; endif; ?>


         <?php edit_post_link('Beitrag bearbeiten.', '<p>', '</p>'); ?>
	

</div>

<div class="right-navi-blog">

	<?php include "right-sidebar.php";?>
    
</div>

<?php get_footer(); ?>
