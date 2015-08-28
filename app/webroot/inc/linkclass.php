<?php

/*
 * File: linkclass.php
 * Description: defines all the general functions to be used
 *              in displaying recommended links at Recommended
 *              Links, Access Kyoto, Black Heritage, Business
 *              Access, Local Studies, KidZone Homework Zone,
 *              KidZone Fun Zone, Teen Links, etc.
 *
 * Date: Feb. 4, 2005
 * Author: Yue Sun
 */

include_once ("db_connect.php");
include_once ("vpl_dbqueries.php");


class Links
{
    var $areaid;
    var $pagetitle;
    var $cssStyles;

    var $count;

	// class constructor
    function Links($area_id)	{

    	$this->areaid = $area_id;
		//$this->count = 0;
		switch ($area_id) {
			case 1:
				$this->pagetitle = "Recommended Links";
				break;
			case 2:
				$this->pagetitle = "Access Kyoto Links";
				break;
			case 3:
				$this->pagetitle = "Business Access Links";
				break;
			case 4:
				$this->pagetitle = "Black Heritage Links";
				break;
			case 5:
				$this->pagetitle = "Local Studies Links";
				break;
			case 6:
				$this->pagetitle = "Fun Web Site Links";
				break;
			case 7:
				$this->pagetitle = "Homework Zone Links";
				break;
			case 8:
				$this->pagetitle = "Teen Zone Links";
				break;
			case 12:
				$this->pagetitle = "Adult Basic Literacy Links";
				break;
			case 13:
				$this->pagetitle = "Links by Subject";
				break;
		}

		if ($this->areaid == 6) {
			$this->cssStyles["bodyStyle"] = "funzone-content";
			$this->cssStyles["bodyBoldStyle"] = "funzone-content-bold"; $this->cssStyles["bodyLinkStyle"] = "funzone-content-link"; $this->cssStyles["bodySmallStyle"] = "funzone-content-small"; $this->cssStyles["headerStyle"] = "funzone-sub-header";

		} else if ($this->areaid == 7) {
			$this->cssStyles["bodyStyle"] = "homeworkzone-content";
			$this->cssStyles["bodyBoldStyle"] = "homeworkzone-content-bold"; $this->cssStyles["bodyLinkStyle"] = "homeworkzone-content-link"; $this->cssStyles["bodySmallStyle"] = "homeworkzone-content-small";
			$this->cssStyles["headerStyle"] = "homeworkzone-sub-header";

		} else if ($this->areaid == 13) {
			$this->cssStyles["bodyStyle"] = "teen_body_paragraph_text";
			$this->cssStyles["bodyBoldStyle"] = "teen_body_paragraph_text_bold";
			$this->cssStyles["bodyLinkStyle"] = "teen_link";
			$this->cssStyles["bodySmallStyle"] = "teen_body_paragraph_text_small";
			$this->cssStyles["headerStyle"] = "teen_sub_heading";

		} else {
			$this->cssStyles["bodyStyle"] = "body-paragraph-text"; $this->cssStyles["bodyBoldStyle"] = "body-paragraph-text-bold";
			$this->cssStyles["bodyLinkStyle"] = "body-link";
			$this->cssStyles["bodySmallStyle"] = "body-paragraph-text-small"; $this->cssStyles["headerStyle"] = "paragraph-heading";
		}
	}


	// Return the target group for the given link (homework zone links)
	function getTargetGroup($linkid) {
		$targetGroupStr = "";
		$result = mysql_query("SELECT TargetGroupID FROM RL_Link_TargetGroup WHERE LinkID=".$linkid);

		while ($myrow = mysql_fetch_array($result)) {

			if ($myrow[0] >= 3) {
				$targetGroupStr .= $myrow[0] - 2;
			} else if ($myrow[0] == 2) {
				$targetGroupStr .= "K";
			} else {
				$targetGroupStr .= "PreS";
			}
			$targetGroupStr .= ", ";
		}

		// removed the last char ", "
		if ($targetGroupStr != "") {
			$targetGroupStr = rtrim($targetGroupStr, " ,");
		}
		return $targetGroupStr;
	}



