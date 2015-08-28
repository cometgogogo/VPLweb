<?php if (isset($sitearea)) { ?>
<div class="campaign">
	<div class="content">
		<div class="subtitle"><?php echo $sitearea['Campaign']['Subtitle']; ?></div>
		<h2><?php echo $this->Html->link($sitearea['Campaign']['Name'], $sitearea['Campaign']['URL']); ?></h2>
		
		
		
		<?php if(!empty($sitearea['Campaign']['Image'])) { 
			if(!empty($sitearea['Campaign']['URL'])) {?>
				<a href="<?php echo $sitearea['Campaign']['URL']; ?>"><img src="<?php echo "/img/" . $sitearea['Campaign']['Image']; ?>" alt="<?php echo $sitearea['Campaign']['Subtitle']; ?>" /></a>
		 <?php }else{	?>
				<img src="<?php echo "/img/" . $sitearea['Campaign']['Image']; ?>" alt="<?php echo $sitearea['Campaign']['Subtitle']; ?>" />
		<?php }
		}
		?>
		
		
		<div class="description">
			<?php echo $sitearea['Campaign']['Description'] . "...\n"; ?>
			<?php echo $this->Html->link("Check it out",$sitearea['Campaign']['URL']) . "\n"; ?>
			<div class="section_end"></div>
		</div>
	</div>
	<div class="section_end">&nbsp;</div>
</div>
<?php } ?>