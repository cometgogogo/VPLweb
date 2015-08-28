<?php
$this->Html->addCrumb("Home" , "/");
$this->Html->addCrumb("Books & Resources" , "/materials");
$this->Html->addCrumb("Articles & Research" , "/databases");
?>

<?php
	//$relatedContentElements = array	(array ('related_db', array("pages"=>array(array("Title"=>"Gale Power Search","url"=>"http://find.galegroup.com/ips/infomark.do?type=static&page=SubjectSearch&prodId=IPS&version=1.0&userGroupName=thor86190&source=gale")))));
	$relatedContentElements[]= array ('image', array("image"=>array("source"=>"/img/sols_banner_bg.jpg","width"=>"200", "height"=>"240", "title"=>"SOLS acknowledgement statement ")));
	$this->set('relatedContentElements', $relatedContentElements);

?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Articles & Research</h1>
	</div>
	<div class="closing"></div>
</div>



<div id="page_content">
	<div class="opening"></div>
	<div class="details">


	<!--	<div class="intro">
		<p>
			Due to the system upgrading, the access to VPL's databases will be temporarily unavailable as of 9:00am on Friday, June 18. Thank you for your patience!
		</p>
		</div>

	-->


		<div class="entry">

	
		Vaughan Public Libraries subscribe to a number of high-quality electronic databases providing a wealth of
		information on a wide range of subjects!
	
		</div>

		<div class="entry">
		<p>
			Almost all are accessible on the Web to Vaughan Public Libraries' members through the links
			provided below (please follow specific instructions on how to access
			them. Note: Cookies are used throughout this area of the VPL Web site.
			Session cookies are used during the login process, and disappear when
			you are done searching the databases. Persistent cookies, that last for
			a set period of time, may be stored on your computer for some of these
			resources to work.)
		</p>



		
		<h2>Alphabetical Listing of Databases</h2>
		<div id='pagination'>
			<?php for ($i=65; $i<=90; $i++) { ?>
				<a href="/databases/index/alphabetical/<?php echo chr($i);?>" ><?php echo chr($i);?></a>
				<?php if($i<90) { ?>
				<div class='page_index_separator'>&nbsp;|&nbsp;<wbr></div>
				<?php } ?>
			<?php } ?>

			<div class='page_index_separator'>&nbsp;|&nbsp;<wbr></div><a href="/databases/index/all/" >List All</a></div>
		</div>
		

		
		<h2>Browse Databases in Categories</h2>
		<?php foreach ($databaseCategories as $databaseCategory): ?>
			<div class="directory_entry">

				<div class="name">
					<?php echo $this->Html->link($databaseCategory['DatabaseCategory']['CategoryName'], "/databases/index/category/".$databaseCategory['DatabaseCategory']['CategoryID']); ?>
				</div>
				<?php //print_r($databaseCategory); ?>
				<?php foreach ($databaseCategory['Samples'] as $SampleDatabase): ?>
					<?php echo $this->Html->link($SampleDatabase['SampleDatabases']["Name"], "/databases/view/".$SampleDatabase['SampleDatabases']["Short"]); ?>,
				<?php endforeach; ?>
				...
				<?php echo $this->Html->link("more", "/databases/index/category/".$databaseCategory['DatabaseCategory']['CategoryID']); ?>
			</div>
		<?php endforeach; ?>
		




	</div>

	<div class="closing"></div>

</div>



