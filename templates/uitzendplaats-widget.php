<?php

/**
 * Provide a view for the vacancy widget
 *
 * @link https://www.uitzendplaats.nl
 * @since 1.0.0
 *
 * @package Uitzendplaats
 * @subpackage Uitzendplaats/admin/partials
 */
?>

<?php if (is_front_page()) { ?>
	<?php if (empty($view_data)) { ?>
		<p><?php _e('No vacancies found', 'uitzendplaats'); ?></p>
	<?php } else { ?>
		<?php $c = 0; ?>
		<?php shuffle($view_data->data); ?>
		<?php foreach ($view_data->data as $key => $item) { ?>
			<?php if ($c >= 3) {
							break;
						} else { ?>
				<div class="arch--vac-item">
					<div class='arch--vac-item-inner'>
						<h3><?php echo $item->title ?></h3>
						<span class="arch--location"><?php echo $item->location; ?></span>
						<p>
							<?php echo substr($item->description, 0, 128) . '...'; ?>
						</p>
						<a class="arch--btn" href="<?php echo get_site_url(null, get_option('uitzendplaats-options')['uzp-vacancy-index-page'] . '/' . sanitize_title($item->title) . '/' . $item->id . '/') ?>"><?php _e('Lees meer', 'flexsupport'); ?>
							<svg width="55" height="27" viewBox="0 0 55 27" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M42.0607 0.939453L54.6213 13.5001L42.0607 26.0608L39.9393 23.9395L48.8787 15.0001H0V12.0001H48.8787L39.9393 3.06077L42.0607 0.939453Z" fill="#001F3F" />
							</svg>
						</a>
					</div>
				</div>
				<?php $c++; ?>
			<?php } ?>
		<?php } ?>
	<?php } ?>
<?php } elseif (is_archive() || is_page()) { ?>
	<section class="overv other-pst">
		<div class="container">
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<h3><?php _e('Anderen bekeken ook', 'flexsupport'); ?></h3>
				</div>
				<div class="offset-md-1 col-md-10">
					<div class="other-items">
						<?php if (empty($view_data)) { ?>
							<p><?php _e('No vacancies found', 'uitzendplaats'); ?></p>
						<?php } else { ?>
							<?php $c = 0; ?>
							<?php shuffle($view_data->data); ?>
							<?php foreach ($view_data->data as $key => $item) { ?>
								<?php if ($c >= 3) {
												break;
											} else { ?>
									<div class="arch--item">
										<div class="arch--inner">
											<div class="align-items-center row">
												<a href="<?php echo get_site_url(null, get_option('uitzendplaats-options')['uzp-vacancy-index-page'] . '/' . sanitize_title($item->title) . '/' . $item->id . '/') ?>">
													<div class="thumb-crop align-items-end d-flex">
														<div class="inf">
															<?php setup_postdata($post); ?>
															<h3><?php echo $item->title ?></h3>
															<div class="btn"><?php _e('Lees meer', 'flexsupport'); ?></div>
														</div>
														<?php $fallback = get_field('fallback', 'option'); ?>
														<div class="thumb vac-inf" style="background-image:url(<?php echo $item->image_url_original; ?>);">
														</div>
													</div>
												</a>
											</div>
										</div>
									</div>
									<?php $c++; ?>
								<?php } ?>
							<?php } ?>
						<?php } ?>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		jQuery(document).ready(function() {
			jQuery('.other-items').slick({
				infinite: true,
				slidesToShow: 2,
				slidesToScroll: 1,
				arrows: false,
				focusOnSelect: true,
				centerMode: false,
				dots: true,
				lazyLoaded: true,
				appendDots: jQuery(".dots"),
			});
		});
	</script>
<?php } ?>