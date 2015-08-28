<?php
$this->Html->addCrumb("Home" , "/");
$this->Html->addCrumb("Books & Resources" , "/materials");
$this->Html->addCrumb("Articles & Research" , "/databases");

?>

<?php
 if (isset($category)) {
	$this->pageTitle = "Databases - ".$category["DatabaseCategory"]["CategoryName"];
 } elseif (isset($collection)) {
	$this->pageTitle = "Databases - ".$collection["Area"]["AreaName"];
 } elseif (isset($initial)) {
	$this->pageTitle = "Databases - ".$initial;
 }

 ?>



<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Articles & Research</h1>
	</div>
	<div class="closing"></div>
</div>



<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<!--<div class="intro">

		<p>
			Due to the system upgrading, the access to VPL's databases will be temporarily unavailable as of 9:00am on Friday, June 18. Thank you for your patience!
		</p>
		</div>
-->

		<div class="entry">

		<p>
		Vaughan Public Libraries subscribe to a number of high-quality electronic databases providing a wealth of
		information on a wide range of subjects.
		</p>
		</div>

		<?php if (isset($category)) { ?>
			<h2><?php echo $category["DatabaseCategory"]["CategoryName"]; ?></h2>
		<?php } elseif (isset($collection)) { ?>
			<h2><?php echo $collection["Area"]["AreaName"]; ?></h2>
		<?php } elseif (isset($initial)) { ?>

			<h2>Alphabetical Listing of Databases</h2>
			<div id='pagination'>
				<?php for ($i=65; $i<=90; $i++) { ?>
					<a href="/databases/index/alphabetical/<?php echo chr($i);?>" ><?php echo chr($i);?></a>
					<?php if($i<90) { ?>
					<div class='page_index_separator'>&nbsp;|&nbsp;<wbr></div>
					<?php } ?>
				<?php } ?>

				<div class='page_index_separator'>&nbsp;|&nbsp;<wbr></div><a href="/databases/index/all/" >List All</a>
			</div>
			<br/>
			<h3><?php echo $initial; ?></h3>
		<?php } ?>
		<?php $databaseCount = 0; ?>
		<?php foreach ($databases as $database): ?>


			<div class="list_with_summary">

				<div class="name">
					<?php echo $this->Html->link($database['Database']['Name'], $database['Database']['URL'], array("rel"=>"external")); ?>
				</div>
				<div class="summary">
					<?php
					if (strlen($database['Database']['Description'])>59) {
						echo substr($database['Database']['Description'],0,strpos($database['Database']['Description']," ",60));
					} else {
						echo $database['Database']['Description'];
					}
					?>&nbsp;...
					<?php echo $this->Html->link("more", "/databases/view/".$database['Database']["Short"]); ?><br /><br />
					<?php echo $this->Html->link($database['Database']['Availability'], $database['Database']['URL'], array("rel"=>"external")); ?>

					<?php if ($database['Database']['Help']) { ?>
					&nbsp;&nbsp;

					<a href="javascript:var newwindow=window.open('<?php echo '/files/dbhelp' . $database['Database']['Help']; ?>','popuppage','width=500,height=600,top=100,left=350, scrollbars=yes'); if (window.focus) {newwindow.focus();}">How to search ...</a>

	<?php }?>
				</div>
			</div>
			<?php $databaseCount ++; ?>
		<?php endforeach; ?>
		<?php if ($databaseCount==0) {; ?>
			No databases were found for letter <?php echo $initial; ?>.
		<?php } ?>





	</div>
	<div class="closing"></div>




</div>



