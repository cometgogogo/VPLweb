

<li>

	<?php if (@$hideName) { ?>
	<?php } else { ?>
		<h2><?php echo $this->Html->link(utf8_encode($event['Program']['name']), "/programs/view/" . $event['Program']['id']); ?></h2>

<!-- 

		<?php foreach ($event['AgeGroups'] as $ageGroup) { ?>
			<div class="age_group">
				<?php echo $this->Html->link($ageGroup['name'],getAgeGroupUrl($ageGroup['id'],$criteria), array("title"=>"Click here to view events for this age group only")); ?>
			</div>
		<?php } ?>

-->

		<?php foreach ($event['Categories'] as $category) { ?>
			<div class="category">
				<?php echo $this->Html->link($category['name'],getCategoryUrl($category['id'],$criteria), array("title"=>"Click here to view events in this category only")); ?>
			</div>
		<?php } ?>

	<?php } ?>


	<div class="library">
		<?php 
		$libraryURL = "/events_calendars/calendar/library/" . $event['Library']['id'];
		echo $this->Html->link($event['Library']['name'],$libraryURL, array("title"=>"Click here to view events at this library only")); 
		
		?>
		&nbsp;
		<?php echo $this->Html->link("contact","/libraries/view/" . $event['Library']['id'], array("class"=>"small_link","title"=>"Click here to view this library's contact info")); ?>
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
							//if ($event['Library']['id'] == 2) { //BCRL closure
								//$displayTime .=  "<font color=#d03179>&nbsp;&nbsp;Temporarily suspended during library closure Sept. 24 - Oct. 11</font>";
					
							//}

			}
$displayTime .= "<br/>";
			foreach ($event['EventSlots'] as $slot) {
				if (isset($slot['day_of_week'])) $displayTime .= "<br />" . $slot['day_of_week'] . "s ";
				if (isset($slot['time']) && $slot['time'] != "00:00:00") {
							
					if (isset($slot['end_time']) && $slot['end_time'] != "00:00:00") {
						$displayTime .= date("g:i A ",strtotime('2000-01-01 '.$slot['time'])) . " to " . date("g:i A ",strtotime('2000-01-01 '.$slot['end_time']));
					} else {
						$displayTime .= "Starting ".date("g:i A ",strtotime('2000-01-01 '.$slot['time']));
					}
						
				}
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
			$displayTime = "<div class='start_time'>During " . $this->Html->link("library hours","/libraries/view/" . $event['Library']['id'], array("class"=>"small_link","title"=>"Click here to view library hours")) . "</div>";
		}

	?>
	<?php echo $displayTime; ?>




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
			/*if (strlen($desc) > 150) {
				$desc = substr($desc, 0, 150);
				$last_ch = substr($desc, strlen($desc)-1, 1);
				while ($last_ch != " ") {
					$desc = rtrim($desc, $last_ch);
					if (strlen($desc)==1) break;
					$last_ch = substr($desc, strlen($desc)-1, 1);
				}
			}*/
			echo $desc . "\n";
		?>
		<?php //echo $this->Html->link("more","/programs/view/". $event['Program']['id']) . "\n"; ?>
		<div class="section_end"></div>
	</div>
</li>




