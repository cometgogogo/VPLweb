<?php include("crumbs.php"); ?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(
																				array("Title"=>"Volunteer Opportunities","url"=>"../volunteers")
																				))));
	$this->controller->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Employment Opportunities</h1>
	</div>
	<div class="closing"></div>
</div>



<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		
	<div class="summary">
	<?php 
	 	$currentDate = date("Y-m-d");
	 	
	 	
	
	?>
	<?php
	if ($numJobs == 0) {
		echo "<p>There are no employment opportunities currently available with Vaughan Public Libraries: </p>";
	}else{ 	
		if ($numJobs == 1) {
				echo "<p>There is 1 employment opportunity currently available with Vaughan Public Libraries: </p>";
		}else{
				echo "<p>There are ".$numJobs." employment opportunities currently available with Vaughan Public Libraries: </p>";
	        }
	?>
	
	
		<table id="jobs_table">		
		<tr>
			      <th width="40%">Job Title</td>
			      <th width="30%">Location</td>
			      <th width="15%">Posting Date</td>
			      <th width="15%">Closing Date</td>			      
		 </tr>
	
		 <?php foreach ($jobs as $curjob){ 
				if ($currentDate <= $curjob['Job']['EndDate']){				
					
		   ?>
		       		<tr>
					<td width="40%">
					<table><tr><td width="5%">
				            <?php echo $html->image("/icon-pdf.gif");?>
				            </td><td>
					    <?php echo $html->link($curjob['Job']['Title'], "/files/employment/".$curjob['Job']['URL'], array("rel"=>"external"));?>
					    <?php echo "(".$curjob['Job']['Size']." KB)";?>						 
					</td></tr></table>	 
					</td>
					<td width="30%">
						<?php echo $curjob['Job']['Location'];	?>					
					</td>
					<td width="15%">
						<?php echo $curjob['Job']['StartDate'];	?>
					</td>
					<td width="15%">
						<?php echo $curjob['Job']['EndDate'];	?>
					</td>
				   </tr>
				<?php 
				}
				?>
			
		
	 
		<?php 
		}
   		?>
   		</table>
   		<p>&nbsp;</p>
   	
   		<?php echo $this->renderElement('adobe_download'); ?>	
   		
   	<?php 
	}
   	?>
		
		
		
			


			
				<h2>Send Us Your R&eacute;sum&eacute;</h2>
			<p>	If you would like to be considered for any forthcoming positions with VPL, please submit your r&eacute;sum&eacute; to:
			</p>
			<p>
				Recruitment<br />
				Administration Office<br />
				Vaughan Public Libraries<br />
				900 Clark Avenue West<br />
				Vaughan, Ontario  L4J 8C1<br />
				Fax: (905) 709-1530<br/>
				Email: vpl.admin@vaughan.ca
			</p>
			&nbsp;
	</div>
	</div>

	<div class="closing"></div>
</div>
