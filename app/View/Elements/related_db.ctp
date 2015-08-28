<div class="entry framed">
	<div class="opening"><h3>Start here:</h3></div>
	<div class="details">
		<?php foreach ($pages as $page) { ?>
			<div class="framed_item">
			<?php if (isset($page['target'])) echo $this->Html->link($page['Title'],$page['url'], array("target"=>$page['target'])); else echo $this->Html->link($page['Title'],$page['url'], array("rel"=>"external" )); ?>
			</div>
		<?php } ?>
	</div>
	<div class="closing"></div>
	<div class="section_end"></div>
</div>
