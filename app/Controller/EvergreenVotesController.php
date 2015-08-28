<?php

class EvergreenVotesController extends AppController
{
	var $name = 'EvergreenVotes';
	var $uses = array('EvergreenVote', 'Library', 'EvergreenBranchvote');
	var $components = array('General');
	var $helpers = array('Html','Form');
	//var $scaffold;

	function index()	{
		$this->set('evergreendata', $this->EvergreenVote->findAll());
		$this->set('displayVote',false);
		if (isset($_POST['submit'])){
			if (!empty($_POST['vote'])) {
				$id = $_POST['vote'];
				$selectedBook = $this->EvergreenVote->find(array("ItemID"=>$id));
				$selectedBook['EvergreenVote']['Vote'] = $selectedBook['EvergreenVote']['Vote']+1;
				$this->EvergreenVote->save($selectedBook);
				$branchId = 4;
				$this->EvergreenBranchvote->query("UPDATE evergreen_branchvotes AS EvergreenBranchvote SET VoteCount = VoteCount+1 WHERE BranchID=".$branchId);
				$this->set('msg','Thank you for voting for the 2014 Evergreen Award!');
				$this->set('displayVote',true);
				$updatedData = $this->EvergreenVote->query("SELECT * FROM evergreen_votes AS EvergreenVote");
				$this->set('evergreendata', $updatedData);
			} else {
				$this->set('msg','Please choose your favorite book.');
			}

		}
	}

	function stats_report() {
		$this->set('stats',$this->EvergreenBranchvote->stats());

	}


	function beforeRender() {

		//session_start();
		$this->General->setCSS();
	}
}

?>