<?php
$ids = null;

// Search for image's IDs in Gutenberg gallery
$blocks = parse_blocks(get_the_content());
foreach ($blocks as $block) {
    if ($block['blockName'] === 'core/gallery') {
        $galleryGutenberg = $block;
        $ids = $galleryGutenberg['attrs']['ids'];
        break;
    }
}

// If IDs don't exist in the Gutenberg gallery then search for them in Classic gallery
if (!$ids) {
    $galleryClassic = get_post_gallery(get_the_ID(), false);
    // For WordPress 5.3.2 and plugin Classic Editor v 1.5
    // gallery attribute 'ids' disappears after deleting gallery images,
    // so we need to check if it still exists
    if (!empty($galleryClassic['ids'])) {
        $ids = explode(',', $galleryClassic['ids']);
    } else {
        $ids = null;
    }
}
?>
 
<article <?php post_class('c-post u-margin-bottom-20'); ?>>
    <div class="c-post__inner">
      <?php if (
          (has_post_thumbnail() && is_single()) ||
          (has_post_thumbnail() && !$ids)
      ) { ?>
            <div class="c-post__thumbnail">
            <?php the_post_thumbnail('large'); ?>
            </div>
      <?php } ?>
 
      <?php if (!is_single() && $ids) { ?>
            <div class="c-post__gallery">
            <?php foreach ($ids as $id) {
                echo wp_get_attachment_image($id, 'large');
            } ?>
            </div>
      <?php } ?>
 
      <?php get_template_part('template-parts/post/header'); ?>
 
      <?php if (is_single()) { ?>
            <div class="c-post__content">
            <?php
            the_content();
            wp_link_pages();
            ?>
            </div>
      <?php } else { ?>
            <div class="c-post__excerpt">
            <?php the_excerpt(); ?>
            </div>
      <?php } ?>
 
      <?php if (is_single()) { ?>
         <?php get_template_part('template-parts/post/footer'); ?>
      <?php } ?>
 
      <?php if (!is_single()) {
          _themename_readmore_link();
      } ?>
    </div>
</article>