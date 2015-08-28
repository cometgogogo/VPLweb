<?php $this->Html->addCrumb("Home","/"); ?>
<?php
		// Decide which elements to display and pass them to the view
		$relatedContentElements = array	();
		$relatedContentElements[] = array ('excerpt', array("excerpt"=>"<strong>VPL's Vision Statement:</strong><br/>Enrich&nbsp;&nbsp;&nbsp;Inspire&nbsp;&nbsp;&nbsp;Transform<strong><br/><br/>VPL's Mission:</strong><br/>Vaughan Public Libraries offer welcoming destinations that educate, excite and empower our community."));


		$this->set('relatedContentElements', $relatedContentElements);
		$this->pageTitle = "About";
?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>About Vaughan Public Libraries</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="intro">
<!--<span style="display: none !important;"><h2>About Vaughan Public Libraries</h2></span>-->
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Locations and Hours", "/libraries"); ?></div>
			<?php echo $this->Html->link("Ansley Grove Library", "/libraries/view/1"); ?>,&nbsp;
			<?php echo $this->Html->link("Bathurst Clark Resource Library", "/libraries/view/2"); ?>,&nbsp;
			<?php echo $this->Html->link("Dufferin Clark Library", "/libraries/view/3"); ?>,&nbsp;
			<?php echo $this->Html->link("Kleinburg Library", "/libraries/view/5"); ?>,&nbsp;
			<?php echo $this->Html->link("Maple Library", "/libraries/view/6"); ?>,&nbsp;
			<?php echo $this->Html->link("Pierre Berton Resource Library", "/libraries/view/7"); ?>,&nbsp;
			<?php echo $this->Html->link("Pleasant Ridge Library", "/libraries/view/10"); ?>,&nbsp;
			<?php echo $this->Html->link("Woodbridge Library", "/libraries/view/8"); ?>,&nbsp;
			<?php echo $this->Html->link("Map", "/libraries/map"); ?>

		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Vaughan Public Library Board", "/about/board"); ?></div>
			Current Board members, how to contact the Board, and minutes of previous meetings.
		</div>
		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Employment Opportunities", "/jobs"); ?></div>
			Find out current job openings at Vaughan Public Libraries.

		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Volunteer Opportunities", "/volunteers"); ?></div>
			Check out upcoming volunteer programs.

		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Strategic Plan & Annual Reports", "/about/strategic_plan"); ?></div>
			Check out the Library Board's strategic plan for delivering library services, and discover the Libraries' progress in achieving the vision.

		</div>


		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Policies", "/about/policies"); ?></div>
			<div class="summary">
				<?php echo $this->Html->link("Board By-Law", "/files/services/BoardBylaw.pdf", array("rel"=>"external")); ?>,&nbsp;
				<?php echo $this->Html->link("Collection Development Policy", "/files/services/CollectionDevelopmentPolicy.pdf", array("rel"=>"external")); ?>,&nbsp;
				<?php echo $this->Html->link("Copyright Policy", "/about/copyright_policy"); ?>,&nbsp;
				<?php echo $this->Html->link("Internet Policy", "/about/internet_policy"); ?>,&nbsp;
				<?php echo $this->Html->link("Operational Policy", "/files/services/OperationalPolicy.pdf", array("rel"=>"external")); ?>,&nbsp;
				<?php echo $this->Html->link("Privacy Statement", "/about/website_privacy"); ?>,&nbsp;
				<?php echo $this->Html->link("Rules of Conduct", "/files/services/RulesOfConduct.pdf", array("rel"=>"external")); ?>
			</div>

		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Accessibility Information", "/about/accessibility"); ?></div>
			We are committed to meeting the needs of people with disabilities by preventing and removing barriers to accessibility...


		</div>


		&nbsp;

	</div>
	<div class="closing"></div>




</div>