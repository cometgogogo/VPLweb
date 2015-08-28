<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?php echo "Vaughan Public Libraries - ". $title_for_layout; ?></title>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="vaughan, public, library, ontario, canada" />
	<meta name="description" content="Enrich Inspire Transform - Vaughan Public Libraries offer welcoming destinations that educate, excite and empower our community. " />

	<link rel="shortcut icon" href="http://www.vaughanpl.info/favicon.ico" type="image/x-icon" />

	<link rel="alternate" type="application/rss+xml" title="VPL New Arrivals Feeds - Adult Fiction" href="http://www.vaughanpl.info/new_arrivals/feed/1" />

	<link rel="alternate" type="application/rss+xml" title="VPL New Arrivals Feeds - Adult Paperback Fiction" href="http://www.vaughanpl.info/new_arrivals/feed/2" />

	<link rel="alternate" type="application/rss+xml" title="VPL New Arrivals Feeds - Adult Non-Fiction" href="http://www.vaughanpl.info/new_arrivals/feed/3" />

	<link rel="alternate" type="application/rss+xml" title="VPL New Arrivals Feeds - DVDs" href="http://www.vaughanpl.info/new_arrivals/feed/4" />

	<link rel="alternate" type="application/rss+xml" title="VPL New Arrivals Feeds - DVDs Non-Fiction" href="http://www.vaughanpl.info/new_arrivals/feed/5" />

	<link rel="alternate" type="application/rss+xml" title="VPL New Arrivals Feeds - Children's Picture Books" href="http://www.vaughanpl.info/new_arrivals/feed/6" />

	<link rel="alternate" type="application/rss+xml" title="VPL New Arrivals Feeds - Children's Fiction" href="http://www.vaughanpl.info/new_arrivals/feed/7" />

	<link rel="alternate" type="application/rss+xml" title="VPL New Arrivals Feeds - Children's Paperback Fiction" href="http://www.vaughanpl.info/new_arrivals/feed/8" />

	<link rel="alternate" type="application/rss+xml" title="VPL New Arrivals Feeds - Children's Non-Fiction" href="http://www.vaughanpl.info/new_arrivals/feed/9" />

	<link rel="alternate" type="application/rss+xml" title="VPL New Arrivals Feeds - Children's DVDs" href="http://www.vaughanpl.info/new_arrivals/feed/10" />

	<link rel="alternate" type="application/rss+xml" title="VPL New Arrivals Feeds - Children's DVDs Non-Fiction" href="http://www.vaughanpl.info/new_arrivals/feed/11" />

	<link rel="alternate" type="application/rss+xml" title="VPL New Arrivals Feeds - Young Adult Fiction" href="http://www.vaughanpl.info/new_arrivals/feed/12" />

	<link rel="alternate" type="application/rss+xml" title="VPL New Arrivals Feeds - Young Adult Paperback Fiction" href="http://www.vaughanpl.info/new_arrivals/feed/13" />

	<link rel="alternate" type="application/rss+xml" title="VPL New Arrivals Feeds - Music CDs" href="http://www.vaughanpl.info/new_arrivals/feed/15" />

	<link rel="alternate" type="application/rss+xml" title="VPL New Arrivals Feeds - Children's CDs" href="http://www.vaughanpl.info/new_arrivals/feed/16" />

	<?php if (isset($CSS)) echo $this->Html->css($CSS); else echo $this->Html->css("default"); ?>
	
	<link rel="stylesheet" href="<?php echo $this->webroot . 'css/'; ?>jquery-ui.css" type="text/css" media="screen" />		
	
	<script type="text/javascript" src="/js/slideMenus.js"></script>
	<script language="javascript">AC_FL_RunContent = 0;</script>
	<script src="/js/AC_RunActiveContent.js" language="javascript"></script>

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
	
	<!-- for slideshow -->
		<script type="text/javascript" src="/js/slideMenus.js"></script>
		<?php
			echo $javascript->link('jquery/jquery-1.5.2.min');
			echo $skitter->includeFiles();
		?>
	
		<script  type="text/javascript" >AC_FL_RunContent = 0;</script>
	<script src="/js/AC_RunActiveContent.js" type="text/javascript" ></script>

	<script type="text/javascript">
		function externalLinks() {
		 if (!document.getElementsByTagName) return;
		 var anchors = document.getElementsByTagName("a");
		 for (var i=0; i < (anchors.length); i++) {
		   var anchor = anchors[i];
		   if (anchor.getAttribute("href") &&
			   anchor.getAttribute("rel") == "external")
			 anchor.target = "_blank";
		 }
		}

		function confirmMobile(isMobile) {
			if (isMobile) {
				var answer = confirm("You're using a mobile device. Would you like to visit the mobile version of VPL website?")
				if (answer){
					window.location = "http://m.vaughanpl.info";
				}
			}
		}

		function doInvitation(){
			var title = document.getElementsByTagName("title")[0].innerHTML;
			if(title == "Vaughan Public Libraries - Home") {
				window.open('/surveyInvitation.html','VaughanPublicLibraries','height=380,width=600, scrollbars=1, resizable=1');
			}
		}

		function do_on_load() {
			try {onLoad();}
			catch (ex) {}
			externalLinks();
			//confirmMobile('<?php echo $mobile; ?>');


		}

		window.onload = do_on_load;
