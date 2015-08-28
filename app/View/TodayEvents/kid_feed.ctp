<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<atom:link href="http://www.vaughanpl.info/today_events/feed/<?php echo $libraryId; ?>" rel="alternate" type="application/rss+xml" title="VPL Today's Events Feeds" />
		<title>Today @ <?php echo get_branch_name_by_id($libraryId); ?> Feeds</title>
		<link>http://www.vaughanpl.info/programs/index/library/<?php echo $libraryId; ?></link>
		<description>Check out today's programs at Vaughan Public Libraries!</description>
		<language>en</language>
		<webMaster>vplwebmaster@vaughan.ca(VPL webmaster)</webMaster>
		<image>
		<title>Today at <?php echo get_branch_name_by_id($libraryId); ?></title>
		<url>http://www.vaughanpl.info/img/icon-vpl.gif</url>
		<link>http://www.vaughanpl.info/programs/index/library/<?php echo $libraryId; ?></link>
		<width>35</width>
		</image>
		
			<?php 		
			
			$currentDate = date("Y-m-d");			
			
			$count = 0;
			$event =  $programs->getNextProgram();
			if ($event) {
				$currentScheduleType = "";
				$currentProgramId = -99;
				$count ++;
				while ($event) {
			
					$newScheduleType = getScheduleType($event);
					$currentScheduleType = $newScheduleType;
				
					
					switch ($currentScheduleType) {
						case "date":
											
							if ($event['Event']['date'] == $currentDate) { 							

								$display = "<item><title>".utf8_encode($event['Program']['name'])."</title> ";
								$event_desc = "";
		$display .=  "<link>http://www.vaughanpl.info/newkids/programs/?eventid=" . $event['Details']['id'] . "</link>";
		
		$display .= "<content:encoded><![CDATA[ ";
		$display .= $event['Library']['name'] . " ";
								if (isset($event['Event']['time']) && $event['Event']['time'] != "00:00:00") {
									$display .= date_format(new DateTime($event['Event']['date'] . " " . $event['Event']['time']), "g:i A");
									if (isset($event['Event']['end_time'])  && $event['Event']['end_time'] != "00:00:00") {
										$display .=	" to " . date_format(new DateTime($event['Event']['end_date'] . " " . $event['Event']['end_time']), "g:i A");
									}

								} 
								/*$event_desc = utf8_encode($event['Program']['description']);
								if (strlen($event_desc) > 50) {
									$event_desc = substr($event_desc, 0, 50)."... ";
								}
								$display .= " " .$event_desc. " ";
								*/
								echo nl2br($display) . " ]]></content:encoded></item>";	
							}

							$event = $programs->getNextProgram();	
							break;
							
						case "period":
					
						
							foreach($event['EventSlots'] as $slot){	

								$display = "";
								/*$event_desc = utf8_encode($event['Program']['description']);
								if (strlen($event_desc) > 50) {
									$event_desc = substr($event_desc, 0, 50)."... ";
								}	
								*/
								if($slot['day_of_week'] == date('l')){	
									$display .= "<item><title>". utf8_encode($event['Program']['name'])."</title>"; 									
									$count ++;
									$display .=  "<link>http://www.vaughanpl.info/newkids/programs/?eventid=" . $event['Details']['id'] . "</link>";
							
									$display .= "<content:encoded><![CDATA[ ";
									$display .= $event['Library']['name'] . " ";
									if (empty($event['Event']['date']) || substr($event['Event']['date'],8,2) == "00" || ($event['Event']['date']<$currentDate)) {	
										
										
											if (isset($slot['time']) && $slot['time'] != "00:00:00") {
												$display .= date("g:i A ",strtotime('2000-01-01 '.$slot['time']));
												if (isset($slot['end_time']) && $slot['end_time'] != "00:00:00") {
													$display .= " to " . date("g:i A ",strtotime('2000-01-01 '.$slot['end_time']));
												} 
											}
										
									} 
									
									//$display .= " " .$event_desc. " ";
									echo "  ".nl2br($display)." ]]></content:encoded></item>";								

								} 
								/*else if (!isset($slot['day_of_week'])) {
									if (empty($event['Event']['date']) || substr($event['Event']['date'],8,2) == "00" || ($event['Event']['date']<$currentDate)) {
									
										if (!isset($event['Event']['end_date']) || ($event['Event']['end_date']>=$currentDate)) {
																		
										$display .= "<item><title>". utf8_encode($event['Program']['name'])."</title> "; 	
										
										$display .=  "<link>http://www.vaughanpl.info/newkids/programs/?eventid=" . $event['Details']['id'] . "</link>";
																			
									$display .= "<content:encoded><![CDATA[ ";
									$display .= $event['Library']['name'] . "<br/>";
										//$display .= " " .$event_desc. " ";
										echo "  ".nl2br($display)." during library hours ]]></content:encoded></item>";	
										}
									}

								}*/

							}//endforeach	

				 			$event = $programs->getNextProgram();
							break;		
							
						default:
							$event = $programs->getNextProgram();													
							break;
					}
				}
			}
	
			if ($count == 0) {
				echo "<item>";											
				echo "<title>Ask library staff for ongoing programs</title>"; 
				echo "<link>http://www.vaughanpl.info/programs</link>";	
				echo "</item>";
			}	
				
			?>
		
	
	
	
	</channel>
</rss>

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
	function searchBranchByID($branchID) {
		$result = mysql_query("SELECT * FROM Branches WHERE BranchID = '$branchID'");
	
		return mysql_fetch_array($result);
	}

	function get_branch_name_by_id($branchID) {
	
		$branch = "Vaughan Public Libraries";
		$branchRow = searchBranchByID($branchID);
		if (isset($branchRow)) {
			$branch = $branchRow["BranchName"];
		}
		if ($branch == "") $branch = "Vaughan Public Libraries";
		return $branch;
}


?>