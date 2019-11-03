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

<section class="regi">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <?php $terms = get_terms('regio'); ?>
                <?php foreach ($terms as $term) { ?>
                    <?php $term_link = get_term_link($term); ?>
                    <div class="regio">
                        <div class="regio--name">
                            <h2><?php _e('Regio', 'flexsupport'); ?> <strong><?php echo $term->name; ?></strong></h2>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 1L8 15M8 15L15 8M8 15L1 8" stroke="#2D2D46" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="branches">
                            <div class="inner">
                                <?php
                                    $termid = $term->term_id;
                                    $args = array(
                                        'post_type' => 'regios',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'regio',
                                                'field' => 'term_id',
                                                'terms' => $termid
                                            )
                                        )
                                    );
                                    $loop = new WP_Query($args); ?>
                                <?php if ($loop->have_posts()) : ?>
                                    <div class="row">
                                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                            <div class="col-md-4">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </div>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12 justify-content-end d-flex">
                                    <a class="all" href="<?php echo $term_link; ?>">
                                        <?php _e('Lees meer over', 'talentplaats'); ?> <?php echo $term->name; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>