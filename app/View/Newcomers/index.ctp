
<?php
$html->addCrumb("Home" , "/");
$html->addCrumb("Books & Resources" , "/materials");
//$html->addCrumb("Newcomers" , "/materials/newcomer");
?>

<?php
$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Welcome Brochures","url"=>"/materials/welcome"), array("Title"=>"Book sets for ESL Book Clubs","url"=>"/books_for_book_clubs/index/esl"), array("Title"=>"Borrowing Materials","url"=>"/services/borrowing"), array("Title"=>"Library Services","url"=>"/library_services"), array("Title"=>"Email Librarian","url"=>"/email_librarian")))));

//$this->controller->set('relatedContentElements', $relatedContentElements);
	   
$relatedContentElements[] = array ('image', array("image"=>array("source"=>"/img/languageLine.gif","width"=>"200", "height"=>"133", "title"=>"Language Line")));
$this->controller->set('relatedContentElements', $relatedContentElements);
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
		<div class="intro"></div>
		<div class="entry">
	<div id="tabs" class="ui-tabs-nav">

	<ul>

		<li><a href="#collection">Library Collections</a></li>		
		<li><a href="#newcomer_link">Links for Newcomers</a></li>
		<li><a href="#esl_link">ESL Links</a></li>
		<li><a href="#database">Articles & Research</a></li>
		<li><a href="#class">ESL Classes</a></li>
		<li><a href="#program">Programs</a></li>
	</ul>


<!-- Multilingual Starts  -->
	<div id="collection" class="tab">
		<div class="entry">

	<h2><a href="https://catalogue.vaughanpl.info/catalogue/search/query?field_1=tse&term_1=ESL+collection&sort=sort_ss_date%3Bdescending,sort_ss_author" title="ESL Collection" rel="external">ESL Collection</a></h2>
	<?php
	 foreach ($list as $lan){
	 	$language = $lan['Language'];
	 	$short=get_lan_shortName($language);
		$toggleId = $language . "collection";
	?>

	<h2><a href="javascript:toggleMin('<?php echo $toggleId; ?>')"><?php echo $language; ?> <img src="/img/multilingual/<?php echo $language . '.gif'; ?>" height="20" valign="bottom" alt="<?php echo $language.' collection'; ?>" title="<?php echo $language; ?>"/></a></h2>
	<div id="<?php echo $toggleId; ?>" style="display: none">
		<?php foreach($lan['Detail'] as $info){
	 		$location = get_location($info['Location']);
	 		$collections = $info['Collection'];
	 	?>
	 	<div class="multilingual_list">
			<div class="name"><a href="/libraries/view/<?php echo $info['BranchID']; ?>" title="<?php echo $info['Location']; ?>"><?php echo $info['Location']; ?></a></div>
			<div class="summary">
				<?php
				while($collection = mysql_fetch_array($collections)){
					$format=get_format($collection['Format']);
				?>
					<a href="https://catalogue.vaughanpl.info/catalogue/search/query?facet_lang=<?php echo $short; ?>&facet_loc=<?php echo $location; ?>&facet_format=<?php echo $format; ?>&sort=dateBookAdded%3Bdescending" title="<?php if($collection['Format'] == 'Mag'){echo 'Newspaper and Magazines';}else{echo $collection['Format'].'s';} ?>" rel="external"><img src="/img/multilingual/<?php echo $collection['Format']; ?>.gif" alt="<?php if($collection['Format'] == 'Mag'){echo 'Newspaper and Magazines';}else{echo $collection['Format'].'s';} ?>"/></a>
				<?php
				}
				?>
			</div></div>
		<?php
		} //end foreach
		?>
		
<?php if($language == "Chinese"){
		?>
		<div class="multilingual_list">
			<div class="link"><a href="http://ebooks.vaughanpl.info/FeaturedCollection.htm" rel="external" title="Chinese ebooks"><?php echo $language; ?> eBooks</a></div>
		</div>
		<?php
		}
		?>
		
		<?php if($language == "Russian"){
		?>
		<div class="multilingual_list">
			<div class="link"><a href="http://ebooks.vaughanpl.info/FeaturedCollection2.htm" rel="external" title="Russian eBooks"><?php echo $language; ?> eBooks</a></div>
		</div>
		<?php
		}
		?>

		<div class="multilingual_list">
			<div class="link"><a href="https://catalogue.vaughanpl.info/catalogue/search/query?facet_lang=<?php echo $short; ?>&sort=dateBookAdded%3Bdescending" rel="external" title="All">All <?php echo $language; ?> Materials at VPL</a></div>
		</div>
		
		<div class="section_end">&nbsp;</div>
		<br/>
		</div>

		<?php
			}
		?>


</div>
</div>
<!--  Multilingual Ends -->

