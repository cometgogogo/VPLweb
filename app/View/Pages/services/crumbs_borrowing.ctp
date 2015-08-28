<?php
$this->Html->addCrumb("Borrowing Materials" , "/services/borrowing");


$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Catalogue FAQs","url"=>"https://catalogue.vaughanpl.info/catalogue/wicket/resource/com.vtls.chamo.webapp.application.help.HelpFile/Faq.htm","rel"=>"external"),array("Title"=>"Libraries and Hours","url"=>"/libraries"),array("Title"=>"Library Notification","url"=>"/library_notification_requests"), array("Title"=>"Service Charges","url"=>"/services/service_charges"), array("Title"=>"How much money do you save using the library","url"=>"/about/calculator")))));

$this->set('relatedContentElements', $relatedContentElements);


?>