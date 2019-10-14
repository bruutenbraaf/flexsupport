<?php
get_header(); ?>
<?php if (have_rows('header_single')) : ?>
    <?php while (have_rows('header_single')) : the_row(); ?>
        <section class="header--sngl">
            <div class="container">
                <div class="row">
                    <div class="col-md-1 col-3">
                        <?php $post_type = get_post_type(get_the_ID()); ?>
                        <a href="<?php echo get_post_type_archive_link($post_type); ?>" class="back">
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
                        <?php the_sub_field('titel'); ?>
                        <?php the_sub_field('intro_text'); ?>
                        <?php $knop = get_sub_field('knop'); ?>
                        <?php if ($knop) { ?>
                            <a href="<?php echo $knop['url']; ?>" class="btn" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                        <?php } ?>
                    </div>
                    <div class="offset-md-1 col-md-6">
                        <?php //opleiding single fields 
                                ?>
                        <?php if (have_rows('opleiding_informatie')) : ?>
                            <ul class="inf">
                                <?php while (have_rows('opleiding_informatie')) : the_row(); ?>
                                    <li><?php the_sub_field('niveau'); ?></li>
                                    <li><?php the_sub_field('locatie'); ?></li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                        <?php //end - opleiding single fields 
                                ?>
                    </div>
                    <div class="col-md-5 justify-content-end align-items-end d-flex">
                        <div>
                            <a class="small" href="#aanmelden"><?php _e('Direct aanmelden', 'flexsupport'); ?>
                                <svg width="79" height="27" viewBox="0 0 79 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M65.5607 0.93932L78.1213 13.5L65.5607 26.0606L63.4393 23.9393L72.3787 15L2.45844e-06 15L1.93391e-06 12L72.3787 12L63.4393 3.06064L65.5607 0.93932Z" fill="#35FFB6" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<?php $thumb = get_the_post_thumbnail_url($post, 'large'); ?>
<?php $fallback = get_field('fallback', 'option'); ?>
<div class="full--img" style="background-image:url(<?php if ($thumb) { ?><?php echo get_the_post_thumbnail_url($post, 'full_img'); ?> <?php } else { ?> <?php echo $fallback['sizes']['full_img']; ?><?php } ?>);">
</div>



<?php if (have_rows('sections')) : ?>
    <?php while (have_rows('sections')) : the_row(); ?>
        <?php if (get_row_layout() == 'volledige') : ?>
            <section class="about <?php the_sub_field('selecteer_kleur'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 offset-md-1">
                            <span class="sub">
                                <?php the_sub_field('subtitle'); ?>
                            </span>
                        </div>
                        <div class="col-md-8">
                            <?php the_sub_field('content'); ?>
                            <?php $knop = get_sub_field('knop'); ?>
                            <?php if ($knop) { ?>
                                <a class="btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'carrousel') : ?>
            <div class="carrousel">
                <?php if (have_rows('afbeeldingen')) : ?>
                    <div class="carrousel-items">
                        <?php while (have_rows('afbeeldingen')) : the_row(); ?>
                            <div class="carrousel-item">
                                <?php $afbeelding_upload = get_sub_field('afbeelding_upload'); ?>
                                <?php if ($afbeelding_upload) { ?>
                                    <div class="carousel-img" style="background-image:url(<?php echo $afbeelding_upload['sizes']['large']; ?>);" ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="offset-md-1 col-md-10">
                            <div class="dots">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                jQuery(document).ready(function() {
                    jQuery('.carrousel-items').slick({
                        infinite: true,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        arrows: false,
                        focusOnSelect: true,
                        centerMode: true,
                        dots: true,
                        lazyLoaded: true,
                        appendDots: jQuery(".dots"),
                    });
                });
            </script>
        <?php elseif (get_row_layout() == 'volledige_afbeelding') : ?>
            <?php $afbeelding = get_sub_field('afbeelding'); ?>
            <?php if ($afbeelding) { ?>
                <img src=" <?php echo $afbeelding['url']; ?>" alt="<?php echo $afbeelding['alt']; ?>" />
            <?php } ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php if (get_field('aanmeldformulier')) {  ?>
    <section class="aanmelden-sec" id="aanmelden">
        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <h2><?php _e('Aanmelden', 'flexsupport'); ?>
                        <?php $form = get_field('aanmeldformulier');
                            echo do_shortcode($form); ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>


<?php get_template_part('template-parts/content', 'related'); ?>

<?php get_footer(); ?>