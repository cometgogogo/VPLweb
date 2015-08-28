<?php
$this->Html->addCrumb("Home" , "/");
$this->Html->addCrumb("Books & Resources" , "/materials");
$this->pageTitle = "Books for ".$criteriaValue." Book Clubs";

/*
if ($area["Area"]["AreaTypeID"] == 1) {
	$headerClass = "microsite_header";
	$contentClass = "microsite_content";
	$searchBarClass = "microsite_search_bar";
} else {
	$headerClass = "header";
	$contentClass = "content";
	$searchBarClass = "search_bar";
}
*/

?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Books for <?php if(isset($criteriaValue)) { echo $criteriaValue, " "; }?> Book Clubs</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>

	<div class="details">

		<div class="content">

			<div class="search_results">
				<div class="opening">

					<?php
					if ($alpha) {$start_letter = explode('/', $alphaBaseUrl); }
					if ($totalBooksForBookClubs <= 0 ) {
						echo "There is no book found ";
					} else {
					if (!isset($page)) { $page =1;}

					?>
					Books
					<div class="data"><?php echo $page*10-9 ?></div> to
					<div class="data"><?php echo min($page*10,$totalBooksForBookClubs) ?></div> of
					<div class="data"><?php echo $totalBooksForBookClubs ?></div> total found

					<?php
					}
					if(isset($criteriaValue)) { ?>
						for
						<div class="data">
							<?php echo $criteriaValue; ?>
						</div>
					<?php } ?>
					<?php if (isset($start_letter)) { ?>
					&nbsp;titles starting with letter
					<div class="data">
						<?php echo $start_letter[5]; ?>
					</div>
					<?php } ?>
						<div class="section_end">&nbsp;</div>
						<div id='alpha_pagination'>
							<?php for ($i=65; $i<=90; $i++) {		?>
							<a href="<?php echo $paginationBaseUrl . '/alphabetical/' . chr($i) ;?>" ><?php echo chr($i);?></a>
							<?php if($i<90) { ?>
							<div class='page_index_separator'>&nbsp;|&nbsp;</div>
							<?php }  } 	?>
							<div class='page_index_separator'>&nbsp;|&nbsp;</div><a href="<?php echo $paginationBaseUrl; ?>" >List All</a>
						</div>

				</div>
				<div class="section_end"></div>
				<ul>
				<!--	<pre><?php //print_r($booksForBookClubs) ; ?></pre> -->

					<?php foreach ($booksForBookClubs as $bookForBookClubs) { ?>

						<div class="simple_directory_entry_new">
							<div class="name">
							<?php 
							echo $bookForBookClubs['BookForBookClubs']['Title'];
							
							$today = date("Y-m-d");
							$diff = round(abs(strtotime($today)-strtotime($bookForBookClubs['BookForBookClubs']['DateUpdated']))/86400);
							//$interval = $today -> diff($bookForBookClubs['BookForBookClubs']['DateUpdated']);
						//echo $interval->format('%m');
						//$month = $interval->format('%m');
						
							if ($diff <= 180) {
							?>
							<img src="/img/new.png" alt="new book icon" />
							<?php
							
							}
							
							
							
							?>	</div>

							<?php echo $bookForBookClubs['BookForBookClubs']['Author']; ?>
							<?php
							if ($bookForBookClubs['BookForBookClubs']['Level'] = 4 && !empty($bookForBookClubs['BookForBookClubs']['ESLGroup']) ) { echo "<p>ESL Reading Level:&nbsp;".$bookForBookClubs['BookForBookClubs']['ESLGroup'] . "</p>";}
							?>
							<p>
							<?php
							if(trim($bookForBookClubs['BookForBookClubs']['Annotation']) != "") {
								echo $bookForBookClubs['BookForBookClubs']['Annotation'];
								echo "<br/><br/>";
							}
							?>
							(<?php echo $bookForBookClubs['BookForBookClubs']['NumCopies']; ?> copies) &nbsp; &nbsp;
							<?php echo $this->Html->link("Reserve", "/book_for_book_club_reservations/add/" . $bookForBookClubs['BookForBookClubs']['BookID']) ."<br /><br />"; ?>
							</p>
						</div>

					<?php } ?>
				</ul>
				<div class="section_end"></div>
				<div class="closing"><br />
				<?php
				if ($alpha) {
					echo $pagination->pageLinks($page, $totalBooksForBookClubs,$alphaBaseUrl);
				} else {
					echo $pagination->pageLinks($page, $totalBooksForBookClubs,$paginationBaseUrl);
				}
				 ?></div>
			</div>



			<div class="section_end"></div>

		</div>


	</div>
	<div class="closing"></div>




</div>