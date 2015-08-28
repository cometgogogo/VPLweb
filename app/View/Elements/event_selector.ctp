<div class="event_selector">
	<h3>Select Events</h3>
	<form action="/programs/index/selected_events" method="post">
		<fieldset><legend>serach program</legend>
		<div class="search"><label for="text_search">Search:</label></div>		
		<input type="text" id="text_search" name="text_search" value="" size="23"/>
		<div class="section_end">&nbsp;</div><br />

		<div class="age_group">Age Group</div>
		<div class="section_end">&nbsp;</div>
		<?php foreach($ageGroups as $ageGroup) { ?>
			<input type="radio" name="age_group" id="age<?php echo $ageGroup["AgeGroup"]["GroupID"]; ?>" value="<?php echo $ageGroup["AgeGroup"]["GroupID"]; ?>" />
			
			<div class="option_name">
				<label for="age<?php echo $ageGroup["AgeGroup"]["GroupID"]; ?>"><?php echo $ageGroup["AgeGroup"]["GroupName"]; ?></label>
			</div>
			<div class="section_end">&nbsp;</div>
		<?php } ?>
		<br />
		<div class="category"><label for="select_cat">Program Category</label></div>
		
		<select name="category" id="select_cat">
			<option value="">- select -</option>
			<?php foreach($categories as $element => $category) { ?>
				<option value="<?php echo $element; ?>"><?php echo substr($category,0,27) . (strlen($category)>27 ? " ..." : ""); ?></option>
			<?php } ?>
		</select>
		<br /><br />
		<div class="library">Library</div>
		<?php foreach($libraries as $library) { ?>
			<input type="radio" name="library" id="<?php echo $library["Library"]["BranchID"]; ?>" value="<?php echo $library["Library"]["BranchID"]; ?>" />
			
			<div class="option_name">
				<label for="<?php echo $library["Library"]["BranchID"]; ?>"><?php echo $library["Library"]["BranchName"]; ?></label>
			</div>
			<div class="section_end">&nbsp;</div>
		<?php } ?>


		<?php echo $this->Html->submit("Find Events", array("class"=>"submit_button")); ?>
		<div class="section_end">&nbsp;</div>
	</fieldset>
	</form>
</div>

