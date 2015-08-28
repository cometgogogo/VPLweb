<?php
//print_r($category);
?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1><?php echo $category['Category']['CategoryName']?></h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
	
		<p class="intro">
		</p>
		
		<?php $first = true; ?>
		<?php foreach ($category['Event'] as $event) { ?>
			<div class="<?php echo ($first ? "event" : "event_short"); ?>">
				<div class="when"><?php echo date("l F j, g:i A ",strtotime($event['date'].' '.$event['time'])); ?></div>
				<h3><?php echo $this->Html->link($event['Program']['name'], "/programs/view/".$event['Program']['id']); ?></h3>
				<div class="what"><?php echo substr($event['Program']['description'],0,($first ? 10000 : 80)) . ($first ? "" : "..."); ?></div>
				<div class="library"><?php echo $this->Html->link($event['Library']['name'], "/libraries/view/".$event['Library']['id']); ?></div>
			</div>
			<?php $first = false; ?>
		<?php } ?>
		
		
		<div class="entry">
			<h2></h2>
		</div>
		
	</div>
	<div class="closing"></div>
</div>
