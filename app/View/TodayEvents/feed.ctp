<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<atom:link href="http://www.vaughanpl.info/today_events/feed/<?php echo $libraryId; ?>" rel="alternate" type="application/rss+xml" title="VPL Today's Events Feeds" />
		<title>Today @ <?php echo get_branch_name_by_id($libraryId); ?> Feeds</title>
		<link>http://www.vaughanpl.info/programs/index/library/<?php echo $libraryId; ?></link>
		<description>Check out today's programs at Vaughan Public Libraries!</description>
		<language>en</language>
		<webMaster>vplwebmaster@vaughan.ca</webMaster>
		<image>
		<title>Today at <?php echo get_branch_name_by_id($libraryId); ?></title>
		<url>http://www.vaughanpl.info/img/icon-vpl.gif</url>
		<link>http://www.vaughanpl.info/programs/index/library/<?php echo $libraryId; ?></link>
		<width>35</width>
		</image>
		
			<?php 		
			
			$openDay = false;
			$currentDate = date("Y-m-d");			
			
			$count = 0;
			$event =  $programs->getNextProgram();
			$ongoing = $event;
			
			while ($event['Event']['date'] == $currentDate) { ?>			
				
					<item>
	
				
				
				<?php
				
				echo "<title><![CDATA[". utf8_encode($event['Program']['name']) . "]]></title>"; 
				echo "<link>http://www.vaughanpl.info/programs/view/" . $event['Program']['id'] . "</link>";
				echo "<grid>http://www.vaughanpl.info/programs/view/" . $event['Program']['id'] . "</grid>";
				echo "<description><![CDATA[ ";
				$displayTime = utf8_encode($event['Program']['description'])  . "<br/>";
				if($libraryId == null) {
					$displayTime .= $event['Library']['name'] . "<br/>";
				}else{
					$displayTime .= "";
				}
					if (empty($event['Event']['date']) || substr($event['Event']['date'],8,2) == "00" || ($event['Event']['date'] != $event['Event']['end_date'])) {
						if ($event['Event']['date'] != $event['Event']['end_date']) {
							$displayTime .= 	date_format(new DateTime($event['Event']['date']), "F j, Y") ." to " . date_format(new DateTime($event['Event']['end_date']), "F j, Y");
						} else {
							$displayTime .= 	date_format(new DateTime($event['Schedule']['start_date']), "F j, Y") .
										" to " .
										date_format(new DateTime($event['Schedule']['end_date']), "F j, Y");
			
						}
			
						foreach ($event['EventSlots'] as $slot) {
							if (isset($slot['day_of_week'])) $displayTime .= "<br/>" . $slot['day_of_week'] . "s ";
							if (isset($slot['time']) && $slot['time'] != "00:00:00") $displayTime .= date("g:i A ",strtotime('2000-01-01 '.$slot['time'])) . " to " . date("g:i A ",strtotime('2000-01-01 '.$slot['end_time']));
						}
			
			
						
			
					} elseif (isset($event['Event']['time']) && $event['Event']['time'] != "00:00:00") {
						$displayTime .= date_format(new DateTime($event['Event']['date'] . " " . $event['Event']['time']), "g:i A");
						if (isset($event['Event']['end_time'])  && $event['Event']['end_time'] != "00:00:00") {
							$displayTime .=	" to " . date_format(new DateTime($event['Event']['end_date'] . " " . $event['Event']['end_time']), "g:i A");
						}
						
					} else {
						$displayTime .= "During " . $html->link("library hours","/libraries/view/" . $event['Library']['id'], array("class"=>"small_link","title"=>"Click here to view library hours"));
					}
			
				?>
				<?php
				
					echo nl2br($displayTime);
					echo " ]]></description>";
					$event = $programs->getNextProgram();
					
					echo "</item>";
					$count++;
					
				} //end while
			
			
			
			$currentProgramId = $ongoing['Program']['id'];
			$temp = "";
			$lib = "";
			
			while($ongoing){
			
			if (getScheduleType($ongoing) == "period") {
				$flag = 0;	
				foreach($ongoing['EventSlots'] as $slot){	
					
					if($slot['day_of_week'] == date('l')){								

						if($ongoing['Program']['name'] != $temp){
							echo "<item>";
							$flag=1;
							echo "<title><![CDATA[". utf8_encode($ongoing['Program']['name']) . "]]></title>"; 
							echo "<link>http://www.vaughanpl.info/programs/view/" . $ongoing['Program']['id'] . "</link>";
							echo "<grid>http://www.vaughanpl.info/programs/view/" . $ongoing['Program']['id'] . "</grid>";
							$temp = $ongoing['Program']['name'];
							$count ++;
							echo "<description><![CDATA[ ";
						}	
						$displayTime = utf8_encode($ongoing['Program']['description']) . "<br/>";
						if($libraryId == null) {
							$displayTime .= $ongoing['Library']['name'] . "<br/>";
						}else{
							$displayTime .= "";
						}				
						if (empty($ongoing['Event']['date']) || substr($ongoing['Event']['date'],8,2) == "00" || ($ongoing['Event']['date'] != $ongoing['Event']['end_date'])) {							
						  if (isset($slot['time']) && $slot['time'] != "00:00:00") {
							
							//$displayTime .= date("g:i A ",strtotime('2000-01-01 '.$slot['time'])) . " to " . date("g:i A ",strtotime('2000-01-01 '.$slot['end_time'])) . "<br/>";		
						if (isset($slot['end_time']) && $slot['end_time'] != "00:00:00") {
														$displayTime .= date("g:i A ",strtotime('2000-01-01 '.$slot['time'])) . " to " . date("g:i A ",strtotime('2000-01-01 '.$slot['end_time']));
													} else {
														$displayTime .= "Starting ".date("g:i A ",strtotime('2000-01-01 '.$slot['time']));
							}
						  }
						  
						  
						  
						  
						} else {
							$displayTime .= "During " . $html->link("library hours","/libraries/view/" . $ongoing['Library']['id'], array("class"=>"small_link","title"=>"Click here to view library hours"));
						}

						echo nl2br($displayTime);


					}//end if



				}//endforeach	
				if($flag == 1)echo " ]]></description></item>";


			 }//end if
			$currentProgramId = $ongoing['Program']['id'];
			$ongoing = $programs->getNextProgram();
			
			}//end while	
			//echo $count;	
			if ($count == 0) {	
			
				echo "<item>";											
				echo "<title>Check out ongoing programs</title>"; 
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