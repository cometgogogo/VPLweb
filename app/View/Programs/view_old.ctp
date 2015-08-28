
<?php
$html->addCrumb("Home" , "/");
$html->addCrumb("News and Events" , "/news_and_events");
$html->addCrumb("What's On" , "/programs"); 
?>



<div id="page_header">
	<div class="opening"></div>
	<div class="details">
	<h1><?php echo $program['Program']['ProgramName']?></h1>
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
					
					<?php foreach ($program['AgeGroup'] as $ageGroup) { ?>
						<div class="age_group">
							<?php echo $html->link($ageGroup['GroupName'], "/programs/" . $ageGroup['GroupID']); ?>
						</div>
					<?php } ?>
					<?php if (!empty($program["Program"]['Description'])) { ?>
						<div class="description">
							<?php if(!empty($program["Program"]['Image'])) { ?>
								<img src="<?php echo "/img/events/" . $program['Program']['Image']; ?>">
							<?php } ?>
							<?php echo $program['Program']['Description']?>
							<div class="section_end"></div>
						</div>
					<?php } ?>
					
					
					<?php foreach ($program['Category'] as $category) { ?>
						<div class="category">
							<?php echo $html->link($category['CategoryName'], "/programs/index/category/" . $category['CategoryID'], array("title"=>"Click here to view other programs in this category")); ?>
						</div>
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
				<?php while ($i < count($program['Event'])) { ?>
					<?php $event = $program['Event'][$i]; ?>
	
					<div class="event_day">
						<?php if (isset($event['date']) && substr($event['date'],8,2) != "00" && $event['date'] != $currentDate) { ?>
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
								<?php if($event['Library']['id'] != $currentLibrary) { ?>
									<?php $currentLibrary = $event['Library']['id'] ?>
									<?php $currentSchedule = -1; ?>
									<div class="library">
										<?php echo $html->link($event['Library']['name'], "/libraries/view/".$event['Library']['id'], array("title"=>"Click here to view this library's contact info")); ?>
									</div>
								<?php } ?>
								<?php if (empty($event['date']) || substr($event['date'],8,2) == "00") { ?>
									<div class="start_time">
									<?php if ($event['Schedule']['start_date'] != $currentSchedule) { ?>
										<?php $currentSchedule = $event['Schedule']['start_date']; ?>
											<?php echo date("F j, Y",strtotime($event['Schedule']['start_date'])); ?>
											to
											<?php echo date("F j, Y",strtotime($event['Schedule']['end_date'])); ?>
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
											to
											<?php echo date("g:i A ",strtotime($event['end_date'].' '.$event['end_time'])); ?>
										<?php } else { ?>
											during <?php echo $html->link("library hours","/libraries/view/" . $event['Library']['id'], array("class"=>"small_link","title"=>"Click here to view library hours")); ?>
										<?php } ?>
									</div>
								<?php } ?>
								<?php 
									$reg_detail = "";
									if (($event['Details']['Registration']==2) || ($event['Details']['Registration']==3) || ($event['Details']['Registration']==5)) {
										// preregister, pick up tickets, application form
								
										$locations = explode(", ", $event['Details']['RegRequirement']);
								
										switch ($locations[0]) {
										case 1:
											$reg_detail = "at the Circulation Desk";
											break;
										case 2:
											$reg_detail = "at the Information Desk";
											break;
										case 3:
											$reg_detail = "at the Help Desk";
											break;
										case 4:
											$reg_detail = "at the Welcome Desk";
											break;
										case 5:
											$reg_detail = "online at www.vaughanpl.info";
											break;
										case 6:
											$reg_detail = "at the Check Out Desk";
											break;
										case 7:
											$reg_detail = "at the Youth Services Desk";
											break;
										default:
											$reg_detail = "";
											break;
										}
									
																	
										for ($k=1; $k<count($locations); $k++) {
								
											$reg_detail .= " or ";
								
											switch ($locations[$k]) {
											case 1:
												$reg_detail .= "at the Circulation Desk";
												break;
											case 2:
												$reg_detail .= "at the Information Desk";
												break;
											case 3:
												$reg_detail .= "at the Help Desk";
												break;
											case 4:
												$reg_detail .= "at the Welcome Desk";
												break;
											case 5:
												$reg_detail .= "online at www.vaughanpl.info";
												break;
											case 6:
												$reg_detail .= "at the Check Out Desk";
												break;
											case 7:
												$reg_detail .= "at the Youth Services Desk";
												break;
											default:
												$reg_detail .= "";
												break;
											}
										}
								
									} else if ($event['Details']['Registration']==4) {
								
								
										switch ($event['Details']['RegRequirement']) {
											case 1:
											$reg_detail = "Adult Services Librarian";
											break;
								
											case 2:
											$reg_detail = "Youth Services Librarian";
											break;
								
											case 3:
											$reg_detail = "Business Services Librarian";
											break;
										}
										
								
									} 
								
									
									switch ($event['Details']['Registration']) {
										case 1:
											$registration = "Please drop in.";
											break;
										case 2:
											$registration = "Please pre-register " . $reg_detail . ".";
											break;
										case 3:
											$registration = "Please pick up tickets " . $reg_detail . ".";
											break;
										case 4:
											$registration = "Please contact the " . $reg_detail . " to book your appointment.";
											break;
										case 5:
											$registration = "Please pick up an application form " . $reg_detail . ".";
											break;
									}
									if (!empty($registration)) echo "<div class='registration'>" . $registration . "</div>";
								?>
								
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
								
							</li>
						</ul>
						<div class="section_end">&nbsp</div>
					</div>
					<?php $i++; ?>
				<?php } ?>
		<?php } ?>

		
	</div>
</div>
