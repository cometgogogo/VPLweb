<?php
$html->addCrumb("Home" , "/");
$html->addCrumb("What's On" , "/news_and_events");
$html->addCrumb("Programs & Events" , "/programs");

if (!isset($program['Program']['ProgramName'])) {
	$this->pageTitle = "Programs - Not Found " . $id;
} else {
	$this->pageTitle = "Programs - ". $program['Program']['ProgramName'];
}
?>



<div id="page_header">
	<div class="opening"></div>
	<div class="details">
	<h1>
	<?php
	if (isset($program['Program']['ProgramName'])) {
		echo $program['Program']['ProgramName'];
	} else {
		echo "No program found";
	}
	?></h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<div class="section_end">&nbsp</div>




		<div class="event_day main">
			<ul class="level_1">
				<li>
					<?php
	if (isset($program['Program']['ProgramName'])) {

					foreach ($program['Category'] as $category) {
						if ($category['visible']) {?>
						<div class="category">
							<?php

							echo $html->link($category['CategoryName'], "/programs/index/category/" . $category['CategoryID'], array("title"=>"Click here to view other programs in this category")); ?>
						</div>
					<?php }
					} ?>

					<?php if (!empty($program["Program"]['Description'])) { ?>
						<div class="description">
							<?php if(!empty($program["Program"]['Image'])) { ?>
								<img src="<?php echo "/img/events/" . $program['Program']['Image']; ?>">
							<?php } ?>
							<?php echo $program['Program']['Description']?>

							<?php if (!empty($program["Program"]['SpecialNotes'])) {
								echo "<br/><br/>", $program['Program']['SpecialNotes'];
							}?>
							<div class="section_end"></div>
						</div>
					<?php } ?>

					<?php if ($program["Program"]['Fee']>0) { ?>


							<?php echo "Admission is $" . $program['Program']['Fee'] . "."?>


					<?php } ?>

				</li>
			</ul>
			<div class="section_end">&nbsp</div>
		</div>



		<h2>Schedule</h2>



		<?php if (isset($program['Event'])) { ?>
				<?php $currentDate = -1; ?>
				<?php $currentLibrary = -1; ?>
				<?php $currentSchedule = -1; ?>
				<?php $pendingRegistration = ""; ?>
				<?php $i = 0 ?>
				<?php

				//echo "***".count($program['Event'])."***";

				while ($i < count($program['Event'])) { ?>
					<?php $event = $program['Event'][$i]; ?>

					<div class="event_day">
						<?php if (isset($event['date']) && substr($event['date'],8,2) != "00" && $event['date'] == $event['end_date']) { ?>
							<?php $currentDate = $event['date']; ?>
							<div class="calendar_day">
								<div class="year"><?php echo date("Y", strtotime($event['date'].' '.$event['time'])); ?></div>
								<div class="month"><?php echo date("M", strtotime($event['date'].' '.$event['time'])); ?></div>
								<div class="day"><?php echo $html->link(date("j", strtotime($event['date'].' '.$event['time'])), "/programs/index/" . $event['date']); ?></div>
								<div class="weekday"><?php echo date("D", strtotime($event['date'].' '.$event['time'])); ?></div>
							</div>
						<?php } elseif ($currentDate != -1) { ?>
							<div class="calendar_day_spacer">
								&nbsp;
							</div>
						<?php } ?>

						<ul class="level_1">
							<li>
								<?php //if($event['Library']['id'] != $currentLibrary) { ?>
									<?php $currentLibrary = $event['Library']['id'] ?>
									<?php $currentSchedule = -1; ?>
									<div class="library">
										<?php echo $html->link($event['Library']['name'], "/libraries/view/".$event['Library']['id'], array("title"=>"Click here to view this library's contact info")); ?>
									</div>
								<?php //} ?>
								<?php if (isset($event['date']) && (empty($event['date']) || substr($event['date'],8,2) == "00" || ($event['date'] != $event['end_date']))) { ?>
									<div class="start_time">
									<?php if ($event['Schedule']['start_date'] != $currentSchedule) { ?>
										<?php $currentSchedule = $event['Schedule']['start_date']; ?>
											<?php
											if (substr($event['date'],8,2) != "00" && substr($event['end_date'],8,2) != "00" && $event['date'] != $event['end_date']) {
												echo date("F j, Y",strtotime($event['date'])), " to ", date("F j, Y",strtotime($event['end_date']));
											} elseif (substr($event['date'],8,2) != "00" && substr($event['end_date'],8,2) == "00") {
												echo "Starting ", date("F j, Y",strtotime($event['date']));
											} elseif (empty($event['date']) || substr($event['date'],8,2) == "00") {
												echo date("F j, Y",strtotime($event['Schedule']['start_date'])), " to ", date("F j, Y",strtotime($event['Schedule']['end_date']));
											}?>
											<br />
									<?php } ?>
									<?php if (isset($event['day_of_week'])) { ?>
										<?php echo $event['day_of_week'] . "s"; ?>
									<?php } ?>
									<?php if (isset($event['time'])  && $event['time'] != "00:00:00") { ?>
										<?php echo date("g:i A ",strtotime('2000-01-01 '.$event['time'])); ?>
										to
										<?php echo date("g:i A ",strtotime('2000-01-01 '.$event['end_time'])); ?>
									<?php } else { ?>
										during <?php echo $html->link("library hours","/libraries/view/" . $event['Library']['id'], array("class"=>"small_link","title"=>"Click here to view library hours")); ?>
									<?php } ?>
									</div>
								<?php } else { ?>
									<div class="start_time">

										<?php if (isset($event['time'])  && $event['time'] != "00:00:00") { ?>
											<?php echo date("g:i A ",strtotime($event['date'].' '.$event['time'])); ?>
											<?php if (isset($event['end_time'])  && $event['end_time'] != "00:00:00") { ?>
											to
											<?php echo date("g:i A ",strtotime($event['end_date'].' '.$event['end_time'])); ?>
											<?php } ?>
										<?php } else { ?>
											during <?php echo $html->link("library hours","/libraries/view/" . $event['Library']['id'], array("class"=>"small_link","title"=>"Click here to view library hours")); ?>
										<?php } ?>
									</div>
								<?php } ?>


								<?php if (!empty($event['Details']['preffix']) || !empty($event['Details']['suffix'])) { ?>
									<div class="event_details">
										<?php if(!empty($event["Details"]['image'])) { ?>
											<img src="<?php echo "/img/events/" . $event["Details"]['image']; ?>">
										<?php } ?>
										<?php echo $event['Details']['preffix']; ?>
										<?php echo $event['Details']['suffix']; ?>

										<div class="section_end"></div>

									</div>
								<?php } ?>

								<?php if (!empty($event['Details']['notes'])) { ?>
									<div class="event_details">
									<?php echo $event['Details']['notes']; ?>
									<div class="section_end"></div>
								<?php }?>

							</li>
						</ul>
						<div class="section_end">&nbsp</div>
					</div>
					<?php $i++; ?>
				<?php } ?>
		<?php }
		} else {
			?>
			<p>No programs found. Please <a href="/programs">try again</a>.</p>

		<?php
		}?>


	</div>
</div>