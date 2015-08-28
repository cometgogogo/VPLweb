<?php include("crumbs.php");
$this->pageTitle = "eNewsletter - Archives";
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>eNewsletter Archives</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>

	<div class="details">




					<?php foreach ($archives as $archive) { ?>
						<p>
							<div class="name"><?php echo $html->link($archive['phplist_message']['subject'], "/newsletters/view/" . $archive['phplist_message']['id']); ?></div>
							<div class="description">Sent: <?php echo $archive['phplist_message']['sent']; ?></div>
							<br/>

						</p>
					<?php } ?>




	</div>
	<div class="closing"></div>




</div>