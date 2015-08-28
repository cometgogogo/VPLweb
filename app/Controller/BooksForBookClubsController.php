<?php
class BooksForBookClubsController extends AppController
{
	var $name = 'BooksForBookClubs';
	var $components = array('General');
	var $uses = array('BookForBookClubs');
	//var $helpers = array('Html','Pagination');

	function index()
	{
		$page = 1;													// page # to be displayed
		$condition = "Level=3";										// SQL condition to limit results found
		$criteriaValue = "Adults";									// The value used for the curent criteria
		$paginationBaseUrl = "/books_for_book_clubs/index/adults";	// base url for page hyperlinks
		$alphaBaseUrl = "";                                             // base url for alphabetical page
		$alpha = false;

		$args=func_get_args();

		if (isset($args[0])) {
			if ($args[0] == "adults") {
				$condition = "Level=3";
				$criteriaValue = "Adults";
				$paginationBaseUrl = "/books_for_book_clubs/index/adults";
			} elseif($args[0] == "teens") {
				$condition = "Level=2";
				$criteriaValue = "Teens";
				$paginationBaseUrl = "/books_for_book_clubs/index/teens";
			} elseif($args[0] == "kids") {
				$condition = "Level=1";
				$criteriaValue = "Kids";
				$paginationBaseUrl = "/books_for_book_clubs/index/kids";
			} elseif($args[0] == "esl") {
				$condition = "Level=4";
				$criteriaValue = "ESL";
				$paginationBaseUrl = "/books_for_book_clubs/index/esl";
			} else {
			}
$condition .= " AND IsLive=1";
			if (isset($args[1])) {
			 if ($args[1] == "alphabetical") {
				$condition .= " AND Title LIKE '" . $args[2] . "%'";
				$alphaBaseUrl = "/books_for_book_clubs/index/adults" . "/alphabetical/" . $args[2];
				$page = $args[3];
				$alpha = true;

			 } else {
				$page = $args[1];}
			}

		} else {
		}

		//$this->set('booksForBookClubs', $this->BookForBookClubs->findAll($condition,null,"Title",10,$page));
		//$this->set('totalBooksForBookClubs', $this->BookForBookClubs->findCount($condition));
		$this->set('paginationBaseUrl', $paginationBaseUrl);
		$this->set('page', $page);
		$this->set('criteriaValue', $criteriaValue);
		$this->set('alphaBaseUrl',$alphaBaseUrl);
		$this->set('alpha', $alpha);

		$ageGroupLinks = array();
		if ($args[0] != "adults") $ageGroupLinks[] = array("Title"=>"Book sets for Adult Book Clubs","url"=>"/books_for_book_clubs/index/adults");
		if ($args[0] != "teens") $ageGroupLinks[] = array("Title"=>"Book sets for Teen Book Clubs","url"=>"/books_for_book_clubs/index/teens");
		if ($args[0] != "kids") $ageGroupLinks[] = array("Title"=>"Book sets for Kids' Book Clubs","url"=>"/books_for_book_clubs/index/kids");
		if ($args[0] != "esl") $ageGroupLinks[] = array("Title"=>"Book sets for ESL Book Clubs","url"=>"/books_for_book_clubs/index/esl");
		$ageGroupLinks[] = array("Title"=>"About Books for Book Clubs","url"=>"/library_services#club");
		$ageGroupLinks[] = array("Title"=>"Book Club Registration form","url"=>"/book_for_book_club_registrations/add/");

		$relatedContentElements = array	(array ('related_pages', array("pages"=>$ageGroupLinks)));
		$this->set('relatedContentElements', $relatedContentElements);
	}

	function view($id = null)
	{
		$this->BookForBookClubs->id = $id;
		$myBookForBookClubs = $this->BookForBookClubs->read();
		$this->set('bookForBookClubs', $myBookForBookClubs);
	}

	function search($query) {
	}

	/**
	 * Force this controller to pick up the appropriate style
	 */
	function beforeRender() {

		//session_start();
		$this->General->setCSS();
	}
}

?>