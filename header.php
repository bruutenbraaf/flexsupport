<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bruut en Braaf">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <title><?php wp_title('&raquo;', 'true', 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<?php if (is_archive()) { ?>
    <?php $currentArchive  = get_post_type(get_the_ID()); ?>
    <?php $archiveColor = get_field('' . $currentArchive . '_archive_kleur', 'option'); ?>
<?php } ?>

<body <?php $color = get_field('color_page');
        body_class(array($color, $archiveColor)); ?>>

    <div class="reading-progress"></div>
    <nav data-start="background:rgba(255,255,255,0);box-shadow: 0px 0px 23px rgba(183, 183, 183, 0);" data-150="background:rgba(255,255,255,1);box-shadow: 0px 0px 23px rgba(183, 183, 183, 0.22);">
        <div class="container">
            <div class="row align-items-center" data-0="height: 136px;" data-150="height: 100;">
                <div class="col-6 col-md-6 col-xl-3 branding">
                    <?php if (have_rows('logo', 'option')) : ?>
                        <?php while (have_rows('logo', 'option')) : the_row(); ?>
                            <a href="<?php echo get_home_url(); ?>">
                                <?php if ($color == 'rose' || $color == 'yellow' || $archiveColor == 'rose' || $archiveColor == 'yellow' || is_404()) { ?>
                                    <?php $light = get_sub_field('light'); ?>
                                    <?php if ($light) { ?>
                                        <img data-start="opacity:1;margin-top:-0px;" data-150="opacity:0;margin-top:30px;" src="<?php echo $light['url']; ?>" alt="<?php echo $light['alt']; ?>" />
                                        <?php $normaal = get_sub_field('normaal'); ?>
                                        <?php if ($normaal) { ?>
                                            <img data-start="opacity:0;margin-top:-30px;" data-150="opacity:1;margin-top:15px;" class="normal-branding" src="<?php echo $normaal['url']; ?>" alt="<?php echo $normaal['alt']; ?>" />
                                        <?php } ?>
                                    <?php } ?>
                                <?php } elseif ($color == 'green' || $archiveColor == 'green') { ?>
                                    <?php $dark = get_sub_field('dark'); ?>
                                    <?php if ($dark) { ?>
                                        <img data-start="opacity:1;margin-top:-0px;" data-150="opacity:0;margin-top:30px;" src="<?php echo $dark['url']; ?>" alt="<?php echo $dark['alt']; ?>" />
                                        <?php $normaal = get_sub_field('normaal'); ?>
                                        <?php if ($normaal) { ?>
                                            <img data-start="opacity:0;margin-top:-30px;" data-150="opacity:1;margin-top:15px;" class="normal-branding" src="<?php echo $normaal['url']; ?>" alt="<?php echo $normaal['alt']; ?>" />
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
                <div class="main-nav col-md-9 d-flex justify-content-end">
                    <div class="the--nav">
                        <?php wp_nav_menu(array('theme_location' => 'main_menu')); ?>
                    </div>
                    <div class="mtgo">
                        <div data-start="<?php if ($color == 'rose' || $color == 'yellow' || $archiveColor == 'rose' || $archiveColor == 'yellow' || is_404()) { ?>background:rgb(255,255,255);<?php } else { ?>background:rgb(0, 31, 63);<?php } ?>" data-300="background:rgb(0,0,0);"></div>
                        <div data-start="<?php if ($color == 'rose' || $color == 'yellow' || $archiveColor == 'rose' || $archiveColor == 'yellow' || is_404()) { ?>background:rgb(255,255,255);<?php } else { ?>background:rgb(0, 31, 63);<?php } ?>" data-400="background:rgb(0,0,0);"></div>
                        <div data-start="<?php if ($color == 'rose' || $color == 'yellow' || $archiveColor == 'rose' || $archiveColor == 'yellow' || is_404()) { ?>background:rgb(255,255,255);<?php } else { ?>background:rgb(0, 31, 63);<?php } ?>" data-500="background:rgb(0,0,0);"></div>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end mobile-nav">
                    <div class="hamburger">
                        <div data-start="<?php if ($archiveColor == 'rose' || $color == 'rose') { ?>background:rgb(255,255,255);<?php } else { ?>background:rgb(0, 31, 63);<?php } ?>" data-300="background:rgb(0,0,0);"></div>
                        <div data-start="<?php if ($archiveColor == 'rose' || $color == 'rose') { ?>background:rgb(255,255,255);<?php } else { ?>background:rgb(0, 31, 63);<?php } ?>" data-400="background:rgb(0,0,0);"></div>
                        <div data-start="<?php if ($archiveColor == 'rose' || $color == 'rose') { ?>background:rgb(255,255,255);<?php } else { ?>background:rgb(0, 31, 63);<?php } ?>" data-500="background:rgb(0,0,0);"></div>
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
                    <h2 class="w le"><?php _e('Laatste nieuws','flexsupport');?></h2>
                </div>
                <div class="col-md-6">
                    <h2 class="ri"><?php _e('Navigatie','flexsupport');?></h2>
                </div>
            </div>
            <div class="row f-row d-flex align-items-center">
                <div class="col-md-6">
                    <?php
                    $aantal = get_sub_field('toon_aantal_laatste_berichten');
                    $loop = new WP_Query(array(
                        'post_type' => 'nieuws',
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

    <main id="skrollr-body">