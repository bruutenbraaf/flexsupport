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
<div class="uzp uzp__index">
	<?php
	if ($_POST && array_key_exists('uzp_candidate_search', $_POST) && (!empty($search_query) || !empty($search_postal_code) || !empty($search_radius))) {
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
		echo '<h2>' . __('Candidates', 'uitzendplaats') . '</h2>';
	}
	?>
	<?php
	$item_type = __('Candidates', 'uitzendplaats');
	include uitzendplaats_get_template('partials/pagination-header');
	?>
	<?php if (empty($view_data) || !isset($view_data->data) || sizeof($view_data->data) === 0) { ?>
		<p><?php _e('No candidates found', 'uitzendplaats'); ?></p>
	<?php } else { ?>
		<?php foreach ($view_data->data as $key => $item) { ?>
			<article class="uzp__index-item">
				<a href="<?php echo get_site_url(null, get_option('uitzendplaats-options')['uzp-candidate-index-page'] . '/' . sanitize_title($item->education->data[0]->name) . '/' . $item->id . '/') ?>" title="<?php echo sprintf(__('Candidate %s from %s', 'uitzendplaats'), $item->education->data[0]->name, $item->city); ?>">
					<h2><?php echo sprintf(__('Candidate %s from %s', 'uitzendplaats'), $item->education->data[0]->name, $item->city); ?></h2>
				</a>
				<div class="uzp__meta text-muted">
					<?php echo $item->gender === 'M' ? __('Male', 'uitzendplaats') : __('Female', 'uitzendplaats'); ?> |
					<?php echo $item->age . ' ' . __('years', 'uitzendplaats'); ?> |
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

				<a class="moreinfo" href="<?php echo get_site_url(null, get_option('uitzendplaats-options')['uzp-candidate-index-page'] . '/' . sanitize_title($item->education->data[0]->name) . '/' . $item->id . '/') ?>" title="<?php _e('More information', 'uitzendplaats'); ?>"><?php _e('More information', 'uitzendplaats'); ?>
					<svg width="55" height="27" viewBox="0 0 55 27" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M42.0607 0.939331L54.6213 13.5L42.0607 26.0606L39.9393 23.9393L48.8787 15L0 15L0 12L48.8787 12L39.9393 3.06065L42.0607 0.939331Z" fill="#FDBB2C" />
					</svg>
				</a>
			</article>
		<?php } ?>
	<?php } ?>
	<div class="row">
		<div class="col-md-12 d-flex justify-content-center pagination">
			<?php
			// Pagination
			if ($pagination) {
				include uitzendplaats_get_template('partials/pagination');
			}
			?>
		</div>
	</div>
</div>