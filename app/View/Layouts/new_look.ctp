<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php echo $javascript->link('jquery-1.3.2'); ?>
<?php echo $javascript->link('fullcalendar.min'); ?>


<?php echo $javascript->link('ui.core'); ?>
<?php echo $javascript->link('ui.draggable'); ?>
<?php echo $javascript->link('ui.resizable'); ?>

<?php echo $html->css('fullcalendar'); ?>


<?php

$mobile_browser = 0;

if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i',
    strtolower($_SERVER['HTTP_USER_AGENT']))){
    $mobile_browser++;
}

if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) or
    ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))){
    $mobile_browser++;
}

$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno','ipad',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda','xda-');

if (in_array($mobile_ua,$mobile_agents)){
    $mobile_browser++;
}
if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini')>0) {
    $mobile_browser++;
}
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows')>0) {
    $mobile_browser=0;
}


?>



<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>

	<title>Vaughan Public Libraries-New Look</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>


	<meta name="keywords" content="vaughan, public, library, ontario, canada" />
<meta name="description" content="Enrich Inspire Transform - Vaughan Public Libraries offer welcoming destinations that educate, excite and empower our community. ">

	<link rel="shortcut icon" href="http://www.vaughanpl.info/favicon.ico" type="image/x-icon" />

	<?php if (isset($CSS)) echo $html->css($CSS); else echo $html->css("newlook"); ?>

	<!--[if IE]>
	<style type="text/css">
		/* HTML elements */
		html {
		  filter: expression(document.execCommand("BackgroundImageCache", false, true));
		}

		/* Hides from IE5-mac \*/
		* html .details {height: 1%;}
		/* End hide from IE5-mac */


		/* Hides from IE5-mac \*/
		* html .entry {height: 1%;}
		/* End hide from IE5-mac */
	</style>
	<![endif]-->

	<link rel="stylesheet" href="/css/jquery.twitter.css"><link rel="stylesheet" href="/css/jquery.tweet.css">

	<script type="text/javascript" src="/js/slideMenus.js"></script>
	<script type="text/javascript" src="/js/externallinks.js"></script>


	<script type="text/javascript">
		function do_on_load() {try {onLoad();} catch (ex) {}	}
	</script>



	<script  type="text/javascript" >AC_FL_RunContent = 0;</script>
	<script src="/js/AC_RunActiveContent.js" type="text/javascript" ></script>
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-26049711-2']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>

	<script type="text/javascript">
	<!--
	function confirmMobile(isMobile) {
		if (isMobile != '0') {
			var answer = confirm("You're using a mobile device. Would you like to visit the mobile version of VPL website?")
			if (answer){
				window.location = "http://m.vaughanpl.info";
			}
		}
	}
	//-->
	</script>



 <?php

echo $javascript->link('jquery/jquery-1.5.2.min');
echo $skitter->includeFiles();
?>
<?php if (isset($CSS)) echo $html->css($CSS); else echo $html->css("newlook"); ?>


	<script type="text/javascript" src="/js/jquery.twitter.js"></script>


<script type="text/javascript">
			$(document).ready(function() {
				$("#twitter").getTwitter({
					userName: "vaughanpl",
					numTweets: 5,
					loaderText: "Loading tweets...",
					slideIn: true,
					slideDuration: 750,
					showHeading: true,
					headingText: "",
					showProfileLink: false,
					showTimestamp: true,
					includeRetweets: true,
					excludeReplies: false
				});
			});


</script>

</head>

