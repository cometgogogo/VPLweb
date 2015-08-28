<?php
include("crumbs.ctp");
$this->Html->addCrumb("Policies" , "/about/policies");
?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Accessibility Policy","url"=>"/files/services/AccessibilityPolicy.pdf", "rel"=>"external"), array("Title"=>"Board By-Law","url"=>"/files/services/BoardBylaw.pdf", "rel"=>"external"), array("Title"=>"Collection Development Policy","url"=>"/files/services/CollectionDevelopmentPolicy.pdf", "rel"=>"external"),array("Title"=>"Copyright Policy","url"=>"/about/copyright_policy"),array("Title"=>"Internet Policy","url"=>"/about/internet_policy"),
	array("Title"=>"Privacy Statement","url"=>"/about/website_privacy"),
	array("Title"=>"Rules of Conduct","url"=>"/files/services/RulesOfConduct.pdf", "rel"=>"external")))));
	$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Operational Policy</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
	<div style="display: none !important;"><h2>Operational Policy</h2></div>
		<div class="entry">
		    <p>
			<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"pdf"));?>
			<?php echo $this->Html->link("Operational Policy and Regulations ", "/files/services/OperationalPolicy.pdf", array("rel"=>"external")); ?> (57 KB)<br />
			
		   </p><div class="section_end">&nbsp;</div>
		   <?php echo $this->element('adobe_download'); ?>
		</div>

		&nbsp;


	</div>
	<div class="closing"></div>




</div>