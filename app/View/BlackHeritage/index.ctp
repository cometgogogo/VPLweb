
<?php
$this->Html->addCrumb("Home" , "/");
$this->Html->addCrumb("Books & Resources" , "/materials");
?>

<?php
$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Library Catalogue","url"=>"http://catalogue.vaughanpl.info/catalogue/"), array("Title"=>"Library Services","url"=>"/library_services"), array("Title"=>"Email Librarian","url"=>"/email_librarian")))));

$relatedContentElements[1] = array ('pin_black_history');

$this->set('relatedContentElements', $relatedContentElements);
?>



<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Black Heritage</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">


		<div class="entry">
	<div id="tabs" class="ui-tabs-nav">

	<ul>
		<li><a href="#guide">Library Guide</a></li>
		<li><a href="#link">Links</a></li>
		<li><a href="#database">Articles & Research</a></li>		
		<li><a href="#program">Programs</a></li>
	</ul>
<!----- Library Guide Starts ----->	
	<div id="guide" class="tab">			
		
		<div class="entry">
		<p>Listed here are subject-based library guides prepared by VPL librarians on Black Heritage-related topics.</p>
		
			<p>
				When visiting a branch to consult the resources listed in these guides, 
				please remember that the main collection for Black Heritage is held at the
				<?php echo $this->Html->link("Dufferin Clark Library", "/libraries/view/3"); ?>
			</p>
			
			<p>
				Please <?php echo $this->Html->link("Email Librarian", "/email_librarian"); ?> about resources on any topic for which a Guide is not currently available.
			</p>
			
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif");?>
				<?php echo $this->Html->link("Black Heritage Collection", "/files/booklists/blackheritagelibraryguide.pdf", array("rel"=>"external")); ?> (194 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			
			
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif");?>
				<?php echo $this->Html->link("Black History Month - Adult Fiction", "/files/booklists/bhm_adultfiction.pdf", array("rel"=>"external")); ?> (190 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			
			
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif");?>
				<?php echo $this->Html->link("Black History Month - Junior Fiction", "/files/booklists/bhm_juniorfiction.pdf", array("rel"=>"external")); ?> (218 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif");?>
				<?php echo $this->Html->link("Black History Month - Non-fiction", "/files/booklists/bhm_nonfic.pdf", array("rel"=>"external")); ?> (195 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			
			
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif");?>
				<?php echo $this->Html->link("Black History Month - Junior Picture Books", "/files/booklists/bhm_juniorpicture.pdf", array("rel"=>"external")); ?> (132 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			
			
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif");?>
				<?php echo $this->Html->link("Black History Month -  For Your Viewing & Listening Pleasure", "/files/booklists/bhm_pleasure.pdf", array("rel"=>"external")); ?> (193 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			

			<?php echo $this->element('adobe_download'); ?>
		</div>
		&nbsp;
</div>
<!----- Library Guide Ends ----->
<!----- Link Starts ----->
	<div id="link" class="tab">
	<div class="search_results">
				
				
				<ul>


					<?php foreach ($links as $link) { ?>
						<li>
							<div class="name"><?php echo $this->Html->link($link['Link']['TitleOfWebsite'],$link['Link']['UrlOfWebsite'],array("rel"=>"external")); ?></div>
							<div class="description"><?php echo $link['Link']['Description']; ?></div>
							<div class="technical_details">Prepared By: <?php echo $link['Link']['WebsitePublisher']; ?></div>
							<div class="technical_details">Date Reviewed by Vaughan Public Libraries: <?php echo $link['Link']['DateUpdated']; ?></div>
							<div class="url"><?php echo str_replace ( array("&","+","%","/"), array("&<wbr>","+<wbr>","%<wbr>","/<wbr>"), $link['Link']['UrlOfWebsite']); ?></div>
						</li>
					<?php } ?>
				</ul>
				<div class="section_end">&nbsp;</div>
			</div>
		
</div>


			
<!-----Link Ends ------>

<!----- Database Starts ----->
	<div id="database" class="tab">
		<div class="entry">
<?php $databaseCount = 0; ?>
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
					<?php echo $this->Html->link("more", "/databases/view/".$database['Eproducts']["Short"]); ?><br /><br />
					<?php echo $this->Html->link($database['Eproducts']['Availability'], $database['Eproducts']['URL'], array("rel"=>"external")); ?>

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