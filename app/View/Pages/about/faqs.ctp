<?php include("crumbs.ctp"); ?>
<?php
		$relatedContentElements = array	();
		$relatedContentElements[] = array ('excerpt', array("excerpt"=>"<b>VPL's Vision Statement:</b><br/>Enrich&nbsp;&nbsp;&nbsp;Inspire&nbsp;&nbsp;&nbsp;Transform<b><br/><br/>VPL's Mission:</b><br/>Vaughan Public Libraries offer welcoming destinations that educate, excite and empower our community."));

$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Online Catalogue FAQs","url"=>"http://catalogue.vaughanpl.info/catalogue/resources/help/Faq.htm", "rel"=> "external")))));
		$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Frequently Asked Questions</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<div class="intro">
			Below are answers to frequently asked questions that VPL has received from library users:
		</div>

		<div class="entry">
			<p>
				<?php echo $this->Html->link("Q: What is my PIN and how do I get one?", "#q1"); ?><br />
				<?php echo $this->Html->link("Q: What are databases and how do I access them?", "#q2"); ?><br />
				<?php echo $this->Html->link("Q: How to let my home computer remember my library card number and PIN?", "#q3"); ?><br />
				<?php echo $this->Html->link("Q: Can I suggest an item for the libraries' collection?", "#q4"); ?><br />
				<?php echo $this->Html->link("Q: What happens if I lose an item I've borrowed from the library?", "#q5"); ?><br />
				<?php echo $this->Html->link("Q: If my library items are due and I still need them or I can't get to the library, can I keep the items after their due date?", "#q6"); ?><br />
				<?php echo $this->Html->link("Q: How come I'm charged overdue fines?", "#q7"); ?><br />
				<?php echo $this->Html->link("Q: I don't like getting phones calls from the automated phone system when I have overdue items or items waiting for me, what can I do?", "#q8"); ?><br />
				<?php echo $this->Html->link("Q: I want to borrow an item, but it isn't available at my local branch, what can I do?", "#q9"); ?><br />
				<?php echo $this->Html->link("Q: Is there a limit to the number of items I can borrow or request?", "#q10"); ?><br />
				<?php echo $this->Html->link("Q: I want to place multiple holds / requests on items. Do I have to enter my library card number each time?", "#q11"); ?><br />
				<?php echo $this->Html->link("Q: How do I get a library card?", "#q12"); ?><br />
				<?php echo $this->Html->link("Q: What is RSS?", "#q13"); ?><br />
				<?php echo $this->Html->link("Q: What is an RSS reader?", "#q14"); ?><br />
				<?php echo $this->Html->link("Q: How to subscribe to an RSS feed?", "#q15"); ?><br />
			</p>
		</div>



		<div class="entry">
			<a name="q1"></a>
			<h2>What is my PIN and how do I get one?</h2>
			<p>Your PIN is your Personal Identification Number and serves as a security check when you try to access your library record online, access your ebooks account or access databases.  You need it in order to <?php echo $this->Html->link("check your library record", "http://catalogue.vaughanpl.info/catalogue/auth/login"); ?>, to <?php echo $this->Html->link("renew items online", "http://catalogue.vaughanpl.info/catalogue/auth/login"); ?>, to <?php echo $this->Html->link("access your ebooks account", "http://ebooks.vaughanpl.info/BANGAuthenticate.dll?Action=AuthCheck&URL=MyAccount.htm?PerPage=80&ForceLoginFlag=0"); ?> and to <?php echo $this->Html->link("access databases", "/databases"); ?>.</p>
			<p>You selected your own PIN when you registered for a library card.  If you don't remember it or you wish to change it,</p>
			<ul>
			<li>You may visit one of  the <?php echo $this->Html->link("library branches", "/libraries"); ?> in person and show valid identification and your library card.</li>
			<li>If you have signed up <?php echo $this->Html->link("Email Notification", "http://www.vaughanpl.info/Library_notification_requests"); ?> with VPL, you may use Forgot your PIN link on the <?php echo $this->Html->link("catalogue login form", "http://catalogue.vaughanpl.info/catalogue/auth/login"); ?> and get a new PIN online. </li>
			<li>You may also change your PIN online. <?php echo $this->Html->link("Login to your library record", "http://catalogue.vaughanpl.info/catalogue/auth/login"); ?>, click on My Account - Contact Information tab, then click on Change PIN link to change your PIN. </li>
			</ul>
			

		</div>

		<div class="entry">
			<a name="q2"></a>
			<h2>What are databases and how do I access them?</h2>
			<p>Vaughan Public Libraries subscribes to a number of online <?php echo $this->Html->link("databases", "/databases"); ?>.  These databases include reference materials and indexes and full text articles from a variety of magazines and journals covering a wide range of topics.</p>
			<p>You need your library card and PIN to access these databases.  If you have just registered at the library for a library card, you must wait 24 hours before your library card will allow you access to the databases.  </p>
			<p>For a listing of the databases, click <?php echo $this->Html->link("here", "/databases"); ?>. </p>

		</div>

		<div class="entry">
			<a name="q3"></a>
			<h2>How to let my home computer remember my library card number and PIN?</h2>
			<p>To let your home computer remember your library card number and PIN, you have to set the Internet settings in your web browser.</p>
			<p>If you use Internet Explorer,</p>
			<ol>
			<li>Start Internet Explorer
			<li>On the Tools menu, click Internet Options
			<li>Click the Content tab
			<li>Under Personal information, click AutoComplete
			<li>In the AutoComplete Settings dialog box, select the User names and passwords on forms check box (if it is not already selected), select the Prompt me to save passwords check box (if it is not already selected), and then click OK
			<li>Click OK again to close the Internet Options dialog box.
			</ol>
 			
			<p>If you use Mozilla Firefox,</p>
			<ol>
			<li>Start Mozilla Firefox
			<li>On the Tools menu, click Options
			<li>Click the Privacy
			<li>Click the Passwords tab, check Remember Passwords (if it is not already selected), and then click OK
			</ol>
			

		</div>

		<div class="entry">
			<a name="q4"></a>
			<h2>Can I suggest an item for the libraries' collection?</h2>
			<p>Use our <?php echo $this->Html->link("Suggest Material for Purchase form", "/email_librarian/add/purchase"); ?> if you would like to suggest the library purchase a specific title.  Your request will be forwarded to the appropriate selectors, and you will be contacted with their decision. </p>

		</div>


		<div class="entry">
			<a name="q5"></a>
			<h2>What happens if I lose an item I've borrowed from the library?</h2>
			<p>If you have lost an item you borrowed from one of the libraries, you should report it to your <?php echo $this->Html->link("local branch", "/libraries"); ?>.  You will have to pay for the item plus an administration fee.  You will be given a written receipt for the item.  If you find the item, you must return it with the receipt in order to get a refund.  You will not be refunded the administration fee of $5.00.</p>

		</div>

		<div class="entry">
			<a name="q6"></a>
			<h2>If my library items are due and I still need them or I can't get to the library, can I keep the items after their due date?</h2>
			<p>In order to ensure that you will not be charged <?php echo $this->Html->link("overdue fines", "/services/loan_charges"); ?>, you should always renew your items on or before their due date.  Renewing extends the loan period of the materials.  You cannot renew items if there are other people waiting for the items.  You may renew an item 3 times if there is no one waiting for the item.</p>
			<p>There are numerous ways to renew a library item (via phone, in person, online).  The information is found <?php echo $this->Html->link("here", "/services/renew"); ?> on our website.</p>

		</div>

		<div class="entry">
			<a name="q7"></a>
			<h2>How come I'm charged overdue fines?</h2>
			<p>If you do not return or renew your items on or before their due date, you will be charged an overdue fine.  Overdue fines vary depending upon the item you have overdue.  A list of the charges is found <?php echo $this->Html->link("here", "/services/loan_charges"); ?> on our website.</p>

		</div>

		<div class="entry">
			<a name="q8"></a>
			<h2>I don't like getting phones calls from the automated phone system when I have overdue items or items waiting for me, what can I do?</h2>
			<p>If you give us your email address, we will set it up so that you receive emails warning you that your items are soon due, informing you that your materials are overdue and letting you know when you have items available at the library for pick up.  We call this service <?php echo $this->Html->link("Email Notification", "/library_notification_requests"); ?>.</p>

		</div>

		<div class="entry">
			<a name="q9"></a>
			<h2>I want to borrow an item, but it isn't available at my local branch, what can I do?</h2>
			<p>If there is an item that you want but it is located at another branch of Vaughan Public Libraries or is currently out to another person, you may <?php echo $this->Html->link("place a hold", "/services/placing_holds"); ?> on it.  The item will be shipped to whichever location you select and when it is available you will receive an email or a phone call.</p>
			<p>You can place a hold in person at your local branch, via the <?php echo $this->Html->link("online catalogue", "http://catalogue.vaughanpl.info/catalogue/"); ?> or by phoning the library (905-653-READ) and asking for the reference desk.  You will need your library card to place a hold.</p>

		</div>

		<div class="entry">
			<a name="q10"></a>
			<h2>Is there a limit to the number of items I can borrow or request?</h2>
			<p>You can borrow up to 100 items at a time.  Once you reach the 100 item limit for materials checked out, you will not be able to borrow any further items until some that you have at home are returned.   This can be all DVDs or all books, or a combination of books, DVDs, CDs, and magazines.  You can also place holds on up to 100 items at a time.  This includes items that you are still waiting for, and items that are ready for you to pick up.  If you reach the 100 item hold limit, you just need to check out some of your items that are ready for pick-up, and you will be able to start requesting further titles.  </p>

		</div>

		<div class="entry">
			<a name="q11"></a>
			<h2>I want to place multiple holds / requests on items. Do I have to enter my library card number each time?</h2>
			<p>On the online catalogue, you can select items to a Cart.  On each page, you must check the item(s) and click on Save to Cart or the items won't be saved.  You can add as many items as desired.  The Cart is temporary and will disappear 10 minutes after you stop searching.   Once the Cart is created you can save it, export it to csv (which will show up as an Excel spreadsheet if you have Excel) or email it.  If you choose Save, you will be prompted to login to your library card and name the Cart. Once a Cart is named and saved, it will stay permanently.  You will be able to access it whenever you log into your account, by clicking on My Lists.  Once you have a List, you can select items in a List and click the Request button to place requests on all the selected items.</p>

		</div>


		<div class="entry">
			<a name="q12"></a>
			<h2>How do I get a library card?</h2>
			<p>You can <?php echo $this->Html->link("apply online", "https://www.vaughanpl.info/membership_applications"); ?> or come into <?php echo $this->Html->link("a branch of Vaughan Public Libraries", "/libraries"); ?>.  You will need to bring identification to verify your address.  You will find the information that is required <?php echo $this->Html->link("here", "/services/membership"); ?> on our website.  </p>

		</div>

		<div class="entry">
			<a name="q13"></a>
			<h2>What is RSS?</h2>
			<p>RSS (&#8221;Really Simple Syndication&#8221;) is a format that allows you to receive updated content from sources of your choice. For example, if you subscribe to the <a href="/new_arrivals">New Arrivals</a> RSS feeds on this site, it will deliver the information about new arrivals in VPL's collection that is posted to the site without having to visit the page! In order to read the feeds you subscribed, you need an RSS reader.</p>

		</div>

		<div class="entry">
			<a name="q14"></a>
			<h2>What is an RSS reader?</h2>
			<p>An RSS reader (also called an aggregator) is a software application that allows you to read blogs and websites that publish RSS feeds. There are a number of standalone RSS readers available freely. Some modern web browsers have a built-in RSS reader, like <a href="http://www.microsoft.com/windows/RSS/default.mspx" rel="external">Internet Explorer 10</a> and <a href="http://support.mozilla.com/en-US/kb/Live+Bookmarks" rel="external">Mozilla Firefox</a>.</p>

		</div>

		<div class="entry">
			<a name="q15"></a>
			<h2>How to subscribe to an RSS feed?</h2>
			<p>To subscribe to any feed on this site, click on the <img class="alignnone" style="border: 0px;" title="RSS" src="http://www.vaughanpl.info/leisure/wp-content/themes/spring/img/feed.gif" alt="rss" width="12" height="12" /> button, then the feed will be added into your RSS reader.</p>

		</div>
	</div>
	<div class="closing"></div>
</div>