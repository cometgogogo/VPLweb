<?php 
$html->addCrumb("Home" , "/");
$html->addCrumb("Books, Materials & Research Tools" , "/materials");
$html->addCrumb("Recommended Reads" , "/materials/recommended");
?>




<?php
	$currentTitle = null;
	$currentAuthor = null;
?>



<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Reader Reviews</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	
	<div class="details">
		<div class="header">
		</div>
		<div class="content">
			<p class="intro">Read a good book lately? Watched a great video or DVD?</p>

			<p>Or perhaps you recently signed out something from the Library you really DIDN'T like.</p>
			<p>Share your experience (good or bad) by <?php echo $html->link("submitting a review","/reviews/add"); ?>. We'll post reviews here for all to see ...</p>

			<div class="search_results">
				<div class="opening">
					Reviews 
					<div class="data"><?php echo $page*10-9 ?></div> to 
					<div class="data"><?php echo min($page*10,$totalReviews) ?></div> of 
					<div class="data"><?php echo $totalReviews ?></div> total found 
				</div>
				
					
					<?php foreach ($reviews as $review) { ?>
					
						<?php if ($review['Review']['title'] != $currentTitle || $review['Review']['author'] != $currentAuthor) { ?>
							<h2><?php echo $review['Review']['title']; ?></h2>
							<?php echo $review['Review']['author']; ?>
							<ul>
							<?php
								$currentTitle = $review['Review']['title'];
								$currentAuthor = $review['Review']['author'];
							?>
						<?php } ?>
					
						<li>
							<div class="technical_details"><?php echo $review['Review']['review']; ?></div>
							<div class="technical_details"><?php echo $review['Review']['first_name']; ?> <?php echo $review['Review']['last_name']; ?></div>
							<div class="url"><?php echo $libraries[$review['Review']['BranchID']]; ?></div>
						</li>
					<?php } ?>				
				</ul>
				<div class="closing"><?php echo $pagination->pageLinks($page, $totalReviews,$paginationBaseUrl); ?></div>
			</div>
		</div>		
	</div>
	<div class="closing"></div>
	
	
	
	
</div>