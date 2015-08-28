<div class="collection_navigation">



	<?php echo $this->Html->link("Special Collections","/collections", array("class"=>"collection_home")); ?>


	<?php if (isset($area["AreaPage"])) { ?>
		<div class="collection_links">
			<h2><?php echo $area["Area"]["AreaName"]; ?></h2>
			<?php foreach ($area["AreaPage"] as $areaPage) { ?>

				<?php
					switch ($areaPage["page_type"]) {
						case "url":
							echo $this->Html->link($areaPage["page_title"],$areaPage["page_url"]);
							break;
						case "links":
							if ($area["Area"]["AreaID"]==24) { // esl using subject to get the links
								echo $this->Html->link("Links","/links/index/subject/61");
							} elseif ($area["Area"]["AreaID"]==21) {
								echo $this->Html->link("Links","/collections/government_doc");
							} elseif ($area["Area"]["AreaID"]==14) {
								echo $this->Html->link("Links","/links/index/broad_subject/114");
							}elseif ($area["Area"]["AreaID"]==25) {
								echo $this->Html->link("Links","/links/index/broad_subject/116");
							}
							else {
								echo $this->Html->link("Links","/links/index/collection/" . $area["Area"]["AreaID"]);
							}
							break;
						case "databases":
							echo $this->Html->link("Databases","/databases/index/collection/" . $area["Area"]["AreaID"]);
							break;
						case "programs":
							if ($area["Area"]["AreaID"]==3) {
								echo $this->Html->link("Business Programs","/programs/index/collection/3");
							} else if ($area["Area"]["AreaID"]==12) {
								echo $this->Html->link("Adult Learning Tutoring","/collections/adult_literacy_program");
							} else if ($area["Area"]["AreaID"]==4) {
								//show black heritage in February
								echo $this->Html->link("Programs","/programs/index/category/26");
								//echo $this->Html->link("Heritage Month News", "/files/hmonth_black_history_2011.pdf", array("rel"=>"external"));
							} else if ($area["Area"]["AreaID"]==24) {
								//echo $this->Html->link("ESL Book Clubs", "/books_for_book_clubs/index/esl");
								echo $this->Html->link("ESL Classes/Programs","/collections/esl_program");
							}else if ($area["Area"]["AreaID"]==25) {
								//echo $this->Html->link("ESL Book Clubs", "/books_for_book_clubs/index/esl");
								echo $this->Html->link("Programs ","/programs/index/category/25/");
							}
							break;
					}
				?>
			<?php } ?>
		</div>
	<?php } ?>


	<?php
		$collections = array(
								array("title"=>"Adult Basic Literacy", "url"=>"/collections/adult_literacy"),
								array("title"=>"Black Heritage", "url"=>"/collections/black_heritage"),
								array("title"=>"Government Documents", "url"=>"/collections/government_doc"),
								array("title"=>"Professional Collection", "url"=>"/collections/professional_collection"),
								array("title"=>"Cinema Collection", "url"=>"/collections/cinema"),
								array("title"=>"ESL Collection", "url"=>"/collections/esl"),
								array("title"=>"Local Studies", "url"=>"/collections/local_studies")
								);
	?>

	<div class="collection_list">
		<h3>Collections:</h3>
		<?php foreach ($collections as $collection) { ?>
			<?php echo $this->Html->link($collection["title"],$collection["url"]); ?>
		<?php } ?>
	</div>
	<div class="closing"></div>



</div>


