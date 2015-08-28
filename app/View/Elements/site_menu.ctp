<?php

function buildSiteMenu($view,$site_menus) {

	$menu_info = array();
	getMenuInfo("main", $site_menus, 1, array(), $menu_info);

//print_r($menu_info);
	foreach ($site_menus as $menu_id => $menu_options) {




		if ($menu_id == "main") {
			echo "<div id='menu_main'>";
			$menu_item_class = "site_menu_main_item";
		} else {

			$showMenus = 'showMenu(\'' . $menu_id . '\');';
			$hideMenus = 'hideMenu(\'' . $menu_id . '\');';
			foreach ($menu_info[$menu_id]["parents"] as $parent) {
				if ($menu_info[$parent]["level"] > 1) $showMenus .= 'showMenu(\'' . $parent . '\');';
			}
			foreach ($menu_info[$menu_id]["parents"] as $parent) {
				if ($menu_info[$parent]["level"] > 1) $hideMenus .= 'hideMenu(\'' . $parent . '\');';
			}


			echo '<div id="menu_container_' . $menu_id . '" class="site_menu_container site_menu_level_' . $menu_info[$menu_id]["level"] . '">'.chr(13).chr(10);
			echo '<div id="menu_' . $menu_id . '" class="site_menu" onmouseover="' . $showMenus . '" onmouseout="' . $hideMenus . '" onblur="' . $hideMenus . '" onfocus="' . $showMenus . '" >'.chr(13).chr(10);
			echo '<div class="opening"></div>'.chr(13).chr(10);
			echo '<div class="details">'.chr(13).chr(10);

			$menu_item_class = "site_menu_item";
		}


		foreach($menu_options as $menu_option) {

			$url = $view->Html->link($menu_option["title"], $menu_option["target"]);

			/*
			if (isset($menu_option["submenu"])) {
				$showMenus =  'showMenu(\'menu_' . $menu_option["submenu"] . '\');' . $showMenus;
				$hideMenus =  'hideMenu(\'menu_' . $menu_option["submenu"] . '\');' . $hideMenus;
			}
			*/

			if (isset($menu_option["submenu"])) {
				$showMenus = 'showMenu(\'' . $menu_option["submenu"] . '\');';
				$hideMenus = 'hideMenu(\'' . $menu_option["submenu"] . '\');';
				echo '<div id="menu_option_' . $menu_option["submenu"] . '" class="'. $menu_item_class .'" onmouseover="' . $showMenus . '" onmouseout="' . $hideMenus . '" onblur="' . $hideMenus . '" onfocus="' . $showMenus . '" >' . $url . '</div>'.chr(13).chr(10);
			} else {
				echo "<div class='". $menu_item_class ."'>" . $url . "</div>".chr(13).chr(10);
			}
		}


		if ($menu_id == "main") {
			echo "<div id='site_menu_main_bottom'></div></div>".chr(13).chr(10);
		} else {
			echo "</div><div class='closing'></div></div></div>".chr(13).chr(10);
		}

	}

}

function getMenuInfo($menu_id, $site_menus, $level, $parents, & $menu_info) {
	$menu_info[$menu_id]["level"] = $level;
	$menu_info[$menu_id]["parents"] = $parents;
	$parents[] = $menu_id;
	foreach ($site_menus[$menu_id] as $menu_option) {
		if (isset($menu_option["submenu"])) {
			getMenuInfo($menu_option["submenu"],$site_menus,$level+1,$parents,$menu_info);
		}
	}
}


$home = "http://vm2.vaughanpl.info";
$site_menus = array();

$site_menus["main"] =	array(
							array(
									"title"		=>	"Books & Resources",
									"submenu"	=>	"materials",
									"target"	=> 	$home ."/materials"
									),
							array(
									"title"		=>	"Using the Library",
									"submenu"	=>	"services",
									"target"	=> 	$home ."/services"
									),
							array(
									"title"		=>	"What's On",
									"submenu"	=>	"news_and_events",
									"target"	=> 	$home ."/news_and_events"
									),
							array(
									"title"		=>	"My Account",
									"submenu"	=>	"account",
									"target"	=> 	"https://catalogue.vaughanpl.info/catalogue/auth/login"
									),
							array(
									"title"		=>	"About VPL",
									"submenu"	=>	"about",
									"target"	=> 	$home ."/about"
									),
							array(
									"title"		=>	"Contact",
									"submenu"	=>	"contact",
									"target"	=> 	$home ."/contact"
									)
							);

