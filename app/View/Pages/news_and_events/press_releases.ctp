<?php include("crumbs.ctp");
$this->Html->addCrumb("Publications & Media Room" , "/news_and_events/publications_media");

$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Subscribe to eNewsletter","url"=>"/newsletters/subscribe"), array("Title"=>"Programs & Events","url"=>"/programs"), array("Title"=>"Library Program Guide","url"=>"/news_and_events/atl_guide")))));
$relatedContentElements[1] = array ('image', array("image"=>array("source"=>"/img/makerkit_sidebar.jpg","width"=>"200", "height"=>"257", "title"=>"Maker Kits", "link"=>"/services/maker_kit", "target"=>"self")));

$relatedContentElements[2] = array ('tweets');

$this->set('relatedContentElements', $relatedContentElements);
	?>

<script language="javascript" type="text/javascript">
	function toggleMin(id){
		var style = document.getElementById(id).style;
		style.display = (style.display=="block") ? "none":"block";
	}
</script>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>News Releases</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="entry">

		<h2>Recent News Releases</h2>
		
				<!--
				<h3>December 02, 2014</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Vaughan Public Libraries Celebrates the Grand Re-Opening of the Newly Renovated Kleinburg Library, December 8 at 1 P.M.", "/files/news/news120214.pdf", array("rel"=>"external")); ?> (69KB)<br /><br />
				<div class="section_end">&nbsp;</div>
				-->
				
				<h3>February 05, 2015</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Kleinburg Library Re-Opens on Saturday, February 7 at 1 p.m.", "/files/news/news020515.pdf", array("rel"=>"external")); ?> (43KB)<br /><br />
				<div class="section_end">&nbsp;</div>

				<h3>January 27, 2015</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Vaughan Public Libraries (VPL) Kicks off Black History Month with
				A Special Musician Visit by Njacko Backo", "/files/news/news012715.pdf", array("rel"=>"external")); ?> (69KB)<br /><br />
				<div class="section_end">&nbsp;</div>
				
				<h3>January 13, 2015</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Vaughan Public Libraries Presents the 11th Annual Free Family Literacy Day Celebration at the City Playhouse Theatre, Thursday, Jan. 22", "/files/news/news011315.pdf", array("rel"=>"external")); ?> (67KB)<br /><br />
				<div class="section_end">&nbsp;</div>
				
				<h3>December 16, 2014</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Pleasant Ridge Library Opens December 20, 10 A.M. North Thornhill Community Centre 300 Pleasant Ridge Avenue", "/files/news/news121614.pdf", array("rel"=>"external")); ?> (61KB)<br /><br />
				<div class="section_end">&nbsp;</div>

				<h3>November 26, 2014</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Vaughan Public Libraries Accepts Food for Fines Donate non-perishable items to lower your fines between December 1 to 14", "/files/news/news112614.pdf", array("rel"=>"external")); ?> (50KB)<br /><br />
				<div class="section_end">&nbsp;</div>
				
				<h3>October 09, 2014</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Vaughan Public Libraries Celebrates Teen Achievements at The 2014 Teen Awards Ceremony", "/files/news/news100914.pdf", array("rel"=>"external")); ?> (69KB)<br /><br />
				<div class="section_end">&nbsp;</div>	
				
				<h3>September 10, 2014</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Vaughan Public Libraries Hosts Its First Ever Bookfest", "/files/news/news091014.pdf", array("rel"=>"external")); ?> (314KB)<br /><br />
				<div class="section_end">&nbsp;</div>	
				
				<h3>August 27, 2014</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Get Ready for School with the Help of Vaughan Public Libraries", "/files/news/news082714.pdf", array("rel"=>"external")); ?> (50KB)<br /><br />
				<div class="section_end">&nbsp;</div>		
		
				<h3>June 06, 2014</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Eureka! Be Dreamers of Dreams and Makers of Worlds with the TD Summer Reading Club at Vaughan Public Libraries", "/files/news/news060614.pdf", array("rel"=>"external")); ?> (288KB)<br /><br />
				<div class="section_end">&nbsp;</div>
				
				<h3>June 03, 2014</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Pleasant Ridge Library Topping Off Ceremony Friday, June 6 at 5:30 p.m.", "/files/news/news060314.pdf", array("rel"=>"external")); ?> (246KB)<br /><br />
				<div class="section_end">&nbsp;</div>
				
				<h3>May 21, 2014</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link(" Vaughan Public Libraries (VPL) extends library hours for customers' convenience", "/files/news/news052114.pdf", array("rel"=>"external")); ?> (197KB)<br /><br />
				<div class="section_end">&nbsp;</div>
				
				<h3>April 14, 2014</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Dufferin Clark Library Closing for Renovations starting on April 21 and reopening on May 6 at 10 a.m.", "/files/news/news041414.pdf", array("rel"=>"external")); ?> (133KB)<br /><br />
				<div class="section_end">&nbsp;</div>
				
				<h3>March 19, 2014</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Vaughan Public Libraries (VPL) Partners with Kids' CBC To Host a Free Storytime Event Featuring Patty and BOOKABOO, March 29", "/files/news/news031914.pdf", array("rel"=>"external")); ?> (194KB)<br /><br />
				<div class="section_end">&nbsp;</div>
		
				<h3>February 28, 2014</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Join Vaughan Public Libraries (VPL) for ROCKgarden Party - An Interactive Children's Musical by Little Fingers Music, March 11 at Woodbridge Library", "/files/news/news022814.pdf", array("rel"=>"external")); ?> (206KB)<br /><br />
				<div class="section_end">&nbsp;</div>
				
				<h3>January 29, 2014</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Vaughan Public Libraries (VPL) Kicks-off Black History Month with Renowned Author and Master Storyteller - Dr. Rita Cox", "/files/news/news012914.pdf", array("rel"=>"external")); ?> (90KB)<br /><br />
				<div class="section_end">&nbsp;</div>
				
				<h3>January 13, 2014</h3>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("Vaughan Public Libraries (VPL) Presents the 10th Annual FREE Family Literacy Day at the City Playhouse Theatre, Thursday, Jan. 23.", "/files/news/news011314.pdf", array("rel"=>"external")); ?> (61KB)<br /><br />
				<div class="section_end">&nbsp;</div>





			<?php echo $this->element('adobe_download'); ?>
</div>
	</div>
	<div class="closing"></div>
</div>