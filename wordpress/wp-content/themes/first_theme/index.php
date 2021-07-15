<?php get_header(); ?>
<?php if(have_posts()) {?>
	<?php while(have_posts()) {?>
		<?php the_post(); ?>
		<h2>
		<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
			<?php the_title() ?>
		</a>
		</h2>
		<div>
			<?php firsttheme_post_meta() ?>
		</div>
		<div>
			<?php the_excerpt() ?>
		</div>
		<?php firsttheme_readmore_link(); ?>
	<?php }?>
	<?php the_posts_pagination() ?>

<?php } else { ?>
	<p>
	<?php
		_E('Sorry, no post was found', 'firsttheme');?>
	</p>
<?php } ?>

<?php
$comments = 1;
printf(_n('%s comment', ' %s comments', $comments, 'firsttheme'), $comments);
// printf('this post have %s comments', $comments);

?>

<?php get_footer(); ?>