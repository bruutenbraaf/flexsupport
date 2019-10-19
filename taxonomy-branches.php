<?php
get_header(); ?>

<?php
// Define taxonomy prefix
// Replace NULL with the name of the taxonomy eg 'category'
$taxonomy_prefix = 'branches';

// Define term ID
// Replace NULL with ID of term to be queried eg '123' 
$term_id = get_queried_object()->term_id;

// Define prefixed term ID
$term_id_prefixed = $taxonomy_prefix . '_' . $term_id;
$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
?>

<section class="header--sngl">
    <div class="container">
        <div class="row">
            <div class="col-md-12 offset-md-1 bread">
                <?php if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('');
                } ?>
            </div>
            <div class="col-md-8 offset-md-1">
                <?php the_field("opleidingen_archive_title", "option"); ?>
                <?php the_field("opleidingen_archive_intro", "option"); ?>
            </div>
            <div class="col-md-10 offset-md-1 d-flex">
                <div class="categories">
                    <span class="catt"><?php _e('Categorie:', 'flexsupport'); ?></span>
                    <?php $terms = get_terms('branches');
                    $current = $term->name; ?>
                    <ul>
                        <?php foreach ($terms as $term) { ?>
                            <?php $term_link = get_term_link($term);
                                if (is_wp_error($term_link)) {
                                    continue;
                                } ?>
                            <li <?php if ($term->name == $current) { ?>class="current" <?php } ?>><a href="<?php echo esc_url($term_link) ?>"> <?php echo $term->name ?> </a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-1 dwn">
                <svg width="26" height="79" viewBox="0 0 26 79" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.5605 65.5607L12.9999 78.1213L0.439227 65.5607L2.56055 63.4393L11.4999 72.3787L11.4999 -6.14611e-07L14.4999 -4.83477e-07L14.4999 72.3787L23.4392 63.4393L25.5605 65.5607Z" fill="#001F3F" />
                </svg>

            </div>
        </div>
    </div>
</section>


<section class="overv overv-op">
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-10">
                <?php if (have_posts()) : ?>
                    <div class="arch-items">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="arch--inner">
                                <a href="<?php the_permalink() ?>">
                                    <?php setup_postdata($post); ?>
                                    <h3><?php the_title(); ?></h3>
                                    <?php if (have_rows('opleiding_informatie')) : ?>
                                        <?php while (have_rows('opleiding_informatie')) : the_row(); ?>
                                            <span class="locat"><?php the_sub_field('locatie'); ?></span>
                                            <p><?php the_sub_field('korte_omschrijving'); ?></p>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </a>
                                <a class="moreinfo" href="<?php the_permalink(); ?>"><?php _e('Lees meer', 'flexsupport'); ?>
                                    <svg width="55" height="27" viewBox="0 0 55 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M42.0607 0.939331L54.6213 13.5L42.0607 26.0606L39.9393 23.9393L48.8787 15L0 15L0 12L48.8787 12L39.9393 3.06065L42.0607 0.939331Z" />
                                    </svg>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>