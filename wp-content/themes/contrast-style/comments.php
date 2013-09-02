<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Bitte diese Seite nicht direkt aufrufen. Danke!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">Auch die Kommentare sind durch das Passwort gesch&uuml;tzt.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<div class="post-title">
	<h3 id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments' );?> - &#8220;<?php the_title(); ?>&#8221;</h3>
</div>
<div class="commentblog">
<?php if ($comments) : ?>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>"> 
			<strong><?php comment_author_link() ?></strong>
			<?php if ($comment->comment_approved == '0') : ?>
			<br /><br /><strong>Comment Pending Approval.</strong>
			<?php endif; ?>
			

			<small class="commentmetadata">wrote on <?php comment_date('F j, Y') ?> at <?php comment_time('g:i a') ?> <?php edit_comment_link('edit','<strong>&#124;</strong>',''); ?></small>

			<br/><div class="gravatorblog"><?php echo get_avatar( $comment, 60 ); ?></div><?php comment_text() ?>
 <div class="clear"></div>       
<hr/>
		</li>

	<?php 
		/* Changes every other comment to a different class */ 
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : ''; 
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>


 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?>
		
	 <?php else : // comments are closed ?>

		<p class="nocomments">No Comments allowed</p>
		
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<strong>Write a Comment</strong>
<br/><br/>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You have to <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">Login</a></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as: <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="von diesem Account abmelden">Logout &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>eMail <?php if ($req) echo "(required)"; ?> (will not be displayed)</small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="post your comment" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>


<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
</div>
<div class="post-meta"></div>
