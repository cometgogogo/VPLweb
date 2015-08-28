<?php $this->Html->addCrumb("Home" , "/"); ?>
<?php $this->Html->addCrumb("Books & Resources" , "/materials"); ?>
<?php $this->Html->addCrumb("We Recommend" , "/materials/recommended"); ?>



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

		<div class="entry">

		<p class="intro">
		Check out the bestsellers in VPL's collection!
		</p>


		<?php

		if(isset($recent_season)) {

			echo displayList($recent_season, $recent_lists);
		}

		if(isset($prev_season)) {

			echo displayList($prev_season, $prev_lists);
		}
		?>


		</div>
	</div>
	<div class="closing"></div>
</div>


<?php
function displayList($season, $lists) {

	$content = "<h2>".$season."</h2><p>";

	foreach ($lists as $list) {


		$list_name = $season." Bestseller List: ".$list['AgeGroup'];

		if (isset($list['isFic'])) {
			
			if ($list['isFic']) {
				$list_name .= " Fiction";
			} else {
				$list_name .= " Non-Fiction";
			}			
		} 
		if (isset($list['Format'])) {
			$list_name .= " ".$list['Format'];					
		} 		

		if (isset($list['isSup']) && $list['isSup']) {

			$list_name .= " Supplement";
		}

		$content .= "<a href='/bestsellers/view/".$list['ListID']."'>".$list_name."</a><br/><br/>";

	}
	$content .=  "</p>";

	return $content;

}

?>
