<?php
/**
 * Model class for CUSTOMER FEEDBACK form
 */
class Newsletter extends AppModel
{
	var $name = 'Newsletter';				// Name of the Model
	var $useTable = 'phplist_message';		// Table this Model is connected to

	// Model validations
	function findAll($listID=null) {

		// change on Dec. 19, 2013 - archive the past two year issues only

		$sql = "SELECT * FROM phplist_message, phplist_list, phplist_listmessage WHERE phplist_list.id=" . $listID . " AND phplist_list.id = phplist_listmessage.listid AND phplist_message.id = phplist_listmessage.messageid AND phplist_message.status  = 'sent' AND phplist_list.active=1 AND phplist_message.sent > SUBDATE(now(), 730) ORDER BY sent DESC;";

		return $this->query($sql);
	}

	function findRecent() {

		$sql = "SELECT * FROM phplist_message, phplist_list, phplist_listmessage WHERE phplist_list.id = phplist_listmessage.listid AND phplist_message.id = phplist_listmessage.messageid AND phplist_message.status  = 'sent' AND phplist_list.active=1 AND DATE_SUB(CURDATE(),INTERVAL 180 DAY) <= phplist_message.sendstart ORDER BY sent DESC;";

		return $this->query($sql);
	}

	function findMsg($id=null) {

			$result = "SELECT * FROM phplist_message WHERE phplist_message.id=". $id;

			return $this->query($result);
	}

function findEmail($id=null) {

			$result = "SELECT email FROM phplist_user_user WHERE phplist_user_user.uniqid='". $id ."'";

			return $this->query($result);
	}

	/*function findCount() {
		$ret = $this->query($this->countQuery);
		$ret = $ret[0][0]['count'];
		return $ret;
	}*/



	/**
	 * Nothing is saved in database, just validated

	function Save($data) {
		$this->set($data);
		if (!empty($this->data["Feedback"]["telephone"])) $this->validate["telephone"] = "/[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}/";
		if (!empty($this->data["Feedback"]["email"])) $this->validate["email"] = VALID_EMAIL;
		return $this->validates();
	}
 */

}
?>