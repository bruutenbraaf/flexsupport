<?php
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section class="header--sngl">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <svg width="79" height="27" viewBox="0 0 79 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4393 26.0607L0.878678 13.5L13.4393 0.939346L15.5607 3.06067L6.62132 12L79 12L79 15L6.62132 15L15.5607 23.9393L13.4393 26.0607Z" fill="#001F3F" />
                        </svg>
                    </div>
                    <div class="col-md-8 offset-md-2">
                        <h1><?php the_sub_field('titel'); ?></h1>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<?php if (get_the_post_thumbnail_url($post, 'large')) { ?>
    <div class="full--img" style="background-image:url(<?php echo get_the_post_thumbnail_url($post, 'large'); ?>);">
    </div>
<?php } ?>



<section class="about <?php the_sub_field('selecteer_kleur'); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="sub">
                    <?php the_content();?>
                </span>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>