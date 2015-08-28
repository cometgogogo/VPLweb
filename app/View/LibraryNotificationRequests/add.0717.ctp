<?php
$html->addCrumb("Home" , "/");
$html->addCrumb("Using the Library" , "/services");
?>

<script language="javascript">
	function onLoad() {
		changePurpose("<?php echo @$this->data["EmailNotificationRequest"]["purpose"]; ?>");
	}


	function changePurpose(selected_option) {
		document.getElementById("step").value = "purpose|data";
		document.getElementById("field_purpose").style.display="block";
		document.getElementById("field_purpose_info").style.display="none";
		document.getElementById("step_data").style.display="block";

		if (selected_option == "begin") { //begin email
			document.getElementById("step_data").style.display="block";
			document.getElementById("field_purpose_description_begin").style.display="block";
			document.getElementById("field_purpose_description_stop").style.display="none";
			document.getElementById("field_purpose_description_texting").style.display="none";
			document.getElementById("field_telephone").style.display="none";
			document.getElementById("field_cellphone").style.display="none";
			document.getElementById("field_card_plus").style.display="none";
			document.getElementById("field_email").style.display="block";
			//document.getElementById("field_email_1").style.display="none";
			document.getElementById("footnote_email_notices").style.display="block";
			document.getElementById("footnote_texting_notices").style.display="none";
			document.getElementById("field_buzz").style.display="block";
		} else if (selected_option == "stop") { //phone
			document.getElementById("step_data").style.display="block";
			document.getElementById("field_purpose_description_begin").style.display="none";
			document.getElementById("field_purpose_description_stop").style.display="block";
			document.getElementById("field_purpose_description_texting").style.display="none";
			document.getElementById("field_telephone").style.display="block";
			document.getElementById("field_cellphone").style.display="none";
			document.getElementById("field_email").style.display="none";
			//document.getElementById("field_email_1").style.display="none";
			document.getElementById("field_card_plus").style.display="none";
			document.getElementById("footnote_email_notices").style.display="none";
			document.getElementById("footnote_texting_notices").style.display="none";
			document.getElementById("field_buzz").style.display="none";
		}else if (selected_option == "texting") { //texting
			document.getElementById("step_data").style.display="block";
			document.getElementById("field_purpose_description_texting").style.display="block";
			document.getElementById("field_purpose_description_begin").style.display="none";
			document.getElementById("field_purpose_description_stop").style.display="none";
			document.getElementById("field_cellphone").style.display="block";
			document.getElementById("field_telephone").style.display="none";
			document.getElementById("field_email").style.display="block";
			//document.getElementById("field_email_1").style.display="block";
			document.getElementById("field_card_plus").style.display="block";
			document.getElementById("footnote_email_notices").style.display="none";
			document.getElementById("footnote_texting_notices").style.display="block";
			document.getElementById("field_buzz").style.display="none";
		}else{
			document.getElementById("step_data").style.display="block";
			document.getElementById("field_purpose_description_begin").style.display="none";
			document.getElementById("field_purpose_description_stop").style.display="none";
			document.getElementById("field_purpose_description_texting").style.display="none";
			document.getElementById("field_telephone").style.display="none";
			document.getElementById("field_cellphone").style.display="none";
			document.getElementById("field_email").style.display="none";
			document.getElementById("field_email_1").style.display="none";
			document.getElementById("footnote_email_notices").style.display="none";
			document.getElementById("footnote_texting_notices").style.display="none";
			document.getElementById("field_buzz").style.display="none";


		}
	}
</script>


