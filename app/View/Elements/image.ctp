
<br/>
<div class="entry">
		<?php 
		if (isset($image['link'])) {
					
			// low graphics		
					
			if (($CSS == "low_graphics") || ($CSS == "large_font_low_graphics")) {
			?>
			<a href="<?php echo $image['link']?>" rel="external" title="<?php echo $image['title']?>" style="font-weight:bold; font-size:18pt; margin: 10px 0px">
		
			<span class="graphic_link_caption" style="padding-left: 19px; margin-top: 10px"><?php echo $image['title']?></span></a>	
			
			<?php
			} else {
			
			// graphics
			if (isset($image['target'])) {
			?>
			<a href="<?php echo $image['link']?>" rel="<?php echo $image['target']?>" title="<?php echo $image['title']?>" style="background-image:url(<?php echo $image['source']?>);width:<?php echo $image['width'] ?>px;height:<?php echo $image['height'] ?>px;display:block">
			
			<?php
			} else {
			?>
			<a href="<?php echo $image['link']?>" rel="external" title="<?php echo $image['title']?>" style="background-image:url(<?php echo $image['source']?>);width:<?php echo $image['width'] ?>px;height:<?php echo $image['height'] ?>px;display:block">
			
			<?php
			}
			?>
			<span class="graphic_link_caption" style="padding-left: 19px; margin-top: 10px"><?php echo $image['title']?></span></a>			
			
		
			<?php
			}
		} elseif (($CSS != "low_graphics") && ($CSS != "large_font_low_graphics")) {
		?>
			<div style="background-image:url(<?php echo $image['source']?>);width:<?php echo $image['width'] ?>px;height:<?php echo $image['height'] ?>px;display:block"><span class="graphic_link_caption"><?php echo $image['title']?></span></div>
			<br/>
		
		<?php
		}
		?>
</div>
