<?php $this->Html->addCrumb("Home","/"); ?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Library Notifications","url"=>"/library_notification_requests"),array("Title"=>"Renewing Your Loans","url"=>"/services/renew")))));
$this->pageTitle = "Contact";


	$this->set('relatedContentElements', $relatedContentElements);
?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Contact</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="intro">
			Call 905-653-READ (7323) for help or find a list of contact pages below.
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Email Librarian", "/email_librarian"); ?></div>
			Direct your questions and inquiries to Vaughan Public Libraries,&nbsp;...
			<?php echo $this->Html->link("more", "/email_librarian"); ?>
		</div>
		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Contact Your Local Branch", "/libraries"); ?></div>
			Find contact information for all VPL branches&nbsp;...<?php echo $this->Html->link("more", "/libraries"); ?>
		</div>
<!--
		<div class="directory_entry">
			<div class="name"><?php //echo $this->Html->link("Contact ELibrarian", "/elibrarian_inquiries"); ?></div>
			Found a broken link? Having problems using this site? The ELibrarian can answer your technical inquiries about this site,&nbsp;...
			<?php //echo $this->Html->link("more", "/elibrarian_inquiries"); ?>
		</div>
-->

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Feedback & Suggestions", "/contact/suggestions"); ?></div>
			 <?php echo $this->Html->link("Recommend an item", "/email_librarian/add/purchase"); ?> to add to VPL collection, or <?php echo $this->Html->link("contact VPL Administration", "/contact/administration"); ?> if you have a suggestion or comment to improve library services.

		</div>



		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Accessibility Customer Feedback Form", "/files/accessibility.pdf"); ?></div>
			Please use this form to provide your feedback on Accessibility for Ontarians with Disabilities,&nbsp;...
			<?php echo $this->Html->link("more", "/files/accessibility.pdf"); ?>
		</div>


	</div>
	<div class="closing"></div>
</div>