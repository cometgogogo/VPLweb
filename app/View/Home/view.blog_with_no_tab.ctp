<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Welcome to Vaughan Public Libraries</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
	<div class="level_1">
				<div class="campaign">
					<div class="content">
				<div class="box_skitter box_skitter_large">

				<ul>
				<li><a href="http://www.vaughanpl.info/libraries/view/1"><img src="/img/slides/anReno.jpg" class="fade" alt="Service Update" /></a><div class="label_text"><p>Service Update</p></div></li>
				
				<li><a href="http://www.vaughanpl.info/programs/index/category/14" rel="external" target="_blank"><img src="/img/slides/marchBreak.jpg" class="fade" alt="March Break at VPL" /></a><div class="label_text"><p>March Break @ VPL</p></div></li>
				
				<li><a href="http://www.vaughanpl.info/programs/view/1942"><img src="/img/slides/rockGarden.jpg" class="fade" alt="Rockgarden Party" /></a><div class="label_text"><p>Rockgarden Party</p></div></li>

				<li><a href="http://www.vaughanpl.info/library_notification_requests"  rel="external" target="_blank"><img src="/img/slides/libNotification.jpg" class="fade" alt="Sign Up for Library Notification" /></a><div class="label_text"><p>Sign Up for Library Notification</p></div></li>
				
				<li><a href="http://www.vaughanpl.info/next_reads" rel="external" target="_blank"><img src="/img/slides/nextRead.jpg" class="fade" alt="Your Next 5 Reads" /></a><div class="label_text"><p>Your Next 5 Reads</p></div></li>

				<li><a href="http://www.pinterest.com/vaughanpl/"  rel="external" target="_blank"><img src="/img/slides/pinterest.jpg" class="fade" alt="VPL on pinterest" /></a><div class="label_text"><p>Follow VPL on pinterest</p></div></li>
				
				<!-- li><a href="http://www.vaughanpl.info/materials/mobile_apps"  rel="external" target="_blank"><img src="/img/slides/vplApp.jpg" class="fade" alt="Mobile App" /></a><div class="label_text"><p>Mobile App</p></div></li -->

				</ul>

				</div>

				</div>
					</div>

					</div> <!-- end level_1 -->


				<hr />
				<div id="campaignContainer">
<div id="widgetsContainer">


<a class="more" href="http://www.vaughanpl.info/new_arrivals">more titles</a>
	<h2>New Arrivals</h2>
	<div class="reading_widget">
		<IFRAME class="rw" src="http://readingwidgets.com/view/widget/535a270b838407b152231fa62ebfd9a1d124e073" border="none" frameBorder="no" scrolling="no" marginheight="0" marginwidth="0" TITLE="New Arrival"></IFRAME>
	</div>

<a class="more" style=" position: relative; z-index: 10;" href="http://www.vaughanpl.info/just_returned">more titles</a>
	<h2>Just Returned</h2>
	<div class="reading_widget">
		<IFRAME class="rw" src="http://readingwidgets.com/view/widget/cbf949cb537338d43bdc683f386acfe21493a96c" frameBorder="no" scrolling="no" marginheight="0" marginwidth="0" TITLE="Just Returned"></IFRAME>
	</div>

<!-- a class="more" href="http://www.vaughanpl.info/bestsellers">more ...</a>
	<h2>Bestseller Lists</h2>
	<div class="reading_widget">
		<IFRAME class="rw" src="http://readingwidgets.com/view/widget/bf6822c47af4662d7ec35aeae61f30e43fbfabaa" frameBorder="no" scrolling="no" marginheight="0" marginwidth="0" TITLE="best seller"></IFRAME>
	</div -->
</div>


<div id="feedsContainer">
<div id="blog_headline">

		<h3>Blog Posts</h3>

		<!-- script type="text/javascript" src="http://app.feed.informer.com/digest3/JGMTHDJKIN.js"></script>
		<noscript><a href="http://app.feed.informer.com/digest3/JGMTHDJKIN.html">Click for &quot;New Look&quot;.</a>
