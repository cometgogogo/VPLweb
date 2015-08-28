<?php
include("crumbs.php");



$relatedContentElements = array	();
$relatedContentElements[] = array ('related_pages', array("pages"=>array(array("Title"=>"Additional OverDrive Help","url"=>"http://help.overdrive.com/?Sup=http://ebooks.vaughanpl.info/Support.htm&Kin=no"),array("Title"=>"Email Librarian","url"=>"/email_librarian"), array("Title"=>"Zinio User Guide","url"=>"https://www.rbdigital.com/media/Zinio%20for%20Libraries%20Account%20Set%20Up%20and%20Checkout%20Guide.pdf", "rel"=>"external"), array("Title"=>"Hoopla Help","url"=>"https://www.hoopladigital.com/support", "rel"=>"external"))));

$relatedContentElements[]= array ('image', array("image"=>array("source"=>"/img/sols_banner_bg.jpg","width"=>"200", "height"=>"240", "alt"=>"SOLS acknowledgement statement")));
$this->controller->set('relatedContentElements', $relatedContentElements);
?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Downloads & Digital</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"><h2 style="display: none;">VPl</h2></div>
	<div class="details digital_tab">
		
		<div id="tabs" class="ui-tabs-nav">

			<ul>
				<li><a href="#ebook">eBooks & eAudiobooks</a></li>
				<li><a href="#film">Films & Television</a></li>
				<li><a href="#mag">Magazines & Newspapers</a></li>
				<li><a href="#music">Music</a></li>
				<li><a href="#newsletter">Newsletters</a></li>
				<li><a href="#app">Apps</a></li>
				<li><a href="#device">Devices</a></li>

			</ul>


			<div id="ebook" class="tab">
				
				<div class="entry">
				
					<a href="https://ebook.3m.com/library/vaughanpl/" target="_blank"><img src="/img/databases/3m.png" alt="3M Cloud logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="https://ebook.3m.com/library/vaughanpl/" target="_blank">3M Cloud Library eBooks</a></h3>	
						
						<p>Browse, check out and download popular titles from VPL's new eBook collection.</p>
					</div>
				</div>	
				<hr/>
				<div class="entry">
					<a href="http://eproducts.vaughanpl.info:81/login/audiocloud" target="_blank"><img src="/kidzone/resources/AudioBookCloud_Logo.jpg" alt="AudioBookCloud eAudiobooks logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="http://eproducts.vaughanpl.info:81/login?url=http://www.tumbletalkingbooks.com/auto_login.asp?u=vpl&p=login" target="_blank">AudioBookCloud eAudiobooks</a></h3>	

						<p>An online audiobook library collection of streaming audiobooks for children and adults. Listen online.</p>
					</div>
									
				</div>
				<hr/>
				<div class="entry">
					<a href="http://eproducts.vaughanpl.info:81/login?url=http://search.ebscohost.com/login.aspx?user=vaughan&password=library&profile=apc" target="_blank"><img src="/img/databases/EBSCOAudiobooks.gif" alt="Audiobook Premier Collection logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="http://eproducts.vaughanpl.info:81/login?url=http://search.ebscohost.com/login.aspx?user=vaughan&password=library&profile=apc" target="_blank">Audiobook Premier Collection</a></h3>	

						<p>More than 4,500 audiobooks covering every conceivable subject can be found in this collection! No borrowing limits, no waiting lists - just searching, borrowing, downloading, and listening!</p>
					</div>

				</div>
				<hr/>
				<div class="entry">
					<a href="http://eproducts.vaughanpl.info:81/login?url=http://search.ebscohost.com/login.aspx?user=vaughan&password=library&profile=ayc" target="_blank"><img src="/img/databases/EBSCOAudiobooks.gif" alt="Audiobook Premier Collection logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="http://eproducts.vaughanpl.info:81/login?url=http://search.ebscohost.com/login.aspx?user=vaughan&password=library&profile=ayc" target="_blank">Audiobook Youth Collection</a></h3>	

						<p>Choose from over 450 audiobooks selected specifically for children and young adults.</p>
					</div>

				</div>
				<hr/>
				<div class="entry">
				<a href="http://eproducts.vaughanpl.info:81/login?url=http://search.ebscohost.com/login.aspx?user=vaughan&password=library&profile=ecc" target="_blank"><img src="/img/databases/EBSCOeBooks.gif" alt="Audiobook Premier Collection logo" class="img_left" /></a>
				<div class="digital_info">
					<h3><a href="http://eproducts.vaughanpl.info:81/login?url=http://search.ebscohost.com/login.aspx?user=vaughan&password=library&profile=ecc" target="_blank">EBOOK Canadian Collection</a></h3>	

					<p>Nearly 10,000 ebooks from Canadian authors and publishers - fiction and non-fiction - all pertaining to Canada, Canadian history, native culture, politics, and current events.</p>
				</div>

			</div>
				<hr/>
				<div class="entry">
					<a href="http://eproducts.vaughanpl.info:81/login?url=http://search.ebscohost.com/login.aspx?user=vaughan&password=library&profile=eplc" target="_blank"><img src="/img/databases/EBSCOeBooks.gif" alt="Audiobook Premier Collection logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="http://eproducts.vaughanpl.info:81/login?url=http://search.ebscohost.com/login.aspx?user=vaughan&password=library&profile=eplc" target="_blank">EBOOK Public Library Collection</a></h3>	

						<p>More than 30,000 ebooks for adults and kids, covering every possible subject you could imagine!</p>
					</div>

				</div>
				<hr/>
				<div class="entry">
					<a href="https://www.hoopladigital.com/" target="_blank"><img src="/img/databases/hoopla.png" alt="Hoopla logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="https://www.hoopladigital.com/" target="_blank">Hoopla eAudiobooks</a></h3>	

						<p>Borrow free audiobooks with your library card.</p>
					</div>
													
				</div>
				<hr/>
				<div class="entry">

					<a href="http://eproducts.vaughanpl.info:81/login/one_click" target="_blank"><img src="/img/databases/1click.png" alt="oneclick logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="http://eproducts.vaughanpl.info:81/login/one_click" target="_blank">OneClickdigital eBooks & eAudiobooks</a></h3>	

						<p>An all-new, easy-to-use website and platform for you to download audiobooks.</p>
					</div>
				</div>	
				<hr/>
				<div class="entry">
					<a href="http://ebooks.vaughanpl.info/" target="_blank"><img src="/img/databases/overdrive.png" alt="overdrive logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="http://ebooks.vaughanpl.info/" target="_blank">OverDrive eBooks & eAudiobooks</a></h3>	

						<p>Check out and download eBooks and eAudiobooks using your library card.</p>
					</div>

				</div>
				<hr/>
				<div class="entry">
					<a href="http://eproducts.vaughanpl.info:81/login/tumblelibrary" target="_blank"><img src="/img/databases/tumble.png" alt="TumbleBook Library logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="http://eproducts.vaughanpl.info:81/login/tumblelibrary" target="_blank">TumbleBook Library eBooks</a></h3>	

						<p>TumbleBook Library offers online eBooks for kids!  Not only are the books animated, but they are narrated too!  Play games and puzzles!  TumbleBook Library also offers some books in French and Spanish. </p>
					</div>
																	
				</div>
				<hr/>
				<div class="entry">
					<a href="http://eproducts.vaughanpl.info:81/login/tumblecloud" target="_blank"><img src="/img/databases/tumbleCloud.png" alt="tumblebook Cloud logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="http://eproducts.vaughanpl.info:81/login/tumblecloud" target="_blank">TumbleBookCloud eBooks</a></h3>	

						<p>TumbleBookCloud offers titles for middle school AND high school! This collection contains YA/Teen novels, classics, poetry, short stories, YA/Teen audiobooks, popular graphic novels, and world class educational videos from National Geographic. </p>
					</div>

				</div>
				<hr/>
				<div class="entry">
					<a href="http://eproducts.vaughanpl.info:81/login/tumblecloud_j" target="_blank"><img src="/img/databases/tumbleJunior.png" alt="TumbleBookJunior logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="http://eproducts.vaughanpl.info:81/login/tumblecloud_j" target="_blank">TumbleBookCloud Junior eBooks</a></h3>	

						<p>With reading levels from grades 3-8, TumbleBookCloud Junior is a great option for adventurous young readers who wish to go beyond the picture book collection in TumbleBookLibrary!</p>
					</div>
																	
				</div>				
			</div>
			<div id="film" class="tab">
			

				<div class="entry">
					<a href="https://www.hoopladigital.com/" target="_blank"><img src="/img/databases/hoopla.png" alt="Hoopla logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="https://www.hoopladigital.com/" target="_blank">Hoopla Films & Television</a></h3>	

						<p>Borrow free digital video with your library card. Gain access to Hoopla titles - available for instant streaming or temporarily download - and watch on your smartphone, tablet or computer. </p>
					</div>
			
				</div>
				<hr/>
				<div class="entry">
					<a href="http://eproducts.vaughanpl.info:81/login/indieflix" target="_blank"><img src="/img/databases/indieflix.png" alt="TumbleBookJunior logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="http://eproducts.vaughanpl.info:81/login/indieflix" target="_blank">IndieFlix Films</a></h3>	

						<p>This streaming movie service provides unlimited access to award-winning shorts, feature films, and documentaries. </p>
					</div>
																	
				</div>			
					
			</div>
			<div id="mag" class="tab">
				<div class="entry">
					<a href="http://eproducts.vaughanpl.info:81/login?url=http://library.pressdisplay.com/pressdisplay/viewer.aspx" target="_blank"><img src="/img/databases/pressDisplay.png" alt="PressDisplaylogo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="http://eproducts.vaughanpl.info:81/login?url=http://library.pressdisplay.com/pressdisplay/viewer.aspx" target="_blank">PressDisplay</a></h3>	

						<p>Instant access to 1700 newspapers from 92 countries in 48 languages! The newspapers appear in their original format and original languages.</p>
					</div>
			
				</div>
				<hr/>
				<div class="entry">
					<a href="http://eproducts.vaughanpl.info:81/login/zinio" target="_blank"><img src="/img/databases/zinio.png" alt="zinio logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="http://eproducts.vaughanpl.info:81/login/zinio" target="_blank">Zinio</a></h3>	

						<p>Zinio offers full color, interactive digital magazines for your enjoyment. Browse from VPL's collection of popular titles with no holds, no checkout periods, and no limit to the number of magazines you can download. </p>
					</div>
																	
				</div>	
			</div>
			<div id="music" class="tab">
				<div class="entry">
					<a href="https://www.hoopladigital.com/" target="_blank"><img src="/img/databases/hoopla.png" alt="Hoopla logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="https://www.hoopladigital.com/" target="_blank">Hoopla Music</a></h3>	

						<p>Borrow free music with your library card. </p>
					</div>
			
				</div>
				<hr/>
				<div class="entry">
					<a href="http://eproducts.vaughanpl.info:81/login?url=http://Vaughan.NaxosMusicLibrary.com" target="_blank"><img src="/img/databases/naxos.png" alt="zinio logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="http://eproducts.vaughanpl.info:81/login?url=http://Vaughan.NaxosMusicLibrary.com" target="_blank">Naxos Music Library</a></h3>	

						<p>An online music library containing over 1.6 million streaming audio tracks of classical music, jazz, world, and folk music - more than 100,000 albums' worth!  Stream on your computer or on your mobile device with the Naxos Music Library (NML) app.</p>
					</div>
																	
				</div>
			</div>
				
			<div id="newsletter" class="tab">
				<div class="entry">
					<a href="http://www.vaughanpl.info/newsletters/subscribe" target="_blank"><img src="/img/databases/buzz.png" alt="Buzz logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="http://www.vaughanpl.info/newsletters/subscribe" target="_blank">The Buzz</a></h3>	

						<p>Get information about VPL's programs, services, announcements, author visits, Staff Picks and more delivered to your inbox!</p>
					</div>
			
				</div>
				<hr/>
				<div class="entry">
					<a href="http://eproducts.vaughanpl.info:81/login/chapter" target="_blank"><img src="/img/databases/chapter.png" alt="chapter a day logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="http://eproducts.vaughanpl.info:81/login/chapter" target="_blank">Chapter-A-Day Online Book Clubs</a></h3>	

						<p>Join the Online Fiction, Non-Fiction, Romance, or Business Books Clubs and start reading books in your email. Each day we'll send you a 5-minute portion of a book. If you'd like to finish a book, stop by the library and pick up a copy. Every week a new book is featured. </p>
					</div>
																	
				</div>	
				<hr/>
				<div class="entry">
					<a href="http://www.vaughanpl.info/materials/next_reads" target="_blank"><img src="/img/databases/nextRead.png" alt="NextReads logo" class="img_left" /></a>
					<div class="digital_info">
						<h3><a href="http://www.vaughanpl.info/materials/next_reads" target="_blank">NextReads Newsletter</a></h3>	

						<p>NextReads Newsletters deliver reading recommendations based on reader interests.</p>
					</div>
																					
				</div>
			</div>
			<div id="app" class="tab">
				<div class="entry">
				<div class="apps">
				
				<img src="/img/databases/vpl.png" alt="Vpl logo" />
					<div class="title">VPL's Mobile App</div>
					<div class="subtitle">Vaughan Public Libraries' mobile app is available to download from Apple App Store and Google Play.</div>
					<br/>
					<ul>
					<li><a class="link" href="https://itunes.apple.com/us/app/vaughan-public-libraries/id584423319" rel="external">iPhone/iPod Touch/iPad</a></li>
					<li><a class="link" href="https://play.google.com/store/apps/details?id=com.vtls.mozgo.vpl" rel="external">Android</a></li></ul>
				</div>

				<p>With VPL's mobile app, you will have the ability to:
				<ul>
					<li>Check Your Account
						<ul>
							<li>View account information, checked out items, holds and fees</li>
							<li>Renew checked out items</li>
							<li>Cancel pending holds</li>
						</ul>
					</li>

					<li>Search Library Catalogue
						<ul>
							<li>Search by keyword, title, author or ISBN</li>
							<li>Scan an ISBN barcode and find out if a title is availbale at VPL</li>
							<li>Place requests</li>
							<li>See what's available on our shelves</li>
						</ul>
					</li>

					<li>Search VPL's digital catalogue for eBooks, eAudiobooks and eVideo</li>

					<li>Branch Information & Directions</li>

					<li>View VPL's tweets</li>
				</ul>
				</p>

					

				</div>
				<hr/>
				<div class="entry">
					<div class="apps">
					<img src="/img/databases/3mapp.png" alt="3M Librarylogo" />
			<div class="title">3M Cloud Libary</div>
							<div class="subtitle">Discover and download popular titles from VPL's 3M Cloud Library. You can check out a book on an ipad, take notes while reading on a PC and finish the book on an Andriod smartphone.
							</div>
							<br/>
							<ul>
							<li><a class="link" href="https://itunes.apple.com/us/app/3m-cloud-library/id466446054?mt=8" rel="external">iPhone/iPod Touch/iPad</a></li>
			
							<li><a class="link" href="https://play.google.com/store/apps/details?id=com.txtr.android.mmm" rel= "external">Android</a></li>
			
							<li><a class="link" href="http://www.3m.com/us/library/eBook/pc.html" rel= "external">PC</a></li>
			
				</ul>
					</div>
				</div>
				<hr/>
				<div class="entry">
					<div class="apps">
					<img src="/img/databases/accessLib.png" alt="AccessMyLibrary logo" />
					<div class="title">AccessMyLibrary by Gale</div>
					<div class="subtitle">Locate VPL locations within 10 km and provide free access to Gale online resources.
					</div><br/>
					<ul>
				<li><a class="link" href="http://itunes.apple.com/us/app/accessmylibrary/id342518632?mt=8" rel="external">iPhone/iPod Touch/iPad</a></li>

				<li><a class="link" href="https://play.google.com/store/apps/details?id=com.cengage.mobile.amlpublic.android" rel= "external">Android</a></li>

				</ul>
					</div>
				</div>
				<hr/>
				<div class="entry">
					<div class="apps">
					<img src="/img/databases/hooplaApp.png" alt="Buzz logo" />
					<div class="title">Hoopla</div>
					<div class="subtitle">Borrow free digital video, music and audiobooks from Vaughan Public Libraries and play them on your smartphone or tablet.
					</div>
					<br/>
					<ul>
					<li><a class="link" href="https://itunes.apple.com/us/app/hoopla-digital/id580643740?mt=8" rel="external">iPhone/iPad</a></li>
	
					<li><a class="link" href="https://play.google.com/store/apps/details?id=com.hoopladigital.android" rel= "external">Android</a></li>
	
	
				</ul>
					</div>
				</div>
				
				<hr/>
				<div class="entry">
					<div class="apps">
					<img src="/img/databases/bluefire.png" alt="Bluefire logo" />
					<div class="title">Bluefire Reader</div>
					<div class="subtitle">Download and read EBSCO eBooks.
					</div>
					<br/>
					<ul>
					<li><a class="link" href="http://itunes.apple.com/us/app/bluefire-reader/id394275498?mt=8" rel="external">Apple devices</a></li>
	
					<li><a class="link" href="https://play.google.com/store/apps/details?id=com.bluefirereader&feature=nav_result#?t=W10" rel= "external">Android</a></li>
	
	
				</ul>
					</div>
				</div>
				
				<hr/>				
				<div class="entry">
					<div class="apps">
					<img src="/img/databases/naxosApp.png" alt="Naxos logo" />
					<div class="title">Naxos Music Library</div>
					<div class="subtitle">Listen to classical music and jazz. Access <a href="http://eproducts.vaughanpl.info:81/login?url=http://Vaughan.NaxosMusicLibrary.com" rel= "external">Naxos</a> via Vaughan Public Libraries and sign up for a playlist login to use the app.

					</div>
					<br/>
					<ul>
					<li><a class="link" href="http://itunes.apple.com/us/app/nml/id338059159?mt=8" rel="external">iPhone/iPod Touch/iPad</a></li>

					<li><a class="link" href="https://play.google.com/store/apps/details?id=com.naxos.nml" rel= "external">Android</a></li>

					</ul>					
					</div>
				</div>
				<hr/>
	
				<div class="entry">
					<div class="apps">
					<img src="/img/databases/1clickApp.png" alt="one click logo" />
					<div class="title">OneClickdigital</div>
					<div class="subtitle">An all-new, easy-to-use website and platform for you to download audiobooks.</div>
					<br/>
					<ul>
					<li><a class="link" href="https://itunes.apple.com/ca/app/oneclickdigital/id515311743?mt=8" rel="external">iPhone/iPod Touch/iPad</a></li>

					<li><a class="link" href="https://play.google.com/store/apps/details?id=com.ocd" rel= "external">Android</a></li>

					</ul>					
					</div>
				</div>
				<hr/>
							<div class="entry">
									<div class="apps">
									<img src="/img/databases/1clickReader.png" alt="Naxos logo" />
									<div class="title">OneClickdigital eReader</div>
									<div class="subtitle">Easy to use application to download and read eBooks.
				
									</div>
									<br/>
									<ul>
									<li><a class="link" href="https://itunes.apple.com/ca/app/oneclickdigital-ereader/id687903733?mt=8" rel="external">iPhone/iPod Touch/iPad</a></li>
				
									<li><a class="link" href="https://play.google.com/store/apps/details?id=com.recordedbooks.ereader" rel= "external">Android</a></li>
				
									</ul>					
									</div>
								</div>				
				<hr/>
				<div class="entry">
					<div class="apps">
					<img src="/img/databases/overdrive.png" alt="overdrive logo" />
					<div class="title">OverDrive Media Console</div>
					<div class="subtitle">OverDrive Media Console gives you on-the-go access to eBooks and audiobooks. Use the console to download eBooks and audiobooks from <a href="http://ebooks.vaughanpl.info/">VPL's OverDrive collection</a> directly to your mobile device!
					</div>
					<br/>
					<ul>
					<li><a class="link" href="http://itunes.apple.com/us/app/overdrive-media-console/id366869252?mt=8" rel="external">iPhone/iPod Touch/iPad</a></li>

					<li><a class="link" href="https://play.google.com/store/apps/details?id=com.overdrive.mobile.android.mediaconsole" rel= "external">Android</a></li>

					<li><a class="link" href="http://www.overdrive.com/software/omc/downloadinstructionsblackberrymobile.aspx" rel= "external">BlackBerry</a></li>

					<li><a class="link" href="http://www.windowsphone.com/en-US/apps/637433e5-1392-e011-9210-002264c2fb72" rel= "external">Windows Phone 7</a></li>

					</ul>

					</div>
				</div>				
				<hr/>
				<div class="entry">
					<div class="apps">
					<img src="/img/databases/pressReaderApp.png" alt="Naxos logo" />
					<div class="title">PressReader</div>
					<div class="subtitle">Over 2,300 full-content newspapers from 100+ countries in 56 languages in just one app! Newspapers are often available before they hit the newsstands in their respective countries and archived issues are kept for up to two weeks. <br/><strong>Requirements:</strong> Download 5 free newspapers daily over the library's WiFi, then read them offline, anywhere you like.
					</div>
					<br/>
					<ul>
					<li><a class="link" href="https://itunes.apple.com/app/pressreader/id313904711?amp%3Bmt=8&mt=8" rel="external">iOS Devices</a></li>

					<li><a class="link" href="https://play.google.com/store/apps/details?id=com.newspaperdirect.pressreader.android" rel= "external">Android</a></li>

					<li><a class="link" href="http://apps.microsoft.com/windows/en-us/app/pressreader/16e63b44-220e-4303-a748-30b75dd4c9b9" rel= "external">Windows</a></li>

					<li><a class="link" href="http://appworld.blackberry.com/webstore/content/52138/?lang=en&countrycode=CA" rel= "external">BlackBerry</a></li>

					</ul>
				</div>
				</div>	
				<hr/>
				
				<div class="entry">
					<div class="apps">
					<img src="/img/databases/signingsavvy.png" alt="signing savvy logo" />
					<div class="title">Signing Savvy</div>
					<div class="subtitle">A sign language dictionary containing several thousand high resolution videos of American Sign Language (ASL) signs, fingerspelled words, and other common signs used within the United States and Canada.
					</div>
					<br/>
					<ul>
					<li><a class="link" href="https://itunes.apple.com/ca/app/signing-savvy-member-app/id435948786?mt=8" rel="external">iPhone/iPad</a></li>

					<li><a class="link" href="https://play.google.com/store/apps/details?id=com.signingsavvy.mobile" rel= "external">Android</a></li>
					</ul>
				</div>
				</div>					
		<hr/>	
				<div class="entry">
					<div class="apps">
					<img src="/img/databases/transparentApp.png" alt="transparent logo" />
					<div class="title">Transparent Language</div>
					<div class="subtitle">A fun and addictive way to learn a language on-the-go. The Transparent Language mobile app locks words and phrases into your memory, allowing you to recall them perfectly and remember them forever. 
					</div>
					<br/>
					<ul>
					<li><a class="link" href="https://itunes.apple.com/us/app/transparent-language/id377455409?ls=1&mt=8" rel="external">iPhone/iPod touch/iPad</a></li>

					<li><a class="link" href="https://play.google.com/store/apps/details?id=com.transparent.android.byki.CLE" rel= "external">Android</a></li>
					</ul>
				</div>
				</div>					
		<hr/>	
		<div class="entry">
					<div class="apps">
					<img src="/img/databases/zinioApp.png" alt="zinio logo" />
					<div class="title">Zinio</div>
						<div class="subtitle">Download your free Zinio reader app to browse full color, interactive digital magazines on your mobile device.
						</div>
						<br/>
						<ul>
						<li><a class="link" href="https://itunes.apple.com/us/app/zinio-magazine-newsstand-reader/id364297166?mt=8" rel="external">iPhone/iPad</a></li>

						<li><a class="link" href="https://play.google.com/store/apps/details?id=com.zinio.mobile.android.reader" rel= "external">Android</a></li>

						<li><a class="link" href="http://apps.microsoft.com/windows/en-US/app/zinio/790e1b04-01f7-4c06-a0d6-07d8501b53b6" rel= "external">Windows</a></li>

						<li><a class="link" href="http://appworld.blackberry.com/webstore/content/97572/?lang=enA" rel= "external">BlackBerry</a></li>

						</ul>				
					</div>
				</div>					
				
			</div>
			<div id="device" class="tab">
			<!-- div class="entry">
					
				<h3>Kobo Mini</h3>	

				<p>Kobo Mini eReaders are available for VPL's younger customers. <a href="https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:662499">Kobo Minis: Teens</a> have been loaded with books for teens.  <a href="https://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:662498">Kobo Minis: Kids</a> have been loaded with books for children. Only library members under the age of 18 can check out a Kobo Mini, so try out the latest reading craze!
				</p>
			</div -->
			
			<div class="entry">
								
				<h3>iPad</h3>	

				<p>Borrow an iPad for a week, explore the library-recommended apps, test out your productivity, even play a few game! iPads are available for the customers to <a href="http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:707366">check out</a> at all VPL locations. 
				</p>
			</div>		

	</div></div>
	<div class="closing"></div>
</div>