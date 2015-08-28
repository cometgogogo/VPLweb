<?php
include("crumbs.ctp");
$this->Html->addCrumb("Policies" , "/about/policies");
?>



<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Accessibility Policy","url"=>"/files/services/AccessibilityPolicy.pdf", "rel"=>"external"), array("Title"=>"Board By-Law","url"=>"/files/services/BoardBylaw.pdf", "rel"=>"external"),array("Title"=>"Collection Development Policy","url"=>"/files/services/CollectionDevelopmentPolicy.pdf", "rel"=>"external"),array("Title"=>"Copyright Policy","url"=>"/about/copyright_policy"),array("Title"=>"Internet Policy","url"=>"/about/internet_policy"),
	array("Title"=>"Operational Policy","url"=>"/files/services/OperationalPolicy.pdf", "rel"=>"external"),array("Title"=>"Privacy Statement","url"=>"/about/website_privacy")))));
	$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Rules of Conduct</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		
		<div class="intro">
		The Rules of Conduct have been adopted for the protection and safety of all those using Vaughan Public Libraries. Any violation of the Rules may result in suspension of privileges and/or expulsion from library premises.
		</div>
		<div class="entry">
		  
			<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
			<?php echo $this->Html->link("Rules of Conduct ", "/files/services/RulesOfConduct.pdf", array("rel"=>"external")); ?> (20 KB)<br />
			
		   <div class="section_end">&nbsp;</div>
		   <?php echo $this->element('adobe_download'); ?>
		</div>

		&nbsp;


	</div>
	<div class="closing"></div>




</div>