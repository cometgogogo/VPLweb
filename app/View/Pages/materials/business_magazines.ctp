<?php
include("crumbs.ctp");
include("crumbs_business.ctp");

$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Business Topics","url"=>"/materials/business_directories"), array("Title"=>"New Business Arrivals","url"=>"/new_arrivals/view/31"),array("Title"=>"Business Research Help","url"=>"/business_workshop"), array("Title"=>"Email Librarian","url"=>"/email_librarian")))));

$this->set('relatedContentElements', $relatedContentElements);
?>
<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Business Magazines</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="entry">
				<?php //echo $this->Html->image("multilingual/Mag.gif");?>

				<h3><?php echo $this->Html->link("Bloomberg Business Week", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:579258&theme=vaughan"); ?> </h3><br />
				<h3><?php echo $this->Html->link("CA Magazine", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:186573&theme=vaughan"); ?> </h3><br />
				<h3><?php echo $this->Html->link("Canadian Business", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:16508&theme=vaughan"); ?> </h3><br />
				<h3><?php echo $this->Html->link("Canadian Moneysaver", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:26581&theme=vaughan"); ?> </h3><br />
				<h3><?php echo $this->Html->link("Consumer Reports", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:588041&theme=vaughan"); ?> </h3><br />
				<h3><?php echo $this->Html->link("The Economist", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:26148&theme=vaughan"); ?> </h3><br />
				<h3><?php echo $this->Html->link("Focus", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:587097&theme=vaughan"); ?> </h3><br />

				<h3><?php echo $this->Html->link("Forbes", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:191381&theme=vaughan"); ?> </h3><br />
				<h3><?php echo $this->Html->link("Fortune", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:186557&theme=vaughan"); ?> </h3><br />
				<h3><?php echo $this->Html->link("Franchise Canada", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:425805&theme=vaughan"); ?> </h3><br />
				<h3><?php echo $this->Html->link("Futurist", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:27700&theme=vaughan"); ?> </h3><br />
				<h3><?php echo $this->Html->link("Harvard Business Review", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:27074&theme=vaughan"); ?> </h3><br />
				<h3><?php echo $this->Html->link("Home Business", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:235846&theme=vaughan"); ?> </h3><br />

				<h3><?php echo $this->Html->link("Inc.", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:312239&theme=vaughan"); ?> </h3><br />
				<h3><?php echo $this->Html->link("MoneyLetter", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:186592&theme=vaughan"); ?> </h3><br />
				<h3><?php echo $this->Html->link("MoneySense", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:167350&theme=vaughan"); ?> </h3><br />
				<h3><?php echo $this->Html->link("Smart Money", "http://catalogue.vaughanpl.info/catalogue/lib/item?id=chamo:315508&theme=vaughan"); ?> </h3><br />



				<div class="section_end">&nbsp;</div>

			</div>
	</div>
	<div class="closing"></div>
</div>