	// Return one record (link) string to be printed on the page.
	function getRecordStr($resultRow, $broadSubjectName) {
$str ="";
		$str .= "<p class=\"".$this->cssStyles["bodyStyle"]. "\">";

		$str .= "<span class=\"".$this->cssStyles["bodyBoldStyle"]."\"><a href=\"".$resultRow["UrlOfWebsite"]."\" class=\"".$this->cssStyles["bodyLinkStyle"]."\" target=\"_blank\">".$resultRow["TitleOfWebsite"]."</a></span><br/>";

		$str .= $resultRow["Description"]."</span><br /><span class=\"".$this->cssStyles["bodySmallStyle"]."\">Prepared By:&nbsp;".$resultRow["WebsitePublisher"];

		$str .= "</span><br />";

		if ($this->areaid == 7) {
			$str .= "<span class=\"".$this->cssStyles["bodySmallStyle"]."\"><b>Curriculum Area:</b> &nbsp;". $broadSubjectName."<br /></span>";

			// need to get target group
			$targetGroupStr = $this->getTargetGroup($resultRow["LinkID"]);
			$str .= "<span class=\"".$this->cssStyles["bodySmallStyle"]."\"><b>Grade Level:</b> &nbsp;  ".$targetGroupStr."<br /></span>";
		}

		$str .= "<span class=\"".$this->cssStyles["bodySmallStyle"]."\">Date Reviewed by VPL: ".$resultRow["DateUpdated"]."</span></p>";

		return $str;
	}


	// List all the links in the given area of VPL site.
	function listAll() {

		$output = "<p><span class=\"".$this->cssStyles["headerStyle"]."\">".$this->pagetitle." - All</span><br />";

		// Black Heritage links
		if ($this->areaid == 4) {
			$output .= "<p class=\"".$this->cssStyles["bodyStyle"]."\">"."VPL librarians have selected a number of high-quality Web sites related to the topic of Black Heritage.<br /><br />Topics covered include Black Canadian and Caribbean literature, history, and culture.</p>";
		}


		// Local Studies links
		if ($this->areaid == 5) {
			$output .= "<p class=\"".$this->cssStyles["bodyStyle"]."\">"."VPL librarians have selected a number of high-quality Web sites related to the topic of Local Studies.</p><p class=\"".$this->cssStyles["bodyStyle"]."\">"."Topics covered include local history; genealogy; and municipal documents.</p>";
		}


		// A link might have more than one specific subjects in the same VPL
		// site area. Therefore, we need to avoid repetitive records while
		// listing all links in each site area

		// List all links except for "Search Engines" on Homework Zone

		$query = "SELECT count(RL_Link_Subject.LinkID), RL_Link_Subject.LinkID, RecommendedLinks.TitleOfWebsite, RecommendedLinks.UrlOfWebsite, RecommendedLinks.Description, RecommendedLinks.WebsitePublisher, RecommendedLinks.DateUpdated, RL_BroadSubjects.BroadSubjectName FROM RL_Link_Subject, RL_SpecificSubjects, RL_BroadSubjects, RecommendedLinks WHERE RL_Link_Subject.LinkID=RecommendedLinks.LinkID and RL_Link_Subject.SpecificSubjectID = RL_SpecificSubjects.SpecificSubjectID AND RL_SpecificSubjects.BroadSubjectID = RL_BroadSubjects.BroadSubjectID AND RL_BroadSubjects.BroadSubjectID!=72 AND RecommendedLinks.IsLive=1 and ";

		// In "Recommended Links" area, list all will present the
		// results in all the adult site areas, i.e., all the links
		// in Recommended Links, Access Kyoto, Business Access,
		// Local Studies, and Black Heritage.
		if ($this->areaid == 1) {
			$query .= "(RL_BroadSubjects.AreaID=1 OR RL_BroadSubjects.AreaID=2 OR RL_BroadSubjects.AreaID=3 OR RL_BroadSubjects.AreaID=4 OR RL_BroadSubjects.AreaID=5)";
		} else {
			$query .= "RL_BroadSubjects.AreaID = ".$this->areaid;
		}
		$query .= " GROUP BY RecommendedLinks.TitleOfWebsite";

		$result = mysql_query($query);
		while ($myrow = mysql_fetch_array($result)) {

			$output .= $this->getRecordStr($myrow, $myrow["BroadSubjectName"]);

			//$this->count++;

		}

		echo $output;

		//echo "<br/>Number of records: ", $this->count, "\n";

	}


