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
                        <?php if (have_rows('informatie_werknemer')) : ?>
                            <?php while (have_rows('informatie_werknemer')) : the_row(); ?>
                                <ul class="cnct">
                                    <li><a href="tel:<?php the_sub_field('telefoonnummer'); ?>"><?php the_sub_field('telefoonnummer'); ?></a></li>
                                    <li><a href="mailto:<?php the_sub_field('e-mailadres'); ?>"><?php the_sub_field('e-mailadres'); ?></a></li>
                                    <?php if (have_rows('socials')) : ?>
                                        <?php while (have_rows('socials')) : the_row(); ?>
                                            <?php $social = get_sub_field('social'); ?>
                                            <?php if ($social) { ?>
                                                <li><a href="<?php echo $social['url']; ?>" target="<?php echo $social['target']; ?>"><?php echo $social['title']; ?></a></li>
                                            <?php } ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                                <?php the_sub_field('beschrijving'); ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>


<?php $fallback = get_field('fallback', 'option'); ?>
<?php if (is_singular('team')) { ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php $afbeelding_werknemer = get_field('afbeelding_werknemer'); ?>
                <div class="bg-full" style="background-image:url(<?php if ($afbeelding_werknemer) { ?><?php echo $afbeelding_werknemer['sizes']['full_img']; ?><?php } else { ?><?php echo $fallback['sizes']['full_img']; ?><?php } ?>);">
                </div>
            </div>
        </div>
    </div>
<?php } elseif ($post_type == 'referenties') { ?>
<?php } else { ?>
    <div class="full--img" style="background-image:url(<?php if (get_the_post_thumbnail_url($post, 'full_img')) { ?><?php echo get_the_post_thumbnail_url($post, 'full_img'); ?><?php } else { ?><?php echo $fallback['sizes']['full_img']; ?><?php } ?>);">
    </div>
<?php } ?>

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
        <?php elseif (get_row_layout() == 'volle_breedte_text_geen_subtitel') : ?>
            <section class="about <?php the_sub_field('selecteer_kleur'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
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

<?php $post_type = get_post_type(get_the_ID()); ?>
<?php $loop = new WP_Query(array(
    'post_type' => $post_type,
    'posts_per_page' => 4,
    'order' => 'DESC',
    'orderby' => 'rand'
)); ?>
<?php if ($loop->have_posts()) : ?>
    <section class="overv other-pst">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <?php if (is_singular('team')) { ?>
                        <h3><?php _e('Ontmoet ook', 'flexsupport'); ?></h3>
                    <?php } else { ?>
                        <h3><?php _e('Anderen bekeken ook', 'flexsupport'); ?></h3>
                    <?php } ?>
                </div>
                <div class="offset-md-1 col-md-10">
                    <div class="slck-nav">
                        <div class="nxt-re nxt-slds">
                            <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.06307 14L4.94019 14C4.50754 14 4.15947 13.6657 4.15947 13.2501L4.15947 7.00078L0.782856 7.00078C0.0867142 7.00078 -0.261357 6.19462 0.229846 5.71967L5.94862 0.220287C6.2544 -0.0734302 6.74885 -0.0734302 7.05464 0.220287L12.7702 5.71967C13.2614 6.1915 12.9133 7.00078 12.2171 7.00078L8.84378 7.00078L8.84379 13.2501C8.84379 13.6657 8.49571 14 8.06307 14Z" fill="white"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="other-items">
                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                            <div class="arch--item">
                                <div class="arch--inner">
                                    <div class="align-items-center row">
                                        <a href="<?php the_permalink() ?>">
                                            <div class="thumb-crop align-items-end d-flex <?php if (is_singular('personeel')) { ?>big<?php } ?>">
                                                <div class="inf">
                                                    <?php setup_postdata($post); ?>
                                                    <?php if ($post_type != 'referenties') { ?>
                                                        <h3><?php the_title(); ?></h3>
                                                        <div class="btn"><?php _e('Lees meer', 'flexsupport'); ?></div>
                                                    <?php } ?>
                                                </div>
                                                <?php $fallback = get_field('fallback', 'option'); ?>
                                                <?php $afbeelding_werknemer = get_field('afbeelding_werknemer'); ?>
                                                <div class="thumb <?php echo $post_type; ?> <?php if (is_singular('personeel')) { ?>cus-thumb<?php } ?>" style="background-image:url(<?php echo $afbeelding_werknemer['sizes']['full_img']; ?>);">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        jQuery(document).ready(function() {
            jQuery('.other-items').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                arrows: true,
                focusOnSelect: true,
                centerMode: false,
                dots: false,
                lazyLoaded: true,
                prevArrow: jQuery('.nxt-slds'),
                nextArrow: jQuery('.nxt-re'),
            });
        });
    </script>
<?php endif; ?>

<?php get_footer(); ?>