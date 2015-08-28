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
		<h1>ESL Collection</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	
	<div class="details">


		<div class="intro">
			<p>Welcome to VPL's ESL Collection!</p>
			<p>Vaughan Public Libraries has developed an ESL collection appropriate to the needs of the ESL and newcomer community.  The focus of the collection is on the literacy and general information needs of this group. The collection promotes recreational reading through our classic and contemporary fiction collection, provides non-fiction educational resources in all formats and  supports links for library partnerships with newcomer agencies. </p>
		</div>


		<div class="directory_entry">
			<div class="name"><?php echo $html->link("Links", "/links/index/subject/61"); ?></div>
			Links to high-quality, librarian-evaluated websites on a variety of ESL education, Citizenship & Immigration ...&nbsp;
		</div>
		
		<div class="directory_entry">
			<div class="name"><?php echo $html->link("Databases", "/databases/index/collection/24"); ?></div>
			High-quality subscription databases providing information related to the ESL collection.&nbsp;
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $html->link("ESL Classes", "/collections/esl_program"); ?></div>
			Find out the ESL classes near you.&nbsp;
		</div>
		
		<div class="directory_entry">
			<div class="name"><?php echo $html->link("Books for Book Clubs", "/books_for_book_clubs/index/esl"); ?></div>
			Check out books available for ESL Book Clubs.&nbsp;
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $html->link("Library Guides", "/collections/esl_guides"); ?></div>
			Subject-based library guides prepared by VPL librarians on various ESL-related topics.
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $html->link("Email Librarian", "/email_librarian"); ?></div>
			Need help locating ESL resources? Try using our email reference service.&nbsp;
		</div>
			



		
	</div>
	<div class="closing"></div>
	
	
	
	
</div>