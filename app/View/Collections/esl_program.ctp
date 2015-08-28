<?php include("crumbs.php"); ?>	

<?php 
$related = $relatedContentElements[0];
$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Services For Newcomers","url"=>"/services/newcomer")))), $related);
//array_push($relatedContentElements, array ('related_pages', array("pages"=>array(array("Title"=>"Services For Newcomers","url"=>"/services/newcomer")))));	
$this->controller->set('relatedContentElements', $relatedContentElements);
?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>ESL Classes</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	
	<div class="details">


		<div class="entry">
			<h2>ESL Classes</h2>
			<p>In partnership with York Catholic District School Board, Vaughan Public Libraries currently offer ESL classes at <?php echo $html->link("Bathurst Clark Resource Library", "/libraries/view/2"); ?> and <?php echo $html->link("Pierre Berton Resource Library", "/libraries/view/7"); ?>. Please call us at 905-653-7323 for more details.</p>
			<p>Please check out the following links to find out more ESL classes near you:</p>
			<div class="name"><?php echo $html->link("Language Instruction for Newcomers to Canada (LINC) Program", "http://www.cic.gc.ca/english/resources/publications/welcome/wel-17e.asp#canada"); ?></div>
			<div class="name"><?php echo $html->link("Vaughan Welcome Centre: English Language Classes", "http://www.welcomecentre.ca/services/english-language-classes.html"); ?></div>
			<div class="name"><?php echo $html->link("York Region District School Board", "http://www.yrdsb.edu.on.ca/page.cfm?id=CC0000046"); ?></div>
			<div class="name"><?php echo $html->link("York Catholic District School Board", "http://www.ycdsb.ca/departments/ACE/ESL.htm"); ?></div>
					
			
		</div>

		
	</div>
	<div class="closing"></div>
	
	
	
	
</div>