	// List the links by subjects
	function listBySubject() {

		$headStr = "<span class=\"".$this->cssStyles["headerStyle"]."\">".$this->pagetitle;
		$bodyStr = "</span><br /><br />";

		if (isset($_GET['SpecificSubjectId'])) {
			// display the links

			$specific_id = $_GET['SpecificSubjectId'];

			$specific_row = search_rl_specificsubject_by_id($specific_id);
			$specificName = stripslashes($specific_row['SpecificSubjectName']);

			$broad_row = search_rl_broadsubjects_by_specificsubjectid($specific_id);
			$broadName = stripslashes($broad_row['BroadSubjectName']);

			$headStr .= " - ".$broadName." - ".$specificName;

			$result = search_rl_by_specificsubject($specific_id);
			while ($myrow = mysql_fetch_array($result)) {

				$bodyStr .= $this->getRecordStr($myrow, $broadName);
			}
		} else if (isset($_GET['BroadSubjectId'])) {
			// display the specific subjects

			$broad_id = $_GET['BroadSubjectId'];
			$broad_row = search_rl_broadsubjects_by_broadsubjectid($broad_id);
			$broadName = stripslashes($broad_row['BroadSubjectName']);

			$headStr .= " - ". $broadName;

			// only display those specific subjects that have links
			// i.e., if there is no any links assigned to the specific
			// subject in the database yet, this specific subject name will
			// not be displayed on the page.
			$result = search_rl_specificsubjects_with_links_by_broadsubject($broad_id);

			// if this broad subject just has one specific subject, not to
			// display the specific subject page but display the links
			// directly.
			if (mysql_num_rows($result) == 1) {
				$myrow = mysql_fetch_array($result);

				$result1 = search_rl_by_specificsubject($myrow["SpecificSubjectID"]);
				while ($myrow1 = mysql_fetch_array($result1)){

					$bodyStr .= $this->getRecordStr($myrow1, $broadName);
				}
			}
			else { // display the specific subjects for this broad subject
				while ($myrow = mysql_fetch_array($result)) {

					$bodyStr .= "<span class=\"".$this->cssStyles["bodyStyle"]. "\"><a href=\"".$PHP_SELF."?SpecificSubjectId=".$myrow["SpecificSubjectID"]."\" class=\"".$this->cssStyles["bodyLinkStyle"]."\">".$myrow["SpecificSubjectName"]."</a><br /><br /></span>";
				}
			}


		} else {

			$headStr .= " - "."Search by Subject Area";

			$result = search_rl_broadsubjects_by_area($this->areaid);

			// if there is only one broad subjects, then display the
			// specific subjects directly, i.e., the broad subject is
			// not displayed on the page ("access kyoto" and "kidzone fun
			// links")
			if (mysql_num_rows($result) == 1) {
				$myrow = mysql_fetch_array($result);

				$result1 = search_rl_specificsubjects_with_links_by_broadsubject($myrow['BroadSubjectID']);

				while ($myrow1 = mysql_fetch_array($result1)){

					$bodyStr .= "<span class=\"".$this->cssStyles["bodyStyle"]. "\"><a href=\"".$PHP_SELF."?SpecificSubjectId=".$myrow1["SpecificSubjectID"]."&SpecificSubjectName=".$myrow1["SpecificSubjectName"]."\" class=\"".$this->cssStyles["bodyLinkStyle"]."\">".$myrow1["SpecificSubjectName"]."</a><br /><br /></span>";
				}
			}

			// else, display the broad subjects

			while ($myrow = mysql_fetch_array($result)) {

				// if there are no links for this broad subject, then don't display it
				if ($myrow["BroadSubjectID"]!=102) {
					$result_links = search_rl_links_by_broadsubjectid($myrow["BroadSubjectID"]);
					if (mysql_num_rows($result_links) >0) {

						$bodyStr .= "<span class=\"".$this->cssStyles["bodyStyle"]."\"><a href=\"".$PHP_SELF."?BroadSubjectId=".$myrow["BroadSubjectID"]."\" class=\"".$this->cssStyles["bodyLinkStyle"]."\">".$myrow["BroadSubjectName"]."</a><br /><br /></span>";
					}
				}

			}

		}

		echo $headStr;
		echo $bodyStr;
	}




