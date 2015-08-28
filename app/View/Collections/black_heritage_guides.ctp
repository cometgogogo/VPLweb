<?php include("crumbs.php"); ?>	


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Black Heritage Library Guides</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<div class="intro">
			Listed here are subject-based library guides prepared by VPL librarians on Black Heritage-related topics.
		</div>
		<div class="entry">
		
			<p>
				When visiting a branch to consult the resources listed in these guides, 
				please remember that the main collection for Black Heritage is held at the
				<?php echo $html->link("Dufferin Clark Library", "/libraries/view/3"); ?>
			</p>
			
			<p>
				Please <?php echo $html->link("Email Librarian", "/email_librarian"); ?> about resources on any topic for which a Guide is not currently available.
			</p>
			
			<p>
				<?php echo $html->image("/icon-pdf.gif");?>
				<?php echo $html->link("Black Heritage Collection", "/files/libraryguides/blackheritagelibraryguide.pdf", array("rel"=>"external")); ?> (104 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			
			
			<p>
				<?php echo $html->image("/icon-pdf.gif");?>
				<?php echo $html->link("Black History Month - Adult Fiction", "/files/booklists/bhm_adultfiction.pdf", array("rel"=>"external")); ?> (40 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			
			
			<p>
				<?php echo $html->image("/icon-pdf.gif");?>
				<?php echo $html->link("Black History Month - Junior Fiction", "/files/booklists/bhm_juniorfiction.pdf", array("rel"=>"external")); ?> (39 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			
			<p>
				<?php echo $html->image("/icon-pdf.gif");?>
				<?php echo $html->link("Black History Month - Non-fiction", "/files/booklists/bhm_nonfic.pdf", array("rel"=>"external")); ?> (40 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			
			
			<p>
				<?php echo $html->image("/icon-pdf.gif");?>
				<?php echo $html->link("Black History Month - Junior Picture Books", "/files/booklists/bhm_juniorpicture.pdf", array("rel"=>"external")); ?> (39 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			
			
			<p>
				<?php echo $html->image("/icon-pdf.gif");?>
				<?php echo $html->link("Black History Month -  For Your Viewing & Listening Pleasure", "/files/booklists/bhm_pleasure.pdf", array("rel"=>"external")); ?> (41 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			

			<?php echo $this->renderElement('adobe_download'); ?>
		</div>
		&nbsp;
	</div>
	<div class="closing"></div>
</div>