
<?php
$this->Html->addCrumb("Home" , "/");
$this->Html->addCrumb("Books & Resources" , "/materials");
?>

<?php
$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Accessibility","url"=>"/about/accessibility"), array("Title"=>"Homebound Access","url"=>"/library_services#more"), array("Title"=>"More Library Services","url"=>"/library_services"), array("Title"=>"Library Catalogue","url"=>"https://catalogue.vaughanpl.info/catalogue/"),  array("Title"=>"Email Librarian","url"=>"/email_librarian")))));

$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>65+</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
<div style="display: none !important;"><h2>65+</h2></div>

		<div class="entry">

	<div id="tabs" class="ui-tabs-nav">

	<ul>
		<li><a href="#service">Library Services</a></li>
		<li><a href="#collection">Collections</a></li>
		<li><a href="#link">Links</a></li>
		<li><a href="#database">Articles & Research</a></li>
		<li><a href="#program">Programs</a></li>
	</ul>
<!-- Library Services Starts -->
	<div id="service" class="tab_senior">
	<h3>Outreach</h3>
	<p>We would be happy to support your organization or facility by visiting you to:</p>
	<ul>
	<li>Teach a library-related skill or resource (e.g., downloading ebooks, accessing medical information in our databases)</li>
	<li>Provide basic computer training</li>
	<li>Provide a program (e.g., book discussion)</li>
	<li>Promote and explain library services and collections that would be of interest to you</li>
	<li>Support your existing programming with displays, resources and information</li>
	</ul>
	<p>If you would like to arrange for any of these outreach services, please contact your local branch at 905-653-READ (7323).</p>

	<h3>Book Deposits</h3>
	<p>Your organization or facility can arrange to have a selection of books and materials delivered to you. If you would like to know more about this service, please contact your local branch at 905-653-READ (7323).</p>

	<h3>Magnifiers</h3>
	<p>Magnifiers that also serve as bookmarks and rulers can be purchased at the service desk for $1. <br/><br/><img src="/img/magnifier.gif" alt="Magnifier"/> </p>


	</div>
<!-- Library Services Ends -->


<!-- Collection Starts -->
	<div id="collection" class="tab_senior">

			<?php //echo $this->Html->image("multilingual/Mag.gif");?>
<h3>Pre-programmed Searches</h3>
		<div class="search_results">
		<ul>
				<li><div class="name"><?php echo $this->Html->link("Audiobooks (all)", "http://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=text&match_2=PHRASE&field_2=text&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&filter_format=sound_recording.audiobook&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Audiobooks - Biographies", "http://catalogue.vaughanpl.info/catalogue/search/query?facet_subject_form=Biography&filter_format=sound_recording.audiobook&sort=dateBookAdded%3Bdescending&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Audiobooks - Fiction", "http://catalogue.vaughanpl.info/catalogue/search/query?facet_subject_form=Fiction&filter_format=sound_recording.audiobook&sort=dateBookAdded%3Bdescending&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Films for people with Hearing Impairments", "http://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=text&match_2=PHRASE&field_2=s&term_2=films+for+the+hearing+impaired&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&facet_ta=g&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Films for People with Visual Impairments", "http://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=text&match_2=PHRASE&field_2=s&term_2=films+for+people+with+visual+disabilities&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Large Print - Biographies", "http://catalogue.vaughanpl.info/catalogue/search/query?facet_subject_form=Biography&filter_format=book.large_print&sort=dateBookAdded%3Bdescending&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Large Print - Fiction", "http://catalogue.vaughanpl.info/catalogue/search/query?facet_subject_form=Fiction&filter_format=book.large_print&sort=dateBookAdded%3Bdescending&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Large Print - Italian Books", "http://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=text&match_2=PHRASE&field_2=text&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&filter_format=book.large_print&filter_lang=ita&theme=vaughan",array("rel"=>"external")); ?> </div></li>

</ul>

			</div>

			<h3>Magazines Geared towards Adults 65+</h3>
		<div class="search_results">
				<?php //echo $this->Html->image("multilingual/Mag.gif");?>
