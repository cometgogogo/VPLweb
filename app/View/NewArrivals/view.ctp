<?php $this->Html->addCrumb("Home" , "/"); ?>
<?php $this->Html->addCrumb("Books & Resources" , "/materials"); ?>
<?php $this->Html->addCrumb("We Recommend" , "/materials/recommended"); ?>
<?php
$this->Html->addCrumb("New Arrivals" , "/new_arrivals");

$this->pageTitle = "New Arrivals - " . $list['NewArrival']['ListName'];
 ?>
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

			<div class="rss_title_left">
			<a class="link_rss_right" href="http://www.vaughanpl.info/new_arrivals/feed/<?php echo $list['NewArrival']['ListID']; ?>" title="Subscribe to this list"><span class="graphic_link_caption">Subscribe to this list</span></a>
			</div>

			<div class="rss_title_right">
			<h2> <?php echo $list['NewArrival']['ListName']; ?></h2>
			</div>

		<table id="new_arrivals_table">
		<?php foreach ($list['NewArrivalRecord'] as $record) {

			$image_width = 0;

			echo "<tr><td rowspan=2>";

			if (isset($record['ISBN'])) {

				$image="http://lib.syndetics.com/index.aspx?isbn=".$record['ISBN']."/MC.GIF";

				?>

				<a href="http://catalogue.vaughanpl.info/catalogue/lib/item?id=<?php echo $record['BibID']; ?>" rel="external"><img src="<?php echo $image; ?>" height="80" class="img_wrapped_left" alt="Find it in the catalogue" /></a>
				<?php

			}
			if (isset($record['VideoID'])) {

				$image="http://lib.syndetics.com/index.aspx?isbn=".$record['ISBN']."/MC.GIF&upc=".$record['VideoID']."&client=vaugp";

				?>

				<a href="http://catalogue.vaughanpl.info/catalogue/lib/item?id=<?php echo $record['BibID']; ?>" rel="external"><img src="<?php echo $image; ?>" height="80" class="img_wrapped_left" alt="Find it in the catalogue" /></a>
				<?php

			}


			echo "</td><td>";

			switch ($list['NewArrival']['ListID']) {
				case "20":
					echo "<span lang='fr'>";
					echo $this->Html->link($record['Title'], "http://catalogue.vaughanpl.info/catalogue/lib/item?id=".$record['BibID'], array("rel"=>"external"));
					echo "</span>";
					break;

				case "27":
					echo "<span lang='ru'>";
					echo $this->Html->link($record['Title'], "http://catalogue.vaughanpl.info/catalogue/lib/item?id=".$record['BibID'], array("rel"=>"external"));
					echo "</span>";
					break;
				case "28":
					echo "<span lang='es'>";
					echo $this->Html->link($record['Title'], "http://catalogue.vaughanpl.info/catalogue/lib/item?id=".$record['BibID'], array("rel"=>"external"));
					echo "</span>";
					break;
				default:
					echo $this->Html->link($record['Title'], "http://catalogue.vaughanpl.info/catalogue/lib/item?id=".$record['BibID'], array("rel"=>"external"));

			}

			if (isset($record['AltTitle'])) {
				echo "<br/>";

				switch ($list['NewArrival']['ListID']) {
				case "18":
					echo "<span lang='zh'>",$record['AltTitle'],"</span>";
					break;

				case "19":
					echo "<span lang='fa'>",$record['AltTitle'],"</span>";
					break;

				case "20":
					echo "<span lang='fr'>",$record['AltTitle'],"</span>";
					break;

				case "22":
					echo "<span lang='he'>",$record['AltTitle'],"</span>";
					break;

				case "25":
					echo "<span lang='ko'>",$record['AltTitle'],"</span>";
					break;

				case "27":
					echo "<span lang='ru'>",$record['AltTitle'],"</span>";
					break;

				case "29":
					echo "<span lang='ta'>",$record['AltTitle'],"</span>";
					break;

				case "30":
					echo "<span lang='ur'>",$record['AltTitle'],"</span>";
					break;

				default:
					echo $record['AltTitle'];

				}

			}
			echo "</td></tr>";



			echo "<tr><td>";
			if (($list['NewArrival']['ListID'] == '20') && preg_match('/[àâçéèêëîïôûùüÿñæœ]+/i',utf8_decode($record['Details']))) { //some french records have details in French

				echo "<span lang='fr'>",$record['Details'],"</span>";

			} else {
				echo $record['Details'];
			}

			echo "</td></tr>";
			echo "<tr><td colspan=2>&nbsp;</td></tr>";

		} ?>
		</table>

		</div>
	</div>
	<div class="closing"></div>
</div>
