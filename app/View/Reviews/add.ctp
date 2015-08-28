<?php 
$html->addCrumb("Home" , "/");
$html->addCrumb("Participate and Contribute" , "/participate");
$html->addCrumb("Opinions and Suggestions" , "/participate/opinions");
?>

<div id="page_header" width="100%">
	<div class="opening"></div>
	<div class="details">
		<h1>Submit a review</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<div class="intro">
			Please note that entries indicated with asterisk (*) are required.
		</div>
	
		<?php echo $html->formTag('/reviews/add/' . $html->tagValue('Review/id')); ?>
			<div class="whole_width">
				<?php if ($errors) { ?>
					<div class="important_note">
						<?php echo $html->image("error_indicator_general.gif", array("align"=>"left")); ?>
						Your inquiry could not be submitted due to errors in your input. Please correct the errors indicated below and send again.
					</div>
				<?php } ?>


				<fieldset><legend>About the Book</legend>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span>Book Title:</div>
						<div class="field_input">
							<?php echo $html->input('Review/title', array("size"=>"40","maxlength"=>"80")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Review/title','Please enter the title of the book.'); ?>
					</div>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span>Author:</div>
						<div class="field_input">
							<?php echo $html->input('Review/author', array("size"=>"40","maxlength"=>"80")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Review/author','Please enter the name of the author.'); ?>
						<?php echo $html->tagErrorMsg('Review/book_found','The title and author are not found in the catalogue. Please check them for spelling errors.') ?>
						<?php echo $html->tagErrorMsg('Review/catalogue_connection','The online catalogue is not available at this time; we cannot validate your book and author. Please try again at a later time.') ?>
					</div>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span>Your Review:</div>
						<div class="field_input">
							<?php echo $html->textarea('Review/review', array('id'=>'question','cols'=>'47','rows'=>'10','class'=>'input_box','tabindex'=>'1')); ?>
						</div>
						<?php echo $html->tagErrorMsg('Review/review','Please enter your review.'); ?>
					</div>
				</fieldset>
				<fieldset><legend>About You</legend>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span>First Name:</div>
						<div class="field_input">
							<?php echo $html->input('Review/first_name', array("size"=>"20","maxlength"=>"20")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Review/first_name','Please enter your first name.'); ?>
					</div>
					<div class="field">
						<div class="field_label">Last name:</div>
						<div class="field_input">
							<?php echo $html->input('Review/last_name', array("size"=>"45","maxlength"=>"45")); ?>
						</div>
						<?php echo $html->tagErrorMsg('Review/last_name','Please enter your last name.'); ?>
					</div>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span>Local Library:</div>
						<div class="field_input">
							<?php echo $html->selectTag('Review/BranchID', $libraries,@$this->data["BookForBookClubReservation"]["BranchID"],null,null,false); ?>
						</div>
						<?php echo $html->tagErrorMsg('Review/BranchID','Please select your local Library.'); ?>
					</div>
				</fieldset>
		
				<?php echo $html->submit("Submit Review", array("class"=>"submit_button")); ?>
			</div>
			<div id="review_spacer"></div>
		</form>
	</div>
	<div class="closing"></div>
</div>
