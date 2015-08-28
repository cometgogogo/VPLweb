


<div class="event_selector">

	<h3>What's On:</h3>
	<div class="event_day main">
		<div class="level_3">
		<?php foreach ($events as $event) { ?>
			<h2><?php echo $this->Html->link($event['Program']['name'], "/programs/view/".$event['Program']['id']); ?></h2>
			<div class="start_time">
				<?php if (isset($event['Event']['date']) && substr($event['Event']['date'],8,2) != "00") { ?>
					<?php echo date("D M j, g:i A",strtotime($event['Event']['date'].' '.$event['Event']['time'])); ?>
				<?php } else { ?>
					Click title for details.
				<?php } ?>
			</div>
			<?php if (@$displayLibrary) { ?>
				<div class="library"><?php echo $this->Html->link($event['Library']['short'], "/libraries/view/".$event['Library']['id']); ?></div>
			<?php } ?>
		<?php } ?>
		</div>
	</div>
	<div class="section_end">&nbsp;</div>
</div>


