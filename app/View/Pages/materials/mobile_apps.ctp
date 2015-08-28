<?php
include("crumbs.ctp");
$this->Html->addCrumb("eBooks & Downloads" , "/materials/ebooks_downloads");

$relatedContentElements = array	();
$relatedContentElements[] = array ('related_pages', array("pages"=>array(array("Title"=>"Additional OverDrive Help","url"=>"http://help.overdrive.com/?Sup=http://ebooks.vaughanpl.info/Support.htm&Kin=no"),array("Title"=>"Email Librarian","url"=>"/email_librarian"))));
$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Mobile Apps</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
<div class="entry">Many library resources are accessible via mobile apps, just follow the links below to try them out on your mobile devices.  </div>
		<div class="entry">

			<div class="apps">
				<div class="title">VPL's Mobile App</div>
				<div class="subtitle">Vaughan Public Libraries' mobile app is available to download on Apple App Store and Google Play.</div>
				<br/>
				<ul>
				<li><a class="link" href="https://itunes.apple.com/us/app/vaughan-public-libraries/id584423319" rel="external">iPhone/iPod Touch/iPad</a></li>
				<li><a class="link" href="https://play.google.com/store/apps/details?id=com.vtls.mozgo.vpl" rel="external">Android</a></li></ul>
			</div>

			<p>With VPL's mobile app, you will have the ability to:
			<ul><li>Check Your Account<ul><li>View account information, checked out items, holds and fees</li><li>Renew checked out items</li><li>Cancel pending holds</li></ul></li>

			<li>Search Library Catalogue
			<ul><li>Search by keyword, title, author or ISBN</li><li>Scan an ISBN barcode and find out if a title is availbale at VPL</li><li>Place requests</li><li>See what's available on our shelves</li></ul></li>

			<li>Search VPL's digital catalogue for eBooks, eAudiobooks and eVideo</li>

			<li>Branch Information & Directions<ul><li>View list of VPL branch information such as address & hours</li><li>View maps of all VPL branches and quickly navigate to branches</li></ul></li>

			<li>View VPL's tweets</li></ul></p>



			<div class="apps">
				<div class="title">VPL's Mobile Website</div>
				<div class="subtitle">Find a VPL branch near you, check VPL locations and hours, search a mobile friendly library catalogue, check your library record and renew items, search and download eBooks, and more at <a href="http://m.vaughanpl.info">m.vaughanpl.info</a>.</div>


			</div>

			<div class="apps">

				<div class="title">OverDrive Media Console</div>
				<div class="subtitle">OverDrive Media Console gives you on-the-go access to eBooks and audiobooks. Use the console to download eBooks and audiobooks from <a href="http://ebooks.vaughanpl.info/746E539A-28D2-4108-B43B-4D78DAAA50F7/10/394/en/Default.htm">VPL Digital Catalogue</a> directly to your mobile device!
				</div>
				<br/>
				<ul>
				<li><a class="link" href="http://itunes.apple.com/us/app/overdrive-media-console/id366869252?mt=8" rel="external">iPhone/iPod Touch/iPad</a></li>

				<li><a class="link" href="https://market.android.com/search?q=overdrive+media+console&c=apps" rel= "external">Android</a></li>

				<li><a class="link" href="http://www.overdrive.com/software/omc/downloadinstructionsblackberrymobile.aspx" rel= "external">BlackBerry</a></li>

				<li><a class="link" href="http://www.windowsphone.com/en-US/apps/637433e5-1392-e011-9210-002264c2fb72" rel= "external">Windows Phone 7</a></li>

				</ul>
			</div>
			<div class="apps">

				<div class="title">3M Cloud Libary</div>
				<div class="subtitle">Discover and download popular titles. You can check out a book on an ipad, take notes while reading on a PC and finish the book on an Andriod smartphone.
				</div>
				<br/>
				<ul>
				<li><a class="link" href="https://itunes.apple.com/us/app/3m-cloud-library/id466446054?mt=8" rel="external">iPhone/iPod Touch/iPad</a></li>

				<li><a class="link" href="https://play.google.com/store/apps/details?id=com.txtr.android.mmm" rel= "external">Android</a></li>

				<li><a class="link" href="http://www.3m.com/us/library/eBook/pc.html" rel= "external">PC</a></li>

				</ul>
			</div>

			<div class="apps">

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

			<div class="apps">

				<div class="title">Hoopla</div>
				<div class="subtitle">Borrow free digital video, music and audiobooks from Vaughan Public Libraries and play them on your smartphone or tablet.
				</div>
				<br/>
				<ul>
				<li><a class="link" href="https://itunes.apple.com/us/app/hoopla-digital/id580643740?mt=8" rel="external">iPhone/iPad</a></li>

				<li><a class="link" href="https://play.google.com/store/apps/details?id=com.hoopladigital.android" rel= "external">Android</a></li>


				</ul>
			</div>

			<div class="apps">

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

			<div class="apps">

				<div class="title">Naxos Music Library</div>
				<div class="subtitle">Listen to classical music and jazz. Access <a href="http://eproducts.vaughanpl.info:81/login?url=http://Vaughan.NaxosMusicLibrary.com" rel= "external">Naxos</a> via Vaughan Public Libraries and sign up for a playlist login to use the app.

				</div>
				<br/>
				<ul>
				<li><a class="link" href="http://itunes.apple.com/us/app/nml/id338059159?mt=8" rel="external">iPhone/iPod Touch/iPad</a></li>

				<li><a class="link" href="https://market.android.com/search?q=naxos+music+library&c=apps" rel= "external">Android</a></li>

				</ul>
			</div>

			<div class="apps">


				<div class="title">AccessMyLibrary by Gale</div>
				<div class="subtitle">Locate VPL locations within 10 km and provide free access to Gale online resources.

				</div><br/>
				<ul>
				<li><a class="link" href="http://itunes.apple.com/us/app/accessmylibrary/id342518632?mt=8" rel="external">iPhone/iPod Touch/iPad</a></li>

				<li><a class="link" href="https://market.android.com/search?q=accessmylibrary+public&c=apps" rel= "external">Android</a></li>

				</ul>
			</div>

			

			<div class="apps">
				<div class="title">Databases in Mobile Version</div>
				<div class="subtitle">A few databases that VPL subscribes to have a mobile interface:
				</div><br/>
				<ul>
				<li><a href="http://eproducts.vaughanpl.info:81/login?url=http://eproducts.vaughanpl.info:81/login/ebsco">Consumer Health Complete</a></li>
				<li><a href="http://www.tumblebooks.com/library/auto_login.asp?u=vpl&p=libra">Tumble Book Library for iPad</a></li>
				<li><a href="http://eproducts.vaughanpl.info:81/login?url=http://www.worldbookonline.com?subacct=CD31147">World Book Mobile</a></li>
				</ul>

			</div>

		</div>

	<div class="closing"></div>

</div>
</div>
