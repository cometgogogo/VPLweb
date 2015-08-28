<div class="section_end">&nbsp;</div>
<div class="winterlights_navigation">



	<?php echo $this->Html->link("WinterLights Celebration","/winterlights", array("class"=>"winterlights_home")); ?>
	<div class="winterlights_list">
		<a href="/winterlights">Food for Fines</a>
		<a href="/programs/index/category/27/2009-12-01">WinterLights Programs at VPL</a>
		<a href="/winterlights/reading_lists">WinterLights Reading Lists</a>
		
	<?php 	
	
	$siteStructure = getSiteStructure();
	displayTipOfToday($siteStructure); 
	
	?>
	
		<a id="vaughan_shines_link" href="http://www.vaughanshines.ca/", rel="external">My Vaughan Shines</a>
	</div>
		<div class="closing">&nbsp;</div>
	
		<div class="section_end">&nbsp;</div>
	
	
	</div>


<?php

function displayTipOfToday($siteStructure) {

	foreach ($siteStructure["main"] as $content) {
		if ($content['id'] == date("Y-m-d")){
			echo "<div class='tip'>";
			echo $content["tip"];
			echo "<span class='src'>" . $content["src"] . "</span></div>";
	        }
	}


}


function getSiteStructure() {
	$ret = array();
	$ret["main"] =	array(array(
					"id"	=>	"2010-01-08",
					"date"	=>	"",
					"tip"	=>	"What kind of adhesive do they use in the North Pole? <br/> i-gloo",
					"src"	=> 	"- from The Whopping Great Big Bonkers Joke Book "

				),
				array(
					"id"	=>	"2010-01-07",
					"date"	=>	"",
					"tip"	=>	"What do you say to a stressed out snowman? <br/> Chill out! ",
					"src"	=> 	"- from The Whopping Great Big Bonkers Joke Book "

				),
				array(
					"id"	=>	"2010-01-06",
					"date"	=>	"",
					"tip"	=>	"What do you call a snowman in August? <br/>A puddle",
					"src"	=> 	"- from The Whopping Great Big Bonkers Joke Book "

				),
				array(
					"id"	=>	"2010-01-05",
					"date"	=>	"",
					"tip"	=>	"What did one snowman say to the other?<br/>Ice to see you! ",
					"src"	=> 	"- from The Whopping Great Big Bonkers Joke Book "
				),
				array(
					"id"	=>	"2010-01-04",
					"date"	=>	"",
					"tip"	=>	"What is an adult's favourite Christmas carol? <br/>Silent Night",
					"src"	=> 	"- from The Whopping Great Big Bonkers Joke Book "
				),
				array(
					"id"	=>	"2010-01-03",
					"date"	=>	"",
					"tip"	=>	"What do you call people who are afraid of Santa Claus?<br/>Claustrophobic",
					"src"	=> 	"- from The Whopping Great Big Bonkers Joke Book"
				),	
				array(
					"id"	=>	"2010-01-02",
					"date"	=>	"",
					"tip"	=>	"Mon pays ce n'est pas un pays c'est l'hiver. ",
					"src"	=> 	"- Gilles Vigneault"

				),
				array(
					"id"	=>	"2010-01-01",
					"date"	=>	"",
					"tip"	=>	"Aja, I am joyful; that is good! My country is nothing but slush, that is good!",
					"src"	=> 	"- Traditional Inuit song"
				),
				array(
					"id"	=>	"2009-12-31",
					"date"	=>	"",
					"tip"	=>	"Even are we learning<br/>This one truth as we go<br/>All sadness without sunlight<br/>Is like Winter without snow.",
					"src"	=> 	"- Charles Sangster"
				),
				array(
					"id"	=>	"2009-12-30",
					"date"	=>	"",
					"tip"	=>	"Snow is snowy when it’s snowing, I’m sorry it’s slushy when it’s going.",
					"src"	=> 	"- Ogden Nash "
				),				
				array(                                                   
					"id"	=>	"2009-12-29",
					"date"	=>	"",
					"tip"	=>	"Winter tames man, woman, and beast. ",
					"src"	=> 	"- William Shakespeare"
				),
				array(
					"id"	=>	"2009-12-28",
					"date"	=>	"",
					"tip"	=>	"An old man loved is winter with flowers.",
					"src"	=> 	"- German proverb"
										
				)
			);

	return $ret;
}
?>