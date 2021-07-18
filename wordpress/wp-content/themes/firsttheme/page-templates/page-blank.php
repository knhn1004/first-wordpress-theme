<?php
/* 
Template Name: Blank
*/
get_header(); ?>
<main role="main">
	<?php while (have_posts()) {
     the_post(); ?>
	 <article <?php post_class(); ?>>
		<?php the_content(); ?>
		<?php $c = get_the_content();
     //   echo 'Initial <br />';
     //   echo $c;
     //   echo '<br><br>';
     //   $c = wpautop($c);
     //   echo 'wpautop <br>';
     //   echo esc_html($c);
     //   echo '<br><br>';
     ?>
	</article>
	<?php
 } ?>
</main>
<?php get_footer();
?>
