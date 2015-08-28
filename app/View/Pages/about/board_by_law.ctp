<?php
include("crumbs.ctp");
$this->Html->addCrumb("Policies" , "/about/policies");
?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(
	array("Title"=>"Collection Development Policy","url"=>"/files/services/CollectionDevelopmentPolicy.pdf", "rel"=>"external"),array("Title"=>"Copyright Policy","url"=>"/about/copyright_policy"),														array("Title"=>"Internet Policy","url"=>"/about/internet_policy"),
	array("Title"=>"Operational Policy","url"=>"/files/services/OperationalPolicy.pdf", "rel"=>"external"),array("Title"=>"Privacy Statement","url"=>"/about/website_privacy"),
	array("Title"=>"Rules of Conduct","url"=>"/files/services/RulesOfConduct.pdf", "rel"=>"external")))));
	$this->set('relatedContentElements', $relatedContentElements);
?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Vaughan Public Library Board By-Law</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
	
		<div class="intro">
		A By-Law to govern the proceedings of the Board and its Committees.
		</div>
		<div class="entry">
		
			<?php echo $this->Html->image("/icon-pdf.gif", array("alt"=>"PDF"));?>
			<?php echo $this->Html->link("Vaughan Public Library Board By-Law ", "/files/services/BoardBylaw.pdf", array("rel"=>"external")); ?> (86 KB)<br />
			
			<div class="section_end">&nbsp;</div>
		  
		   <?php echo $this->renderElement('adobe_download'); ?>
		</div>
		&nbsp;
	</div>
	<div class="closing"></div>




</div>