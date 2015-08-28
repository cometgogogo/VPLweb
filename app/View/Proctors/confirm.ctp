<?php
$html->addCrumb("Home" , "/");
$html->addCrumb("Using the Library" , "/services");
$html->addCrumb("Library Services" , "/library_services");
?>
<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(																							array("Title"=>"Email Librarian","url"=>"/email_librarian"),array("Title"=>"Locations & Hours","url"=>"/libraries")))));
	$this->controller->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header" width="100%">
	<div class="opening"></div>
	<div class="details">
		<h1>Exam Proctoring</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		Your request has been sucessfully submitted. Thank you for using VPL's Exam Proctoring Online Application Form. A librarian will follow up with you.
	</div>
	<div class="closing"></div>
</div>
