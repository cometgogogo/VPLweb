<?php include("crumbs.php"); ?>	


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Local Studies Library Guides</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<div class="intro">
			Listed here are subject-based library guides prepared by VPL librarians on various Local Studies-related topics.
		</div>
		<div class="entry">
		
			<p>
				When visiting a branch to consult the resources listed in these guides, please remember that the main collection 
				for Local Studies is held at the
				<?php echo $html->link("Bathurst Clark Resource Library", "/libraries/view/2"); ?>
			</p>
			
			<p>
				Please <?php echo $html->link("Email Librarian", "/email_librarian"); ?> about resources on any topic for which a Guide is not currently available.
			</p>
			
			<p>
				<?php echo $html->image("/icon-pdf.gif");?>
				<?php echo $html->link("Local Studies Library Guide", "/files/libraryguides/localstudieslibraryguide.pdf", array("rel"=>"external")); ?> (32 KB)<div class="section_end">&nbsp;</div>
			</p>
			<?php echo $this->renderElement('adobe_download'); ?>
		</div>
		&nbsp;
	</div>
	<div class="closing"></div>
</div>