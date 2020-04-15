<footer>
    <div class="container footer-con">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-12 widget branding">
                <?php if (have_rows('logo', 'option')) : ?>
                    <?php while (have_rows('logo', 'option')) : the_row(); ?>
                        <?php $normaal = get_sub_field('normaal'); ?>
                        <?php if ($normaal) { ?>
                            <img src="<?php echo $normaal['url']; ?>" alt="<?php echo $normaal['alt']; ?>" />
                        <?php } ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <?php if (is_active_sidebar('footer_1')) { ?>
                <div class="col-lg-3 col-md-4 col-12 widget">
                    <?php dynamic_sidebar('footer_1'); ?>
                </div>
            <?php } ?>
            <?php if (is_active_sidebar('footer_2')) { ?>
                <div class="col-lg-3 col-md-4 col-sm-4 col-12 widget">
                    <?php dynamic_sidebar('footer_2'); ?>
                </div>
            <?php } ?>
            <?php if (is_active_sidebar('footer_3')) { ?>
                <div class="col-lg-3 col-md-4 col-12 widget">
                    <?php dynamic_sidebar('footer_3'); ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="socket align-items-center d-flex">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span>&copy; Flexsupport 2007 - <?php echo date("Y"); ?></span>
                </div>
                <div class="col-md-8 d-flex justify-content-end">
                    <?php wp_nav_menu(array('theme_location' => 'socket_menu')); ?>
                </div>
            </div>
        </div>
    </div>
</footer>
</main>
<div class="btp">
    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M8.06307 14L4.94019 14C4.50754 14 4.15947 13.6657 4.15947 13.2501L4.15947 7.00078L0.782856 7.00078C0.0867142 7.00078 -0.261357 6.19462 0.229846 5.71967L5.94862 0.220287C6.2544 -0.0734302 6.74885 -0.0734302 7.05464 0.220287L12.7702 5.71967C13.2614 6.1915 12.9133 7.00078 12.2171 7.00078L8.84378 7.00078L8.84379 13.2501C8.84379 13.6657 8.49571 14 8.06307 14Z" fill="white" />
    </svg>
</div>

<?php if (get_field('toon_cookie_melding', 'option') == 1) { ?>
    <?php if (have_rows('cookie_melding_cont', 'option')) : ?>
        <?php while (have_rows('cookie_melding_cont', 'option')) : the_row(); ?>
            <div class="cookies">
                <div class="inner d-flex text-center text-md-left flex-wrap justify-content-center justify-content-md-start">
                    <h3><?php the_sub_field('titel'); ?></h3>
                    <?php the_sub_field('content'); ?>
                    <div class="d-flex align-items-center flex-wrap justify-content-center justify-content-md-start">
                        <div class="main-btn checked"><?php the_sub_field('akkoord_tekst'); ?></div>
                        <?php $secondaire_knop = get_sub_field('secondaire_knop'); ?>
                        <?php if ($secondaire_knop) { ?>
                            <a class="btn" href="<?php echo $secondaire_knop['url']; ?>" target="<?php echo $secondaire_knop['target']; ?>"><?php echo $secondaire_knop['title']; ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php } ?>
<?php wp_footer(); ?>
</body>

</html>