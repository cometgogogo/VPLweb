

<li>

	<?php if (@$hideName) { ?>
	<?php } else { ?>
		<h3><?php echo $this->Html->link(utf8_encode($event['Program']['name']), "/programs/view/" . $event['Program']['id']); ?></h3>
		<?php 
		$desc = $event['Program']['description'];
		
		if (strlen($desc)>0) {	echo utf8_encode($event['Program']['description']);
		
		?>
		<br/><br/>
 		<?php } ?>

	<?php } ?>

<?php 
//echo "----". @$hideBranch;
if (@$hideBranch) { ?>
	<?php } else { ?>
		<div class="library">
			<?php 
				$libraryURL = "/events_calendars/calendar/library/" . $event['Library']['id'];
				echo $this->Html->link($event['Library']['name'],"/libraries/view/". $event['Library']['id'], array("title"=>"Click here to view this library's contact info")); 

			?>
			&nbsp;

		</div>
	<?php
	$event_desc = $event['Details']['suffix'];				
		if (strlen($event_desc)>0) echo $event_desc;
		
 } ?>
	
	<?php
		if (empty($event['Event']['date']) || substr($event['Event']['date'],8,2) == "00" || ($event['Event']['date'] != $event['Event']['end_date'])) {
		
					
			if ($event['Event']['date'] != $event['Event']['end_date']) {
				$displayTime = 	"<div class='volunteer_start_time'>" . date_format(new DateTime($event['Event']['date']), "F j, Y") ." to " . date_format(new DateTime($event['Event']['end_date']), "F j, Y");
				
		
			} else {
			//echo "same day!!!";
				$displayTime = 	"<div class='volunteer_start_time'>" . date_format(new DateTime($event['Schedule']['start_date']), "F j, Y") .	" to " . date_format(new DateTime($event['Schedule']['end_date']), "F j, Y");
						

			}

			foreach ($event['EventSlots'] as $slot) {
				if (isset($slot['day_of_week'])) $displayTime .= "<br />" . $slot['day_of_week'] . "s ";
				if (isset($slot['time']) && $slot['time'] != "00:00:00") $displayTime .= date("g:i A ",strtotime('2000-01-01 '.$slot['time'])) . " to " . date("g:i A ",strtotime('2000-01-01 '.$slot['end_time']));
			}


			$displayTime .= 	"</div>";

		} elseif (isset($event['Event']['time']) && $event['Event']['time'] != "00:00:00") {
		
			$displayTime = 	"<div class='volunteer_start_time'>" . date_format(new DateTime($event['Event']['date']), "F j  ") . 
							date_format(new DateTime($event['Event']['date'] . " " . $event['Event']['time']), "g:i A");
			if (isset($event['Event']['end_time'])  && $event['Event']['end_time'] != "00:00:00") {
				$displayTime .=	" to " .
							date_format(new DateTime($event['Event']['end_date'] . " " . $event['Event']['end_time']), "g:i A");
			}
			$displayTime .=	"</div>";
		} else {
		
			$displayTime = "<div class='volunteer_start_time'>During " . $this->Html->link("library hours","/libraries/view/" . $event['Library']['id'], array("class"=>"small_link","title"=>"Click here to view library hours")) . "</div>";
		}

	?>
	<?php
		echo $displayTime; 
		
	?>



</li>




