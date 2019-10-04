<div class="uzp">
	<form class="uzp__vacancy-form" name="uzp__vacancy-form">
		<?php if (!isset($hide_title) || $hide_title !== true) { ?>
			<?php if (isset($view_data) && property_exists($view_data, 'data')) { ?>
				<h2><?php _e('Solliciteer','flexsupport');?></h2>
				<input type="hidden" name="id" id="inputID" value="<?php echo $vacancy_id ?>" />
			<?php } else { ?>
				<h1><?php _e('Apply for a vacancy', 'uitzendplaats');?></h1>
			<?php } ?>
		<?php } ?>

		<div class="uzp__form-success-message">
			<?php _e('Your application has been submitted. We will contact you as soon as possible.', 'uitzendplaats'); ?>
		</div>

		<div class="uzp__form-group uzp-row">
			<label for="inputFirstName" class="uzp-col-sm-3 uzp__control-label"><?php _e('First name', 'uitzendplaats'); ?></label>
			<div class="uzp-col-sm-9">
				<input type="text" class="uzp__form-control" id="inputFirstName" name="first_name">
				<p class="uzp__help-block" data-validate-for="first_name"></p>
			</div>
		</div>

		<div class="uzp__form-group uzp-row">
			<label for="inputPrefix" class="uzp-col-sm-3 uzp__control-label"><?php _e('Middle name', 'uitzendplaats'); ?></label>
			<div class="uzp-col-sm-9">
				<input type="text" class="uzp__form-control" id="inputPrefix" name="prefix">
				<p class="uzp__help-block" data-validate-for="prefix"></p>
			</div>
		</div>

		<div class="uzp__form-group uzp-row">
			<label for="inputLastName" class="uzp-col-sm-3 uzp__control-label"><?php _e('Last name', 'uitzendplaats'); ?></label>
			<div class="uzp-col-sm-9">
				<input type="text" class="uzp__form-control" id="inputLastName" name="last_name">
				<p class="uzp__help-block" data-validate-for="last_name"></p>
			</div>
		</div>

		<div class="uzp__form-group uzp-row">
			<label for="inputEmail" class="uzp-col-sm-3 uzp__control-label"><?php _e('E-mail', 'uitzendplaats'); ?></label>
			<div class="uzp-col-sm-9">
				<input type="text" class="uzp__form-control" id="inputEmail" name="email" placeholder="<?php _e('your@email.com', 'uitzendplaats'); ?>">
				<p class="uzp__help-block" data-validate-for="email"></p>
			</div>
		</div>

		<div class="uzp__form-group uzp-row">
			<label for="inputPhone" class="uzp-col-sm-3 uzp__control-label"><?php _e('Phone number', 'uitzendplaats'); ?></label>
			<div class="uzp-col-sm-9">
				<input type="text" class="uzp__form-control" id="inputPhone" name="phone" placeholder="06 - 1234 4321">
				<p class="uzp__help-block" data-validate-for="phone"></p>
			</div>
		</div>

		<div class="uzp__form-group uzp-row">
			<label for="inputCv" class="uzp-col-sm-3 uzp__control-label"><?php _e('Resume', 'uitzendplaats'); ?></label>
			<div class="uzp-col-sm-9">
				<input type="file" class="uzp__form-control uzp__file-select" id="inputCv" name="cv">
				<p class="uzp__help-block" data-validate-for="cv"></p>
				<p class="uzp__help-block--hidden uzp__help-block--filesize"><?php _e('The maximum allowed filesize is 2MB', 'uitzendplaats'); ?></p>
			</div>
		</div>

		<div class="uzp__form-group uzp-row">
			<label class="uzp-col-sm-3 uzp__control-label" for="inputMessage"><?php _e('Accompanying message', 'uitzendplaats'); ?></label>
			<div class="uzp-col-sm-9">
				<textarea class="uzp__form-control" rows="5" id="inputMessage" name="message"></textarea>
				<p class="uzp__help-block" data-validate-for="message"></p>
			</div>
		</div>

		<div class="uzp__form-group uzp-row">
			<div class="uzp-col-sm-9 uzp-col-sm-push-3">
				<div class="uzp__checkbox">
					<label>
						<input type="checkbox" name="accept_terms" value="true"  id="acceptTerms" />
						<?php _e('The personal data you have entered in this form will only be used for purposes that the legislator allows. When you send this form you give permission process the data you provide. For more information see our <a href=/privacy/ target=_blank>privacy statement</a>.', 'uitzendplaats'); ?>
					</label>
				</div>
				<p class="uzp__help-block" data-validate-for="accept_terms"></p>
			</div>
		</div>

		<div class="uzp__form-group uzp-row">
			<div class="uzp-col-sm-9 uzp-col-sm-push-3">
				<button type="submit"><?php _e('Send', 'uitzendplaats'); ?></button>
			</div>
		</div>
	</form>
</div>