<?php include("crumbs.php"); ?>	


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Business Access Library Guides</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<div class="intro">
			Listed here are subject-based library guides prepared by VPL librarians on various business-related topics.
		</div>
		<div class="entry">
		
			<p>
				When visiting a branch to consult the resources listed in these guides, please remember that while all branches of 
				Vaughan Public Libraries have a range of business-related resources, the main collection for business information is held at the
				<?php echo $html->link("Pierre Berton Resource Library", "/libraries/view/7"); ?>
			</p>
			
			<p>
				Please <?php echo $html->link("Email Librarian", "/email_librarian"); ?> about resources on any topic for which a Guide is not currently available.
			</p>
			
			<p>
				<?php echo $html->image("/icon-pdf.gif");?>
				<?php echo $html->link("Business Directories", "/files/libraryguides/businessguidedirectories.pdf", array("target"=>"_blank")); ?> (51 KB)<br />
				<div class="section_end">&nbsp;</div>
				
				<?php echo $html->image("/icon-pdf.gif");?>
				<?php echo $html->link("Business Plans, Proposals, & Writing", "/files/libraryguides/businessguideplans.pdf", array("target"=>"_blank")); ?> (37 KB)<br />
				<div class="section_end">&nbsp;</div>
				
				<?php echo $html->image("/icon-pdf.gif");?>
				<?php echo $html->link("Financial Planning for Business", "/files/libraryguides/businessguidefinancialplanning.pdf", array("target"=>"_blank")); ?> (41 KB)<br />
				<div class="section_end">&nbsp;</div>
				
				<?php echo $html->image("/icon-pdf.gif");?>
				<?php echo $html->link("Global Standards", "/files/libraryguides/businessguidestandards.pdf", array("target"=>"_blank")); ?> (28 KB)<br />
				<div class="section_end">&nbsp;</div>
				
				<?php echo $html->image("/icon-pdf.gif");?>
				<?php echo $html->link("Marketing Resources", "/files/libraryguides/businessguidemarketing.pdf", array("target"=>"_blank")); ?> (53 KB)<br />
				<div class="section_end">&nbsp;</div>
				
				<?php echo $html->image("/icon-pdf.gif");?>
				<?php echo $html->link("Using CBCA", "/files/libraryguides/vplpathfinder-cbca.pdf", array("target"=>"_blank")); ?> (45 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<?php echo $this->renderElement('adobe_download'); ?>
		</div>
		&nbsp;
	</div>
	<div class="closing"></div>
</div>