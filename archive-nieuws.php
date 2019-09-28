<?php
get_header(); ?>

<?php
// Define taxonomy prefix
// Replace NULL with the name of the taxonomy eg 'category'
$taxonomy_prefix = 'nieuws_categorie';

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
            <div class="col-md-8 offset-md-1">
                <?php the_field("nieuws_archive_title", "option"); ?>
                <?php the_field("nieuws_archive_intro", "option"); ?>
            </div>
            <div class="col-md-10 offset-md-1 d-flex">
                <div class="categories">
                    <span class="catt"><?php _e('Categorie:', 'flexsupport'); ?></span>
                    <?php $terms = get_terms('nieuws_categorie');
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
            <div class="col-md-1">
                <svg width="26" height="79" viewBox="0 0 26 79" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.5605 65.5607L12.9999 78.1213L0.439227 65.5607L2.56055 63.4393L11.4999 72.3787L11.4999 -6.14611e-07L14.4999 -4.83477e-07L14.4999 72.3787L23.4392 63.4393L25.5605 65.5607Z" fill="#001F3F" />
                </svg>
            </div>
        </div>
    </div>
</section>

<section class="news-arch">
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
                                            <div class="thumb" style="background-image:url(<?php echo get_the_post_thumbnail_url($post, 'large'); ?>);">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="<?php the_permalink() ?>">
                                        <?php setup_postdata($post); ?>
                                        <h3><?php the_title(); ?></h3>
                                        <p>
                                            <?php $theterms = wp_get_post_terms($post->ID, 'nieuws_categorie', array("fields" => "names")); ?>
                                            <?php foreach ($theterms as $theterm) { ?>
                                                <span class="tax-name"><?php echo $theterm; ?> | </span>
                                            <?php } ?>
                                            <?php the_time('d-m-Y'); ?>
                                        </p>
                                    </a>
                                    <a href="<?php the_permalink(); ?>" class="btn"><?php _e('Lees bericht', 'flexsupport'); ?></a>
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