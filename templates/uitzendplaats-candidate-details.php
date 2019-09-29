<section class="header--sngl candidate--header">
	<div class="container">
		<div class="row">
		<div class="col-md-1 col-3">
				<a href="<?php echo site_url(); ?>/vacatures" class="back">
					<svg width="79" height="27" viewBox="0 0 79 27" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M13.4393 26.0607L0.878678 13.5L13.4393 0.939346L15.5607 3.06067L6.62132 12L79 12L79 15L6.62132 15L15.5607 23.9393L13.4393 26.0607Z" fill="#001F3F" />
					</svg>
				</a>
			</div>
			<div class="col-md-8 col-8">
				<a href="<?php echo site_url(); ?>/vacatures" class="back">
					<?php _e('Terug', 'flexsupport'); ?>
				</a>
			</div>
			<div class="col-md-8 offset-md-1">
				<h1><?php echo sprintf(__('Candidate %s from %s', 'uitzendplaats'), $view_data->data->education->data[0]->name, $view_data->data->city); ?></h1>
			</div>
			<div class="offset-md-1 col-md-6">
				<?php echo $view_data->data->gender === 'M' ? __('Male', 'uitzendplaats') : __('Female', 'uitzendplaats'); ?> |
				<?php echo $view_data->data->age . ' ' . __('years', 'uitzendplaats'); ?> |
				<?php
				foreach ($view_data->data->branches->data as $key => $branche) {
					echo $branche->name;
					if ($key < count($view_data->data->branches->data) - 1) {
						echo ', ';
					}
				}
				?>
			</div>
			<div class="col-md-5 justify-content-end align-items-end d-flex">
				<div>
					<a class="small" href="#aanvragen"><?php _e('Request', 'uitzendplaats'); ?>
						<svg width="79" height="27" viewBox="0 0 79 27" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M65.5607 0.93932L78.1213 13.5L65.5607 26.0606L63.4393 23.9393L72.3787 15L2.45844e-06 15L1.93391e-06 12L72.3787 12L63.4393 3.06064L65.5607 0.93932Z" fill="#35FFB6" />
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="about about-candidate">
	<div class="container">
		<div class="row">
			<div class="col-md-2 offset-md-1">
				<span class="sub">
					<?php _e('Referentie nr:', 'flexsupport'); ?> <?php echo $view_data->data->refno; ?>
				</span>
			</div>
			<div class="col-md-8 description">
				<h2><?php _e('Omschrijving van kandidaat', 'flexsupport'); ?></h2>
				<p><?php echo $view_data->data->description; ?></p>

				<h2><?php _e('Extra informatie', 'flexsupport'); ?></h2>
				<p>
					<?php echo sprintf(
						__('Kandidaat wil graag <b>%s</b> per week werken', 'flexsupport'),
						$view_data->data->hours_max
					); ?> <?php _e('en is in het bezit van', 'flexsupport'); ?> <b><?php
																					if (count($view_data->data->education->data) > 0) {
																						foreach ($view_data->data->education->data as $key => $education) {
																							echo $education->name;
																							if ($key < count($view_data->data->education->data) - 1) {
																								echo ', ';
																							}
																						}
																					} else {
																						_e('None');
																					}
																					?> <?php _e("diploma(s)", 'flexsupport'); ?>.</b>
					<?php _e('Ook is de kandidaat in het bezit van', 'flexsupport'); ?> <b><?php
																							if (count($view_data->data->licenses->data) > 0) {
																								foreach ($view_data->data->licenses->data as $key => $license) {
																									echo $license->name;
																									if ($key < count($view_data->data->licenses->data) - 1) {
																										echo ', ';
																									}
																								}
																							} else {
																								_e('None');
																							}
																							?></td> <?php if (count($view_data->data->licenses->data) == 1) { ?>
							<?php _e('rijbewijs', 'flexsupport'); ?>.
						<?php } else { ?>
							<?php _e('rijbewijzen', 'flexsupport'); ?>.
						<?php } ?></b>
				</p>
			</div>
		</div>
	</div>
</section>


<section class="about requestform" id="aanvragen">
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<?php echo do_shortcode('[uitzendplaats_request_form]'); ?>
			</div>
		</div>
	</div>
</section>

<section class="nextpost">
	<div class="container">
		<div class="row">
			<div class="offset-md-2 col-md-6">
				<span class="n"><?php _e('Einde bereikt', 'flexsupport'); ?></span>
				<a href="<?php echo site_url(); ?>/kandidaten">
					<h2><?php _e('Terug naar overzicht?', 'flexsupport'); ?></h2>
				</a>
			</div>
			<div class="col-md-2 align-items-center justify-content-end d-flex">
				<a href="<?php echo site_url(); ?>/kandidaten">
					<svg class="arr" width="67" height="27" viewBox="0 0 67 27" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M53.5607 26.0605L66.1213 13.4999L53.5607 0.939225L51.4393 3.06054L60.3787 11.9999L0.499999 11.9999L0.499999 14.9999L60.3787 14.9999L51.4393 23.9392L53.5607 26.0605Z" fill="white" />
					</svg>
				</a>
			</div>
		</div>
	</div>
</section>