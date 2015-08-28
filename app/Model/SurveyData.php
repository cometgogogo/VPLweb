<?php
class SurveyData extends AppModel
{
	var $name = 'SurveyData';
	var $useTable = "SurveyData";



	function findAllData($sid) {

				$query = "SELECT SurveyInfo.Name AS Name, SurveyData.Answer AS Answer, SurveyData.Votes AS Votes FROM SurveyInfo, SurveyData WHERE SurveyInfo.SurveyID = SurveyData.SurveyID AND SurveyInfo.SurveyID = '".$sid."'";

				$result = $this->query($query);
				return $result;
	}


	function findSurveyOptions($sid) {

			$sql = 	"SELECT SurveyInfo.Name AS Name, SurveyData.Answer AS Answer, SurveyData.DataID AS DataID, SurveyData.Votes AS Votes FROM SurveyInfo, SurveyData WHERE SurveyInfo.SurveyID = SurveyData.SurveyID AND SurveyInfo.SurveyID = '".$sid."'";

			$winners = array();

			foreach ($this->query($sql) as $winner) {

				//$winners[] = $winner['SurveyData']['DataID'] . "=>" .$winner['SurveyData']['Answer']);

				$temp = array($winner['SurveyData']['Answer'] => $winner['SurveyData']['Answer']."<br/>");
				$winners = array_merge($winners, $temp);
			}

			return $winners;

	}


	function UpdateSurveyData($sid,$option) {
//echo $sid;
		$query = "UPDATE SurveyData SET Votes = Votes + 1 WHERE SurveyID = '" . $sid . "' AND Answer = '".$option."'";
//echo $query;
		$result = $this->query($query);
		return $result;
	}


	//function Save($data) {
	//		$this->set($data);
	//		return $this->validates();
	//}

}
?>