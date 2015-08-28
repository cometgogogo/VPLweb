<?php
include("crumbs.ctp");
//include("crumbs_website.ctp");
?>



<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Site Search</h1>
	</div>
	<div class="closing"></div>
</div>



<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="section_end">&nbsp;</div>
		<div class="entry">

			<!-- Search Google -->
			<FORM method="GET" action="http://www.google.com/custom">
			
			<label for="GoogleSearch"><A HREF=http://www.google.com/search>
			<IMG SRC="http://www.google.com/logos/Logo_40wht.gif" border=0 ALT="Google" align="middle" /></A></label>
			<INPUT TYPE="text" name="q" size="20" id="GoogleSearch" maxlength="255" value="" />
			<INPUT type="submit" name="sa" VALUE="Google Search" />
			<INPUT type="hidden" name="cof" VALUE="GIMP:003366;T:000000;BIMG:003366;ALC:003366;L:http://206.47.131.53/images/vpl.gif;GFNT:003366;LC:003366;AH:left;VLC:009999;GL:0;S:http://www.vaughanpl.info;GALT:003366;AWFID:459116856e8a392a;" />
			<input type=hidden name=domains value="www.vaughanpl.info"><br />
			<input type="radio" name="sitesearch" id="vplsearch" value="www.vaughanpl.info" checked />
			<label for="vplsearch">
			<font face="Arial, Helvetica, Sans-serif", color="#000000", size="-1">Search www.vaughanpl.info</font></label><br />
			<input type="radio" name="sitesearch" id="wwwsearch" value="" />
			<label for="wwwsearch">
			<font face="Arial, Helvetica, Sans-serif", color="#000000", size="-1">Search WWW</font></label><br />
			</FORM>
			<!-- Search Google -->
			
		</div>
		<div class="entry">
			
			<h3>Tips for Searching</span></h3>
			
			<ul>
				<li>
					Try to be as specific as possible when combining search terms. 
					If your results are too narrow then broaden your search terms.
				</li>
				
				
				<li>
					To find words that should appear side by side in your search results, 
					place quotation marks (e.g. "Term1 Term2") around them.
				</li>
				
				<li>
					To increase the accuracy of your search, try different variations in spelling of the search terms you are using.
				</li>
				
				<li>
				In the case of the Google search engine, you do not need to use the word "and". For additional information about how to use the Google search engine, please visit <a href="http://www.google.com" class="body-link">google.com</a>.
				</li>
			</ul>
			

		</div>
		<div class="section_end">&nbsp;</div>
		
	</div>
	<div class="closing"></div>
	
</div>

