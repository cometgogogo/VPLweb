<?php $this->Html->addCrumb("Home" , "/"); ?>
<?php $this->Html->addCrumb("Books & Resources" , "/materials"); ?>
<?php
$this->Html->addCrumb("We Recommend" , "/materials/recommended");
$this->pageTitle = "New Arrivals";

?>



<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>New Arrivals</h1>
	</div>
	<div class="closing"></div>
</div>



<div id="page_content">
	<div class="opening"><h2><span style="display: none !important;">New Arrival</span></h2></div>
	<div class="details">
		<div class="intro">Check out the new arrivals in VPL's collection!</div>
	<?php
	$arrival = array ();
	$arrival['adult'] = array();
	$arrival['youth'] = array();
	$arrival['child'] = array();
	$arrival['media'] = array();
	$arrival['multilingual'] = array();
	$arrival['themed'] = array();
	$arrival['ebook'] = array();


		 foreach ($new_arrivals as $list):
			if ($list['NewArrival']['ListID'] < 4) {
				array_push($arrival['adult'], $list);
			}else if ($list['NewArrival']['ListID'] >= 6 && $list['NewArrival']['ListID'] <= 9) {
				array_push($arrival['child'], $list);
			}else if ($list['NewArrival']['ListID'] == 12 || $list['NewArrival']['ListID'] == 13) {
				array_push($arrival['youth'], $list);
			}else if ($list['NewArrival']['ListID'] >= 18 && $list['NewArrival']['ListID'] <= 30) {
				array_push($arrival['multilingual'], $list);
			}else if ($list['NewArrival']['ListID'] == 37) {
				array_push($arrival['ebook'], $list);
			}else if ($list['NewArrival']['ListID'] >= 31 && $list['NewArrival']['ListID']<37) {
				array_push($arrival['themed'], $list);
			}else {
				array_push($arrival['media'], $list);

			}
		 endforeach;
		?>
		<div class="new_arrivals_index_table">
				<div class="entry">

					<div class="img"><img src="/img/adult_book.gif" alt="Adult Books" title="Adult Books" /></div>
					<?php foreach ($arrival['adult'] as $adult): ?>
						<div class="name"><?php echo $this->Html->link($adult['NewArrival']['ListName'], "/new_arrivals/view/".$adult['NewArrival']['ListID']); ?>
							<div class="rss">
								<a class="new_arrivals_link_rss" href="http://www.vaughanpl.info/new_arrivals/feed/<?php echo $adult['NewArrival']['ListID']; ?>" title="Subscribe to this list"><span class="graphic_link_caption">Subscribe to <?php echo $adult['NewArrival']['ListName']; ?></span></a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="entry">
					<div class="img"><img src="/img/kid_book.gif" alt="Children's Books" title="Children's Books" /></div>

					<?php foreach ($arrival['child'] as $child): ?>
						<div class="name"><?php echo $this->Html->link($child['NewArrival']['ListName'], "/new_arrivals/view/".$child['NewArrival']['ListID']); ?>
						<div class="rss"><a class="new_arrivals_link_rss" href="http://www.vaughanpl.info/new_arrivals/feed/<?php echo $child['NewArrival']['ListID']; ?>" title="Subscribe to this list"><span class="graphic_link_caption">Subscribe to <?php echo $child['NewArrival']['ListName']; ?></span></a></div></div>
					<?php endforeach; ?>
				</div>


				<div class="entry">

					<div class="img"><img src="/img/youth_book.gif" alt="Young Adult Books" title="Young Adult Books" /></div>

					<?php foreach ($arrival['youth'] as $youth): ?>
						<div class="name"><?php echo $this->Html->link($youth['NewArrival']['ListName'], "/new_arrivals/view/".$youth['NewArrival']['ListID']); ?>
						<div class="rss"><a href="http://www.vaughanpl.info/new_arrivals/feed/<?php echo $youth['NewArrival']['ListID']; ?>" class="new_arrivals_link_rss"  title="Subscribe to this list"><span class="graphic_link_caption">Subscribe to <?php echo $youth['NewArrival']['ListName']; ?></span></a></div></div>
					<?php endforeach; ?>

				</div>
				<div class="entry">

					<div class="img"><img src="/img/media.gif" alt="Media Collections" title="Media Collections" /></div>

					<?php foreach ($arrival['media'] as $media): ?>
						<div class="name"><?php echo $this->Html->link($media['NewArrival']['ListName'], "/new_arrivals/view/".$media['NewArrival']['ListID']); ?>
						<div class="rss"><a href="http://www.vaughanpl.info/new_arrivals/feed/<?php echo $media['NewArrival']['ListID']; ?>" class="new_arrivals_link_rss" title="Subscribe to this list"><span class="graphic_link_caption">Subscribe to <?php echo $media['NewArrival']['ListName']; ?></span></a></div></div>
					<?php endforeach; ?>

				</div>
				<div class="entry">

					<div class="img"><img src="/img/ebook.gif" alt="eBooks Collections" title="eBooks Collections" /></div>

					<?php foreach ($arrival['ebook'] as $ebook): ?>
						<br/>
						<div class="name"><?php echo $this->Html->link($ebook['NewArrival']['ListName'], "/new_arrivals/view/".$ebook['NewArrival']['ListID']); ?>
						<div class="rss"><a href="http://www.vaughanpl.info/new_arrivals/feed/<?php echo $ebook['NewArrival']['ListID']; ?>" class="new_arrivals_link_rss" title="Subscribe to this list"><span class="graphic_link_caption">Subscribe to <?php echo $ebook['NewArrival']['ListName']; ?></span></a></div></div>
					<?php endforeach; ?>

				</div>

				</div>

	<hr/>
		<h3>Themed Collections</h3>
	<br/>
		<table class="new_arrivals_table"><tr>

					<?php
					$i = 0;
					foreach ($arrival['themed'] as $themed): ?>
						<td><div class="entry">
							<?php
							//2012-10-16::link to business new arrival, if there s new themed new arrival added, change code back? or talk to Yue
							//2014-2-14 changed back and add a check to business

							if ($themed['NewArrival']['ListID']==31) {
								echo $this->Html->link($themed['NewArrival']['ListName'], "/business#arrival");
							} else {
								echo $this->Html->link($themed['NewArrival']['ListName'], "/new_arrivals/view/".$themed['NewArrival']['ListID']);
							}



							?>
							<div class="rss">
								<a href="http://www.vaughanpl.info/new_arrivals/feed/<?php echo $themed['NewArrival']['ListID']; ?>" class="new_arrivals_link_rss"  title="Subscribe to this list"><span class="graphic_link_caption">Subscribe to <?php echo $themed['NewArrival']['ListName']; ?></span></a>
							</div>
						</div>
						</td>
						<?php
						$i ++;
						if($i % 3 == 0){ echo "</tr><tr>";} ?>
					<?php endforeach; ?></tr>
					</table>

		<hr/>
	<h3>Collections in Other Languages</h3>
	<br/>
		<table class="new_arrivals_table"><tr>
					<?php

					$i = 0;
					foreach ($arrival['multilingual'] as $multilingual): ?>

						<td>
						<a href="/new_arrivals/view/<?php echo $multilingual['NewArrival']['ListID']; ?>"><img src="/img/multilingual/<?php echo strtok($multilingual['NewArrival']['ListName'], ' ') . '.gif'; ?>" height="20" valign="bottom" alt="<?php echo $multilingual['NewArrival']['ListName']; ?>" title="<?php echo $multilingual['NewArrival']['ListName']; ?>" /></a>
						<a class="new_arrivals_link_rss" href="http://www.vaughanpl.info/new_arrivals/feed/<?php echo $multilingual['NewArrival']['ListID']; ?>" title="Subscribe to this list"><span class="graphic_link_caption">Subscribe to <?php echo $multilingual['NewArrival']['ListName']; ?></span></a>
						&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<?php
						$i ++;
						if($i % 6 == 0){ echo "</tr><tr>";} ?>

					<?php endforeach; ?>
		</tr></table>




	</div>
	<div class="closing"></div>




</div>



