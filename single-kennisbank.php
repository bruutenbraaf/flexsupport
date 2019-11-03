<?php
get_header(); ?>
<?php get_template_part('template-parts/content', 'single'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php echo do_shortcode('[addthis tool="addthis_inline_share_toolbox_612e"]'); ?>
        </div>
    </div>
</div>

<?php get_template_part('template-parts/content', 'related'); ?>

<?php get_footer(); ?>