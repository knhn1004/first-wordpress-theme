<?php
/* 
Template Name: Full Width Page
*/
get_header(); ?>

<div class="o-container u-margin-bottom-40">
    <div class="o-row">
        <div class="o-row__column o-row__column--span-12">
            <main role="main">
                <?php get_template_part('loop', 'page'); ?>
            </main>
        </div>
    </div>
</div>
<?php get_footer();
?>
