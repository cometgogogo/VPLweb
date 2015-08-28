<div class="event_selector">
	<div class="calendar_sidebar"><h3>Select Branch</h3></div>
	<form action="/events_calendars/calendar/selected_events" method="post">
		<div class="library">Library</div>	
		<?php foreach($libraries as $library) { ?>
		
			<input type="radio" name="library" id="<?php echo $library["Library"]["BranchName"]; ?>" value="<?php echo $library["Library"]["BranchID"]; ?>" />
				<div class="option_name">
					<label for="<?php echo $library["Library"]["BranchName"]; ?>"><?php echo $library["Library"]["BranchName"]; ?></label>
			</div>
			
			<div class="section_end">&nbsp;</div>
		<?php } ?>
		<?php echo $this->Html->submit("Show Calendar", array("class"=>"submit_button")); ?>
		<div class="section_end">&nbsp;</div>
	</form>
	
	<div class="calendar_sidebar"><h3><a href="/programs/index">All programs @ VPL</a></h3></div>
</div>