$site_menus["news_and_events"] =	array(
							array(
									"title"		=>	"Programs & Events",
									"target"	=> 	$home ."/programs"
									),
							array(
									"title"		=>	"Publications & Media Room",
									"target"	=> 	$home ."/news_and_events/publications_media"
									),
							array(
									"title"		=>	"eNewsletter",
									"target"	=> 	$home ."/newsletters/subscribe"
									)/*,
							array(
									"title"		=>	"Early Harvest",
									"target"	=> 	$home ."/news_and_events/early_harvest"
									)*/
							);

$site_menus["services"] =	array(
								array(
										"title"		=>	"Membership",
										"target"	=> 	$home ."/services/membership"
										),
								array(
										"title"		=>	"Borrowing Materials ...",
										"submenu"	=>	"borrowing",
										"target"	=> 	$home ."/services/borrowing"
										),
								array(
										"title"		=>	"Library Services",
										"submenu"	=>	"library_services",
										"target"	=> 	$home ."/library_services"
										),
								array(
										"title"		=>	"Library Notification",
										"target"	=> 	$home ."/library_notification_requests"
										),
								array(
										"title"		=>	"Maker Kits",
										"target"	=> 	$home ."/services/maker_kit"
										)

								);



$site_menus["borrowing"] =	array(
								array(
										"title"		=>	"Loan Periods",
										"target"	=> 	$home ."/services/loan_periods"
										),
								array(
										"title"		=>	"Renewing Your Loans",
										"target"	=> 	$home ."/services/renew"
										),
								array(
										"title"		=>	"Placing Holds",
										"target"	=> 	$home ."/services/placing_holds"
										),
								array(
										"title"		=>	"Charges for Overdue, Damaged or Lost Items",
										"target"	=> 	$home ."/services/loan_charges"
										)
								);

$site_menus["library_services"] =	array(
								array(
										"title"		=>	"Public Computers",
										"target"	=> 	$home ."/library_services#computer"
										),
								array(
										"title"		=>	"Book a Room",
										"target"	=> 	$home ."/library_services#room"
										),
								array(
										"title"		=>	"Exam Proctoring",
										"target"	=> 	$home ."/library_services#proctor"
										),
								array(
										"title"		=>	"Book Clubs",
										"target"	=> 	$home ."/library_services#club"
										),
								array(
										"title"		=>	"Homebound Services",
										"target"	=> 	$home ."/library_services#homebound"
										),
								array(
										"title"		=>	"CELA Serivices",
										"target"	=> 	$home ."/library_services#cela"
										)
								);

$site_menus["materials"] =	array(
								array(
										"title"		=>	"Library Catalogue",
										"target"	=> 	"https://catalogue.vaughanpl.info"
										),
								array(
										"title"		=>	"Downloads & Digital",
										"target"	=> 	$home ."/materials/downloads_digital"
										),
								array(
										"title"		=>	"Articles & Research",
										"target"	=> 	$home ."/databases"
										),
								array(
										"title"		=>	"We Recommend ...",
										"submenu"	=>	"materials_recommended",
										"target"	=> 	$home ."/materials/recommended"
								),
								array(
										"title"		=>	"65+",
										"target"	=> 	$home ."/sixtyfiveplus"
								),
								array(
										"title"		=>	"Newcomers",
										"target"	=> 	$home ."/newcomers"
								),
								array(
										"title"		=>	"Business Information",
										"target"	=> 	$home ."/business"
								),
								array(
										"title"		=>	"Career & Employment",
										"target"	=> 	$home ."/career"
								),
								array(
										"title"		=>	"Health & Wellness",
										"target"	=> 	$home ."/health"
								),

								array(
										"title"		=>	"Government & Community",
										"target"	=> 	$home ."/government_community"
								),
								array(
										"title"		=>	"Local Studies",
										"target"	=> 	$home ."/local_studies"
								)/*,
								array(
										"title"		=>	"Special Collections ...",
										"submenu"	=>	"materials_collections",
										"target"	=> 	$home ."/collections"
										)*/
								);



$site_menus["materials_recommended"] =	array(
								array(
										"title"		=>	"For Your Leisure",
										"target"	=> 	$home ."/leisure/"
										),
								array(
										"title"		=>	"New Arrivals",
										"target"	=> 	"/new_arrivals"
										),
								array(
										"title"		=>	"Just Returned",
										"target"	=> 	"/just_returned"
										),
								array(
										"title"		=>	"The Bookshelf @ goodreads",
										"target"	=> 	"http://www.goodreads.com/review/list/2426602-vaughanpl"
										),
								array(
										"title"		=>	"Award Winners",
										"target"	=> 	$home ."/awards"
										),
								array(
										"title"		=>	"Bestseller Lists",
										"target"	=> 	$home ."/bestsellers"
										),
								array(
										"title"		=>	"Your Next 5 Reads",
										"target"	=> 	$home ."/next_reads"
										),
								array(
										"title"		=>	"NextReads Newsletters",
										"target"	=> 	$home ."/materials/next_reads"
										)
								);


