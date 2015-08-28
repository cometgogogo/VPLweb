<!-- Script functions deal with dynamic changes on form according to age changes -->

<div class="bloom_navigation">



	<?php echo $this->Html->link("","/bloom", array("class"=>"bloom_home")); ?>
	<div class="bloom_list">

		<!--<h3>Communities in Bloom</h3>-->
		<a id="bloom_navig_heading" href="/bloom" title="Communities in Bloom"><span class="graphic_link_caption">Communities in Bloom</span></a>

		<a href="/programs/index/category/16">Let&acute;s Get Gardening</a>
		<a href="/bloom/ideas">Fertilize a Few Ideas</a>
		<a href="/links/index/broad_subject/101">Lovely Links</a>
		<a href="/gardening_tips">Seed Your Expertise</a>
		<!--<a href="/bloom_photos">Flaunt Your Flowers</a>-->

		<?php
			$allTips = getTips();

			$desc = displayTip($allTips);

			if (strlen($desc)!=0) {
				if (strlen($desc) > 150) {
					$desc = substr($desc, 0, 150);
					$last_ch = substr($desc, strlen($desc)-1, 1);
					while ($last_ch != " ") {
						$desc = rtrim($desc, $last_ch);
						if (strlen($desc)==1) break;
						$last_ch = substr($desc, strlen($desc)-1, 1);
					}
				}
		?>
		<div id="bloom_tip">Tip of the day:</div>
		<?php
				echo  $desc . "...&nbsp;";
				echo "<a id='bloom_tip_link' href='/bloom/tips'>more</a>";
				echo "<p>&nbsp;</p>";
			}
		?>


		<a id="vaughan_blooms_link" href="http://www.vaughanblooms.ca/" rel="external">My Vaughan Blooms</a>
	</div>

	<div class="closing"></div>



</div>
<?php

function displayTip($allTips) {

	foreach ($allTips["main"] as $content) {
		if ($content['id'] == date("Y-m-d"))
			return  $content["tip"] ;

	}
	return "";

}



