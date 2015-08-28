<?php 
$this->Html->addCrumb("Home" , "/");
$this->Html->addCrumb("Contact" , "/contact");
$this->Html->addCrumb("Vaughan Public Libraries' Administration" , "/contact/administration");
?>



<div id="page_header" width="100%">
	<div class="opening"></div>
	<div class="details">
		<h1>Email Vaughan Public Libraries' Administration</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		

		<div class="intro">
			To contact Vaughan Public Libraries' administration, please use the form below.
		</div>
		
		<div class="entry">
			Remember, if you have a reference question or want more information about your local branch, please use our <?php echo $this->Html->link("Email Librarian","/email_librarian"); ?> form.
			Please note that entries indicated with asterisk (*) are required.
		</div>



		<?php echo $this->Form->create('AdministrationInquiry', array('action'=>'add')); ?>
			<div class="whole_width">
				<?php if ($errors) { ?>
					<div class="important_note">
						<?php echo $this->Html->image("error_indicator_general.gif", array("align"=>"left")); ?>
						Your inquiry could not be submitted due to errors in your input. Please correct the errors indicated below and send again.
					</div>
				<?php } ?>


				<fieldset><legend>Your Information</legend>
					<div class="field">
						
							<?php echo $this->Form->input('AdministrationInquiry.first_name', array('label' => 'First Name: ','between'=>'<div class=field_input>', 'size'=>'20','maxlength'=>'20', 'after'=>'</div>')); ?>
						
					</div>
					<div class="field">
						
						
							<?php echo $this->Form->input('AdministrationInquiry.last_name', array('label' => 'Last Name: ','between'=>'<div class=field_input>', "size"=>"45","maxlength"=>"45", 'after'=>'</div>')); ?>
						
					</div>
					<div class="field">
						
						
							<?php echo $this->Form->input('AdministrationInquiry.telephone', array('label' => 'Telephone: ','between'=>'<div class=field_input>', "size"=>"15","maxlength"=>"20", 'after'=>'</div>')); ?>
						
						
					</div>
					<div class="field">
						
							<?php echo $this->Form->input('AdministrationInquiry.email', array('label' => '*Email Address: ', 'between'=>'<div class=field_input>', 'size'=>'48','maxlength'=>'70', 'after'=>'</div>')); ?>
						
						
					</div>
					<div class="field">
						
							<?php 
							echo $this->Form->input('AdministrationInquiry.library', array('label' => '*Local Library: ','between'=>'<div class=field_input>', 'options' =>$libraries ,'empty' => '(choose one)', 'after'=>'</div>'));

							?>
						
						
					</div>
					<div class="field">
						
						
							<?php echo $this->Form->input('AdministrationInquiry.question', array('label' => '*Your Question: ','between'=>'<div class=field_input>',  'type'=>'textarea', 'cols'=>'30','rows'=>'10', 'after'=>'</div>')); ?>
						
						
					</div>
				</fieldset>

				<?php echo $this->Form->submit("Continue", array("class"=>"submit_button")); ?>
			</div>
			<div id="elibrarian_inquiry_spacer"></div>
		<?php echo $this->Form->end(); ?>
	</div>
	<div class="closing"></div>
</div>
