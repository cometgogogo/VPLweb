<?php
/**
 * Controller class for tip submission form of User Reviews
 */
class ReviewsController extends AppController
{
	var $name = 'Reviews';									// Name of the controller
	var $components = array('General');						// Array of components this controller will use
	var $uses = array('Review','Catalogue','Library');		// Array of models this controller will use
	var $helpers = array('Html','Pagination');				// Array of helpers this controller will use

	/**
	 * Add a review
	 */
	function add() {

		// Obtain Libraries list and pass to the View
		$libraries_temp = $this->Library->generateList("District <> 'Virtual'",'BranchName ASC', null,null,'{n}.Library.BranchName');
		foreach ($libraries_temp as $key => $value) {
			$libraries[$key . " "] = $value;
		}
		$libraries = array_merge(array("empty"=>"-- please select --"), $libraries);
		$this->set('libraries',$libraries);

		// Initialize View's defaul error state
		$this->set("errors", false);

		// Process submitted data
		if (!empty($this->data)) {

			// Initialize data fields not entered by the user
			$this->data["Review"]["state"] = "submitted";
			$this->data["Review"]["SubmissionID"] = date("YmdHs").uniqid(md5(rand()));

			// Validate model
			if ($this->Review->save($this->data)) {

				// Compose alert
				$message = "Title:" . $this->data["Review"]["title"] . "<br />" .
							"Author:" . $this->data["Review"]["author"] . "<br />" .
							"Review:" . $this->data["Review"]["review"] . "<br />" .
							"First name:" . $this->data["Review"]["first_name"] . "<br />" .
							"Last name:" . $this->data["Review"]["last_name"] . "<br />" .
							"Local library:" . $libraries[$this->data["Review"]["BranchID"]] . "<br />" .
							"<a href='http://vpl/reviews/approve?reviewid=" . $this->Review->id . "&submissionid=" . $this->data["Review"]["SubmissionID"] . "&state=approved'>Approve</a>" . "<br />" .
							"<a href='http://vpl/reviews/approve?reviewid=" . $this->Review->id . "&submissionid=" . $this->data["Review"]["SubmissionID"] . "&state=rejected'>Reject</a>" . "<br />";
				$to = "daniel.criconet@crescentknowledge.com";
				$subject = "New reader review";
				$headers = 'From: daniel.criconet@crescentknowledge.com' . "\r\n" .
				"X-Mailer: PHP/\r\n";

				// Send mail alert
				$mailSuccess = mail ( $to,  $subject, $message, $headers);

				// Notify sucess/failure to user
				if ($mailSuccess) {

					// Decide which elements to display and pass them to the View
					$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Submit another review","url"=>"/reviews/add"),array("Title"=>"Read other users' reviews","url"=>"/reviews/index"),array("Title"=>"Recommended Reads","url"=>"/materials/recommended")))));
					$this->set('relatedContentElements', $relatedContentElements);
					$this->render("confirm");
				} else {
					$this->render("email_error");
				}

			// Model validation failed
			} else {
				$this->set("errors", true);
			}

		// Initialize fields from url to display initial form.
		} else {
			$this->data["Review"]["title"] = @$_GET["title"];
			$this->data["Review"]["author"] = @$_GET["author"];
		}
	}

	/**
	 * Display the user reviews
	 */
	function index()
	{
		// Obtain a list of Libraries and pass to teh View
		$libraries = $this->Library->generateList(null,'BranchName ASC', null,null,'{n}.Library.BranchName');
		$this->set('libraries',$libraries);

		// Populate default criteria variables
		$author = null;
		$title = null;
		$condition = null;							// SQL condition to limit results found
		$paginationBaseUrl = "/reviews/index";		// base url for page hyperlinks
		$page = 1;									// page # to be displayed

		// Retrieve url arguments
		$args=func_get_args();

		// Initialize criteria variables from url arguments
		if (isset($args[0]) && is_numeric($args[0])) {
			$page = $args[0];
		} elseif (isset($args[0]) && isset($args[1])) {
			$title = $args[0];
			$author = $args[1];
			$paginationBaseUrl .= "/" . $args[0] . "/" . $args[1];
			if (isset($args[2])) $page = $args[2];
		}
		if (isset($author) && isset($title)) {
			$condition = "author='" . $author . "' AND title='" . $title . "' AND ";
		}
		$condition .= "state='approved'";


		// Get reviews from Model and pass to the View (disable the Review->Catalogue association that searches books)
		$this->Review->unbindModel(array('hasOne' =>array('Catalogue')));
		$this->set('reviews', $this->Review->findAll($condition,null,"title,author",10,$page,0));

		// Get review count from Model and pass to the View (disable the Review->Catalogue association that searches books)
		$this->Review->unbindModel(array('hasOne' =>array('Catalogue')));
		$this->set('totalReviews', $this->Review->findCount($condition));

		// Pass pagination details to View
		$this->set('paginationBaseUrl', $paginationBaseUrl);
		$this->set('page', $page);

		// Decide which elements to display and pass them to the View
		$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Submit a review","url"=>"/reviews/add"),array("Title"=>"Recommended Reads","url"=>"/materials/recommended")))));
		$this->set('relatedContentElements', $relatedContentElements);
	}

	/**
	 * Approve (or not) a review
	 */
	function approve() {


		// Get review from Model (disable the Review->Catalogue association that searches books)
		$this->Review->unbindModel(array('hasOne' =>array('Catalogue')));
		$review = $this->Review->findByReviewid(@$_GET["reviewid"]);

		// Make sure that the approval is done by authorized staff (by unique key generated, included in email, and passed to url)
		if ($review["Review"]["SubmissionID"] == @$_GET["submissionid"]) {

			// Update approved state on Model and notify success (not the best way, the model should have a method rather than having SQL in controller)
			$this->Review->execute("UPDATE reviews SET state='" . @$_GET["state"] . "' WHERE ReviewID=" . @$_GET["reviewid"]);
			$this->flash('State of Review id # ' . @$_GET["reviewid"] . " successfully changed to " . @$_GET["state"], "/");

		// Notify user not authorized to approve
		} else {
			$this->flash('Operation not authorized.',"/");
		}
	}


	/**
	 * Display details of a Review
	 */
	function view($id = null)
	{

		// Get Library info and pass to View
		$this->Library->id = $id;
		$myLibrary = $this->Library->read();
		$this->set('library', $myLibrary);

		// Decide which elements to display and pass them to the View
		$relatedContentElements = array	(
											array ('library_events_index', array("events"=>$this->Library->nextEvents()))
										);
		$this->set('relatedContentElements', $relatedContentElements);
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