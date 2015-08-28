<?php
include("crumbs.ctp");

$this->Html->addCrumb("Articles & Research" , "/databases");

$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Books for Book Clubs","url"=>"/library_services#club"),array("Title"=>"Book Chat Programs ","url"=>"/programs/index/category/3")))));
$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Online Book Clubs</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="intro">
				Join our Online Book Clubs and start reading books in your email.
		</div>
		<div class="entry">
			<p>
				Each day we'll send you a 5-minute portion of a book. By the end of the week, you'll have read 2-3 chapters.
				If you'd like to finish a book, stop by the library and pick up a copy. Every week a new book is featured.
				<?php echo $this->Html->link("Sign up","http://www.supportlibrary.com/su/su.cfm?x=1245456&g=/nl/users/734/images/Vaughan-logo.gif&cs=004E8E&bt=/nl/users/734/images/Vaughan-signup-home.gif&cb=008F7E",array("rel"=>"external")); ?> today and start reading tomorrow! (Service provided by Chapter-A-Day.com.)
			</p>
		</div>
		<div class="entry">
			<h2>Fiction Book Club</h2>
			<p>
				Our Fiction Book Club features a variety of fiction books.
				One week you might read a pre-release copy of a Tom Clancy book and the next week a mystery by a first-time author.
				You'll be amazed at what you discover in this club.
			</p>
		</div>
		<div class="entry">
			<h2>Non-Fiction Book Club</h2>
			<p>
				Our Non-Fiction Book Club offers a wide variety of real-life stories about people, places, and things,
				with an occasional self-help book. If you prefer reading non-fiction, this is the club for you.
				Every week, you'll discover a new book.
			</p>
		</div>
		<div class="entry">
			<h2>Romance Book Club</h2>
			<p>
				Romance is in the air. Sign up today and tell your friends to sign up too.
				We feature your favorite authors and introduce you to some new ones.
				Everyone needs a little romance and we have it.
			</p>
		</div>
		<div class="entry">
			<h2>Business Book Club</h2>
			<p>
				VPL's Business Book Club delivers the latest ideas in sales, marketing, management, customer service,
				and e-commerce right into your e-mail in-box.
				Start every day with new ideas that you can put to work in your job and your business
				by signing up now to receive short, e-mailed extracts from popular current business book titles.
			</p>
		</div>

		<div class="entry">
			<h2>Mystery Club</h2>
			<p>
				The rich suspense, intertwined characters, thickened plot, and nearly missed clues will keep you coming back for more. Each week you'll enjoy a new and exciting mystery by famous and just-getting-started authors.
			</p>
		</div>

		<div class="entry">
			<h2>Teen Club</h2>
			<p>
				Just for our younger audience- gripping mysteries, wildly hilarious comedies, true adventures, mystical science fiction. And each week a special guest hosts- selected teens from all over the planet share their insights.
			</p>
		</div>

		<!--
		<div class="entry">
			<h2>Good News Club</h2>
			<p>
				Good news! Enjoy our thought-provoking family-friendly daily selections that inspire, make joyful, occasionally sadden, relate to everyman, and cause one to reflect on our place in the cosmos. Join the club today.
			</p>
		</div>

		<div class="entry">
			<h2>SF Club</h2>
			<p>
				Imagination fantastic, wonder and otherworlds, time travel and space continuums-you'll find rich samples delivered direct every other week via yesterday's electronic fantasy medium (otherwise known today as email).
			</p>
		</div>

		<div class="entry">
			<h2>Horror Club</h2>
			<p>
				Come on, don't be afraid. Ghosts...Ghouls... dark things eerie and evil. Come sample a daily horror in our weekly picks- chosen with help from the Horror Writer's Association. Horror books are featured every other week.
			</p>
		</div>

		<div class="entry">
			<h2>Audio Club</h2>
			<p>
				Sit back, relax, listen, and enjoy a daily dose of well-read books from a veritable garden of selections. Every other week you'll hear excerpts from fiction, nonfiction, self-help, business, and more.
			</p>
		</div>

		<div class="entry">
			<h2>Pre-Pub Club</h2>
			<p>
				You're invited! Our book club readers are invited to a sneak preview of hot-off-the-press books. Actually these books aren't even off the press yet! Every other week we'll send an Advanced Reading Copy!
			</p>
		</div>
		-->

		<div class="entry">
		<p><?php echo $this->Html->link("JOIN now","http://www.supportlibrary.com/su/su.cfm?x=1245456&g=/nl/users/734/images/Vaughan-logo.gif&cs=004E8E&bt=/nl/users/734/images/Vaughan-signup-home.gif&cb=008F7E",array("rel"=>"external")); ?>! </p>
		</div>
		&nbsp;

	</div>
	<div class="closing"></div>


</div>