<?php
/*
Template Name: Archiv
*/
?>
<?php get_header(); ?>


<?php include (TEMPLATEPATH . '/searchform.php'); ?>

Archiv nach Monaten:

  <ul>
    <?php wp_get_archives('type=monthly'); ?>
  </ul>

Archiv nach Kategorien:

  <ul>
     <?php wp_list_categories(); ?>
  </ul>


<?php get_footer(); ?>