$site_menus["account"] =	array(
								array(
										"title"		=>	"Login to Library Account",
										"target"	=> 	"https://catalogue.vaughanpl.info/catalogue/auth/login"
										),
								array(
										"title"		=>	"Login to eBooks Account",
										"target"	=> 	"http://ebooks.vaughanpl.info/en/BANGAuthenticate.dll?Action=AuthCheck&URL=MyAccount.htm"
										)
								);


$site_menus["about"] =	array(
							array(
									"title"		=>	"Locations and Hours ...",
									"submenu"	=>	"about_libraries",
									"target"	=> 	$home ."/libraries"
									),
							array(
									"title"		=>	"Vaughan Public Library Board",
									"target"	=> 	$home ."/about/board"
									),
							array(
									"title"		=>	"Employment Opportunities",
									"target"	=> 	"/jobs"
									),
							array(
									"title"		=>	"Volunteer Opportunities",
									"target"	=> 	"/volunteers"
									),
							array(
									"title"		=>	"Strategic Plan & Annual Reports",
									"target"	=> 	$home ."/about/strategic_plan"
									),
							array(
									"title"		=>	"Policies ...",
									"submenu"	=>	"policies",
									"target"	=> 	$home ."/about/policies"
									),
							array(
									"title"		=>	"Accessibility Information",
									"target"	=> 	$home ."/about/accessibility"
									)

							);
$site_menus["policies"] =				array(
								array(
									"title"		=>	"Accessibility Policy",
									"target"	=> 	"/files/services/AccessibilityPolicy.pdf"
									),
								array(
								        "title"		=>	"Board By-Law",
									"target"	=> 	"/files/services/BoardBylaw.pdf"
									),
								array(
									"title"		=>	"Collection Development Policy",
									"target"	=> 	"/about/collection_development_policy"
									),
								array(
								        "title"		=>	"Copyright Policy",
									"target"	=> 	"/files/services/CopyrightPolicy.pdf"
									),
								array(
									"title"		=>	"Internet Policy",
									"target"	=> 	"/about/internet_policy"
									),
								 
								array(
									"title"		=>	"Operational Policy",
									"target"	=> 	"/files/services/OperationalPolicy.pdf"
									),
								array(
									"title"		=>	"Privacy Statement",
									"target"	=> 	"/about/website_privacy"
									),								
								array(
									"title"		=>	"Code of Conduct",
									"target"	=> 	"/files/services/CodeOfConduct.pdf"
									)							
									
								);


$site_menus["about_libraries"] =	array(
							array(
													"title"		=>	"Ansley Grove Library",
													"target"	=> 	$home ."/libraries/view/1"
													),
											array(
													"title"		=>	"Bathurst Clark Resource Library",
													"target"	=> 	$home ."/libraries/view/2"
													),
											array(
													"title"		=>	"Dufferin Clark Library",
													"target"	=> 	$home ."/libraries/view/3"
													),
											array(
													"title"		=>	"Kleinburg Library",
													"target"	=> 	$home ."/libraries/view/5"
													),
											array(
													"title"		=>	"Maple Library",
													"target"	=> 	$home ."/libraries/view/6"
													),
											array(
													"title"		=>	"Pierre Berton Resource Library",
													"target"	=> 	$home ."/libraries/view/7"
													),
											array(
													"title"		=>	"Pleasant Ridge Library",
													"target"	=> 	$home ."/libraries/view/10"										),
											array(
													"title"		=>	"Woodbridge Library",
													"target"	=> 	$home ."/libraries/view/8"
													),
											array(
													"title"		=>	"Map of Vaughan Public Libraries",
													"target"	=> 	$home ."/libraries/map"
													)
											);


$site_menus["contact"] =	array(
								array(
										"title"		=>	"Email Librarian",
										"target"	=> 	$home ."/email_librarian"
										),
								array(
										"title"		=>	"Contact Local Branch",
										"target"	=> 	$home ."/libraries"
										),
								array(
										"title"		=>	"Feedback and Suggestions ...",
										"submenu"	=>	"suggestions",
										"target"	=> 	$home ."/contact/suggestions"
										),
								array(
										"title"		=>	"Accessibility Customer Feedback Form",
										"target"	=> 	$home ."/files/accessibility.pdf"
										)
								);

$site_menus["suggestions"] =	array(
								array(
										"title"		=>	"Suggest an Item for Purchase",
										"target"	=> 	$home ."/email_librarian/add/purchase"
										),
								array(
										"title"		=>	"Contact VPL Administration",
										"target"	=> 	$home ."/contact/administration"
										)
								);

buildSiteMenu($view, $site_menus);





?>