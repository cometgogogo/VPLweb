<?php 
$html->addCrumb("Home" , "/");
$html->addCrumb("Using the Library" , "/services");
$html->addCrumb("Maker Kits" , "/services/maker_kit");
?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"3D Printing Terms of Use","url"=>"/files/services/3DPrintingTermsofUse.pdf","target"=>"_blank"),array("Title"=>"Library Services","url"=>"/library_services"),array("Title"=>"Libraries and Hours","url"=>"/libraries"),array("Title"=>"Borrowing Materials","url"=>"/services/borrowing"),array("Title"=>"Downloads & Digital","url"=>"/materials/downloads_digital")))));
	
	$relatedContentElements[] = array ('image', array("image"=>array("source"=>"/img/makerkit_sidebar.jpg","width"=>"200", "height"=>"257", "title"=>"Maker Kits", "link"=>"/services/maker_kit", "target"=>"self")));
	
	$this->controller->set('relatedContentElements', $relatedContentElements);
?>

<script language="javascript" type="text/javascript">
$(document).ready(function() {

    // assuming the controls you want to attach the plugin to 
    // have the "datepicker" class set
    $('#MakerReservationDate').Zebra_DatePicker({ direction: 2, format: 'M j, Y'});

 });

</script>
<div id="page_header" width="100%">
	<div class="opening"></div>
	<div class="details">
		<h1>Reserve a Maker Kit</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
	<div class="intro">
			<p>Please book at least 2 business days before the reservation date. Your request will be reviewed by library staff. Please wait for a confirmation from the library to find out whether or not your booking is approved.</p>
			
		</div>	
	
		<div class="entry">
			
			<p>Please refer to the kits <a href="/services/maker_kit">rotation schedule</a> for the location of the kit that you are interested in. </p>
			<p>Entries indicated with asterisk (*) are required.</p>
		</div>



		<?php echo $html->formTag('/maker_reservation/add/' . $html->tagValue('MakerReservation/id')); ?>
			<div class="whole_width">
				<?php if ($errors) { ?>
					<div class="important_note">
						<?php echo $html->image("error_indicator_general.gif", array("align"=>"left")); ?>
						Your inquiry could not be submitted due to errors in your input. Please correct the errors indicated below and send again.
					</div>
				<?php } ?>


				<fieldset>
					<div class="field">
						<div class="field_label"><label for="MakerReservationFirstName">First Name</label>:</div>
						<div class="field_input">
							<?php echo $html->input('MakerReservation/first_name', array("size"=>"30","maxlength"=>"30")); ?>
						</div>
					</div>
					<div class="field">
						<div class="field_label"><label for="MakerReservationLastName">Last name:</label></div>
						<div class="field_input">
							<?php echo $html->input('MakerReservation/last_name', array("size"=>"30","maxlength"=>"30")); ?>
						</div>
					</div>
					<div class="field">
						<div class="field_label"><label for="MakerReservationTelephone">Telephone:</label></div>
						<div class="field_input">
							<?php echo $html->input('MakerReservation/telephone', array("size"=>"20","maxlength"=>"20")); ?>
						</div>
						<?php echo $html->tagErrorMsg('MakerReservation/telephone','Please enter a valid telephone number with area code.'); ?>
					</div>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="MakerReservationEmail">Email Address:</label></div>
						<div class="field_input">
							<?php echo $html->input('MakerReservation/email', array("size"=>"48","maxlength"=>"70")); ?>
						</div>
						<?php echo $html->tagErrorMsg('MakerReservation/email','Please enter your Email Address. It must be a valid email address (example: johnd@vaughan.ca)'); ?>
					</div>


					
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="MakerReservationDate">Date Needed:</label></div>
						<div class="field_input"><input id="MakerReservationDate" type="text" value="" name="data[MakerReservation][date]" /></div>
						<?php echo $html->tagErrorMsg('MakerReservation/date','Please choose a date.'); ?>
					</div>
					
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="MakerReservationTime">Time:</label></div>
						<div class="field_input">
							<?php echo $html->input('MakerReservation/time', array("size"=>"20","maxlength"=>"20")); ?>
						</div>
						<?php echo $html->tagErrorMsg('MakerReservation/time','Please enter the time you want to reserve for.'); ?>
					</div>					
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="MakerReservationKit">Maker Kit:</label></div>
							<div class="field_input">
								<?php echo $html->selectTag('MakerReservation/kit', $kits,@$this->data["MakerReservation"]["kit"],array('title'=>'Maker Kit'),null,false); ?>
							</div>
							<?php echo $html->tagErrorMsg('MakerReservation/kit','Please select a kit.'); ?>
					</div>
				</fieldset>

				<?php echo $html->submit("Submit", array("class"=>"submit_button")); ?>
			</div>
			<div id="elibrarian_inquiry_spacer"></div>
		</form>
		
	</div>
	
	
	<div class="closing"></div>
	
</div>
