<?php
/**
 * Controller class for Patron Accounts
 */
class AccountsController extends AppController
{
	var $name = 'Accounts';							// Name of the controller
	var $components = array('General','Session');	// Array of components this controller will use




	/**
	 * Log a patron in, keeping track of where the user was going when forced to login first
	 */
	function login($nextURL = null) {

		// Populate entry form data
		if (empty($this->data) && !empty($_POST)) {
			$this->data["Account"]["card"] = $_POST["Account/card"];
			$this->data["Account"]["pin"] = $_POST["Account/pin"];
		}

		// Initialize View's defaul error state
		$this->set("errors", false);

		// Present the initial empty form
		if (empty($this->data)) {
			$this->set('nextURL', $nextURL);
			$this->render("login");

		// Process submitted data
		} else {

			// Invoke the model's login method
			$this->Account->login($this->data["Account"]["card"],$this->data["Account"]["pin"]);

			// Keep session information and take user to desired url if login successful
			if (count($this->Account->errors) == 0) {

				setcookie("account_patron", $this->Account->patronName, 0, "/", ".vaughanpl.info");
				setcookie("account_session", $this->Account->sessionId, 0, "/", ".vaughanpl.info");
				exit($this->Account->response);

			// Process login errors
			} else {
				$this->set("errors", true);

				// Invalidate fields with errors
				foreach ($this->Account->errors as $error) $this->Account->invalidate($error);

				// Send to view url where the user was going
				$this->set('nextURL', @$this->data["Account"]["nextURL"]);
			}
		}
	}

	/**
	 * Direct user to catalogues's patron summary page, or force to sign in first
	 */
	function summary() {
		session_start();
		if (isset($_COOKIE["account_session"])) {
			$this->redirect("http://catalogue.vaughanpl.info:8080/auth/login");
		} else {
			$this->login("/accounts/summary");
		}
	}

	/**
	 * Direct user to catalogues's patron full record page, or force to sign in first
	 */
	function full_record() {
		session_start();
		if (isset($_COOKIE["account_session"])) {
			$this->redirect("http://catalogue.vaughanpl.info:8080/auth/login");
		} else {
			$this->login("/accounts/full_record");
		}
	}

	/**
	 * Direct user to catalogues's patron activity record page, or force to sign in first
	 */
	function activity() {
		session_start();
		if (isset($_COOKIE["account_session"])) {
			$this->redirect("http://catalogue.vaughanpl.info:8080/auth/login");
		} else {
			$this->login("/accounts/activity");
		}
	}

	/**
	 * Direct user to catalogues's patron fines page, or force to sign in first
	 */
	function overdue_fines() {
		if (isset($_COOKIE["account_session"])) {
			$this->redirect(
				"http://catalogue.vaughanpl.info:8080/auth/login"
				);
		} else {
			$this->login("/accounts/overdue_fines");
		}
	}

	/**
	 * Force this controller to pick up the appropriate style
	 */
	function beforeRender() {

		//$this->General->setAccountCookies($this->Account->patronName, $this->Account->sessionId);
		$this->General->setCSS();
	}
}

?>