<?php $html->addCrumb("Home" , "/"); ?>
<?php $html->addCrumb("Books & Resources" , "/materials"); ?>
<?php $html->addCrumb("We Recommend" , "/materials/recommended"); ?>
<?php $html->addCrumb("Award Winners" , "/awards");

$this->pageTitle = $award['Award']['name'];

?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1><?php echo $award['Award']['name']?></h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<p class="intro">
			<?php echo $award['Award']['description']?>
		</p>

		<p>


		<?php if(!empty($award['Award']['website'])) { ?>
		<h2>Official website</h2>
				<?php echo str_replace ( array("&","+","%","/"), array("&<wbr>","+<wbr>","%<wbr>","/<wbr>"), $award['Award']['website']); ?>
				<br />
				<?php echo $html->link("Visit site", $award['Award']['website'], array("rel"=>"external")); ?>
		</p>
		<?php } ?>

		<p>
		<h2>Past winners</h2>
		<?php foreach ($myWinners2 as $awardWinner) { ?>
			<div class="">
				<h3><?php

					echo $awardWinner['year'];
					if ($awardWinner['CatID']!=0) {
						echo " ", $awardWinner['Category'];
					}

					?>
				</h3>
				<?php

					foreach ($awardWinner['winners'] as $winner) {
					?>

<div class="book_list">
					<?php if(!empty($winner['title'])) { 
						$winner_title = $winner['title'];
						$winner_author = $winner['author']; 
						if($winner['Lang'] == 1) { 
							$winner_title = "<span lang='fr'>" . $winner['title'] . "</span>";
							$winner_author = "<span lang='fr'>" . $winner['author'] . "</span>";
						}
					
					?>
					
					
						<?php echo "<div class='title'>" . $winner_title . "</div>"; ?>
					<?php } ?>


					<?php echo "<div class='author'>" . $winner_author . "</div>"; ?>

					<!-- change for chamo -->
					<form method="get" action="http://catalogue.vaughanpl.info/catalogue/search/query">
						<input type="hidden" name="term_1" value="<?php echo utf8_encode($winner['author']); ?>" />
						<input type="hidden" name="field_1" value="a" />
						<?php if(!empty($winner['title'])) { ?>
							<input type="hidden" name="term_2" value="<?php echo str_replace(':', ' ', utf8_encode($winner['title'])); ?>" />
							<input type="hidden" name="field_2" value="t" />
						<?php } ?>
						<input type="submit" class="catalog_link" value="Find in catalogue">
					</form>

</div>

			<?php }
			}
			?></div>
		</p>
	</div>
	<div class="closing"></div>
</div>
