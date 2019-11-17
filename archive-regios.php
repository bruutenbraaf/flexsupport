<?php
get_header(); ?>
<?php $currentArchive  = get_post_type(get_the_ID()); ?>
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

<section class="reg">
    <div class="container">
        <div class="row">
            <?php $loop = new WP_Query(array(
                'post_type' => 'regios',
                'order' => 'DESC'
            )); ?>
            <?php if ($loop->have_posts()) : ?>
                <?php $c = 0; ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <?php $c++; ?>
                    <div class="<?php if ($c % 2 != 0) { ?>offset-md-1 <?php } ?>col-md-5<?php ?>">
                        <a class="rgi" href="<?php the_permalink(); ?>"><?php the_title(); ?><svg width="79" height="27" viewBox="0 0 79 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M65.5607 0.939331L78.1213 13.5L65.5607 26.0606L63.4393 23.9393L72.3787 15L0 15V12L72.3787 12L63.4393 3.06065L65.5607 0.939331Z" fill="#001F3F" />
                            </svg>
                        </a>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
    </div>
</section>
<?php get_footer(); ?>