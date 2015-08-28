<?php include("crumbs.ctp"); ?>
<?php include("crumbs_borrowing.ctp"); ?>



<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Renewing Your Loans</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="entry">

			<p>
				If no other requests are outstanding, most materials may be renewed ten times from the date of renewal,
				<strong>not</strong> from the due date. Materials can be renewed in one of six ways (see below).				
			</p>


			<div class="list_with_summary">
				<div class="name">By Internet</div>
				<div class="summary">
					Access your
					<?php echo $this->Html->link("library account", "https://catalogue.vaughanpl.info/catalogue/auth/login"); ?>. You will need your library card number and PIN to login.
				</div>
			</div>
			<div class="list_with_summary">
				<div class="name">By Phone</div>
				<div class="summary">
					Call our <a href="#phone_renewal">automated telephone renewal service</a> at (905) 709-0672.
				</div>
			</div>
			<div class="list_with_summary">
				<div class="name">By Text Messaging</div>
				<div class="summary">
					Text SIGNUP to 647-694-1289 to sign up for <a href="/library_notification_requests">text notification</a>, then you'll be able to renew by texting from Courtesy and Overdue notices.
				</div>
			</div>


			<div class="list_with_summary">
				<div class="name">Self Check Stations</div>
				<div class="summary">
					You can renew your items at the <a href="/library_services#computer">Self Check Stations</a>.

				</div>
			</div>
			<div class="list_with_summary">
				<div class="name">Using Library Mobile App</div>
				<div class="summary">
					VPL's mobile app <a href="/materials/downloads_digital#app">VaughanPL</a> is availble to download from <a href="https://itunes.apple.com/us/app/vaughan-public-libraries/id584423319" target="_blank">Apple App Store</a> and <a href="https://play.google.com/store/apps/details?id=com.vtls.mozgo.vpl" target="_blank">Google Play</a>.
				</div>
			</div>
			
			<div class="list_with_summary">
				<div class="name">In Person</div>
				<div class="summary">
					During regular open hours, staff will renew your items over the phone or in person.
					If you require assistance, please phone (905) 653-READ (7323).
				</div>
			</div>

		</div>

		<div class="entry">
			<h2><a name="phone_renewal">Automated Telephone Renewal</a></h2>
			<p>
				Call (905) 709-0672 any time of day, seven days a week.
				Please listen to the entire message before entering any information,
				and remember to have your Library card ready -
				you'll need to enter all the numbers found under the barcode to access the options described below:
			</p>
		</div>
		<div class="entry">
			<h3>Renew Items On Loan</h3>
			<p>Please listen to the entire message before entering your choice:</p>
			<ul>
				<li>Press '2' for your library record options.</li>
				<li>Press '5' for renewals.</li>
			</ul>
			<p>Please wait for the attendant to finish speaking to confirm that your request has been received.</p>
		</div>
		<div class="entry">
			<h3>List Items On Loan</h3>
			<p>The automated attendant will read a list of items you currently have on loan.</p>
		</div>

		&nbsp;

	</div>
	<div class="closing"></div>
</div>