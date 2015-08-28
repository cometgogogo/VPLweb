<?php include("crumbs.ctp"); ?>

<?php
	$relatedContentElements = array	(array ('calendar', array("targetDate"=>date("Y-m-d"))));
	$relatedContentElements[] = array ('image', array("image"=>array("source"=>"/img/makerkit_sidebar.jpg","width"=>"200", "height"=>"257", "title"=>"Maker Kits", "link"=>"/services/maker_kit", "target"=>"self")));
	$relatedContentElements[] = array ('atl_download');
	$relatedContentElements[1] = array ('tweets');
	$this->set('relatedContentElements', $relatedContentElements);
	
	$this->pageTitle = "What's On";
?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>What's On</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

<div style="display: none !important;"><h2>What's On</h2></div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Programs & Events", "/programs"); ?></div>
			Search the programs and special events at the library. <?php //echo $this->Html->link("more", "/programs"); ?>
		</div>


		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Publications & Media Room", "/news_and_events/publications_media"); ?></div>
			Find out <?php echo $this->Html->link("news releases", "/news_and_events/press_releases"); ?> and <?php echo $this->Html->link("your library program guide,", "/news_and_events/atl_guide"); ?> and much more.<?php //echo $this->Html->link("more", "/news_and_events/publications_media"); ?>
		</div>


		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("eNewsletter - The Buzz", "/newsletters/subscribe"); ?></div>
			Sign up for VPL's eNewsletter: The Buzz! Get information about VPL's programs, services, announcements, and more delivered to your inbox. <?php //echo $this->Html->link("more", "/newsletters/subscribe"); ?>
		</div>

		<!-- div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Early Harvest", "/news_and_events/early_harvest"); ?></div>
			VPL encourages teen artists to express themselves, improve their literacy skills and connect with the community through the <?php echo $this->Html->link("Early Harvest Competition", "/news_and_events/early_harvest"); ?>.
		</div -->

	</div>
	<div class="closing"></div>

</div>

