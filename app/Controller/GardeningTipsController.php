<?php
/**
 * Controller class for tip submission form in Communities in Bloom section
 */
class GardeningTipsController extends AppController
{
	var $name = 'GardeningTips';					// Name of the controller
	var $components = array('General');				// Array of components this controller will use
	var $uses = array('GardeningTip','Library');	// Array of models this controller will use

	/**
	 * Add a tip
	 */
	function add()
		{

			// Decide which elements to display and pass them to the View
			$relatedContentElements = array	(array ('bloom_navigation'));
			$this->set('relatedContentElements', $relatedContentElements);

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

				// Validate model
				if ($this->GardeningTip->save($this->data)) {

					// Compose alert
					$to = "vplwebmaster@vaughan.ca";
					$message = "Share a Gardening Tip\n\n".
								"The following individual has shared a gardening tip through the \"Share a Gardening Tip!\" form on the VPL Web Site:\n".
								"\n".
								"First Name:  ". @$this->data["GardeningTip"]["first_name"] . "\n" .
								"Local Branch:  " . @$libraries[@$this->data["GardeningTip"]["library"]] . "\n".
								"\n".
								"Tip:\n".
								@$this->data["GardeningTip"]["tip"] . "\n";
					$subject = "Share a Gardening Tip - " . @$libraries[@$this->data["GardeningTip"]["library"]];
					$headers = 	"From: vplwebmaster@vaughan.ca\r\n" .
								"X-Mailer: PHP/\r\n";

					// Send mail alert
					$mailSuccess = @mail ( $to,  $subject, $message, $headers);

					// Notify sucess/failure to user
					if ($mailSuccess) {
						$this->render("confirm");
					} else {
						$this->render("email_error");
					}

				// Model validation failed
				} else {
					$this->set("errors", true);
				}
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