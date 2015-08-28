<!-- Display breadcrumb trail -->
<?php
$html->addCrumb("Home" , "http://www.vaughanpl.info/index.php");
$html->addCrumb("Using the Library" , "http://www.vaughanpl.info/services");
$html->addCrumb("Membership" , "http://www.vaughanpl.info/services/membership");
?>


<?php

//echo $this->data["MembershipApplication"]["age"];


?>

<!-- Mandatory fields depend on the age of the applicant -->
<?php $mandatoryFields = $this->controller->MembershipApplication->mandatoryFields(@$this->data["MembershipApplication"]["age"]) ?>


<!-- Script functions deal with dynamic changes on form according to age changes -->
<script language="javascript" type="text/javascript">

	/**
	 * Update form visible and mandatory fields to reflect the initial default age
	 */
	function onLoad() {
		changeAge("<?php echo @$this->data["MembershipApplication"]["age"]; ?>");
	}


	/**
	 * Update form visible and mandatory fields to reflect a specific age
	 */
	function changeAge(selected_option) {

		// Because JavaScript is enabled, the form serves as one single step
		// to input the age and the data
		document.getElementById("step").value = "age|data";
		document.getElementById("field_age").style.display="block";
		document.getElementById("field_age_info").style.display="none";

		// Display only fields relevant to the age selected
		if (selected_option == "adult") {
			document.getElementById("step_data").style.display="block";
			document.getElementById("field_age_description_adult").style.display="block";
			document.getElementById("field_age_description_teen").style.display="none";
			document.getElementById("field_age_description_kid").style.display="none";
			document.getElementById("submit_button").style.display="block";
		} else if (selected_option == "teen") {
			document.getElementById("step_data").style.display="none";
			document.getElementById("field_age_description_adult").style.display="none";
			document.getElementById("field_age_description_teen").style.display="block";
			document.getElementById("field_age_description_kid").style.display="none";
			document.getElementById("submit_button").style.display="none";
		} else if(selected_option == "kid") {
			document.getElementById("step_data").style.display="none";
			document.getElementById("field_age_description_adult").style.display="none";
			document.getElementById("field_age_description_teen").style.display="none";
			document.getElementById("field_age_description_kid").style.display="block";
			document.getElementById("submit_button").style.display="none";
		}
	}

	function changeEligibility(selected_option) {

		if (selected_option == "resident") {
			document.getElementById("field_eligibility_resident").style.display="block";
			document.getElementById("field_eligibility_student").style.display="none";
			document.getElementById("field_eligibility_property").style.display="none";
			document.getElementById("field_eligibility_work").style.display="none";
		} else if (selected_option == "student") {
			document.getElementById("field_eligibility_resident").style.display="none";
			document.getElementById("field_eligibility_student").style.display="block";
			document.getElementById("field_eligibility_property").style.display="none";
			document.getElementById("field_eligibility_work").style.display="none";
		} else if (selected_option == "property") {
			document.getElementById("field_eligibility_resident").style.display="none";
			document.getElementById("field_eligibility_student").style.display="none";
			document.getElementById("field_eligibility_property").style.display="block";
			document.getElementById("field_eligibility_work").style.display="none";
		} else if (selected_option == "work") {
			document.getElementById("field_eligibility_resident").style.display="none";
			document.getElementById("field_eligibility_student").style.display="none";
			document.getElementById("field_eligibility_property").style.display="none";
			document.getElementById("field_eligibility_work").style.display="block";
		}
	}

	function changeCityEmployee (selected_option) {
		if (selected_option == "yes") {
			document.getElementById("field_city_employee").style.display="block";

		} else if (selected_option == "no") {
			document.getElementById("field_city_employee").style.display="none";
		}
	}

	function changeEmailOpt(selected_option) {

		if (selected_option == "yes") {

			document.getElementById("field_email_description").style.display="block";

		} else if (selected_option == "no") {

			document.getElementById("field_email_description").style.display="none";

		}
	}
</script>




<!-- Page title -->
<div id="page_header" width="100%">
	<div class="opening"></div>
	<div class="details">
		<h1>Join Vaughan Public Libraries</h1>
	</div>
	<div class="closing"></div>
</div>



