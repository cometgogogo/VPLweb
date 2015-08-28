<?php
class Review extends AppModel
{
	var $name = 'Review';
	var $useTable = 'Reviews';
	var $validate = array(
		"title" => VALID_NOT_EMPTY,
		"author" => VALID_NOT_EMPTY,
		"review" => VALID_NOT_EMPTY,
		"first_name" => VALID_NOT_EMPTY,
		"BranchID" => '/[^(^empty$)]/'
	);
	
	var $hasOne = array("Catalogue"=>array("className"=>"Catalogue"));

	function validates() {
		if (!(empty($this->data["Review"]["title"]) || empty($this->data["Review"]["author"]))) {
		
			try {
				if (!$this->Catalogue->bookExists($this->data["Review"]["title"],$this->data["Review"]["author"])) $this->invalidate("book_found");
			} catch (Exception $e) {
				$this->invalidate("catalogue_connection");
			}
			
		}
		return count($this->invalidFields()) == 0;
	}

}
?>