<!-- Newcomers Link Starts -->
	<div id="newcomer_link" class="tab">
	<h3>Recommended Links for Newcomers</h3>
		<div class="search_results">
		<ul>
		<?php foreach ($links as $link) { ?>
			<li>
				<div class="name"><?php echo $html->link($link['Link']['TitleOfWebsite'],$link['Link']['UrlOfWebsite'],array("rel"=>"external")); ?></div>
				<div class="description"><?php echo $link['Link']['Description']; ?></div>
				<div class="technical_details">Prepared By: <?php echo $link['Link']['WebsitePublisher']; ?></div>
				<div class="technical_details">Date Reviewed by Vaughan Public Libraries: <?php echo $link['Link']['DateUpdated']; ?></div>
				<div class="url"><?php echo str_replace ( array("&","+","%","/"), array("&<wbr>","+<wbr>","%<wbr>","/<wbr>"), $link['Link']['UrlOfWebsite']); ?></div>
			</li>
		<?php } ?>
	</ul>

</div>
</div>
<!-- Newcomers Link Ends -->

<!-- ESL Link Starts -->
	<div id="esl_link" class="tab">
	<h3>Recommended Links for ESL</h3>
		<div class="search_results">
		<ul>
		<?php foreach ($esl_links as $esl_link) { ?>
			<li>
				<div class="name"><?php echo $html->link($esl_link['Link']['TitleOfWebsite'],$esl_link['Link']['UrlOfWebsite'],array("rel"=>"external")); ?></div>
				<div class="description"><?php echo $esl_link['Link']['Description']; ?></div>
				<div class="technical_details">Prepared By: <?php echo $esl_link['Link']['WebsitePublisher']; ?></div>
				<div class="technical_details">Date Reviewed by Vaughan Public Libraries: <?php echo $esl_link['Link']['DateUpdated']; ?></div>
				<div class="url"><?php echo str_replace ( array("&","+","%","/"), array("&<wbr>","+<wbr>","%<wbr>","/<wbr>"), $esl_link['Link']['UrlOfWebsite']); ?></div>
			</li>
		<?php } ?>
	</ul>
	<!-- div class="closing"><?php echo $pagination->pageLinks($page, 12, "/newcomers#esl_link"); ?></div -->

</div>
</div>
<!-- ESL Link Ends  -->

<!--  Database Starts -->
	<div id="database" class="tab">
		
<?php $databaseCount = 0; ?>
		<?php foreach ($databases as $database): ?>


			<div class="search_results">

				<div class="name">
					<?php echo $html->link($database['Database']['Name'], $database['Database']['URL'], array("rel"=>"external")); ?>
				</div>
				<div class="description">
					<?php echo $database['Database']['Description']; ?>			<br />	
					
					<?php //echo $html->link("more", "/databases/view/".$database['Database']["Short"]); ?>
					
					<?php echo $html->link($database['Database']['Availability'], $database['Database']['URL'], array("rel"=>"external")); ?>

					<?php if ($database['Database']['Help']) { ?>
					&nbsp;&nbsp;

					<a href="javascript:var newwindow=window.open('<?php echo '/files/dbhelp' . $database['Database']['Help']; ?>','popuppage','width=500,height=600,top=100,left=350, scrollbars=yes'); if (window.focus) {newwindow.focus();}">How to search ...</a>

					<?php }?>
				<br /><br /></div>
			</div>
			<?php $databaseCount ++; ?>
		<?php endforeach; ?>


</div>
<!-- Database Ends  -->
<!-- ESL Classes Starts --->
<div id="class" class="tab">

		<div class="entry">
		<p>Vaughan Public Libraries currently offers ESL classes at various locations. Please click the <a href="#program" rel="external">Programs</a> tab or call us at 905-653-7323 for more details.</p>
					<p>Please check out the following links to find out more ESL classes near you:</p>
					<div class="name"><a href="http://www.cic.gc.ca/english/resources/publications/welcome/wel-17e.asp#canada">Language Instruction for Newcomers to Canada (LINC) Program</a></div>
					<div class="name"><a href="http://www.welcomecentre.ca/services/english-language-classes.html">Vaughan Welcome Centre: English Language Classes</a></div>
					<div class="name"><a href="http://www.yrdsb.edu.on.ca/page.cfm?id=CC0000046">York Region District School Board</a></div>
			<div class="name"><a href="http://www.ycdsb.ca/departments/ACE/ESL.htm">York Catholic District School Board</a></div>

</div>
</div>
<!-- ESL Classes Endss  -->
<!--  Program Starts Here   -->
	<div id="program" class="tab">
		<div class="entry">

<?php
$program = $programs->getNextProgram();

if ($program) {
	$currentScheduleType = "";
	$currentProgramId = -99;
	$i = 0;
	while ($program) {
		$newScheduleType = getScheduleType($program);

		$currentScheduleType = $newScheduleType;

	?>
	<div class="volunteer_event_day">
				<ul>
					<?php

						$lib = false;

						echo $this->renderElement("volunteer_display", array("event"=>$program, "criteria"=>$criteria, "hideName"=>false, "hideBranch"=>$lib));

						$currentProgramId = $program['Program']['id'];

						$currentLibID = $program['Library']['id'];

						$program = $programs->getNextProgram();

						$i++;
						while ($program && $program['Program']['id'] == $currentProgramId) {
							if ($program['Library']['id'] == $currentLibID) $lib = true;

							echo $this->renderElement("volunteer_display", array("event"=>$program, "criteria"=>$criteria, "hideName"=>true, "hideBranch"=>$lib));

							$currentLibID = $program['Library']['id'];

							$program = $programs->getNextProgram();

							$lib = false;

							$i++;
						}
					?>
				</ul>
				<div class="section_end">&nbsp;</div>
			</div>


<?php
}

?>



<?php }


