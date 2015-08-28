<?php include("crumbs.ctp"); ?>
<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Library Services","url"=>"/library_services"),array("Title"=>"Charges for Overdue, Damaged or Lost Items ","url"=>"/services/loan_charges"), array("Title"=>"How much money do you save using the library","url"=>"/about/calculator")))));
	$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>List of Charges for Additional Services</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		&nbsp;

		<div class="item_table">
			<h2>Services</h2>
			<div class="entry">
				<div class="name">Printing/Photocopy - Black & White, per side</div>
				<div class="value">$0.10 (letter/legal)</div>
				<div class="section_end"></div>
			</div>
			<div class="entry">
				<div class="name">Printing/Photocopy- Colour, per side</div>
				<div class="value">$0.40 (letter/legal)</div>
				<div class="section_end"></div>
			</div>
			<div class="entry">
				<div class="name">Scanning</div>
				<div class="value">$0.05</div>
				<div class="section_end"></div>
			</div>

			<!--div class="entry">
				<div class="name">Printouts from computers - Colour, per side</div>
				<div class="value">$0.57</div>
				<div class="section_end"></div>
			</div -->
			<div class="entry">
				<div class="name">Exam Proctoring fee</div>
				<div class="value">$25.00</div>
				<div class="section_end"></div>
			</div>

			<div class="entry">
				<div class="name">VPL Bags</div>
				<div class="value">$1.00</div>
				<div class="section_end"></div>
			</div>


		</div>

		<div class="item_table">
			<h2>Meeting Rooms</h2>
			<div class="entry">
				<div class="name">Groups registered with City of Vaughan as Community Service Organizations</div>
				<div class="value">$30.00* per use</div>
				<div class="section_end"></div>
			</div>
			<div class="entry">
				<div class="name">Vaughan - Residents</div>
				<div class="value">$45.00* per hour</div>
				<div class="section_end"></div>
			</div>
			<div class="entry">
				<div class="name">Vaughan - Commercial use</div>
				<div class="value">$55.00* per hour</div>
				<div class="section_end"></div>
			</div>
			<div class="entry">
				<div class="name">All others</div>
				<div class="value">$65.00* per hour</div>
				<div class="section_end"></div>
			</div>
			<div class="entry">
				<div class="name">Clean-up charge (may be levied, where warranted)</div>
				<div class="value">$30.00</div>
				<div class="section_end"></div>
			</div>


			<div class="entry">
				<h3>Only at <?php echo $this->Html->link("Pierre Berton Resource Library","/libraries/view/7"); ?>:</h3>
			</div>

			<div class="entry">
				<div class="name">Boardroom </div>
				<div class="value">fees as noted above</div>
				<div class="section_end"></div>
			</div>
			<div class="entry">
				<div class="name">Optional IT Package (includes LCD Projector, screen & Internet Hook-up)</div>
				<div class="value">$75.00</div>
				<div class="section_end"></div>
			</div>
			<div class="entry">
				<div class="name">Training Suite - 8 workstations - Fees as noted above PLUS Non-optional IT Package (includes LCD Projector, Screen & Internet Hook-up)</div>
				<div class="value">$75.00</div>
				<div class="section_end"></div>
			</div>
			<div class="note">* Subject to HST</div>
		</div>


		<div class="entry">
			<h2>Programs</h2>
			<p>
				Payment in full is requested at registration for fee-based programs offered by VPL. A full refund will be made for programs cancelled by Vaughan Public Libraries.
			</p>
		</div>

		&nbsp;
	</div>
	<div class="closing"></div>




</div>