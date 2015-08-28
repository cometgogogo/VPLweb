<?php
if ($summary) {
	$eventAssociation ="MainEvent";
} else {
	$eventAssociation ="Event";
}
?>

<div class="event_selector">


	<div class="event_day main">

		<?php foreach ($categories as $category) { ?>

			<?php if ($category['visible']==1) { ?>
			<div class="category">
				<?php echo $this->Html->link($category['CategoryName'],"/programs/index/category/".$category['CategoryID']); ?>
			</div>
			<br />
			<ul class="level_3">

				<?php $first = true; ?>
				<?php foreach ($category[$eventAssociation] as $event) { ?>
					<li>
						<h2><?php echo $this->Html->link($event['Program']['name'], "/programs/view/".$event['Program']['id']); ?></h2>
						<div class="start_time">
							<?php

							$pieces = explode("-", $event['date']);
							$mon = $pieces[1];

							if ($mon<1) {
								echo $event['week'].'s '.date("g:i A ",strtotime($event['time']));
							} else {
								echo date("D M j, g:i A ",strtotime($event['date'].' '.$event['time']));
							}
							?>
						</div>
						<div class="library"><?php echo $this->Html->link($event['Library']['short'], "/libraries/view/".$event['Library']['id']); ?></div>
					</li>
					<?php $first = false; ?>
				<?php } ?>
				<div class="more_link"><?php echo $this->Html->link("More ...","/programs/index/category/".$category['CategoryID']); ?></div>
			</ul>
			<?php } ?>
		<?php } ?>

	</div>
	<div class="section_end">
</div>
</div>

