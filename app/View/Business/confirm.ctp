<?php
$this->Html->addCrumb("Home" , "/");
$this->Html->addCrumb("Books & Resources" , "/materials");
$this->Html->addCrumb("Business Information" , "/business");
?>

<?php
$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Business Information","url"=>"/business"), array("Title"=>"Email Librarian","url"=>"/email_librarian")))));

$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header" width="100%">
	<div class="opening"></div>
	<div class="details">
		<h1>One-On-One Workshop</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
	<h3>One-On-One Workshop</h3>
		Your question has been sent. Thank you for your interest in the one-on-one Company and Industry Information workshops. A staff person will be in touch with you as soon as possible to finalize the appointment.
	</div>
	<div class="closing"></div>
</div>