<body onload="do_on_load(); externalLinks(); confirmMobile('<?php echo $mobile_browser; ?>'); ">


	<div class="section_end"></div>

	<table class="page_frame_table" cellpadding="0" cellspacing="0">
		<tr class="page_frame_main_row">
			<td class="page_frame_nav_bar">
				<!-- Site menu bar start -->

				<a href="/" id="home" title="VPL Home"><span class="graphic_link_caption">Vaughan Public Libraries</span></a>

				<div id="nav_bar">
					<?php echo $this->renderElement('site_menu'); ?>

					<div id="site_subsites">


						<div class="section">
							<div id="link_phone"><span class="graphic_link_caption">Call for Help:<br />905-653-READ</span></div>
						</div>

						<!-- div class="section">
							<a href="http://www.vaughanpl.info/services/renew" title="Renew your loans" id="renew_loans"><span class="graphic_link_caption">Renew:<br />905-709-0672</span></a>
						</div -->

						<div class="section">
							<a id="link_teen_vortex" href="/vortex" title="Teen vortex"><span class="graphic_link_caption">Teen Vortex</span></a>
						</div>
						<div class="section">
							<a id="link_kid_zone" href="/kidzone/kidzone.php" title="KidZone"><span class="graphic_link_caption">KidZone</span></a>
						</div>
						<div class="section">
							<a id="link_newcomer" href="/newcomers" title="Services for Newcomers"><span class="graphic_link_caption">Services for Newcomers</span></a>
						</div>

						<div class="section">
							<a id="link_building" href="/building" title="Building Blog"><span class="graphic_link_caption">Building Blog</span></a>
						</div>
						<div id="nav_bar_spacer"></div>

					</div>

					<div id="nav_bar_bottom"></div>
				</div>
				<!-- Site menu bar end -->
			</td>
			<td class="page_frame_content_bar">
				<!-- Content area start -->

				<div id="overhead_area">
					<div class="opening"></div>
					<div class="details"></div>
					<div class="closing"><img src="img/enrich.png" title="Enrich Inspire Transform" id="vpl_vision_img" /></div>
				</div>
			<!-----------------------------NEW ------------------------>
			<div id="banner">
				<form action="http://catalogue.vaughanpl.info/catalogue/search/query" method="post">
					<label id="search_label" for="term_1">Books, movies, music, and more</label>
				  	  <div>
						 <input type="text" name="term_1" id="t1" class="search_input_box" size="42" value="Search Catalogue" title="Search the Catalogue"/>
						 <input type="submit" id="submit_btn" value="Search" title="Search Bar" /></div>

				</form>
			</div>

			<!-----------------------------NEW END------------------------>
				<?php //echo $this->renderElement('banner'); ?>
				<div id="bread_crumb_area">
					<div class="opening"></div>
					<div class="details"><?php echo $html->getCrumbs("&nbsp;&gt;&nbsp;"); ?></div>
					<div class="closing"></div>
				</div>
				<?php echo $content_for_layout; ?>
				<?php
				// This gives the content page a chance to define its own related content elements
				if (isset($this->controller->viewVars["relatedContentElements"]))
					$relatedContentElements = $this->controller->viewVars["relatedContentElements"];
				?>

				<!-- Content area end -->
				<div class="min_width"></div>
			</td>
			<td class="page_frame_side_bar">
				<!-- Side bar area start -->


				<div id="search_bar_area">
					<div class="opening">

					</div>
					<div class="details">

					<a href="http://translate.google.com/translate?sl=en&tl=fr&amp;u=http%3A%2F%2Fwww.vaughanpl.info" rel="external" id="link_translate" title="Translate this site"><img src="img/translate_google.png" id="translate_img" title="Translate this Site" /></a>

