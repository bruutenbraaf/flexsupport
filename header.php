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
                        body_class(array($color, $archiveColor,)); ?>>
    <nav data-start="background:rgba(255,255,255,0);box-shadow: 0px 0px 23px rgba(183, 183, 183, 0);" data-300="background:rgba(255,255,255,1);box-shadow: 0px 0px 23px rgba(183, 183, 183, 0.22);">
        <div class="container">
            <div class="row align-items-center" data-0="height: 136px;" data-300="height: 100;">
                <div class="col-md-3 col-6 branding">
                    <?php if (have_rows('logo', 'option')) : ?>
                        <?php while (have_rows('logo', 'option')) : the_row(); ?>
                            <a href="<?php echo get_home_url(); ?>">
                                <?php if ($color == 'rose' || $color == 'yellow' || $archiveColor == 'rose' || $archiveColor == 'yellow') { ?>
                                    <?php $light = get_sub_field('light'); ?>
                                    <?php if ($light) { ?>
                                        <img data-start="opacity: 1;margin-top:-0px;" data-300="opacity:0;margin-top:30px;" src="<?php echo $light['url']; ?>" alt="<?php echo $light['alt']; ?>" />
                                        <?php $normaal = get_sub_field('normaal'); ?>
                                        <?php if ($normaal) { ?>
                                            <img data-start="opacity: 0;margin-top:-30px;" data-300="opacity:1;margin-top:15px;" class="normal-branding" src="<?php echo $normaal['url']; ?>" alt="<?php echo $normaal['alt']; ?>" />
                                        <?php } ?>
                                    <?php } ?>
                                <?php } elseif ($color == 'green' || $archiveColor == 'green') { ?>
                                    <?php $dark = get_sub_field('dark'); ?>
                                    <?php if ($dark) { ?>
                                        <img data-start="opacity: 1;margin-top:-0px;" data-300="opacity:0;margin-top:30px;" src="<?php echo $dark['url']; ?>" alt="<?php echo $dark['alt']; ?>" />
                                        <?php $normaal = get_sub_field('normaal'); ?>
                                        <?php if ($normaal) { ?>
                                            <img data-start="opacity: 0;margin-top:-30px;" data-300="opacity:1;margin-top:15px;" class="normal-branding" src="<?php echo $normaal['url']; ?>" alt="<?php echo $normaal['alt']; ?>" />
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
                    <?php wp_nav_menu(array('theme_location' => 'main_menu')); ?>
                </div>
                <div class="col-6 d-flex justify-content-end mobile-nav">
                    <div class="hamburger">
                        <div data-start="<?php if ($archiveColor = 'rose' or $color = 'rose'){ ?>background:rgb(255,255,255);<?php } else { ?>background:rgb(0, 31, 63);<?php } ?>" data-300="background:rgb(0,0,0);"></div>
                        <div data-start="<?php if ($archiveColor = 'rose' or $color = 'rose'){ ?>background:rgb(255,255,255);<?php } else { ?>background:rgb(0, 31, 63);<?php } ?>" data-400="background:rgb(0,0,0);"></div>
                        <div data-start="<?php if ($archiveColor = 'rose' or $color = 'rose'){ ?>background:rgb(255,255,255);<?php } else { ?>background:rgb(0, 31, 63);<?php } ?>" data-500="background:rgb(0,0,0);"></div>
                    </div>
                </div>
            </div>
        </div>
    </nav>