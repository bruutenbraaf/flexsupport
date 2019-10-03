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
					<p><?php echo $item->description; ?></p>
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