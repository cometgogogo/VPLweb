<?php $this->Html->addCrumb("Home" , "/"); ?>
<?php $this->Html->addCrumb("Books & Resources" , "/materials"); ?>
<?php $this->Html->addCrumb("We Recommend" , "/materials/recommended"); ?>
<?php $this->Html->addCrumb("New Arrivals" , "/new_arrivals"); ?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>New Arrivals</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="entry">

			<div class="rss_title_right">
			<h2> For Reading Widget</h2>
			</div>

		<table id="new_arrivals_table">
		<?php foreach ($list as $record) {

			$image_width = 0;

			echo "<tr><td rowspan=2>";

			if (isset($record['ISBN'])) {

				$image="http://lib.syndetics.com/index.aspx?isbn=".$record['ISBN']."/MC.GIF";

				?>

				<a href="http://catalogue.vaughanpl.info/catalogue/lib/item?id=<?php echo $record['BibID']; ?>" rel="external"><img src="<?php echo $image; ?>" height="80" class="img_wrapped_left" alt="Find it in the catalogue" /></a>
				<?php

			}


			echo "</td><td>";


			echo $this->Html->link($record['Title'], "http://catalogue.vaughanpl.info/catalogue/lib/item?id=".$record['BibID'], array("rel"=>"external"));
			if (isset($record['AltTitle'])) {
				echo "<br/>";
				echo $record['AltTitle'];
			}
			echo "</td></tr>";



			echo "<tr><td>";
			echo $record['Details'];

			echo "</td></tr>";
			echo "<tr><td colspan=2>&nbsp;</td></tr>";

		} ?>
		</table>

		</div>
	</div>
	<div class="closing"></div>
</div>
