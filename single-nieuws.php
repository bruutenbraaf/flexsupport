<?php
get_header(); ?>
<?php get_template_part('template-parts/content', 'single'); ?>

<?php
$next_post = get_next_post();
if (!empty($next_post)) { ?>
    <section class="nextpost gr">
        <div class="container">
            <div class="row">
                <div class="offset-md-2 col-md-6">
                    <span class="n"><?php _e('Volgende dienst', 'flexsupport'); ?></span>
                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
                        <h2><?php echo esc_attr($next_post->post_title); ?></h2>
                    </a>
                </div>
                <div class="col-md-2 align-items-center justify-content-end d-flex">
                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
                        <svg class="arr" width="67" height="27" viewBox="0 0 67 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M53.5607 26.0605L66.1213 13.4999L53.5607 0.939225L51.4393 3.06054L60.3787 11.9999L0.499999 11.9999L0.499999 14.9999L60.3787 14.9999L51.4393 23.9392L53.5607 26.0605Z" fill="white" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
    <?php $back =  get_post_type_archive_link('nieuws'); ?>
    <section class="nextpost gr">
        <div class="container">
            <div class="row">
                <div class="offset-md-2 col-md-6">
                    <span class="n"><?php _e('Einde bereikt', 'flexsupport'); ?></span>
                    <a href="<?php echo $back;?>">
                        <h2><?php _e('Terug naar overzicht?','flexsupport');?></h2>
                    </a>
                </div>
                <div class="col-md-2 align-items-center justify-content-end d-flex">
                    <a href="<?php echo $back;?>">
                        <svg class="arr" width="67" height="27" viewBox="0 0 67 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M53.5607 26.0605L66.1213 13.4999L53.5607 0.939225L51.4393 3.06054L60.3787 11.9999L0.499999 11.9999L0.499999 14.9999L60.3787 14.9999L51.4393 23.9392L53.5607 26.0605Z" fill="white" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php get_footer(); ?>