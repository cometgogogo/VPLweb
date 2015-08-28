<?php include("crumbs.php");
$this->pageTitle = $message[0]['phplist_message']['subject'];

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
		<div style="display: none !important;"><h2>eNewsletter Archives</h2></div>

			<?php foreach ($message as $mymsg) { ?>

			<?php
			echo "<h2>".$mymsg['phplist_message']['subject'] ."</h2>";
			?>

			<div class="newsletter_entry">
			<?php
			if (($CSS == "large_font") || ($CSS == "large_font_low_graphics")) {
				$display = str_ireplace("x-small","12pt",$mymsg['phplist_message']['message']);
			} else {
				$display = str_ireplace("x-small","10pt",$mymsg['phplist_message']['message']);
			}
			//$display = str_ireplace("<br />","<div style='margin-bottom:0'>&nbsp;</div>",$display);

			echo $display;

			?>
			</div>

			<?php }?>


	</div>



	<div class="closing"></div>




</div>