<select class="search_bar_input_search" onchange="javascript:window.location=this.value;" title="How Do I">
							<option>How do I ...</option>
								<option value="http://catalogue.vaughanpl.info/catalogue/">Access the catalogue</option>
								<option value="http://catalogue.vaughanpl.info/catalogue/auth/login">Login to my library record</option>
								<option value="http://www.vaughanpl.info/contact">Contact VPL</option>
								<option value="http://www.vaughanpl.info/databases">Find an article</option>

								<option value="http://www.vaughanpl.info/materials">Find items</option>
								<option value="http://www.vaughanpl.info/services/placing_holds">Place a request</option>
								<option value="http://www.vaughanpl.info/services/placing_holds">Suspend a hold</option>
								<option value="http://www.vaughanpl.info/about/faqs#q11">Place multiple requests</option>
								<option value="http://www.vaughanpl.info/services/renew">Renew my loan</option>
								<option value="http://catalogue.vaughanpl.info/catalogue/auth/login">View my record</option>

								<option value="http://www.vaughanpl.info/services/membership">Learn about library cards</option>
								<option value="http://www.vaughanpl.info/services/loan_periods">Learn about loan periods</option>
							<option value="http://www.vaughanpl.info/services/loan_charges">Learn about fines</option>
						</select>


					</div>
					<div class="closing"></div>
				</div>

				<div id="shortcut_area_2">
					<div class="opening"></div>
					<div class="details">

						<!-- select class="search_bar_input_search" onchange="javascript:window.location=this.value;" title="How Do I">
							<option>How do I ...</option>
							<option value="http://www.vaughanpl.info/materials/catalogues">Access the catalogue</option>
							<option value="http://catalogue.vaughanpl.info:8080/auth/login">Login to my library record</option>
							<option value="http://www.vaughanpl.info/contact">Contact VPL</option>
							<option value="http://www.vaughanpl.info/databases">Find an article</option>

							<option value="http://www.vaughanpl.info/materials">Find items</option>
							<option value="http://www.vaughanpl.info/services/placing_holds">Place a request</option>
							<option value="http://www.vaughanpl.info/services/placing_holds">Suspend a hold</option>
							<option value="http://www.vaughanpl.info/about/faqs#q11">Place multiple requests</option>
							<option value="http://www.vaughanpl.info/services/renew">Renew my loan</option>
							<option value="http://catalogue.vaughanpl.info:8080/auth/login">View my record</option>

							<option value="http://www.vaughanpl.info/services/membership">Learn about library cards</option>
							<option value="http://www.vaughanpl.info/services/loan_periods">Learn about loan periods</option>
							<option value="http://www.vaughanpl.info/services/loan_charges">Learn about fines</option>
						</select -->


					</div>
					<div class="closing"></div>
				</div>


				<div id="side_bar_header">
					<div class="opening">
					</div>
					<div class="details">
<!--div style="display: inline;"><a href="http://m.vaughanpl.info"><img class="mobile_link" src="/img/mobile.png" title="Mobile Version" alt="Mobile Version"></a></div -->
						<?php if ($this->controller->General->fontSize == "large") { ?>
							<form method="post" action="#" class="accessibility_form">
								<div>
								<input type="hidden" name="font_size" value="normal" />
								<input type="submit" class="accessibility_link" value="Normal Font"/>
								</div>
							</form>
						<?php } else { ?>
							<form method="post" action="#" class="accessibility_form">
								<div>
								<input type="hidden" name="font_size" value="large" />
								<input type="submit" class="accessibility_link" value="Large Fonts"/>
								</div>
							</form>
						<?php } ?>

						<?php if ($this->controller->General->graphics == "no") { ?>
							<form method="post" action="#" class="accessibility_form">
								<div>
								<input type="hidden" name="graphics" value="yes" />
								<input type="submit" class="accessibility_link" value="Graphics"/>
								</div>
							</form>
						<?php } else { ?>
							<form method="post" action="#" class="accessibility_form">
								<div>
								<input type="hidden" name="graphics" value="no" />
								<input type="submit" class="accessibility_link" value="Low Graphics"/>
								</div>
							</form>
						<?php } ?>







					</div>

					<div class="closing"></div>
				</div>

				<div id="side_bar_content">
					<div class="opening"></div>
					<div class="details">
						<div id="social_media">

							<!-- a title="Email Librarian" href="/email_librarian"><img alt="Email Librarian" src="/img/email.gif" /><span class="hidden_for_graphic">Email Librarian</span></a --><a title="Subcribe to VPL's eNewsletter" href="/newsletters/subscribe"><img alt="Subcribe to VPL's eNewsletter" src="/img/enewsletter.jpg" /><span class="hidden_for_graphic">Subscribe to VPL's eNewsletter</span></a>&nbsp;<a title="Read Blogs by Librarians" href="/news_and_events/recent_blog_posts"><img alt="Read Blogs by Librarians" src="/img/blog.gif" /><span class="hidden_for_graphic">Read Blogs by Librarians</span></a>&nbsp;<a title="Follow us on Pinterest" href="http://pinterest.com/vaughanpl/" rel="external"><img alt="Follow us on Pinterest" src="/img/big-p-button.gif" /><span class="hidden_for_graphic">Follow us on Pinterest</span></a>&nbsp;<a title="VPL on Facebook" href="http://www.facebook.com/VaughanPublicLibraries"><img alt="VPL on Facebook" src="/img/facebook.png" /><span class="hidden_for_graphic">VPL on Facebook</span></a>&nbsp;<a title="Follow VPL on Twitter" href="http://www.twitter.com/vaughanpl"  rel="external"><img alt="Follow VPL on Twitter" src="/img/twitter.png" /><span class="hidden_for_graphic">Follow VPL on Twitter</span></a>&nbsp;<a title="Follow VPL on YouTube" href="http://www.youtube.com/user/VaughanPL"  rel="external"><img alt="Follow VPL on YouTube" src="/img/youtube.png" /><span class="hidden_for_graphic">Follow VPL on YouTube</span></a>


						</div>
						<div id="social_media">


