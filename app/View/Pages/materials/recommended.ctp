<?php include("crumbs.ctp"); ?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Recommended Reads</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="intro">
			Looking for something good to read? Try some of these:
		</div>
		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("For Your Leisure", "/leisure/"); ?></div>
			Not sure what to do at your leisure? Check out VPL's new blog For Your Leisure! 
			<?php // echo $this->Html->link("more", "/leisure/"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("New Arrivals", "/new_arrivals"); ?></div>
			Check out newly arrived books and DVDs in Vaughan Public Libraries!
			<?php //echo $this->Html->link("more", "/new_arrivals"); ?>
		</div>
		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Just Returned", "/just_returned"); ?></div>
			Interested in what others have been borrowing? See what other people have just returned to the library!
			<?php //echo $this->Html->link("more", "/just_returned"); ?>
		</div>
		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("The Bookshelf @ goodreads", "http://www.goodreads.com/review/list/2426602-vaughanpl", array("rel"=>"external")); ?></div>
			Having trouble finding a good book but are interested in a specific theme? Take a look at our Bookshelf!
			<?php //echo $this->Html->link("more", "http://www.goodreads.com/review/list/2426602-vaughanpl", array("rel"=>"external")); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Award Winners", "/awards"); ?></div>
			VPL has many award-winning titles in its collection representing major literary awards.
			<?php //echo $this->Html->link("more", "/awards"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Bestseller Lists", "/bestsellers"); ?></div>
			The most recommended fiction and non-fiction bestsellers of the season!
			<?php //echo $this->Html->link("more", "/bestsellers"); ?>
		</div>


		
		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Your Next 5 Reads", "/next_reads"); ?></div>
			Not sure what to read next? We can help! Let us suggest your next 5 reads.
			<?php //echo $this->Html->link("more", "/next_reads"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("NextReads Newsletters", "materials/next_reads"); ?></div>
			The library sends periodic topical newsletters regularly, select any newsletters you would like to receive! 
			
			
		</div>
	


		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Online Book Clubs", "/databases/view/chapter"); ?></div>
			Join our online Fiction, Non-Fiction, Romance, or Business Book Clubs and start reading books in your email.
			<?php //echo $this->Html->link("more", "/databases/view/chapter"); ?>
		</div>

	</div>
	<div class="closing"></div>




</div>