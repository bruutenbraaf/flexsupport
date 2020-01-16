<?php if (have_rows('header_single')) : ?>
    <?php while (have_rows('header_single')) : the_row(); ?>
        <section class="header--hp hm<?php if ( get_sub_field( 'remove_space' ) == 1 ) { ?> rms<?php } ?>">
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
                    <?php if ($knop || $secondaire_knop) { ?>
                        <div class="d-flex flex-nowrap align-items-center offset-md-1 btns">
                            <?php $knop = get_sub_field('knop'); ?>
                            <?php if ($knop) { ?>
                                <a class="btn--header" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                            <?php } ?>
                            <?php $secondaire_knop = get_sub_field('secondaire_knop'); ?>
                            <?php if ($secondaire_knop) { ?>
                                <a class="btn--header secondair" href="<?php echo $secondaire_knop['url']; ?>" <?php if ($secondaire_knop['target']) { ?>target="<?php echo $secondaire_knop['target']; ?>" <?php } ?>><?php echo $secondaire_knop['title']; ?></a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <div class="<?php if ($knop || !$secondaire_knop) { ?> offset-md-1 col-md-8 inth<?php } else { ?>int<?php } ?>">
                        <?php the_sub_field('intro_text'); ?>
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

<?php if (get_the_post_thumbnail_url($post, 'large')) { ?>
    <div class="full--img" style="background-image:url(<?php echo get_the_post_thumbnail_url($post, 'full_img'); ?>);">
    </div>
<?php } ?>

<?php if (have_rows('sections')) : ?>
    <?php while (have_rows('sections')) : the_row(); ?>
        <?php if (get_row_layout() == 'volledige') : ?>
            <section class="about <?php the_sub_field('selecteer_kleur'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 offset-md-1">
                            <span class="sub">
                                <?php the_sub_field('subtitle'); ?>
                            </span>
                        </div>
                        <div class="col-md-8">
                            <?php the_sub_field('content'); ?>
                            <?php $knop = get_sub_field('knop'); ?>
                            <?php if ($knop) { ?>
                                <a class="btn" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?> ?target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'volle_breedte_text_geen_subtitel') : ?>
            <section class="about <?php the_sub_field('selecteer_kleur'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <?php the_sub_field('content'); ?>
                            <?php $knop = get_sub_field('knop'); ?>
                            <?php if ($knop) { ?>
                                <a class="btn" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?> ?target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'carrousel') : ?>
            <div class="carrousel">
                <?php if (have_rows('afbeeldingen')) : ?>
                    <div class="carrousel-items">
                        <?php while (have_rows('afbeeldingen')) : the_row(); ?>
                            <div class="carrousel-item">
                                <?php $afbeelding_upload = get_sub_field('afbeelding_upload'); ?>
                                <?php if ($afbeelding_upload) { ?>
                                    <div class="carousel-img" style="background-image:url(<?php echo $afbeelding_upload['sizes']['large']; ?>);" ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="offset-md-1 col-md-10">
                            <div class="dots">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                jQuery(document).ready(function() {
                    jQuery('.carrousel-items').slick({
                        infinite: true,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        arrows: false,
                        focusOnSelect: true,
                        centerMode: true,
                        dots: true,
                        lazyLoaded: true,
                        appendDots: jQuery(".dots"),
                    });
                });
            </script>
        <?php elseif (get_row_layout() == 'volledige_afbeelding') : ?>
            <?php $afbeelding = get_sub_field('afbeelding'); ?>
            <?php if ($afbeelding) { ?>
                <div class="full--img" style="background-image:url(<?php echo $afbeelding['sizes']['full_img']; ?>);">
                </div>
            <?php } ?>
        <?php elseif (get_row_layout() == 'klanten') : ?>
            <section class="customers <?php the_sub_field('selecteer_kleur'); ?>">
                <div class="marq--vac">
                    <div class="tpx"><?php the_sub_field('titel'); ?></div>
                    <div class="btx"><?php the_sub_field('titel'); ?></div>
                </div>
                <?php $selecteer_klanten_om_te_tonen = get_sub_field('selecteer_klanten_om_te_tonen'); ?>
                <?php if ($selecteer_klanten_om_te_tonen) : ?>
                    <div class="customers-over">
                        <div class="row">
                            <?php foreach ($selecteer_klanten_om_te_tonen as $post) :  ?>
                                <?php setup_postdata($post); ?>
                                <div class="col-md-3 customer col-6 text-center">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url($post, 'large'); ?>"></a>
                                </div>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
        <?php elseif (get_row_layout() == 'diensten_static') : ?>
            <section class="overv services">
                <div class="container">
                    <div class="row">
                        <div class="offset-md-1 col-md-10">
                            <?php if (get_sub_field('zelf_diensten_selecteren') == 1) { ?>
                                <?php $selecteer_diensten_om_te_tonen = get_sub_field('selecteer_diensten_om_te_tonen'); ?>
                                <?php if ($selecteer_diensten_om_te_tonen) : ?>
                                    <div class="arch-items">
                                        <?php foreach ($selecteer_diensten_om_te_tonen as $post) :  ?>
                                            <div class="arch--item">
                                                <div class="arch--inner">
                                                    <div class="align-items-center row">
                                                        <div class="col-md-6 m-second">
                                                            <a href="<?php the_permalink() ?>">
                                                                <?php setup_postdata($post); ?>
                                                                <h3><?php the_title(); ?></h3>
                                                                <?php if (have_rows('homepagina_gegevens', $post->ID)) : ?>
                                                                    <?php while (have_rows('homepagina_gegevens', $post->ID)) : the_row(); ?>
                                                                        <p><?php the_sub_field('intro_tekst'); ?></p>
                                                                    <?php endwhile; ?>
                                                                <?php endif; ?>
                                                            </a>
                                                            <a href="<?php the_permalink(); ?>" class="btn"><?php _e('Lees meer', 'flexsupport'); ?></a>
                                                        </div>
                                                        <div class="col-md-6 m-first">
                                                            <a href="<?php the_permalink() ?>">
                                                                <div class="thumb-crop">
                                                                    <div class="thumb" style="background-image:url(<?php echo get_the_post_thumbnail_url($post, 'large'); ?>);">
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </div>
                                <?php endif; ?>
                            <?php } else { ?>
                                <?php $loop = new WP_Query(array(
                                                    'post_type' => 'diensten',
                                                    'posts_per_page' => 3,
                                                    'order' => 'DESC'
                                                )); ?>
                                <?php if ($loop->have_posts()) : ?>
                                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                        <div class="arch--item">
                                            <div class="arch--inner">
                                                <div class="align-items-center row">
                                                    <div class="col-md-6">
                                                        <a href="<?php the_permalink() ?>">
                                                            <?php setup_postdata($post); ?>
                                                            <h3><?php the_title(); ?></h3>
                                                            <?php if (have_rows('homepagina_gegevens', $post->ID)) : ?>
                                                                <?php while (have_rows('homepagina_gegevens', $post->ID)) : the_row(); ?>
                                                                    <p><?php the_sub_field('intro_tekst'); ?></p>
                                                                <?php endwhile; ?>
                                                            <?php endif; ?>
                                                        </a>
                                                        <a href="<?php the_permalink(); ?>" class="btn"><?php _e('Lees meer', 'flexsupport'); ?></a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="<?php the_permalink() ?>">
                                                            <div class="thumb-crop">
                                                                <div class="thumb" style="background-image:url(<?php echo get_the_post_thumbnail_url($post, 'large'); ?>);">
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                <?php endif; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'qoute') : ?>
            <section class="qoute <?php the_sub_field( 'selecteer_kleur' ); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-1">
                            <p><?php the_sub_field('uw_qoute'); ?></p>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'diensten__tools') : ?>
            <?php if (get_sub_field('toon_afbeelding_links_of_rechts') == 1) { ?>
                <section class="services ts">
                    <div class="container">
                        <div class="row">
                            <div class="offset-md-5 col-md-6">
                                <h2><?php the_sub_field('titel'); ?></h2>
                                <?php $selecteer_diensten_of_tools = get_sub_field('selecteer_diensten_of_tools'); ?>
                                <?php if ($selecteer_diensten_of_tools) : ?>
                                    <div class="row">
                                        <?php foreach ($selecteer_diensten_of_tools as $post) :  ?>
                                            <?php setup_postdata($post); ?>
                                            <div class="col-md-6 service">
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
                                    <a class="btn" href="<?php echo $alle_diensten_knop['url']; ?>" <?php if ($alle_diensten_knop['target']) { ?>target="<?php echo $alle_diensten_knop['target']; ?>" <?php } ?>><?php echo $alle_diensten_knop['title']; ?></a>
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
            <?php } else { ?>
                <section class="tools">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 offset-md-1">
                                <h2><?php the_sub_field('titel'); ?></h2>
                                <?php $selecteer_diensten_of_tools = get_sub_field('selecteer_diensten_of_tools'); ?>
                                <?php if ($selecteer_diensten_of_tools) : ?>
                                    <div class="row">
                                        <?php foreach ($selecteer_diensten_of_tools as $post) :  ?>
                                            <?php setup_postdata($post); ?>
                                            <div class="col-md-6 tool">
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
                                    <a class="btn" href="<?php echo $alle_tools_knop['url']; ?>" <?php if ($alle_tools_knop['target']) { ?>target="<?php echo $alle_tools_knop['target']; ?>" <?php } ?>><?php echo $alle_tools_knop['title']; ?></a>
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
            <?php } ?>
        <?php elseif (get_row_layout() == 'werkwijze') : ?>
            <section class="werkwijze">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <?php the_sub_field('titel'); ?>
                            <?php if (have_rows('stappen')) : ?>
                                <?php $total = 0; ?>
                                <?php while (have_rows('stappen')) : the_row(); ?>
                                    <?php $total++; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <?php if (have_rows('stappen')) : ?>
                                <?php $count = 0; ?>
                                <div class="slck-nav">
                                    <div class="nxt-slds">
                                        <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.06307 14L4.94019 14C4.50754 14 4.15947 13.6657 4.15947 13.2501L4.15947 7.00078L0.782856 7.00078C0.0867142 7.00078 -0.261357 6.19462 0.229846 5.71967L5.94862 0.220287C6.2544 -0.0734302 6.74885 -0.0734302 7.05464 0.220287L12.7702 5.71967C13.2614 6.1915 12.9133 7.00078 12.2171 7.00078L8.84378 7.00078L8.84379 13.2501C8.84379 13.6657 8.49571 14 8.06307 14Z" fill="white"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="stappen">
                                    <?php while (have_rows('stappen')) : the_row(); ?>
                                        <?php $count++; ?>
                                        <div class="stap">
                                            <?php $afbeelding = get_sub_field('afbeelding'); ?>
                                            <?php if ($afbeelding) { ?>
                                                <div class="stap-img-outer">
                                                    <div class="stap--img" style="background-image:url(<?php echo $afbeelding['sizes']['xl']; ?>);">
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <span class="stap--total"><?php echo $count; ?> / <?php echo $total; ?></span>
                                            <span class="titel"><?php the_sub_field('titel'); ?></span>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                                <script>
                                    jQuery(document).ready(function() {
                                        jQuery('.stappen').slick({
                                            infinite: true,
                                            slidesToShow: 2,
                                            slidesToScroll: 1,
                                            arrows: true,
                                            focusOnSelect: true,
                                            centerMode: false,
                                            dots: false,
                                            lazyLoaded: true,
                                            prevArrow: jQuery('.nxt-slds'),
                                            nextArrow: jQuery('.nxt-slds'),
                                        });
                                    });
                                </script>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'team') : ?>
            <section class="team <?php the_sub_field('selecteer_kleur'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 offset-md-1">
                            <span class="sub">
                                <?php the_sub_field('subtitel'); ?>
                            </span>
                        </div>
                        <div class="col-md-8">
                            <?php the_sub_field('titel'); ?>
                        </div>
                        <div class="col-md-10 offset-md-1">
                            <div class="row">
                                <?php $selecteer_werknemers_om_te_tonen = get_sub_field('selecteer_werknemers_om_te_tonen'); ?>
                                <?php if ($selecteer_werknemers_om_te_tonen) : ?>
                                    <?php foreach ($selecteer_werknemers_om_te_tonen as $post) :  ?>
                                        <?php setup_postdata($post); ?>
                                        <div class="col-md-6 member">
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="img-holder">
                                                    <div class="the--img" style="background-image:url(<?php echo get_the_post_thumbnail_url($post, 'large'); ?>);">
                                                    </div>
                                                </div>
                                                <span class="name"><?php the_title(); ?></span>
                                                <?php if (have_rows('informatie_werknemer')) : ?>
                                                    <?php while (have_rows('informatie_werknemer')) : the_row(); ?>
                                                        <a class="email" href="maitlo:<?php the_sub_field('e-mailadres'); ?>"><?php the_sub_field('e-mailadres'); ?></a>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php wp_reset_postdata(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php $knop = get_sub_field('knop'); ?>
                        <?php if ($knop) { ?>
                            <div class="col-md-10 offset-md-1">
                                    <a class="btn" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'logos') : ?>
            <section class="lgs">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <?php if (have_rows('upload_logos')) : ?>
                            <?php while (have_rows('upload_logos')) : the_row(); ?>
                                <?php $logo = get_sub_field('logo'); ?>
                                <?php if ($logo) { ?>
                                    <div class="p-2">
                                        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
                                    </div>
                                <?php } ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'formulieren_downloaden') : ?>
            <section class="downloads">
                <?php if (have_rows('formulier_section')) : ?>
                    <?php while (have_rows('formulier_section')) : the_row(); ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <h2><?php the_sub_field('titel'); ?></h2>
                                </div>
                                <?php if (have_rows('formulieren__bestanden')) : ?>
                                    <div class="col-md-10 offset-md-1">
                                        <div class="row">
                                            <?php while (have_rows('formulieren__bestanden')) : the_row(); ?>
                                                <?php $bestand = get_sub_field('bestand'); ?>
                                                <?php if ($bestand) { ?>
                                                    <div class="col-md-6">
                                                        <a class="dwnload" href="<?php echo $bestand['url']; ?>"><?php echo $bestand['filename']; ?> <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M5 8L10 13M10 13L15 8M10 13V1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>