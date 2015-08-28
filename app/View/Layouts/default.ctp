<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
<?php

$mobile_browser = 0;
$mobile = false;

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
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
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
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'OperaMini')>0) {
    $mobile_browser++;
}
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows')>0) {
    $mobile_browser=0;
}

if ($mobile_browser > 0) {
	$mobile = true;
}


?>
-->

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<title><?php echo "Vaughan Public Libraries - ". $title_for_layout; ?></title>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=10" >
	<meta name="keywords" content="vaughan, public, library, ontario, canada" />
	<meta name="description" content="Vaughan Public Libraries website" />
	<meta name="description" content="Enrich Inspire Transform - Vaughan Public Libraries offer welcoming destinations that educate, excite and empower our community. " />

	<link rel="shortcut icon" href="http://www.vaughanpl.info/favicon.ico" type="image/x-icon" />

<!-- CSS -->
	
	<?php if (isset($CSS)) echo $this->Html->css($CSS); else echo $this->Html->css("default"); ?>
	<?php echo $this->Html->css('zebra_datepicker'); ?>
	<link rel="stylesheet" href="<?php echo $this->webroot . 'css/'; ?>jquery-ui.css" type="text/css" media="screen" />
	<!--
	<link rel="stylesheet" href="/css/jquery.twitter.css">
	<link rel="stylesheet" href="/css/jquery.tweet.css">
	-->
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

<!-- scripts -->



<!-- for slideshow -->
	<script type="text/javascript" src="/js/slideMenus.js"></script>
	<?php
		echo $this->Html->script('jquery/jquery-1.5.2.min');
		echo $this->Skitter->includeFiles();
	?>

	<script  type="text/javascript" >AC_FL_RunContent = 0;</script>
	<script src="/js/AC_RunActiveContent.js" type="text/javascript" ></script>

<!-- for calendar select -->
	<?php echo $this->Html->script('zebra_datepicker'); ?>

<!-- google analysis -->
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

<!-- for search box on banner-->

	<script type="text/javascript">
	    jQuery(function() {
	      jQuery.support.placeholder = false;
	      test = document.createElement('input');
	      if('placeholder' in test) jQuery.support.placeholder = true;
	    });
	    // This adds placeholder support to browsers that wouldn't otherwise support it.
	    $(function() {
	      if(!$.support.placeholder) {
	       var active = document.activeElement;
	       $(':text').focus(function () {
		 if ($(this).attr('placeholder') != '' && $(this).val() == $(this).attr('placeholder')) {
		  $(this).val('').removeClass('hasPlaceholder');
		 }
	       }).blur(function () {
		 if ($(this).attr('placeholder') != '' && ($(this).val() == '' || $(this).val() == $(this).attr('placeholder'))) {
		  $(this).val($(this).attr('placeholder')).addClass('hasPlaceholder');
		 }
	       });
	       $(':text').blur();
	       $(active).focus();
	       $('form:eq(0)').submit(function () {
		 $(':text.hasPlaceholder').val('');
	       });
	      }
	    });
	</script>
	 <style type='text/css'>
	    .hasPlaceholder {
	      color: #777;
	    }
	    </style>
	    

	    
	    
<script type="text/javascript">
$("iframe").ready(function() {
    setTimeout(function() {
        $($("iframe.rw").contents()).find("#cover_tip").css("background-color", "red !important");
    }, 3000);
});
</script>




<!-- for tabs -->
	<?php // echo $javascript->link('ui.core'); ?>
	<?php //echo $javascript->link('ui.draggable'); ?>
	<?php //echo $javascript->link('ui.resizable'); ?>

<script type="text/javascript" src="/js/ui/ui.core.js"></script>
<script type="text/javascript" src="/js/ui/ui.tabs.js"></script>

<script type="text/javascript">
   $(function() {
       $("#tabs").tabs();
   });
</script>

<script language="javascript" type="text/javascript">
	
</script>

<script type="text/javascript">
<!--
function goto_URL(){
	window.location.href = document.getElementById('how_do_i').value;;
}
//-->

</script>

<script type="text/javascript">
	function toggleMin(id){
		var style = document.getElementById(id).style;
		style.display = (style.display=="block") ? "none":"block";
	}
	
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
		
		var ref = document.referrer;
		
		var isMobile = {
		    Android: function() {
		        return navigator.userAgent.match(/Android/i);
		    },
		    BlackBerry: function() {
		        return navigator.userAgent.match(/BlackBerry/i);
		    },
		    iOS: function() {
		        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		    },
		    Opera: function() {
		        return navigator.userAgent.match(/Opera Mini/i);
		    },
		    Windows: function() {
		        return navigator.userAgent.match(/IEMobile/i);
		    },
		    any: function() {
		        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		    }
		};
		
		if (isMobile.any() && (document.URL == 'http://www.vaughanpl.info/' || document.URL == 'http://www.vaughanpl.info/index.php') && ref.indexOf("vaughanpl.info/") == -1) {
						
				window.location = "http://www.vaughanpl.info/mobile.html";	
						
			
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
		confirmMobile('<?php echo $mobile; ?>');


	}

	window.onload = do_on_load;
</script>



</head>

