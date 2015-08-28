<div id="calendar">



<?php
	$targetDate = new DateTime($targetDate);	//mktime(0,0,0,1,17,2007);
	$firstDay = mktime(0,0,0,date_format($targetDate,'m'),1,date_format($targetDate,'Y'));
	
	
	
	$lastDay = $firstDay + 32 * 86400;
//echo date("Y-m-d g:i A", $lastDay) . "<br>";
//echo date("Y-m-d g:i A", mktime(0,0,0,date('m',$lastDay),1,date('Y',$lastDay))) . "<br>";

	$lastDay = mktime(0,0,0,date('m',$lastDay),1,date('Y',$lastDay)) - 86400;
//echo date("Y-m-d g:i A", $lastDay) . "<br>";
//echo date("N",$lastDay) . "<br>";
	$lastDay = $lastDay + (6-(date("N",$lastDay) % 7)) * 86400;
//echo date("Y-m-d g:i A", $lastDay) . "<br>";
	$firstDay = $firstDay - (date("N",$firstDay) % 7) * 86400;
//echo date("Y-m-d g:i A", $firstDay) . "<br>";

	$targetPrevious = date("Y-m-d",mktime(0,0,0,date("n", $firstDay-1),1,date("Y", $firstDay-1)));
//echo date("Y-m-d g:i A", $firstDay + 2764800) . "<br>";


	$targetNext = mktime(0,0,0,date_format($targetDate,'m'),1,date_format($targetDate,'Y'));
//echo date("Y-m-d",$targetNext) . "<hr>";

	$targetNext = date("Y-m-d",mktime(0,0,0,date("n", $targetNext + 2678400),1,date("Y", $targetNext + 2678400)));
//echo $targetNext . "<hr>";

	echo "<h3>";
	echo "<a href='" . "/programs/index/" . $targetPrevious . "' class='previous' title='Previous'><span class='calendar_nav_link'>Previous</span></a>";
	echo "<a href='" . "/programs/index/" . $targetNext . "' class='next' title='Next'><span class='calendar_nav_link'>Next</span></a>";
	echo date_format($targetDate,'F Y');
	echo "</h3>";

	echo "<table><tr class='weekdays'><td>S</td><td>M</td><td>T</td><td>W</td><td>T</td><td>F</td><td>S</td>";
	$currentDay = $firstDay;
	while ($currentDay <= $lastDay) {
		if (date("N", $currentDay) == 7) {

			echo "</tr><tr>";
		}
		if (date_format($targetDate,'m') != date('m',$currentDay)) {
			echo "<td class='day_another_month'>";
		} elseif (date('Ymd',$currentDay) == date('Ymd')) {
			echo "<td class='day_current'>";
		} elseif ($currentDay == mktime(0,0,0,date_format($targetDate,'m'),date_format($targetDate,'d'),date_format($targetDate,'Y'))) {
			echo "<td class='day_target'>";
		} else {
			echo "<td class='day_regular'>";
		}
		echo $this->Html->link(date("j",$currentDay),"/programs/index/" . date("Y-m-d",$currentDay));


		$currentDay = mktime(0,0,0,date('m', $currentDay + 129600),date('d', $currentDay + 129600),date('Y', $currentDay + 129600));

		
		/*
		$currentDay = $currentDay + 86400;
		$currentDay = $currentDay + 129600;




		$currentDay = $currentDay - date("G",$currentDay) * 3600;
		*/
		echo "</td>";
	}
	echo "</tr></table>";
?>



</div>
