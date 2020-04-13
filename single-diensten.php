<?php
get_header(); ?>
<?php get_template_part('template-parts/content', 'single'); ?>
<?php get_template_part('template-parts/content', 'related'); ?>

<?php // pop - up ?>

<?php if (have_rows('pop_up_diensten', 'option')) : ?>
    <?php while (have_rows('pop_up_diensten', 'option')) : the_row(); ?>
        <div id="exitpopup_bg"></div>
        <div id="exitpopup" class="container">
            <div class="popup-close">×</div>
            <div class="row">
                <div class="col">
                    <h3><?php the_sub_field('titel'); ?></h3>
                    <?php the_sub_field('content'); ?>
                    <div class="buttons d-flex align-items-center justify-content-center">
                        <?php $knop = get_sub_field('knop'); ?>
                        <?php if ($knop) { ?>
                            <a class="main-btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                        <?php } ?>
                        <?php $secondaire_knop = get_sub_field('secondaire_knop'); ?>
                        <?php if ($secondaire_knop) { ?>
                            <a class="btn" href="<?php echo $secondaire_knop['url']; ?>" target="<?php echo $secondaire_knop['target']; ?>"><?php echo $secondaire_knop['title']; ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>