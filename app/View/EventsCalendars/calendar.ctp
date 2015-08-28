<?php $html->addCrumb("Home" , "/"); ?>

<?php $html->addCrumb("What's On" , "/news_and_events"); ?>
<?php $html->addCrumb("Programs & Events" , "/programs"); ?>

<?php
if (isset($criteria["library"]["shortName"])) {
	$this->pageTitle = "Events Calendar - ".$criteria["library"]["shortName"];
}

$this->pageTitle = "";
if (isset($criteria["library"]["shortName"])) {
	if ($this->pageTitle == "") {
		$this->pageTitle .= "Events Calendar - ".$criteria["library"]["shortName"];
	} else {
		$this->pageTitle .= " - ".$criteria["library"]["shortName"];
	}
}
if (isset($month)) {
	if ($this->pageTitle == "") {
		$this->pageTitle .= "Events Calendar - ".ucfirst($month);
	} else {
		$this->pageTitle .= " - ".ucfirst($month);
	}
	if (isset($year)) {
		$this->pageTitle .= " - ".$year;
	}
}



?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Events Calendar</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
<?php
if (isset($criteria["library"]["shortName"])) echo "<div class='calender_library'>" . $html->link($criteria["library"]["shortName"], "/libraries/view/" . $criteria["library"]["id"]) . "</div>";

echo $calendar->calendar($year, $month, $data, $branch)
?>

<br/><br/>

<div class="event_day">
<h2>Ongoing Programs</h2>
<ul>
  <?php
  foreach ($ongoings as $event) {
	?>
	<li>
	<h2><?php echo $html->link($event['Program']['name'], "/programs/view/" . $event['Program']['id']); ?></h2>
	<?php
		if (empty($event['Event']['date']) || substr($event['Event']['date'],8,2) == "00" || ($event['Event']['date'] != $event['Event']['end_date'])) {
				if ($event['Event']['date'] != $event['Event']['end_date']) {
					$displayTime = 	"<div class='start_time'>" . date_format(new DateTime($event['Event']['date']), "F j, Y") ." to " . date_format(new DateTime($event['Event']['end_date']), "F j, Y");


				} else {
					$displayTime = 	"<div class='start_time'>" .
								date_format(new DateTime($event['Schedule']['start_date']), "F j, Y") .
								" to " .
								date_format(new DateTime($event['Schedule']['end_date']), "F j, Y");
								//if ($event['Library']['id'] == 2) { //BCRL closure
									//$displayTime .=  "<font color=#d03179>&nbsp;&nbsp;Temporarily suspended during library closure Sept. 24 - Oct. 11</font>";

								//}

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

		echo $displayTime;
	?>


	<!--

		<div class="description">
			<?php if(!empty($event['Program']['image'])) { ?>
				<img src="<?php echo "/img/events/" . $event['Program']['image']; ?>">
			<?php } ?>
			<?php
				$desc = $event['Program']['description'];

				if (strlen($desc)==0) {
					if ($event['Details']['preffix'] != "") {
						$desc = $event['Details']['preffix'];
					} else {
						$desc = $event['Details']['suffix'];
					}
				}
				if (strlen($desc) > 150) {
					$desc = substr($desc, 0, 150);
					$last_ch = substr($desc, strlen($desc)-1, 1);
					while ($last_ch != " ") {
						$desc = rtrim($desc, $last_ch);
						if (strlen($desc)==1) break;
						$last_ch = substr($desc, strlen($desc)-1, 1);
					}
				}
				echo $desc . "...\n";
			?>
			<?php echo $html->link("more","/programs/view/". $event['Program']['id']) . "\n"; ?>
			<div class="section_end"></div>
	</div>
	-->
</li>
<?php

	 } //end for

?>
</ul></div>
</div><!-- end details -->
<div class="closing"></div></div>