<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fvaughanpl&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; width:100px; height:21px; display: inline; padding: 0px;  margin: 0px" allowTransparency="true"></iframe>
						</div>




						<?php if (isset($relatedContentElements)) { ?>
							<?php foreach ($relatedContentElements as $relatedContentElement) { ?>
							<?php //print_r($relatedContentElement); ?>
								<?php
									if (isset($relatedContentElement[1])) {
										echo $this->renderElement($relatedContentElement[0], $relatedContentElement[1]);
									} else {
										echo $this->renderElement($relatedContentElement[0]);
									}
								?>
							<?php } ?>
						<?php } ?>

					</div>

					<div class="closing"></div>
				</div>

				<!-- Side bar area end -->
			</td>
		</tr>

		<tr class="page_frame_bottom_row">
			<td class="page_frame_nav_bar">
				<div id="nav_bar_bottom_right"></div>
			</td>
			<td class="page_frame_content_bar">
				<div id="content_area_bottom">
					<div class="opening"></div>
					<div class="details"><center>
					<a class="shortcut_footer" href="http://www.vaughanpl.info/services/website_map">Site Map</a>  |
					<a class="shortcut_footer" href="http://www.vaughanpl.info/services/website_search">Site Search</a>  |
					<a class="shortcut_footer" href="http://www.vaughanpl.info/about/faqs">FAQs</a> |
					<a class="shortcut_footer" href="http://www.vaughanpl.info/services/website_search">Privacy</a>  |
					<a class="shortcut_footer" href="http://www.vaughanpl.info/about/faqs">Contact</a>

			&copy; Vaughan Public Libraries <?php echo date('Y', time()); ?>
					</center>

					</div>
					<div class="closing"></div>
				</div>
			</td>
			<td class="page_frame_side_bar">
				<div id="side_bar_bottom">
					<div class="opening"></div>
					<div class="details"></div>
					<div class="closing"></div>
				</div>
			</td>
		</tr>
	</table>

	<div id="shortcut_area">
		<div class="details">
			<a class="shortcut_bold" href="http://www.vaughanpl.info/services/website_map">Location & Hours</a>  |
			<a class="shortcut_bold" href="http://www.vaughanpl.info/services/website_search">Check My Record/Renew</a>  |
			<a class="shortcut_bold" href="http://www.vaughanpl.info/about/faqs">eBooks downloads</a> |
			<a class="shortcut_bold" href="http://m.vaughanpl.info/">VPL Mobile</a>
			<div class="min_width_shortcuts"></div>
		</div>
	</div>



<!-- BEGIN Invitation Positioning  -->
<script  type="text/javascript">
var lpPosY = 100;
</script>
<!-- END Invitation Positioning  -->

</body>
</html>
