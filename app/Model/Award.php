<?php
/**
 * Model class for Awards
 */
class Award extends AppModel
{
	var $name = 'Award';			// Name of the Model
	var $useTable = 'Awards';		// Table this Model is connected to
	var $primaryKey = 'AwardID';	// Primary key column in table


	function findAwardWinners($awardID) {
	mysql_query("SET CHARACTER SET utf8");
		mysql_query("SET NAMES utf8");
		$sql = 	"SELECT Award_winners.CatID, Award_Categories.Category, Award_winners.title, Award_winners.Lang, Award_winners.author, Award_winners.year FROM Award_winners LEFT JOIN Award_Categories ON Award_Categories.AwardID=Award_winners.AwardID AND Award_Categories.CatID=Award_winners.CatID WHERE Award_winners.AwardID='$awardID' ORDER BY Award_winners.year DESC, Award_Categories.CatID";

		$winners = array();

		foreach ($this->query($sql) as $winner) {

			$winners[] = array("CatID"=>$winner['Award_winners']['CatID'], "Category"=>$winner['Award_Categories']['Category'], "title"=>$winner['Award_winners']['title'], "Lang"=>$winner['Award_winners']['Lang'], "author"=>$winner['Award_winners']['author'], "year"=>$winner['Award_winners']['year']);

		}

		return $winners;

	}

	function findAwardCategories($awardID) {
		//mysql_query("SET CHARACTER SET utf8");
		//mysql_query("SET NAMES utf8");
		$sql = 	"SELECT DISTINCT Award_winners.CatID, Award_Categories.Category, Award_winners.year FROM Award_winners LEFT JOIN Award_Categories ON Award_Categories.AwardID = Award_winners.AwardID AND Award_Categories.CatID = Award_winners.CatID WHERE Award_winners.AwardID='$awardID' ORDER BY Award_winners.year DESC, Award_Categories.CatID";

		$categories = array();

		foreach ($this->query($sql) as $cat) {

			$categories[] = array("year"=>$cat['Award_winners']['year'], "CatID"=>$cat['Award_winners']['CatID'], "Category"=>$cat['Award_Categories']['Category']);

		}

		return $categories;

	}

	function findAwardWinnersByCat($awardID, $year, $cat) {
		//mysql_query("SET CHARACTER SET utf8");
		//mysql_query("SET NAMES utf8");
		$sql = 	"SELECT Award_winners.CatID, Award_Categories.Category, Award_winners.title, Award_winners.Lang, Award_winners.author, Award_winners.year FROM Award_winners LEFT JOIN Award_Categories ON Award_Categories.AwardID=Award_winners.AwardID AND Award_Categories.CatID=Award_winners.CatID WHERE Award_winners.AwardID='$awardID' AND Award_winners.year='$year' AND Award_winners.CatID='$cat'";

		$winners = array();

		foreach ($this->query($sql) as $winner) {

			$winners[] = array("CatID"=>$winner['Award_winners']['CatID'], "Category"=>$winner['Award_Categories']['Category'], "title"=>$winner['Award_winners']['title'], "Lang"=>$winner['Award_winners']['Lang'], "author"=>$winner['Award_winners']['author'], "year"=>$winner['Award_winners']['year']);

		}

		return $winners;

	}


}
?>