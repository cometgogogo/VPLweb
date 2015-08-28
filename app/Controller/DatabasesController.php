<?php
class DatabasesController extends AppController
{
	var $name = 'Databases';
	var $components = array('General');
	var $uses = array('Database','DatabaseCategory','Area');

	function index()
	{

		$args=func_get_args();
		$condition = null;
		$relatedContentElements = array	();

		if (isset($args[0])) {
			if ($args[0] == "alphabetical") {
				//$condition = "Live='1' AND Name LIKE '" . $args[1] . "%'";
				$q_str = $args[1]."%";
				$condition = array("Database.Live" => 1, "Database.Name LIKE"=>$q_str);

				$this->set('initial', $args[1]);

				$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Browse Databases in Categories","url"=>"/databases")))), array ('image', array("image"=>array("source"=>"/img/logo_nextreads.jpg","width"=>"200", "height"=>"240", "title"=>"NextReads Newsletters", "link"=>"/materials/next_reads"))));
				$relatedContentElements[]= array ('image', array("image"=>array("source"=>"/img/sols_banner_bg.jpg","width"=>"200", "height"=>"240", "title"=>"SOLS acknowledgement statement ")));
				$this->set('relatedContentElements', $relatedContentElements);

			} elseif($args[0] == "category") {
				$condition = "EproductID IN (SELECT E.EproductID FROM Eproducts E, Eproduct_Category EC WHERE E.EproductID=EC.EproductID AND Live='1' AND CategoryID='" . $args[1] . "')";
				$this->set('category', $this->DatabaseCategory->findByCategoryid($args[1],array("CategoryName"),null,0));

				$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Browse Other Database Categories","url"=>"/databases"),array("Title"=>"Alphabetical Listing of Databases","url"=>"/databases/index/alphabetical/A")))));
				$relatedContentElements[]= array ('image', array("image"=>array("source"=>"/img/sols_banner_bg.jpg","width"=>"200", "height"=>"240", "title"=>"SOLS acknowledgement statement ")));
				$this->set('relatedContentElements', $relatedContentElements);

			} elseif($args[0] == "collection") {
				$condition = "EproductID IN (SELECT E.EproductID FROM Eproducts E, Eproduct_SiteArea ES WHERE E.EproductID=ES.EproductID AND Live='1' AND AreaID='" . $args[1] . "')";
				$area = $this->Area->findByAreaid($args[1]);
				$this->set('collection', $area);
				if ($area["Area"]["AreaID"] != 3) $relatedContentElements[] = array ('collection_navigation', array("area"=>$area));

			} elseif($args[0] == "all") {
				$condition = "EproductID IN (SELECT EproductID FROM Eproducts WHERE Live='1' ORDER BY Name)";

				$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Browse Database Categories","url"=>"/databases"),array("Title"=>"Alphabetical Listing of Databases","url"=>"/databases/index/alphabetical/A")))), array ('image', array("image"=>array("source"=>"/img/logo_nextreads.jpg","width"=>"200", "height"=>"240", "title"=>"NextReads Newsletters", "link"=>"/materials/next_reads"))));
				$relatedContentElements[]= array ('image', array("image"=>array("source"=>"/img/sols_banner_bg.jpg","width"=>"200", "height"=>"240", "title"=>"SOLS acknowledgement statement ")));
				$this->set('relatedContentElements', $relatedContentElements);
				$this->set('initial', "List All");
			}
		}

		if (isset($condition)) {
			$this->set('databases', $this->Database->find('all', array('conditions' =>$condition, 'order'=>array('Database.Name'))));
			//$log = $this->Database->getDataSource()->getLog(false, false);
			//debug($log);

		} else {
			//$this->set('databaseCategories', $this->DatabaseCategory->findAll(null,null,"CategoryName"));
			$databaseCategories = array();
			$categories = $this->DatabaseCategory->find('all');

			foreach ($categories as $category) {
					$sample = array();
					$sample['DatabaseCategory']['CategoryID'] = $category['DatabaseCategory']['CategoryID'];
					$sample['DatabaseCategory']['CategoryName'] = $category['DatabaseCategory']['CategoryName'];
					$sample['Samples'] = $this->DatabaseCategory->findSampleDatabases($category['DatabaseCategory']['CategoryID']);
					$databaseCategories[] = $sample;

			}
			$this->set('databaseCategories', $databaseCategories);
			$this->render("summary");
		}


		$this->set('relatedContentElements', $relatedContentElements);


	}

	function view($short = null) {
		//$this->Database->ShortName = $short;
		$myDatabase = $this->Database->findByShort($short);

		$this->set('database', $myDatabase);
		$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Browse Databases in Categories","url"=>"/databases"),array("Title"=>"Alphabetical Listing of Databases","url"=>"/databases/index/alphabetical/A")))));
		$this->set('relatedContentElements', $relatedContentElements);
	}


	/*function view($id = null) {
		$this->Database->id = $id;
		$myDatabase = $this->Database->read();
		$this->set('database', $myDatabase);
		$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Browse Databases in Categories","url"=>"/databases"),array("Title"=>"Alphabetical Listing of Databases","url"=>"/databases/index/alphabetical/A")))));
		$this->set('relatedContentElements', $relatedContentElements);
	}*/

	/**
	 * Force this controller to pick up the appropriate style
	 */
	function beforeRender() {

		//session_start();
		$this->General->setCSS();
	}
}

?>