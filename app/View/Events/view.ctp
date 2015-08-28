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
	
		<div class="entry">
			<h2>Program Description</h2>
			<p><?php echo $program['Program']['Description']?></p>
		</div>
		
		<?php if (isset($program['Event'])) { ?>
		<div class="time_table">
			<h2>Events</h2>
			<?php foreach ($program['Event'] as $event) { ?>
				<?php echo $html->link($event['Library']['name'], "/libraries/view/".$event['Library']['id']); ?><br />
				<?php echo date("l F j, g:i A ",strtotime($event['date'].' '.$event['time'])); ?><br />
				<?php echo $event['Details']['comment']; ?><br />
				<hr />

			<?php } ?>
		</div>
		<?php } ?>


		
		
		
		
	</div>
</div>
