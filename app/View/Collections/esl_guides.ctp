<?php include("crumbs.php"); ?>	

<?php 
$related = $relatedContentElements[0];
$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Services For Newcomers","url"=>"/services/newcomer")))), $related);
//array_push($relatedContentElements, array ('related_pages', array("pages"=>array(array("Title"=>"Services For Newcomers","url"=>"/services/newcomer")))));	
$this->controller->set('relatedContentElements', $relatedContentElements);
?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>ESL Collection Library Guides</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<div class="intro">
			Listed here are subject-based library guides prepared by VPL librarians on various ESL-related topics.
		</div>
		<div class="entry">
		
			<p>
				Staff at any of our Vaughan Public Libraries branches would be available to assist with any enquiries.
			</p>
			
			<p>
				Please <?php echo $html->link("Email Librarian", "/email_librarian"); ?> about resources on any topic for which a Guide is not currently available.
			</p>
			
			<p>
				<?php echo $html->image("/icon-pdf.gif");?>
				<?php echo $html->link("ESL Collection", "/files/libraryguides/esl_libraryguide.pdf", array("rel"=>"external")); ?> (49 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<?php echo $this->renderElement('adobe_download'); ?>
		</div>
		&nbsp;
	</div>
	<div class="closing"></div>
</div>