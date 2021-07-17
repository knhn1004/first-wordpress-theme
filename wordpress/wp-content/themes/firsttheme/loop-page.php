<?php if (have_posts()) { ?>
    <?php while (have_posts()) { ?>
        <?php the_post(); ?>
        <?php get_template_part('template-parts/page/content'); ?>
    <?php } ?>
<?php } else { ?>
    <?php get_template_part('template-parts/post/content', 'none'); ?>
<?php } ?>
