<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bruut en Braaf">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <title><?php wp_title('&raquo;', 'true', 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151246863-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-151246863-2');
    </script>
</head>

<?php if (is_archive()) { ?>
    <?php $currentArchive  = get_post_type(get_the_ID()); ?>
    <?php $archiveColor = get_field('' . $currentArchive . '_archive_kleur', 'option'); ?>
<?php } ?>

<body <?php $color = get_field('color_page');
        body_class(array($color, $archiveColor)); ?>>

    <div class="reading-progress"></div>
    <nav id="#main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-md-6 col-xl-3 branding">
                    <?php if (have_rows('logo', 'option')) : ?>
                        <?php while (have_rows('logo', 'option')) : the_row(); ?>
                            <a href="<?php echo get_home_url(); ?>">
                                <?php if ($color == 'rose' || $color == 'yellow' || $archiveColor == 'rose' || $archiveColor == 'yellow' || is_404()) { ?>
                                    <?php $light = get_sub_field('light'); ?>
                                    <?php if ($light) { ?>
                                        <img class="light--branding" src="<?php echo $light['url']; ?>" alt="<?php echo $light['alt']; ?>" />
                                        <?php $normaal = get_sub_field('normaal'); ?>
                                        <?php if ($normaal) { ?>
                                            <img class="normal--branding" src="<?php echo $normaal['url']; ?>" alt="<?php echo $normaal['alt']; ?>" />
                                        <?php } ?>
                                    <?php } ?>
                                <?php } elseif ($color == 'green' || $archiveColor == 'green') { ?>
                                    <?php $dark = get_sub_field('dark'); ?>
                                    <?php if ($dark) { ?>
                                        <img class="dark--branding" src="<?php echo $dark['url']; ?>" alt="<?php echo $dark['alt']; ?>" />
                                        <?php $normaal = get_sub_field('normaal'); ?>
                                        <?php if ($normaal) { ?>
                                            <img class="normal--branding" src="<?php echo $normaal['url']; ?>" alt="<?php echo $normaal['alt']; ?>" />
                                        <?php } ?>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php $normaal = get_sub_field('normaal'); ?>
                                    <?php if ($normaal) { ?>
                                        <img src="<?php echo $normaal['url']; ?>" alt="<?php echo $normaal['alt']; ?>" />
                                    <?php } ?>
                                <?php } ?>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="main-nav col-md-9 d-flex justify-content-end align-items-center">
                    <div class="the--nav">
                        <?php wp_nav_menu(array('theme_location' => 'main_menu')); ?>
                    </div>
                    <?php if (have_rows('zoeken', 'option')) : ?>
                        <?php while (have_rows('zoeken', 'option')) : the_row(); ?>
                            <?php if (get_sub_field('toon_zoek_icoon') == 1) { ?>
                                <div class="searchbtn">
                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.0002 17L13.8462 11.846C14.799 10.3979 15.1807 8.64778 14.9172 6.93446C14.6538 5.22114 13.764 3.66651 12.4201 2.57157C11.0762 1.47662 9.37391 0.919257 7.64269 1.00738C5.91148 1.0955 4.27453 1.82284 3.04879 3.04858C1.82305 4.27432 1.09571 5.91126 1.00759 7.64248C0.919471 9.37369 1.47684 11.076 2.57178 12.4199C3.66672 13.7638 5.22135 14.6536 6.93467 14.917C8.64799 15.1805 10.3981 14.7988 11.8462 13.846L17.0002 19L19.0002 17ZM3.00022 8.00001C3.00022 5.24301 5.24322 3.00001 8.00022 3.00001C10.7572 3.00001 13.0002 5.24301 13.0002 8.00001C13.0002 10.757 10.7572 13 8.00022 13C5.24322 13 3.00022 10.757 3.00022 8.00001Z" />
                                    </svg>
                                </div>
                            <?php } ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="col-6 d-flex justify-content-end mobile-nav">
                    <?php if (have_rows('zoeken', 'option')) : ?>
                        <?php while (have_rows('zoeken', 'option')) : the_row(); ?>
                            <?php if (get_sub_field('toon_zoek_icoon') == 1) { ?>
                                <div class="searchbtn">
                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.0002 17L13.8462 11.846C14.799 10.3979 15.1807 8.64778 14.9172 6.93446C14.6538 5.22114 13.764 3.66651 12.4201 2.57157C11.0762 1.47662 9.37391 0.919257 7.64269 1.00738C5.91148 1.0955 4.27453 1.82284 3.04879 3.04858C1.82305 4.27432 1.09571 5.91126 1.00759 7.64248C0.919471 9.37369 1.47684 11.076 2.57178 12.4199C3.66672 13.7638 5.22135 14.6536 6.93467 14.917C8.64799 15.1805 10.3981 14.7988 11.8462 13.846L17.0002 19L19.0002 17ZM3.00022 8.00001C3.00022 5.24301 5.24322 3.00001 8.00022 3.00001C10.7572 3.00001 13.0002 5.24301 13.0002 8.00001C13.0002 10.757 10.7572 13 8.00022 13C5.24322 13 3.00022 10.757 3.00022 8.00001Z" />
                                    </svg>
                                </div>
                            <?php } ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="hamburger">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="mobile-nav-fs">
        <h2><?php _e('Navigatie', 'flexsupport'); ?></h2>
        <div class="inner">
            <?php wp_nav_menu(array('theme_location' => 'mobile_menu')); ?>
        </div>
        <div class="bg"></div>
        <div class="bg"></div>
        <div class="bg"></div>
    </div>

    <div class="mgm">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6">
                    <h2 class="w le"><?php _e('Laatste nieuws', 'flexsupport'); ?></h2>
                </div>
                <div class="col-md-6">
                    <h2 class="ri"><?php _e('Navigatie', 'flexsupport'); ?></h2>
                </div>
            </div>
            <div class="row f-row d-flex align-items-center">
                <div class="col-md-6">
                    <?php
                    $aantal = get_sub_field('toon_aantal_laatste_berichten');
                    $loop = new WP_Query(array(
                        'post_type' => 'kennisbank',
                        'posts_per_page' => 3,
                        'order' => 'DESC'
                    ));
                    ?>
                    <?php if ($loop->have_posts()) : ?>
                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                            <div class="news-nav">
                                <span class="dt"><?php the_time('j F Y'); ?></span>
                                <h3><?php the_title(); ?></h3>
                                <a href="<?php the_permalink(); ?>" class="btn"><?php _e('Lees bericht', 'talentplaats'); ?>
                                </a>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <div class="mgm--nav">
                        <?php wp_nav_menu(array('theme_location' => 'mega_menu')); ?>
                    </div>
                </div>
                <div class="l">
                </div>
                <div class="r">
                </div>
            </div>
        </div>
    </div>
    <?php if (!get_field('verberg_offerte_bar') == 1) { ?>

        <div class="quotation">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <?php if (have_rows('offerte_bar', 'option')) : ?>
                        <?php while (have_rows('offerte_bar', 'option')) : the_row(); ?>
                            <div class="col-md col-12 inner text-center text-md-left">
                                <?php the_sub_field('informatie_tekst'); ?>
                            </div>
                            <?php if (have_rows('knoppen')) : ?>
                                <div class="col d-flex align-items-center justify-content-center justify-content-md-end">
                                    <?php while (have_rows('knoppen')) : the_row(); ?>
                                        <?php $knop = get_sub_field('knop'); ?>
                                        <?php if ($knop) { ?>
                                            <a class="q_btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                        <?php } ?>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (have_rows('zoeken', 'option')) : ?>
        <?php while (have_rows('zoeken', 'option')) : the_row(); ?>
            <?php if (get_sub_field('toon_zoek_icoon') == 1) { ?>
                <div id="searchpopup_bg"></div>
                <div id="searchpopup" class="container">
                    <div class="search-close">×</div>
                    <div class="row">
                        <div class="col">
                            <h3><?php the_sub_field('titel'); ?></h3>
                            <?php the_sub_field('tekst'); ?>
                            <form action="/" method="get">
                                <input type="text" placeholder="<?php the_sub_field('placeholder_input_veld'); ?>" name="s" id="search" value="<?php the_search_query(); ?>" />
                                <div class="buttons d-flex align-items-center justify-content-center">
                                    <button alt="Search" class="main-btn" />Zoeken</button>
                                    <?php $extra_knop = get_sub_field('extra_knop'); ?>
                                    <?php if ($extra_knop) { ?>
                                        <a class="btn" href="<?php echo $extra_knop['url']; ?>" target="<?php echo $extra_knop['target']; ?>"><?php echo $extra_knop['title']; ?></a>
                                    <?php } ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <main>