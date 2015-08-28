<?php
$html->addCrumb("Home" , "/");
$html->addCrumb("Using the Library" , "/services");
$html->addCrumb("Library Services" , "/library_services");
$html->addCrumb("Book Clubs" , "/library_services#club");
?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(
																				array("Title"=>"Book Club Registration form","url"=>"/book_for_book_club_registrations/add")
																				))));
	$this->controller->set('relatedContentElements', $relatedContentElements);
	
	$this->pageTitle="Book for Book Club Reservation - ". $book["BookForBookClubs"]["Title"];;
?>

<div id="page_header" width="100%">
	<div class="opening"></div>
	<div class="details">
		<h1>Reserve a Book for Book Club</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">


		<div class="intro">
			If you would like to borrow books for your book club please complete this form.
			Note: Your Book Club must be registered with VPL . All fields are required.
		</div>



		<?php echo $html->formTag('/book_for_book_club_reservations/add/' . $book["BookForBookClubs"]["BookID"]); ?>
			<div class="whole_width">
				<?php if ($errors) { ?>
					<div class="important_note">
						<?php echo $html->image("error_indicator_general.gif", array("align"=>"left")); ?>
						Your reservation could not be submitted due to errors in your input. Please correct the errors indicated below and send again.
					</div>
				<?php } ?>


				<fieldset><legend>Your Information</legend>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="BookForBookClubsReservationClubName">Name of Your Book Club</label>:</div>
						<div class="field_input">
							<?php echo $html->input('BookForBookClubsReservation/club_name', array("size"=>"45","maxlength"=>"45")); ?>
						</div>
						<?php echo $html->tagErrorMsg('BookForBookClubsReservation/club_name','Please enter the Name of your Book Club.'); ?>
					</div>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="BookForBookClubsReservationFirstName">First Name</label>:</div>
						<div class="field_input">
							<?php echo $html->input('BookForBookClubsReservation/first_name', array("size"=>"20","maxlength"=>"20")); ?>
						</div>
						<?php echo $html->tagErrorMsg('BookForBookClubsReservation/first_name','Please enter your first name.'); ?>
					</div>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="BookForBookClubsReservationLastName">Last name</label>:</div>
						<div class="field_input">
							<?php echo $html->input('BookForBookClubsReservation/last_name', array("size"=>"45","maxlength"=>"45")); ?>
						</div>
						<?php echo $html->tagErrorMsg('BookForBookClubsReservation/last_name','Please enter your last name.'); ?>
					</div>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="BookForBookClubsReservationLibrary">Local Library</label>:</div>
						<div class="field_input">
							<?php echo $html->selectTag('BookForBookClubsReservation/library', $libraries,@$this->data["BookForBookClubReservation"]["library"],null,null,false); ?>
						</div>
						<?php echo $html->tagErrorMsg('BookForBookClubsReservation/library','Please select your local Library.'); ?>
					</div>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="BookForBookClubsReservationEmail">Email Address</label>:</div>
						<div class="field_input">
							<?php echo $html->input('BookForBookClubsReservation/email', array("size"=>"48","maxlength"=>"70")); ?>
						</div>
						<?php echo $html->tagErrorMsg('BookForBookClubsReservation/email','Please enter your Email Address. It must be a valid email address (example: johnd@somewhere.com)'); ?>
					</div>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="BookForBookClubsReservationTelephone">Telephone</label>:</div>
						<div class="field_input">
							<?php echo $html->input('BookForBookClubsReservation/telephone', array("size"=>"15","maxlength"=>"20")); ?>
						</div>
						<?php echo $html->tagErrorMsg('BookForBookClubsReservation/telephone','Please enter a valid telephone number with area code.'); ?>
					</div>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="BookForBookClubsReservationCard">Library Card Number</label>:</div>
						<div class="field_input">
							<?php echo $html->input('BookForBookClubsReservation/card', array("size"=>"14","maxlength"=>"14")); ?>
						</div>
						<?php echo $html->tagErrorMsg('BookForBookClubsReservation/card','Please enter your Library Card number.'); ?>
					</div>
				</fieldset>
				<fieldset><legend>Book</legend>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span>Book:</div>
						<div class="field_input">
							<?php echo $book["BookForBookClubs"]["Title"]; ?><br />
							by&nbsp;<?php echo $book["BookForBookClubs"]["Author"]; ?>
						</div>
					</div>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="BookForBookClubsReservationCopies">Copies Required</label>:</div>
						<div class="field_input">
							<?php echo $html->input('BookForBookClubsReservation/copies', array("size"=>"15","maxlength"=>"20")); ?>
							(max. <?php echo $book["BookForBookClubs"]["NumCopies"]; ?> available)
						</div>
						<?php echo $html->tagErrorMsg('BookForBookClubsReservation/copies','Please enter the number of copies you need.'); ?>
						<?php echo $html->tagErrorMsg('BookForBookClubsReservation/copies_number','Please enter only a numeric value.'); ?>
						<?php echo $html->tagErrorMsg('BookForBookClubsReservation/copies_max','Maximum number of copies available exceeded.'); ?>
					</div>
				</fieldset>
				<fieldset><legend>Date Needed</legend>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="BookForBookClubsReservationFirstChoiceMonth">First Choice</label>:</div>
						<div class="field_input">
							<?php echo $html->selectTag('BookForBookClubsReservation/first_choice_month', $months, @$this->data["BookForBookClubReservation"]["first_choice_month"], null, null, false); ?>
							<label for="BookForBookClubsReservationFirstChoiceDay"><span style="display: none !important;">Day</span></label>
							<?php echo $html->selectTag('BookForBookClubsReservation/first_choice_day', $days, @$this->data["BookForBookClubReservation"]["first_choice_day"], null, null, false); ?>
							<label for="BookForBookClubsReservationFirstChoiceYear"><span style="display: none !important;">Year</span></label>
							<?php echo $html->selectTag('BookForBookClubsReservation/first_choice_year', $years, @$this->data["BookForBookClubReservation"]["first_choice_year"], null, null, false); ?>
						</div>
						<?php echo $html->tagErrorMsg('BookForBookClubsReservation/first_choice_date','Please enter a valid date as your first choice.'); ?>
						<?php echo $html->tagErrorMsg('BookForBookClubsReservation/first_choice_date_past','This date must be in the future.'); ?>
					</div>
					<div class="field">
						<div class="field_label"><span class="mandatory_indicator">*</span><label for="BookForBookClubsReservationSecondChoiceMonth">Second Choice</label>:</div>
						<div class="field_input">
							<?php echo $html->selectTag('BookForBookClubsReservation/second_choice_month', $months, @$this->data["BookForBookClubReservation"]["second_choice_month"], null, null, false); ?>
							<label for="BookForBookClubsReservationSecondChoiceDay"><span style="display: none !important;">Year</span></label>
							<?php echo $html->selectTag('BookForBookClubsReservation/second_choice_day', $days, @$this->data["BookForBookClubReservation"]["second_choice_day"], null, null, false); ?>
							<label for="BookForBookClubsReservationSecondChoiceYear"><span style="display: none !important;">Year</span></label>
							<?php echo $html->selectTag('BookForBookClubsReservation/second_choice_year', $years, @$this->data["BookForBookClubReservation"]["second_choice_year"], null, null, false); ?>
						</div>
						<?php echo $html->tagErrorMsg('BookForBookClubsReservation/second_choice_date','Please enter a valid date as your second choice.'); ?>
						<?php echo $html->tagErrorMsg('BookForBookClubsReservation/second_choice_date_past','This date must be in the future.'); ?>
					</div>
				</fieldset>

				<div class="entry">I understand that VPL staff may send me a follow-up email notifying me when the books are ready for pick-up, if there are any problems with my selection of titles, or to get clarification of my personal information.

				</div>

				<?php echo $html->submit("Continue", array("class"=>"submit_button")); ?>
			</div>
			<div id="book_for_book_clubs_reservation_spacer"></div>
		</form>
	</div>
	<div class="closing"></div>
</div>
