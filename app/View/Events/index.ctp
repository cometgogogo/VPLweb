<?php 
print_r($events[0]);


foreach ($events as $event): ?>
	<div class="event_short">
		<?php echo date("l F j, g:i A ",strtotime($event['Event']['date'].' '.$event['Event']['time'])); ?><br />
		<?php echo $event['Program']['name'];?><br />
	</div>
<?php endforeach; ?>