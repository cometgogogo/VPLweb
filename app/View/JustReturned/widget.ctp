<?php $html->addCrumb("Home" , "/"); ?>
<?php $html->addCrumb("Books & Resources" , "/materials"); ?>
<?php $html->addCrumb("We Recommend" , "/materials/recommended"); ?>




<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Just Returned</h1>
	</div>
	<div class="closing"></div>
</div>



<div id="page_content">
	<div class="opening"></div>
	<div class="details">


		<p class="intro">
		Interested in what others have been borrowing?  See what other people have just returned to the library!

		</p>

		<?php foreach ($list as $item): ?>
			<hr>
			<div class="justreturned_item_entry">


					<div class="justreturned_item">

					<div class="justreturned_item_img">
						<?php if (isset($item['JustReturned']['ISBN'])) { ?>
						<a href="http://catalogue.vaughanpl.info/catalogue/lib/item?id=<?php echo $item['JustReturned']['BibID']; ?>" rel="external"><img src="http://lib.syndetics.com/index.aspx?isbn=<?php echo $item['JustReturned']['ISBN']; ?>/MC.GIF" height="80" alt="Find it in the catalogue" /></a>
						<?php } else if (isset($item['JustReturned']['VideoID'])) { ?>

						<a href="http://www.videodetective.net/l/previewtranslator.aspx?Id=<?php echo $item['JustReturned']['VideoID']; ?>&amp;IdType=4&amp;CustomerId=10813&amp;videokbrate=1"><img src="http://www.videodetective.net/l/havepreview.aspx?Id=<?php echo $item['JustReturned']['VideoID']; ?>&amp;IdType=4&amp;CustomerId=10813" alt="Preview it"/></a>

						<?php } else { ?>
						&nbsp;
						<?php } ?>
					</div>

					<div class="justreturned_item_detail">
						<a href="http://catalogue.vaughanpl.info/catalogue/lib/item?id=<?php echo $item['JustReturned']['BibID']; ?>" rel="external"><?php echo $item['JustReturned']['Title']; ?></a><br/>
						<?php echo $item['JustReturned']['Details']; ?>

					</div>
					</div>




			<a href="#" class="link_up_to_top" title="Back to top"></a><br/>
			</div>

		<?php endforeach; ?>




	</div>
	<div class="closing"></div>




</div>