<body>



	<!-- div class="section_end"></div -->

	<table class="page_frame_table" cellpadding="0" cellspacing="0">
		<tr class="page_frame_main_row">
			<td class="page_frame_nav_bar">
				<div id="skipnav"><a href="#skip">Skip to content</a></div>


				<!-- Site menu bar start -->

				<a href="/" id="home" title="VPL Home"><span class="graphic_link_caption">Vaughan Public Libraries</span></a>

				<div id="nav_bar">
					<?php echo $this->element('site_menu', ["view" => $this]); ?>

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
							<a id="link_teen_vortex" href="/vortex" title="Teen vortex"><span class="graphic_link_caption">Teen Vortex</span></a>
						</div>
						<div class="section">
							<a id="link_kid_zone" href="/kidzone" title="KidZone"><span class="graphic_link_caption">KidZone</span></a>
						</div>
						<div class="section">
							<a id="link_leisure" href="/leisure/" title="For Your Leisure Blog"><span class="graphic_link_caption">For Your Leisure Blog</span></a>
						</div>
						
						
						
						<!-- div class="section">
							<div id="link_phone"><span class="graphic_link_caption">Call for Help:<br />905-653-READ</span></div>
						</div -->
						
						<div class="section">
							<a id="link_webprint" href="https://webprint.vaughanpl.info/WebPrint" title="web print" rel="external"><span class="graphic_link_caption">Web Print</span></a>
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
					<div class="closing"><img src="/img/enrich.png" alt="Enrich Inspire Transform" id="vpl_vision_img" /></div>
				</div>

			<div id="banner">

 			 <form method="get" action="https://catalogue.vaughanpl.info/catalogue/search/query">
				<fieldset><legend>search catalogue</legend>

				      <label for="search_query" id="search_label">Find books, movies, music...</label>
				      <input type="text" id="search_query" class="search_input_box" name="term_1" size="42" value="" placeholder="Search Catalogue" />
				      <input id="submit_btn" value="Search" title="Search Bar" type="submit"  />
			</fieldset>
				  </form>

			</div>


				<?php //echo $this->renderElement('banner'); ?>


				<div id="bread_crumb_area">
					<div class="opening"></div>
					<div class="details"><?php echo $this->Html->getCrumbs("&nbsp;&gt;&nbsp;"); ?></div>
					<div class="closing"><a id="skip_target" name="skip">-</a></div>
				</div>


				<?php echo $content_for_layout; ?>
				<?php
				// This gives the content page a chance to define its own related content elements
				if (isset($this->viewVars["relatedContentElements"]))
					$relatedContentElements = $this->viewVars["relatedContentElements"];
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

					<a href="http://translate.google.com/translate?sl=en&tl=fr&amp;u=http%3A%2F%2Fwww.vaughanpl.info" rel="external" id="link_translate" title="Translate this site"><img src="/img/translate_google.png" id="translate_img" alt="Translate this Site" /></a>
					<form action="javascript:goto_URL();">
					<fieldset><legend>How do I</legend>
<label for="how_do_i"><span style="display: none !important;">How Do I</span></label><select class="search_bar_input_search" id="how_do_i" name="howDoI" title="How Do I" >
							<option value="/index.php">How do I ...</option>
								<option value="http://catalogue.vaughanpl.info/catalogue/">Access the catalogue</option>
								<option value="http://catalogue.vaughanpl.info/catalogue/auth/login">Login to my library record</option>
								<option value="/contact">Contact VPL</option>
								<option value="/databases">Find an article</option>

								<option value="/materials">Find items</option>
								<option value="/services/placing_holds">Place a request</option>
								<option value="/services/placing_holds">Suspend a hold</option>
								<option value="/about/faqs#q11">Place multiple requests</option>
								<option value="/services/renew">Renew my loan</option>
								<option value="http://catalogue.vaughanpl.info/catalogue/auth/login">View my record</option>

								<option value="/services/membership">Learn about library cards</option>
								<option value="/services/loan_periods">Learn about loan periods</option>
							<option value="/services/loan_charges">Learn about fines</option>
						</select>
						<input type="submit" value="Go" id="how_do_button" />
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
<!--div style="display: inline;"><a href="http://m.vaughanpl.info"><img class="mobile_link" src="/img/mobile.png" title="Mobile Version" alt="Mobile Version"></a></div -->
						<?php if ($CSS == "large_font") { ?>
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


<IFRAME src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fvaughanpl&amp;send=false&amp; layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" TITLE="FACEBOOK" scrolling="no" frameborder="0" style="border:none; width:100px; height:21px; display: inline; padding: 0px;  margin: 0px" allowTransparency="true"></IFRAME>
						</div>




						<?php if (isset($relatedContentElements)) { ?>
							<?php foreach ($relatedContentElements as $relatedContentElement) { ?>
							<?php //print_r($relatedContentElement); ?>
								<?php
									if (isset($relatedContentElement[1])) {
										echo $this->element($relatedContentElement[0], $relatedContentElement[1]);
									} else {
										echo $this->element($relatedContentElement[0]);
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
					<a class="shortcut_footer" href="/services/website_map">Site Map</a>  |
					<a class="shortcut_footer" href="/services/website_search">Site Search</a>  |
					<a class="shortcut_footer" href="/about/faqs">FAQs</a> |
					<a class="shortcut_footer" href="/about/website_privacy">Privacy</a>  |
					<a class="shortcut_footer" href="/contact">Contact</a> |
					<a class="shortcut_footer" href="http://www.canadahelps.org/CharityProfilePage.aspx?CharityID=d11680" rel="external">Donate to VPL</a>
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
			<a class="shortcut_bold" href="/libraries">Locations & Hours</a>  |
			<a class="shortcut_bold" href="https://catalogue.vaughanpl.info/catalogue/auth/login">Check My Record/Renew</a>  |
			<a class="shortcut_bold" href="/materials/downloads_digital">Downloads & Digital</a>

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
