<?php
$html->addCrumb("Home" , "/");
$html->addCrumb("News and Events" , "/news_and_events");

//$relatedContentElements[] = array ('image', array("image"=>array("source"=>"/img/evergreen/evergreen_logo.jpg", "target"=>"_blank", "width"=>"146", "height"=>"146", "link"=>"https://www.accessola.org/OLAWEB/Forest_of_Reading/Awards_Nominees/Evergreen_Nominees.aspx", "title"=>"OLA Evergreen Award Website")));
$this->controller->set('relatedContentElements', $relatedContentElements);

?>
<script type="text/javascript">
<!--
function validate_vote() {
	var valid = false;
	
	for (var i=0; i < 10; i++) {
				if (document.evergreen.vote[i].checked == true) {
					valid = true;
				} 
			}
	if (!valid) {
		alert("Please choose your favorite book.");
		document.evergreen.vote[0].focus();
	}
	return valid;
}
//-->
</script>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>The 2014 Evergreen Award</h1>
	</div>
	<div class="closing"></div>
</div>



<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<p>
		The Evergreen Award was introduced in 2005 for adults of all ages. It gives adult library patrons the opportunity to read a selection of Canadian fiction and non-fiction works then determine which title they like the most. Vote for your favourite title in October!  </p>
		<h3>Nominated Titles</h3>
		
	
		
		
	
	
	<p>
		Simply choose your favourite book, then click on "Cast Your Vote" button.
		</p>
			
		<p>Note: To be eligible to vote, participants must be over 18 years of age.</p>
		<br />
		<?php if (isset($msg)) {echo "<p class=\"evergreen_msg\">". $msg. "</p>";}  ?>
	
	<br />
	<br />
	<form id="evergreen" name="evergreen" method="post" action="<?php echo $html->url('/evergreen_votes'); ?>" onsubmit="return validate_vote(); ">
	
	<table>
	<tr><td>&nbsp;</td></tr>
	<?php 
	
		
		
		for ($i=0; $i<10; $i++) { 
				
				echo "<tr>";
				echo "<td width='10%'>";
				echo "<a href=\"".  $evergreendata[$i]["EvergreenVote"]["Url"] .  "\" target=\"_blank\"><img class=\"img_left\" src=\"".  $evergreendata[$i]["EvergreenVote"]["Image"] .  "\" width=64px height=100px alt=\"". $evergreendata[$i]["EvergreenVote"] ["ItemName"]. " cover\" /></a>";
				echo "</td>";
				echo "<td width='40%'>";
				echo "<input type=\"radio\" Name=\"vote\" id=\"vote" . $i ."\" Value=\"". $evergreendata[$i]["EvergreenVote"] ["ItemID"]. "\" /> &nbsp;";
				echo "<label for='vote" . $i ."'><span style='display: none !important;'>vote for:</span></label>";
				echo "<strong><a href=\"" .$evergreendata[$i]["EvergreenVote"]["Url"] . "\" target=\"_blank\">". $evergreendata[$i]["EvergreenVote"] ["ItemName"]."</a></strong><br />";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Author: " . $evergreendata[$i]["EvergreenVote"]["Author"]."<br />";
				if ($displayVote) {echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vote: " . $evergreendata[$i]["EvergreenVote"]["Vote"]."<br />";}
				
				echo "</td>";
				echo "<td width='10%'>";
				echo "<a href=\"".  $evergreendata[$i+1]["EvergreenVote"]["Url"] .  "\" target=\"_blank\"><img class=\"img_left\" src=\"". $evergreendata[$i+1]["EvergreenVote"]["Image"] .  "\" width=64px height=100px alt=\"". $evergreendata[$i+1]["EvergreenVote"] ["ItemName"]. "cover\" /></a>";
				echo "</td>";
				echo "<td width='40%'>";
				$j=$i+1;
				echo "<input type=\"radio\" Name=\"vote\" id=\"vote" . $j ."\" Value=\"". $evergreendata[$i+1]["EvergreenVote"] ["ItemID"]. "\" /> &nbsp;";
				echo "<label for='vote" . $j ."'><span style='display: none !important;'>vote for:</span></label>";
				echo "<strong><a href=\"" .$evergreendata[$i+1]["EvergreenVote"]["Url"] . "\" target=\"_blank\">". $evergreendata[$i+1]["EvergreenVote"] ["ItemName"]."</a></strong><br />";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Author: " . $evergreendata[$i+1]["EvergreenVote"]["Author"]."<br />";
				if ($displayVote) {echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vote: " .  $evergreendata[$i+1]["EvergreenVote"]["Vote"]."<br />";}
				
				$i++;
				echo "</td>";
				echo "</tr>";
		}	
	?>		
	
	</table>
	
	<div class="greenButton">
	<input type="submit" name="submit" value=" " />
	</div> 
		
	</form>
	
	</div>
	
	
	
	<div class="closing"></div>

</div>


