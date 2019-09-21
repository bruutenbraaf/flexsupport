<footer>
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-4 branding">
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
                <div class="col-md-2">
                    <?php dynamic_sidebar('footer_1'); ?>
                </div>
            <?php } ?>
            <?php if (is_active_sidebar('footer_2')) { ?>
                <div class="col-md-2">
                    <?php dynamic_sidebar('footer_2'); ?>
                </div>
            <?php } ?>
            <?php if (is_active_sidebar('footer_3')) { ?>
                <div class="col-md-2">
                    <?php dynamic_sidebar('footer_3'); ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="socket align-items-center d-flex">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-4">
                    <span>&copy; Flexsupport <?php echo date("Y"); ?></span>
                </div>
                <div class="col-md-6">
                    <?php wp_nav_menu(array('theme_location' => 'socket_menu')); ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>