function getTips() {
	$ret = array();
	$ret["main"] =	array(array(
						"id"	=>	"2011-05-16",
						"date"	=>	"Monday, May 16",
						"tip"	=>	"Try eating locally and seasonally.  Artificial growing techniques and long transportation burn a great deal of energy.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:503135\">50 Ways to Save the Earth</a> by Anne Jankéliowitch"
				),
				array(
						"id"	=>	"2011-05-15",
						"date"	=>	"Sunday, May 15",
						"tip"	=>	"Try using natural candles that are paraffin free and free of synthetic fragrances, such as beeswax or soy.  Paraffin candles release carcinogenic toxins into the air when burned.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:500901\">Green Babies, Sage Moms: The Ultimate Guide to Raising Your Organic Baby</a> by Lynda Fassa"
				),
				array(
						"id"	=>	"2011-05-14",
						"date"	=>	"Saturday, May 14",
						"tip"	=>	"Why not plant a garden that has meaning? Did you know that there is a language of flowers?  For example red roses mean \"I love you\", white roses mean \"I am worthy of you\", and cabbage roses mean \"ambassador of love\". You can add lilacs for \"the first emotions of love\", chrysanthemums for \"in love\", and red tulips for \"declaration of love\".  Also, carnations for \"pure and deep love\", azaleas for \"romance\" and heliotrope for \"infatuation\". You will end up with not only a beautiful garden but one that speaks to you.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:401609\">A Handful of Flowers (A Romantic Celebration of the Language of Flowers)</a> by Cookie Lee"
				),
				array(
						"id"	=>	"2011-05-13",
						"date"	=>	"Friday, May 13",
						"tip"	=>	"Dead nettles repel potato bugs.  It also improves the growth and flavour of many other vegetables.",
						"src"	=> 	"From <em>Readers Digest 1001 Hints and Tips for Your Garden </em>"
				),
				array(
						"id"	=>	"2011-05-12",
						"date"	=>	"Thursday, May 12",
						"tip"	=>	"If you have pets that go outside in your garden you will want to avoid planting flowers and plants that are harmful to our furry friends. Some of these plants include azaleas, buttercups, cowslips, daffodils, day lilies, foxglove, iris, laurels, lily of the valley, philodendrons, rhododendrons, woody asters, yellow jasmine, and yellow oleander.  For more details on how to protect your pets, refer to the <a href=\"http://www.humanesociety.org/news/news/2011/03/disaster_planning_2011.html\">The Humane Society of the United States</a> website.",
						"src"	=> 	""
				),
				array(
						"id"	=>	"2011-05-11",
						"date"	=>	"Wednesday, May 11",
						"tip"	=>	"Use the library or buy secondhand books.  Share books with friends and donate used ones. The 3 billion new books sold every year use up about 400,000 trees.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:481557\">The Green Book : the Everyday Guide to Saving the Planet One Simple Step at a Time </a> by Elizabeth Rogers and Thomas M. Kostigen"
				),
				array(
						"id"	=>	"2011-05-10",
						"date"	=>	"Tursday, May 10",
						"tip"	=>	"Zap even stubborn weeds with a natural herbicide made of equal parts vinegar and water in a spritzer bottle and spray it over weeds.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:500901\">Green Babies, Sage Moms: The Ultimate Guide to Raising Your Organic Baby</a> by Lynda Fassa"
				),
				array(
						"id"	=>	"2011-05-09",
						"date"	=>	"Monday, May 9",
						"tip"	=>	"Tulips have over 100 species and many hundreds of hybrids. With their wide range of forms and colours, they are divided into fifteen horticultural groups. They look their best in large gardens in mass plantings of one colour but they also make very good container plants.",
						"src"	=> 	"From <em>Flowering Plants for Your Garden</em> edited by Anna Osborn, etc"
				),
				array(
						"id"	=>	"2011-05-08",
						"date"	=>	"Sunday, May 08",
						"tip"	=>	"Save space in your garden by pairing a climbing plant with a sturdy one.  Stalks of sweet corn will support pole beans allowing you to harvest two vegetable crops in a limited garden space.",
						"src"	=> 	"From <em>Readers Digest 1001 Hints and Tips for Your Garden</em>"
				),
				array(
						"id"	=>	"2011-05-07",
						"date"	=>	"Saturday, May 07",
						"tip"	=>	"Support local farmer's and buy food at local farmer's markets.  Not only will the food be fresh, but you are cutting down on pollution from reducing shipping times for food.   For locations and hours, search the Toronto listings at Farmer's Markets Ontario. <a href=\"\">www.foodland.gov.on.ca/english/availability.html</a>",
						"src"	=> 	""
				),
				array(
						"id"	=>	"2011-05-06",
						"date"	=>	"Friday, May 06",
						"tip"	=>	"Are troublesome squirrels eating up your garden? Try sprinkling pickling lime on your plants, since according to Jerry Baker, squirrels hate it.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:432539\">Jerry Baker's Bug Off! : 2,193 Super Secrets for Battling Bad Bugs --Outfoxing Crafty Critters --Evicting Voracious Varmints and Much More!</a> by Jerry Baker"
				),
				array(
						"id"	=>	"2011-05-05",
						"date"	=>	"Thursday, May 05",
						"tip"	=>	"The best alternative to disposable batteries is rechargeable ones. Despite a higher initial purchase price, ultimately they are cheaper because they can be reused more than 100 times.",
						"src"	=> 	"From <em>The Green Pages: Your Everyday Shopping Guide to Environmentally Safe Products</em> by The Bennet Information Group "
				),
				array(
						"id"	=>	"2011-05-04",
						"date"	=>	"Wednesday, May 04",
						"tip"	=>	"Notice a strange bug on your cucumbers, or some mold on your tomatoes?  Even vegetables need a doctor's opinion!",
						"src"	=> 	"From <a href=\"http://vegetablemdonline.ppath.cornell.edu/Home.htm\">Vegetable MD Online</a> by the Department of Plant Pathology at Cornell University  "
				),
				array(
						"id"	=>	"2011-05-03",
						"date"	=>	"Tuesday, May 03",
						"tip"	=>	"In the winter months, turn down the thermostat in your office and home by one degree Celsius and save 10% on your heating bill.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:510388\">Greening Your Office : From Cupboard to Corporation : An A - Z Guide</a> by Jon Clift and Amanda Cuthbert "
				),
				array(
						"id"	=>	"2011-05-02",
						"date"	=>	"Monday, May 02",
						"tip"	=>	"Grow organic food right in your backyard.  You can start small, with one or two vegetables that grow well in the Canadian summers, like tomatoes or zucchini.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:411609\">Organic Kitchen Garden</a> by Juliet Roberts"
				),
				array(
						"id"	=>	"2011-05-01",
						"date"	=>	"Sunday, May 01",
						"tip"	=>	"To keep your lawn looking fresh and attractive, water it before 9:00 am on calm days. Lawns typically need 2.5 cm (1 inch) of water per week - don't forget to take into account any rain that has fallen. Don't cut the lawn lower than 6 to 8 cm. Healthy lawns need nitrogen (1/2 kg of nitrogen per 100 square miles). In addition, don't forget to check if any water restrictions are in effect.",
						"src"	=> 	"From <a href=\"http://www.cmhc-schl.gc.ca/en/co/maho/la/la_006.cfm\">Water Saving Tips For Your Garden</a> by Canada Mortgage and Housing Corporation"
				),
				array(
						"id"	=>	"2011-04-30",
						"date"	=>	"Saturday, April 30",
						"tip"	=>	"Make reusable growing pots for herbs from your recyclables and staff around the house by using anything that can have holes in the bottom.  Possibilities include old children's toys such as sand buckets, old coffee cans, and old shoes and boots.  .",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:177391\">Herb Gardening for Dummies</a> by Karan Davis Cutler and Kathleen Fisher & the editors of the National Gardening Association."
				),
				array(
						"id"	=>	"2011-04-29",
						"date"	=>	"Friday, April 29 ",
						"tip"	=>	"When shopping for children's toys, look for toys that are made of wood instead of plastic.  The creation of these toys is much more environmentally friendly and they are much sturdier than their plastic counterparts.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:500901\">Green Babies, Sage Moms: The Ultimate Guide to Raising Your Organic Baby</a> by Lynda Fassa"
				),
				array(
						"id"	=>	"2011-04-28",
						"date"	=>	"Thursday, April 28",
						"tip"	=>	"Find out about Canadian gardening by reading the magazine \"Canadian Gardening\" magazine, available at five branches of Vaughan Public Libraries.  Or read articles online and read online forums and get a free gardening e-newsletter at: <a href=\"www.canadiangardening.com\">www.canadiangardening.com</a>",
						"src"	=> 	""
				),
				array(
						"id"	=>	"2011-04-27",
						"date"	=>	"Wednesday, April 27",
						"tip"	=>	"Want to connect with other gardeners without leaving the comfort of your own home?  Register for a free Internet gardening forum like <a href=\"http://www.gardenweb.com\">www.gardenweb.com</a> to post questions, and discuss gardening issues",
						"src"	=> 	""
				),
				array(
						"id"	=>	"2011-04-26",
						"date"	=>	"Tuesday, April 26",
						"tip"	=>	"Install a shade plant variety underneath one that loves the sun.  For example, plant sun shy lettuce at the base of cornstalks.",
						"src"	=> 	"From <em>Readers Digest 1001 Hints and Tips for Your Garden</em>"
				),
				array(
						"id"	=>	"2011-04-25",
						"date"	=>	"Monday, April 25",
						"tip"	=>	"Most evergreen shrubs tolerate dry shade condition. A lot of perennials will mingle well with these shrubs in dry, shady borders, such as many types of hostas and ferns.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:377279\">Gardening with Perennials</a> by the editors of Horticulture"
				),
				array(
						"id"	=>	"2011-04-24",
						"date"	=>	"Sunday, April 24",
						"tip"	=>	"When choosing your next clothes washing machine consider a front loading washing machine because they use up to 60% less water, 40% less energy, and 50% less detergent.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:381970\">Greeniology: How to Live Well, Be Green and Make a Difference</a> by Tanya Ha"
				),
				array(
						"id"	=>	"2011-04-23",
						"date"	=>	"Saturday, April 23",
						"tip"	=>	"The best time to water plants is in the early morning as the sun has not had a chance to heat up the air and the ground and there will be the least amount of evaporation.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:255981\">Mark Cullen's Ontario Gardening: How to Get the Most from Your Garden with Canada's Best Selling Gardening Expert</a> by Mark Cullen"
				),
				array(
						"id"	=>	"2011-04-22",
						"date"	=>	"Friday, April 22",
						"tip"	=>	"Support Fair Trade.  Wholesalers pay farmers a premium price for their goods. The farmers then agree to uphold certain social environmental and economic standards.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:497404\">50 Simple Things You Can Do to Save the Earth</a> by John Javna, Sophie Javna and Jesse Javna"
				),
				array(
						"id"	=>	"2011-04-21",
						"date"	=>	"Thursday, April 21",
						"tip"	=>	"When you're designing your garden, take into account how much time you will have to maintain it, as this will help to determine the kinds of plants you should use.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:501018\"> Low Maintenance Garden</a> by Jenny Hendy"
				),
				array(
						"id"	=>	"2011-04-20",
						"date"	=>	"Wednesday, April 20",
						"tip"	=>	"Find alternatives to gas powered lawn mowers. A gasoline lawn mower running for a year can produce the same amount of pollution as 40 cars on the road for a year.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:500771\">You Can Save the Planet: 50 Ways You Can Make a Difference</a> by Jacquie Wines"
				),
				array(
						"id"	=>	"2011-04-19",
						"date"	=>	"Tuesday, April 19",
						"tip"	=>	"In Canada, we use a hardiness system for plants that was developed by agriculture Canada.  Since different plants grow in different zones, look for plants that grow well in zone 5B, which includes Vaughan.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:225441\">The New Ontario Gardener</a> by Trevor Cole"
				),
				array(
						"id"	=>	"2011-04-18",
						"date"	=>	"Monday, April 18",
						"tip"	=>	"Flush the toilet one less time per day.  This will save about 15 litres of water.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:481557\">The Green Book : the Everyday Guide to Saving the Planet One Simple Step at a Time</a> by Elizabeth Rogers and Thomas M. Kostigen"
				),
				array(
						"id"	=>	"2011-04-17",
						"date"	=>	"Sunday, April 17",
						"tip"	=>	"Using a wide variety of plants, creating stable ecosystems and encouraging beneficial predators and parasites will help to control pests and diseases in a garden and reduce the need for pesticides. ",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:259385\">Go Organic!</a> by Bob Flowerdew"
				),
				array(
						"id"	=>	"2011-04-16",
						"date"	=>	"Saturday, April 16",
						"tip"	=>	"Set your water heater to 50 degrees Celsius instead of the average 60 degrees, and save 10% on this energy cost.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:492300\">Big Green Purse : Use Your Spending Power to Create a Cleaner, Greener World</a> by Diane MacEachern"
				),
				array(
						"id"	=>	"2011-04-15",
						"date"	=>	"Friday, April 15",
						"tip"	=>	"Plant green beans next to eggplants.  The beans deter the Colorado potato beetle that likes to feed off of eggplants",
						"src"	=> 	"From <em>Readers Digest 1001 Hints and Tips for Your Garden </em>"
				),
				array(
						"id"	=>	"2011-04-14",
						"date"	=>	"Thursday, April 14",
						"tip"	=>	"Gift wrapping paper gloss and sheen are highly toxic. Consider colorful magazine pages, discarded book pages or old maps, which is super-economical and much more environmentally friendly! ",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:500901\">Green Babies, Sage Moms: The Ultimate Guide to Raising Your Organic Baby</a> by Lynda Fassa"
						),
				array(
						"id"	=>	"2011-04-13",
						"date"	=>	"Wednesday, April 13",
						"tip"	=>	"Here are some useful tips to help you rid your lawn of dandelions without using harmful chemicals.  Use a tool called a dandelion digger to root them out. Pour boiling water over them for two or three days. Apply corn gluten meal four to six weeks before the dandelions germinate and continue into the growing season. Mow your lawn frequently when dandelions are in bloom to prevent the blossoms from growing into seeds.",
						"src"	=> 	"From <a href=\"http://www.plantea.com/dandelions.htm\">Seven Ways to Get Rid of Dandelions - Organically</a> by Marion Owen"
				),
				array(
						"id"	=>	"2011-04-12",
						"date"	=>	"Tuesday, April 12",
						"tip"	=>	"To keep your garden looking beautiful, prepare your soil properly and mulch with soft wood bark.  Plan your colours in advance and use multiple quantities of the same plants.  Water your garden once a week and add two centimetres of compost a year.  ",
						"src"	=> 	"From <a href=\"http://www.ontariogardening.com/magazine/detail.jsp?ID=87\">Mark Cullen's Top 10 Tips for Improving Your Garden in 2008</a>"
				),
				array(
						"id"	=>	"2011-04-11",
						"date"	=>	"Monday, April 11",
						"tip"	=>	"You may need to remove turf and dig the ground if you are working on an area that hasn't been cultivated before. This is best done in the fall.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:269725\">Organic kitchen gardening: a guide to growing produce in small urban areas</a> by Barbara Segall"
				),
				array(
						"id"	=>	"2011-04-10",
						"date"	=>	"Sunday, April 10",
						"tip"	=>	"If you would like to attract wildlife to your garden try these helpful tips. Planting colourful scented flowers will attract hummingbirds and butterflies. A birdhouse and a butterfly house will encourage birds and butterflies to linger a while longer.  Shrubbery will make a good home for the birds as well as small animals.  If you have a pond be sure to put in water plants - this will attract insects for frogs and turtles.  A rock pile near the pond will be a good refuge for those frogs and turtles.  In addition, keep your garden organic for the health of your animal and bird visitors.",
						"src"	=> 	"From <a href=\"http://www.canadiangardening.com/how-to/wildlife/10-tips-to-attract-wildlife-in-the-garden/a/1471\">10 Tips to Attract Wildlife In the Garden</a> by Canadian Gardening"
				),
				array(
						"id"	=>	"2011-04-09",
						"date"	=>	"Saturday, April 9",
						"tip"	=>	"To encourage birds to flock to your garden plant trees such as Sweet Cherry, Mountain Ash, White Birch, Maple and Oak. Hummingbirds are attracted to Gladioli, Bleeding Heart, Morning Glories, Petunias, Honeysuckle, and Zinnias while Goldfinches prefer White Birch. A birdbath and a birdfeeder will encourage birds to keep coming back. Not only do birds bring beauty and song to a garden they also help control the insect population",
						"src"	=> 	"From <a href=\"http://www.landscapeontario.com/main.php?m=155\">Sowing Grass Seed</a> by Landscape Ontario Horticultural Trade Association"
				),
				array(
						"id"	=>	"2011-04-08",
						"date"	=>	"Friday, April 8",
						"tip"	=>	"Many common household cleaners are toxic and can cause many health problems. Instead, try using baking soda to deodorize carpets, in garbage pails to absorb odors, and use with lemon juice as a white wash.  Use diluted vinegar as a glass cleaner.  It is the best glass cleaner in the world!",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:500901\">Green Babies, Sage Moms: The Ultimate Guide to Raising Your Organic Baby</a> by Lynda Fassa"
				),
				array(
						"id"	=>	"2011-04-07",
						"date"	=>	"Thursday, April 7",
						"tip"	=>	"Use a traffic light system for office machines; green for machines that can be turned off when not in use, amber for machines that can be turned off at the end of the day, and red for machines that must remain on at all times.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:510388\">Greening Your Office: From Cupboard to Corporation: An A - Z Guide</a> by Jon Clift and Amanda Cuthbert"
				),
				array(
						"id"	=>	"2011-04-06",
						"date"	=>	"Wednesday, April 6",
						"tip"	=>	"Plant mint between cabbages to discourage caterpillars and other pests.",
						"src"	=> 	"From <em>Readers Digest 1001 Hints and Tips for Your Garden</em>"
						),
				array(
						"id"	=>	"2011-04-05",
						"date"	=>	"Tuesday, April 5",
						"tip"	=>	"In order to save trees, print on both sides of the paper and use non-confidential waste paper for scrap.",
						"src"	=> 	"From <a href=\"http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:503135\">50 Ways to Save the Earth</a> by Anne Jankeliowitch"
				)
			);


	return $ret;
}
?>