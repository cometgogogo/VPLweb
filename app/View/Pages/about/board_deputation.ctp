<?php include("crumbs.ctp");

$this->Html->addCrumb("Library Board" , "/about/board");
 ?>
<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Request for Deputation</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<div class="entry">

			<p>All Board meetings are open to the public.</p>

			<p>Members of the public wishing to attend are advised to call the Administration Office
			at (905) 653-READ (7323) the week of the Board meeting to confirm date and location.</p>

			<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
			<?php echo $this->Html->link("Request for Deputation to Board form", "/files/deputationtoboardform.pdf", array("rel"=>"external")); ?> (12 KB)<br /><br />


			<?php echo $this->element('adobe_download'); ?>

		</div>
		<div class="section_end">&nbsp;</div>

	</div>
	<div class="closing">&nbsp;</div>

</div>