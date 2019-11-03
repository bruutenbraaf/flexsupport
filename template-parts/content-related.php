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
                                                <div class="thumb <?php echo $post_type; ?> <?php if (is_singular('personeel')) { ?>cus-thumb<?php } ?>" style="background-image:url(<?php if (get_the_post_thumbnail_url($post, 'large')) { ?> <?php echo get_the_post_thumbnail_url($post, 'large'); ?><?php } else { ?><?php echo $fallback['sizes']['xl']; ?><?php } ?>);">
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