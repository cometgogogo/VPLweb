<div class="entry framed">
	<div class="opening"><div class="frame_entry_heading">See also:</div></div>
	<div class="details">
		<?php foreach ($pages as $page) { ?>
			<div class="framed_item">
			<?php if (isset($page['rel'])) echo $this->Html->link($page['Title'],$page['url'], array("rel"=>$page['rel'])); else echo $this->Html->link($page['Title'],$page['url']); ?>
			</div>
		<?php } ?>
	</div>
	<div class="closing"></div>
	<div class="section_end"></div>
</div>
