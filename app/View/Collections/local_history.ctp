<?php include("crumbs.php"); ?>	


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Villages to City</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<div class="intro">
		</div>
		<div class="entry">
		
			<p>
				VPL's first digital local studies project is <?php echo $html->link("Villages to City", "http://images.ourontario.ca/vaughan/"); ?>, an oral history of life in Vaughan.  Listen to the stories of Vaughan residents as they are interviewed by volunteers.  All interviews can be listened to in mp3 format and many have also been transcribed.  Villages to City was created with the support of the Government of Ontario through the Programs and Services Branch of the Ministry of Culture and is hosted by OurOntario.ca.
			</p>
			<?php echo $this->renderElement('adobe_download'); ?>
			
			<style media="screen" type="text/css">
			    @import "http://www.OurOntario.ca/portlets/_common/minisearch.css";
			    form.minisearch-oo h4 {background: transparent url("https://data.ourontario.ca/Partners/vpl/Graphics/Searchtile2_VPL_s_105.jpg") no-repeat top left;}
			</style>
			<form class="minisearch minisearch-oo" method="get" action="http://images.ourontario.ca/vaughan/results.asp">
			   <h4>Vaughan Public Libraries Local Studies</h4>
			   <fieldset>
			      <input class="minisearch" size="30" name="q" type="text" /><input alt="submit" src="http://www.OurOntario.ca/portlets/_common/minisearch_button.jpg" class="minisubmit" value="submit" type="image" />
			      <p>Vaughan Public Libraries' Local Studies Collection includes information about the community, geography and history of the city of Vaughan. The first digital material is Villages to City, an oral history project created with the support of the Government of Ontario through the Programs and Services Branch of the Ministry of Culture. <a href="http://images.ourontario.ca/vaughan/search.asp"> Visit our site</a></p>
			   </fieldset>
			</form>

		</div>
		&nbsp;
	</div>
	<div class="closing"></div>
</div>