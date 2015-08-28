<?php
   header( 'Location: http://www.vaughanpl.info/newcomers' ) ;
?>

<?php include("crumbs.ctp"); ?>

<?php
$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"ESL Collection","url"=>"/collections/esl"), array("Title"=>"Borrowing Materials","url"=>"/services/borrowing"), array("Title"=>"Library Services","url"=>"/services/special"),array("Title"=>"Email Librarian","url"=>"/email_librarian")))));

$this->set('relatedContentElements', $relatedContentElements);
?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Newcomers</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>

	<div class="details">
		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Welcome Brochures", "/materials/welcome"); ?></div>
			Information about VPL library cards, loans, and services in Chinese, English, French, Hebrew, Hindi, Italian, and Russian...
			<?php echo $this->Html->link("more", "/materials/welcome"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Collections In Other Languages", "/multilingual_collection"); ?></div>
			VPL has collections of materials in Chinese, French, Farsi, Gujarti, Hebrew, Hindi, Italian, Korean, etc. other than English...&nbsp;
			<?php echo $this->Html->link("more", "/multilingual_collection"); ?>
		</div>

		<!--
		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Multilingual Services Request Form", "/multilingual"); ?></div>
			Fill out a Multilingual Services Request Form ...&nbsp;
			<?php echo $this->Html->link("more", "/multilingual"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Library Settlement Partnerships", "/services/lsp"); ?></div>
			VPL is working with Catholic Community Services of York Region (CCSYR) to provide a Library Settlement Partnerships (LSP)..&nbsp;
			<?php echo $this->Html->link("more", "/services/lsp"); ?>
		</div>
	-->
		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Links", "/links/index/subject/500"); ?></div>
			Links to high-quality, librarian-evaluated Web sites for Newcomers...
			<?php echo $this->Html->link("more", "/about/welcome"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Programs", "/programs/index/category/25/"); ?></div>
			Programs for Newcomers at Vaughan Public Libraries...
			<?php echo $this->Html->link("more", "/programs/index/category/25/"); ?>
		</div>
		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Databases", "/databases/index/collection/25"); ?></div>
			High-quality subscription databases providing content of interest to newcomers: newspapers in various languages, ESL training, practice tests and
			<?php echo $this->Html->link("more", "/databases/index/collection/25"); ?>
		</div>


	</div>
	<div class="closing"></div>




</div>