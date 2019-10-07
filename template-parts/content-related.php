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
                    <?php if (is_singular('personeel')) { ?>
                        <h3><?php _e('Ontmoet ook', 'flexsupport'); ?></h3>
                    <?php } else { ?>
                        <h3><?php _e('Anderen bekeken ook', 'flexsupport'); ?></h3>
                    <?php } ?>
                </div>
                <div class="offset-md-1 col-md-10">
                    <div class="other-items">
                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                            <div class="arch--item">
                                <div class="arch--inner">
                                    <div class="align-items-center row">
                                        <a href="<?php the_permalink() ?>">
                                            <div class="thumb-crop align-items-end d-flex <?php if (is_singular('personeel')) { ?>big<?php } ?>">
                                                <div class="inf">
                                                        <?php setup_postdata($post); ?>
                                                        <h3><?php the_title(); ?></h3>
                                                    <div class="btn"><?php _e('Lees meer', 'flexsupport'); ?></a>
                                                </div>
                                                <?php $fallback = get_field('fallback', 'option'); ?>
                                                <div class="thumb <?php if (is_singular('personeel')) { ?>cus-thumb<?php } ?>" style="background-image:url(<?php if (get_the_post_thumbnail_url($post, 'large')) { ?> <?php echo get_the_post_thumbnail_url($post, 'large'); ?><?php } else { ?><?php echo $fallback['sizes']['medium']; ?><?php } ?>);">
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
                arrows: false,
                focusOnSelect: true,
                centerMode: false,
                dots: true,
                lazyLoaded: true,
                appendDots: jQuery(".dots"),
            });
        });
    </script>
<?php endif; ?>