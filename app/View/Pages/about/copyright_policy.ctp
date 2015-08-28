<?php
include("crumbs.ctp");
$this->Html->addCrumb("Policies" , "/about/policies");
?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Accessibility Policy","url"=>"/files/services/AccessibilityPolicy.pdf", "rel"=>"external"), array("Title"=>"Board By-Law","url"=>"/files/services/BoardBylaw.pdf","rel"=>"external"),
	array("Title"=>"Collection Development Policy","url"=>"/files/services/CollectionDevelopmentPolicy.pdf", "rel"=>"external"),														array("Title"=>"Internet Policy","url"=>"/about/internet_policy"),
	array("Title"=>"Operational Policy","url"=>"/files/services/OperationalPolicy.pdf", "rel"=>"external"),array("Title"=>"Privacy Statement","url"=>"/about/website_privacy"),
	array("Title"=>"Rules of Conduct","url"=>"/files/services/RulesOfConduct.pdf", "rel"=>"external")))));
	$this->set('relatedContentElements', $relatedContentElements);
?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Copyright Policy</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">		
		<div class="intro">
		Vaughan Public Libraries respects copyright. Some of the material in the Libraries' collections is subject to copyright held by others. In such cases, there may be restrictions on reproduction.
		</div>
		<div class="entry">
		 
			<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
			<?php echo $this->Html->link("Copyright Policy", "/files/services/CopyrightPolicy.pdf", array("rel"=>"external")); ?> (36 KB)<br />
			<div class="section_end">&nbsp;</div>

			<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
			<?php echo $this->Html->link("Appendix A: Access Copyright Licence", "/files/services/AccessCopyrightLicenseExclusionsList.pdf", array("rel"=>"external")); ?> (1.01 MB)<br />
			<div class="section_end">&nbsp;</div>
		
		    <?php echo $this->element('adobe_download'); ?>
		</div>

		&nbsp;


	</div>
	<div class="closing"></div>




</div>