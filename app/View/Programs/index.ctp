<?php

$html->addCrumb("Home" , "/");
$html->addCrumb("What's On" , "/news_and_events");
$html->addCrumb("Programs & Events" , "/programs");
$this->pageTitle = "";
if (isset($criteria["library"]["shortName"])) {
	$html->addCrumb($criteria["library"]["shortName"] , "/programs/index/library/" . $criteria["library"]["id"]);
	if ($this->pageTitle == "") {
		$this->pageTitle .= "Programs - ".$criteria["library"]["shortName"];
	} else {
		$this->pageTitle .= " - ".$criteria["library"]["shortName"];
	}
}
if (isset($criteria["ageGroup"]["name"])){
	$html->addCrumb($criteria["ageGroup"]["name"] , "/programs/index/age_group/" . $criteria["ageGroup"]["id"]);
	if ($this->pageTitle == "") {
		$this->pageTitle .= "Programs - ".$criteria["ageGroup"]["name"];
	} else {
		$this->pageTitle .= " - ".$criteria["ageGroup"]["name"];
	}
}
if (isset($criteria["category"]["name"])){
	$html->addCrumb($criteria["category"]["name"] , "/programs/index/category/" . $criteria["category"]["id"]);
	if ($this->pageTitle == "") {
		$this->pageTitle .= "Programs - ".$criteria["category"]["name"];
	} else {
		$this->pageTitle .= " - ".$criteria["category"]["name"];
	}
}
if (isset($criteria["area"]["name"])) {
	$html->addCrumb($criteria["area"]["name"] , "/programs/index/collection/" . $criteria["area"]["id"]);
	if ($this->pageTitle == "") {
		$this->pageTitle .= "Programs - ".$criteria["area"]["name"];
	} else {
		$this->pageTitle .= " - ".$criteria["area"]["name"];
	}
}
if (isset($criteria["date"])) {
	$html->addCrumb($criteria["date"] , "/programs/index/" . $criteria["date"]);
	if ($this->pageTitle == "") {
		$this->pageTitle .= "Programs ";
		if ($date_arg) {
			$this->pageTitle .= " - ".$criteria["date"];
		}
	}  else if ($date_arg) {
		$this->pageTitle .= " - ".$criteria["date"];
	}
}

?>





<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Programs & Events</h1>
	</div>
	<div class="closing"></div>
</div>



