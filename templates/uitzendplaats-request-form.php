<div class="uzp">
	<form class="uzp__request-form" name="uzp__request-form">
		<?php if (isset($candidate_id) && isset($candidate_data)) { ?>
			<h2><?php echo sprintf( __('Request candidate %s from %s', 'uitzendplaats'), $candidate_data->data->education->data[0]->name, $candidate_data->data->city); ?></h2>
			<input type="hidden" name="id" id="inputID" value="<?php echo $candidate_id ?>" />
		<?php } else { ?>
			<h1><?php _e('Request candidate', 'uitzendplaats');?></h1>
		<?php } ?>
		<div class="uzp__form-success-message">
			<?php _e('The request is submitted. We will contact you as soon as possible.', 'uitzendplaats'); ?>
		</div>
		<div class="uzp__form-group uzp-row">
			<label for="inputName" class="uzp-col-sm-3 uzp__control-label"><?php _e('Name', 'uitzendplaats'); ?></label>
			<div class="uzp-col-sm-9">
				<input type="text" class="uzp__form-control" id="inputName" name="name" placeholder="">
				<p class="uzp__help-block" data-validate-for="name"></p>
			</div>
		</div>

		<div class="uzp__form-group uzp-row">
			<label for="inputEmail" class="uzp-col-sm-3 uzp__control-label"><?php _e('E-mail', 'uitzendplaats'); ?></label>
			<div class="uzp-col-sm-9">
				<input type="text" class="uzp__form-control" id="inputEmail" name="email" placeholder="">
				<p class="uzp__help-block" data-validate-for="email"></p>
			</div>
		</div>

		<div class="uzp__form-group uzp-row">
			<label for="inputCompanyName" class="uzp-col-sm-3 uzp__control-label"><?php _e('Company name', 'uitzendplaats'); ?></label>
			<div class="uzp-col-sm-9">
				<input type="text" class="uzp__form-control" id="inputCompanyName" name="company_name" placeholder="">
				<p class="uzp__help-block" data-validate-for="company_name"></p>
			</div>
		</div>

		<div class="uzp__form-group uzp-row">
			<label for="inputPhone" class="uzp-col-sm-3 uzp__control-label"><?php _e('Phone number', 'uitzendplaats'); ?></label>
			<div class="uzp-col-sm-9">
				<input type="text" class="uzp__form-control" id="inputPhone" name="phone" placeholder="">
				<p class="uzp__help-block" data-validate-for="phone"></p>
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
				<div class="uzp__checkbox uzp__accept-terms">
					<label>
						<input type="checkbox" name="accept_terms" value="1" id="acceptTerms" />
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