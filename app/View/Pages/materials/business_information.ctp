
<?php
   header( 'Location: http://www.vaughanpl.info/business' ) ;
?>

<?php
include("crumbs.ctp");

?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Business Information</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>

	<div class="details">


		<div class="intro">
			Vaughan Public Libraries offers great resources, programs and services to support the needs of our business community and those interested in business. The library's print and electronic resources include business directories, databases, periodicals, and books in various formats. Workshops, programs, and one-on-one assistance are also provided to assist those interested in learning more about a variety of business-related topics.
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Links", "/links/index/broad_subject/135"); ?></div>
			Links to high-quality, librarian-evaluated websites on Business topics.
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Databases", "/databases/index/collection/3"); ?></div>
			High-quality subscription databases providing information related to the Business collection.
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Programs", "/programs/index/collection/3"); ?></div>
			Find our business programs being offered near you.
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Meeting Room Rentals", "/services/special#s7"); ?></div>
			Need a space to hold a meeting? Perhaps one of our libraries can help.
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Business Collections", "/materials/business_directories"); ?></div>
			Check out <a href="/materials/business_magazines">Business magazines</a>, books and other materials VPL has on various <a href="/materials/business_directories">business related topics</a>. Subscribe to the RSS feed of <a href="/new_arrivals/view/31">New Business Arrivals</a>!
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Business Research Help", "/business_workshop"); ?></div>
			Need help locating Business resources? Try our <a href="/email_librarian">email reference service</a> or a <a href="/business_workshop">one-on-one workshop</a>.
		</div>


	</div>
	<div class="closing"></div>




</div>