<!-- Page content -->
<div id="page_content">
	<div class="opening"></div>
	<div class="details">


		<!-- Page introduction -->
		<div class="intro">
			Please note that entries indicated with asterisk (*) are required.
		</div>
		<div class="section_end">&nbsp;</div>

		<!-- Input form -->
		<?php echo $html->formTag('/membership_applications' . $html->tagValue('MembershipApplication/id')); ?>


			<!-- For data entry forms we run over the separation between the central area and the right column -->
			<div class="whole_width">


				<!-- General error indicator -->
				<?php if ($errors) { ?>
					<div class="important_note">
						<?php echo $html->image("error_indicator_general.gif", array("align"=>"left")); ?>
						Your inquiry could not be submitted due to errors in your input. Please correct the errors indicated below and send again.
					</div>
				<?php } ?>


				<!-- Selection of age -->
				<div id="step_age" class="input_step">
					<fieldset><legend>Your Age</legend>

						<!-- Age entry field -->
						<div id="field_age" class="field<?php if ($this->data["MembershipApplication"]["step"] != "age") echo ' hidden'; ?>">
							<div class="field_label"><span class="mandatory_indicator">*</span>Age range:</div>
							<div class="field_input">
								<?php echo $html->radio('MembershipApplication/age',$ages,null,					array("onclick"=>"changeAge(this.value);")			); ?>
							</div>
							<?php echo $html->tagErrorMsg('MembershipApplication/age','Please indicate your age.') ?>
						</div>


						<!-- Age display field (only for second step of non-JavaScript functionality) -->
						<div id="field_age_info" class="field<?php if ($this->data["MembershipApplication"]["step"] != "data") echo ' hidden'; ?>">
							<div class="field_label">Age range:</div>
							<div class="field_input">
								<?php echo $ages[$this->data["MembershipApplication"]["age"]]; ?>
								<?php echo $html->submit("Change", array("name"=>"change_age","class"=>"form_button")); ?>
							</div>
						</div>


						<!-- Explanation of the adult registration -->
						<div id="field_age_description_adult" class="field<?php if ($this->data["MembershipApplication"]["step"] != "data" || $this->data["MembershipApplication"]["age"]!="adult") echo ' hidden'; ?>">
							<div class="field_label">Details:</div>
							<div class="field_input">
								Online applications will be processed within 72 hours excluding holidays and branch closures.
								You will have thirty days to pick-up your card at your local branch selected below. If not picked up within thirty days your Library Card number will expire.<br>
								The personal information collected from you on this form will only be used
								for the purpose of registering you for Vaughan Public Libraries.
								Your personal information will not be shared with any outside organization.
							</div>
						</div>


						<!-- Instructions for teens -->
						<div id="field_age_description_teen" class="field<?php if ($this->data["MembershipApplication"]["step"] != "data" || $this->data["MembershipApplication"]["age"]!="teen") echo ' hidden'; ?>">
							<div class="field_label">Details:</div>
							<div class="field_input">
								Online applications for VPL Membership are only available to individuals 18 years of age and older.
								Please visit your local branch in person to obtain your membership card.
								If you are 13 years of age and older,
								you will be asked for proof of your name and current address.
							</div>
						</div>


						<!-- Instructions for kids -->
						<div id="field_age_description_kid" class="field<?php if ($this->data["MembershipApplication"]["step"] != "data" || $this->data["MembershipApplication"]["age"]!="kid") echo ' hidden'; ?>">
							<div class="field_label">Details:</div>
							<div class="field_input">
								Online applications for VPL Membership are only available to individuals 18 years of age and older. Please visit your local branch in person to obtain your membership card.
								If you are under the age of 13, please bring a parent or guardian with you to register at the library.
								Your parent or guardian will be asked for proof of their own name and current address, and will be asked to sign your card.
							</div>
						</div>

					</fieldset>
				</div>


				<!-- Data entry -->
				<div id="step_data" class="input_step<?php if ($this->data["MembershipApplication"]["age"] != "adult" || $this->data["MembershipApplication"]["step"] == "age") echo ' hidden'; ?>">


					<!-- Entry of personal information -->
					<fieldset><legend>Personal Information</legend>

						<!-- First name field -->
						<div class="field">
							<div class="field_label"><span class="mandatory_indicator">*</span>First Name:</div>
							<div class="field_input">
								<?php echo $html->input('MembershipApplication/first_name', array("size"=>"20","maxlength"=>"20")); ?>
							</div>
							<?php echo $html->tagErrorMsg('MembershipApplication/first_name','Please enter your first name'); ?>
						</div>


						<!-- Last name field -->
						<div id="field_last_name" class="field">
							<div class="field_label"><span class="mandatory_indicator">*</span>Last Name:</div>
							<div class="field_input">
								<?php echo $html->input('MembershipApplication/last_name', array("size"=>"20","maxlength"=>"20")); ?>
							</div>
							<?php echo $html->tagErrorMsg('MembershipApplication/last_name','Please enter your last name'); ?>
						</div>


						<!-- Eligibility criteria entry field -->

						<div class="field">
							<div class="field_label"><span class="mandatory_indicator">*</span>
								Why are you eligible for membership?
							</div>
							<div class="field_input">
								<?php echo $html->radio('MembershipApplication/eligibility',					$eligibilities,null, array("onclick"=>"changeEligibility(this.value)")); ?><br/>

								<div id="field_eligibility_resident" class="field<?php if ($this->data["MembershipApplication"]["eligibility"] != "resident") echo ' hidden'; ?>">
								Please bring proof of your Vaughan address (e.g. valid drivers licence, utility bill, motor vehicle registration, bank account statement, mortgage agreement, lease or rental agreement).<br/>
								</div>


								<div id="field_eligibility_student" class="field<?php if ($this->data["MembershipApplication"]["eligibility"] != "student") echo ' hidden'; ?>">
								Please bring valid photo student ID or a letter from your school principal.<br/>
								</div>

								<div id="field_eligibility_property" class="field<?php if ($this->data["MembershipApplication"]["eligibility"] != "property") echo ' hidden'; ?>">
								Please bring proof of your Vaughan address (e.g. valid drivers licence, utility bill, motor vehicle registration, bank account statement, mortgage agreement, lease or rental agreement).
								<br/>
								</div>

								<div id="field_eligibility_work" class="field<?php if ($this->data["MembershipApplication"]["eligibility"] != "work") echo ' hidden'; ?>">
								Are you a City of Vaughan employee?
								<br/>
								<?php echo $html->radio('MembershipApplication/cityemployee',					array("yes"=>"Yes&nbsp;","no"=>"No"),null, array("onclick"=>"changeCityEmployee(this.value)")); ?>

									<div id="field_city_employee" class="field<?php if ($this->data["MembershipApplication"]["cityemployee"] != "yes") echo ' hidden'; ?>">Please enter your department and location: <br/>
									<?php echo $html->input('MembershipApplication/city_dept', array("size"=>"20","maxlength"=>"20")); ?>

									</div>
								<?php echo $html->tagErrorMsg('MembershipApplication/city_dept','Please enter your department and location if you are an employee of City of Vaughan.'); ?>
								</div>

							</div>
							<?php echo $html->tagErrorMsg('MembershipApplication/eligibility','Please state the eligibility criteria that applies to you.') ?>
						</div>





						<!-- Library (branch) field -->
						<div id="field_library" class="field">
							<div class="field_label"><span class="mandatory_indicator">*</span>Local Library:</div>
							<div class="field_input">
								<?php echo $html->selectTag('MembershipApplication/library', $libraries,@$this->data["MembershipApplication"]["library"],null,null,false); ?>
								<br /><br />
							</div>
							<?php echo $html->tagErrorMsg('MembershipApplication/library','Please select your local Library'); ?>
						</div>

						<!-- Previous card entry field -->
						<!--<div id="field_age" class="field<?php if (@$this->data["MembershipApplication"]["age"] != 'adult') echo ' hidden'; ?>">-->
						<div class="field">
							<div class="field_label"><span class="mandatory_indicator">*</span>Have you ever had a VPL Library Card in the past?</div>
							<div class="field_input">
								<?php echo $html->radio('MembershipApplication/previous_card',
															array("yes"=>"Yes","no"=>"No"),null
													); ?><br /><br /><br /><br />
							</div>
							<?php echo $html->tagErrorMsg('MembershipApplication/previous_card','Please indicate if you have had other cards.') ?>
						</div>

					</fieldset>



					<!-- Entry of address information -->
					<fieldset><legend>Contact Information</legend>


						<!-- Street field -->
						<div class="field">
							<div class="field_label"><span class="mandatory_indicator">*</span>Address:</div>
							<div class="field_input">
								<?php echo $html->input('MembershipApplication/address', array("size"=>"48","maxlength"=>"70")); ?>
							</div>
							<?php echo $html->tagErrorMsg('MembershipApplication/address','Please enter your street address'); ?>
						</div>


						<!-- Suite/appartment field -->
						<div class="field">
							<div class="field_label">Suite/Apt:</div>
							<div class="field_input">
								<?php echo $html->input('MembershipApplication/suite', array("size"=>"20","maxlength"=>"20")); ?>
							</div>
						</div>

						<!-- City field -->
						<div class="field">
							<div class="field_label"><span class="mandatory_indicator">*</span>City:</div>
							<div class="field_input">
								<?php echo $html->input('MembershipApplication/city', array("size"=>"48","maxlength"=>"70")); ?>
							</div>
							<?php echo $html->tagErrorMsg('MembershipApplication/city','Please specify the city'); ?>
						</div>

						<!-- Province field -->
						<div class="field">
							<div class="field_label">Province:</div>
							<div class="field_input">
								<?php echo $html->input('MembershipApplication/province', array("size"=>"48","maxlength"=>"70")); ?>
							</div>
						</div>


						<!-- Postal code field -->
						<div class="field">
							<div class="field_label">Postal Code:</div>
							<div class="field_input">
								<?php echo $html->input('MembershipApplication/postal_code', array("size"=>"7","maxlength"=>"7")); ?>
							</div>
						</div>


						<!-- Telephone field -->
						<div id="field">
							<div class="field_label">Telephone:</div>
							<div class="field_input">
								<?php echo $html->input('MembershipApplication/telephone', array("size"=>"15","maxlength"=>"20")); ?>
							</div>

						</div>


						<!-- Email field -->
						<div class="field">
							<div class="field_label"><span class="mandatory_indicator">*</span>Email:</div>
							<div class="field_input">
								<?php echo $html->input('MembershipApplication/email', array("size"=>"48","maxlength"=>"70")); ?><br />
								<?php echo $html->radio('MembershipApplication/opt_in',array("yes"=>"I want to receive library notices by email.<br />","no"=>"I do not want to receive library notices by email."),null, array("onclick"=>"changeEmailOpt(this.value)")											); ?>

								<br/>
								<div id="field_email_description" class="field<?php if ($this->data["MembershipApplication"]["email"]!="yes") echo ' hidden'; ?>"><br/>																																														If you chose to receive library notices by email, you will receive four types of notices from the library:<br/><br/>1. Availability Notices - these are sent when your request is filled and there is an item waiting on the hold shelf for you. The email subject line for these notices is 'Availability'.<br/>2. Review Notices - these are a due date reminder that is sent three days before the due date for books, and one day before a DVD is due. Due date reminders are a courtesy, and you remain responsible for ensuring materials are returned by their due date. The email subject line is 'Review Notices'.<br/>3. Overdue Notices - these are sent when an item is overdue. The email subject line will be 'Overdues'.<br/>4. Requested Overdue Notices - these are sent when an item that is overdue has been requested by another customer. Requested overdue items are not eligible for renewal. The email subject line will be 'Requested Overdues'.<br/><br/>All emails you receive will be from 'Vaughan Public Libraries'. Please add the email address <b>dbadmin@vaughan.ca</b> to your email address book. This will ensure that notices will not be treated as junk mail.	<br/>																																					</div>

							</div>
							<?php echo $html->tagErrorMsg('MembershipApplication/email','Please enter a valid email address (example: johnd@some.com)'); ?>
							<?php echo $html->tagErrorMsg('MembershipApplication/opt_in','Please indicate whether or not you want to receive library notices by email'); ?>


						</div>


						<!-- PIN field -->
						<!--<div id="field_telephone" class="field<?php if (@$this->data["MembershipApplication"]["age"] != 'adult') echo ' hidden'; ?>">-->
						<div class="field">
							<div class="field_label"><span class="mandatory_indicator">*</span>Please select a four (4) digit PIN:</div>
							<div class="field_input">
								<?php echo $html->input('MembershipApplication/pin', array("size"=>"4","maxlength"=>"4")); ?><br />
								(Retain in a safe place for future reference)
							</div>
							<?php echo $html->tagErrorMsg('MembershipApplication/pin','Please enter a PIN.'); ?>
							<?php echo $html->tagErrorMsg('MembershipApplication/pin_numeric','PIN must be numeric.'); ?>
							<?php echo $html->tagErrorMsg('MembershipApplication/pin_4_digits','Please must be 4 digits long.'); ?>
						</div>
					</fieldset>


				</div>


				<!-- Hidden input fields to keep track of which step in the process we are in (initial and submitted) -->
				<input type="hidden" name="data[MembershipApplication][step]" value="<?php echo $this->data["MembershipApplication"]["step"]; ?>" />
				<input id="step" type="hidden" name="step" value="<?php echo $this->data["MembershipApplication"]["step"]; ?>" />


				<!-- Submit button -->
				<?php echo $html->submit("Continue", array("id"=>"submit_button", "class"=>"submit_button" . ((@$this->data["MembershipApplication"]["age"] != "adult" && $this->data["MembershipApplication"]["step"]=="data") ? " hidden" : ""))); ?>
			</div>


			<!-- Since we run over the separation between center and right, we need to explicitly indicate the height of the area -->
			<div id="membership_request_spacer"></div>


		</form>
		<div class="section_end">&nbsp;</div>

	</div>
	<div class="closing"></div>
</div>