	// Add new record to the given list. If this record (linkid)
	// already existed in the list, replace the old one with this
	// new record if the new one's relevance value is larger;
	// otherwise, the new one is not inserted. Return the list.
	//
	// It is to be used by function searchByKeyword()
	function addToResultList($list, $record) {

		$len = count($list);
		for ($i=0; $i<$len; $i++) {
			if ($list[$i]["LinkID"] == $record["LinkID"]) {
				if ($list[$i]["Relevance"] < $record["Relevance"]) {
					$list[$i] = $record;
				}
				return $list;
			}
		}

		$list[$len] = $record;
		return $list;

	}


	// List the search results by the given keyword, the results
	// are sorted by the relevance value.
	function searchByKeyword($keyword, $targetFile) {
$list = array();
		$output = "<span class=\"".$this->cssStyles["headerStyle"]."\">".$this->pagetitle." - Search by Keyword</span><br />";


		$output .= "<p class=\"".$this->cssStyles["bodyBoldStyle"]."\">Search Results for <i>".$keyword."</i> - Sorted by Relevance</p>";

		$keyword = addslashes($keyword);

		// first full-text search in broad subjects
		$query = "SELECT BroadSubjectID, BroadSubjectName, MATCH (BroadSubjectName) AGAINST ('$keyword') AS Relevance FROM RL_BroadSubjects WHERE MATCH (BroadSubjectName) AGAINST ('$keyword') AND ";

		// In "Recommended Links" area, keyword search will present the
		// results in all the adult site areas, i.e., all the relevant
		// links in Recommended Links, Access Kyoto, Business Access,
		// Local Studies, and Black Heritage.
		if ($this->areaid == 1) {
			$query .= "(AreaID='$this->areaid' OR AreaID=2 OR AreaID=3 OR AreaID=4 OR AreaID=5)";
		} else {
			$query .= "AreaID='$this->areaid'";
		}

		$result = mysql_query($query);

		while ($myrow = mysql_fetch_array($result)) {

			$result1 = mysql_query("SELECT count(RL_Link_Subject.LinkID), RecommendedLinks.LinkID, RecommendedLinks.TitleOfWebsite, RecommendedLinks.UrlOfWebsite, RecommendedLinks.Description, RecommendedLinks.WebsitePublisher, RecommendedLinks.DateUpdated FROM RL_Link_Subject, RL_SpecificSubjects, RecommendedLinks WHERE RL_Link_Subject.LinkID=RecommendedLinks.LinkID and RL_Link_Subject.SpecificSubjectID = RL_SpecificSubjects.SpecificSubjectID AND RL_SpecificSubjects.BroadSubjectID = ".$myrow["BroadSubjectID"]." AND RecommendedLinks.IsLive=1 GROUP BY RecommendedLinks.TitleOfWebsite");

			while ($myrow1 = mysql_fetch_array($result1)) {
				$list = $this->addToResultList($list, $myrow1);
				$list[count($list)-1]["BroadSubjectName"] = $myrow["BroadSubjectName"];
				$list[count($list)-1]["Relevance"] = $myrow["Relevance"];
			}

		}


		// then search in specific subjects
		$result = mysql_query("SELECT SpecificSubjectID, MATCH (SpecificSubjectName) AGAINST ('$keyword') AS Relevance FROM RL_SpecificSubjects WHERE MATCH (SpecificSubjectName) AGAINST ('$keyword')");

		while ($myrow = mysql_fetch_array($result)) {

			$query1 = "SELECT count(RL_Link_Subject.LinkID), RecommendedLinks.LinkID, RecommendedLinks.TitleOfWebsite, RecommendedLinks.UrlOfWebsite, RecommendedLinks.Description, RecommendedLinks.WebsitePublisher, RecommendedLinks.DateUpdated, RL_BroadSubjects.BroadSubjectName FROM RL_Link_Subject, RL_SpecificSubjects, RL_BroadSubjects, RecommendedLinks WHERE RL_Link_Subject.LinkID=RecommendedLinks.LinkID and RL_Link_Subject.SpecificSubjectID = RL_SpecificSubjects.SpecificSubjectID AND RL_SpecificSubjects.SpecificSubjectID = ".$myrow["SpecificSubjectID"]." AND RL_SpecificSubjects.BroadSubjectID = RL_BroadSubjects.BroadSubjectID AND RecommendedLinks.IsLive=1 AND ";

			if ($this->areaid == 1) {
				$query1 .= "(RL_BroadSubjects.AreaID='$this->areaid' OR RL_BroadSubjects.AreaID=2 OR RL_BroadSubjects.AreaID=3 OR RL_BroadSubjects.AreaID=4 OR RL_BroadSubjects.AreaID=5)";
			} else {
				$query1 .= "RL_BroadSubjects.AreaID='$this->areaid'";
			}

			$query1 .= " GROUP BY RecommendedLinks.TitleOfWebsite";

			$result1 = mysql_query($query1);

			while ($myrow1 = mysql_fetch_array($result1)) {
				$list = $this->addToResultList($list, $myrow1);
				$list[count($list)-1]["Relevance"] = $myrow["Relevance"];
			}

		}



		// Finally search in RecommendedLinks table (title, url, description
		// and keywords)
		$query = "SELECT RecommendedLinks.LinkID, RecommendedLinks.TitleOfWebsite, RecommendedLinks.UrlOfWebsite, RecommendedLinks.Description, RecommendedLinks.WebsitePublisher, RecommendedLinks.DateUpdated, MATCH (RecommendedLinks.Keywords, RecommendedLinks.TitleOfWebsite, RecommendedLinks.Description, RecommendedLinks.UrlOfWebsite) AGAINST ('$keyword') AS Relevance, RL_BroadSubjects.BroadSubjectName FROM RecommendedLinks, RL_Link_Subject, RL_SpecificSubjects, RL_BroadSubjects WHERE MATCH (RecommendedLinks.Keywords, RecommendedLinks.TitleOfWebsite, RecommendedLinks.Description, RecommendedLinks.UrlOfWebsite) AGAINST ('$keyword') AND RecommendedLinks.IsLive=1 and RL_Link_Subject.LinkID=RecommendedLinks.LinkID and RL_Link_Subject.SpecificSubjectID = RL_SpecificSubjects.SpecificSubjectID AND RL_SpecificSubjects.BroadSubjectID = RL_BroadSubjects.BroadSubjectID AND RecommendedLinks.IsLive=1 AND ";

		if ($this->areaid == 1) {
			$query .= "(RL_BroadSubjects.AreaID='$this->areaid' OR RL_BroadSubjects.AreaID=2 OR RL_BroadSubjects.AreaID=3 OR RL_BroadSubjects.AreaID=4 OR RL_BroadSubjects.AreaID=5)";
		} else {
			$query .= "RL_BroadSubjects.AreaID='$this->areaid'";
		}

		$result=mysql_query($query);

		while ($myrow = mysql_fetch_array($result)) {
			$list = $this->addToResultList($list, $myrow);
		}


		if (count($list) == 0) {

			$output .= "<p class=\"".$this->cssStyles["bodyStyle"]."\">Sorry, no links matching your search term(s) were found. Please try again:</p>";

			$output .=
			"<p class=\"".$this->cssStyles["bodyStyle"]."\"><a href=\"$targetFile\" class=\"".$this->cssStyles["bodyLinkStyle"]."\">Search by Keyword</a></p>";

		} else {

			// sort the result list and display them
			$code = 'if ($a["Relevance"]-$b["Relevance"]>0) {return -1;} else if ($a["Relevance"]-$b["Relevance"]<0) {return 1;} else {return 0;}';

			$compare = create_function('$a,$b',$code);
			uasort($list, $compare);

			foreach ($list as $result) {
				$output .= $this->getRecordStr($result, $result["BroadSubjectName"]);
			}
		}


		echo $output;

	}


	// Return a string that contains a HTML form for keyword search
	function displayKeywordForm($targetFile) {

		$formStr = "<span class=\"".$this->cssStyles["headerStyle"]."\">".$this->pagetitle." - Search by Keyword</span><br />";

		$formStr .= "<form action=\"$targetFile\" method=\"POST\">";

		$formStr .= "<p class=\"".$this->cssStyles["bodyStyle"]."\">Please enter your search term(s) in the field below. Remember to be as specific as possible.</p>";

		$formStr .= "<table>";

		$formStr .= "<tr><td><input type=\"text\" name=\"keyword\" size=\"50\"></td></tr>\n";

		$formStr .= "<tr><td>&nbsp;</td></tr></table>";

		return $formStr;
	}
}

?>