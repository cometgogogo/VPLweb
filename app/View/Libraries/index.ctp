<?php $this->Html->addCrumb("Home" , "/"); ?>
<?php $this->Html->addCrumb("About Vaughan Public Libraries" , "/about"); ?>	




<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Locations and Hours</h1>
	</div>
	<div class="closing"></div>
</div>



<div id="page_content">
	<div class="opening"></div>
	<div class="details">
	
		<div class="intro">
		<p><a href="/libraries/map">Map of library locations</a></p>
		</div>

		<?php foreach ($libraries as $library): ?> 

			
			<div class="list_with_summary">
				
				<div class="name">
					<?php echo $this->Html->link($library['Library']['BranchName'], "/libraries/view/".$library['Library']['BranchID']); ?>
				</div>
				<div class="summary">
					<?php if ($library['Library']['street'] <> "") { ?>
						<?php echo $library['Library']['street']; ?><br />
						<?php echo $library['Library']['city']; ?>, Ontario <?php echo $library['Library']['postal_code']; ?><br />
					<?php } ?>
					<?php if ($library['Library']['telephone'] <> "") { ?>
						Telephone: <?php echo $library['Library']['telephone']; ?><br />
					<?php } ?>
					<?php if ($library['Library']['fax'] <> "") { ?>
						Fax: <?php echo $library['Library']['fax']; ?><br />
					<?php } ?>
					<?php echo $this->Html->link("more ...", "/libraries/view/".$library['Library']['BranchID']); ?>
				</div>
			</div>
			
		
		<?php endforeach; ?>


		
		

		
	</div>
	<div class="closing"></div>
	
	
	
	
</div>



