<?php
// Template name: Vacature plaatsen
get_header(); ?>
<?php if (have_rows('header')) : ?>
    <?php while (have_rows('header')) : the_row(); ?>
        <section class="header--sngl">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-1">
                        <?php the_sub_field('titel'); ?>
                    </div>
                    <div class="offset-md-1 col-md-6">
                        <?php the_sub_field('intro'); ?>
                    </div>
                    <div class="col-md-5 justify-content-end align-items-end d-flex">
                        <div>
                            <?php $knop = get_sub_field('knop'); ?>
                            <?php if ($knop) { ?>
                                <a class="small" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?>
                                    <svg width="79" height="27" viewBox="0 0 79 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M65.5607 0.93932L78.1213 13.5L65.5607 26.0606L63.4393 23.9393L72.3787 15L2.45844e-06 15L1.93391e-06 12L72.3787 12L63.4393 3.06064L65.5607 0.93932Z" fill="#35FFB6" />
                                    </svg>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<section class="kandi">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>