Powered by <a href="http://feed.informer.com/">RSS Feed Informer</a></noscript -->

<script type="text/javascript" src="http://feed.informer.com/widgets/UJOIYZJKBW.js"></script>
<noscript><p><a href="http://feed.informer.com/widgets/UJOIYZJKBW.html">Your new widget 1</a>
Powered by <a href="http://feed.informer.com/">RSS Feed Informer</a></p></noscript>


	</div>

<!-- div id="tweets">
		<div class="tweets_header"><h3>Latest Tweets</h3></div>
		<form name="voteform" method="post" action="/index.php">
		<?php echo $survey_name['Survey']['Name']; ?> <br/>
		<?php echo $html->radio('SurveyData/result', $options, null, array()); ?>
								&nbsp;&nbsp; &nbsp;&nbsp;
		<input type="submit" value="Vote" onClick="javascript: var option; for (var i=0; i<document.getElementsByName('data[SurveyData][result]').length; i++) {
		   if (document.getElementsByName('data[SurveyData][result]')[i].checked)
		      {
		      option = i;
		      }
		   }
		   var url = '../../thank_vote.php';
		   var newwindow=window.open(url, null, 'width=400, height=200, top=100, left=100, scrollbars=yes, resizable=yes'); newwindow.focus();"/ >

		</form>
		<div id="twitter"> </div>
		<div class="tweets_footer"><a href="https://twitter.com/vaughanpl" alt="Follow VPL on Twitter">Connect VPL on Twitter</a>
		</div>
		<a class="twitter-timeline" href="https://twitter.com/vaughanpl" data-widget-id="251340636572225537" data-chrome="noheader nofooter noborders" data-tweet-limit="1" width="290" height="100" >News on Twitter</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div -->



</div><!-- end feedcontainer -->
	</div><!-- end compaigncontainer -->



	<div class="section_end">&nbsp;</div>

</div> <!-- end detail -->
<div class="closing"></div>
</div> <!-- end pagecontent -->

<?php

	function getLibraryUrl($libraryId,$criteria) {
		return getEventUrl ($criteria, null, $libraryId, null, null, null);
	}

	function getAgeGroupUrl($ageGroupId,$criteria) {
		return getEventUrl ($criteria, null, null, $ageGroupId, null, null);
	}

	function getCategoryUrl($categoryId,$criteria) {
		return getEventUrl ($criteria, null, null, null, $categoryId, null);
	}

	function getAreaUrl($areaId,$criteria) {
		return getEventUrl ($criteria, null, null, null, null, $areaId);
	}

	function getDateUrl($date,$criteria) {
		return getEventUrl ($criteria, $date, null, null, null, null);
	}


	function getEventUrl ($criteria, $date=null, $libraryId=null, $ageGroupId=null, $categoryId=null, $areaId=null) {

		if (isset($libraryId)) $criteria["library"]["id"] = $libraryId;
		if (isset($ageGroupId)) $criteria["ageGroup"]["id"] = $ageGroupId;
		if (isset($categoryId)) $criteria["category"]["id"] = $categoryId;
		if (isset($areaId)) $criteria["area"]["id"] = $areaId;
		if (isset($date)) $criteria["date"] = $date;

		$url = "/programs/index";

		if (isset($criteria["library"]["id"])) $url .= "/library/" . $criteria["library"]["id"];
		if (isset($criteria["ageGroup"]["id"])) $url .= "/age_group/" . $criteria["ageGroup"]["id"];
		if (isset($criteria["category"]["id"])) $url .= "/category/" . $criteria["category"]["id"];
		if (isset($criteria["area"]["id"])) $url .= "/collection/" . $criteria["area"]["id"];
		if (isset($criteria["date"])) $url .= "/" . $criteria["date"];

		return $url;
	}


?>


