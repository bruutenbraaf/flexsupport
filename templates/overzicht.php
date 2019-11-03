<?php
// Template name: Overzichtspagina
get_header(); ?>

<?php if (have_rows('header_overzicht')) : ?>
    <?php while (have_rows('header_overzicht')) : the_row(); ?>
        <section class="header--arch">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 offset-md-1 bread">
                        <?php if (function_exists('yoast_breadcrumb')) {
                                    yoast_breadcrumb('');
                                } ?>
                    </div>
                    <div class="col-md-8 offset-md-1">
                        <?php the_sub_field('titel'); ?>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex flex-nowrap align-items-center offset-md-1 btns">
                        <?php $knop = get_sub_field('knop'); ?>
                        <?php if ($knop) { ?>
                            <a class="btn--header secondair" href="<?php echo $knop['url']; ?>" <?php if ($target) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                        <?php } ?>
                    </div>
                    <div class="int d-flex offset-md-3">
                        <?php the_sub_field('content'); ?>
                    </div>
                    <div class="dwn align-items-center justify-content-end">
                        <svg width="26" height="79" viewBox="0 0 26 79" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5 72.3787L11.5 0H14.5L14.5 72.3787L23.4393 63.4393L25.5606 65.5607L13 78.1213L0.439331 65.5607L2.56065 63.4393L11.5 72.3787Z" fill="white" />
                        </svg>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<section class="overv">
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-10">
                <?php if (have_rows('paginas')) : ?>
                    <div class="arch-items">
                        <?php while (have_rows('paginas')) : the_row(); ?>
                            <?php $link_van_pagina = get_sub_field('link_van_pagina'); ?>
                            <div class="arch--item">
                                <div class="arch--inner">
                                    <div class="align-items-center row">
                                        <div class="col-md-6 m-second">
                                            <a href="<?php echo $link_van_pagina['url']; ?>">
                                                <h3> <?php the_sub_field('titel'); ?></h3>
                                                <?php the_sub_field('intro_tekst'); ?>
                                            </a>
                                            <a href="<?php the_permalink(); ?>" class="btn"><?php _e('Lees meer', 'flexsupport'); ?></a>
                                        </div>
                                        <div class="col-md-6 m-first">
                                            <a href="<?php echo $link_van_pagina['url']; ?>">
                                                <div class="thumb-crop">
                                                    <?php
                                                            $afbeelding = get_sub_field('afbeelding');
                                                            $fallback = get_field('fallback', 'option');
                                                            ?>
                                                    <div class="thumb" style="background-image:url(<?php if ($afbeelding) { ?><?php echo $afbeelding['sizes']['large'] ?><?php } else { ?><?php echo $fallback['sizes']['medium']; ?><?php } ?>);">
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
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