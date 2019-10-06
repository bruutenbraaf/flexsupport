<?php
get_header(); ?>

<section class="header--404">
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-3">
                <?php $post_type = get_post_type(get_the_ID()); ?>
                <a href="<?php echo get_home_url(); ?>" class="back">
                    <svg width="79" height="27" viewBox="0 0 79 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4393 26.0607L0.878678 13.5L13.4393 0.939346L15.5607 3.06067L6.62132 12L79 12L79 15L6.62132 15L15.5607 23.9393L13.4393 26.0607Z" fill="#001F3F" />
                    </svg>
                </a>
            </div>
            <div class="col-md-8 col-8 bread">
                <?php if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('');
                } ?>
            </div>
            <div class="col-md-8 offset-md-1">
                <h1><?php _e('Niet <strong>gevonden</strong>', 'flexsupport'); ?></h1>
                <p><?php _e('Sorry, we kunnen deze pagina niet meer vinden', 'flexsupport'); ?></p>
                <a href="<?php echo get_home_url(); ?>" class="btn secondair"><?php _e('Terug naar homepagina','flexsupport');?></a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>