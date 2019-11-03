<?php
// Template name: Sitemap
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

<section class="site">
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-1">
                <h2 id="pages"><?php _e("Pagina's", "flexsupport"); ?></h2>
                <ul>
                    <?php
                    // Add pages you'd like to exclude in the exclude here
                    wp_list_pages(
                        array(
                            'exclude' => '352',
                            'title_li' => '',
                        )
                    );
                    ?>
                </ul>
            </div>
            <div class="col-md-5">
                <h2 id="pages"><?php _e("Regio's", "flexsupport"); ?></h2>
                <?php
                $terms = get_terms('regio');

                echo '<ul>';

                foreach ($terms as $term) {

                    // The $term is an object, so we don't need to specify the $taxonomy.
                    $term_link = get_term_link($term);

                    // If there was an error, continue to the next term.
                    if (is_wp_error($term_link)) {
                        continue;
                    }

                    // We successfully got a link. Print it out.
                    echo '<li><a href="' . esc_url($term_link) . '">' . $term->name . '</a></li>';
                }

                echo '</ul>'; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
</section>

<?php get_footer(); ?>