<ul>
				<li><div class="name"><?php echo $this->Html->link("Sixty-Five Plus", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:27345&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Good Times", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:17037&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Reader's Digest: Large Print for Easier Reading", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:463294&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Road Scholar International", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:583504&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Road Scholar North America", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:582978&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("More (US)", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:190118&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Zoomer", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:562037&theme=vaughan",array("rel"=>"external")); ?> </div></li>


				</ul>

			</div>

			<h3>Catalogue Search Help</h3>
			<p>The following words may help you when searching for materials about older adults in the Library Catalogue:</p>
				<ul>
				<li>aging</li>
				<li>older people</li>

				</ul>
				<p>Try adding an additional word or two to one of the above terms in order to specify your particular subject of interest. The order of the words does not matter in the Catalogue search box.</p>
			<p>Some examples:</p>
				<ul>
				<li>aging prevention</li>
				<li>parents aging</li>
				<li>older people care</li>
				<li>older people computers</li>
				<li>health older people</li>
				<li>psychology older people</li>
				<li>travel older people</li>

				</ul>

				<p>For additional help, please contact a library staff member at your local branch at 905-653-READ (7323) or via email by using the <a href="http://www.vaughanpl.info/email_librarian" target="_blank">email librarian form</a>.</p>
<div class="section_end">&nbsp;</div>
</div>
<!----- Collection Ends ------>
<!----- Link Starts ----->
	<div id="link" class="tab_senior">

		<div class="search_results">

		<?php

		foreach ($subjects as $subject) { ?>

				<div class="title"><a href="javascript:toggleMin('<?php echo $subject['subjectID']; ?>')" title="Click to display or hide the list"><?php echo $subject['subjectName']; ?></a></div>
				<div id="<?php echo $subject['subjectID']; ?>" style="display: none">
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
<!----- Database Starts ----->
	<div id="database" class="tab_senior">
		<div class="entry">
<?php $databaseCount = 0; ?>
		<?php foreach ($databases as $database): ?>


			<div class="search_results">

				<div class="name">
					<?php echo $this->Html->link($database['Eproducts']['Name'], $database['Eproducts']['URL'], array("rel"=>"external")); ?>
				</div>
				<div class="description">
					<?php
					//if (strlen($database['Eproducts']['Description'])>59) {
						//echo substr($database['Eproducts']['Description'],0,strpos($database['Eproducts']['Description']," ",60));
					//} else {
						echo $database['Eproducts']['Description'];
					//}
					?>
					<?php //echo $this->Html->link("more", "/databases/view/".$database['Eproducts']["Short"]); ?><br/>
					<?php echo $this->Html->link($database['Eproducts']['Availability'], $database['Eproducts']['URL'], array("rel"=>"external")); ?>
<br/><br/>
					<?php if ($database['Eproducts']['Help']) { ?>
					&nbsp;&nbsp;

					<a href="javascript:var newwindow=window.open('<?php echo '/files/dbhelp' . $database['Eproducts']['Help']; ?>','popuppage','width=500,height=600,top=100,left=350, scrollbars=yes'); if (window.focus) {newwindow.focus();}">How to search ...</a>

					<?php }?>
				</div>
			</div>
			<?php $databaseCount ++; ?>
		<?php endforeach; ?>

</div>
</div>
<!----- Database Ends ------>
<!-- --------------Program Starts Here -------- -->
	<div id="program" class="tab_senior">
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

						echo $this->element("volunteer_display", array("event"=>$program, "criteria"=>$criteria, "hideName"=>false, "hideBranch"=>$lib));

						$currentProgramId = $program['Program']['id'];

						$currentLibID = $program['Library']['id'];

						$program = $programs->getNextProgram();

						$i++;
						while ($program && $program['Program']['id'] == $currentProgramId) {
							if ($program['Library']['id'] == $currentLibID) $lib = true;

							echo $this->element("volunteer_display", array("event"=>$program, "criteria"=>$criteria, "hideName"=>true, "hideBranch"=>$lib));

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
<!----------------------------Program ends here -------------------->

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