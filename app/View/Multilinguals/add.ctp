<?php 
$html->addCrumb("Home" , "/");
$html->addCrumb("Services, Policies and Membership" , "/services"); 
$html->addCrumb("Services for Newcomers" , "/services/new_comer");
?>

<?php 
$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"ESL Collection","url"=>"/collections/esl"), array("Title"=>"Borrowing Materials","url"=>"/services/borrowing"), array("Title"=>"Library Services","url"=>"/services/special"),array("Title"=>"Email Librarian","url"=>"/email_librarian")))));
	
$this->controller->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header" width="100%">
	<div class="opening"></div>
	<div class="details">
		<h1>Multilingual Services Request Form</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">	
		<div class="entry">
			
		</div>
		<?php echo $html->formTag('/multilingual/add/' . $html->tagValue('multilinguals/id')); ?>
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
						<div class="field_label"><span class="mandatory_indicator">*</span>Name:</div>
						<div class="field_input">
							<?php echo $html->input('Multilingual/name', array("size"=>"20","maxlength"=>"20")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Multilingual/name','Please enter your name.'); ?>
					</div>
					
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span>Home phone:</div>
						<div class="field_input">
							<?php echo $html->input('Multilingual/homephone', array("size"=>"15","maxlength"=>"20")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Multilingual/homephone','Please enter your home phone number.'); ?>
					</div>
					
					
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span>Library Card Number:</div>
						<div class="field_input">
							<?php echo $html->input('Multilingual/card_number', array("size"=>"35","maxlength"=>"50")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Multilingual/card_number','Please enter your valid library card number.'); ?>
					</div>
					
					<div class="field">				
						<div class="field_label"><span class="mandatory_indicator">*</span>Pick Your Language:</div>
						<div class="checkbox_table">
							<?php echo $habtm->checkboxMultiple('Multilingual/language', $language, @$this->data["multilingual"]["language"], array('multiple' => 'multiple'), null, false); ?> 
						</div>	
						<?php echo $html->tagErrorMsg('Multilingual/language','Please enter one or more language(s).'); ?>								

					</div>	
					
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span>How may we help you?</div>
						<div class="field_input">							
							<?php echo $html->textarea('Multilingual/help', array('id'=>'help','cols'=>'47','rows'=>'10','class'=>'input_box','tabindex'=>'1','title'=>'Help')); ?>
					</div>
					<?php echo $html->tagErrorMsg('Multilingual/help','Please let us know how we may help you.'); ?>
					</div>
					
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span>Home Branch:</div>
						<div class="field_input">
							<?php echo $html->selectTag('Multilingual/library', $libraries,@$this->data["multilingual"]["library"],null,null,false); ?>

						</div>
						<?php echo $html->tagErrorMsg('Multilingual/library','Please select your home branch.'); ?>
					</div>
			</fieldset>
				
				
				<div class="entry">					
							
							<p><br/>Personal information on this form is collected under the authority of the Freedom of Information and Protection of Privacy Act, 1990, MFIPPA\Regulation 29.  Personal information collected on these forms is used to contact applicants.  After the exam is techsavvyed the forms are destroyed and non-identifying statistical information is retained. Questions regarding the collection of this information should be directed to the Director of Service Delivery.  Freedom of Information Requests should be mailed to: Vaughan Public Libraries Administration Offices 900 Clark Avenue W., Thornhill, ON  L4J 8C1</p>
						</div>	
		
				<?php echo $html->submit("Submit", array("class"=>"submit_button")); ?>
			</div>
			<div id="techsavvy_spacer"></div>
		</form>
	</div>
	<div class="closing"></div>
</div>
