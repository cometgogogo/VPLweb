<?php
$html->addCrumb("Home" , "/");
$html->addCrumb("News and Events" , "/news_and_events");

?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>The Evergreen Votes Report</h1>
	</div>
	<div class="closing"></div>
</div>



<div id="page_content">
	<div class="opening"></div>
	<div class="details">
	
	
	
	<?php 

	foreach ($stats as $stats) {
		echo "<p class=\"important_note\">" . $stats['Library']['BranchName'] . "&nbsp;&nbsp;&nbsp;&nbsp; Total Votes:&nbsp;" . $stats['EvergreenBranchvote']['VoteCount'] . "</p>";
		}
	?>
		

		
	</div>
	
	

	
	<div class="closing"></div>

</div>


