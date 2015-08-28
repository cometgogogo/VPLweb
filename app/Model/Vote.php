<?php
class Vote extends AppModel
{
	var $name = 'Vote';
	var $useTable = "VoteInfo";


	function UpdateVoteInfo($result) {
echo "update";
		if ($result == 'Yes') {
			$query = "UPDATE VoteInfo SET Yes = Yes + 1 WHERE VoteID = '1'";
		} else {
			$query = "UPDATE VoteInfo SET No = No + 1 WHERE VoteID = '1'";
		}

		$result = $this->query($query);
		return $result;
	}

	function displayResult() {
		$query = "SELECT * FROM VoteInfo";

		$result = $this->query($query);
		return $result;


	}

	function Save($data) {
			$this->set($data);
			return $this->validates();
	}

}
?>