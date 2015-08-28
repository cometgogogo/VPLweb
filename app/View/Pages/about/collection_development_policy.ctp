<?php
include("crumbs.ctp");
$this->Html->addCrumb("Policies" , "/about/policies");
?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Accessibility Policy","url"=>"/files/services/AccessibilityPolicy.pdf", "rel"=>"external"), array("Title"=>"Board By-Law","url"=>"/files/services/BoardBylaw.pdf", "rel"=>"external"),array("Title"=>"Copyright Policy","url"=>"/files/services/CopyrightPolicy.pdf"),array("Title"=>"Internet Policy","url"=>"/about/internet_policy"),
	array("Title"=>"Operational Policy","url"=>"/files/services/OperationalPolicy.pdf", "rel"=>"external"),array("Title"=>"Privacy Statement","url"=>"/about/website_privacy"),array("Title"=>"Code of Conduct","url"=>"/files/services/CodeOfConduct.pdf", "rel"=>"external")))));
	$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Collection Development Policy</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		&nbsp;
		<div class="intro">
		Vaughan Public Libraries' Collection Development Policy outlines the principles which guide library staff in selecting resources for its collection. The Policy is also intended to familiarize library users with the philosophy on which selection decisions are made at Vaughan Public Libraries (VPL).
		</div>
		<div class="entry">

			<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
			<?php echo $this->Html->link("Collection Development Policy", "/files/services/CollectionDevelopmentPolicy.pdf", array("rel"=>"external")); ?> (546 KB)<br />
			<div class="section_end">&nbsp;</div>

			<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
			<?php echo $this->Html->link("Multilingual Collection Guidelines", "/files/services/MultilingualCollectionGuidelines.pdf", array("rel"=>"external")); ?> (27 KB)<br />
			<div class="section_end">&nbsp;</div>

		   <?php echo $this->element('adobe_download'); ?>
		</div>

		&nbsp;


	</div>
	<div class="closing"></div>




</div>