<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="section_end">&nbsp;</div>
		<?php
		if (isset($criteria["library"]["shortName"]) ||
			isset($criteria["textSearch"]["name"]) ||
			isset($criteria["ageGroup"]["name"]) ||
			isset($criteria["category"]["name"]) ||
			isset($criteria["area"]["name"]) ||
			isset($criteria["schedule"]["name"])
		) {
		?>
			<div class="current_selection">
				<?php
				if (isset($criteria["textSearch"]["name"])) echo "<div class='search'>Search: &quot;" . $criteria["textSearch"]["name"] . "&quot;</div>";
				if (isset($criteria["library"]["shortName"])) echo "<div class='library'>" . $html->link($criteria["library"]["shortName"], "/events_calendars/calendar/library/" . $criteria["library"]["id"]) . "</div>";
				if (isset($criteria["ageGroup"]["name"])) echo "<div class='age_group'>" . $html->link($criteria["ageGroup"]["name"], "/programs/index/age_group/" . $criteria["ageGroup"]["id"]) . "</div>";
				if (isset($criteria["category"]["name"])) echo "<div class='category'>" . $html->link($criteria["category"]["name"], "/programs/index/category/" . $criteria["category"]["id"]) . "</div>";
				if (isset($criteria["area"]["name"])) echo "<div class='collection'>" . $html->link($criteria["area"]["name"], "/programs/index/collection/" . $criteria["area"]["id"]) . "</div>";
				if (isset($criteria["schedule"]["name"])) echo "<div class='search'>" . $criteria["schedule"]["name"] . "</div>";
				?>
				<div class="section_end">&nbsp;</div>
			</div>
		<?php } ?>

		<div class="section_end">&nbsp;</div>

		<?php

		$program = $programs->getNextProgram();

		?>
		<?php if ($program) { ?>


			<?php



				$currentScheduleType = "";
				$currentProgramId = -99;
				$i = 0;
				while ($program) {

//echo "****",$program['Program']['id'],"<br/>";

					$newScheduleType = getScheduleType($program);
					if ($newScheduleType == "period" && $currentScheduleType != "period") {
						echo "<br /><br /><h2>Ongoing ";
						echo date_format(new DateTime($program['Schedule']['start_date']), "F j, Y") .
							" to " .
							date_format(new DateTime($program['Schedule']['end_date']), "F j, Y");
						echo "</h2>";
					} elseif ($newScheduleType == "date" && $currentScheduleType != "date" && $i > 0) {
						echo "<br /><br /><h2>Programs Coming Up</h2>";
					}
					$currentScheduleType = $newScheduleType;


					switch ($currentScheduleType) {
						case "date":

							if ($i==0) {
								$eventDayClass = " main";
								$monthFormat = "F";
								$dayFormat = "j";
								$weekdayFormat = "l";
							} else {
								$eventDayClass = "";
								$monthFormat = "M";
								$dayFormat = "j";
								$weekdayFormat = "D";
							}
							?>
							<div class="event_day <?php echo $eventDayClass; ?>">
								<div class="calendar_day">
									<?php $numericDate = new DateTime($program['Event']['date']); ?>
									<div class="year"><?php echo date_format($numericDate, "Y"); ?></div>
									<div class="month"><?php echo date_format($numericDate, $monthFormat); ?></div>
									<div class='day'><?php echo date_format($numericDate, $dayFormat); ?></div>
									<div class="weekday"><?php echo date_format($numericDate, $weekdayFormat); ?></div>
								</div>



								<?php
									if ($i==0) {
										echo '<ul class="level_1">';
										$currentDate = $program['Event']['date'];
										echo $this->renderElement("event_display", array("event"=>$program, "criteria"=>$criteria));
										echo '</ul>';
										echo "<div class='section_end'>&nbsp;</div>";

										$program = $programs->getNextProgram();
										$i++;
									}
								?>

								<ul class="level_3">
									<?php
										$currentDate = $program['Event']['date'];
										while ($program && getScheduleType($program) == "date" && $program['Event']['date'] == $currentDate) {

											echo $this->renderElement("event_display", array("event"=>$program, "criteria"=>$criteria));

											$program = $programs->getNextProgram();
											$i++;
										}

									?>
								</ul>
								<div class="section_end">&nbsp;</div>
							</div>
							<?php

							break;
						case "period":
							?>
							<div class="event_day">
								<ul>
									<?php
										echo $this->renderElement("event_display", array("event"=>$program, "criteria"=>$criteria, "hideName"=>false));
										$currentProgramId = $program['Program']['id'];

										$program = $programs->getNextProgram();
										$i++;
										while ($program && getScheduleType($program) == "period" && $program['Program']['id'] == $currentProgramId) {
											echo $this->renderElement("event_display", array("event"=>$program, "criteria"=>$criteria, "hideName"=>true));

											$program = $programs->getNextProgram();
											$i++;
										}
									?>
								</ul>
								<div class="section_end">&nbsp;</div>
							</div>
							<?php
							break;
						default:
							$program = $programs->getNextProgram();
							$i++;
							break;


					}



				}

			?>



		<?php } else { 	?>
			<div class="event_day main">
				<?php if (isset($criteria["date"])) { ?>


					<div class="calendar_day">
						<?php $numericDate = new DateTime($criteria["date"]); ?>
						<div class="year"><?php echo date_format($numericDate, "Y"); ?></div>
						<div class="month"><?php echo date_format($numericDate, "F"); ?></div>
						<?php echo $html->link(date_format($numericDate, "j"), getDateUrl($criteria["date"],$criteria),array("class"=>"day")); ?>
						<div class="weekday"><?php echo date_format($numericDate, "l"); ?></div>
					</div>
				<?php } ?>
				<ul class="level_1">


					<li>
						<h2>No events were found for your selection.</h2>

						<div class="description">See <?php echo $html->link("What's On", "/programs"); ?> at Vaughan Public Libraries.</div>

						<?php if (isset($criteria["library"]["shortName"])) { ?>
						<div class="library">
							<?php echo $html->link($criteria["library"]["shortName"],"/events_calendars/calendar/library/" . $criteria["library"]["id"]); ?>
						</div>
						<?php } ?>
						<?php if (isset($criteria["ageGroup"]["name"])) { ?>
							<div class="age_group">
								<?php echo $html->link($criteria["ageGroup"]["name"], "/programs/age_group/" . $criteria["ageGroup"]["id"]); ?>
							</div>
						<?php } ?>
						<?php if (isset($criteria["category"]["name"])) { ?>
							<div class="category">
								<?php echo $html->link($criteria["category"]["name"], "/programs/category/" . $criteria["category"]["id"]); ?>
							</div>
						<?php } ?>

					</li>


				</ul>
			</div>
		<?php } ?>

		<?php
			$num_schedules = count($schedules);

			if ($num_schedules > 0) {
				$k = 0;
				while ($k<$num_schedules) {
					if ($schedules[$k]['id'] == $criteria['schedule']['id']) {
						break;
					}
					$k++;
				}

				$today = date("Y-m-d");

				// check the next available schedule
				if ($k<$num_schedules-1) {
					$next_schedule = $schedules[$k+1]['id'];

					$diff = strtotime($schedules[$k+1]['start_date']) - strtotime($today);

					// show the link within 30 days away from the next schedule

					if ($programs->hasLiveEvents($next_schedule) && ($diff < 2592000)) {

						if ($schedules[$k+1]['start_date'] < $today) {
							$start = $today;
						} else {
							$start = $schedules[$k+1]['start_date'];
						}

						$url = getEventUrl ($criteria, $start, $criteria["library"]["id"], $criteria["ageGroup"]["id"], $criteria["category"]["id"], $criteria["area"]["id"]);
						//echo $url, "<br/>";
						echo "<div class='collection'>" . $html->link("More programs during  ".date_format(new DateTime($schedules[$k+1]['start_date']), "F j, Y") . " to " . date_format(new DateTime($schedules[$k+1]['end_date']), "F j, Y"), $url)."</div>";

					}
				}


				// check the previous schedule
				if ($k>0) {
					$prev_schedule = $schedules[$k-1]['id'];
					if ($programs->hasLiveEvents($prev_schedule)) {
						if ($schedules[$k-1]['start_date'] < $today) {
							$start = $today;
						} else {
							$start = $schedules[$k-1]['start_date'];
						}

						$url = getEventUrl ($criteria, $start, $criteria["library"]["id"], $criteria["ageGroup"]["id"], $criteria["category"]["id"], $criteria["area"]["id"]);
						//echo $url, "<br/>";

						echo "<div class='collection'>" . $html->link("More programs during  ".date_format(new DateTime($schedules[$k-1]['start_date']), "F j, Y") . " to " . date_format(new DateTime($schedules[$k-1]['end_date']), "F j, Y"), $url)."</div>";

					}
				}
			}
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