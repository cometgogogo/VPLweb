<?php if (isset($campaign)) { ?>
<div class="campaign">
	<div class="content">
		<div class="subtitle"><?php echo $campaign['Campaign']['Subtitle']; ?></div>
		<h2><?php
		if(!empty($campaign['Campaign']['URL'])) {
		 	if ($campaign['Campaign']['NewWin']==1) {
				echo $this->Html->link($campaign['Campaign']['Name'], $campaign['Campaign']['URL'], array('rel'=>"external"));
			} else {
				echo $this->Html->link($campaign['Campaign']['Name'], $campaign['Campaign']['URL']);
			}
		} else {
			echo $campaign['Campaign']['Name'];
		}
		?></h2>



		<?php if(!empty($campaign['Campaign']['Image'])) {
			if(!empty($campaign['Campaign']['URL'])) {
				if ($campaign['Campaign']['NewWin']==1) {?>

					<a href="<?php echo $campaign['Campaign']['URL']; ?>" rel="external"><img src="<?php echo "/img/" . $campaign['Campaign']['Image']; ?>" alt="<?php echo $campaign['Campaign']['Name']; ?>" /></a>
				<?php
				} else {?>

				<a href="<?php echo $campaign['Campaign']['URL']; ?>"><img src="<?php echo "/img/" . $campaign['Campaign']['Image']; ?>" alt="<?php echo $campaign['Campaign']['Name']; ?>" /></a>

				<?php
				}

		 	} else {	?>
				<img src="<?php echo "/img/" . $campaign['Campaign']['Image']; ?>" alt="<?php echo $campaign['Campaign']['Name']; ?>" />
		<?php }
		}
		?>
		<div class="description">

			<?php echo $campaign['Campaign']['Description']; ?>
			<?php
			if(!empty($campaign['Campaign']['URL'])) {
				if ($campaign['Campaign']['NewWin']==1) {
					echo "...\n",$this->Html->link("more",$campaign['Campaign']['URL'], array('rel'=>"external")) . "\n";
				} else {
					echo "...\n",$this->Html->link("more",$campaign['Campaign']['URL']) . "\n";
				}
			}
			?>


			<div class="section_end"></div>
		</div>
	</div>
	<div class="section_end">&nbsp;</div>
</div>
<?php } ?>