</script>




</head>

<body>

	<table class="page_frame_table" cellpadding="0" cellspacing="0">
		<tr class="page_frame_main_row">
			<td class="page_frame_nav_bar">
				<div id="skipnav"><a href="#skip">Skip to content</a></div>
								<!-- Site menu bar start -->
				
								<a href="http://www.vaughanpl.info" id="home" title="VPL Home"><span class="graphic_link_caption">Vaughan Public Libraries</span></a>
				
								<div id="nav_bar">
									<?php echo $this->renderElement('site_menu'); ?>
				
									<div id="site_subsites">
				
									<div class="section">
				
											<div class="box_skitter box_skitter_small info_slide">
											
											<script  type="text/javascript">
												$(document).ready(function(){
													$('.box_skitter_large').skitter({numbers: true, navigation: false, label: false, preview: 1, hideTools: true, interval: 5000, show_randomly: false, numbers_align: "center", animateNumberOver: {backgroundColor:"#999", color:"#fff"}, animateNumberActive: {backgroundColor:"#004499", color:"#fff"}});
													
													$('.box_skitter_small').skitter({numbers: false, navigation: true, label: false, preview: 1, hideTools: true, auto_play: false, interval: 30000, show_randomly: true, });	
													
											
												});
											</script>
											<ul>
											<li><a href="https://www.hoopladigital.com" target="_blank"><img src="/img/slides/hoopla_btn.png" class="fade" alt="hoopla button" /></a></li>
											<li><a href="http://eproducts.vaughanpl.info:81/login/zinio"><img src="/img/slides/zinio_btn.png" class="fade" alt="zinio button" /></a></li>
											<li><a href="http://ebooks.vaughanpl.info/"><img src="/img/slides/overdrive_btn.png" class="fade" alt="OverDrive" /></a></li>
											<li><a href="http://eproducts.vaughanpl.info:81/login/one_click"><img src="/img/slides/oneclick_btn.png" class="fade" alt="OneClickdigital" /></a></li>
											<li><a href="http://eproducts.vaughanpl.info:81/login/universal_class"><img src="/img/slides/uc_btn.png" class="fade" alt="universal class button"/></a></li>
											<li><a href="http://eproducts.vaughanpl.info:81/login/transparent"><img src="/img/slides/tlo_btn.png" class="fade" alt="Transparent Language" /></a></li>
											<li><a href="http://eproducts.vaughanpl.info:81/login/indieflix"><img src="/img/slides/indieflex_btn.png" class="fade" alt="Indieflix" /></a></li>
											<li><a href="https://ebook.3m.com/library/vaughanpl/"><img src="/img/slides/3m_btn.png" class="fade" alt="3M Library" /></a></li>
											</ul>
											</div>
										    
										</div><br/>
										
										<div class="section">
											<a id="link_teen_vortex" href="http://www.vaughanpl.info/vortex" title="Teen vortex"><span class="graphic_link_caption">Teen Vortex</span></a>
										</div>
										<div class="section">
											<a id="link_kid_zone" href="http://www.vaughanpl.info/kidzone/kidzone.php" title="KidZone"><span class="graphic_link_caption">KidZone</span></a>
										</div>
										<div class="section">
											<a id="link_leisure" href="http://www.vaughanpl.info/leisure/" title="For Your Leisure Blog"><span class="graphic_link_caption">For Your Leisure Blog</span></a>
										</div>
										
										
										
										<!-- div class="section">
											<div id="link_phone"><span class="graphic_link_caption">Call for Help:<br />905-653-READ</span></div>
										</div -->
										
										<div class="section">
											<a id="link_webprint" href="https://webprint.vaughanpl.info/WebPrint" title="web print" rel="external"><span class="graphic_link_caption">Web Print</span></a>
										</div>
										<div class="section">
											<a id="link_building" href="http://www.vaughanpl.info/building" title="Building Blog"><span class="graphic_link_caption">Building Blog</span></a>
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
					<div class="closing"><img src="/img/enrich.png" title="Enrich Inspire Transform" alt="Enrich Inspire Transform" id="vpl_vision_img" /></div>
				</div>
			<div id="banner">
				<!--form action="http://catalogue.vaughanpl.info/catalogue/search/query" method="post">
					<label id="search_label" for="term_1">Books, movies, music, and more</label>
				  	  <div>
						 <input type="text" name="term_1" id="t1" class="search_input_box" size="42" value="Search Catalogue" title="Search the Catalogue"/>
						 <input type="submit" id="submit_btn" value="Search" title="Search Bar" /></div>

				</form-->
				 <form method="post" action="https://catalogue.vaughanpl.info/catalogue/search/query">
					<fieldset><legend>search catalogue</legend>

					      <label for="search_query" id="search_label">Find books, movies, music...</label><input type="text" id="search_query" class="search_input_box" name="term_1" size="42" placeholder="Search Catalogue" />
					      <input id="submit_btn" value="Search" title="Search Bar" type="submit"  />
					</fieldset>
				  </form>
			</div>
			<a name="content"></a>
				<?php //echo $this->renderElement('banner'); ?>
				<div id="bread_crumb_area">
					<div class="opening"></div>
					<div class="details"><?php echo $this->Html->getCrumbs("&nbsp;&gt;&nbsp;"); ?></div>
					<div class="closing"><a id="skip_target" name="skip">-</a></div></div>
				</div>
				<?php echo $content_for_layout; ?>
				<?php
				// This gives the content page a chance to define its own related content elements
				if (isset($this->controller->viewVars["relatedContentElements"]))
					$relatedContentElements = $this->viewVars["relatedContentElements"];
				?>

				<!-- Content area end -->
				<div class="min_width"></div>
			</td>
			<td class="page_frame_side_bar">
				<!-- Side bar area start -->

				<div id="search_bar_area">
					<div class="opening"></div>
					<div class="details">

					<a href="http://translate.google.com/translate?sl=en&tl=fr&amp;u=http%3A%2F%2Fwww.vaughanpl.info" rel="external" id="link_translate" title="Translate this site"><img src="/img/translate_google.png" id="translate_img" title="Translate this Site" alt="Translate this Site"/></a>

