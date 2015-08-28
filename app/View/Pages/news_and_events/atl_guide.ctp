<?php include("crumbs.php");
$html->addCrumb("Publications & Media Room" , "/news_and_events/publications_media");

$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Subscribe to eNewsletter","url"=>"/newsletters/subscribe"), array("Title"=>"Programs & Events","url"=>"/programs"), array("Title"=>"News Releases","url"=>"/news_and_events/press_releases")))));

$relatedContentElements[] = array ('image', array("image"=>array("source"=>"/img/makerkit_sidebar.jpg","width"=>"200", "height"=>"257", "title"=>"Maker Kits", "link"=>"/services/maker_kit", "target"=>"self")));

$this->controller->set('relatedContentElements', $relatedContentElements);
?>



<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Library Program Guide</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<div class="intro">
			Your guide to programs, special events, and using your library.
</div>

<div class="entry">

<div data-configid="1804257/13110814" style="width:600px; height:380px;" class="issuuembed"></div><script type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script> 
<br/><br/>
<div data-configid="1804257/11552410" style="width:600px; height:388px;" class="issuuembed"></div><script type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script> 

		
	<h2>Downloadable in PDF</h2>
			
			<p>
				<?php echo $html->image("/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $html->link("What's On June/July/August", "/files/ATL_summer.pdf", array("rel"=>"external")); ?> (4.67MB)<br />
			</p>
			
			<p>
				<?php echo $html->image("/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $html->link("What's On March/April/May", "/files/ATL_spring.pdf", array("rel"=>"external")); ?> (1.11 MB)<br />
			</p>
	<!--
			<p>
			<?php echo $html->image("/icon-pdf.gif", array("alt"=>"PDF"));?>
			<?php echo $html->link("What's On December/January/February", "/files/ATL_winter.pdf", array("rel"=>"external")); ?> (2.21 MB)<br />
			</p>
			
			
			<p>
				<?php echo $html->image("/icon-pdf.gif", array("alt"=>"PDF"));?>
				<?php echo $html->link("What's On September/October/November", "/files/ATL_fall.pdf", array("rel"=>"external")); ?> (2.38 MB)<br />
			</p> 
			
			
			
			<p>
						<?php echo $html->image("/icon-pdf.gif", array("alt"=>"PDF"));?>
						<?php echo $html->link("What's On  December/January/February - Pleasant Ridge Library ", "/files/ATL_special.pdf", array("rel"=>"external")); ?> (0.57 MB)<br />
			</p>
			
			
			-->
			
			
			</div>

			<div class="session_end">&nbsp;</div>
			<?php echo $this->renderElement('adobe_download'); ?>
		</div>
		&nbsp;
	</div>
	<div class="closing"></div>
</div>