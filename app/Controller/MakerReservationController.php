<?php

class MakerReservationController extends AppController
{
	var $name = 'MakerReservation';
	var $components = array('General');
	var $uses = array('MakerReservation','FormStats');

	function add()
		{

			$kits = array("empty"=>"-- please select one --",
							"3d"=>"3D Maker Kit",
							"robotics"=>"Robotics Maker Kit",
							"circuitry"=>"Circuitry Maker Kit",
							"music"=>"Music Maker Kit",
							"creative"=>"Creative Design Maker Kit",
							"movie"=>"Movie Magic Maker Kit",
							"knex"=>"K'NEX Maker Kit"
							);
			$this->set("kits", $kits);

			$this->set("errors", false);

			if (!empty($this->data)) {
				if ($this->MakerReservation->save($this->data)) {
					$to = "librarian@vaughan.ca";
					$kit_index = @$this->data["MakerReservation"]["kit"];
					$kit = $kits[$kit_index];
					$message = "The following customer has requested to reserve a maker kit:\n".
								"\n".
								"Name:  ". @$this->data["MakerReservation"]["first_name"] . " " . @$this->data["MakerReservation"]["last_name"] . "\n" .
								"Telephone:  ". @$this->data["MakerReservation"]["telephone"] . "\n".
								"Library Card Number:  ". @$this->data["MakerReservation"]["card"] . "\n".
								"Email Address:  ". @$this->data["MakerReservation"]["email"] . "\n".
								"Preferred Time:  ". @$this->data["MakerReservation"]["time"] . "\n".
								"Maker Kit:  ". $kit . "\n\n".
								"Additional Comments: ". @$this->data["MakerReservation"]["comment"] . "\n\n";

					$Email = @$this->data["MakerReservation"]["email"];
					$subject = "Request to reserve a maker kit - ".$kit;
					$headers = 	"From: librarian@vaughan.ca\r\nReply-To: $Email\r\n" .
								"X-Mailer: PHP/";
					$mailSuccess = @mail ( $to,  $subject, $message, $headers);
					if ($mailSuccess) {
						$this->render("confirm");
						$this->FormStats->insertStatsData(50);
					} else {
						$this->render("email_error");
					}
				} else {
					$this->set("errors", true);
				}
			}
		}


	function beforeRender() {
		//session_start();
		$this->General->setCSS();
	}


}

?>