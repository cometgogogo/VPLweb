<?php $this->Html->addCrumb("Home","/"); ?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Using the Library</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">


		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Membership", "/services/membership"); ?></div>
			How to apply membership and how to apply online.
			<?php //echo $this->Html->link("more", "/services/membership"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Borrowing Materials", "/services/borrowing"); ?></div>
			All about borrowing, returning and renewing materials, placing holds.
			<?php //echo $this->Html->link("more", "/services/borrowing"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Library Services", "/library_services"); ?></div>
			Borrowing notebooks, Internet access, Word processing, web printing, exam proctoring, etc.
			<?php //echo $this->Html->link("more", "/library_services"); ?>
		</div>



		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Library Notification", "/library_notification_requests"); ?></div>
			You may receive your notices from the library by text, email or phone.
			<?php //echo $this->Html->link("more", "/library_notification_requests"); ?>
		</div>

		<div class="directory_entry">
			<div class="name"><?php echo $this->Html->link("Maker Kits", "/services/maker_kit"); ?></div>
			Explore our 9 themed Maker Kits including 3D printing, photography, video, circuitry, music, robotics, K'NEX, coding, and creative design.
			<?php //echo $this->Html->link("more", "/services/maker_kit"); ?>
		</div>



	</div>
	<div class="closing"></div>




</div>