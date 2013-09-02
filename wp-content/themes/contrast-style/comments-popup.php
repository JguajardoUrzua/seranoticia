<?php
/* Don't remove these lines. */
add_filter('comment_text', 'popuplinks');
while ( have_posts()) : the_post();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title><?php echo get_option('blogname'); ?> - Kommentare zu <?php the_title(); ?></title>
     
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
  <style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
		body { margin: 3px; }
	</style>

</head>
<body id="commentspopup">

<a href="" title="<?php echo get_option('blogname'); ?>"><?php echo get_option('blogname'); ?></a>


Kommentare


<a href="<?php echo get_post_comments_feed_link($post->ID); ?>"><abbr title="Really Simple Syndication">RSS</abbr>-Kommentarfeed zu diesem Beitrag.</a>


<?php if ('open' == $post->ping_status) { ?>
Die TrackBack-<abbr title="Universal Resource Locator">URL</abbr> dieses Beitrags lautet: <em><?php trackback_url() ?></em>

<?php } ?>

<?php
// this line is WordPress' motor, do not delete it.
$commenter = wp_get_current_commenter();
extract($commenter);
$comments = get_approved_comments($id);
$post = get_post($id);
if (!empty($post->post_password) && $_COOKIE['wp-postpass_'. COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
	echo(get_the_password_form());
} else { ?>


<?php if ($comments) { ?>
<ol id="commentlist">
<?php foreach ($comments as $comment) { ?>
	<li id="comment-<?php comment_ID() ?>">
	<?php comment_text() ?>
	<p><cite><?php comment_type('Kommentar', 'Trackback', 'Pingback'); ?> von <?php comment_author_link() ?> &#8212; <?php comment_date('j. F Y') ?> um <a href="#comment-<?php comment_ID() ?>"><?php comment_time('H:i') ?> Uhr</a></cite></p>
	</li>

<?php } // end for each comment ?>
</ol>
<?php } else { // this is displayed if there are no comments so far ?>
	<p>Noch keine Kommentare.</p>
<?php } ?>

<?php if ('open' == $commentstatus->comment_status) { ?>
<h2>Kommentar schreiben</h2>
<p>Automatischer Zeilen- und Absatzumbruch, eMail Adresse wird nicht angezeigt, erlaubte <acronym title="Hypertext Markup Language">HTML</acronym>-Tags lauten: <code><?php echo allowed_tags(); ?></code></p>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">	
	<?php if ( $user_ID ) : ?>  
		<p>Angemeldet als: <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo 			get_option('siteurl'); ?>/wp-login.php?action=logout" title="von diesem Account abmelden">Abmelden &raquo;</a></p> 
	<?php else : ?>  
		<p>
	  <input type="text" name="author" id="author" class="textarea" value="<?php echo $comment_author; ?>" size="28" tabindex="1" />
	   <label for="author">Name</label>
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
	<input type="hidden" name="redirect_to" value="<?php echo wp_specialchars($_SERVER["REQUEST_URI"]); ?>" />
	</p>

	<p>
	  <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="28" tabindex="2" />
	   <label for="email">eMail</label>
	</p>

	<p>
	  <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="28" tabindex="3" />
	   <label for="url"><acronym title="Uniform Resource Locator">URL</acronym></label>
	</p>
	<?php endif; ?> 
	<p>
	  <label for="comment">Kommentar</label>
	<br />
	  <textarea name="comment" id="comment" cols="70" rows="4" tabindex="4"></textarea>
	</p>

	<p>
	  <input name="submit" type="submit" tabindex="5" value="senden" />
	</p>
	<?php do_action('comment_form', $post->ID); ?>
</form>
<?php } else { // comments are closed ?>
<p>Der Kommentarbereich ist derzeit leider geschlossen.</p>
<?php }
} // end password check
?>

<div><strong><a href="javascript:window.close()">Fenster schlie&szlig;en.</a></strong></div>

<?php // if you delete this the sky will fall on your head
endwhile;
?>


<?php //} ?>
<p class="credit"><?php timer_stop(1); ?> <cite>Powered by <a href="http://wordpress.org" title="Powered by WordPress, state-of-the-art semantic personal publishing platform"><strong>Wordpress</strong></a> | <a href="http://wordpress.de" title="Deutsche WordPress Community"><strong>WP.de</strong></a></cite></p>
<?php // Seen at http://www.mijnkopthee.nl/log2/archive/2003/05/28/esc(18) ?>
<script type="text/javascript">
<!--
document.onkeypress = function esc(e) {	
	if(typeof(e) == "undefined") { e=event; }
	if (e.keyCode == 27) { self.close(); }
}
// -->
</script>
</body>
</html>