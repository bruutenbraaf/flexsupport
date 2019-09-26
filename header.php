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

<body id="skrollr-body" <?php $color = get_field('color_page');
                        body_class(array($color, $archiveColor,)); ?>>
    <nav>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 branding">
                    <?php if (have_rows('logo', 'option')) : ?>
                        <?php while (have_rows('logo', 'option')) : the_row(); ?>
                            <a href="<?php echo get_home_url(); ?>">
                                <?php if ($color == 'rose' || $color == 'yellow' || $archiveColor == 'rose' || $archiveColor == 'yellow') { ?>
                                    <?php $light = get_sub_field('light'); ?>
                                    <?php if ($light) { ?>
                                        <img src="<?php echo $light['url']; ?>" alt="<?php echo $light['alt']; ?>" />
                                    <?php } ?>
                                <?php } elseif ($color == 'green' || $archiveColor == 'green') { ?>
                                    <?php $dark = get_sub_field('dark'); ?>
                                    <?php if ($dark) { ?>
                                        <img src="<?php echo $dark['url']; ?>" alt="<?php echo $dark['alt']; ?>" />
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
                <div class="col-md-9 d-flex justify-content-end main-nav">
                    <?php wp_nav_menu(array('theme_location' => 'main_menu')); ?>
                </div>
            </div>
        </div>
    </nav>