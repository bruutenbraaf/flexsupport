<?php
get_header(); ?>
<?php $currentArchive  = 'veelgestelde_vragen' ?>
<section class="header--arch">
    <div class="container">
        <div class="row">
            <div class="col-md-12 offset-md-1 bread">
                <?php if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('');
                } ?>
            </div>
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

<section class="faqs">
    <div class="container">
        <div class="row">
            <?php $loop = new WP_Query(array(
                'post_type' => 'veelgestelde_vragen',
                'order' => 'DESC',
                'posts_per_page' => 999,
            )); ?>
            <?php if ($loop->have_posts()) : ?>
                <?php $c = 0; ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <?php $c++; ?>
                    <div class="<?php if ($c % 2 != 0) { ?>offset-md-1 <?php } ?>col-md-5<?php ?>">
                        <div class="faq" href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                            <div class="answ"><?php the_content(); ?></div>
                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.5 11.5L6.5 6.5L1.5 1.5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
    </div>
</section>
<?php get_footer(); ?>