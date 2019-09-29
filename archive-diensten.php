<?php
get_header(); ?>
<?php $currentArchive  = get_post_type(get_the_ID()); ?>

<section class="header--arch">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-1">
                <?php the_field('' . $currentArchive . '_archive_title', 'option') ?>
            </div>
        </div>
        <div class="d-flex">
            <div class="d-flex flex-nowrap align-items-center offset-md-1 btns">
                <?php $knop = get_field('' . $currentArchive . '_archive_btn', 'option'); ?>
                <?php if ($knop) { ?>
                    <a class="btn--header secondair" href="<?php echo $knop['url']; ?>" <?php if ($target) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                <?php } ?>
            </div>
            <div class="int d-flex offset-md-3">
                <?php the_field('' . $currentArchive . '_archive_intro', 'option'); ?>
            </div>
            <div class="dwn align-items-center justify-content-end">
                <svg width="26" height="79" viewBox="0 0 26 79" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5 72.3787L11.5 0H14.5L14.5 72.3787L23.4393 63.4393L25.5606 65.5607L13 78.1213L0.439331 65.5607L2.56065 63.4393L11.5 72.3787Z" fill="white" />
                </svg>
            </div>
        </div>
    </div>
</section>
<section class="overv">
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-10">
                <?php if (have_posts()) : ?>
                    <div class="arch-items">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="arch--item">
                                <div class="arch--inner">
                                    <div class="align-items-center row">
                                        <div class="col-md-6">
                                            <a href="<?php the_permalink() ?>">
                                                <?php setup_postdata($post); ?>
                                                <h3><?php the_title(); ?></h3>
                                                <?php if (have_rows('homepagina_gegevens')) : ?>
                                                    <?php while (have_rows('homepagina_gegevens')) : the_row(); ?>
                                                        <p><?php the_sub_field('intro_tekst'); ?></p>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </a>
                                            <a href="<?php the_permalink(); ?>" class="btn"><?php _e('Lees meer', 'flexsupport'); ?></a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="<?php the_permalink() ?>">
                                                <div class="thumb-crop">
                                                    <div class="thumb" style="background-image:url(<?php echo get_the_post_thumbnail_url($post, 'large'); ?>);">
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
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