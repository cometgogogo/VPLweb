<?php $this->Html->addCrumb("Home" , "/"); ?>
<?php $this->Html->addCrumb("Books & Resources" , "/materials"); ?>
<?php $this->Html->addCrumb("We Recommend" , "/materials/recommended"); ?>
<?php $this->Html->addCrumb("Bestseller Lists" , "/bestsellers"); 
$this->pageTitle = $listName;
?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Bestseller Lists</h1>
	</div>
	<div class="closing"></div>
</div>


<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<h2><?php
			echo $listName;
		    ?>
		</h2>
		<?php foreach ($bestsellers as $record) { ?>

<div class="">




				<div class="book_list">
<?php
$image_width = 0;
if (isset($record['ISBN'])) {
	$image="http://lib.syndetics.com/index.aspx?isbn=".$record['ISBN']."/MC.GIF";

	?>
	<a href="http://catalogue.vaughanpl.info/catalogue/lib/item?id=<?php echo $record['BibID']; ?>" rel="external"><img src="<?php echo $image; ?>" height="80" width="52" alt="Find it in the catalogue" /></a>
	<?php

}
?>
					<?php if(!empty($record['Title'])) { ?>
						<?php echo "<div class='title_block'>" .$record['Title'] . "</div>"; ?>
					<?php } ?>

					<?php if(!empty($record['Author'])) { ?>
						<?php echo "<div class='author_block'>by " .$record['Author'] . "</div>"; ?>
					<?php } ?>

					<?php if(isset($record['CallNumber']) && !empty($record['CallNumber'])) { ?>
						<?php echo "<div class='author_block'>Call Number: " .$record['CallNumber'] . "</div>"; ?>
					<?php } ?>


					<?php echo $this->Html->link("Find in catalogue", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=".$record['BibID'], array("rel"=>"external")); ?>

				</div>
			</div>
		<?php } ?>

	</div>
	<div class="closing"></div>
</div>