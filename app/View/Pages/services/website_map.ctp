<?php
include("crumbs.ctp");
//include("crumbs_website.ctp");
?>



<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Site Map</h1>
	</div>
	<div class="closing"></div>
</div>



<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<?php $siteStructure = getSiteStructure(); ?>

		<?php foreach ($siteStructure["main"] as $mainSection) { ?>

			<div class="list_with_summary">

				<div class="name">
					<?php echo $this->Html->link($mainSection["title"], $mainSection["target"]); ?>
				</div>
				<div class="summary">
					<?php if (isset($mainSection["submenu"])) { ?>
						<?php displaySectionContents($siteStructure, $mainSection["submenu"]); ?>
					<?php } ?>
				</div>
			</div>


		<?php } ?>



	</div>
	<div class="closing"></div>

</div>

<?php




function displaySectionContents($siteStructure, $section) {
	echo "<ul>";
	foreach ($siteStructure[$section] as $content) {
		echo '<li><a href="' . $content["target"] . '">' . $content["title"] . '</a></li>';
		if (isset($content["submenu"])) {
			displaySectionContents($siteStructure, $content["submenu"]);
		}
	}
	echo "</ul>";
}




function getSiteStructure() {
	$home = "http://vm2.vaughanpl.info";
	$ret = array();
	$ret["main"] =	array(
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
									"target"	=> 	"http://catalogue.vaughanpl.info/catalogue/auth/login"
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

	$ret["news_and_events"] =	array(
							array(
									"title"		=>	"Programs & Events",
									"target"	=> 	$home ."/programs"
									),
							array(
									"title"		=>	"Publications & Media Room",
									"submenu"	=>	"publications",
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

	$ret["services"] =	array(
									array(
											"title"		=>	"Membership ...",
											"submenu"	=>	"services_membership",
											"target"	=> 	"/services/membership"
											),
									array(
											"title"		=>	"Borrowing Materials",
											"submenu"	=>	"services_borrowing",
											"target"	=> 	"/services/borrowing"
											),
									array(
											"title"		=>	" Library Services",
											"submenu"	=>	"services_special",
											"target"	=> 	"/library_services"
											),
									array(
											"title"		=>	"Library Notification",
											"target"	=> 	"/library_notification_requests"
											),
									array(
											"title"		=>	"Maker Kit",
											"target"	=> 	"/services/maker_kit"
										)
									);
	$ret["policies"] =	array(
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

	$ret["publications"] =	array(
							array(
									"title"		=>	"Library Program Guide",
									"target"	=> 	$home ."/news_and_events/atl_guide"
									),
							array(
									"title"		=>	"News Releases",
									"target"	=> 	$home ."/news_and_events/press_releases"
									)
								);

	$ret["services_membership"] =	array(
									array(
											"title"		=>	" Apply Online",
											"target"	=> 	"https://www.vaughanpl.info/membership_applications"
											)
									);
	$ret["services_borrowing"] =	array(
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
	$ret["services_special"] =	array(
									array(
											"title"		=>	" Service Charges",
											"target"	=> 	"/services/service_charges"
											)
									);

	$ret["services_internet"] =	array(
									array(
											"title"		=>	"Internet Policy",
											"target"	=> 	"/services/internet_policy"
											),
									array(
											"title"		=>	"Internet Safety",
											"target"	=> 	"/services/internet_safety"
											)
									);

	$ret["services_website"] =	array(
									array(
											"title"		=>	"Site Search",
											"target"	=> 	"/services/website_search"
											),
									array(
											"title"		=>	"Site Map",
											"target"	=> 	"/services/website_map"
											),
									array(
											"title"		=>	"Privacy and Security",
											"target"	=> 	"/services/website_privacy"
											)
									);

	$ret["materials"] =	array(
								array(
										"title"		=>	"Library Catalogue",
										"target"	=> 	"https://catalogue.vaughanpl.info/catalogue"
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



	$ret["materials_collections"] =	array(
									array(
											"title"		=>	"Adult Basic Literacy Collection",
											"target"	=> 	"/collections/adult_literacy"
											),
									array(
											"title"		=>	"Black Heritage Collection",
											"target"	=> 	"/collections/black_heritage"
											),
									array(
											"title"		=>	"Cinema Collection",
											"target"	=> 	"/collections/cinema"
											),
									array(
											"title"		=>	"ESL Collection",
											"target"	=> 	"/collections/esl"
											),
									array(
											"title"		=>	"Government Documents",
											"target"	=> 	$home ."/collections/government_doc"
											),

									array(
											"title"		=>	"Local Studies Collection",
											"target"	=> 	"/collections/local_studies"
											),
									array(
											"title"		=>	"Professional Collection",
											"target"	=> 	$home ."/collections/professional_collection"
											)
									);

	$ret["materials_recommended"] =	array(
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
											"target"	=> 	"/awards"
											),
									array(
											"title"		=>	"Bestseller Lists",
											"target"	=> 	"/bestsellers"
											),
									array(
											"title"		=>	"Your Next 5 Reads",
											"target"	=> 	"/next_reads"
											),
									array(
											"title"		=>	"NextReads Newsletters",
											"target"	=> 	"/materials/next_reads"
											)
									);


	$ret["about"] =	array(
								array(
										"title"		=>	"Locations and Hours ...",
										"submenu"	=>	"about_libraries",
										"target"	=> 	"/libraries"
										),
								array(
										"title"		=>	"Vaughan Public Library Board ...",
										"target"	=> 	"/about/board"
										),
								array(
										"title"		=>	"Strategic Plan & Annual Reports",
										"target"	=> 	"/about/strategic_plan"
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
										"title"		=>	"Policies ...",
										"submenu"	=>	"policies",
										"target"	=> 	"/about/policies"
									),
								array(
										"title"		=>	"Accessibility Information",			"target"	=> 	"/about/accessibility"
									)
						);



	$ret["about_libraries"] =	array(
								array(
										"title"		=>	"Ansley Grove Library",
										"target"	=> 	"/libraries/view/1"
										),
								array(
										"title"		=>	"Bathurst Clark Resource Library",
										"target"	=> 	"/libraries/view/2"
										),
								array(
										"title"		=>	"Dufferin Clark Library",
										"target"	=> 	"/libraries/view/3"
										),
								array(
										"title"		=>	"Kleinburg Library",
										"target"	=> 	"/libraries/view/5"
										),
								array(
										"title"		=>	"Maple Library",
										"target"	=> 	"/libraries/view/6"
										),
								array(
										"title"		=>	"Pierre Berton Resource Library",
										"target"	=> 	"/libraries/view/7"
										),
								array(
										"title"		=>	"Pleasant Ridge Library",
										"target"	=> 	"/libraries/view/10"
										),
								array(
										"title"		=>	"Woodbridge Library",
										"target"	=> 	"/libraries/view/8"
										),
								array(
										"title"		=>	"Map of Vaughan Public Libraries",
										"target"	=> 	"/libraries/map"
										)
								);




	$ret["community"] =	array(
								array(
										"title"		=>	"Community Events",
										"target"	=> 	"/community/current_events"
										),
								array(
										"title"		=>	"Local Links",
										"target"	=> 	"/community/local_links"
										),
								/*array(
										"title"		=>	"Local Business Links",
										"target"	=> 	"/community/local_business_links"
										),*/
								array(
										"title"		=>	"Community Information & Volunteer Centre (CIVC)",
										"target"	=> 	"http://york.cioc.ca/"
										),
								array(
										"title"		=>	"City of Vaughan",
										"target"	=> 	"/community/vaughan"
										),
								array(
										"title"		=>	"York Region Community Service Directory (YorkLink)",
										"target"	=> 	"http://www.region.york.on.ca/nr/yorklink/"
										),
								array(
										"title"		=>	"Province of Ontario",
										"target"	=> 	"/community/ontario"
										),
								array(
										"title"		=>	"Government of Canada",
										"target"	=> 	"/community/canada"
										)
							);

	$ret["contact"] =	array(
								array(
										"title"		=>	"Email Librarian",
										"target"	=> 	$home ."/email_librarian"
										),
								array(
										"title"		=>	"Contact Local Branch",
										"target"	=> 	$home ."/libraries"
										),
								array(
										"title"		=>	"Feedback and Suggestions",
										"submenu"	=>	"suggestions",
										"target"	=> 	$home ."/contact/suggestions"
										),
								array(
										"title"		=>	"Accessibility Customer Feedback Form",
										"target"	=> 	$home ."/files/accessibility.pdf"
										)
								);
	$ret["account"] =	array(
									array(
											"title"		=>	"My Library Account",
											"target"	=> 	"https://catalogue.vaughanpl.info/catalogue/auth/login"
											),
									array(
											"title"		=>	"My eBooks Account",
											"target"	=> 	"http://ebooks.vaughanpl.info/en/BANGAuthenticate.dll?Action=AuthCheck&URL=MyAccount.htm"
											)
								);
	$ret["suggestions"] =	array(
								array(
										"title"		=>	"Suggest an Item for Purchase",
										"target"	=> 	$home ."/email_librarian/add/purchase"
										),
								array(
										"title"		=>	"Contact VPL Administration",
										"target"	=> 	$home ."/contact/administration"
										)
								);

	return $ret;
}


?>