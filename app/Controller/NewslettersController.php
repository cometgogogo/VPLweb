<?php
/**
 * Controller class for Recommended links
 */
class NewslettersController extends AppController
{
	var $name = 'Newsletters';							// Name of the controller
	var $components = array('General');				// Array of components this controller will use
	var $uses = array('Newsletter');		// Models this controller will use
	var $helpers = array('Html');		// Helpers this controller will use

	/**
	 * Display a list of archives based on criteria secified by url arguments
	 */
	function recent()
	{
		$this->set('archives', $this->Newsletter->findRecent());

	}
	function archive()
	{
		$this->set('archives', $this->Newsletter->findAll(1));

	}


	/**
	 * Display details of a Recommended link
	*/
	function view($id = null)	{


		$msg = $this->Newsletter->findMsg($id);

		$this->set('message', $msg);
	}



	function subscribe()
	{
		$confirmed = 0;

		if (isset($_GET["action"]) && ($_GET["action"] == "confirm") && isset($_GET["uid"])) {
			$confirmURL = "http://newsletter.vaughanpl.info/lists/?p=confirm&uid=" . $_GET["uid"];
			$this->redirect($confirmURL);

		} else if (isset($_GET["action"]) && ($_GET["action"] == "done")){

			$confirmed = 1;
		}
		$this->set('confirmed', $confirmed);
	}


	function thankyou(){}

	function unsubscribe()
	{

			if (isset($_GET["uid"])) {
				$userID =$_GET["uid"] ;

				$email = $this->Newsletter->findEmail($userID);

				$this->set('email', $email[0]['phplist_user_user']['email']);
				$this->set('uid', $userID);
				$this->set('submit', 0);
			}else{
				$this->set('submit', 1);

			}

	}

	function forward()
	{
		$submit = 0;
		if (isset($_GET["uid"]) && ($_GET["mid"])) {
				$uID = $_GET["uid"];
				$mID = $_GET["mid"];
				$this->set('uniqID', $uID);
				$this->set('msgID', $mID);
		}else if (isset($_GET["action"]) && ($_GET["action"] == "done")) {
				//$this->set('forwardEmail', $_GET["email"]);
				$submit = 1;

		}else{
			$confirmURL = "http://www.vaughanpl.info/newsletters/subscribe";
			$this->redirect($confirmURL);
		}

		$this->set('submit', $submit);
	}


	function preference()
	{
		if (isset($_GET["uid"])) {
			$userID = $_GET["uid"];
			$this->set('uniqID', $userID);

			$email = $this->Newsletter->findEmail($userID);
			$this->set('email', $email[0]['phplist_user_user']['email']);
			$this->set('update', 0);
		}else{
			$this->set('update', 1);
		}

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