<?php $this->Html->addCrumb("Home" , "/"); ?>
<?php $this->Html->addCrumb("Books & Resources" , "/materials"); ?>
<?php $this->Html->addCrumb("We Recommend" , "/materials/recommended"); ?>



<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Award Winners</h1>
	</div>
	<div class="closing"></div>
</div>



<div id="page_content">
	<div class="opening"></div>
	<div class="details">


		<p class="intro">
		VPL has many award-winning titles in its collection, representing major literary awards such as the
		Giller, Nobel, and Pulitzer Prizes.
		</p>

		<p>Listed below are a number of the more prominent literary awards, with some of the titles which have won those awards. To place a hold on any of these titles, please use our <?php echo $this->Html->link("Online Catalogue","http://catalogue.vaughanpl.info"); ?>.</p>


		<?php foreach ($awards as $award): ?>


			<div class="list_with_summary">

				<div class="name">
					<?php echo $this->Html->link($award['Award']['name'], "/awards/view/".$award['Award']['AwardID']); ?>
				</div>
				<div class="summary">
					<?php echo substr($award['Award']['description'],0,strpos($award['Award']['description'],' ',120)); ?>...
					<?php echo $this->Html->link("more", "/awards/view/".$award['Award']['AwardID']); ?>
				</div>
			</div>

		<?php endforeach; ?>






	</div>
	<div class="closing"></div>




</div>



