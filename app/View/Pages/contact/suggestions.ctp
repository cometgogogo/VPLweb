<?php include("crumbs.ctp"); ?>
<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Library Notifications","url"=>"/library_notification_requests"),array("Title"=>"Renewing Your Loans","url"=>"/services/renew")))));



	$this->set('relatedContentElements', $relatedContentElements);
?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Feedback & Suggestions</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Suggest an Item for Purchase", "/email_librarian/add/purchase"); ?></div>
			Do you want to recommend an item to add to VPL collection? Please email VPL using this form,&nbsp;...
			<?php echo $this->Html->link("more", "/email_librarian/add/purchase"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Contact VPL Administration", "/contact/administration"); ?></div>
			If you have a suggestion or comment to improve library services or have any questions for the Vaughan Public Libraries,&nbsp;...
			<?php echo $this->Html->link("more", "/contact/administration"); ?>
		</div>


	</div>
	<div class="closing"></div>
</div>