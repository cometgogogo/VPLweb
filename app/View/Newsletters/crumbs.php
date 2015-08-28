<?php
$html->addCrumb("Home" , "/");
$html->addCrumb("What's On" , "/news_and_events");
$html->addCrumb("Newsletters" , "/newsletters");

//$relatedContentElements[] = array ('image', array("image"=>array("source"=>"/img/NL_books.gif","width"=>"150", "height"=>"100", "link"=>"/newsletters", "title"=>"eNewsletter Archives")));

//$relatedContentElements = array	(array ('social_media'), array ('related_pages', array("pages"=>array(array("Title"=>"Subscribe to eNewsletter","url"=>"/newsletters/subscribe"), array("Title"=>"eNewsletter Archives","url"=>"/newsletters/archive"), array("Title"=>"News Releases","url"=>"/news_and_events/press_releases")))), array ('image', array("image"=>array("source"=>"/img/NL_books.gif","width"=>"150", "height"=>"135", "link"=>"/newsletters/subscribe", "title"=>"Subscribe to VPL's eNewsletter"))));

//$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Subscribe to eNewsletter","url"=>"/newsletters/subscribe"), array("Title"=>"eNewsletter Archives","url"=>"/newsletters/archive"), array("Title"=>"Publications & Media Room","url"=>"/news_and_events/press_releases")))), array ('image', array("image"=>array("source"=>"/img/NL_books.gif","width"=>"150", "height"=>"135", "link"=>"/newsletters/subscribe", "title"=>"Subscribe to VPL's eNewsletter"))));

$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Subscribe to eNewsletter","url"=>"/newsletters/subscribe"), array("Title"=>"eNewsletter Archives","url"=>"/newsletters/recent"), array("Title"=>"Programs & Events","url"=>"/programs"), array("Title"=>"Publications & Media Room","url"=>"/news_and_events/press_releases")))));

$relatedContentElements[1] = array ('tweets');

$this->controller->set('relatedContentElements', $relatedContentElements);
?>