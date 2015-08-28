<?php include("crumbs.php");
$this->pageTitle = "eNewsletter - Forwarding";
?>



<script language="Javascript" type="text/javascript">

function checkform() {

   apos = document.forwardform.elements['email'].value.indexOf("@");
   if ( (eval("document.forwardform.elements['email'].value") == "") || (apos<1)) {
	alert("Please enter a valid email address (example: johnd@some.com)");
	eval("document.forwardform.elements['email'].focus()");
	return false;
   }



   return true;
}

</script>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Share VPL's eNewsletter with a Friend</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
	<!--<div class="intro">Due to the system maintenance, VPL's eNewsletter is temporarily unavailable. Please check back later. Thank you for your patience! </div>-->


		<?php if($submit == 1) {

			//echo "The newsletter has been forwarded to ".$forwardEmail .".";
			echo "The newsletter has been forwarded to your friend.";

		}else {


		?>

			<form method="post" name="forwardform" action="http://newsletter.vaughanpl.info/lists/?p=forward">

				<input type=hidden name="mid" value="<?php echo $msgID; ?>">

				<input type=hidden name="id" value="1">

				<input type=hidden name="uid" value="<?php echo $uniqID; ?>">

				<input type=hidden name="p" value="forward"><BR />

				<h3>Please enter your friend's email address</h3>

				<input type=text name="email" value="" size=50 class="attributeinput"><br /><br />

				<input type="submit" Name="Submit" value="Submit" onClick="return checkform();">

			</form>
		<?php
		}
		?>

	</div>
	<div class="closing"></div>
</div>