<form action="javascript:goto_URL();">
					<fieldset><legend>How do I</legend>
<label for="how_do_i"><span style="display: none !important;">How Do I</span></label><select class="search_bar_input_search" id="how_do_i" name="howDoI" title="How Do I" >
							<option value="/index.php">How do I ...</option>
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
						<input type="submit" style="width: 24px; height: 20px; font-size: 10px; padding-left: 2px;" value="Go" />
						</fieldset>

						</form>




					</div>
					<div class="closing"></div>
				</div>

				<div id="shortcut_area_2">
					<div class="opening"></div>
					<div class="details">

					</div>
					<div class="closing"></div>
				</div>


				<div id="side_bar_header">
					<div class="opening">
					</div>
					<div class="details">

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
								<input type="submit" class="accessibility_link" value="Large Font"/>
								</div>
							</form>
						<?php } ?>


					<a href="http://m.vaughanpl.info" class="accessibility_link">Mobile Version</a>

					</div>
					<div class="closing"></div>
				</div>

				<div id="side_bar_content">
					<div class="opening"></div>
					<div class="details">


						<div class="social_media">

							<a href="/newsletters/subscribe"><img alt="eNewsletter icon" src="/img/enewsletter.jpg" /><span class="hidden_for_graphic">Subscribe to VPL's eNewsletter</span></a>&nbsp;<a href="/blogs"><img alt="Blog icon" src="/img/blog.gif" /><span class="hidden_for_graphic">Read Blogs by Librarians</span></a>&nbsp;<a href="https://www.facebook.com/vaughanpl" target="_blank"><img alt="Facebook icon" src="/img/facebook.png" /><span class="hidden_for_graphic">VPL on Facebook</span></a>&nbsp;<a href="http://www.twitter.com/vaughanpl" target="_blank"><img alt="Twitter icon" src="/img/twitter.png" /><span class="hidden_for_graphic">Follow VPL on Twitter</span></a>&nbsp;<a href="http://www.youtube.com/user/VaughanPL" target="_blank"><img alt="YouTube icon" src="/img/youtube.png" /><span class="hidden_for_graphic">Follow VPL on YouTube</span></a>&nbsp;<a href="http://pinterest.com/vaughanpl/" target="_blank"><img alt="Pinterest icon" src="/img/big-p-button.gif" /><span class="hidden_for_graphic">Follow us on Pinterest</span></a>

						</div>
						<div class="social_media">


<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fvaughanpl&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" title="facebook" scrolling="no" frameborder="0" style="border:none; width:100px; height:21px; display: inline; padding: 0px;  margin: 0px" allowTransparency="true"></iframe>
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
					<a class="shortcut_footer" href="http://www.vaughanpl.info/about/website_privacy">Privacy</a>  |
					<a class="shortcut_footer" href="http://www.vaughanpl.info/contact">Contact</a>

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
			<a class="shortcut_bold" href="http://www.vaughanpl.info/libraries">Location & Hours</a>  |
			<a class="shortcut_bold" href="http://catalogue.vaughanpl.info/catalogue/auth/login">Check My Record/Renew</a>  |
			<a class="shortcut_bold" href="http://www.vaughanpl.info/materials/downloads_digital">Downloads & Digital</a>
			<div class="min_width_shortcuts"></div>
		</div>
	</div>



<!-- BEGIN Invitation Positioning  -->
<script language="javascript" type="text/javascript">
var lpPosY = 100;
</script>
<!-- END Invitation Positioning  -->

</body>
</html>
