<?php include("crumbs.php"); ?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Employment Opportunities","url"=>"/jobs"),array("Title"=>"Programs and Events","url"=>"/programs"), array("Title"=>"Reading Buddies Reader Application Form","url"=>"/files/forms/rb.pdf"), array("Title"=>"Beyond the Basics Application Form","url"=>"/files/techSavvySenior.pdf")))));
	$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Volunteer Opportunities</h1>
	</div>
	<div class="closing"></div>
</div>



<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<?php

		$program = $programs->getNextProgram();

		?>
		<?php if ($program) { ?>


			<?php

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

		&nbsp;
	</div>
	<div class="closing"></div>



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




?>