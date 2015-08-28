<?php 
$html->addCrumb("Home" , "/");
$html->addCrumb("Books & Resources" , "/materials");
$html->addCrumb("We Recommend" , "/materials/recommended");
?>
<?php include("crumbs_volunteer.php"); ?>

<?php
$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"New Arrival","url"=>"/new_arrivals"),array("Title"=>"Just Returned","url"=>"/just_returned"),array("Title"=>"Bestseller Lists","url"=>"/bestsellers"),array("Title"=>"For Your Leisure","url"=>"/leisure")))), array ('image', array("image"=>array("source"=>"/img/logo_nextreads.jpg","width"=>"200", "height"=>"240", "title"=>"NextReads Newsletters", "link"=>"/materials/next_reads"))));



$this->controller->set('relatedContentElements', $relatedContentElements);
?>


<!-- Script functions deal with dynamic changes on form according to age changes -->
<script language="javascript" type="text/javascript">


function checkAge(selected_option) {
	if (selected_option == "kid") {
		document.getElementById("kid").style.display="block";
		document.getElementById("parent").style.display="none";
	} else if (selected_option == "parent") {
		document.getElementById("kid").style.display="none";
		document.getElementById("parent").style.display="block";
	}	
}

function is_checked() {
 var other = document.getElementById("NextReadsOther");
 var checked = document.getElementById("computer_other");
	if (other.checked == true) {	
	       
		checked.style.display="block";
		checked.style.visibility = "visible";	

	} else {
		checked.style.display="none";
		checked.style.visibility = "hidden";
	}	
}
</script>

<div id="page_header" width="100%">
	<div class="opening"></div>
	<div class="details">
		<h1>Your Next 5 Reads</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">	
		<div class="entry">
		<h3>Your Next 5 Reads</h3>
			Fill out this form to get a personalized reading list from Vaughan Public Libraries.
			<p><em> <sup>*</sup>Please check all that apply. The more information you can provide us, the better we can create a suitable reading list. Note that entries indicated with asterisk (*) are required.</em> </p>
			</div>
		<?php echo $html->formTag('/next_reads/add/' . $html->tagValue('next_reads/id')); ?>
			<div class="whole_width">
				<?php if ($errors) { ?>
					<div class="important_note">
						<?php echo $html->image("error_indicator_general.gif", array("align"=>"left")); ?>
						Your inquiry could not be submitted due to errors in your input. Please correct the errors indicated below and send again.
					</div>
				<?php } ?>
		
				<fieldset><legend>Contact Information</legend>
	

					<div class="field">
						<div class="field_label"><label for="NextReadsName"><span class="mandatory_indicator">*</span>Name:</label></div>
						<div class="field_input">
							<?php echo $html->input('NextReads/name', array("size"=>"20","maxlength"=>"20")); ?>
						</div>
						<?php echo $html->tagErrorMsg('NextReads/name','Please enter your name.'); ?>
					</div>
					
					<div class="field">
						<div class="field_label"><label for="NextReadsEmail"><span class="mandatory_indicator">*</span>Email:</label></div>
						<div class="field_input">
							<?php echo $html->input('NextReads/email', array("size"=>"35","maxlength"=>"50")); ?>
						</div>
						<?php echo $html->tagErrorMsg('NextReads/name','Please enter your email.'); ?>
					</div>
					
					<div class="field">
						<div class="field_label"><label for="NextReadsCard"><span id="mandatory_indicator_card" class="mandatory_indicator">*</span>Library Card Number:</label></div>
						<div class="field_input">
							<?php echo $html->input('NextReads/card', array("size"=>"14","maxlength"=>"14","title"=>"Library Card Number")); ?>
						</div>
						<?php echo $html->tagErrorMsg('NextReads/card','Please enter an valid library card number'); ?>
					</div>
					
				</fieldset>
			
				<fieldset><legend>Tell Us More</legend>
					<div class="field">				
						<div class="field_label"><span class="mandatory_indicator">*</span>Collection:</div>
						<div class="checkbox_table_2col">
							<?php echo $habtm->checkboxMultiple('NextReads/collection', $collection, @$this->data["NextReads"]["collection"], array('multiple' => 'multiple'), null, false); ?> 
						</div>	
						<?php echo $html->tagErrorMsg('NextReads/format','Please enter one or more collection.'); ?>								
						
					</div>	
					<div class="field">				
						<div class="field_label"><span class="mandatory_indicator">*</span>Format:</div>
						<div class="checkbox_table_2col">
							<?php echo $habtm->checkboxMultiple('NextReads/format', $format, @$this->data["NextReads"]["format"], array('multiple' => 'multiple'), null, false); ?> 
						</div>	
						<?php echo $html->tagErrorMsg('NextReads/format','Please enter one or more format.'); ?>								
											
					</div>	
					
				<div class="field">				
					<div class="field_label">For Fiction:</div>
					<div class="checkbox_table_2col">
						<?php echo $habtm->checkboxMultiple('NextReads/fiction', $fiction, @$this->data["NextReads"]["fiction"], array('multiple' => 'multiple'), null, false); ?> 						
						
					
					<div class="field_input">
					<hr/><label for="fiction_more">Additional Comments:</label>
						<?php echo $html->textarea('NextReads/fiction_more', array('id'=>'fiction_more','cols'=>'47','rows'=>'10','class'=>'input_box','tabindex'=>'1','title'=>'fiction_more')); ?>
					</div></div>					
				</div>	
				
				<div class="field">				
					<div class="field_label">For Non-Fiction:</div>
					<div class="checkbox_table_2col">
						<?php echo $habtm->checkboxMultiple('NextReads/non_fiction', $non_fiction, @$this->data["NextReads"]["non_fiction"], array('multiple' => 'multiple'), null, false); ?> 
					
					<div class="field_input">
					<hr/><label for="non_fiction_more">Additional Comments:</label>
						<?php echo $html->textarea('NextReads/non_fiction_more', array('id'=>'non_fiction_more','cols'=>'47','rows'=>'10','class'=>'input_box','tabindex'=>'1','title'=>'non_fiction_more')); ?>
					</div></div>		
												

				</div>	
				
					
					<div class="field">
						<div class="field_label"><label for="reason">More:</label></div>
						
						<div class="field_input">
						        Tell us about a few books and/or authors that you've enjoyed and what you liked about them. Also feel free to tell us about books/authors you haven't liked and why. What are you in the mood to read next?
							<?php echo $html->textarea('NextReads/reason', array('id'=>'reason','cols'=>'47','rows'=>'10','class'=>'input_box','tabindex'=>'1','title'=>'reason')); ?>
						</div>
						
					</div>
				</fieldset>
				
				
				<div class="entry">					
							
							<p><br/><em> While we will do our best to make appropriate reading selections based on the information you provide, we cannot guarantee that you will like everything that is suggested for you. We hope you will enjoy the titles we suggest, however if they are not to your liking, please use our form again and let us know!</em> </p>
						</div>	
		
				<?php echo $html->submit("Submit", array("class"=>"submit_button")); ?>
			</div>
			<div id="membership_request_spacer"></div>
		</form>
	</div>
	<div class="closing"></div>
</div>
