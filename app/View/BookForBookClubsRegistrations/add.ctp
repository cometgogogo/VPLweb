<?php
$this->Html->addCrumb("Home" , "/");
$this->Html->addCrumb("Using the Library" , "/services");
$this->Html->addCrumb("Library Services" , "/library_services");
$this->Html->addCrumb("Book Clubs" , "/library_services#club");
?>
<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Book sets for Adult Book Clubs","url"=>"/books_for_book_clubs/index/adults"),array("Title"=>"Book sets for Teen Book Clubs","url"=>"/books_for_book_clubs/index/teens"),array("Title"=>"Book sets for Kids' Book Clubs","url"=>"/books_for_book_clubs/index/kids"),array("Title"=>"Book sets for ESL Book Clubs","url"=>"/books_for_book_clubs/index/esl")))));
	$this->set('relatedContentElements', $relatedContentElements);
?>


<div id="page_header" width="100%">
	<div class="opening"></div>
	<div class="details">
		<h1>Book Clubs Registration Form</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">


		<div class="intro">
			Children and Teen Book Clubs must have an adult register on their behalf.
			This adult will then serve as the contact person for the Book Club.
		</div>

		<div class="entry">
			Please note that entries indicated with asterisk (*) are required.
		</div>



		<?php echo $this->Form->create('BookForBookClubRegistrations', array('action'=>'add')); ?>
		
			<div class="whole_width">
				<?php if ($errors) { ?>
					<div class="important_note">
						<?php echo $this->Html->image("error_indicator_general.gif", array("align"=>"left")); ?>
						Your registration could not be submitted due to errors in your input. Please correct the errors indicated below and send again.
					</div>
					<br />
				<?php } ?>


				<fieldset>
				
				<legend>Registration Form</legend>
					<div class="field">
						<?php echo $this->Form->input('BookForBookClubsRegistration.club_name', array('label' => '*Name of Your Book Club: ','between'=>'<div class=field_input>', 'size'=>'45','maxlength'=>'45', 'after'=>'</div>')); ?>						
						
						
					</div>
					<div class="field">
						<?php
						echo $this->Form->label('BookForBookClubsRegistration.type', '*Type of Book Club');
						echo $this->Form->input('BookForBookClubsRegistration.type', array('div'=>'field_input_radio','type'=>'radio', 'options'=>$types, 'legend' => false));	
						?>	
					</div>
					
					<div class="field">
						<?php echo $this->Form->input('BookForBookClubsRegistration.first_name', array('label' => '*First Name: ','between'=>'<div class=field_input>', 'size'=>'30','maxlength'=>'30', 'after'=>'</div>')); ?>					
					</div>
					
					<div class="field">
						<?php echo $this->Form->input('BookForBookClubsRegistration.last_name', array('label' => '*Last Name: ','between'=>'<div class=field_input>', 'size'=>'30','maxlength'=>'30', 'after'=>'</div>')); ?>							
					</div>
					
					<div id="field_age" class="field">
						<?php
						echo $this->Form->label('BookForBookClubsRegistration.age', '*Age category:');
						echo $this->Form->input('BookForBookClubsRegistration.age', array('div'=>'field_input_radio','type'=>'radio', 'options'=>$ages, 'legend' => false)); 
						?>	
					</div>
					
					<div class="field">
						<?php 
						echo $this->Form->input('BookForBookClubsRegistration.library', array('label' => '*Pick-up Library: ','between'=>'<div class=field_input>', 'options' =>$libraries ,'empty' => '(choose one)', 'after'=>'</div>'));						
						?>						
					</div>
					
					<div class="field">
						<?php echo $this->Form->input('BookForBookClubsRegistration.email', array('label' => '*Email: ', 'between'=>'<div class=field_input>', 'size'=>'35','maxlength'=>'70', 'after'=>'</div>')); ?>
					</div>
					
					<div class="field">
						<?php echo $this->Form->input('BookForBookClubsRegistration.telephone', array('label' => '*Telephone: ','between'=>'<div class=field_input>', "size"=>"15","maxlength"=>"20", 'after'=>'</div>')); ?>
					</div>
					
					<div class="field">
						<?php echo $this->Form->input('BookForBookClubsRegistration.card', array('label' => '*Library Card Number: ','between'=>'<div class=field_input>', "size"=>"14","maxlength"=>"14", 'after'=>'</div>')); ?>						
					</div>
				</fieldset>

				<div class="entry">I understand that VPL staff may send me a follow-up email notifying me when the books are ready for pick-up, if there are any problems with my selection of titles, or to get clarification of my personal information.

				</div>

				<?php echo $this->Form->submit("Continue", array("class"=>"submit_button")); ?>
			</div>
			<div id="book_for_book_clubs_registration_spacer"></div>
		</form>
	</div>
	<div class="closing"></div>
</div>
