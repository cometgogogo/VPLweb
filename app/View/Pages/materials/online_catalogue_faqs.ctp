<?php include("crumbs_catalogues.ct"); ?>	


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>On-line Catalogue FAQs</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		
		
		<div class="intro">
			Below are answers to frequently asked questions that VPL has received from library users about our On-line Catalogue:
		</div>
		
		<div class="entry">
			<p>
				<?php echo $this->Html->link("Q: What is a Four Digit PIN?", "#whatisapin"); ?><br>
				<?php echo $this->Html->link("Q: How do I view my record?", "#viewrecord"); ?><br>
				<?php echo $this->Html->link("Q: How do I find out if an item is available in the library?", "#available"); ?><br>
				<?php echo $this->Html->link("Q: What does it mean when an item's status is 'Received - in'?", "#receivedin"); ?><br>
				<?php echo $this->Html->link("Q: How do I renew an item?", "#renewitem"); ?><br>
				<?php echo $this->Html->link("Q: How do I place a hold / request on an item?", "#placehold"); ?><br>
				<?php echo $this->Html->link("Q: How do I cancel a hold / request on an item?", "#cancelhold"); ?><br>
				<?php echo $this->Html->link("Q: When I press the request button nothing seems to happen. What should I do?", "#ctrlhold"); ?><br>
				<?php echo $this->Html->link("Q: How do I search for a listing of all VPL's DVDs and videos?", "#searchalldvd"); ?><br>
				<?php echo $this->Html->link("Q: How do I search for a specific DVD or video?", "#searchonedvd"); ?><br>
				<?php echo $this->Html->link("Q: How do I search for CDs and cassettes?", "#searchcd"); ?><br>
				<?php echo $this->Html->link("Q: How do I search for audiobooks / talking books?", "#searchtalking"); ?><br>
				<?php echo $this->Html->link("Q: How do I search for a series?", "#searchseries"); ?><br>
				<?php echo $this->Html->link("Q: How do I search for large print books?", "#alllargeprint"); ?><br>
				<?php echo $this->Html->link("Q: How do I search for a specific large print book?", "#largeprint"); ?><br>
				<?php echo $this->Html->link("Q: What is the function of the 'Cart'?", "#cart"); ?>
			</p>
		</div>



		<div class="entry">
			<a id="whatisapin" name="whatisapin"></a>
			<h2>What is a Four Digit PIN?</h2>
			<p>Your four-digit Personal Identification Number serves as part of a security check when 
			you try to access your library record online;</p>
			<p>It enables you to review your record, place holds, and renew items online.</p>
			<p>You selected your own PIN. In order to obtain it, you must visit one of our local branches 
			in person and show valid identification; and</p>
			
		</div>

		<div class="entry">
			<a id="viewrecord" name="viewrecord"></a>
			<h2>How do I view my record?</h2>
			<p>Please follow these steps:</p>
			<ol>
				<li>Enter your Card number and 4-digit PIN at the top right corner of this page and click on the white triangle to submit.</li>
				<li>Your account information will appear next.</li>
			</ol>
		</div>

		<div class="entry">
			<a id="available" name="available"></a>
			<h2>How do I find out if an item is available in the library?</h2>
			<p>When you have a list of titles, click on "View items" and you will be able to check on the availability of the item you want.</p>
		</div>


		<div class="entry">
			<a id="receivedin" name="receivedin"></a>
			<h2>What does it mean when an item's status is "Received - in"?</h2>
			<p>
			"Received - in" means the item is new, and it is currently unavailable as it is being processed. 
			When the item is available for check out, the status will change to "available".
			</p>
		</div>

		<div class="entry">
			<a id="renewitem" name="renewitem"></a>
			<h2>How do I renew an item?</h2>
			<p>Renewal Rules:</p>
			<ol>
				<li>Items can be renewed to a maximum of three times;</li>
				<li>Items that other people have requested are unable to be renewed; and</li>
				<li>Fast Track videos, dvds or books, are available for a maximum loan period of seven days.</li>
			</ol>
			<p>You may renew your books online, by visiting the library in person, or by phoning our automated telephone renewal system at (905) 709-0672.</p>
			<ol>
				<li>Select the "Search the Catalogue" button on the right menu column;</li>
				<li>In the right hand section of the Catalogue (iPortal) is the "Login" box;</li>
				<li>Enter your library card number and your Four Digit PIN. Your information will appear;</li>
				<li>Your items out will be listed under the title "Checked Out Items";</li>
				<li>
					Select the items you would like to renew (place a check in the box). 
					Note: If there isn't a box beside your checked out item, that means that item is unavailable for renewal; and
				</li>
				<li>Click the "Renew" button.</li>
			</ol>
		</div>
		
		<div class="entry">
			<a id="placehold" name="placehold"></a>
			<h2>How do I place a hold / request on an item?</h2>
			<p>
				Temporarily, you cannot place a hold/request on a record if it contains
				only one item that is located at <?php echo $this->Html->link("Pierre Berton Resource Library","/libraries/view/7"); ?>. As
				well, you cannot place a hold/request on a record with no items listed.
				This is because the item is on order, and not available yet.
			</p>
			<ol class="heading">
				<li>Select the "Search the Catalogue" button on the right menu column;</li>
				<li>Proceed to search the catalogue for the title you wish to hold;</li>
				<li>
					Look at the list carefully to make sure you select exactly what you
					want. For example, check the title, the edition, and the format (do you
					really want the sound recording, or do you want the book?);
				</li>
				<li>Click on the "Request" button to place a hold on the item. Enter your library card number in the box;</li>
				<li>Select the branch at which you want to pick up the item;</li>
				<li>Click "Submit";</li>
				<li>You will see a summary of the item you placed a hold on; and</li>
				<li>Click on "Ok".
				</li>				
			</ol>
			<p>You will be notified when the item is available for pick up.</p>
		</div>

		<div class="entry">
			<a id="cancelhold" name="cancelhold"></a>
			<h2>How do I cancel a hold / request on an item?</h2>
			<ol class="heading">
				<li>Select the "Search the Catalogue" button on the right menu column;</li>
				<li>In the right hand section of the Catalogue (iPortal) is the "Login" box;</li>
				<li>Enter your library card number and your <?php echo $this->Html->link("Four-Digit PIN", "#whatisapin"); ?>;</li>
				<li>On the account information page, scroll down until you reach "Requested Items";</li>
				<li>Beside the item, you wish to cancel will be a "Cancel" link; and</li>
				<li>Click on "Cancel" to cancel that hold/request.</li>
			</ol>
		</div>

		<div class="entry">
			<a id="ctrlhold" name="ctrlhold"></a>
			<h2>When I press the request button nothing seems to happen. What should I do?</h2>
			<ol>
				<li>Select the "Search the Catalogue" button on the right menu column;</li>
				<li>Proceed to search the catalogue for the title you wish to hold;</li>
				<li>You may have anti pop-up software installed that is blocking the "Request" window.</li>
				<li>To let the pop-up through, hold the "Ctrl" Key down at the same time as clicking on the "Request" button.</li>
				<li>
					This should allow the "Request" pop-up through, and you may
					continue requesting your item by entering your library card number, and
					branch pickup location.
				</li>
			</ol>
		</div>

		<div class="entry">
			<a id="searchalldvd" name="searchalldvd"></a>
			<h2>How do I search for a listing of all VPL's DVDs and videos?</h2>
			<ol>
				<li>Select the "Search the Catalogue" button on the right menu column;</li>
				<li>Select the "Browse" search tab, and type "Feature Films"; and </li>
				<li>A listing of all VPL's DVD/Video holdings will come up.</li>
			</ol>
		</div>

		<div class="entry">
			<a id="searchonedvd" name="searchonedvd"></a>
			<h2>How do I search for a specific DVD or video?</h2>
			<ol>
				<li>Select the "Search the Catalogue" button on the right menu column;</li>
				<li>When you are in the iPortal, click on the "Search Filters" tab;</li>
				<li>In the "Format Filters" box, scroll down until you can select "Films and Videos";</li>
				<li>Click "Save";</li>
				<li>Click on the "Keyword" search tab, type in the title of the DVD or video you wish to find;</li>
				<li>Select "Title" in the drop down box, and press submit; and</li>
				<li>A listing of dvds and videos with that title will appear.</li>
			</ol>
		</div>

		<div class="entry">
			<a id="searchcd" name="searchcd"></a>
			<h2>How do I search for CDs and cassettes?</h2>
			<ol>
				<li>Select the "Search the Catalogue" button on the right menu column;</li>
				<li>Click on the "Search Filters" tab;</li>
				<li>In the "Format Filters" box, scroll down until you can select "CDs and Cassettes";</li>
				<li>Click "Save"; and</li>
				<li>You can now do a Keyword search and look for a specific CD/Cassette subject or title.</li>
			</ol>
		</div>

		<div class="entry">
			<a id="searchtalking" name="searchtalking"></a>
			<h2>How do I search for audiobooks / talking books?</h2>
			<ol>
				<li>Select the "Search the Catalogue" button on the right menu column;</li>
				<li>Click on the "Search Filters" tab;</li>
				<li>In the "Format Filters" box, scroll down until you can select "CDs and Cassettes";</li>
				<li>Click "Save";</li>
				<li>In the "Browse Search" field, type "Audiobooks", and a listing of VPL's talking book holdings will come up; and</li>
				<li>You can also do a Keyword search and look for a specific talking book subject or title.</li>
			</ol>
		</div>

		<div class="entry">
			<a id="searchseries" name="searchseries"></a>
			<h2>How do I search for a series?</h2>
			<ol>
				<li>Select the "Search the Catalogue" button on the right menu column;</li>
				<li>Click on "Keyword" search;</li>
				<li>Type in the title of the series that you are looking for; for example, "Secrets of Droon" or "Redwall" or "Sandman";</li>
				<li>Select "Entire Record" in the drop down menu; and</li>
				<li>Press "Search" and browse through your results.</li>
			</ol>
		</div>
		<div class="entry">
			<a id="alllargeprint" name="alllargeprint"></a>
			<h2>How do I search for a listing of all VPL's large print books?</h2>
			<ol>
				<li>Select the "Search the Catalogue" button on the right menu column;</li>
				<li>Click on "Browse" search;</li>
				<li>Type in "large type books";</li>
				<li>Select "Subject" in the drop down menu; and</li>
				<li>Press "Search" and browse through your results.</li>
			</ol>
		</div>
		<div class="entry">
			<a id="largeprint" name="largeprint"></a>
			<h2>How do I search for a specific large print book?</h2>
			<ol>
				<li>Select the "Search the Catalogue" button on the right menu column;</li>
				<li>Click on "Keyword" search;</li>
				<li>Type in "large type books";</li>
				<li>Select "Subject" in the drop down menu; and</li>
				<li>On the next line, type the author or title of the book;</li>
				<li>Select "Author" or "Title" in the drop down menu; and</li>
				<li>Press "Search" and browse through your results.</li>
			</ol>
		</div>
		<div class="entry">
			<a id="cart" name="cart"></a>
			<h2>What is the function of the "Cart"?</h2>
			<p>
				You can save records in the Cart during a Browse, Keyword, or
				Heading search. The Cart allows you to view, to print, and to e-mail
				these records. You cannot place holds/requests from the Cart.
			</p>
		</div>

</ol>
</p>
		
		
		
		
		
		
		
		
		
		
		
		
		
	</div>
	<div class="closing"></div>
</div>