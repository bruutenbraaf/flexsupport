<?php
get_header(); ?>

<?php if (have_rows('header_home')) : ?>
    <?php while (have_rows('header_home')) : the_row(); ?>
        <section class="header--hp">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-1">
                        <?php the_sub_field('titel'); ?>
                    </div>
                </div>
                <div class="d-flex m-flex">
                    <div class="d-flex flex-nowrap align-items-center offset-md-1 hp--btns">
                        <?php if (have_rows('knoppen')) : ?>
                            <?php while (have_rows('knoppen')) : the_row(); ?>
                                <?php $knop = get_sub_field('knop'); ?>
                                <?php if ($knop) { ?>
                                    <a class="btn--header<?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" <?php if ($target) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                                <?php } ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="int">
                        <?php the_sub_field('intro_tekst'); ?>
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
<?php if (have_rows('sections')) : ?>
    <?php while (have_rows('sections')) : the_row(); ?>
        <?php if (get_row_layout() == 'volledige_afbeelding') : ?>
            <?php $upload_afbeelding = get_sub_field('upload_afbeelding'); ?>
            <?php if ($upload_afbeelding) { ?>
                <section class="full--img<?php if (get_sub_field('toon_overlay') == 1) { ?> overlay<?php } ?>" style="background-image:url(<?php echo $upload_afbeelding['sizes']['large']; ?>)">
                </section>
            <?php } ?>
        <?php elseif (get_row_layout() == 'informatie_blok') : ?>
            <section class="about <?php the_sub_field('selecteer_kleur'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 offset-lg-1 col-md-offset-0 col-md-3">
                            <span class="sub">
                                <?php the_sub_field('subtitel'); ?>
                            </span>
                        </div>
                        <div class="col-lg-8 col-md-9">
                            <?php the_sub_field('content'); ?>
                            <?php $knop = get_sub_field('knop'); ?>
                            <?php if ($knop) { ?>
                                <a class="btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'uitgelichte_diensten') : ?>
            <section class="services">
                <div class="container">
                    <div class="row">
                        <div class="offset-md-5 col-md-6 col-sm-12 force">
                            <h2><?php the_sub_field('titel'); ?></h2>
                            <?php $selecteer_diensten_om_te_tonen = get_sub_field('selecteer_diensten_om_te_tonen'); ?>
                            <?php if ($selecteer_diensten_om_te_tonen) : ?>
                                <div class="row">
                                    <?php foreach ($selecteer_diensten_om_te_tonen as $post) :  ?>
                                        <?php setup_postdata($post); ?>
                                        <div class="col-md-6 col-sm-6 col-12 service">
                                            <?php if (have_rows('homepagina_gegevens')) : ?>
                                                <?php while (have_rows('homepagina_gegevens')) : the_row(); ?>
                                                    <div class="d-flex">
                                                        <?php $icon = get_sub_field('icon'); ?>
                                                        <?php if ($icon) { ?>
                                                            <div class="icon" style="background-image:url(<?php echo $icon['sizes']['thumbnail']; ?>);">
                                                            </div>
                                                        <?php } ?>
                                                        <div class="inf">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <h3><?php the_title(); ?></h3>
                                                            </a>
                                                            <p><?php the_sub_field('intro_tekst'); ?></p>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            <?php endif; ?>
                            <?php $alle_diensten_knop = get_sub_field('alle_diensten_knop'); ?>
                            <?php if ($alle_diensten_knop) { ?>
                                <a class="btn" href="<?php echo $alle_diensten_knop['url']; ?>" target="<?php echo $alle_diensten_knop['target']; ?>"><?php echo $alle_diensten_knop['title']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php $afbeelding = get_sub_field('afbeelding'); ?>
                <?php if ($afbeelding) { ?>
                    <div class="img" style="background-image:url(<?php echo $afbeelding['sizes']['large']; ?>);">
                    </div>
                <?php } ?>
            </section>
        <?php elseif (get_row_layout() == 'uitgelichte_tools') : ?>
            <section class="tools">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 offset-md-1 col-sm-12 force">
                            <h2><?php the_sub_field('titel'); ?></h2>
                            <?php $selecteer_tools_om_te_tonen = get_sub_field('selecteer_tools_om_te_tonen'); ?>
                            <?php if ($selecteer_tools_om_te_tonen) : ?>
                                <div class="row">
                                    <?php foreach ($selecteer_tools_om_te_tonen as $post) :  ?>
                                        <?php setup_postdata($post); ?>
                                        <div class="col-md-6 col-sm-6 col-12 tool">
                                            <?php if (have_rows('homepagina_gegevens')) : ?>
                                                <?php while (have_rows('homepagina_gegevens')) : the_row(); ?>
                                                    <div class="d-flex">
                                                        <?php $icon = get_sub_field('icon'); ?>
                                                        <?php if ($icon) { ?>
                                                            <div class="icon" style="background-image:url(<?php echo $icon['sizes']['thumbnail']; ?>);">
                                                            </div>
                                                        <?php } ?>
                                                        <div class="inf">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <h3><?php the_title(); ?></h3>
                                                            </a>
                                                            <p><?php the_sub_field('intro_tekst'); ?></p>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            <?php endif; ?>
                            <?php $alle_tools_knop = get_sub_field('alle_tools_knop'); ?>
                            <?php if ($alle_tools_knop) { ?>
                                <a class="btn" href="<?php echo $alle_tools_knop['url']; ?>" target="<?php echo $alle_tools_knop['target']; ?>"><?php echo $alle_tools_knop['title']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php $afbeelding = get_sub_field('afbeelding'); ?>
                <?php if ($afbeelding) { ?>
                    <div class="img" style="background-image:url(<?php echo $afbeelding['sizes']['large']; ?>);">
                    </div>
                <?php } ?>
            </section>
        <?php elseif (get_row_layout() == 'werkwijze_stappen') : ?>
            <section class="start">
                <div class="marq">
                    <div data-bottom="left:-20vw;" data-top="left:0vw;"><?php the_sub_field('titel'); ?></div>
                    <div data-bottom="right:-20vw;" data-top="right:0vw;" style="float:right;"><?php the_sub_field('titel'); ?></div>
                </div>
                <div class="container clearfix">
                    <div class="row">
                        <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2">
                            <?php the_sub_field('content'); ?>
                            <?php $knop = get_sub_field('knop'); ?>
                            <?php if ($knop) { ?>
                                <a class="btn" href="<?php echo $knop['url']; ?>"><?php echo $knop['title']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'counters') : ?>
            <section class="counters">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <?php if (have_rows('counter_items')) : ?>
                                <div id="counter" class="d-flex justify-content-between">
                                    <?php while (have_rows('counter_items')) : the_row(); ?>
                                        <div class="p-2 text-center">
                                            <div class="counter-value <?php the_sub_field('counter_toevoeging'); ?>" data-count="<?php the_sub_field('counter_aantal'); ?>">0</div>
                                            <span class="counter--title"><?php the_sub_field('counter_titel'); ?></span>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'qoute') : ?>
            <section class="qoute">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-1 col-md-11 col-sm-12">
                            <p><?php the_sub_field('uw_qoute'); ?></p>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'vacatures') : ?>
            <section class="vacatures--hp">
                <div class="marq">
                    <div data-bottom="left:-20vw;" data-top="left:0vw;"><?php the_sub_field('titel'); ?></div>
                    <div data-bottom="right:-20vw;" data-top="right:0vw;" style="float:right;"><?php the_sub_field('titel'); ?></div>
                </div>
                <div class="container clearfix">
                    <div class="row">
                        <div class="offset-lg-3 col-lg-6 offset-md-1 col-md-10">
                            <?php echo do_shortcode('[uitzendplaats_latest_vacancies]'); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>