<?php include("crumbs.ctp"); ?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Catalogue FAQs","url"=>"http://catalogue.vaughanpl.info/catalogue/resources/help/Faq.htm","rel"=>"external"),array("Title"=>"Libraries and Hours","url"=>"/libraries"),array("Title"=>"Library Notification","url"=>"/library_notification_requests"), array("Title"=>"How much money do you save using the library","url"=>"/about/calculator")))));
	$this->set('relatedContentElements', $relatedContentElements);
?>



<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Borrowing Materials</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="intro">
			Members of Vaughan Public Libraries have access to books, films, and music  all free of charge.
			There's no cost to join, borrow materials, or get help from staff.
		</div>

		<div class="entry">
			<p>Up to 100 items can be borrowed at a time. VPL materials may be returned to any <?php echo $this->Html->link("VPL branch","/libraries"); ?> regardless of where they were borrowed. Each library has an after-hours book drop.
			</p>
			
			<p>
			Members of Vaughan Public Libraries also have access to ebooks, eAudiobooks and eVideo. <a href="/materials/downloads_digital">Check them out</a>!
			</p>
		</div>
		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Loan Periods", "/services/loan_periods"); ?></div>
			List of loan periods for different types of items.
			<?php //echo $this->Html->link("more information", "/services/loan_periods"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Renewing Your Loans", "/services/renew"); ?></div>
			Library materials can be renewed in one of four ways...
			<?php //echo $this->Html->link("mor information", "/services/renew"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Charges", "/services/loan_charges"); ?></div>
			What are the charges for overdues, damaged or lost items? Suspension of membership?
			<?php //echo $this->Html->link("more information", "/services/loan_charges"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Placing Holds", "/services/placing_holds"); ?></div>
			Find out how to request an item from Vaughan Public Libraries.
			<?php //echo $this->Html->link("more information", "/services/placing_holds"); ?>
		</div>

		&nbsp;
	</div>
	<div class="closing"></div>




</div>