<?php include("crumbs.ctp"); ?>
<?php include("crumbs_borrowing.ctp"); ?>




<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Placing Holds</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">


		<div class="entry">
			<h3>Request an Item (Placing a Hold)</h3>
			<p>
				You can find out if a particular item is available for loan by calling 905-653-READ (7323)
				or by checking our online <?php echo $this->Html->link("library catalogue", "https://catalogue.vaughanpl.info/catalogue"); ?>.
			</p>
			<p>
				The first available copy will be sent to the VPL branch you select under "Pick-Up Location",
				and you will be notified by <a href="http://www.vaughanpl.info/library_notification_requests">telephone, email or text notification</a> when it is available for pick-up.
			</p>

			<p><b>Note:</b> You can place holds on up to 100 items at a time. This includes items that you are still waiting for, and items that are ready for you to pick up. If you reach the 100 item hold limit, you just need to check out some of your items that are ready for pick-up, and you will be able to start requesting further titles.
			</p>
		</div>
		<div class="entry">
			<h3>Cancelling a Requested Item</h3>
			<p>If for any reason you wish to cancel an item you have requested, you may do so by:</p>
			<ul>
				<li>telephoning 905-653-READ (7323) during open hours; or</li>
				<li>by accessing <?php echo $this->Html->link("your library account", "https://catalogue.vaughanpl.info/catalogue/auth/login"); ?> online and cancelling your request</li>
			</ul>
			<p>You may not cancel a request that is in transit to your pick up location.</p>
		</div>

		<div class="entry">
			<h3>Suspending a Hold</h3>
			<p>If you are going away and do not want your holds to become available for pick up, you can suspend your holds. When you return, you can re-activate your holds. While your holds are suspended, you will not lose your place in the hold queue.</p>
			<p>If for any reason you wish to suspend an item you have requested, you may do so by:</p>
			<ul>
							<li>telephoning 905-653-READ (7323) during open hours; or</li>
							<li>by accessing <?php echo $this->Html->link("your library account", "http://catalogue.vaughanpl.info/catalogue/auth/login"); ?> online and suspending your request</li>
			</ul>
			<p>You may not suspend a request that is in transit to your pick up location.</p>
		</div>

		&nbsp;

	</div>
	<div class="closing"></div>
</div>