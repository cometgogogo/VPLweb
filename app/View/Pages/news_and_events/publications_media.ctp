<?php include("crumbs.ctp"); ?>

<?php
	$relatedContentElements = array	(array ('calendar', array("targetDate"=>date("Y-m-d"))));
	$relatedContentElements[] = array ('image', array("image"=>array("source"=>"/img/makerkit_sidebar.jpg","width"=>"200", "height"=>"257", "title"=>"Maker Kits", "link"=>"/services/maker_kit", "target"=>"self")));
	$relatedContentElements[] = array ('atl_download');
	$relatedContentElements[1] = array ('tweets');
	$this->set('relatedContentElements', $relatedContentElements);
?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Publications & Media Room</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
	<div style="display: none !important;"><h2>Publications & Media Room</h2></div>


		<div class="publication_entry">
			<div class="name"><?php echo $this->Html->link("News Releases", "/news_and_events/press_releases"); ?></div>
			<a href="/news_and_events/press_releases" title="News Releases"><img src="/img/news_release.jpg" alt="News Releases" /></a>
		</div>


		<div class="publication_entry">
			<div class="name"><?php echo $this->Html->link("Library Program Guide", "/news_and_events/atl_guide"); ?></div>
			<a href="http://issuu.com/vaughan-public-libraries/docs/what_s_on_march_aprl_may_2015?e=1804257/11552402" title="Library Program Guide" rel="external"><img src="/img/ATL_cover.jpg" alt="Library Program Guide" /></a>
		</div>

		<div class="publication_entry">
			<div class="name"><?php echo $this->Html->link("Strategic Plan", "http://static.issuu.com/webembed/viewers/style1/v1/IssuuViewer.swf?mode=embed&amp;layout=http%3A%2F%2Fskin.issuu.com%2Fv%2Flight%2Flayout.xml&amp;showFlipBtn=true&amp;documentId=120105144027-24920a90dce54fa19267ceb6d100fa9d&amp;docName=strategic_plan&amp;username=vaughan-public-libraries&amp;loadingInfoText=Strategic%20Plan%202012-2015&amp;et=1325774670230&amp;er=50", array("rel"=>"external")); ?></div>
			<a href="http://static.issuu.com/webembed/viewers/style1/v1/IssuuViewer.swf?mode=embed&amp;layout=http%3A%2F%2Fskin.issuu.com%2Fv%2Flight%2Flayout.xml&amp;showFlipBtn=true&amp;documentId=120105144027-24920a90dce54fa19267ceb6d100fa9d&amp;docName=strategic_plan&amp;username=vaughan-public-libraries&amp;loadingInfoText=Strategic%20Plan%202012-2015&amp;et=1325774670230&amp;er=50" title="Strageic Plan" rel="external"><img src="/img/strategic_plan_cover.jpg" alt="Strageic Plan" /></a>
		</div>
		<div class="publication_entry">
			<div class="name"><?php echo $this->Html->link("So Much to Smile About", "http://issuu.com/vaughan-public-libraries/docs/somuchtosmileabout", array("rel"=>"external")); ?></div>
			<a href="http://issuu.com/vaughan-public-libraries/docs/final_document?e=1804257/8792992"><img src="/img/soMuchtoSmile.jpg" alt="So Much to Smile About" /></a>
		</div>

		<!-- div class="publication_entry">
			<div class="name"><?php echo $this->Html->link("Early Harvest 2014", "http://issuu.com/vaughan-public-libraries/docs/early_harvest_2014_accessible?e=1804257/9906198", array("rel"=>"external")); ?></div>
			<a href="http://issuu.com/vaughan-public-libraries/docs/early_harvest_2014_accessible?e=1804257/9906198" title="Early Harvest 2014" rel="external"><img src="/img/EH2014_cover.jpg" alt="Early Harvest" /></a>
		</div -->


	</div>
	<div class="closing"></div>

</div>