?>
</div>
</div>
<!-- Program ends here  -->
</div>
</div>
</div>
</div>



<?php

	function getLibraryUrl($libraryId,$criteria) {
		return getEventUrl ($criteria, null, $libraryId, null, null, null);
	}

	function getAgeGroupUrl($ageGroupId,$criteria) {
		return getEventUrl ($criteria, null, null, $ageGroupId, null, null);
	}

	function getCategoryUrl($categoryId,$criteria) {
		return getEventUrl ($criteria, null, null, null, $categoryId, null);
	}

	function getAreaUrl($areaId,$criteria) {
		return getEventUrl ($criteria, null, null, null, null, $areaId);
	}

	function getDateUrl($date,$criteria) {
		return getEventUrl ($criteria, $date, null, null, null, null);
	}


	function getEventUrl ($criteria, $date=null, $libraryId=null, $ageGroupId=null, $categoryId=null, $areaId=null) {

		if (isset($libraryId)) $criteria["library"]["id"] = $libraryId;
		if (isset($ageGroupId)) $criteria["ageGroup"]["id"] = $ageGroupId;
		if (isset($categoryId)) $criteria["category"]["id"] = $categoryId;
		if (isset($areaId)) $criteria["area"]["id"] = $areaId;
		if (isset($date)) $criteria["date"] = $date;

		$url = "/programs/index";

		if (isset($criteria["library"]["id"])) $url .= "/library/" . $criteria["library"]["id"];
		if (isset($criteria["ageGroup"]["id"])) $url .= "/age_group/" . $criteria["ageGroup"]["id"];
		if (isset($criteria["category"]["id"])) $url .= "/category/" . $criteria["category"]["id"];
		if (isset($criteria["area"]["id"])) $url .= "/collection/" . $criteria["area"]["id"];
		if (isset($criteria["date"])) $url .= "/" . $criteria["date"];

		return $url;
	}




	function getScheduleType($program) {

		if ((!isset($program['Event']['date']) || substr($program['Event']['date'],8,2) == "00") || ($program['Event']['date'] != $program['Event']['end_date'])) {
			return "period";
		} elseif (isset($program['Event']['date']) && (substr($program['Event']['date'],8,2) != "00") && ($program['Event']['date'] == $program['Event']['end_date'])) {
			return "date";
		} else {
			return "other";
		}
	}

function get_lan_shortName($lan) {
		$shortName="";
	 	switch($lan){
	 	 case "Chinese":
	 	 	$shortName = "chi";
	 	 	break;
	 	 case "Farsi":
		  	$shortName = "per";
	 	 	break;
		case "Gujarati":
			$shortName = "guj";
			break;
		case "Hebrew":
			$shortName = "heb";
			break;
		case "Hindi":
			$shortName = "hin";
			break;
		case "Italian":
			$shortName = "ita";
			break;
		case "Korean":
			$shortName = "kor";
			break;
		case "Malayalam":
			$shortName = "mal";
			break;
		case "Portuguese":
			$shortName = "por";
			break;
		case "Punjabi":
			$shortName = "pan";
			break;
		case "Russian":
			$shortName = "rus";
			break;
		case "Spanish":
			$shortName = "spa";
			break;
		 case "Tamil":
	 		$shortName = "tam";
	 		break;
	 	case "Urdu":
	 		$shortName = "urd";
	 		break;
	 	case "French":
			$shortName = "fre";
			break;
		case "Vietnamese":
			$shortName = "vie";
			break;
	 	}

	 	return $shortName;
 }
 	function get_location($loc) {
 		$shortName=0;
 	 	switch($loc){
 	 	 case "Bathurst Clark Resource Library":
 	 	 	$shortName = 20000;
 	 	 	break;
 	 	 case "Dufferin Clark Library":
 		  	$shortName = 30000;
 	 	 	break;
 		case "Ansley Grove Library":
 			$shortName = 40000;
 			break;
 		case "Kleinburg Library":
 			$shortName = 50000;
 			break;
 		case "Maple Library":
 			$shortName = 60000;
 			break;
 		case "Woodbridge Library":
 			$shortName = 70000;
 			break;
 		case "Pierre Berton Resource Library":
 			$shortName = 80000;
 			break;

 	 	}

 	 	return $shortName;
 }

 function get_format($format) {
  		$shortName="";
  	 	switch($format){
  	 	 case 'Book':
  	 	 	$shortName = "book";
  	 	 	break;
  	 	 case 'DVD':
  		  	$shortName = "movies.dvd";
  	 	 	break;
  		case 'CD':
  			$shortName = "sound_recording.cd";
  			break;
  		case 'Mag':
  			$shortName = "serial";
  			break;
  	 	}

  	 	return $shortName;
 }





?>