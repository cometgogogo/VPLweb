<div id="today">

	<h2>TEST @ VPL</h2>
	<div class="event_day main">
		<ul class="level_3">
<?php 

function getScheduleType($program) {

	if ((!isset($program['Event']['date']) || substr($program['Event']['date'],8,2) == "00") || ($program['Event']['date'] != $program['Event']['end_date'])) {
		return "period";
	} elseif (isset($program['Event']['date']) && (substr($program['Event']['date'],8,2) != "00") && ($program['Event']['date'] == $program['Event']['end_date'])) {
		return "date";
	} else {
		return "other";
	}
}

$openDay = false;
$currentDate = date("Y-m-d");
//$currentDate = "2012-12-11";


$count = 0;

$event = $programs->getNextProgram();
$ongoing = $event; //pointing to the first program in the list

while ($event['Event']['date'] == $currentDate) { ?>
	
	
		<h3><?php echo $html->link($event['Program']['name'], "/programs/view/" . $event['Program']['id']); ?></h3>
	
	<div class="library">
		<?php echo $html->link($event['Library']['name'],getLibraryUrl($event['Library']['id'],$criteria), array("title"=>"Click here to view events at this library only")); ?>
		
	</div>
	<?php
		if (empty($event['Event']['date']) || substr($event['Event']['date'],8,2) == "00" || ($event['Event']['date'] != $event['Event']['end_date'])) {
			if ($event['Event']['date'] != $event['Event']['end_date']) {
				$displayTime = 	"<div class='start_time'>" . date_format(new DateTime($event['Event']['date']), "F j, Y") ." to " . date_format(new DateTime($event['Event']['end_date']), "F j, Y");
			} else {
				$displayTime = 	"<div class='start_time'>" .
							date_format(new DateTime($event['Schedule']['start_date']), "F j, Y") .
							" to " .
							date_format(new DateTime($event['Schedule']['end_date']), "F j, Y");

			}

			foreach ($event['EventSlots'] as $slot) {
				if (isset($slot['day_of_week'])) $displayTime .= "<br />" . $slot['day_of_week'] . "s ";
				if (isset($slot['time']) && $slot['time'] != "00:00:00") $displayTime .= date("g:i A ",strtotime('2000-01-01 '.$slot['time'])) . " to " . date("g:i A ",strtotime('2000-01-01 '.$slot['end_time']));
			}


			$displayTime .= 	"</div>";

		} elseif (isset($event['Event']['time']) && $event['Event']['time'] != "00:00:00") {
			$displayTime = 	"<div class='start_time'>" .
							date_format(new DateTime($event['Event']['date'] . " " . $event['Event']['time']), "g:i A");
			if (isset($event['Event']['end_time'])  && $event['Event']['end_time'] != "00:00:00") {
				$displayTime .=	" to " .
							date_format(new DateTime($event['Event']['end_date'] . " " . $event['Event']['end_time']), "g:i A");
			}
			$displayTime .=	"</div>";
		} else {
			$displayTime = "<div class='start_time'>During " . $html->link("library hours","/libraries/view/" . $event['Library']['id'], array("class"=>"small_link","title"=>"Click here to view library hours")) . "</div>";
		}

	?>
	<?php
	
		echo $displayTime; 
		$event = $programs->getNextProgram();
		$count++;
		
		
	} //end while
	
	//-------2012-12-12-Handling Ongoing Programs-------------

//echo date('l');
$currentProgramId = $ongoing['Program']['id'];
echo $currentProgramId;
while($ongoing && getScheduleType($ongoing) == "period" && $ongoing['Program']['id'] == $currentProgramId ){
	echo "--in while --";
 foreach($ongoing['EventSlots'] as $slot){
	echo $slot['day_of_week'];		
 }//endfor

$ongoing = $programs->getNextProgram();

}//end while	
	
	//-------2012-12-12 end -----------
	
	if ($count == 0) {
		//echo "No events today at the libraries. ";					
		//echo $html->link("Check out upcoming programs", "/programs");
		echo "<li>",$html->link("Check out ongoing programs", "/programs"), "</li>";
	}
	?>


</ul>
	</div>
	<div class="footer"><a href="http://www.vaughanpl.info/events_calendars/calendar">View Full Calendar</a></div>
	<div class="section_end"></div>
</div>




