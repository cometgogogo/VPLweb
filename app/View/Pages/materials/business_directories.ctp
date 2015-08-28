<?php
include("crumbs.ctp");
include("crumbs_business.ctp");

$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Business Magazines","url"=>"/materials/business_magazines"), array("Title"=>"New Business Arrivals","url"=>"/new_arrivals/view/31"),array("Title"=>"Business Research Help","url"=>"/business_workshop"), array("Title"=>"Email Librarian","url"=>"/email_librarian")))));

$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Business Topics</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="entry">
				<?php //echo $this->Html->image("multilingual/Mag.gif");?>

				<h3><?php echo $this->Html->link("Accounting", "http://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=s&term_1=accounting&match_2=PHRASE&field_2=text&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&theme=vaughan"); ?> </h3><br />

				<h3><?php echo $this->Html->link("Business Directories", "http://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=s&term_1=business&match_2=MUST&field_2=s&term_2=directories&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&theme=vaughan"); ?> </h3><br />

				<h3><?php echo $this->Html->link("Business Planning", "http://catalogue.vaughanpl.info/catalogue/search/query?match_1=PHRASE&field_1=s&term_1=business+planning&match_2=PHRASE&field_2=text&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&theme=vaughan"); ?> </h3><br />

				<h3><?php echo $this->Html->link("Canadian Small Business Law", "http://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=s&term_1=small+business&match_2=MUST&field_2=s&term_2=law+and+legislation&match_3=MUST&field_3=s&term_3=canada&match_4=NOT&field_4=text&theme=vaughan"); ?> </h3><br />

				<h3><?php echo $this->Html->link("Franchising", "http://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=s&term_1=franchises&match_2=PHRASE&field_2=text&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&theme=vaughan"); ?> </h3><br />

				<h3><?php echo $this->Html->link("Importing & Exporting", "http://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=s&term_1=imports&match_2=MUST&field_2=s&term_2=exports&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&theme=vaughan"); ?> </h3><br />


				<h3><?php echo $this->Html->link("Internet Marketing", "http://catalogue.vaughanpl.info/catalogue/search/query?match_1=PHRASE&field_1=s&term_1=internet+marketing&match_2=PHRASE&field_2=text&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&theme=vaughan"); ?> </h3><br />

				<h3><?php echo $this->Html->link("Leadership", "http://catalogue.vaughanpl.info/catalogue/search/query?match_1=MUST&field_1=s&term_1=leadership&match_2=NOT&field_2=s&term_2=fiction&match_3=SHOULD&field_3=text&match_4=NOT&field_4=text&theme=vaughan"); ?> </h3><br />






				<div class="section_end">&nbsp;</div>

			</div>
	</div>
	<div class="closing"></div>
</div>