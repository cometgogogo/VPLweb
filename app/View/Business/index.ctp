
<?php
$this->Html->addCrumb("Home" , "/");
$this->Html->addCrumb("Books & Resources" , "/materials");
?>

<?php
$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Meeting Room Rentals","url"=>"/library_services#room"), array("Title"=>"Library Catalogue","url"=>"https://catalogue.vaughanpl.info/catalogue/"), array("Title"=>"Library Services","url"=>"/library_services"), array("Title"=>"Email Librarian","url"=>"/email_librarian")))));

$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Business Information</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"><h2><span style="display: none !important;">Business Information Content</span></h2></div>
	<div class="details">


		<div class="entry">
	<div id="tabs" class="ui-tabs-nav">

	<ul>
		<li><a href="#collection">Library Collections</a></li>
		<li><a href="#arrival">New Arrivals</a></li>
		<li><a href="#link">Links</a></li>
		<li><a href="#database">Articles & Research</a></li>
		<li><a href="#workshop">Research Help</a></li>
		<li><a href="#program">Programs</a></li>
	</ul>


<!-----Magazines & Topics Starts ----->
	<div id="collection" class="tab">

			<?php //echo $this->Html->image("multilingual/Mag.gif");?>
<h3>Business Magazines</h3>
		<div class="search_results">
		<ul>
				<li><div class="name"><?php echo $this->Html->link("Bloomberg Business Week", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:579258&theme=vaughan",array("rel"=>"external")); ?> </div></li>
				<li><div class="name"><?php echo $this->Html->link("CA Magazine", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:186573&theme=vaughan",array("rel"=>"external")); ?> </div></li>
				<li><div class="name"><?php echo $this->Html->link("Canadian Business", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:16508&theme=vaughan"); ?> </div></li>
				<li><div class="name"><?php echo $this->Html->link("Canadian Moneysaver", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:26581&theme=vaughan",array("rel"=>"external")); ?> </div></li>
				<li><div class="name"><?php echo $this->Html->link("Consumer Reports", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:588041&theme=vaughan",array("rel"=>"external")); ?> </div></li>
				<li><div class="name"><?php echo $this->Html->link("The Economist", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:26148&theme=vaughan",array("rel"=>"external")); ?> </div></li>
				<li><div class="name"><?php echo $this->Html->link("Focus", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:587097&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Forbes", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:191381&theme=vaughan",array("rel"=>"external")); ?> </div></li>
				<li><div class="name"><?php echo $this->Html->link("Fortune", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:186557&theme=vaughan",array("rel"=>"external")); ?> </div></li>
				<li><div class="name"><?php echo $this->Html->link("Franchise Canada", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:425805&theme=vaughan",array("rel"=>"external")); ?> </div></li>
				<li><div class="name"><?php echo $this->Html->link("Futurist", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:27700&theme=vaughan",array("rel"=>"external")); ?> </div></li>
				<li><div class="name"><?php echo $this->Html->link("Harvard Business Review", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:27074&theme=vaughan",array("rel"=>"external")); ?> </div></li>
				<li><div class="name"><?php echo $this->Html->link("Home Business", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:235846&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Inc.", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:312239&theme=vaughan",array("rel"=>"external")); ?> </div></li>
				<li><div class="name"><?php echo $this->Html->link("MoneyLetter", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:186592&theme=vaughan",array("rel"=>"external")); ?> </div></li>
				<li><div class="name"><?php echo $this->Html->link("MoneySense", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:167350&theme=vaughan",array("rel"=>"external")); ?> </div></li>
				<li><div class="name"><?php echo $this->Html->link("Smart Money", "https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:315508&theme=vaughan",array("rel"=>"external")); ?> </div></li>

</ul>

			<div class="section_end">&nbsp;</div>

			</div>

			<h3>Business Related Topics</h3>
		<div class="search_results">
				<?php //echo $this->Html->image("multilingual/Mag.gif");?>
<ul>
				<li><div class="name"><?php echo $this->Html->link("Accounting", "https://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=s&term_1=accounting&match_2=PHRASE&field_2=text&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Business Directories", "https://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=s&term_1=business&match_2=MUST&field_2=s&term_2=directories&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Business Planning", "https://catalogue.vaughanpl.info/catalogue/search/query?match_1=PHRASE&field_1=s&term_1=business+planning&match_2=PHRASE&field_2=text&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Canadian Small Business Law", "https://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=s&term_1=small+business&match_2=MUST&field_2=s&term_2=law+and+legislation&match_3=MUST&field_3=s&term_3=canada&match_4=NOT&field_4=text&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Franchising", "https://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=s&term_1=franchises&match_2=PHRASE&field_2=text&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Importing & Exporting", "https://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=s&term_1=imports&match_2=MUST&field_2=s&term_2=exports&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&theme=vaughan",array("rel"=>"external")); ?> </div></li>


				<li><div class="name"><?php echo $this->Html->link("Internet Marketing", "https://catalogue.vaughanpl.info/catalogue/search/query?match_1=PHRASE&field_1=s&term_1=internet+marketing&match_2=PHRASE&field_2=text&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				<li><div class="name"><?php echo $this->Html->link("Leadership", "https://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=s&term_1=leadership&match_2=NOT&field_2=s&term_2=fiction&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&theme=vaughan",array("rel"=>"external")); ?> </div></li>

				</ul>

			</div>
</div>
<!----- Magazines & Topics Ends ------>
<!----- New Arrival Starts ----->
	<div id="arrival" class="tab">
	<div class="entry">

		<div class="rss_title_left">
		<a class="link_rss_right" href="http://www.vaughanpl.info/new_arrivals/feed/<?php echo $list['NewArrival']['ListID']; ?>" title="Subscribe to this list"><span class="graphic_link_caption">Subscribe to this list</span></a>
		</div>

		<div class="rss_title_right">
		<h3> <?php echo $list['NewArrival']['ListName']?></h3>
		</div>


		<table id="new_arrivals_table">
		<?php foreach ($list['NewArrivalRecord'] as $record) {

			$image_width = 0;

			echo "<tr><td rowspan='2'>";

			if (isset($record['ISBN'])) {

				$image="http://lib.syndetics.com/index.aspx?isbn=".$record['ISBN']."/MC.GIF";

				?>

				<a href="https://catalogue.vaughanpl.info/catalogue/lib/item?id=<?php echo $record['BibID']; ?>" rel="external"><img src="<?php echo $image; ?>" height="80" class="img_wrapped_left" alt="Find it in the catalogue" /></a>
				<?php

			}


			echo "</td><td>";


			echo $this->Html->link($record['Title'], "https://catalogue.vaughanpl.info/catalogue/lib/item?id=".$record['BibID'], array("rel"=>"external"));
			if (isset($record['AltTitle'])) {
				echo "<br/>";
				echo $record['AltTitle'];
			}
			echo "</td></tr>";

			echo "<tr><td>";
			echo $record['Details'];

			echo "</td></tr>";
			echo "<tr><td colspan='2'>&nbsp;</td></tr>";

		} ?>
		</table>
				<div class="section_end">&nbsp;</div>
	</div>


</div>
<!-----New Arrival Ends ------>
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
					<?php echo $this->Html->link("more...", "/databases/view/".$database['Eproducts']["Short"]); ?><br /><br />
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
<!---Workshop Starts -------------->
<div id="workshop" class="tab">
<div class="entry">Need help locating Business resources? Try our <a href="/email_librarian">email reference service</a> or a one-on-one workshop.</div>
<div class="entry">
		<h3>One-On-One Workshop</h3>
				<p>This one-on-one, 60-minute workshop will provide an introduction to company and industry resources available at VPL and on the web. Learn how to find companies in your industry! Please book an appointment at the Information Desk or by filling out the form below. Please note that appointments must be booked at least one week in advance.
		</p>
		</div>

		<?php echo $this->Form->create('Business', array('url'=>'http://vm2.vaughanpl.info/business#workshop')); ?>
			<div class="whole_width">
				<?php if ($errors) { ?>
					<div class="important_note">
						<?php echo $this->Html->image("error_indicator_general.gif", array("align"=>"left")); ?>
						Your inquiry could not be submitted due to errors in your input. Please correct the errors indicated below and send again.
					</div>
				<?php } ?>

			
		<div class="entry">
				<p>	Please note that entries indicated with asterisk (*) are required.</p>
				<fieldset><legend>About Yourself</legend>

					<div class="field">
						<?php echo $this->Form->input('BusinessWorkshop.name', array('label' => '*Name: ','between'=>'<div class=field_input>', 'size'=>'20','maxlength'=>'20', 'after'=>'</div>')); ?>						
					</div>

					<div class="field">
						<?php echo $this->Form->input('BusinessWorkshop.homephone', array('label' => 'Telephone: ','between'=>'<div class=field_input>', "size"=>"15","maxlength"=>"20", 'after'=>'</div>')); ?>						
					</div>


					<div class="field">
						<?php echo $this->Form->input('BusinessWorkshop.email', array('label' => '*Email: ', 'between'=>'<div class=field_input>', 'size'=>'35','maxlength'=>'70', 'after'=>'</div>')); ?>					
					</div>
						
					<div class="field">
						<?php 
							echo $this->Form->input('BusinessWorkshop.library', array('label' => '*Home Branch: ','between'=>'<div class=field_input>', 'options' =>$libraries ,'empty' => '(choose one)', 'after'=>'</div>'));						
						?>							
					</div>
					</fieldset>

					<fieldset><legend>Additional Information</legend>
					<div class="field">
					
						<?php echo $this->Form->input('BusinessWorkshop.time_slot', array('label' => '*When are you available to attend: ', 'between'=>'<div class=field_input>', 'options'=>$time_slot, 'multiple'=>'checkbox','after'=>'</div>')); ?>	
						
						
					</div>

					<div class="field">
					
						<?php echo $this->Form->input('BusinessWorkshop.help', array('label' => '*For what kind of information are you looking?','between'=>'<div class=field_input>',  'type'=>'textarea', 'cols'=>'47','rows'=>'10', 'after'=>'</div>')); ?>					
						
					</div>

					<div class="field">
						<?php 
						//echo $this->Form->radio('BusinessWorkshop.plan', array("Yes"=>"Yes", "No"=>"No"), array('label' => 'More: Do you require this information for a business plan?','between'=>'<div class=field_input>', 'legend' => false, 'after'=>'</div>')); 
						echo $this->Form->label('BusinessWorkshop.plan', 'Do you require this information for a business plan?');
						echo $this->Form->input('BusinessWorkshop.plan', array('div'=>'field_input_radio','type'=>'radio', 'options'=>array("Yes"=>"Yes", "No"=>"No"), 'legend' => false)); 
						
						?>
						

					</div>

					<div class="field">
						<?php echo $this->Form->input('BusinessWorkshop.source', array('label' => 'How did you find out about this program: ', 'between'=>'<div class=field_input>', 'options'=>$source, 'multiple'=>'checkbox', 'after'=>'</div>')); ?>							
						
					</div>


			</fieldset>


				<?php echo $this->Form->submit("Submit", array("class"=>"submit_button")); ?>
				
			</div>
			</div>
				<div id="book_for_book_clubs_reservation_spacer"></div>
		</form>
</div>
<!---Workshop Ends -------------->
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