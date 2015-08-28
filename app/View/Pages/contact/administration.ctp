<?php include("crumbs.ctp"); ?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Email Librarian","url"=>"/email_librarian"),array("Title"=>"Contact Local Branch","url"=>"/libraries"),array("Title"=>"Accessibility Customer Feedback Form","url"=>"/files/accessibility.pdf ")))));
	$this->set('relatedContentElements', $relatedContentElements);
?>



<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Contact VPL Administration</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="intro">
				Please send general correspondence to our mailing address or use our Contact Administration Form:
		</div>

		<div class="entry">
			<h2>Mailing Address</h2>
			<p>Please send general correspondence to:</p>
			<p>
				Vaughan Public Libraries<br />
				900 Clark Avenue West<br />
				Vaughan, Ontario<br />
				Canada, L4J 8C1
			</p>
			<p>
				Telephone: (905) 653-READ (7323)<br />
				Fax: (905) 709-1530
			</p>
		</div>
		<div class="entry">
			<h2>Email Contact Form</h2>
			<p>
				If you want to contact Vaughan Public Libraries' Administration, or if you have questions or comments for the Senior Management Team, you can also use our <?php echo $this->Html->link("Administration Contact Form","/administration_inquiries"); ?>.
			</p>
		</div>

		<div class="entry">
			<h2>Senior Management Team</h2>
			<p>
				Margie Singleton<br />
				Chief Executive Officer<br />
				Email: margie.singleton@vaughan.ca<br />
				Telephone: Ext. 4101
			</p>
			<p>
				Terri Watman<br />
				Director of Service Delivery<br />

				Email: terri.watman@vaughan.ca<br />
				Telephone: Ext. 4124
			</p>

			<p>
				Sandy Vander Werff<br />
				Director of Finance<br />
				Email: sandy.vanderwerff@vaughan.ca<br />
				Telephone: Ext. 4104
			</p>

			<p>
			Aleksandra Dowiat Vine
				<!--Terri Watman--><br />
				Director of Planning & Communication<br />
				Email: aleksandra.dowiat-vine@vaughan.ca
				<!--Email: terri.watman@vaughan.ca-->
				<br />
				Telephone: Ext. 4120
			</p>
			<p>
				Marilyn Guy<br />
				Director of Operations<br />
				Email: marilyn.guy@vaughan.ca<br />
				Telephone: Ext. 4114
			</p>
		</div>

		&nbsp;
	</div>
	<div class="closing"></div>
</div>