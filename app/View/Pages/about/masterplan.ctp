<?php include("crumbs.ctp"); ?>

<?php
	$relatedContentElements[] = array ('image', array("image"=>array("source"=>"/img/masterplan.gif","width"=>"110", "height"=>"142", "title"=>"Active Together Master Plan for Parks, Recreation, Culture and Libraries", "link"=>"/files/ActiveTogetherMasterPlan.pdf")));

	$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Active Together Master Plan</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<div class="intro">
			Active Together Master Plan for Parks, Recreation, Culture and Libraries is a guide planning for parks, recreation, culture and library facilities and services in the City of Vaughan.
		</div>
		<div class="entry">
			<p>

				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Active Together Master Plan for Parks, Recreation, Culture and Libraries", "/files/ActiveTogetherMasterPlan.pdf", array("rel"=>"external")); ?> (18.5 MB)
			
			</p>
			
			<?php echo $this->element('adobe_download'); ?>
			<div class="section_end">&nbsp;</div>
		</div>
		&nbsp;
	</div>
	<div class="closing"></div>
</div>