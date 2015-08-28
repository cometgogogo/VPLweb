<?php

class MailDeliveriesController extends AppController
{
	var $name = 'MailDeliveries';
	var $components = array('General');
	var $uses = array('MailDelivery','FormStats');

var $helpers = array('Html','Pagination');

	function add() {
$option = array(
				"begin"=>"Request Books by Mail Service.<br />",
				"stop"=>"Terminate Books by Mail Service.<br />"
				);
$this->set("option", $option);
		$this->set("errors", false);

		if (!empty($this->data)) {
			if ($this->MailDelivery->save($this->data)) {
				if ($this->data["MailDelivery"]["option"] == "begin"){
					$message = "Books by Mail Online Request\n\n";
					$message .= "The following individual has submitted Books By Mail Online Request Form through the VPL website:\n\n";
					$message .= "Name: " . @$this->data["MailDelivery"]["name"]  . "\n";
					$message .= "Library Card #: " . @$this->data["MailDelivery"]["card"]  . "\n";
					$message .= "Address:  " . @$this->data["MailDelivery"]["address"] . "\n";
					$message .= "Suite/Apt:  " . @$this->data["MailDelivery"]["suite"] . "\n";
					$message .= "City:  " . @$this->data["MailDelivery"]["city"] . "\n";
					$message .= "Province:  " . @$this->data["MailDelivery"]["province"] . "\n";
					$message .= "Postal Code:  " . @$this->data["MailDelivery"]["postal_code"] . "\n";
					$message .= "Telephone: " . @$this->data["MailDelivery"]["telephone"] . "\n";
					$message .= "Email:  " . @$this->data["MailDelivery"]["email"] . "\n\n";
					$message .= "Questions or Comments for Library Staff: \n " . @$this->data["MailDelivery"]["comment"]  . "\n\n";
					$subject = "[Books by Mail] Online Request";
					$replyto = @$this->data["MailDelivery"]["email"];
				} else if ($this->data["MailDelivery"]["option"] == "stop") {
					$message = "Books by Mail Termination of Service\n\n";
					$message .= "The following individual has submitted Books By Mail Termination of Service Form through the VPL website:\n\n";
					$message .= "Name: " . @$this->data["MailDelivery"]["name1"]  . "\n";
					$message .= "Library Card #: " . @$this->data["MailDelivery"]["halt_card"]  . "\n";
					$message .= "Date of Termination:  " . @$this->data["MailDelivery"]["date"] . "\n\n";
					$message .= "Email:  " . @$this->data["MailDelivery"]["halt_email"] . "\n\n";
					$subject = "[Books by Mail] Service Termination Request";
					$replyto = @$this->data["MailDelivery"]["halt_email"];
				}
				$to = "library.membership@vaughanpl.com";

				$headers = 'From: library.membership@vaughanpl.com' . "\r\nCc: vplwebmaster@vaughan.ca\r\nReply-To: ".$replyto."\r\n" .
				"X-Mailer: PHP/\r\n";
				$mailSuccess = mail ( $to,  $subject, $message, $headers);

				if ($mailSuccess) {

					$this->render("confirm");
					/*$this->FormStats->insertStatsData(41);*/
				} else {
					$this->render("email_error");
				}

			} else {
				$this->set("errors", true);
			}
		} else {
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