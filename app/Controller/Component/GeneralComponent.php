<?php
/**
 * Component class including general use functions at controller level
 */
App::uses('Component', 'Controller');

class GeneralComponent extends Component
	{
	var $controller = true;		// Place holder for the controller
	var $fontSize = "normal";
	var $graphics = "yes";

public function initialize(Controller $controller) {
    $this->controller = $controller;
}
	/**
	 * Populate the controller placeholder when called
	 */
	//function startup(Controller $controller)
	//{
		// This method takes a reference to the controller which is	loading it.
		// Perform controller initialization here.
		//$this->controller = $controller;
	//}


	/**
	 * Recognize any changes to the current style through post submission and store in session if any,
	 * and set css style for the controller
	 */
	function setCSS()
	{
		if (isset($_POST["font_size"])) {
			$this->fontSize = $_POST["font_size"];
			setcookie("font_size", $_POST["font_size"], 0);


		} elseif (isset($_GET["font_size"])) {
			$this->fontSize = $_GET["font_size"];
			setcookie("font_size", $_GET["font_size"], 0);

		} elseif (isset($_COOKIE["font_size"])) {
			$this->fontSize = $_COOKIE["font_size"];

		}

		if (isset($_POST["graphics"])) {
			$this->graphics = $_POST["graphics"];
			setcookie("graphics", $_POST["graphics"], 0);
		} elseif (isset($_GET["graphics"])) {
			$this->graphics = $_GET["graphics"];
			setcookie("graphics", $_GET["graphics"], 0);

		} elseif (isset($_COOKIE["graphics"])) {
			$this->graphics = $_COOKIE["graphics"];
		}

		if ($this->fontSize == "normal" && $this->graphics == "yes") {
			$this->controller->set("CSS","default");
		} elseif ($this->fontSize == "large" && $this->graphics == "yes") {
			$this->controller->set("CSS","large_font");
		} elseif ($this->fontSize == "normal" && $this->graphics == "no") {
			$this->controller->set("CSS","low_graphics");
		} elseif ($this->fontSize == "large" && $this->graphics == "no") {
			$this->controller->set("CSS","large_font_low_graphics");
		}




/*
		if (isset($this->controller->Account->patronName) && isset($this->controller->Account->sessionId)) {
			setcookie("account_patron", $this->controller->Account->patronName, 0);
			setcookie("account_session", $this->controller->Account->sessionId, 0);
		}
*/


	}


	function setAccountCookies($patronName, $sessionId)
	{
		setcookie("AccountPatronName", $patronName, 0);
		setcookie("AccountSessionID", $sessionId, 0);
	}


	function internalClient() {

		// Maple / Pierre Berton / Bathurst Clark
		if (strpos($_SERVER["REMOTE_ADDR"],"66.146.131.166") === 0) {
			return true;
		}

		// Woodbridge
		if (strpos($_SERVER["REMOTE_ADDR"],"64.119.116.90") === 0) {
			return true;
		}


		return false;
	}
}

?>