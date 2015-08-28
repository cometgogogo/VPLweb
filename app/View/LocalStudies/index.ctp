<?php
$this->Html->addCrumb("Home" , "/");
$this->Html->addCrumb("Books & Resources" , "/materials");
?>

<?php
$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Welcome Brochures","url"=>"/materials/welcome"), array("Title"=>"Borrowing Materials","url"=>"/services/borrowing"), array("Title"=>"Library Services","url"=>"/library_services"), array("Title"=>"Email Librarian","url"=>"/email_librarian")))));

$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Local Studies</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<div class="intro"><h2><span style="display: none !important;">Local Studies Content</span></h2></div>
		<div class="entry">
	<div id="tabs" class="ui-tabs-nav">

	<ul>
		<li><a href="#collection">Library Collections</a></li>
		<li><a href="#database">Article & Research</a></li>
		<li><a href="#link">Links</a></li>
		<li><a href="#history">Villages to City</a></li>

	</ul>

<!-----Collection Starts ----->
	<div id="collection" class="tab">

			<h3><a href="http://catalogue.vaughanpl.info/catalogue/search/query?field_1=s&term_1=Genealogy&facet_ta=g" rel="external">Genealogy</a></h3>
			<h3><a href="http://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=&term_1=York+(Ont.+:+Regional+municipality)&sort=dateBookAdded%3Bdescending" rel="external">York Region</a></h3>
			<h3><a href="http://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=s&term_1=Vaughan+Ont.&sort=sort_ss_date%3Bdescending,sort_ss_author" rel="external">Vaughan</a></h3>


</div>
<!----- Collection Ends ------>
<!----- Database Starts ----->
	<div id="database" class="tab">
		<div class="entry">

		<?php foreach ($databases as $database): ?>


			<div class="list_with_summary">

				<div class="name">
					<?php echo $this->Html->link($database['Eproducts']['Name'], $database['Eproducts']['URL'], array("rel"=>"external")); ?>
				</div>
				<div class="summary">
					<?php
					if (strlen($database['Eproducts']['Description'])>59) {
						echo substr($database['Eproducts']['Description'],0,strpos($database['Eproducts']['Description']," ",60));
					} else {
						echo $database['Eproducts']['Description'];
					}
					?>&nbsp;...
					<?php echo $this->Html->link("more...", "/databases/view/".$database['Eproducts']["Short"]); ?><br /><br />
					<?php echo $this->Html->link($database['Eproducts']['Availability'], $database['Eproducts']['URL'], array("rel"=>"external")); ?>

					<?php if ($database['Eproducts']['Help']) { ?>
					&nbsp;&nbsp;

					<a href="javascript:var newwindow=window.open('<?php echo '/files/dbhelp' . $database['Eproducts']['Help']; ?>','popuppage','width=500,height=600,top=100,left=350, scrollbars=yes'); if (window.focus) {newwindow.focus();}">How to search ...</a>

					<?php }?>
				</div>
			</div>
			
		<?php endforeach; ?>

</div>
</div>
<!----- Database Ends ------>

<!----- Link Starts ----->
	<div id="link" class="tab">

		<div class="search_results">
	
		<?php

		foreach ($subjects as $subject) { 
			$cur = $subject['subjectName'];			
			$cur = str_replace(' ', '_', $cur);
			?>

				<div class="title"><a href="javascript:toggleMin('<?php echo $cur; ?>')" title="Click to display or hide the list"><?php echo $subject['subjectName']; ?></a></div>
				<div id="<?php echo $cur; ?>" style="display: none">
				<?php foreach ($subject['links'] as $link) { ?>

				

				<div class="name"><?php echo $this->Html->link($link['Link']['TitleOfWebsite'],$link['Link']['UrlOfWebsite'],array("rel"=>"external")); ?></div>
				<div class="description"><?php echo $link['Link']['Description']; ?></div>
				<div class="technical_details">Prepared By: <?php echo $link['Link']['WebsitePublisher']; ?></div>
				<div class="technical_details">Date Reviewed by Vaughan Public Libraries: <?php echo $link['Link']['DateUpdated']; ?></div>
				<div class="url"><?php echo str_replace ( array("&","+","%","/"), array("&<wbr>","+<wbr>","%<wbr>","/<wbr>"), $link['Link']['UrlOfWebsite']); ?></div>
				<br/>
				<?php } ?>
				</div>
		<?php } ?>
	

</div>
</div>
<!-----Link Ends ------>
<!----- History Starts ----->
	<div id="history" class="tab">

		<div class="entry">

			<p>
				VPL's first digital local studies project is <a href="http://images.ourontario.ca/vaughan/">Villages to City</a>, an oral history of life in Vaughan.  Listen to the stories of Vaughan residents as they are interviewed by volunteers.  All interviews can be listened to in mp3 format and many have also been transcribed.  Villages to City was created with the support of the Government of Ontario through the Programs and Services Branch of the Ministry of Culture and is hosted by <a target="_blank" href="http://www.ourontario.ca/" rel="external">OurOntario.ca</a>.
			</p>

			<style media="screen" type="text/css">
			    @import "http://www.OurOntario.ca/portlets/_common/minisearch.css";
			    form.minisearch-oo h4 {background: transparent url("https://data.ourontario.ca/Partners/vpl/Graphics/Searchtile2_VPL_s_105.jpg") no-repeat top left;}
			</style>
			<form class="minisearch minisearch-oo" method="get" action="http://images.ourontario.ca/vaughan/results.asp">
			
			   <fieldset><legend style="display: none !important;">VPL Local Studies</legend>
			   <label for="q" style="display: none !important;">Keyword Search</label>
			      <input class="minisearch" size="30" name="q" id="q" type="text">
			      <input alt="submit" title="submit" src="http://www.OurOntario.ca/portlets/_common/minisearch_button.jpg" class="minisubmit" value="submit" type="image">
			      <p>VPL's Local Studies Collection includes<br>information about the community,<br>geography and history of the city of<br>Vaughan.<a href="http://images.ourontario.ca/vaughan/search.asp"> Visit our site</a></p>
			   </fieldset>
			</form>

		</div>
</div>
<!-----History Ends ------>





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