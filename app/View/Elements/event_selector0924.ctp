<div class="event_selector">
	<h3>Select Events</h3>
	<form action="/programs/index/selected_events" method="post">
		<div class="search">Search:</div>
		<input type="text" name="text_search" value="" size="23"/>
		<div class="section_end">&nbsp;</div><br />
		
		<div class="age_group">Age Group</div>
		<div class="section_end">&nbsp;</div>
		<?php foreach($ageGroups as $ageGroup) { ?>
			<input type="radio" name="age_group" value="<?php echo $ageGroup["AgeGroup"]["GroupID"]; ?>" />
			<div class="option_name">
				<?php echo $ageGroup["AgeGroup"]["GroupName"]; ?>
			</div>
			<div class="section_end">&nbsp;</div>
		<?php } ?>
		<br />
		<div class="category">Program Category</div>
		<div class="section_end">&nbsp;</div>
		<select name="category" >
			<option value="">- select -</option>
			<?php foreach($categories as $element => $category) { ?>
				<option value="<?php echo $element; ?>"><?php echo substr($category,0,27) . (strlen($category)>27 ? " ..." : ""); ?></option>
			<?php } ?>
		</select>
		<br /><br />
		<div class="library">Library</div>	
		<?php foreach($libraries as $library) { ?>
			<input type="radio" name="library" value="<?php echo $library["Library"]["BranchID"]; ?>" />
				<div class="option_name">
					<?php echo $library["Library"]["BranchName"]; ?>
			</div>
			<div class="section_end">&nbsp;</div>
		<?php } ?>
		
		
		<?php echo $html->submit("Find Events", array("class"=>"submit_button")); ?>
		<div class="section_end">&nbsp;</div>
	</form>
</div>