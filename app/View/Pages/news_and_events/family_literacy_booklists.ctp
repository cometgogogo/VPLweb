<?php
include("crumbs.php");
$this->Html->addCrumb("Family Literacy Day" , "/news_and_events/family_literacy_day");?>

<?php
	$relatedContentElements = array	();
	$relatedContentElements[] = array ('related_pages', array("pages"=>array(array("Title"=>"Family Literacy Day","url"=>"/pages/news_and_events/family_literacy_day"),array("Title"=>"Family Literacy Day Programs","url"=>"/pages/news_and_events/family_literacy_day_program"),array("Title"=>"Other Programs","url"=>"/programs"))));
	
	//$relatedContentElements[] = array ('related_pages', array("pages"=>array(array("Title"=>"Family Literacy Day","url"=>"/pages/news_and_events/family_literacy_day"),array("Title"=>"Other Programs","url"=>"/programs"))));
	
	$this->set('relatedContentElements', $relatedContentElements);
?>
<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Family Literacy Day</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="section_end">&nbsp;</div>
		<div class="entry">

			<h2>Family Literacy Booklists</h2>

			<!--p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Movies from Books", "/files/booklists/BookMovies_2011.pdf", array("rel"=>"external")); ?> (40 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Eating, Praying, Loving", "/files/booklists/Eating_Praying_Loving_2011.pdf", array("rel"=>"external")); ?> (40 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Family Activities", "/files/booklists/Family_Activites.pdf", array("rel"=>"external")); ?> (22 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Family Read Alouds", "/files/booklists/Family_Read_Alouds.pdf", array("rel"=>"external")); ?> (21 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p -->


			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Our Favourite Picture Books of 2014", "/files/booklists/fld_PictureBooks.pdf", array("rel"=>"external")); ?> (29 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Books to Share", "/files/booklists/fld_BooksToShare.pdf", array("rel"=>"external")); ?> (25 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>


			<?php echo $this->element('adobe_download'); ?>

		</div>
		<div class="section_end">&nbsp;</div>

	</div>
	<div class="closing"></div>




</div>