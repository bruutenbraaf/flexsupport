<?php
get_header(); ?>

<section class="header--sngl">
    <div class="container">
        <div class="row">
            <div class="col-md-12 offset-md-1 bread">
                <?php if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('');
                } ?>
            </div>
            <div class="col-md-8 offset-md-1">
                <?php the_field("klanten_archive_title", "option"); ?>
                <?php the_field("klanten_archive_intro", "option"); ?>
            </div>
            <div class="col-md-1 dwn align-items-end d-flex">
                <svg width="26" height="79" viewBox="0 0 26 79" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.5605 65.5607L12.9999 78.1213L0.439227 65.5607L2.56055 63.4393L11.4999 72.3787L11.4999 -6.14611e-07L14.4999 -4.83477e-07L14.4999 72.3787L23.4392 63.4393L25.5605 65.5607Z" fill="#001F3F" />
                </svg>
            </div>
        </div>
    </div>
</section>

<section class="news-arch klant-arch">
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-10">
                <?php if (have_posts()) : ?>
                    <div class="arch-items">
                        <div class="row">
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="col-md-6 arch-item">
                                    <a href="<?php the_permalink() ?>">
                                        <div class="thumb-crop">
                                            <?php $fallback = get_field('fallback', 'option'); ?>
                                            <div class="thumb" style="background-image:url(<?php if (get_the_post_thumbnail_url($post, 'large')) { ?><?php echo get_the_post_thumbnail_url($post, 'large'); ?><?php } else { ?><?php echo $fallback['sizes']['medium']; ?><?php } ?>);">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="<?php the_permalink() ?>">
                                        <?php setup_postdata($post); ?>
                                        <h3><?php the_title(); ?></h3>
                                    </a>
                                    <a href="<?php the_permalink(); ?>" class="btn"><?php _e('Bekijk klant', 'flexsupport'); ?></a>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php if (paginate_links()) { ?>
    <section class="pagenumbers">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php echo paginate_links(array(
                            'prev_text' => '',
                            'next_text' => ''
                        )); ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php get_footer(); ?>