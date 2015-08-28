<?php include("crumbs.ctp"); ?>
<?php include("crumbs_recommended.ctp"); ?>

<?php 
	
	$this->controller->redirect('http://www.vaughanpl.info/bestsellers');
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Bestseller lists</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		
		<div class="entry">
		
			<h2>Spring/Summer 2009</h2>
					<p>

					<?php echo $html->image("/img/icon-pdf.gif");?>
					<?php echo $html->link("Bestseller List Fiction", "/files/spring_fiction2009.pdf",array("rel"=>"external")); ?> (377 KB)<br />
					<div class="section_end">&nbsp;</div>

					<?php echo $html->image("/img/icon-pdf.gif");?>
					<?php echo $html->link("Bestseller List Non-Fiction", "/files/spring_nonfiction2009.pdf",array("rel"=>"external")); ?> (149 KB)<br />
					<div class="section_end">&nbsp;</div>

					</p>
			<br/>
		
			<h2>Winter 2009</h2>
					<p>
					
					<?php echo $html->image("/img/icon-pdf.gif");?>
					<?php echo $html->link("Bestseller List Fiction", "/files/fiction2009.pdf",array("rel"=>"external")); ?> (291 KB)<br />
					<div class="section_end">&nbsp;</div>
		
					<?php echo $html->image("/img/icon-pdf.gif");?>
					<?php echo $html->link("Bestseller List Non-Fiction", "/files/nonfiction2009.pdf",array("rel"=>"external")); ?> (155 KB)<br />
					<div class="section_end">&nbsp;</div>
					
					</p>
			<br/>
			<!--
			<h2>Fall 2008</h2>
			<p>
			
			<?php echo $html->image("/img/icon-pdf.gif");?>
			<?php echo $html->link("Bestseller List Fiction", "/files/2008bstsellerfic.pdf",array("rel"=>"external")); ?> (432 KB)<br />
			<div class="section_end">&nbsp;</div>

			<?php echo $html->image("/img/icon-pdf.gif");?>
			<?php echo $html->link("Bestseller List Non-Fiction", "/files/f08a-nonfic.pdf",array("rel"=>"external")); ?> (404 KB)<br />
			<div class="section_end">&nbsp;</div>
			
			<?php echo $html->image("/img/icon-pdf.gif");?>
			<?php echo $html->link("Bestseller Supplement Fiction", "/files/bs_fall_2008_sup_f.pdf",array("rel"=>"external")); ?> (103 KB)
			<div class="section_end">&nbsp;</div>

			<?php echo $html->image("/img/icon-pdf.gif");?>
			<?php echo $html->link("Bestseller Supplement Non-Fiction", "/files/bs_fall_2008_sup_nf.pdf",array("rel"=>"external")); ?> (42 KB)<br />
			<div class="section_end">&nbsp;</div>

			</p>
			<br/>
			
			<h2>Spring/Summer 2008</h2>
			<p>	
			
			<?php echo $html->image("/img/icon-pdf.gif");?>
			<?php echo $html->link("Bestseller List Fiction", "/files/bsl-fic-summer2008.pdf",array("rel"=>"external")); ?> (461 KB)
			<div class="section_end">&nbsp;</div>
			
			<?php echo $html->image("/img/icon-pdf.gif");?>
			<?php echo $html->link("Bestseller List Non-Fiction", "/files/bsl-nonfic-summer2008.pdf",array("rel"=>"external")); ?> (231 KB)<br/>
			<div class="section_end">&nbsp;</div>
			
			<?php echo $html->image("/img/icon-pdf.gif");?>
			<?php echo $html->link("Bestseller Supplement Fiction", "/files/SPRINGSUMMER SUPP2008 fic.pdf",array("rel"=>"external")); ?> (159 KB)<br/>
			<div class="section_end">&nbsp;</div>

			<?php echo $html->image("/img/icon-pdf.gif");?>
			<?php echo $html->link("Bestseller Supplement Non-Fiction", "/files/bestseller supp 2008 NF.pdf",array("rel"=>"external")); ?> (129 KB)<br/>
			<div class="section_end">&nbsp;</div>
			</p>
			-->
			<?php echo $this->element('adobe_download'); ?>
		</div>
		&nbsp;
	</div>
	<div class="closing"></div>
</div>