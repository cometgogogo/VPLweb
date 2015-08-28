<?php
class Subject extends AppModel
{
	var $name = 'Subject';
	var $useTable = 'RL_SpecificSubjects';
	var $primaryKey = 'SpecificSubjectID';


	function getAreaID($SpecificSubjectID) {
		return $this->query("	SELECT
									Area.AreaID,
									Area.AreaName,
									Area.AreaTypeID
								FROM
									AreasOfVPLSite Area,
									RL_BroadSubjects SubjectArea,
									RL_SpecificSubjects Subject
								WHERE
									SubjectArea.AreaID = Area.AreaID AND
									Subject.BroadSubjectID = SubjectArea.BroadSubjectID AND
									Subject.SpecificSubjectID = " . $SpecificSubjectID
							);
	}


	function findAllInBroadSubject($BroadSubjectID) {
		return $this->query("	SELECT
									Subject.SpecificSubjectID,
									BroadSubjectID,
									SpecificSubjectName,
									count(*) as HowMany
								FROM
									RL_SpecificSubjects AS Subject,
									RL_Link_Subject
								WHERE
									BroadSubjectID = " . $BroadSubjectID . " AND
									RL_Link_Subject.SpecificSubjectID = Subject.SpecificSubjectID
								GROUP BY
									Subject.SpecificSubjectID,
									BroadSubjectID,
									SpecificSubjectName
								HAVING HowMany>0
								ORDER BY SpecificSubjectName ASC "
							);
	}


	function findBroadSubjectById($BroadSubjectID) {
		$ret = $this->query("	SELECT
									BroadSubjectID,
									AreaID,
									BroadSubjectName
								FROM
									RL_BroadSubjects AS BroadSubject
								WHERE
									BroadSubjectID = " . $BroadSubjectID
							);
		return $ret[0];
	}

	function findRelevant($areaId, $broadSubjectId=null) {

		if (isset($broadSubjectId)) {
			$specificSubjectCondition = "RL_SpecificSubjects.BroadSubjectID=" . $broadSubjectId;
		} else {
			$specificSubjectCondition = "FALSE";
		}


		$ret = $this->query("	SELECT
									AreasOfVPLSite.AreaID,
									AreasOfVPLSite.AreaName,
									AreasOfVPLSite.AreaTypeID,
									RL_BroadSubjects.BroadSubjectID,
									RL_BroadSubjects.BroadSubjectName,
									IF(". $specificSubjectCondition . ",RL_SpecificSubjects.SpecificSubjectID,null) AS ApplicableSpecificSubjectID,
									IF(". $specificSubjectCondition . ",RL_SpecificSubjects.SpecificSubjectName,null) AS ApplicableSpecificSubjectName,
									count(RL_Link_Subject.LinkID) AS HowMany
								FROM
									AreasOfVPLSite
									JOIN RL_BroadSubjects ON RL_BroadSubjects.AreaID = AreasOfVPLSite.AreaID
									JOIN RL_SpecificSubjects ON RL_SpecificSubjects.BroadSubjectID = RL_BroadSubjects.BroadSubjectID
									JOIN RL_Link_Subject on RL_Link_Subject.SpecificSubjectID = RL_SpecificSubjects.SpecificSubjectID
									JOIN RecommendedLinks on RL_Link_Subject.LinkID = RecommendedLinks.LinkID
								WHERE
									AreasOfVPLSite.AreaID = " . $areaId . "  AND
									RecommendedLinks.IsLive = '1'
								GROUP BY
									AreasOfVPLSite.AreaID,
									AreasOfVPLSite.AreaName,
									AreasOfVPLSite.AreaTypeID,
									RL_BroadSubjects.BroadSubjectID,
									RL_BroadSubjects.BroadSubjectName,
									ApplicableSpecificSubjectID,
									ApplicableSpecificSubjectName
								ORDER BY
									AreasOfVPLSite.AreaName,
									RL_BroadSubjects.BroadSubjectName,
									RL_SpecificSubjects.SpecificSubjectName");

		//$ret = $this->query($query);

		return $ret;
	}


}
?>