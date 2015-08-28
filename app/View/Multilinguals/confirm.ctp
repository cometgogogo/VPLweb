<?php 
$html->addCrumb("Home" , "/");
$html->addCrumb("Services, Policies and Membership" , "/services"); 
$html->addCrumb("Services for Newcomers" , "/services/new_comer");
?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Email Librarian","url"=>"../email_librarian"), array("Title"=>"ESL Collection","url"=>"/collections/esl")))));
	$this->controller->set('relatedContentElements', $relatedContentElements);

?>


<div id="page_header" width="100%">
	<div class="opening"></div>
	<div class="details">
		<h1>Multilingual Services</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
	<h3>Beyond the Basics: Computer Tutor</h3>
		Your request has been sucessfully submitted. Thank you for using VPL's Multilingual Services Request Form. A librarian will follow up with you.
	</div>
	<div class="closing"></div>
</div>
