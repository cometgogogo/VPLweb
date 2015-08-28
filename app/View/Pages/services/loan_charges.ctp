<?php include("crumbs.ctp"); ?>
<?php include("crumbs_borrowing.ctp"); ?>



<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Charges for Overdue, Damaged or Lost Items
</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">


		<div class="entry">

			<h2>Charges</h2>
			<div class="item_table">

			<div class="entry">
				<div class="name">For each item overdue (excluding DVDs) per day or part of a day</div>
				<div class="value">$0.25</div>
				<div class="section_end"></div>
			</div>
			<div class="entry">
				<div class="name">Overdue DVDs, per day or part of a day</div>
				<div class="value">$2.00</div>
				<div class="section_end"></div>
			</div>

			<div class="entry">
				<div class="name">Maximum fine per item</div>
				<div class="value">$10.00</div>
				<div class="section_end"></div>
			</div>
			<div class="entry">
				<div class="name">Total maximum late material charges per customer</div>
				<div class="value">$25.00</div>
				<div class="section_end"></div>
			</div>

			<!-- div class="entry">
				<div class="name">Repairs to damaged items</div>
				<div class="value">At cost to library</div>
				<div class="section_end"></div>
			</div -->

			<div class="entry">
				<div class="name">Damaged or lost items</div>
				<div class="value">Full replacement cost (including $5.00 administration fee)</div>
				<div class="section_end"></div>
			</div>

			<div class="entry">
				<div class="name">Collection fee for library records sent to the collection agency</div>
				<div class="value">$20.00</div>
				<div class="section_end"></div>
			</div>

			<div class="entry">
				<div class="name">Activities causing damage to library computers, systems, software or computer equipment</div>
				<div class="value">$150.00</div>
				<div class="section_end"></div>
			</div>
			</div>

			<div class="entry">
			<p>You may pay fines at any <?php echo $this->Html->link("Vaughan Public Libraries branch", "/libraries"); ?> or over the phone at 905-653-READ(7323).
			</p>
			</div>
		</div>

		<div class="entry">
			<h2>Suspension of Membership</h2>
			<p>
			Borrower privileges are withdrawn: </p>

			<ul>
			<li>when fines and charges reach $10.00 or more;</li>
			<li>if 20 items, or 3 requested items, or more, are overdue for 21 days or longer;</li>
			<li>if 1 or more items are overdue 35 days or longer;</li>
			<li>if lost materials are not paid for;</li>
			<li>if user activities damage library computers, systems, software of computer equipment;</li>
			<li>if a user persistently fails to comply with VPL Policies, Regulations and Rules of Conduct;</li>
			<li>library card expired;</li>
			<li>card reported as lost.</li>
			</ul>

			<p>
			Privileges will be reinstated upon payment of all outstanding charges.
			</p>
		</div>

		&nbsp;
	</div>
	<div class="closing"></div>




</div>