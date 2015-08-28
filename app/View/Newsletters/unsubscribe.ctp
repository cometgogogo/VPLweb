<?php include("crumbs.php");
$this->pageTitle = "eNewsletter - Unsubscribe";
?>



<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Unsubscribe from our eNewsletter</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
	<div style="display: none !important;"><h2>Unsubscribe</h2></div>
	<!--<div class="intro">Due to the system maintenance, VPL's eNewsletter is temporarily unavailable. Please check back later. Thank you for your patience! </div>
-->



		<?php
		if ($submit == 1) {

			echo "<div class=intro>You have unsubscribed from VPL's eNewsletter.</div>
			";

		} else {

		?>

		<form method="post" action="http://newsletter.vaughanpl.info/lists/?p=unsubscribe">
		<div class="entry">If you would like to unsubscribe from VPL's eNewsletter, please enter your email address below and click on the unsubscribe button.
		<label for="unsubscribeemai">Email</label>
		<input type=text name="unsubscribeemail" id="unsubscribeemail" value="<?php echo $email;?>" size=40>
		</div>

		<div class="entry">We are sorry to see you go! To help us improve our services, please tell us why you are unsubscribing. (Optional)

		<textarea name="unsubscribereason" cols="40" rows="10" wrap="virtual" value=""></textarea>
		</div>

		<p>
		<em>(<strong>Please use this form if you would like to permanently unsubscribe from VPL's eNewsletter. However, if you would like to change the email address to which you receive VPL's eNewsletter, please <a href="http://www.vaughanpl.info/newsletters/preference&uid=<?php echo $uid;?>">update your preferences</a> instead.</strong>)</em>
		</p>
		<p><input type=submit name="unsubscribe" value="Unsubscribe"></p></form>
		<?php
	 	}

		?>




		&nbsp;
	</div>
	<div class="closing"></div>
</div>