<?php
$this->Html->addCrumb("Home" , "/");
$this->Html->addCrumb("Books & Resources" , "/materials");
$this->Html->addCrumb("Articles & Research" , "/databases");

$this->pageTitle = $database["Database"]["Name"];

?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Articles & Research</h1>
	</div>
	<div class="closing"></div>
</div>



<div id="page_content">
	<div class="opening"></div>
	<div class="details">


		<!--<div class="intro">

		<p>
			Due to the system upgrading, the access to VPL's databases will be temporarily unavailable as of 9:00am on Friday, June 18. Thank you for your patience!
		</p>

		</div>
-->

		<div class="entry">

		Vaughan Public Libraries subscribe to a number of high-quality electronic databases providing a wealth of
		information on a wide range of subjects.

		</div>


	<?php
	if (!isset($database["Database"]["Name"]) || $database["Database"]["Name"]=="") {
	?>
	<p>The database you searched is not available in our library. Please <a href="/databases">try a different one</a>.</p>
	<?php
	} else {

	?>



		<h2><?php echo $database["Database"]["Name"]; ?></h2>
		<p>
		<?php
			echo $database["Database"]["Description"];
		?>
		</p>


		<?php
		if ($database['Database']['Name'] == "College Courses") {
		?>
		<div class="entry">

		<div class="ocw_widget" id="ocw_widget"><div id="ocw_header"><img src="http://Statestats.org/ocwwidget/images/owl_logo.png" alt="owl logo image"/>College Courses<div class="txt_orange">Find free online courses at top universities like MIT, Notre Dame, UC Irvine &amp; more</div></div>
		<ul id="owc_cat_art">
		<li><a href="http://statestats.org/free-courses-search/?cat_id=6" target="_blank">Art</a></li>
		</ul>
		<ul id="owc_cat_bus">
		<li>
		<a href="http://statestats.org/free-courses-search/?cat_id=8" target="_blank">Business</a></li>
		</ul>
		<ul id="owc_cat_com">
		<li><a href="http://statestats.org/free-courses-search/?cat_id=1" target="_blank">Computers &amp; Eng.</a></li>
		</ul>
		<ul id="owc_cat_hea">
		<li><a href="http://statestats.org/free-courses-search/?cat_id=7" target="_blank">Health &amp; Medical</a></li>
		</ul>
		<ul id="owc_cat_hum">
		<li><a href="http://statestats.org/free-courses-search/?cat_id=2" target="_blank">Humanities</a></li>
		</ul>
		<ul id="owc_cat_mat">
		<li><a href="http://statestats.org/free-courses-search/?cat_id=3" target="_blank">Mathematics</a></li>
		</ul>
		<ul id="owc_cat_sci">
		<li><a href="http://statestats.org/free-courses-search/?cat_id=5" target="_blank">Sciences</a></li>
		</ul>
		<ul id="owc_cat_soc">
		<li><a href="http://statestats.org/free-courses-search/?cat_id=4" target="_blank">Social Sciences</a></li>
		</ul>

		<div id="ocw_footer">Courtesy of <a id="courtesy_url1" href ="http://www.statestats.org" target="_blank">Statestats.org</a></div><script type="text/javascript" id="widgetscr" src="http://statestats.org/ocwwidget/main.js"></script>
		</div>
		<?php

		} else {
			echo "<p>";
			echo $this->Html->link($database['Database']['Availability'], $database['Database']['URL'], array("rel"=>"external"));
			echo "</p>";

			if ($database['Database']['Name'] == "Chapter-A-Day") {
			?>

		<div class="entry">
			<h3>Fiction Book Club</h3>
			<p>
				Our Fiction Book Club features a variety of fiction books.
				One week you might read a pre-release copy of a Tom Clancy book and the next week a mystery by a first-time author.
				You'll be amazed at what you discover in this club.
			</p>
		</div>
		<div class="entry">
			<h3>Non-Fiction Book Club</h3>
			<p>
				Our Non-Fiction Book Club offers a wide variety of real-life stories about people, places, and things,
				with an occasional self-help book. If you prefer reading non-fiction, this is the club for you.
				Every week, you'll discover a new book.
			</p>
		</div>
		<div class="entry">
			<h3>Romance Book Club</h3>
			<p>
				Romance is in the air. Sign up today and tell your friends to sign up too.
				We feature your favorite authors and introduce you to some new ones.
				Everyone needs a little romance and we have it.
			</p>
		</div>
		<div class="entry">
			<h3>Business Book Club</h3>
			<p>
				VPL's Business Book Club delivers the latest ideas in sales, marketing, management, customer service,
				and e-commerce right into your e-mail in-box.
				Start every day with new ideas that you can put to work in your job and your business
				by signing up now to receive short, e-mailed extracts from popular current business book titles.
			</p>
		</div>

		<div class="entry">
			<h3>Mystery Club</h3>
			<p>
				The rich suspense, intertwined characters, thickened plot, and nearly missed clues will keep you coming back for more. Each week you'll enjoy a new and exciting mystery by famous and just-getting-started authors.
			</p>
		</div>

		<div class="entry">
			<h3>Teen Club</h3>
			<p>
				Just for our younger audience- gripping mysteries, wildly hilarious comedies, true adventures, mystical science fiction. And each week a special guest hosts- selected teens from all over the planet share their insights.
			</p>
		</div>

			<?php
			}

		}
		?>
		<br/><br/>

	<?php if ($database['Database']['Help']) { ?>

<a href="javascript:var newwindow=window.open('<?php echo '/files/dbhelp' . $database['Database']['Help']; ?>','popuppage','width=500,height=600,top=100,left=350, scrollbars=yes'); if (window.focus) {newwindow.focus();}">How to search ...</a>

	<?php }?>
		<br/>

		&nbsp;
<?php } ?>
	</div>
	<div class="closing"></div>
</div>


