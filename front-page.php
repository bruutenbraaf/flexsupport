<?php
get_header(); ?>

<?php if (have_rows('header_home')) : ?>
    <?php while (have_rows('header_home')) : the_row(); ?>
        <section class="header--hp">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-1 intp">
                        <?php the_sub_field('titel'); ?>
                    </div>
                </div>
                <div class="d-flex m-flex">
                    <div class="flex-nowrap align-items-center offset-md-1 hp--btns">
                        <?php if (have_rows('knoppen')) : ?>
                            <?php while (have_rows('knoppen')) : the_row(); ?>
                                <?php $knop = get_sub_field('knop'); ?>
                                <?php if ($knop) { ?>
                                    <a class="btn--header<?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" <?php if ($target) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>>
                                        <?php if (get_sub_field('is_medewerker_aanmelden') == 1) { ?>
                                            <svg width="414" height="443" viewBox="0 0 414 443" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0)">
                                                    <path d="M19.5493 87.5757C19.5493 94.0566 19.5493 98.5617 19.5493 102.988C19.5493 188.821 19.8658 274.654 19.2328 360.487C19.1536 373.923 23.3476 376.926 36.0876 376.689C77.7105 375.899 119.254 376.373 160.877 376.373C165.309 376.373 169.819 376.373 174.883 376.373C174.092 390.046 169.502 395.974 155.18 395.658C112.212 394.709 69.2435 395.341 26.2754 395.341C5.14744 395.341 0.0830604 390.283 0.0830604 368.864C0.00392945 273.547 -0.154332 178.23 0.399584 82.9126C0.478715 75.7203 4.03961 66.9473 8.94573 61.6519C26.038 43.0785 44.159 25.2954 62.6756 8.06558C67.3444 3.71861 75.0992 0.47814 81.4297 0.399104C147.9 -0.154147 214.37 0.00392473 280.84 0.0829606C296.349 0.0829606 302.996 5.22029 303.076 19.1306C303.392 73.7444 303.155 128.437 303.076 183.051C303.076 184.316 302.363 185.58 301.809 187.635C296.666 187.635 291.443 187.635 284.401 187.635C284.401 131.994 284.401 76.3526 284.401 19.921C218.168 19.921 153.755 19.921 87.9184 19.921C87.9184 37.8621 87.5228 54.9339 88.0767 72.0056C88.4723 83.782 83.4871 88.208 71.934 87.8128C55.2373 87.1805 38.5407 87.5757 19.5493 87.5757V87.5757ZM31.8937 67.2635C44.6338 67.2635 55.8704 67.2635 67.8983 67.2635C67.8983 55.329 67.8983 44.0269 67.8983 33.5942C56.1869 44.5011 44.7129 55.329 31.8937 67.2635V67.2635Z" fill="white" />
                                                    <path d="M394.471 422.846C389.407 376.057 364.639 346.655 322.304 329.979C333.382 320.337 341.454 315.357 355.301 323.814C395.896 348.71 419.477 394.946 412.909 443C333.778 443 254.409 443 172.271 443C173.142 430.829 172.984 418.341 175.041 406.328C181.055 371.552 199.651 344.759 229.246 325.632C245.942 314.804 247.921 315.199 264.222 330.453C222.757 347.288 197.119 376.057 193.083 422.925C260.74 422.846 326.893 422.846 394.471 422.846V422.846Z" fill="white" />
                                                    <path d="M229.246 259.716C229.167 223.755 257.575 195.223 293.58 195.144C329.268 195.065 357.834 223.676 357.992 259.716C358.151 295.44 329.584 324.209 293.58 324.605C258.841 325 229.325 295.203 229.246 259.716V259.716ZM293.342 215.377C269.128 215.456 249.425 234.978 248.95 259.242C248.554 283.506 269.049 303.976 293.738 304.055C317.398 304.055 337.814 283.901 338.051 260.111C338.289 235.373 318.189 215.298 293.342 215.377V215.377Z" fill="white" />
                                                    <path d="M150.669 137.447C120.441 137.447 90.2128 137.368 59.9848 137.447C52.6256 137.447 43.9212 137.921 43.4464 128.121C42.8925 117.767 51.8343 118.321 59.1143 118.321C120.916 118.321 182.717 118.241 244.439 118.321C251.086 118.321 259.316 117.372 259.474 127.252C259.632 137.684 251.323 137.368 243.964 137.368C212.866 137.526 181.767 137.447 150.669 137.447V137.447Z" fill="white" />
                                                    <path d="M150.986 181.707C120.283 181.707 89.6591 181.707 58.9563 181.707C51.518 181.707 42.9719 181.944 43.4467 171.749C43.8423 162.818 51.5972 162.66 58.7189 162.739C120.52 162.818 182.322 162.818 244.123 162.739C251.561 162.739 259.791 162.423 259.474 172.934C259.237 182.893 250.928 181.707 244.281 181.707C213.262 181.707 182.163 181.707 150.986 181.707Z" fill="white" />
                                                    <path d="M111.182 226.758C93.5361 226.758 75.969 226.758 58.3228 226.758C50.9636 226.758 43.1297 225.414 44.8705 216.404C45.5827 212.69 53.6541 207.947 58.5602 207.868C94.2483 207.157 129.936 207.157 165.545 207.868C170.372 207.947 178.523 212.927 179.156 216.562C180.58 225.335 172.746 226.758 165.387 226.758C147.266 226.758 129.224 226.758 111.182 226.758V226.758Z" fill="white" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0">
                                                        <rect width="414" height="443" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        <?php } ?>
                                        <?php echo $knop['title']; ?></a>
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
                <section class="full--img<?php if (get_sub_field('toon_overlay') == 1) { ?> overlay<?php } ?>" style="background-image:url(<?php echo $upload_afbeelding['sizes']['full_img']; ?>)">
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
                                <a class="btn" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
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
                            <?php the_sub_field('titel'); ?>
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
                    <div class="img" style="background-image:url(<?php echo $afbeelding['sizes']['full_portrait']; ?>);">
                    </div>
                <?php } ?>
            </section>
        <?php elseif (get_row_layout() == 'uitgelichte_tools') : ?>
            <section class="tools">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 offset-md-1 col-sm-12 force">
                            <?php the_sub_field('titel'); ?>
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
                                <a class="btn" href="<?php echo $alle_tools_knop['url']; ?>" <?php if ($alle_tools_knop['target']) { ?>target="<?php echo $alle_tools_knop['target']; ?>" <?php } ?>><?php echo $alle_tools_knop['title']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php $afbeelding = get_sub_field('afbeelding'); ?>
                <?php if ($afbeelding) { ?>
                    <div class="img" style="background-image:url(<?php echo $afbeelding['sizes']['full_portrait']; ?>);">
                    </div>
                <?php } ?>
            </section>
        <?php elseif (get_row_layout() == 'werkwijze_stappen') : ?>
            <section class="start">
                <div class="marq">
                    <div class="tp"><?php the_sub_field('titel'); ?></div>
                    <div class="bt"><?php the_sub_field('titel'); ?></div>
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
                        <div class="col-md-12">
                            <?php if (have_rows('counter_items')) : ?>
                                <div id="counter" class="d-flex justify-content-between">
                                    <?php while (have_rows('counter_items')) : the_row(); ?>
                                        <div class="p-2 text-center">
                                            <?php if (wp_is_mobile()) { ?>
                                                <div class="counter-value <?php the_sub_field('counter_toevoeging'); ?>"><?php the_sub_field('counter_aantal'); ?></div>
                                                <span class="counter--title"><?php the_sub_field('counter_titel'); ?></span>
                                            <?php } else { ?>
                                                <div class="counter-value <?php the_sub_field('counter_toevoeging'); ?>" data-count="<?php the_sub_field('counter_aantal'); ?>">0</div>
                                                <span class="counter--title"><?php the_sub_field('counter_titel'); ?></span>
                                            <?php } ?>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                var a = 0;
                jQuery(window).scroll(function() {

                    var oTop = jQuery('#counter').offset().top - window.innerHeight;
                    if (a == 0 && jQuery(window).scrollTop() > oTop) {
                        jQuery('.counter-value').each(function() {
                            var $this = jQuery(this),
                                countTo = $this.attr('data-count');
                            jQuery({
                                countNum: $this.text()
                            }).animate({
                                    countNum: countTo
                                },

                                {
                                    duration: 2000,
                                    easing: 'swing',
                                    step: function() {
                                        $this.text(Math.floor(this.countNum));
                                    },
                                    complete: function() {
                                        $this.text(this.countNum);
                                    }
                                });
                        });
                        a = 1;
                    }
                });
            </script>
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
                <div class="marq--vac">
                    <div class="tpx"><?php the_sub_field('titel'); ?></div>
                    <div class="btx"><?php the_sub_field('titel'); ?></div>
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