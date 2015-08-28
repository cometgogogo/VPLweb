<?php 
$html->addCrumb("Home" , "/");
$html->addCrumb("Participate and Contribute" , "/participate");
$html->addCrumb("Opinions and Suggestions" , "/participate/opinions");


$relatedContentElements = array	(array ('related_pages', array("pages"=>array(
														array("Title"=>"Libraries and Hours","url"=>"/libraries"),
														array("Title"=>"Email Notifications","url"=>"/email_notification_requests")
														))));

$this->controller->set('relatedContentElements', $relatedContentElements);




$mandatoryFields = $this->controller->EmailLibrarian2->mandatoryFields(@$this->data["EmailLibrarian2"]["purpose"])
?>


<script language="javascript" type="text/javascript">
	<?php
		echo chr(13) . chr(10);
		echo "mandatoryFields = new Array();" . chr(13) . chr(10);
		foreach ($purposes as $purpose => $value) {
			echo "purposeFields = new Array();" . chr(13) . chr(10);
			foreach ($this->controller->EmailLibrarian2->mandatoryFields($purpose) as $field => $value) {
				//echo "purposeFields.push('" . $field . "');" . chr(13) . chr(10);
				echo "purposeFields['" . $field . "'] = true;" . chr(13) . chr(10);
			}
			echo "mandatoryFields['" . $purpose . "'] = purposeFields;" . chr(13) . chr(10);
		}
	?>

	function onLoad() {
		changePurpose("<?php echo @$this->data["EmailLibrarian2"]["purpose"]; ?>");
	}
	

	function changePurpose(selected_option) {
		document.getElementById("step").value = "purpose|data";
		document.getElementById("field_purpose").style.display="block";
		document.getElementById("field_purpose_info").style.display="none";
		if (selected_option == "information") {
			document.getElementById("step_data").style.display="block";
			document.getElementById("field_purpose_description_information").style.display="block";
			document.getElementById("field_purpose_description_business").style.display="none";
			document.getElementById("field_purpose_description_purchase").style.display="none";
			document.getElementById("field_purpose_description_account").style.display="none";
			document.getElementById("field_purpose_description_technical").style.display="none";
			document.getElementById("field_question_nontechnical").style.display="inline";
			document.getElementById("field_question_technical").style.display="none";
			document.getElementById("field_last_name").style.display="block";
			document.getElementById("field_telephone").style.display="none";
			document.getElementById("field_library").style.display="block";
			document.getElementById("field_age").style.display="block";
			document.getElementById("field_question").style.display="block";
			document.getElementById("field_item_type").style.display="none";
			document.getElementById("field_item_title").style.display="none";
			document.getElementById("field_item_author").style.display="none";
			document.getElementById("field_item_publisher").style.display="none";
			document.getElementById("field_item_date").style.display="none";
			document.getElementById("field_item_isbn").style.display="none";
			document.getElementById("field_item_info").style.display="none";
		} else if (selected_option == "business") {
			document.getElementById("step_data").style.display="block";
			document.getElementById("field_purpose_description_information").style.display="none";
			document.getElementById("field_purpose_description_business").style.display="block";
			document.getElementById("field_purpose_description_purchase").style.display="none";
			document.getElementById("field_purpose_description_account").style.display="none";
			document.getElementById("field_purpose_description_technical").style.display="none";
			document.getElementById("field_question_nontechnical").style.display="inline";
			document.getElementById("field_question_technical").style.display="none";
			document.getElementById("field_last_name").style.display="none";
			document.getElementById("field_telephone").style.display="block";
			document.getElementById("field_library").style.display="block";
			document.getElementById("field_age").style.display="none";
			document.getElementById("field_question").style.display="block";
			document.getElementById("field_item_type").style.display="none";
			document.getElementById("field_item_title").style.display="none";
			document.getElementById("field_item_author").style.display="none";
			document.getElementById("field_item_publisher").style.display="none";
			document.getElementById("field_item_date").style.display="none";
			document.getElementById("field_item_isbn").style.display="none";
			document.getElementById("field_item_info").style.display="none";
		} else if (selected_option == "account") {
			document.getElementById("step_data").style.display="block";
			document.getElementById("field_purpose_description_information").style.display="none";
			document.getElementById("field_purpose_description_business").style.display="none";
			document.getElementById("field_purpose_description_purchase").style.display="none";
			document.getElementById("field_purpose_description_account").style.display="block";
			document.getElementById("field_purpose_description_technical").style.display="none";
			document.getElementById("field_question_nontechnical").style.display="inline";
			document.getElementById("field_question_technical").style.display="none";
			document.getElementById("field_last_name").style.display="none";
			document.getElementById("field_telephone").style.display="block";
			document.getElementById("field_library").style.display="block";
			document.getElementById("field_age").style.display="none";
			document.getElementById("field_question").style.display="block";
			document.getElementById("field_item_type").style.display="none";
			document.getElementById("field_item_title").style.display="none";
			document.getElementById("field_item_author").style.display="none";
			document.getElementById("field_item_publisher").style.display="none";
			document.getElementById("field_item_date").style.display="none";
			document.getElementById("field_item_isbn").style.display="none";
			document.getElementById("field_item_info").style.display="none";
		} else if (selected_option == "technical") {
			document.getElementById("step_data").style.display="block";
			document.getElementById("field_purpose_description_information").style.display="none";
			document.getElementById("field_purpose_description_business").style.display="none";
			document.getElementById("field_purpose_description_purchase").style.display="none";
			document.getElementById("field_purpose_description_account").style.display="none";
			document.getElementById("field_purpose_description_technical").style.display="block";
			document.getElementById("field_question_nontechnical").style.display="none";
			document.getElementById("field_question_technical").style.display="inline";
			document.getElementById("field_last_name").style.display="none";
			document.getElementById("field_telephone").style.display="block";
			document.getElementById("field_library").style.display="block";
			document.getElementById("field_age").style.display="none";
			document.getElementById("field_question").style.display="block";
			document.getElementById("field_item_type").style.display="none";
			document.getElementById("field_item_title").style.display="none";
			document.getElementById("field_item_author").style.display="none";
			document.getElementById("field_item_publisher").style.display="none";
			document.getElementById("field_item_date").style.display="none";
			document.getElementById("field_item_isbn").style.display="none";
			document.getElementById("field_item_info").style.display="none";
		} else if(selected_option == "purchase") {
			document.getElementById("step_data").style.display="block";
			document.getElementById("field_purpose_description_information").style.display="none";
			document.getElementById("field_purpose_description_business").style.display="none";
			document.getElementById("field_purpose_description_purchase").style.display="block";
			document.getElementById("field_purpose_description_account").style.display="none";
			document.getElementById("field_purpose_description_technical").style.display="none";
			document.getElementById("field_question_nontechnical").style.display="none";
			document.getElementById("field_question_technical").style.display="none";
			document.getElementById("field_last_name").style.display="block";
			document.getElementById("field_telephone").style.display="block";
			document.getElementById("field_library").style.display="block";
			document.getElementById("field_age").style.display="none";
			document.getElementById("field_question").style.display="none";
			document.getElementById("field_item_type").style.display="block";
			document.getElementById("field_item_title").style.display="block";
			document.getElementById("field_item_author").style.display="block";
			document.getElementById("field_item_publisher").style.display="block";
			document.getElementById("field_item_date").style.display="block";
			document.getElementById("field_item_isbn").style.display="block";
			document.getElementById("field_item_info").style.display="block";
		} 
		document.getElementById("mandatory_indicator_email").style.display = ((mandatoryFields[selected_option]["email"])?"inline":"none")
		document.getElementById("mandatory_indicator_first_name").style.display = ((mandatoryFields[selected_option]["first_name"])?"inline":"none")
		document.getElementById("mandatory_indicator_last_name").style.display = ((mandatoryFields[selected_option]["last_name"])?"inline":"none")
		document.getElementById("mandatory_indicator_telephone").style.display = ((mandatoryFields[selected_option]["telephone"])?"inline":"none")
		document.getElementById("mandatory_indicator_card").style.display = ((mandatoryFields[selected_option]["card"])?"inline":"none")
		document.getElementById("mandatory_indicator_library").style.display = ((mandatoryFields[selected_option]["library"])?"inline":"none")
		document.getElementById("mandatory_indicator_age").style.display = ((mandatoryFields[selected_option]["age"])?"inline":"none")
		document.getElementById("mandatory_indicator_question").style.display = ((mandatoryFields[selected_option]["question"])?"inline":"none")
	}
