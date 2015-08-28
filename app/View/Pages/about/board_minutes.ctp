<?php include("crumbs.ctp");

$this->Html->addCrumb("Library Board" , "/about/board");
 ?>
<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Library Board","url"=>"/about/board"),array("Title"=>"Deputation to the Board Form","url"=>"/about/board_deputation"),array("Title"=>"Board Member Story","url"=>"/news_and_events/news")))));
	$this->set('relatedContentElements', $relatedContentElements);


?>

<!-- Script functions deal with dynamic changes on form according to age changes -->
<script language="javascript" type="text/javascript">
	function toggleMin(id){
		var style = document.getElementById(id).style;
		style.display = (style.display=="block") ? "none":"block";
	}
</script>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Vaughan Public Library Board Meeting Minutes</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="section_end">&nbsp;</div>
		<div class="entry">

			<p>All Board meetings are open to the public.</p>

			<p>Members of the public wishing to attend are advised to call the Administration Office
			at (905) 653-READ (7323) the week of the Board meeting to confirm date and location.</p>
			
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("March 19, 2015 Meeting Minutes", "/files/board_minutes/minutes031915.pdf", array("rel"=>"external")); ?> (164 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			
						<p>
							<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
							<?php echo $this->Html->link("February 26, 2015 Meeting Minutes", "/files/board_minutes/minutes022615.pdf", array("rel"=>"external")); ?> (171 KB)<br />
							<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("December 18, 2014 Meeting Minutes", "/files/board_minutes/minutes121814.pdf", array("rel"=>"external")); ?> (45 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("November 20, 2014 Meeting Minutes", "/files/board_minutes/minutes112014.pdf", array("rel"=>"external")); ?> (177 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>			
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("October 23, 2014 Meeting Minutes", "/files/board_minutes/minutes102314.pdf", array("rel"=>"external")); ?> (72 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("September 18, 2014 Meeting Minutes", "/files/board_minutes/minutes091814.pdf", array("rel"=>"external")); ?> (208 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("June 19, 2014 Meeting Minutes", "/files/board_minutes/minutes061914.pdf", array("rel"=>"external")); ?> (224 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("May 22, 2014 Meeting Minutes", "/files/board_minutes/minutes052214.pdf", array("rel"=>"external")); ?> (216 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("April 14, 2014 Meeting Minutes", "/files/board_minutes/minutes042414.pdf", array("rel"=>"external")); ?> (219 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("March 20, 2014 Meeting Minutes", "/files/board_minutes/minutes032014.pdf", array("rel"=>"external")); ?> (173 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("February 20, 2014 Meeting Minutes", "/files/board_minutes/minutes022014.pdf", array("rel"=>"external")); ?> (180 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("January 16, 2014 Meeting Minutes", "/files/board_minutes/minutes011614.pdf", array("rel"=>"external")); ?> (174 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<br/>
			<?php echo $this->element('adobe_download'); ?>
			
		<h2><a href="javascript:toggleMin('2013min')">2013 Minutes</h2>
		<div id="2013min" class="entry" style="display: none">
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("December 19, 2013 Meeting Minutes", "/files/board_minutes/minutes121913.pdf", array("rel"=>"external")); ?> (45 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("November 21, 2013 Meeting Minutes", "/files/board_minutes/minutes112113.pdf", array("rel"=>"external")); ?> (193 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("October 17, 2013 Meeting Minutes", "/files/board_minutes/minutes101713.pdf", array("rel"=>"external")); ?> (184 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("September 12, 2013 Meeting Minutes", "/files/board_minutes/minutes091213.pdf", array("rel"=>"external")); ?> (40 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("June 20, 2013 Meeting Minutes", "/files/board_minutes/minutes062013.pdf", array("rel"=>"external")); ?> (185 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("May 16, 2013 Meeting Minutes", "/files/board_minutes/minutes051613.pdf", array("rel"=>"external")); ?> (225 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("April 18, 2013 Meeting Minutes", "/files/board_minutes/minutes041813.pdf", array("rel"=>"external")); ?> (189 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("March 21, 2013 Meeting Minutes", "/files/board_minutes/minutes032113.pdf", array("rel"=>"external")); ?> (38 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("February 21, 2013 Meeting Minutes", "/files/board_minutes/minutes022113.pdf", array("rel"=>"external")); ?> (19 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("January 17, 2013 Meeting Minutes", "/files/board_minutes/minutes011713.pdf", array("rel"=>"external")); ?> (34 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			</div>
		

				<h2><a href="javascript:toggleMin('2012min')">2012 Minutes</h2>
		<div id="2012min" class="entry" style="display: none">
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("November 15, 2012 Meeting Minutes", "/files/board_minutes/minutes111512.pdf", array("rel"=>"external")); ?> (57 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("June 27, 2012 Meeting Minutes", "/files/board_minutes/minutes062712.pdf", array("rel"=>"external")); ?> (57 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("May 17, 2012 Meeting Minutes", "/files/board_minutes/minutes051712.pdf", array("rel"=>"external")); ?> (56 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("April 19, 2012 Meeting Minutes", "/files/board_minutes/minutes041912.pdf", array("rel"=>"external")); ?> (52 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("March 22, 2012 Meeting Minutes", "/files/board_minutes/minutes032212.pdf", array("rel"=>"external")); ?> (49 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("February 16, 2012 Meeting Minutes", "/files/board_minutes/minutes021612.pdf", array("rel"=>"external")); ?> (62 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("January 19, 2012 Meeting Minutes", "/files/board_minutes/minutes011912.pdf", array("rel"=>"external")); ?> (63 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

</div>
	<h2><a href="javascript:toggleMin('2011min')">2011 Minutes</h2>
		<div id="2011min" class="entry" style="display: none">
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("December 15, 2011 Meeting Minutes", "/files/board_minutes/minutes121511.pdf", array("rel"=>"external")); ?> (43 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>



			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("November 17, 2011 Meeting Minutes", "/files/board_minutes/minutes111711.pdf", array("rel"=>"external")); ?> (59 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("October 27, 2011 Meeting Minutes", "/files/board_minutes/minutes102711.pdf", array("rel"=>"external")); ?> (59 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("September 15, 2011 Meeting Minutes", "/files/board_minutes/minutes091511.pdf", array("rel"=>"external")); ?> (69 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>


			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("June 16, 2011 Meeting Minutes", "/files/board_minutes/minutes061611.pdf", array("rel"=>"external")); ?> (66 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link("May 19, 2011 Meeting Minutes", "/files/board_minutes/minutes051911.pdf", array("rel"=>"external")); ?> (60 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link(" April 14, 2011 Meeting Minutes", "/files/board_minutes/minutes041411.pdf", array("rel"=>"external")); ?> (57 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link(" March 24, 2011 Meeting Minutes", "/files/board_minutes/minutes032411.pdf", array("rel"=>"external")); ?> (73 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link(" February 17, 2011 Meeting Minutes", "/files/board_minutes/minutes021711.pdf", array("rel"=>"external")); ?> (53 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"PDF"));?>
				<?php echo $this->Html->link(" January 20, 2011 Meeting Minutes", "/files/board_minutes/minutes012011.pdf", array("rel"=>"external")); ?> (58 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

		</div>


			<!--h2><a href="javascript:toggleMin('2010min')">2010 Minutes</h2>
		<div id="2010min" class="entry" style="display: none">
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"Board Minutes December 16, 2010"));?>
				<?php echo $this->Html->link("December 16, 2010", "/files/board_minutes/minutes121610.pdf", array("rel"=>"external")); ?> (63 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"Board Minutes November 18, 2010"));?>
				<?php echo $this->Html->link("November 18, 2010", "/files/board_minutes/minutes111810.pdf", array("rel"=>"external")); ?> (65 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes October 21, 2010"));?>
				<?php echo $this->Html->link("October 21, 2010", "/files/board_minutes/minutes102110.pdf", array("rel"=>"external")); ?> (49 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"Board Minutes September 16, 2010"));?>
				<?php echo $this->Html->link("September 16, 2010", "/files/board_minutes/minutes091610.pdf", array("rel"=>"external")); ?> (60 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes June 17, 2010"));?>
				<?php echo $this->Html->link("June 17, 2010", "/files/board_minutes/minutes061710.pdf", array("rel"=>"external")); ?> (63 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"Board Minutes May 27, 2010"));?>
				<?php echo $this->Html->link("May 27, 2010", "/files/board_minutes/minutes052710.pdf", array("rel"=>"external")); ?> (49 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"Board Minutes April 22, 2010"));?>
				<?php echo $this->Html->link("April 22, 2010", "/files/board_minutes/minutes042210.pdf", array("rel"=>"external")); ?> (64 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes March 18, 2010"));?>
				<?php echo $this->Html->link("March 18, 2010", "/files/board_minutes/minutes031810.pdf", array("rel"=>"external")); ?> (63 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"Board Minutes Februray 18, 2010"));?>
				<?php echo $this->Html->link("February 18, 2010", "/files/board_minutes/minutes021810.pdf", array("rel"=>"external")); ?> (76 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif",array("alt"=>"Board Minutes January 21, 2010"));?>
				<?php echo $this->Html->link("January 21, 2010", "/files/board_minutes/minutes012110.pdf", array("rel"=>"external")); ?> (67 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
		</div -->
		<!--
		<h2><a href="javascript:toggleMin('2009min')">2009 Minutes</h2>
		<div id="2009min" class="entry" style="display: none">

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("December 17, 2009", "/files/board_minutes/minutes121709.pdf", array("rel"=>"external")); ?> (64 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("November 19, 2009", "/files/board_minutes/minutes111909.pdf", array("rel"=>"external")); ?> (53 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("October 14, 2009", "/files/board_minutes/minutes101409.pdf", array("rel"=>"external")); ?> (64 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("September 17, 2009", "/files/board_minutes/minutes091709.pdf", array("rel"=>"external")); ?> (79 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("July 08, 2009", "/files/board_minutes/minutes070809.pdf", array("rel"=>"external")); ?> (74 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("June 25, 2009", "/files/board_minutes/minutes061809.pdf", array("rel"=>"external")); ?> (33 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("May 21, 2009", "/files/board_minutes/minutes052109.pdf", array("rel"=>"external")); ?> (33 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("April 23, 2009", "/files/board_minutes/minutes042309.pdf", array("rel"=>"external")); ?> (71 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("March 26, 2009", "/files/board_minutes/minutes032609.pdf", array("rel"=>"external")); ?> (64 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("February 19, 2009", "/files/board_minutes/minutes021909.pdf", array("rel"=>"external")); ?> (68 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("January 15, 2009", "/files/board_minutes/minutes011509.pdf", array("rel"=>"external")); ?> (64 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<br/>

		</div>


		<h2><a href="javascript:toggleMin('2008min')">2008 Minutes</h2>
		<div id="2008min" class="entry" style="display: none">
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("December 17, 2008", "/files/board_minutes/minutes121708.pdf", array("rel"=>"external")); ?> (66 KB)<br />
							<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("November 20, 2008", "/files/board_minutes/minutes112008.pdf", array("rel"=>"external")); ?> (70 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("October 16, 2008", "/files/board_minutes/minutes101608.pdf", array("rel"=>"external")); ?> (65 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("September 18, 2008", "/files/board_minutes/minutes091808.pdf", array("rel"=>"external")); ?> (94 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>


			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("June 19, 2008", "/files/board_minutes/minutes061908.pdf", array("rel"=>"external")); ?> (31 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("May 15, 2008", "/files/board_minutes/minutes051508.pdf", array("rel"=>"external")); ?> (33 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("April 17, 2008", "/files/board_minutes/minutes041708.pdf", array("rel"=>"external")); ?> (69 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("March 27, 2008", "/files/board_minutes/minutes032708.pdf", array("rel"=>"external")); ?> (78 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("February 21, 2008", "/files/board_minutes/minutes022108.pdf", array("rel"=>"external")); ?> (72 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("January 17, 2008", "/files/board_minutes/minutes011708.pdf", array("rel"=>"external")); ?> (72 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

		</div>

		<h2><a href="javascript:toggleMin('2007min')">2007 Minutes</h2>
		<div id="2007min" class="entry" style="display: none">

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("December 20, 2007", "/files/board_minutes/minutes122007.pdf", array("rel"=>"external")); ?> (66 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("November 15, 2007", "/files/board_minutes/minutes111507.pdf", array("rel"=>"external")); ?> (65 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("October 11, 2007", "/files/board_minutes/minutes101107.pdf", array("rel"=>"external")); ?> (96 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>

			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("June 21, 2007", "/files/board_minutes/minutes062107.pdf", array("rel"=>"external")); ?> (60 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("May 17, 2007", "/files/board_minutes/minutes05172007.pdf", array("rel"=>"external")); ?> (60 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("April 19, 2007", "/files/board_minutes/minutes041907.pdf", array("rel"=>"external")); ?> (67.8 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("March 22, 2007", "/files/board_minutes/minutes032207.pdf", array("rel"=>"external")); ?> (71 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("February 22, 2007", "/files/board_minutes/minutes022207.pdf", array("rel"=>"external")); ?> (56 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
			<p>
				<?php echo $this->Html->image("/img/icon-pdf.gif", array("alt"=>"Board Minutes "));?>
				<?php echo $this->Html->link("January 18, 2007", "/files/board_minutes/minutes011807.pdf", array("rel"=>"external")); ?> (56 KB)<br />
				<div class="section_end">&nbsp;</div>
			</p>
		</div>
		-->

		</div>
		<div class="section_end">&nbsp;</div>

	</div>
	<div class="closing"></div>




</div>