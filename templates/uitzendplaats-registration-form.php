<div class="uzp">
	<div class="uzp__registration-type container">
		<p class="uzp__registration-intro"><?php _e('I would like to register by:', 'uitzendplaats'); ?></p>
		<div class="row">
			<div class="col-sm-6">
				<button type="button" class="green-btn" onclick="setRegistrationType('short')">
					<?php _e('Uploading my resume (Faster)', 'uitzendplaats'); ?>
				</button>
			</div>
			<div class="col-sm-6">
				<button type="button" class="blue-btn" onclick="setRegistrationType('long')">
					<?php _e('Filling the form', 'uitzendplaats'); ?>
				</button>
			</div>
		</div>
	</div>

	<div class="uzp__registration-form">
		<form class="uzp__registration-form" name="uzp__registration-form">
			<div class="uzp__form-success-message">
				<?php _e('Your registration has been submitted. We will contact you as soon as possible.', 'uitzendplaats'); ?>
			</div>

			<div class="uzp__panel">
				<div class="uzp__panel-body container">
					<fieldset class="uzp__fieldset">
						<legend><?php _e('Your name', 'uitzendplaats'); ?></legend>
						<div class="uzp__form-group row">
							<div class="col-sm-4">
								<div>
									<label for="inputFirstName"><?php _e('First name', 'uitzendplaats'); ?></label>
									<input id="inputFirstName" name="first_name" class="uzp__form-control" type="text">
									<p class="uzp__help-block" data-validate-for="first_name"></p>
								</div>
							</div>
							<div class="col-sm-3">
								<div>
									<label for="inputPrefix"><?php _e('Prefix', 'uitzendplaats'); ?></label>
									<input id="inputPrefix" name="prefix" class="uzp__form-control"  type="text">
									<p class="uzp__help-block" data-validate-for="prefix"></p>
								</div>
							</div>
							<div class="col-sm-5">
								<div>
									<label for="inputLastName"><?php _e('Last name', 'uitzendplaats'); ?></label>
									<input id="inputLastName" name="last_name" class="uzp__form-control" type="text">
									<p class="uzp__help-block" data-validate-for="last_name"></p>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>

			<div class="uzp__panel">
				<div class="uzp__panel-body container">
					<fieldset class="uzp__fieldset">
						<legend><?php _e('Details', 'uitzendplaats'); ?></legend>

						<div class="uzp__form-group row">
							<label class="col-sm-12 uzp__control-label sub-label"><?php _e('Birth date', 'uitzendplaats'); ?></label>
							<div class="col-sm-4">
								<label for="inputBirthdayDay" class="uzp__hidden-label"><?php _e('Birth date day', 'uitzendplaats'); ?></label>
								<input id="inputBirthdayDay" name="birthday_day" class="uzp__form-control" placeholder="Dag" type="number">
								<p class="uzp__help-block" data-validate-for="birthday_day"></p>
							</div>
							<div class="col-sm-4">
								<label for="inputBirthdayMonth" class="uzp__hidden-label"><?php _e('Birth date month', 'uitzendplaats'); ?></label>
								<div class="uzp__select">
									<select id="inputBirthdayMonth" name="birthday_month" class="uzp__form-control">
										<option value=""><?php _e('Month', 'uitzendplaats'); ?></option>
										<option value="1"><?php _e('January', 'uitzendplaats'); ?></option>
										<option value="2"><?php _e('February', 'uitzendplaats'); ?></option>
										<option value="3"><?php _e('March', 'uitzendplaats'); ?></option>
										<option value="4"><?php _e('April', 'uitzendplaats'); ?></option>
										<option value="5"><?php _e('May', 'uitzendplaats'); ?></option>
										<option value="6"><?php _e('June', 'uitzendplaats'); ?></option>
										<option value="7"><?php _e('July', 'uitzendplaats'); ?></option>
										<option value="8"><?php _e('August', 'uitzendplaats'); ?></option>
										<option value="9"><?php _e('September', 'uitzendplaats'); ?></option>
										<option value="10"><?php _e('October', 'uitzendplaats'); ?></option>
										<option value="11"><?php _e('November', 'uitzendplaats'); ?></option>
										<option value="12"><?php _e('December', 'uitzendplaats'); ?></option>
									</select>
								</div>
								<p class="uzp__help-block" data-validate-for="birthday_month"></p>
							</div>
							<div class="col-sm-4">
								<label for="inputBirthdayYear" class="uzp__hidden-label"><?php _e('Birth date year', 'uitzendplaats'); ?></label>
								<input id="inputBirthdayYear" name="birthday_year" class="uzp__form-control" placeholder="<?php _e('Year', 'uitzendplaats'); ?>" type="number">
								<p class="uzp__help-block" data-validate-for="birthday_year"></p>
							</div>
						</div>

						<div class="uzp__form-group row">
							<label class="col-sm-4 uzp__control-label sub-label"><?php _e('Gender', 'uitzendplaats'); ?></label>
							<div class="col-sm-8">
								<label class="uzp__radio-inline">
									<input name="gender" id="optionsGenderMale" value="M" type="radio"> <?php _e('Male', 'uitzendplaats'); ?>
								</label>
								<label class="uzp__radio-inline">
									<input name="gender" id="optionsGenderFemale" value="F" type="radio"> <?php _e('Female', 'uitzendplaats'); ?>
								</label>
								<p class="uzp__help-block" data-validate-for="gender"></p>
							</div>
						</div>

						<div class="uzp__form-group uzp-row">
							<div class="col-sm-12">
								<label class="uzp__control-label sub-label"><?php _e('Address', 'uitzendplaats'); ?></label>
							</div>
							<div class="col-sm-12">
								<div>
									<label for="inputStreet" class="uzp__control-label--sub"><?php _e('Street', 'uitzendplaats'); ?></label>
									<input class="uzp__form-control" id="inputStreet" name="street" type="text">
									<p class="uzp__help-block" data-validate-for="street"></p>
								</div>
							</div>
						</div>

						<div class="uzp__form-group row">
							<div class="col-sm-6">
								<div>
									<label for="inputNumber" class="uzp__control-label--sub"><?php _e('Number', 'uitzendplaats'); ?></label>
									<input class="uzp__form-control" id="inputNumber" name="number" type="number">
									<p class="uzp__help-block" data-validate-for="number"></p>
								</div>
							</div>
							<div class="col-sm-6">
								<div>
									<label for="inputSuffix" class="uzp__control-label--sub"><?php _e('Suffix', 'uitzendplaats'); ?></label>
									<input class="uzp__form-control" id="inputSuffix" name="suffix" type="text">
									<p class="uzp__help-block" data-validate-for="suffix"></p>
								</div>
							</div>
						</div>

						<div class="uzp__form-group row">
							<label class="col-sm-12 uzp__control-label--sub p-left" for="inputZip"><?php _e('Zipcode', 'uitzendplaats'); ?></label>
							<div class="col-sm-12">
								<input id="inputZip" class="uzp__form-control" name="zip" type="text">
								<p class="uzp__help-block" data-validate-for="zip"></p>
							</div>
						</div>
						<div class="uzp__form-group row">
							<label class="uzp-col-sm-4 uzp__control-label--sub p-left" for="inputCity"><?php _e('City', 'uitzendplaats'); ?></label>
							<div class="col-sm-12">
								<input id="inputCity" class="uzp__form-control" name="city" type="text">
								<p class="uzp__help-block" data-validate-for="city"></p>
							</div>
						</div>

						<div class="uzp__form-group row">
							<label class="col-sm-12 uzp__control-label--sub p-left" for="inputPhone"><?php _e('Phone', 'uitzendplaats'); ?></label>
							<div class="col-sm-12">
								<input id="inputPhone" class="uzp__form-control" name="phone" type="text">
								<p class="uzp__help-block" data-validate-for="phone"></p>
							</div>
						</div>

						<div class="uzp__form-group uzp-row">
							<label class="uzp-col-sm-4 uzp__control-label--sub p-left" for="inputEmail"><?php _e('E-mail', 'uitzendplaats'); ?></label>
							<div class="uzp-col-sm-8">
								<input id="inputEmail" class="uzp__form-control" name="email" type="email">
								<p class="uzp__help-block" data-validate-for="email"></p>
							</div>
						</div>
					</fieldset>
				</div>
			</div>

			<div class="uzp__panel">
				<div class="uzp__panel-body container">
					<fieldset class="uzp__fieldset">
						<legend><?php _e('Information', 'uitzendplaats'); ?></legend>

						<div class="uzp__form-group row">
							<label class="uzp-col-sm-4 uzp__control-label p-left" for="inputEducation"><?php _e('Education level', 'uitzendplaats'); ?></label>
							<div class="uzp-col-sm-8">
								<div class="uzp__select">
									<select class="uzp__form-control" id="inputEducation" name="education[]">
										<?php foreach( $education_data->data as $ed_item) {
											$selected = '';
											if ($ed_item->name === 'MBO') {
												$selected = ' selected';
											}
											echo '<option value="' . $ed_item->id . '"' . $selected . '>' . $ed_item->name . '</option>';
										} ?>
									</select>
								</div>
								<p class="uzp__help-block" data-validate-for="education"></p>
							</div>
						</div>

						<div class="uzp__form-group uzp-row">
							<label class="uzp-col-sm-4 uzp__control-label p-left" for="inputEmploymentType"><?php _e('Employment type', 'uitzendplaats'); ?></label>
							<div class="uzp-col-sm-8">
								<div class="uzp__select">
									<select class="uzp__form-control" id="inputEmploymentType" name="employment_type" tabindex="-1" aria-hidden="true">
										<?php foreach( $employment_types_data->data as $et_item) {
											echo '<option value="' . $et_item->id . '">' . $et_item->name . '</option>';
										} ?>
									</select>
								</div>
								<p class="uzp__help-block" data-validate-for="employment_type"></p>
							</div>
						</div>

						<div class="uzp__form-group uzp-row">
							<label class="uzp-col-sm-4 uzp__control-label p-left" for="inputHoursMax"><?php _e('Hours (maximum)', 'uitzendplaats'); ?></label>
							<div class="uzp-col-sm-8">
								<div class="uzp__select">
									<select id="inputHoursMax" class="uzp__form-control" name="hours_max">
										<option value="8">8</option>
										<option value="12">12</option>
										<option value="16">16</option>
										<option value="24">24</option>
										<option value="32">32</option>
										<option value="36">36</option>
										<option value="40" selected="selected">40</option>
									</select>
								</div>
								<p class="uzp__help-block" data-validate-for="hours_max"></p>
							</div>
						</div>

						<div class="uzp__form-group uzp-row">
							<label class="uzp-col-sm-4 uzp__control-label p-left"><?php _e('Driving licence(s)', 'uitzendplaats'); ?></label>
							<div class="uzp-col-sm-8">
								<div class="uzp-row">
									<div class="uzp-col-xs-12 uzp__driving-licences">
										<select multiple="" class="uzp__form-control uzp__multiselect" id="inputLicences" name="licenses[]">
											<?php foreach( $licences_data->data as $br_item) { ?>
												<option value="<?php echo $br_item->id ?>"><?php echo $br_item->name ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<p class="uzp__help-block" data-validate-for="licenses"></p>
							</div>
						</div>
					</fieldset>
				</div>
			</div>

			<div class="uzp__panel">
				<div class="uzp__panel-body container">
					<fieldset class="uzp__fieldset">
						<legend><?php _e('Preferred branches', 'uitzendplaats'); ?></legend>
						<div class="uzp__form-group row">
							<label class="uzp-col-sm-4 p-left" for="inputBranches"><?php _e('Branches', 'uitzendplaats'); ?></label>
							<div class="uzp-col-sm-8">
								<select multiple="" class="uzp__form-control uzp__multiselect" id="inputBranches" name="branches[]">
									<?php foreach( $branches_data->data as $br_item) { ?>
										<option value="<?php echo $br_item->id ?>"><?php echo $br_item->name ?></option>
									<?php } ?>
								</select>
								<p class="uzp__help-block"><?php _e('Select maximum 3 items', 'uitzendplaats'); ?></p>
								<p class="uzp__help-block" data-validate-for="branches"></p>
							</div>
						</div>
					</fieldset>
				</div>
			</div>

			<div class="uzp__panel">
				<div class="uzp__panel-body container">
					<fieldset class="uzp__fieldset row">
						<legend><?php _e('Describe yourself', 'uitzendplaats'); ?></legend>

						<div class="uzp__form-group">
							<label for="textareaDescription"><?php _e('Description', 'uitzendplaats'); ?></label>
							<textarea class="uzp__form-control" id="textareaDescription" name="description" rows="5"></textarea>
							<p class="uzp__help-block" data-validate-for="description"></p>
						</div>
					</fieldset>
				</div>
			</div>

			<div class="uzp__panel">
				<div class="uzp__panel-body container">
					<fieldset class="uzp__fieldset">
						<legend><?php _e('Uploads', 'uitzendplaats'); ?></legend>

						<div class="uzp__form-group row">
							<label class="uzp-col-sm-12 p-left" for="inputPhoto"><?php _e('Photo', 'uitzendplaats'); ?></label>
							<div class="uzp-col-sm-12">
								<input class="uzp__form-control uzp__file-select" id="inputPhoto" name="photo" type="file">
								<p class="uzp__help-block" data-validate-for="photo"></p>
								<p class="uzp__help-block--hidden uzp__help-block--filesize"><?php _e('The maximum allowed filesize is 2MB', 'uitzendplaats'); ?></p>
							</div>
						</div>

						<div class="uzp__form-group uzp-row">
							<label class="uzp-col-sm-12 p-left" for="inputCv"><?php _e('Resume', 'uitzendplaats'); ?></label>
							<div class="uzp-col-sm-12">
								<input class="uzp__form-control uzp__file-select" id="inputCv" name="cv" type="file">
								<p class="uzp__help-block" data-validate-for="cv"></p>
								<p class="uzp__help-block--hidden uzp__help-block--filesize"><?php _e('The maximum allowed filesize is 2MB', 'uitzendplaats'); ?></p>
							</div>
						</div>
					</fieldset>
				</div>
			</div>

			<div class="uzp__panel">
				<div class="uzp__panel-body container">
					<fieldset class="uzp__fieldset accept__terms">
						<legend><?php _e('Terms and Conditions', 'uitzendplaats'); ?></legend>

						<div class="uzp__form-group row">
							<div class="uzp-col-sm-12">
								<div class="uzp__checkbox">
									<label>
										<input name="allow_public" id="inputAllowPublic" value="1" type="checkbox"><strong><?php _e('I agree with publicly publishing my profile', 'uitzendplaats'); ?></strong>
									</label>
									<p class="uzp__help-block" data-validate-for="allow_public"></p>
								</div>
							</div>
						</div>

						<div class="uzp__form-group uzp-row">
							<div class="uzp-col-sm-12">
								<div class="uzp__checkbox">
									<label>
										<input name="accept_terms" value="1" id="inputAcceptTerms" type="checkbox"><strong><?php _e('I agree with the privacy stateement', 'uitzendplaats'); ?></strong><br>
										<?php _e('The personal data you have entered in this form will only be used for purposes that the legislator allows. When you send this form you give permission process the data you provide. For more information see our <a href=/privacy/ target=_blank>privacy statement</a>.', 'uitzendplaats'); ?>
									</label>
									<p class="uzp__help-block" data-validate-for="accept_terms"></p>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>

			<div class="uzp__form-group">
				<button type="submit" class="green-btn">
					<?php _e('Send', 'uitzendplaats'); ?>
				</button>
			</div>
		</form>
	</div>
</div>