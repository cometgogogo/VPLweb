<?php
$this->Html->addCrumb("Home","/");
$this->pageTitle = "Books & Resources";

?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Books & Resources</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<!--
		<div class="intro">
			Due to the system upgrading, the access to VPL's online catalgoue, databases, and telephone renewal system will be temporarily unavailable as of Monday, February 8. Thank you for your patience!.
		</div>
		-->

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Library Catalogue", "https://catalogue.vaughanpl.info/catalogue/"); ?></div>
			Browse for books, DVDs, music and eBooks in VPL's online catalogue.
			<?php //echo $this->Html->link("more", "https://catalogue.vaughanpl.info/catalogue/"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Downloads & Digital", "/materials/downloads_digital"); ?></div>
			Search and check out ebooks, eAudiobooks, eVideo, mobile apps, streaming movies, TumbleBook, etc. <?php //echo $this->Html->link("more", "/materials/downloads_digital"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Articles & Research", "/databases"); ?></div>
			Vaughan Public Libraries subscribe to a number of high-quality electronic databases.
			<?php //echo $this->Html->link("more", "/databases"); ?>
		</div>



		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("We Recommend", "/materials/recommended"); ?></div>
			Want to know what to read next? <?php echo $this->Html->link("Blog by librarians", "/leisure"); ?>,
			<?php echo $this->Html->link("New Arrivals", "/new_arrivals"); ?>,
			<?php echo $this->Html->link("Just Returned", "/just_returned"); ?>,
			<?php echo $this->Html->link("The Bookshelf@goodreads", "http://www.goodreads.com/review/list/2426602-vaughanpl"); ?>,
			<?php echo $this->Html->link("Award Winners", "/awards"); ?>,
			<?php echo $this->Html->link("Bestsellers", "/bestsellers"); ?>,
			<?php echo $this->Html->link("Your Next 5 Reads", "/next_reads"); ?>,
			<?php echo $this->Html->link("NextReads Newsletters", "/materials/next_reads"); ?>.
			<?php //echo $this->Html->link("more", "/materials/recommended"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("65+", "/sixtyfiveplus"); ?></div>
			Find information and resources for seniors.
			<?php //echo $this->Html->link("more", "/sixtyfiveplus"); ?>
		</div>
		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Newcomers", "/newcomers"); ?></div>
			Find information about government and community services for newcomers including ESL resources.
			<?php //echo $this->Html->link("more", "/newcomers"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Business Information", "/business"); ?></div>
			VPL offers great resources, programs and services to support the needs of our business community and those interested in business.

			<?php //echo $this->Html->link("more", "/business"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Career & Employment", "/career"); ?></div>
			Explore library collections and other resources regarding employment and career.

			<?php //echo $this->Html->link("more", "/career"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Health & Wellness", "/health"); ?></div>
			VPL offers great resources and collections on health and wellness topics.

			<?php //echo $this->Html->link("more", "/health"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Government & Community", "/government_community"); ?></div>
			Find out information about government and community services.

			<?php //echo $this->Html->link("more", "/government_community"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Local Studies", "/local_studies"); ?></div>
			Need information about genealogy or the history of Vaughan or York Region? Check out VPL's Local Studies Collection and other resources.

			<?php //echo $this->Html->link("more", "/local_studies"); ?>
		</div>


	</div>
	<div class="closing"></div>




</div>