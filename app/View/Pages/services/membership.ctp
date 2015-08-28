<?php include("crumbs.ctp"); ?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Apply Online","url"=>"https://www.vaughanpl.info/membership_applications"), array("Title"=>"How much money do you save using the library","url"=>"/about/calculator")))));
	$this->set('relatedContentElements', $relatedContentElements);
?>



<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Membership</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<div class="entry">
			<p>If you live, work, own property, or are in attendance at an educational institution in the City of Vaughan, you qualify for free membership. If you live, work, own property, or are in attendance at an educational institution in a municipality with which Vaughan Public Libraries (VPL) has a reciprocal borrowing agreement, you may qualify for a free library card. The municipalities include: Aurora, Brampton, King Township, Markham, Newmarket, Richmond Hill and the Town of Caledon. In all cases, presentation of valid identification is required.  Membership for those who do not qualify is available for an annual fee of $80.00 plus HST. </p>

			<p>People not wishing to borrow materials and not eligible to become a member of VPL may obtain a non-member library card to utilize public computer workstations and printers for an annual fee of $10.00 plus HST.</p>

		</div>

		<div class="entry">
			<h2>Apply Online</h2>
			<p>
				 Online application is available to anyone who qualifies for free membership.
			</p>
			<p>
				Please note: online applications will be processed within 72 hours excluding holidays and branch closures.
				When your Library Card is ready, a VPL staff member will send you an email acknowledgment, and you will be able to collect your card from the branch of your choice as indicated on the online application.
				<?php echo $this->Html->link("Apply now","https://www.vaughanpl.info/membership_applications"); ?>.
			</p>
		</div>
		<div class="entry">
			<h2>Apply in Person</h2>
			<p>
				 You may visit any <?php echo $this->Html->link("Vaughan Public Libraries branch","/libraries"); ?> to apply for membership.
			</p>
			<p>
				You must apply in person at any VPL branch if you do not qualify for free membership.
			</p>
			<p>
				Children under the age of 13 must be accompanied by a parent or guardian to obtain a VPL Library Card.
			</p>
		</div>
		<div class="entry">
			<h2><a name="membership_renewal">Membership Renewal</a></h2>
			<p>
				 You can renew your library card in person at any <?php echo $this->Html->link("Vaughan Public Libraries branch","/libraries"); ?> with a valid identification. An annual membership fee applies for renewal of non-resident or non-member library cards. All fines and fees must be paid in full prior to membership being renewed. You cannot renew your materials if your card is expired, and if it is due to expire before the full renewal time period, then your materials will be due on the date your card expires.
			</p>

		</div>

		<div class="entry">
			<h2>Acceptable Identification</h2>
			<p>
				Whether you register online or in person, you will need to bring identification with you to obtain a VPL Library Card. Staff will ask you for identification that shows your name and home address.  You will also need a piece of identification that demonstrates one of the membership criteria below.  It can be the same identification that has your name and home address.
			</p>
			<ul>
				<li>current home address in the City of Vaughan (drivers licence, utility bill - telephone, hydro, cable);</li>
				<li>employment in the City of Vaughan (pay stub);</li>
				<li>registration at a school or college in the City of Vaughan (report card); or</li>
				<li>title/deed for land owned in the City of Vaughan;</li>
				<li>one or more of the above from a municipality with which VPL has a reciprocal borrowing agreement.</li>
				</ul>
			<p>Please note: electronic identification and e-bills are not considered valid forms of identification.</p>
		</div>

		<div class="entry">
			<h2>PIN (Personal Identification Number)</h2>
			<p>A PIN is necessary to access your library account online and to access databases. You can set up your PIN at any <?php echo $this->Html->link("VPL branch","/libraries"); ?>.</p>

			<p>When you register, you will be asked to provide us with a four digit number. Please remember this number for use at a later date.</p>

			<p>Your PIN protects access to your library record. As a result, it is important to choose a number other people won't be able to guess easily. Once your PIN is set up, keep it in a safe place and don't give the number to anyone.</p>

			<p>If you forget your PIN,</p>
			<ul>
			<li>You may visit one of the <?php echo $this->Html->link("library branches", "/libraries"); ?> in person and staff there will be able to activate a new PIN for you (valid identification or library card are required).</li>
			<li>If you have signed up for <?php echo $this->Html->link("Email Notification", "http://www.vaughanpl.info/library_notification_requests"); ?> with VPL, you may use the Forgot Your PIN link on the <?php echo $this->Html->link("catalogue login form", "https://catalogue.vaughanpl.info/catalogue/auth/login"); ?> and get a new PIN online. </li></ul>

			<p>You may also change your PIN online. <?php echo $this->Html->link("Login to your library account", "https://catalogue.vaughanpl.info/catalogue/auth/login"); ?>, click on My Account - Contact Information tab, then click on Change PIN link to change your PIN.

			</p>
		</div>
		&nbsp;
	</div>
	<div class="closing"></div>
</div>