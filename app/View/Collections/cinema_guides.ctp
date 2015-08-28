<?php include("crumbs.php"); ?>	


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Cinema Collection</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	
	<div class="details">


		<div class="intro">
			Here is a list of film makers whose work you might wish to discover.
		</div>

		<div class="entry">
			
			
			<p>
				<?php echo $html->image("/icon-pdf.gif");?>
				<?php echo $html->link("Cinema Collection information sheet", "/files/libraryguides/cinemacollection.pdf", array("rel"=>"external")); ?> (54 KB)<div class="section_end">&nbsp;</div>
			</p>
			

			<?php echo $this->renderElement('adobe_download'); ?>
		</div>
		&nbsp;
	</div>
	<div class="closing"></div>
</div>