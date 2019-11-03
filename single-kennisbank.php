<?php
get_header(); ?>
<?php get_template_part('template-parts/content', 'single'); ?>

<?php echo do_shortcode('[addthis tool="addthis_inline_share_toolbox_612e"]');?>

<?php get_template_part('template-parts/content', 'related'); ?>

<?php get_footer(); ?>