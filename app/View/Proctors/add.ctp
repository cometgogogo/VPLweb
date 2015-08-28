<?php
$html->addCrumb("Home" , "/");
$html->addCrumb("Using the Library" , "/services");
$html->addCrumb("Library Services" , "/library_services");
?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(																							array("Title"=>"Email Librarian","url"=>"/email_librarian"),array("Title"=>"Locations & Hours","url"=>"/libraries")))));
	$this->controller->set('relatedContentElements', $relatedContentElements);
?>


<!-- Script functions deal with dynamic changes on form according to age changes -->
<script language="javascript" type="text/javascript">

function checkformat(selected_option) {
	if (selected_option == "Computer") {
		document.getElementById("field_format_computer").style.display="block";

	} else if (selected_option == "Paper") {
		document.getElementById("field_format_computer").style.display="none";
	}
}
</script>

<div id="page_header" width="100%">
	<div class="opening"></div>
	<div class="details">
		<h1>Exam Proctoring</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="entry">
			Proctoring service is available at select locations at Vaughan Public Libraries. VPL charges $25.00 per exam. Please see <?php echo $html->link("guidelines","/library_services#proctor")?> for more details or contact your local branch at 905-653-READ (7323).
		</div>



		<?php echo $html->formTag('/proctor/add/' . $html->tagValue('proctors/id')); ?>
			<div class="whole_width">
				<?php if ($errors) { ?>
					<div class="important_note">
						<?php echo $html->image("error_indicator_general.gif", array("align"=>"left")); ?>
						Your inquiry could not be submitted due to errors in your input. Please correct the errors indicated below and send again.
					</div>
				<?php } ?>

	<div class="entry">
				Please note that entries indicated with asterisk (*) are required.
	</div>

				<fieldset><legend>Contact Information</legend>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="ProctorName">Student Name:</label></div>
						<div class="field_input">
							<?php echo $html->input('Proctor/name', array("size"=>"20","maxlength"=>"20")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Proctor/name','Please enter your name.'); ?>
					</div>
					<div class="field">
						<div class="field_label"><label for="ProctorAddress">Address:</label></div>
						<div class="field_input">
							<?php echo $html->input('Proctor/address', array("size"=>"45","maxlength"=>"80")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Proctor/address','Please enter your address.'); ?>
					</div>
					<div class="field">
						<div class="field_label"><label for="ProctorEmail">Email:</label></div>
						<div class="field_input">
							<?php echo $html->input('Proctor/email', array("size"=>"35","maxlength"=>"50")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Proctor/email','Not a valid email address (example: johnd@vaughan.ca)'); ?>
					</div>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="ProctorTelephone">Telephone:</label></div>
						<div class="field_input">
							<?php echo $html->input('Proctor/telephone', array("size"=>"15","maxlength"=>"20")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Proctor/telephone','Not a valid telephone number with area code.'); ?>
					</div>

				</fieldset>

				<fieldset><legend>Issuing Institution</legend>

					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="ProctorSchoolName">Institution Name:</label></div>
						<div class="field_input">
							<?php echo $html->input('Proctor/school_name', array("size"=>"20","maxlength"=>"60")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Proctor/school_name','Please enter the name of the institution.'); ?>
					</div>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="ProctorContact">Contact Person:</label></div>
						<div class="field_input">
							<?php echo $html->input('Proctor/contact', array("size"=>"20","maxlength"=>"20")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Proctor/contact','Please enter the name of contact person.'); ?>
					</div>
					<div class="field">
						<div class="field_label"><label for="ProctorSchoolAddress">Address:</label></div>
						<div class="field_input">
							<?php echo $html->input('Proctor/school_address', array("size"=>"45","maxlength"=>"75")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Proctor/school_address','Please enter the address of institution .'); ?>
					</div>
					<div class="field">
						<div class="field_label"><label for="ProctorSchoolEmail">Email:</label></div>
						<div class="field_input">
							<?php echo $html->input('Proctor/school_email', array("size"=>"35","maxlength"=>"50")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Proctor/school_email','Not a valid email address (example: johnd@vaughan.ca)'); ?>
					</div>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="ProctorSchoolTelephone">Telephone:</label></div>
						<div class="field_input">
							<?php echo $html->input('Proctor/school_telephone', array("size"=>"15","maxlength"=>"20")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Proctor/school_telephone','Not a valid telephone number with area code.'); ?>
					</div>
					<div class="field">
						<div class="field_label"><label for="ProctorFax">Fax:</label></div>
						<div class="field_input">
							<?php echo $html->input('Proctor/fax', array("size"=>"15","maxlength"=>"20")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Proctor/fax','Not a valid fax number with area code.'); ?>
					</div>
				</fieldset>

				<fieldset><legend>Exam Information</legend>
						<div class="field">
							<div class="field_label"><span class="mandatory_indicator">*</span><label for="ProctorLibrary">To Be Proctored At:</label></div>
							<div class="field_input">
								<div class="field_input">
									<?php echo $html->selectTag('Proctor/library', $libraries,@$this->data["Proctor"]["library"],null,null,false); ?>
								</div>
							</div>
							<?php echo $html->tagErrorMsg('Proctor/library','Select a branch that the exam will be proctored at.'); ?>
						</div>
						<div class="field">
							<div class="field_label"><span class="mandatory_indicator">*</span><label for="ProctorDate">Exam Date/Time:</label> </div>
							<div class="field_input">
								<?php echo $html->input('Proctor/date', array("size"=>"30","maxlength"=>"50")); ?>
							</div>
							<?php echo $html->tagErrorMsg('Proctor/date','Please enter the date of exam.'); ?>
						</div>
						<div class="field">
							<div class="field_label"><label for="ProctorType">Type of Exam:</label></div>
							<div class="field_input">
								<?php echo $html->input('Proctor/type', array("size"=>"25","maxlength"=>"35")); ?>
							</div>
							<?php echo $html->tagErrorMsg('Proctor/type','Please enter the type of exam.'); ?>
						</div>
						<div class="field">
							<div class="field_label"><span class="mandatory_indicator">*</span><label for="ProctorLength">Length of Exam:</label></div>
							<div class="field_input">
								<?php echo $html->input('Proctor/length', array("size"=>"20","maxlength"=>"20")); ?>
							</div>
							<?php echo $html->tagErrorMsg('Proctor/length','Please enter the length of exam.'); ?>
						</div>
						<div class="field">
							<div class="field_label"><span class="mandatory_indicator">*</span>Format of Exam:</div>
							<div class="field_input">


								<?php echo $html->radio('Proctor/format', array("Paper"=>"Paper","Computer"=>"Computer"), null,  array("onclick"=>"checkformat(this.value)")); ?>

									<div id="field_format_computer" class="field<?php if ($this->data["Proctor"]["format"] != "Computer") echo ' hidden'; ?>"><br/>Note: The computer should be provided by the student.<br/>
									</div>
							</div>
							<?php echo $html->tagErrorMsg('Proctor/format','Please enter the format of exam.'); ?>
						</div>
						<div class="field">
							<div class="field_label"><label for="ProctorEquipment">Equipment Needed For An Exam:</label></div>
							<div class="field_input">
								<?php echo $html->input('Proctor/equipment', array("size"=>"15","maxlength"=>"20")); ?>

								<div id="field_equipment"><br/>To be provided by the student or by the issuing institution<br/>
									</div>
							</div>

						</div>

					</fieldset>

						<div class="entry">
							<p></br><b>NOTE: The $25.00 proctoring fee, courier and other charges must be pre-paid.</b></p>

							<p>
							I have read the guidelines and procedures for sitting the exams and have agreed to abide by them.
							</p>

							<p><i>Vaughan Public Libraries will not be responsible for any error made by the educational institution, including the institution's failure to send the necessary documents in a timely manner or a student's failure to COMPLETE the exams AT THE APPROVED TIME AND LOCATION.</i></p>

							<p>Personal information on this form is collected under the authority of the Freedom of Information and Protection of Privacy Act, 1990, MFIPPA\Regulation 29.  Personal information collected on these forms is used to contact applicants.  After the exam is proctored the forms are destroyed and non-identifying statistical information is retained. Questions regarding the collection of this information should be directed to the Director of Service Delivery.  Freedom of Information Requests should be mailed to: Vaughan Public Libraries Administration Offices 900 Clark Avenue W., Thornhill, ON  L4J 8C1</p>
						</div>

				<?php echo $html->submit("Send Application", array("class"=>"submit_button")); ?>
			</div>
			<div id="proctor_spacer"></div>
		</form>
	</div>
	<div class="closing"></div>
</div>
