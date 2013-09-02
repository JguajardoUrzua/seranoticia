
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Left Navigation') ) : else : ?>
<div class="left-widget">
<div class="widget-header">Categorys</div>
<ul><?php wp_list_categories('title_li='); ?></ul>

</div>

<div class="left-widget">
<div class="widget-header">Pages</div>
<ul><?php wp_list_pages('title_li=' ); ?></ul>

</div>

<div class="left-widget">
<div class="widget-header">Linkpartner</div>
<ul><?php wp_list_bookmarks(); ?></ul>

</div>

<?php endif; ?>
<div id="leftbarfooter"></div>





