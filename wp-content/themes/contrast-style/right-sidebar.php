
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Right Navigation') ) : else : ?>

<div class="right-widget">

<div class="widget-header">Post Archive</div>
<ul><?php get_archives('postbypost', '', 'html', '', '', TRUE); ?></ul>

</div>

<?php endif; ?>
<div id="rightbarfooter"></div>