<div id="page_header" width="100%">
	<div class="opening"></div>
	<div class="details">
		<h1>Sign up for Library Notification</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="intro">
			You may receive your notices from the library by email, text or phone.
			This includes notices for items you have requested, items that are due soon and overdue notices.
		</div>



		<?php echo $html->formTag('/library_notification_requests/add/' . $html->tagValue('EmailNotificationRequest/id')); ?>
			<div class="whole_width">
				<?php if ($errors) { ?>
					<div class="important_note">
						<?php echo $html->image("error_indicator_general.gif", array("align"=>"left")); ?>
						Your inquiry could not be submitted due to errors in your input. Please correct the errors indicated below and send again.
					</div>
				<?php } ?>
				<div id="step_purpose" class="input_step">
					<fieldset><legend>Your Request</legend>
						<div id="field_purpose" class="field<?php if ($this->data["EmailNotificationRequest"]["step"] != "purpose") echo ' hidden'; ?>">
							<div class="field_label"><span class="mandatory_indicator">*</span>I would like to ...</div>
							<div class="field_input">
								<?php echo $html->radio('EmailNotificationRequest/purpose',
															$purposes,null,
															array("onclick"=>"changePurpose(this.value);")
													); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailNotificationRequest/purpose','Please specify the purpose of your request.') ?>
						</div>
						<div id="field_purpose_info" class="field<?php if ($this->data["EmailNotificationRequest"]["step"] != "data") echo ' hidden'; ?>">
							<div class="field_label">I'd like to ...</div>
							<div class="field_input">
								<?php echo $purposes[$this->data["EmailNotificationRequest"]["purpose"]]; ?>
								<?php echo $html->submit("Change", array("name"=>"change_purpose","class"=>"form_button")); ?>
							</div>
						</div>

						<div id="field_purpose_description_texting" class="field<?php if ($this->data["EmailNotificationRequest"]["step"] != "data" || $this->data["EmailNotificationRequest"]["purpose"]!="texting") echo ' hidden'; ?>">
							<div class="field_label">Details:</div>
							<div class="field_input">
								<div class="important_note">
									By making this choice, I am authorizing Vaughan Public Libraries to send notices to me via text message.
									This includes notices for items I have requested, items that are due soon and overdue notices. Due date reminders are a courtesy, you remain responsible for ensuring materials are returned by their due date.<br /><br/>Vaughan Public Libraries is not responsible for delivery failure due to the problems with the receiver's wireless account or service provider.<br/><br/>
									<a class="footnote_pointer" href="#footnote_texting_notices">Which notices will I receive if I choose this option?</a><br />


								</div>
							</div>
						</div>

						<div id="field_purpose_description_begin" class="field<?php if ($this->data["EmailNotificationRequest"]["step"] != "data" || $this->data["EmailNotificationRequest"]["purpose"]!="begin") echo ' hidden'; ?>">
							<div class="field_label">Details:</div>
							<div class="field_input">
								<div class="important_note">
									By making this choice, I am authorizing Vaughan Public Libraries to send notices to me via email.
									This includes notices for items I have requested, items that are due soon and overdue notices. Due date reminders are a courtesy, you remain responsible for ensuring materials are returned by their due date.<br /><br/>All emails you receive will be from 'Vaughan Public Libraries'. <strong> Please add the email address dbadmin@vaughan.ca to your email address book</strong> . This will ensure that notices will not be treated as junk mail.<br/><br/>Vaughan Public Libraries is not responsible for delivery failure due to the problems with the receiver's email account. Please be aware that email notices from VPL can not be delivered successfully if you are forwarding the messages to an indirect email account. Please provide an account which directly receives messages.<br/><br/>
									<a class="footnote_pointer" href="#footnote_email_notices">Which notices will I receive if I choose this option?</a><br />


								</div>
							</div>
						</div>
						<div id="field_purpose_description_stop" class="field<?php if ($this->data["EmailNotificationRequest"]["step"] != "data" || $this->data["EmailNotificationRequest"]["purpose"]!="stop") echo ' hidden'; ?>">
							<div class="field_label">Details:</div>
							<div class="field_input">
								<div class="important_note">
									By making this choice, I understand that I will no longer receive library notifications by email or by texting,
									and I will begin to receive my notifications by telephone.<br />

								</div>
							</div>
						</div>
					</fieldset>
				</div>
				<div id="step_data" class="input_step<?php if ($this->data["EmailNotificationRequest"]["step"] != "data") echo ' hidden'; ?>">
					<fieldset><legend>Your Information</legend>
						<div class="field">
							<div class="field_label"><label for="EmailNotificationRequestFirstName"><span id="mandatory_indicator_first_name" class="mandatory_indicator">*</span>First name:</label></div>
							<div class="field_input">							
								<?php echo $html->input('EmailNotificationRequest/first_name', array("size"=>"20","maxlength"=>"20")); ?>
								
							</div>
							<?php echo $html->tagErrorMsg('EmailNotificationRequest/first_name','Please enter your first name'); ?>
						</div>
						<div class="field">
							<div class="field_label"><label for="EmailNotificationRequestLastName"><span id="mandatory_indicator_last_name" class="mandatory_indicator">*</span>Last name:</label></div>
							<div class="field_input">
								<?php echo $html->input('EmailNotificationRequest/last_name', array("size"=>"20","maxlength"=>"20")); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailNotificationRequest/last_name','Please enter your last name'); ?>
						</div>
						<div id="field_cellphone" class="field<?php if (@$this->data["EmailNotificationRequest"]["purpose"] != 'texting') echo ' hidden'; ?>">
							<div class="field_label"><label for="EmailNotificationRequestCellphone"><span id="mandatory_indicator_cellphone" class="mandatory_indicator">*</span>Cell Phone:</label></div>
							<div class="field_input">
								<?php echo $html->input('EmailNotificationRequest/cellphone', array("size"=>"15","maxlength"=>"20")); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailNotificationRequest/cellphone','Please enter a valid cellphone number.'); ?>
						</div>
						<div class="field">
							<div class="field_label"><label for="EmailNotificationRequestCard"><span id="mandatory_indicator_card" class="mandatory_indicator">*</span>Library Card Number:</label></div>
							<div class="field_input">
								<?php echo $html->input('EmailNotificationRequest/card', array("size"=>"14","maxlength"=>"14")); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailNotificationRequest/card','Please enter your card number'); ?>
						</div>
						<div id="field_card_plus" class="field<?php if (@$this->data["EmailNotificationRequest"]["purpose"] != 'texting') echo ' hidden'; ?>">
							<div class="field_label"><label for="card_plus">Additional Library Card Number(s):</label></div>
							<div class="field_input">
								<?php echo $html->textarea('EmailNotificationRequest/card_plus', array('id'=>'card_plus','cols'=>'47','rows'=>'10','class'=>'input_box','tabindex'=>'1','title'=>'card_plus')); ?>
							</div>
						</div>
						<div id="field_email" class="field<?php if (@$this->data["EmailNotificationRequest"]["purpose"] == 'stop') echo ' hidden'; ?>">
						 <div class="field_label"><label for="EmailNotificationRequestEmail"><span id="mandatory_indicator_email" class="mandatory_indicator">*</span>Email:</label></div>
							<div class="field_input">
								<?php echo $html->input('EmailNotificationRequest/email', array("size"=>"48","maxlength"=>"70")); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailNotificationRequest/email','Please enter a valid email address (example: johnd@some.com)'); ?>
						</div>


						<div id="field_telephone" class="field<?php if (@$this->data["EmailNotificationRequest"]["purpose"] != 'stop') echo ' hidden'; ?>">
							<div class="field_label"><label for="EmailNotificationRequestTelephone"><span id="mandatory_indicator_telephone" class="mandatory_indicator">*</span>Telephone:</label></div>
							<div class="field_input">
								<?php echo $html->input('EmailNotificationRequest/telephone', array("size"=>"15","maxlength"=>"20")); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailNotificationRequest/telephone','Please enter a valid telephone number with area code.'); ?>
						</div>

						<div id="field_buzz" class="field<?php if (@$this->data["EmailNotificationRequest"]["purpose"] != 'begin' ) echo ' hidden'; ?>">
						<?php echo $html->checkbox('EmailNotificationRequest/purpose_buzz','', array("value"=>"buzz"), false) . "<label for='EmailNotificationRequestPurposeBuzz'>I would like to sign up for VPL's eNewsletters as well.</label>"; ?>
						
						</div>

					</fieldset>


				</div>

				<input type="hidden" name="data[EmailNotificationRequest][step]" value="<?php echo $this->data["EmailNotificationRequest"]["step"]; ?>" />
				<input id="step" type="hidden" name="step" value="<?php echo $this->data["EmailNotificationRequest"]["step"]; ?>" />
				<?php echo $html->submit("Continue", array("class"=>"submit_button")); ?>

				<div id="footnotes" class="footnotes">
					<h2>Notes:</h2>
					<ol>
						<li id="footnote_email_notices" class="<?php if ($this->data["EmailNotificationRequest"]["step"] != "data" || $this->data["EmailNotificationRequest"]["purpose"]!="begin") echo 'hidden'; ?>">
							When you choose this option, there are 3 types of notices you will receive:<br />
							<ol>
							<li><h3>Holds Notices</h3>Sent when requests are filled and the item is waiting for you on the hold shelf. The subject line for these notices is 'Items available for pick-up'.</li>
							<li><h3>Due Date Reminders (Courtesy Notices)</h3>Sent as a reminder of the due date. The subject line for these notices is 'Item(s) soon to be due'. For books, this notice is sent three days before the due date. For DVDs, this notice is sent one day before the item is due. Due date reminders are a courtesy, you remain responsible for ensuring materials are returned by their due date.</li>
							<li><h3>Overdue Notices</h3>Sent when an item is overdue. The subject line for these notices is 'Overdues'.</li>
							</ol>
						</li>
						<li id="footnote_texting_notices" class="<?php if ($this->data["EmailNotificationRequest"]["step"] != "data" || $this->data["EmailNotificationRequest"]["purpose"]!="texting") echo 'hidden'; ?>">
							When you choose this option, there are 3 types of notices you will receive:<br />
							<ol>
							<li><h3>Holds Notices</h3>Sent when requests are filled and the item is waiting for you on the hold shelf.</li>
							<li><h3>Courtesy Notices</h3>Sent as a reminder of the due date. For two- or three-week loans, this notice is sent three days before the due date. For one-week loans, this notice is sent one day before the item is due. Due date reminders are a courtesy, you remain responsible for ensuring materials are returned by their due date.</li>
							<li><h3>Overdue Notices</h3>Sent when an item is overdue.</li>
							</ol>
						</li>

					</ol>
					<div id="footnote_privacy"><?php echo $html->link("VPL's Privacy Statement","/about/website_privacy"); ?></div>
				</div>


			</div>
			<div id="email_notification_request_spacer"></div>
		</form>


	</div>
	<div class="closing"></div>
</div>
