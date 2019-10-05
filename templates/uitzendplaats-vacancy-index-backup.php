<?php

/**
 * Provide a view for the vacancy index page
 *
 * @link https://www.uitzendplaats.nl
 * @since 1.0.0
 *
 * @package Uitzendplaats
 * @subpackage Uitzendplaats/public/templates
 */
?>
<div class="uzp uzp_index vacancie-overview">

	<?php
	if ($_POST && array_key_exists('uzp_vacancy_search', $_POST) && (!empty($search_query) || !empty($search_postal_code) || !empty($search_radius))) {
		$search_title = __('You searched for: ', 'uitzendplaats');
		if (!empty($search_query)) {
			$search_title .= sprintf(__(' \'%s\'', 'uitzendplaats'), $search_query);
		}
		if (!empty($search_postal_code)) {
			$search_title .= sprintf(__(' postal code \'%s\'', 'uitzendplaats'), $search_postal_code);
		}
		if (!empty($search_radius)) {
			$search_title .= sprintf(__(' radius \'%s km\'', 'uitzendplaats'), $search_radius);
		}
		echo '<p class="uzp__search-description">' . $search_title . '.</p>';


		if ($search_postal_code !== '' && $search_radius === '' || $search_postal_code === '' && $search_radius !== '') {
			echo '<div class="uzp__form-error-message">';
			_e('Both radius and postal code must be filled.', 'uitzendplaats');
			echo '</div>';
		}
	} else {
		echo '<h1>' . __('Vacancies', 'uitzendplaats') . '</h1>';
	}
	?>
	<?php if (empty($view_data) || !isset($view_data->data) || sizeof($view_data->data) === 0) { ?>
		<p><?php _e('No vacancies found', 'uitzendplaats'); ?></p>
	<?php } else { ?>
		<?php
			$item_type = __('Vacancies', 'uitzendplaats');
			include uitzendplaats_get_template('partials/pagination-header');
			?>
		<?php if (isset($view_data) && isset($view_data->data)) { ?>
			<?php foreach ($view_data->data as $key => $item) { ?>
				<article class="uzp__index-item">
					<a href="<?php echo get_site_url(null, get_option('uitzendplaats-options')['uzp-vacancy-index-page'] . '/' . sanitize_title($item->title) . '/' . $item->id . '/') ?>" title="<?php echo $item->title ?>">
						<h2><?php echo $item->title ?></h2>
					</a>
					<div class="uzp__meta text-muted">
						<?php echo $item->location ?> |
						<?php
									foreach ($item->branches->data as $key => $branche) {
										echo $branche->name;
										if ($key < count($item->branches->data) - 1) {
											echo ', ';
										}
									}
									?>
					</div>
					<?php
								$summary = $item->description;
								if (strlen($summary) > 320) {
									$summary = substr($summary, 0, strrpos(substr($summary, 0, 320), ' ')) . '...';
								}
								echo '<p>' . $summary . '</p>';
								?>

					<a class="moreinfo" href="<?php echo get_site_url(null, get_option('uitzendplaats-options')['uzp-vacancy-index-page'] . '/' . sanitize_title($item->title) . '/' . $item->id . '/') ?>" title="<?php _e('More information', 'uitzendplaats'); ?>"><?php _e('More information', 'uitzendplaats'); ?>
						<svg width="55" height="27" viewBox="0 0 55 27" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M42.0607 0.939331L54.6213 13.5L42.0607 26.0606L39.9393 23.9393L48.8787 15L0 15L0 12L48.8787 12L39.9393 3.06065L42.0607 0.939331Z" />
						</svg>
					</a>
				</article>
			<?php } ?>
			<?php
					// Pagination
					if ($pagination) {
						include uitzendplaats_get_template('partials/pagination');
					}
					?>
		<?php } ?>
	<?php } ?>
</div>