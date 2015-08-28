<?php
class Link extends AppModel
{
	var $name = 'Link';
	var $useTable = 'RecommendedLinks';
	var $primaryKey = 'LinkID';
	var $recursive = 0;
	var $countQuery;

	//var $hasAndBelongsToMany = array("Subject","Area");


	function findAll($areaId=null, $subjectId=null, $broadSubjectId=null, $keywords="",$page=1) {
		$sql = 	"SELECT DISTINCT";
		$sql .= "	Link.LinkID, ";
		$sql .= "	Link.TitleOfWebsite, ";
		$sql .= "	Link.UrlOfWebsite, ";
		$sql .= "	Link.Description, ";
		$sql .= "	Link.WebsitePublisher, ";
		$sql .= "	Link.DateUpdated, ";
		$sql .= "	SiteArea.AreaName, ";
		$sql .= "	MATCH(Link.TitleOfWebsite, Link.Description, Link.Keywords) AGAINST ('" . $keywords . "*' IN BOOLEAN MODE) AS Relevance ";
		$sql .= "FROM ";
		$sql .= "	RecommendedLinks Link, ";
		$sql .= "	RL_Link_Subject, ";
		$sql .= "	RL_BroadSubjects SubjectArea, ";
		$sql .= "	RL_SpecificSubjects Subject, ";
		$sql .= "	AreasOfVPLSite SiteArea ";
		$sql .= "WHERE ";
		$sql .= "	SubjectArea.AreaID = SiteArea.AreaID AND ";
		$sql .= "	Subject.BroadSubjectID = SubjectArea.BroadSubjectID AND ";
		$sql .= "	RL_Link_Subject.SpecificSubjectID = Subject.SpecificSubjectID AND ";
		$sql .= "	Link.IsLive = '1' AND ";
		$sql .= "	RL_Link_Subject.LinkID = Link.LinkID ";
		if (isset($areaId)) { $sql .= " AND SiteArea.AreaID=" . $areaId; }
		if (isset($subjectId)) { $sql .= " AND Subject.SpecificSubjectID=" . $subjectId; }
		if (isset($broadSubjectId)) { $sql .= " AND SubjectArea.BroadSubjectID=" . $broadSubjectId; }
		if (!empty($keywords)) { $sql .= " AND MATCH(Link.TitleOfWebsite, Link.Description, Link.Keywords) AGAINST ('" . $keywords . "*' IN BOOLEAN MODE)>0 "; }

		$sql .= " GROUP BY ";
		$sql .= "	Link.LinkID, ";
		$sql .= "	Link.TitleOfWebsite, ";
		$sql .= "	Link.UrlOfWebsite, ";
		$sql .= "	Link.Description, ";
		$sql .= "	Link.WebsitePublisher, ";
		$sql .= "	Link.DateUpdated, ";
		$sql .= "	SiteArea.AreaName ";


		$sql .= "ORDER BY ";
		$sql .= "	Relevance DESC,";
		$sql .= "	TitleOfWebsite ";
		if($page != 0){
			$sql .= "LIMIT " . (($page-1) * 10) . ",10";
		}
		//if $page == 0, then list all links in one page -- changed on Oct.10, 2012 for newcomer links

		$countQuery =  "SELECT ";
		$countQuery .= "	COUNT(DISTINCT Link.LinkID) as count ";
		$countQuery .= "FROM ";
		$countQuery .= "	RecommendedLinks Link, ";
		$countQuery .= "	RL_Link_Subject, ";
		$countQuery .= "	RL_BroadSubjects SubjectArea, ";
		$countQuery .= "	RL_SpecificSubjects Subject, ";
		$countQuery .= "	AreasOfVPLSite SiteArea ";
		$countQuery .= "WHERE ";
		$countQuery .= "	SubjectArea.AreaID = SiteArea.AreaID AND ";
		$countQuery .= "	Subject.BroadSubjectID = SubjectArea.BroadSubjectID AND ";
		$countQuery .= "	RL_Link_Subject.SpecificSubjectID = Subject.SpecificSubjectID AND ";
		$countQuery .= "	Link.IsLive = '1' AND ";
		$countQuery .= "	RL_Link_Subject.LinkID = Link.LinkID ";
		if (isset($areaId)) { $countQuery .= " AND SiteArea.AreaID=" . $areaId; }
		if (isset($subjectId)) { $countQuery .= " AND Subject.SpecificSubjectID=" . $subjectId; }
		if (isset($broadSubjectId)) { $countQuery .= " AND SubjectArea.BroadSubjectID=" . $broadSubjectId; }
		if (!empty($keywords)) { $countQuery .= " AND MATCH(Link.TitleOfWebsite, Link.Description, Link.Keywords) AGAINST ('" . $keywords . "*' IN BOOLEAN MODE)>0 "; }
		$this->countQuery = $countQuery;
		return $this->query($sql);
	}

function findAllGroupBySubject($areaId=null, $subjectId=null, $broadSubjectId=null, $keywords="",$page=1) {
		$sql = 	"SELECT DISTINCT";
		$sql .= "	Link.LinkID, ";
		$sql .= "	Link.TitleOfWebsite, ";
		$sql .= "	Link.UrlOfWebsite, ";
		$sql .= "	Link.Description, ";
		$sql .= "	Link.WebsitePublisher, ";
		$sql .= "	Link.DateUpdated, ";
		$sql .= "	Subject.SpecificSubjectName, ";
		$sql .= "	SiteArea.AreaName, ";
		$sql .= "	MATCH(Link.TitleOfWebsite, Link.Description, Link.Keywords) AGAINST ('" . $keywords . "*' IN BOOLEAN MODE) AS Relevance ";
		$sql .= "FROM ";
		$sql .= "	RecommendedLinks Link, ";
		$sql .= "	RL_Link_Subject, ";
		$sql .= "	RL_BroadSubjects SubjectArea, ";
		$sql .= "	RL_SpecificSubjects Subject, ";
		$sql .= "	AreasOfVPLSite SiteArea ";
		$sql .= "WHERE ";
		$sql .= "	SubjectArea.AreaID = SiteArea.AreaID AND ";
		$sql .= "	Subject.BroadSubjectID = SubjectArea.BroadSubjectID AND ";
		$sql .= "	RL_Link_Subject.SpecificSubjectID = Subject.SpecificSubjectID AND ";
		$sql .= "	Link.IsLive = '1' AND ";
		$sql .= "	RL_Link_Subject.LinkID = Link.LinkID ";
		if (isset($areaId)) { $sql .= " AND SiteArea.AreaID=" . $areaId; }
		if (isset($subjectId)) { $sql .= " AND Subject.SpecificSubjectID=" . $subjectId; }
		if (isset($broadSubjectId)) { $sql .= " AND SubjectArea.BroadSubjectID=" . $broadSubjectId; }
		if (!empty($keywords)) { $sql .= " AND MATCH(Link.TitleOfWebsite, Link.Description, Link.Keywords) AGAINST ('" . $keywords . "*' IN BOOLEAN MODE)>0 "; }

		$sql .= " GROUP BY ";
		$sql .= "	Link.LinkID, ";
		$sql .= "	Link.TitleOfWebsite, ";
		$sql .= "	Link.UrlOfWebsite, ";
		$sql .= "	Link.Description, ";
		$sql .= "	Link.WebsitePublisher, ";
		$sql .= "	Link.DateUpdated, ";
		$sql .= "	SiteArea.AreaName ";


		$sql .= "ORDER BY ";
		$sql .= "	Subject.SpecificSubjectName,";
		//$sql .= "	Relevance DESC,";
		$sql .= "	TitleOfWebsite ";
		if($page != 0){
			$sql .= "LIMIT " . (($page-1) * 10) . ",10";
		}
		//if $page == 0, then list all links in one page -- changed on Oct.10, 2012 for newcomer links

		$countQuery =  "SELECT ";
		$countQuery .= "	COUNT(DISTINCT Link.LinkID) as count ";
		$countQuery .= "FROM ";
		$countQuery .= "	RecommendedLinks Link, ";
		$countQuery .= "	RL_Link_Subject, ";
		$countQuery .= "	RL_BroadSubjects SubjectArea, ";
		$countQuery .= "	RL_SpecificSubjects Subject, ";
		$countQuery .= "	AreasOfVPLSite SiteArea ";
		$countQuery .= "WHERE ";
		$countQuery .= "	SubjectArea.AreaID = SiteArea.AreaID AND ";
		$countQuery .= "	Subject.BroadSubjectID = SubjectArea.BroadSubjectID AND ";
		$countQuery .= "	RL_Link_Subject.SpecificSubjectID = Subject.SpecificSubjectID AND ";
		$countQuery .= "	Link.IsLive = '1' AND ";
		$countQuery .= "	RL_Link_Subject.LinkID = Link.LinkID ";
		if (isset($areaId)) { $countQuery .= " AND SiteArea.AreaID=" . $areaId; }
		if (isset($subjectId)) { $countQuery .= " AND Subject.SpecificSubjectID=" . $subjectId; }
		if (isset($broadSubjectId)) { $countQuery .= " AND SubjectArea.BroadSubjectID=" . $broadSubjectId; }
		if (!empty($keywords)) { $countQuery .= " AND MATCH(Link.TitleOfWebsite, Link.Description, Link.Keywords) AGAINST ('" . $keywords . "*' IN BOOLEAN MODE)>0 "; }
		$this->countQuery = $countQuery;
		return $this->query($sql);
	}

	function findCount() {
		$ret = $this->query($this->countQuery);
		$ret = $ret[0][0]['count'];
		return $ret;
	}



}
?>