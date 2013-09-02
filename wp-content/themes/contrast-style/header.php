<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archiv <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<?php wp_head(); ?>
</head>

<body>

<div id="pagecenter">

<div id="header">
<?php bloginfo('description'); ?>

<div id="sitename"><?php bloginfo('name'); ?></div>

</div>

<div id="top-navi">

	<div class="top-navi-links"><a href="<?php bloginfo('url'); ?>">Home</a></div>
	<!--
    Just delete "<!- and ->" to use the other links
    <div class="top-navi-links"><a href="#">Link 1</a></div>
    <div class="top-navi-links"><a href="#">Link 2</a></div>
	<div class="top-navi-links"><a href="#">Link 3</a></div>
	<div class="top-navi-links"><a href="#">Link 4</a></div>
    -->


</div>