</script>


<div id="page_header" width="100%">
	<div class="opening"></div>
	<div class="details">
		<h1>Email Librarian</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
	
		<div class="intro">
			You can use "Email Librarian" service to send reference and information questions, inquiries about your library account, or technical issues, or recommend an item you would like to see added to VPL's collection.
		</div>
		
		<div class="entry">
			Please note that entries indicated with asterisk (*) are required.
		</div>
		
	
		<?php echo $html->formTag('/email_librarian/add/' . $html->tagValue('EmailLibrarian/id')); ?>
			<div class="whole_width">
				<?php if ($errors) { ?>
					<div class="important_note">
						<?php echo $html->image("error_indicator_general.gif", array("align"=>"left")); ?>
						Your inquiry could not be submitted due to errors in your input. Please correct the errors indicated below and send again.
					</div>
				<?php } ?>
				
				<div id="step_purpose" class="input_step">
					<fieldset><legend>Purpose</legend>
						<div id="field_purpose" class="field<?php if ($this->data["EmailLibrarian2"]["step"] != "purpose") echo ' hidden'; ?>">
							<div class="field_label"><span class="mandatory_indicator">*</span>I would like to ...</div>
							<div class="field_input">
								<?php echo $html->radio('EmailLibrarian2/purpose',
															$purposes,null,
															array("onclick"=>"changePurpose(this.value);", "title"=>"Email Librarian Purpose")
													); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailLibrarian2/purpose','Please specify the purpose of your inquiry.') ?>
						</div>
						<div id="field_purpose_info" class="field<?php if ($this->data["EmailLibrarian2"]["step"] != "data") echo ' hidden'; ?>">
							<div class="field_label">I'd like to ...</div>
							<div class="field_input">
								<?php echo $purposes[$this->data["EmailLibrarian2"]["purpose"]]; ?>
								<?php echo $html->submit("Change", array("name"=>"change_purpose","class"=>"form_button", "title"=>"Change Purpose")); ?>
							</div>
						</div>
						<div id="field_purpose_description_information" class="field<?php if ($this->data["EmailLibrarian2"]["step"] != "data" || $this->data["EmailLibrarian2"]["purpose"]!="information") echo ' hidden'; ?>">
							<div class="field_label">Details:</div>
							<div class="field_input">
								Email Librarian provides Vaughan Public Libraries customers with the opportunity to ask questions 
								via email and have them answered by a VPL Librarian. Please use the form below to ask a question.
							</div>
						</div>
						<div id="field_purpose_description_business" class="field<?php if ($this->data["EmailLibrarian2"]["step"] != "data" || $this->data["EmailLibrarian2"]["purpose"]!="business") echo ' hidden'; ?>">
							<div class="field_label">Details:</div>
							<div class="field_input">
								The Business Services Librarian is a Vaughan Public Libraries information 
								professional with special expertise in searching resources for business, 
								industry, commerce and technology information.  
								To contact VPL's Business Services Librarian please use the form below.
							</div>
						</div>
						<div id="field_purpose_description_account" class="field<?php if ($this->data["EmailLibrarian2"]["step"] != "data" || $this->data["EmailLibrarian2"]["purpose"]!="account") echo ' hidden'; ?>">
							<div class="field_label">Details:</div>
							<div class="field_input">
								 You can use this form to ask questions about your library account, including overdue items and fines. For more immediate services, please call 
								 905-653-READ (7323) during <a href="/libraries">operating hours</a>.
							</div>
						</div>
						<div id="field_purpose_description_technical" class="field<?php if ($this->data["EmailLibrarian2"]["step"] != "data" || $this->data["EmailLibrarian2"]["purpose"]!="technical") echo ' hidden'; ?>">
							<div class="field_label">Details:</div>
							<div class="field_input">
								 You can use this form to send any technical issues or questions either relating to this website or online library catalogue.
							</div>
						</div>
						<div id="field_purpose_description_purchase" class="field<?php if ($this->data["EmailLibrarian2"]["step"] != "data" || $this->data["EmailLibrarian2"]["purpose"]!="purchase") echo ' hidden'; ?>">
							<div class="field_label">Details:</div>
							<div class="field_input">
								Your request will be forwarded to the appropriate selectors, and you will be contacted with their decision.  If your recommendation is purchased, a request for the item will be placed on your behalf and you will have the first opportunity to borrow it when it arrives.<br/><br/>
								
								Please note that because of the large volume of recommended purchases we receive, Vaughan Public Libraries cannot purchase all recommended titles.  Suggestions will be evaluated according to the Collection Development Policy, expected customer demand, and available resources.<br/><br/>							 
								
								VPL automatically collects new, popular and best-selling items in all formats (print, talking book, CD and DVD) and therefore it is not necessary to submit requests for such titles.<br/><br/>							 
								
								Materials not purchased may be requested through our Interlibrary Loan service.<br/><br/>			
								 
								
								Please fill in the information below so that we can contact you about the item you have recommended.
								

							</div>
						</div>
					</fieldset>			
				</div>	

				<div id="step_data" class="input_step<?php if ($this->data["EmailLibrarian2"]["step"] != "data") echo ' hidden'; ?>">
					<fieldset><legend>About Yourself</legend>
						<div class="field">
							<div class="field_label"><span id="mandatory_indicator_email" class="mandatory_indicator<?php if (!isset($mandatoryFields["email"])) echo ' hidden'; ?>">*</span>Email:</div>
							<div class="field_input">
								<?php echo $html->input('EmailLibrarian2/email', array("size"=>"48","maxlength"=>"70", "title"=>"Email")); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailLibrarian2/email','Please enter a valid email address (example: johnd@somewhere.com)'); ?>
						</div>
						<div class="field">
							<div class="field_label"><span id="mandatory_indicator_first_name" class="mandatory_indicator<?php if (!isset($mandatoryFields["first_name"])) echo ' hidden'; ?>">*</span>First Name:</div>
							<div class="field_input">
								<?php echo $html->input('EmailLibrarian2/first_name', array("size"=>"20","maxlength"=>"20","title"=>"First Name")); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailLibrarian2/first_name','Please enter your first name'); ?>
						</div>
						<div id="field_last_name" class="field<?php if (@$this->data["EmailLibrarian2"]["purpose"] != 'purchase') echo ' hidden'; ?>">
							<div class="field_label"><span id="mandatory_indicator_last_name" class="mandatory_indicator<?php if (!isset($mandatoryFields["last_name"])) echo ' hidden'; ?>">*</span>Last Name:</div>
							<div class="field_input">
								<?php echo $html->input('EmailLibrarian2/last_name', array("size"=>"20","maxlength"=>"20","title"=>"Last Name")); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailLibrarian2/last_name','Please enter your last name'); ?>
						</div>
						<div id="field_telephone" class="field<?php if (@$this->data["EmailLibrarian2"]["purpose"] == 'information') echo ' hidden'; ?>">
							<div class="field_label"><span id="mandatory_indicator_telephone" class="mandatory_indicator<?php if (!isset($mandatoryFields["telephone"])) echo ' hidden'; ?>">*</span>Telephone:</div>
							<div class="field_input">
								<?php echo $html->input('EmailLibrarian2/telephone', array("size"=>"15","maxlength"=>"20","title"=>"Telephone")); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailLibrarian2/telephone','Please enter a valid telephone number.'); ?>
						</div>
						<div class="field">
							<div class="field_label"><span id="mandatory_indicator_card" class="mandatory_indicator<?php if (!isset($mandatoryFields["card"])) echo ' hidden'; ?>">*</span>Library Card Number:</div>
							<div class="field_input">
								<?php echo $html->input('EmailLibrarian2/card', array("size"=>"14","maxlength"=>"14","title"=>"Library Card Number")); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailLibrarian2/card','Please enter your library card number'); ?>
						</div>
						<div id="field_library" class="field">
							<div class="field_label"><span id="mandatory_indicator_library" class="mandatory_indicator<?php if (!isset($mandatoryFields["library"])) echo ' hidden'; ?>">*</span>Local Branch:</div>
							<div class="field_input">
								<?php echo $html->selectTag('EmailLibrarian2/library', $libraries,@$this->data["EmailLibrarian2"]["library"],array('title'=>'Local Branch'),null,false); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailLibrarian2/library','Please select your local branch'); ?>
						</div>
						<div id="field_age" class="field<?php if (@$this->data["EmailLibrarian2"]["purpose"] != 'information') echo ' hidden'; ?>">
							<div class="field_label"><span id="mandatory_indicator_age" class="mandatory_indicator<?php if (!isset($mandatoryFields["age"])) echo ' hidden'; ?>">*</span>Age level of material:</div>
							<div class="field_input">
								<?php echo $html->selectTag('EmailLibrarian2/age', $age_levels,@$this->data["EmailLibrarian2"]["age"],array('title'=>'Age level of material'),null,false); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailLibrarian2/age','Please select age level.'); ?>
						</div>
					</fieldset>
					<fieldset><legend>Your Inquiry</legend>
						<div id="field_question" class="field<?php if (@$this->data["EmailLibrarian2"]["purpose"] == 'purchase') echo ' hidden'; ?>">
							<div class="field_label"><span id="mandatory_indicator_question" class="mandatory_indicator<?php if (!isset($mandatoryFields["question"])) echo ' hidden'; ?>">*</span><span id="field_question_nontechnical" class="hidden">Your question:</span><span id="field_question_technical" class="hidden">Issues or Questions:</span></div>
							<div class="field_input">
								<?php echo $html->textarea('EmailLibrarian2/question', array('id'=>'question','cols'=>'47','rows'=>'10','class'=>'input_box','tabindex'=>'1','title'=>'Your question')); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailLibrarian2/question','Please enter your question'); ?>
						</div>
						<div id="field_item_type" class="field<?php if (@$this->data["EmailLibrarian2"]["purpose"] != 'purchase') echo ' hidden'; ?>">
							<div class="field_label"><span id="mandatory_indicator_item_type" class="mandatory_indicator<?php if (!isset($mandatoryFields["item_type"])) echo ' hidden'; ?>">*</span>This item is a:</div>
							<div class="field_input">
								<?php echo $html->selectTag('EmailLibrarian2/item_type', $item_types, @$this->data["EmailLibrarian2"]["item_type"],array('title'=>'Item Type'),null,false); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailLibrarian2/item_type','Please indicate type of item.'); ?>
						</div>
						<div id="field_item_title" class="field<?php if (@$this->data["EmailLibrarian2"]["purpose"] != 'purchase') echo ' hidden'; ?>">
							<div class="field_label"><span id="mandatory_indicator_item_title" class="mandatory_indicator<?php if (!isset($mandatoryFields["item_title"])) echo ' hidden'; ?>">*</span>Title:</div>
							<div class="field_input">
								<?php echo $html->input('EmailLibrarian2/item_title', array("size"=>"58","maxlength"=>"70","title"=>"Item Title")); ?>
							</div>
						</div>
						<div id="field_item_author" class="field<?php if (@$this->data["EmailLibrarian2"]["purpose"] != 'purchase') echo ' hidden'; ?>">
							<div class="field_label"><span id="mandatory_indicator_item_author" class="mandatory_indicator<?php if (!isset($mandatoryFields["item_author"])) echo ' hidden'; ?>">*</span>Author:</div>
							<div class="field_input">
								<?php echo $html->input('EmailLibrarian2/item_author', array("size"=>"45","maxlength"=>"50","title"=>"Item Author")); ?>
							</div>
						</div>
						<div id="field_item_publisher" class="field<?php if (@$this->data["EmailLibrarian2"]["purpose"] != 'purchase') echo ' hidden'; ?>">
							<div class="field_label"><span id="mandatory_indicator_item_publisher" class="mandatory_indicator<?php if (!isset($mandatoryFields["item_publisher"])) echo ' hidden'; ?>">*</span>Publisher:</div>
							<div class="field_input">
								<?php echo $html->input('EmailLibrarian2/item_publisher', array("size"=>"30","maxlength"=>"30","title"=>"Item Publisher")); ?>
							</div>
						</div>
						<div id="field_item_date" class="field<?php if (@$this->data["EmailLibrarian2"]["purpose"] != 'purchase') echo ' hidden'; ?>">
							<div class="field_label"><span id="mandatory_indicator_item_date" class="mandatory_indicator<?php if (!isset($mandatoryFields["item_date"])) echo ' hidden'; ?>">*</span>Publication Date:</div>
							<div class="field_input">
								<?php echo $html->input('EmailLibrarian2/item_date', array("size"=>"10","maxlength"=>"10","title"=>"Publication Date")); ?>
							</div>
						</div>
						<div id="field_item_isbn" class="field<?php if (@$this->data["EmailLibrarian2"]["purpose"] != 'purchase') echo ' hidden'; ?>">
							<div class="field_label"><span id="mandatory_indicator_item_isbn" class="mandatory_indicator<?php if (!isset($mandatoryFields["item_isbn"])) echo ' hidden'; ?>">*</span>ISBN:</div>
							<div class="field_input">
								<?php echo $html->input('EmailLibrarian2/item_isbn', array("size"=>"13","maxlength"=>"13","title"=>"ISBN")); ?>
							</div>
						</div>
						<div id="field_item_info" class="field<?php if (@$this->data["EmailLibrarian2"]["purpose"] != 'purchase') echo ' hidden'; ?>">
							<div class="field_label"><span id="mandatory_indicator_item_info" class="mandatory_indicator<?php if (!isset($mandatoryFields["item_info"])) echo ' hidden'; ?>">*</span>Additional information:</div>
							<div class="field_input">
								<?php echo $html->textarea('EmailLibrarian2/item_info', array('id'=>'item_info','cols'=>'47','rows'=>'10','class'=>'input_box','tabindex'=>'1','title'=>'Additional information')); ?>
							</div>
							<?php echo $html->tagErrorMsg('EmailLibrarian2/item_info','Please provide title, author, ISBN or additional information.'); ?>
						</div>
					</fieldset>
				</div>	
				
				<input type="hidden" name="data[EmailLibrarian2][step]" value="<?php echo $this->data["EmailLibrarian2"]["step"]; ?>" />
				<input id="step" type="hidden" name="step" value="<?php echo $this->data["EmailLibrarian2"]["step"]; ?>" />
				<?php echo $html->submit("Continue", array("class"=>"submit_button")); ?>
			</div>
			<div id="librarian_inquiry_spacer"></div>

		</form>
	</div>
	<div class="closing"></div>
</div>
