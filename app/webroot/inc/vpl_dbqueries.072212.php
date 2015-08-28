<?php

/*
 * File: vpl_dbqueries.php
 * Description: defines the SQL queries used in VPL public site
 *
 * Date: May 29, 2005
 * Author: Yue Sun
 */


/*************************************************
 *                                               *
 *                General Queries                *
 *                                               *
 *************************************************/

/*
 * searchBranchByID:
 *
 * Search VTL branches by branch id.
 */
function searchBranchByID($branchID) {
	$result = mysql_query("SELECT * FROM Branches WHERE BranchID = '$branchID'");

	return mysql_fetch_array($result);
}

function searchBranchByIDwLatLng($branchID) {
	$result = mysql_query("SELECT * FROM Branches, markers WHERE markers.id = Branches.BranchID AND BranchID = '$branchID'");

	return mysql_fetch_array($result);
}

/*
 * searchAreaByID:
 *
 * Search VTL website area by area id.
 */
function searchAreaByID($areaID) {
	$result = mysql_query("SELECT * FROM AreasOfVPLSite WHERE AreaID = '$areaID'");

	return mysql_fetch_array($result);
}


/*
 * getALLBranches:
 *
 * Search all the VPL branches in the database,
 * including ELibrary.
 */
function getAllBranches() {
	$result = mysql_query("SELECT * FROM Branches ORDER BY BranchShort");
	return $result;
}


/*
 * get_all_community_branches:
 *
 * Search all the community libraries
 */
function get_all_community_branches() {
	$result = mysql_query("SELECT * FROM Branches WHERE District LIKE 'Community' ORDER BY BranchShort");
	return $result;
}


/*
 * get_all_public_branches:
 *
 * Search all the VPL physical branches, excluding
 * ELibrary.
 */
function get_all_public_branches() {
	$result = mysql_query("SELECT * FROM Branches WHERE BranchID<>4 ORDER BY BranchShort");
	return $result;
}


/*
 * getAllAreas:
 *
 * Search all the VPL website areas in the database
 */
function getAllAreas() {
	$result = mysql_query("SELECT * FROM AreasOfVPLSite ORDER BY AreaName");
	return $result;
}



/*************************************************
 *                                               *
 *             Recommended Links                 *
 *                                               *
 *************************************************/

function search_rl_area_by_subject($SpecificSubject) {
	$result = mysql_query("SELECT RL_BroadSubjects.AreaID FROM RL_BroadSubjects, RL_SpecificSubjects WHERE RL_BroadSubjects.BroadSubjectID=RL_SpecificSubjects.BraodSubjectID AND RL_SpecificSubjects.SpecificSubjectID='$SpecificSubject'");

	return mysql_fetch_array($result);
}


function search_rl_specificsubjects_by_area($area) {
	$result = mysql_query("SELECT RL_SpecificSubjects.SpecificSubjectID, RL_SpecificSubjects.SpecificSubjectName FROM RL_BroadSubjects, RL_SpecificSubjects WHERE RL_BroadSubjects.BroadSubjectID=RL_SpecificSubjects.BroadSubjectID AND RL_BroadSubjects.AreaID='$area' ORDER BY RL_SpecificSubjects.SpecificSubjectName");

	return $result;
}

function search_rl_broadsubjects_by_area($area) {
	$result = mysql_query("SELECT * FROM RL_BroadSubjects WHERE RL_BroadSubjects.AreaID='$area' ORDER BY RL_BroadSubjects.BroadSubjectName");

	return $result;
}


function search_rl_by_specificsubject($specific_subject) {

	$query = "SELECT RecommendedLinks.LinkID, RecommendedLinks.EmployeeID, RecommendedLinks.BranchID, RecommendedLinks.TitleOfWebsite, RecommendedLinks.UrlOfWebsite, RecommendedLinks.Description, RecommendedLinks.Keywords, RecommendedLinks.WebsitePublisher, RecommendedLinks.SpecialNotes, RecommendedLinks.DatePosted, RecommendedLinks.ModifiedBy, RecommendedLinks.DateUpdated, RecommendedLinks.ApprovedBy FROM RecommendedLinks, RL_Link_Subject WHERE RecommendedLinks.LinkID=RL_Link_Subject.LinkID AND RL_Link_Subject.SpecificSubjectID='$specific_subject' AND RecommendedLinks.IsLive=1 ORDER by RecommendedLinks.TitleOfWebsite";

	return mysql_query($query);
}


function search_rl_links_by_broadsubjectid($broadSubjectID) {

	$result = mysql_query("SELECT * FROM RecommendedLinks, RL_Link_Subject, RL_SpecificSubjects WHERE RecommendedLinks.LinkID=RL_Link_Subject.LinkID AND RL_Link_Subject.SpecificSubjectID=RL_SpecificSubjects.SpecificSubjectID AND RL_SpecificSubjects.BroadSubjectID='$broadSubjectID' AND RecommendedLinks.IsLive=1 ORDER by RecommendedLinks.TitleOfWebsite");

	return $result;
}

function search_rl_specificsubject_by_id($specific_subject_id) {

	$result = mysql_query("SELECT * FROM RL_SpecificSubjects WHERE SpecificSubjectID='$specific_subject_id'");
	return mysql_fetch_array($result);
}

function search_rl_broadsubjects_by_broadsubjectid($broadSubjectID) {

	$result = mysql_query("SELECT * FROM RL_BroadSubjects WHERE BroadSubjectID='$broadSubjectID'");

	return mysql_fetch_array($result);
}



function search_rl_broadsubjects_by_specificsubjectid($specificSubjectID) {

	$result = mysql_query("SELECT RL_BroadSubjects.BroadSubjectID, RL_BroadSubjects.BroadSubjectName FROM RL_BroadSubjects, RL_SpecificSubjects WHERE RL_BroadSubjects.BroadSubjectID=RL_SpecificSubjects.BroadSubjectID AND RL_SpecificSubjects.SpecificSubjectID='$specificSubjectID'");

	return mysql_fetch_array($result);
}




function search_rl_specificsubjects_with_links_by_broadsubject($broadSubjectID) {
	$result = mysql_query("SELECT count( RL_SpecificSubjects.SpecificSubjectName ) AS NumSpecificSubjects, RL_SpecificSubjects.SpecificSubjectID, RL_SpecificSubjects.SpecificSubjectName, RL_SpecificSubjects.BroadSubjectID FROM RL_SpecificSubjects, RL_Link_Subject WHERE RL_SpecificSubjects.BroadSubjectID='$broadSubjectID' AND RL_SpecificSubjects.SpecificSubjectID=RL_Link_Subject.SpecificSubjectID GROUP BY RL_SpecificSubjects.SpecificSubjectName");

	return $result;
}




/*
 * search_links_katrina
 *
 * Search all the recommended links on how to help
 * for hurricane katrina
 */
function search_links_katrina() {

	$query = "SELECT * FROM RecommendedLinks WHERE (Keywords LIKE '%katrina%' OR Description LIKE '%katrina%') AND IsLive=1 ORDER BY TitleOfWebsite";

	return mysql_query($query);
}


/*
 * search_links_serviceontario
 *
 * Search all the recommended links on how to help
 * for hurricane katrina
 */
function search_links_serviceontario() {

	$query = "SELECT * FROM RecommendedLinks WHERE Keywords LIKE '%ServiceOntario%' AND IsLive=1 ORDER BY TitleOfWebsite";

	return mysql_query($query);
}


/*
 * search_rl_targetgroups_by_area
 *
 * Search all the target groups for the given area
 * of vpl website.
 */
function search_rl_targetgroups_by_area($areaid) {

	$query = "SELECT * FROM RL_TargetGroups WHERE AreaID='$areaid'";

	return mysql_query($query);
}


/*
 * search_rl_targetgroups_by_link
 *
 * Search all the target groups for the given link
 */
function search_rl_targetgroups_by_link($linkid) {
	$result = mysql_query("SELECT * FROM RL_Link_TargetGroup WHERE LinkID='$linkid'");

	return $result;
}





/*************************************************
 *                                               *
 *                 ATL Queries                   *
 *                                               *
 *************************************************/

function get_atl_agegroups()
{
	$result = mysql_query("SELECT * FROM ATL_AgeGroups");
	return $result;
}


function search_atl_agegroup_by_id($agegroupid)
{
	$result = mysql_query("SELECT * FROM ATL_AgeGroups WHERE GroupID='$agegroupid'");
	return mysql_fetch_array($result);
}



function search_atl_registration($ReqID) {
	$result = mysql_query("SELECT * FROM ATL_Registration WHERE ReqID='$ReqID'");
	return mysql_fetch_array($result);
}



function search_atl_registration_location($LocID) {
	$result = mysql_query("SELECT * FROM ATL_Registration_Locations WHERE LocationID='$LocID'");
	return mysql_fetch_array($result);
}


/*
 * search_atl_live_schedules:
 *
 * Search all the live schedules in table ATL_Schedule
 * (the schedule end date is later than current date)
 */
function search_atl_live_schedules() {

	$result = mysql_query("SELECT * FROM ATL_Schedule WHERE EndDate>=CURDATE()");

	return $result;
}


/*
 * search_atl_live_schedules_by_branch:
 *
 * Search in ATL database for all the live schedules
 * for the given branch.
 */
function search_atl_live_schedules_by_branch($branchid) {

	$result = mysql_query("SELECT DISTINCT ATL_Schedule.ScheduleID, ATL_Schedule.StartDate, ATL_Schedule.EndDate FROM ATL_Schedule, ATL_Events WHERE ATL_Events.BranchID='$branchid' AND ATL_Events.ScheduledFor=ATL_Schedule.ScheduleID AND ATL_Schedule.EndDate>=CURDATE() ORDER BY ATL_Schedule.StartDate");

	return $result;
}

/*
 * search_atl_live_schedule_by_program:
 *
 * Search in ATL database for the live schedules by
 * given program id.
 */
function search_atl_live_schedule_by_program($programid) {
	$result = mysql_query("SELECT DISTINCT ATL_Schedule.ScheduleID, ATL_Schedule.StartDate, ATL_Schedule.EndDate FROM ATL_Schedule, ATL_Events WHERE ATL_Events.ProgramID='$programid' AND ATL_Events.ScheduledFor=ATL_Schedule.ScheduleID AND ATL_Schedule.EndDate>=CURDATE() ORDER BY ATL_Schedule.StartDate");

	return $result;
}


/*
 * search_atl_schedule_by_id:
 *
 * Search the ATL schedule by schedule id.
 */
function search_atl_schedule_by_id($schedule) {
	$result = mysql_query("SELECT * FROM ATL_Schedule WHERE ScheduleID='$schedule'");
	return mysql_fetch_array($result);
}


/*
 * search_atl_events_by_branch_schedule:
 *
 * Search in ATL for all the live events to be held
 * in the given branch for the given schedule.
 */
function search_atl_events_by_branch_schedule($branchid, $schedule) {
	$query = "SELECT DISTINCT ATL_Events.EventID, ATL_Programs.ProgramName FROM ATL_Events, ATL_Programs WHERE ATL_Events.PublicityStatus=1 AND ATL_Events.BranchID = '$branchid' AND ATL_Events.ScheduledFor = '$schedule' AND ATL_Events.ProgramID=ATL_Programs.ProgramID ORDER BY ATL_Programs.ProgramName";

	return mysql_query($query);
}



/*
 * search_atl_events_by_program_schedule:
 *
 * Search in ATL database for all the events by
 * program id and schedule id.
 */
function search_atl_events_by_program_schedule($program, $schedule)
{
	$result = mysql_query("SELECT DISTINCT ATL_Events.EventID, Branches.BranchName FROM ATL_Events, Branches WHERE ATL_Events.PublicityStatus=1 AND ATL_Events.ProgramID='$program' AND ATL_Events.BranchID=Branches.BranchID AND ATL_Events.ScheduledFor='$schedule' ORDER BY Branches.BranchName");

	return $result;
}


/*
 * search_atl_by_branch_age_schedule:
 *
 * Search in ATL database for all the events by
 * program id and schedule id.
 */
function search_atl_by_branch_age_schedule($branch, $age, $schedule) {
	$query = "SELECT DISTINCT ATL_Events.EventID, ATL_Programs.ProgramName FROM ATL_Events, ATL_Programs, ATL_Program_AgeGroup WHERE ATL_Events.PublicityStatus=1 AND ATL_Events.BranchID = '$branch' AND ATL_Events.ScheduledFor = '$schedule' AND ATL_Events.ProgramID=ATL_Programs.ProgramID AND ATL_Programs.ProgramID=ATL_Program_AgeGroup.ProgramID AND ATL_Program_AgeGroup.AgeGroupID='$age' ORDER BY ATL_Programs.ProgramName";

	return mysql_query($query);
}


function search_atl_events_live_by_program($programid)
{
	$result = mysql_query("SELECT * FROM ATL_Events WHERE ATL_Events.PublicityStatus=1 AND ATL_Events.ProgramID = '$programid'");

	return $result;
}


/*
 * search_atl_eventdesc_by_eventid:
 *
 * Search the event details by the event id.
 * The result includes event description I and II, event
 * notes, program id, program name, program description,
 * and program special notes, and branch name.
 */
function search_atl_eventdesc_by_eventid($eventid) {
	$query = "SELECT ATL_Events.ScheduledFor, ATL_Events.BranchID, ATL_Events.Desc_Prefix, ATL_Events.Desc_Suffix, ATL_Events.Registration, ATL_Events.RegRequirement, ATL_Events.Ages, ATL_Events.SpecialNotes AS EventNotes, ATL_Events.ProgramID, ATL_Events.NumPosters, ATL_Events.NumFlyers, ATL_Events.NumBookmarks, ATL_Events.SpecialPubRequest, ATL_Events.SubmittedBy, ATL_Events.ModifiedBy, ATL_Events.LastReviewedBy, ATL_Events.StatusInBranch, ATL_Events.PublicityStatus, ATL_Events.DateUpdated, ATL_Programs.ProgramName, ATL_Programs.Standardized, ATL_Programs.Fee, ATL_Programs.Description, ATL_Programs.Keywords, ATL_Programs.SpecialNotes AS ProgramNotes, ATL_Programs.Status AS ProgramStatus, Branches.BranchName FROM ATL_Events, ATL_Programs, Branches WHERE ATL_Events.EventID='$eventid' AND ATL_Events.ProgramID=ATL_Programs.ProgramID AND ATL_Events.BranchID=Branches.BranchID";

	$result = mysql_query($query);
	return mysql_fetch_array($result);
}


/*
 * search_atl_eventtime_by_eventid:
 *
 * Search the date time for the given event.
 */
function search_atl_eventtime_by_eventid($eventid) {
	$result = mysql_query("SELECT StartDate, EndDate, DayOfWeek, DAYOFMONTH(StartDate) AS StartDayOfMonth, DAYOFMONTH(EndDate) AS EndDayOfMonth, YEAR(StartDate) AS StartYear, YEAR(EndDate) AS EndYear, MONTHNAME(StartDate) AS StartMonth, MONTH(StartDate) AS StartMon_Num, MONTHNAME(EndDate) AS EndMonth, MONTH(EndDate) AS EndMon_Num, HOUR(ATL_Event_Time.StartTime) AS StartHour, MINUTE(ATL_Event_Time.StartTime) AS StartMinute, HOUR(ATL_Event_Time.EndTime) AS EndHour, MINUTE(ATL_Event_Time.EndTime) AS EndMinute, ByAppointment FROM ATL_Event_Time WHERE EventID='$eventid'");

	return $result;
}


/*
 * search_atl_programs_by_schedule:
 *
 * Search in ATL database for all the programs
 * to be held in the given schedule period.
 */
function search_atl_programs_by_schedule($schedule) {
	$result = mysql_query("SELECT DISTINCT ATL_Programs.ProgramID, ATL_Programs.ProgramName FROM ATL_Programs, ATL_Events WHERE ATL_Events.PublicityStatus=1 AND ATL_Programs.ProgramID=ATL_Events.ProgramID AND ATL_Events.ScheduledFor='$schedule' ORDER BY ATL_Programs.ProgramName");

	return $result;
}


/*
 * search_atl_allprograms_live:
 *
 * Search in ATL database for all the live programs,
 * whose events are held in live schedules.
 */
function search_atl_allprograms_live() {
	$result = mysql_query("SELECT DISTINCT ATL_Programs.ProgramID, ATL_Programs.ProgramName FROM ATL_Programs, ATL_Events, ATL_Schedule WHERE ATL_Events.PublicityStatus=1 AND ATL_Programs.ProgramID=ATL_Events.ProgramID AND ATL_Events.ScheduledFor=ATL_Schedule.ScheduleID AND ATL_Schedule.EndDate>=CURDATE() ORDER BY ATL_Programs.ProgramName");

	return $result;
}


/*
 * search_atl_blackhistoryevents_live:
 *
 * Search in ATL database for all the live black history month
 * programs.
 */
function search_atl_blackhistoryevents_live() {
	$result = mysql_query("SELECT ATL_Events.EventID FROM ATL_Programs, ATL_Events, ATL_Event_Time WHERE ATL_Events.PublicityStatus=1 AND (ATL_Programs.Keywords LIKE '%black history month%' or ATL_Programs.Description LIKE '%black history month%' or ATL_Events.Desc_Prefix LIKE '%black history month%' or ATL_Events.Desc_suffix LIKE '%black history month%') AND ATL_Programs.ProgramID=ATL_Events.ProgramID AND ATL_Events.EventID=ATL_Event_Time.EventID AND (ATL_Event_Time.StartDate>=CURDATE() OR ATL_Event_Time.EndDate>=CURDATE()) ORDER BY ATL_Event_Time.StartDate, ATL_Programs.ProgramName");

	return $result;
}



/*
 * search_atl_business_live_schedules:
 *
 * Search in ATL database for all the live schedules
 * for business programs.
 */
function search_atl_business_live_schedules() {

	$result = mysql_query("SELECT DISTINCT ATL_Schedule.ScheduleID, ATL_Schedule.StartDate, ATL_Schedule.EndDate FROM ATL_Schedule, ATL_Events, ATL_Program_Category WHERE ATL_Events.ProgramID=ATL_Program_Category.ProgramID AND ATL_Program_Category.CategoryID=6 AND ATL_Events.ScheduledFor=ATL_Schedule.ScheduleID AND ATL_Schedule.EndDate>=CURDATE() ORDER BY ATL_Schedule.StartDate");

	return $result;
}



/*
 * search_atl_businessprograms_by_schedule:
 *
 * Search in ATL database for all the live business
 * programs by the given schedule.
 */
function search_atl_businessprograms_by_schedule($schedule) {

	$result = mysql_query("SELECT DISTINCT ATL_Programs.ProgramID, ATL_Programs.ProgramName FROM ATL_Programs, ATL_Program_Category, ATL_Events WHERE ATL_Events.PublicityStatus=1 AND ATL_Programs.ProgramID=ATL_Events.ProgramID AND ATL_Events.ScheduledFor='$schedule' AND ATL_Programs.ProgramID=ATL_Program_Category.ProgramID AND ATL_Program_Category.CategoryID=6 ORDER BY ATL_Programs.ProgramName");

	return $result;
}


/*
 * search_atl_specialprograms_by_branch_schedule:
 *
 * Search in ATL database for special
 * programs by the given program category, branch and schedule.
 */
function search_atl_specialprograms_by_branch_schedule($category, $branch, $schedule) {
	$result = mysql_query("SELECT ATL_Programs.ProgramID, ATL_Programs.ProgramName, ATL_Events.EventID FROM ATL_Programs, ATL_Program_Category, ATL_Events WHERE ATL_Events.BranchID='$branch' AND ATL_Events.PublicityStatus=1 AND ATL_Programs.ProgramID=ATL_Program_Category.ProgramID AND ATL_Program_Category.CategoryID='$category' AND ATL_Programs.ProgramID=ATL_Events.ProgramID AND ATL_Events.ScheduledFor='$schedule' ORDER BY ATL_Programs.ProgramName");

	return $result;
}



/*
 * search_atl_specialprograms_sorted_all:
 *
 * Search in ATL database for special
 * programs by the given program category, branch and schedule, and sorted in
 * asc order by event time.
 */
function search_atl_specialprograms_sorted_all($category, $branch, $schedule) {
	$result = mysql_query("SELECT DISTINCT ATL_Events.EventID, ATL_Programs.ProgramName FROM ATL_Programs, ATL_Program_Category, (ATL_Events LEFT JOIN ATL_Event_Time on ATL_Events.EventID = ATL_Event_Time.EventID) WHERE ATL_Events.BranchID='$branch' AND ATL_Events.PublicityStatus=1 AND ATL_Programs.ProgramID=ATL_Program_Category.ProgramID AND ATL_Program_Category.CategoryID='$category' AND ATL_Programs.ProgramID=ATL_Events.ProgramID AND ATL_Events.ScheduledFor='$schedule' ORDER BY ATL_Event_Time.StartDate, ATL_Event_Time.EndDate, ATL_Programs.ProgramName");

	return $result;
}


/*
 * search_atl_specialprograms_by_branch_schedule_age:
 *
 * Search in ATL database for special
 * programs by the given program category, branch, schedule and age group, and
 * sorted in asc order by event time.
 */
function search_atl_specialprograms_by_branch_schedule_age($category, $branch, $schedule, $age) {
	$result = mysql_query("SELECT DISTINCT ATL_Events.EventID, ATL_Programs.ProgramName FROM ATL_Programs, ATL_Program_Category, ATL_Program_AgeGroup, (ATL_Events LEFT JOIN ATL_Event_Time on ATL_Events.EventID = ATL_Event_Time.EventID) WHERE ATL_Events.BranchID='$branch' AND ATL_Events.PublicityStatus=1 AND ATL_Programs.ProgramID=ATL_Program_Category.ProgramID AND ATL_Program_Category.CategoryID='$category' AND ATL_Programs.ProgramID=ATL_Program_AgeGroup.ProgramID AND ATL_Program_AgeGroup.AgeGroupID='$age' AND ATL_Programs.ProgramID=ATL_Events.ProgramID AND ATL_Events.ScheduledFor='$schedule' ORDER BY ATL_Event_Time.StartDate, ATL_Event_Time.EndDate, ATL_Programs.ProgramName");

	return $result;
}



/*
 * search_atl_bloomprograms_by_branch_schedule:
 *
 * Search in ATL database for Communities in Bloom
 * programs by the given branch and schedule.
 */
function search_atl_bloomprograms_by_branch_schedule($branch, $schedule) {
	$result = mysql_query("SELECT ATL_Programs.ProgramID, ATL_Programs.ProgramName, ATL_Events.EventID FROM ATL_Programs, ATL_Program_Category, ATL_Events WHERE ATL_Events.BranchID='$branch' AND ATL_Events.PublicityStatus=1 AND ATL_Programs.ProgramID=ATL_Program_Category.ProgramID AND ATL_Program_Category.CategoryID=16 AND ATL_Programs.ProgramID=ATL_Events.ProgramID AND ATL_Events.ScheduledFor='$schedule' ORDER BY ATL_Programs.ProgramName");

	return $result;
}



/*
 * search_atl_asianheritageprograms_by_branch_schedule:
 *
 * Search in ATL database for Asian Heritage Month
 * programs by the given branch and schedule.
 */
function search_atl_asianheritageprograms_by_branch_schedule($branch, $schedule) {
	$result = mysql_query("SELECT ATL_Programs.ProgramID, ATL_Programs.ProgramName, ATL_Events.EventID FROM ATL_Programs, ATL_Program_Category, ATL_Events, ATL_Event_Time WHERE ATL_Events.BranchID='$branch' AND ATL_Events.PublicityStatus=1 AND ATL_Programs.ProgramID=ATL_Program_Category.ProgramID AND ATL_Program_Category.CategoryID=18 AND ATL_Programs.ProgramID=ATL_Events.ProgramID AND ATL_Events.ScheduledFor='$schedule' AND ATL_Events.EventID=ATL_Event_Time.EventID ORDER BY ATL_Event_Time.StartDate, ATL_Event_Time.StartTime, ATL_Event_Time.EndDate, ATL_Programs.ProgramName");

	return $result;
}



/*
 * search_atl_marchbreakprograms_by_branch_schedule:
 *
 * Search in ATL database for March Break
 * programs by the given branch and schedule.
 */
function search_atl_marchbreakprograms_by_branch_schedule($branch, $schedule) {
	$result = mysql_query("SELECT ATL_Programs.ProgramID, ATL_Programs.ProgramName, ATL_Events.EventID FROM ATL_Programs, ATL_Program_Category, ATL_Events WHERE ATL_Events.BranchID='$branch' AND ATL_Events.PublicityStatus=1 AND ATL_Programs.ProgramID=ATL_Program_Category.ProgramID AND ATL_Program_Category.CategoryID=14 AND ATL_Programs.ProgramID=ATL_Events.ProgramID AND ATL_Events.ScheduledFor='$schedule' ORDER BY ATL_Programs.ProgramName");

	return $result;
}



/*
 * search_atl_familyliteracy_by_branch_schedule:
 *
 * Search in ATL database for the live family literacy
 * programs by branch and schedule.
 */
function search_atl_familyliteracy_by_branch_schedule($branch, $schedule) {
	$result = mysql_query("SELECT ATL_Events.EventID, Branches.BranchName, ATL_Programs.ProgramID, ATL_Programs.ProgramName FROM Branches, ATL_Programs, ATL_Events, ATL_Event_Time WHERE ATL_Events.PublicityStatus=1 AND ATL_Events.ScheduledFor='$schedule' AND ATL_Programs.Keywords LIKE '%family literacy%' AND ATL_Programs.ProgramID=ATL_Events.ProgramID AND ATL_Events.EventID=ATL_Event_Time.EventID AND (ATL_Event_Time.StartDate>=CURDATE() OR ATL_Event_Time.EndDate>=CURDATE()) AND ATL_Events.BranchID='$branch' AND ATL_Events.BranchID=Branches.BranchID ORDER BY ATL_Event_Time.StartDate");

	return $result;
}


/*
 * search_atl_specialprograms_by_schedule_keywords:
 *
 * Search in ATL database for the live special
 * programs by schedule and keyword.
 */
function search_atl_specialprograms_by_schedule_keywords($schedule, $keyword) {
	$result = mysql_query("SELECT DISTINCT ATL_Programs.ProgramID, ATL_Programs.ProgramName, ATL_Programs.Standardized, ATL_Programs.Description FROM ATL_Programs, ATL_Events, ATL_Event_Time WHERE ATL_Events.PublicityStatus=1 AND ATL_Events.ScheduledFor='$schedule' AND (ATL_Programs.SpecialNotes LIKE '%$keyword%' OR ATL_Programs.Keywords LIKE '%$keyword%' OR ATL_Events.SpecialNotes LIKE '%$keyword%') AND ATL_Programs.ProgramID=ATL_Events.ProgramID AND ATL_Events.EventID=ATL_Event_Time.EventID ORDER BY ATL_Event_Time.StartDate, ATL_Event_Time.EndDate, ATL_Programs.ProgramName");

	return $result;
}


/*
 * search_atl_specialprograms_by_branch_schedule_keywords:
 *
 * Search in ATL database for the live special
 * programs by branch and schedule for the given keyword.
 */
function search_atl_specialprograms_by_branch_schedule_keywords($branch, $schedule, $keyword) {
	$result = mysql_query("SELECT ATL_Events.EventID, Branches.BranchName, ATL_Programs.ProgramID, ATL_Programs.ProgramName FROM Branches, ATL_Programs, ATL_Events, ATL_Event_Time WHERE ATL_Events.PublicityStatus=1 AND ATL_Events.ScheduledFor='$schedule' AND (ATL_Programs.SpecialNotes LIKE '%$keyword%' OR ATL_Events.SpecialNotes LIKE '%$keyword%') AND ATL_Programs.ProgramID=ATL_Events.ProgramID AND ATL_Events.EventID=ATL_Event_Time.EventID AND ATL_Events.BranchID='$branch' AND ATL_Events.BranchID=Branches.BranchID ORDER BY ATL_Event_Time.StartDate");

	return $result;
}


// search the branches that offer adult book chat events
// both ongoing and forthcoming
function search_atl_branches_for_adult_bookchats() {

	$query = "SELECT DISTINCT ATL_Events.BranchID, Branches.BranchName FROM Branches, ATL_Events, ATL_Schedule, ATL_Program_Category, ATL_Program_AgeGroup WHERE ATL_Events.ProgramID=ATL_Program_Category.ProgramID AND ATL_Program_Category.CategoryID=3 AND ATL_Events.ProgramID=ATL_Program_AgeGroup.ProgramID AND ATL_Program_AgeGroup.AgeGroupID=3 AND ATL_Events.ScheduledFor=ATL_Schedule.ScheduleID AND ATL_Schedule.EndDate>=CURDATE() AND ATL_Events.BranchID=Branches.BranchID ORDER BY ATL_Events.BranchID";

	return mysql_query($query);
}


// search the adult book chat events by given branch
// both ongoing and forthcoming
function search_atl_adult_bookchats_by_branch($branch) {

	$query = "SELECT ATL_Events.EventID FROM ATL_Events, ATL_Schedule, ATL_Program_Category, ATL_Program_AgeGroup WHERE ATL_Events.ProgramID=ATL_Program_Category.ProgramID AND ATL_Program_Category.CategoryID=3 AND ATL_Events.ProgramID=ATL_Program_AgeGroup.ProgramID AND ATL_Program_AgeGroup.AgeGroupID=3 AND ATL_Events.ScheduledFor=ATL_Schedule.ScheduleID AND ATL_Schedule.EndDate>=CURDATE() AND ATL_Events.BranchID='$branch' AND ATL_Events.PublicityStatus=1 ORDER BY ATL_Events.ScheduledFor";

	return mysql_query($query);
}




function search_atl_by_branch_and_age($branchid, $agegroupid)
{
	$result = mysql_query("SELECT DISTINCT ATL_Events.EventID, ATL_Programs.ProgramName FROM ATL_Events, ATL_Event_Time, ATL_Programs, ATL_Program_AgeGroup WHERE ATL_Events.PublicityStatus=1 AND ATL_Events.EventID = ATL_Event_Time.EventID AND ATL_Events.BranchID = '$branchid' AND (ATL_Event_Time.StartDate>=CURDATE() OR ATL_Event_Time.EndDate>=CURDATE()) AND ATL_Events.ProgramID=ATL_Programs.ProgramID AND ATL_Events.ProgramID=ATL_Program_AgeGroup.ProgramID AND ATL_Program_AgeGroup.AgeGroupID='$agegroupid' ORDER BY ATL_Programs.ProgramName");

	return $result;
}


function search_atl_programs_by_age($agegroupid)
{
	$result = mysql_query("SELECT DISTINCT ATL_Programs.ProgramID, ATL_Programs.ProgramName FROM ATL_Events, ATL_Event_Time, ATL_Programs, ATL_Program_AgeGroup WHERE ATL_Events.PublicityStatus=1 AND ATL_Events.EventID = ATL_Event_Time.EventID AND (ATL_Event_Time.StartDate>=CURDATE() OR ATL_Event_Time.EndDate>=CURDATE()) AND ATL_Events.ProgramID=ATL_Programs.ProgramID AND ATL_Events.ProgramID=ATL_Program_AgeGroup.ProgramID AND ATL_Program_AgeGroup.AgeGroupID='$agegroupid' ORDER BY ATL_Programs.ProgramName");

	return $result;
}


// outdated function
// because some events may not have date/time
function search_atl_branches_by_program($programid)
{
	$result = mysql_query("SELECT DISTINCT ATL_Events.EventID, Branches.BranchName FROM ATL_Events, Branches, ATL_Event_Time WHERE ATL_Events.PublicityStatus=1 AND ATL_Events.ProgramID='$programid' AND ATL_Events.BranchID=Branches.BranchID AND ATL_Events.EventID=ATL_Event_Time.EventID AND (ATL_Event_Time.StartDate>=CURDATE() OR ATL_Event_Time.EndDate>=CURDATE()) ORDER BY Branches.BranchName, ATL_Event_Time.StartDate");

	return $result;
}



// outdated function
// because some events may not have date/time
function search_atl_events_by_program($programid)
{
	$result = mysql_query("SELECT DISTINCT ATL_Events.EventID FROM ATL_Events, ATL_Event_Time, ATL_Programs WHERE ATL_Events.PublicityStatus=1 AND ATL_Events.EventID = ATL_Event_Time.EventID AND ATL_Events.ProgramID = '$programid' AND (ATL_Event_Time.StartDate>=CURDATE() OR ATL_Event_Time.EndDate>=CURDATE()) ORDER BY ATL_Event_Time.StartDate, ATL_Event_Time.StartTime, ATL_Events.BranchID");

	return $result;
}



// outdated function
// because some events may not have date/time
function search_atl_by_branch($branchid) {
	$result = mysql_query("SELECT DISTINCT ATL_Events.EventID, ATL_Programs.ProgramName FROM ATL_Events, ATL_Event_Time, ATL_Programs WHERE ATL_Events.EventID = ATL_Event_Time.EventID AND ATL_Events.PublicityStatus=1 AND ATL_Events.BranchID = '$branchid' AND (ATL_Event_Time.StartDate>=CURDATE() OR ATL_Event_Time.EndDate>=CURDATE()) AND ATL_Events.ProgramID=ATL_Programs.ProgramID ORDER BY ATL_Programs.ProgramName");

	return $result;
}


/*
// outdated function
// because some events may not have date/time
function search_atl_allprograms_live() {
	$result = mysql_query("SELECT DISTINCT ATL_Programs.ProgramID, ATL_Programs.ProgramName FROM ATL_Programs, ATL_Events, ATL_Event_Time WHERE ATL_Events.PublicityStatus=1 AND ATL_Programs.ProgramID=ATL_Events.ProgramID AND ATL_Events.EventID=ATL_Event_Time.EventID AND (ATL_Event_Time.StartDate>=CURDATE() OR ATL_Event_Time.EndDate>=CURDATE()) ORDER BY ATL_Programs.ProgramName");

	return $result;
}
*/



/*************************************************
 *                                               *
 *             VaughanLink Queries               *
 *                                               *
 *************************************************/
function search_vaughanlink_group_by_id($groupid)
{
	$sql = "SELECT * FROM CommunityGroups WHERE GroupId=$groupid";

	$result = mysql_query($sql);
	return mysql_fetch_array($result);
}


function get_vaughanlink_allgroups() {
	$result = mysql_query("SELECT * FROM CommunityGroups WHERE Live=1 ORDER by GroupName");
	return $result;
}


function search_vaughanlink_volunteers() {
	$result = mysql_query("SELECT * FROM CommunityGroups WHERE Live=1 AND CallForVolunteers=1 ORDER by GroupName");
	return $result;
}


function search_vaughanlink_groups_by_type($typeid) {
	$result = mysql_query("SELECT * FROM CommunityGroups WHERE Live=1 AND GroupType='$typeid' ORDER by GroupName");
	return $result;
}


function get_vaughanlink_grouptypes() {
	$result = mysql_query("SELECT * FROM CommunityGroupType ORDER by GroupType");
	return $result;
}

function search_vaughanlink_grouptypes_in_use() {
	$result = mysql_query("SELECT DISTINCT CommunityGroups.GroupType AS GroupTypeId, CommunityGroupType.GroupType FROM CommunityGroups, CommunityGroupType WHERE CommunityGroups.GroupType=CommunityGroupType.GroupTypeId AND CommunityGroups.lIVE=1 ORDER BY CommunityGroupType.GroupType");
	return $result;
}

function search_vaughanlink_grouptype_by_id($id) {
	$result = mysql_query("SELECT * FROM CommunityGroupType WHERE GroupTypeId='$id'");
	if ($myrow = mysql_fetch_array($result)) {
		return $myrow['GroupType'];
	} else {
		return NULL;
	}
}


function insert_new_group($group) {
	$query = "INSERT INTO CommunityGroups (SpecialName, SpecialWord, ContactName, ContactEmail, ContactTelephone, GroupName, Address, City, Province, PostalCode, Telephone, TollFree, Teletype, Email, Url, Summary, GroupType, MeetingInfo, MeetingLocation, UpcomingEvent, UpcomingEventTitle, UpcomingEventDate, UpcomingEventDesc, UpcomingEventEndDate, Languages, Fees, FeeDescription, DisabilityAccess, AccessDescription, CallForVolunteers, VolunteerPositionTitle, VolunteerPositionDesc, VolunteerPositionEndDate, Comments, DatePosted, DateUpdated, Logged, Live) VALUES (NULL, NULL, '" . $group['ContactName'] . "', '" . $group['ContactEmail'] . "', '" . $group['ContactTelephone'] . "', '" . $group['GroupName'] . "', ";

	if ($group['Address'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['Address'] . "'";
	}
	$query .= ", '" . $group['City'] . "', ";

	if ($group['Province'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['$Province'] . "'";
	}
	$query .= ", ";

	if ($group['PostalCode'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['PostalCode'] . "'";
	}
	$query .= ", ";

	if ($group['Telephone'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['Telephone'] . "'";
	}
	$query .= ", ";

	if ($group['TollFree'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['TollFree'] . "'";
	}
	$query .= ", ";

	if ($group['Teletype'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['Teletype'] . "'";
	}
	$query .= ", ";

	if ($group['Email'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['Email'] . "'";
	}
	$query .= ", ";

	if ($group['Url'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['Url'] . "'";
	}
	$query .= ", ";

	if ($group['Summary'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['Summary'] . "'";
	}
	$query .= ", " . $group['GroupType'] . ", ";

	if ($group['MeetingInfo'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['MeetingInfo'] . "'";
	}
	$query .= ", ";

	if ($group['MeetingLocation'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['MeetingLocation'] . "'";
	}
	$query .= ", " . $group['UpcomingEvent'] . ", ";

	if ($group['UpcomingEventTitle'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['UpcomingEventTitle'] . "'";
	}
	$query .= ", '" . $group['UpcomingEventDate'] . "', ";

	if ($group['UpcomingEventDesc'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['UpcomingEventDesc'] . "'";
	}
	$query .= ", '" . $group['UpcomingEventEndDate'] . "', ";

	if ($group['Languages'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['Languages'] . "'";
	}
	$query .= ", " . $group['Fees'] . ", ";

	if ($group['FeeDescription'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['FeeDescription'] . "'";
	}
	$query .= ", " . $group['Access'] . ", ";

	if ($group['AccessDescription'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['AccessDescription'] . "'";
	}
	$query .= ", " . $group['CallForVolunteers'] . ", ";

	if ($group['VolunteerPositionTitle'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['VolunteerPositionTitle'] . "'";
	}
	$query .= ", ";

	if ($group['VolunteerPositionDesc'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['VolunteerPositionDesc'] . "'";
	}
	$query .= ", '" . $group['VolunteerPositionEndDate'] . "', ";

	if ($group['Comments'] == "") {
		$query .= "NULL";
	} else {
		$query .= "'" . $group['Comments'] . "'";
	}
	$query .= ", CURDATE(), CURDATE(), NOW(), 0)";

	return mysql_query($query);
}

function search_vaughanlink_login($login) {
	$SpecialName = $login['user'];
	$SpecialWord = $login['password'];
	$GroupName = $login['group'];

	$result = mysql_query("SELECT * FROM CommunityGroups WHERE SpecialName='$SpecialName' AND SpecialWord='$SpecialWord' AND GroupName='$GroupName'");

	return mysql_fetch_array($result);
}


function update_vaughanlink_group($group) {
	$query = "UPDATE CommunityGroups SET SpecialName='" . $group['SpecialName'] . "', SpecialWord='" . $group['SpecialWord'] . "', ContactName='" . $group['ContactName'] . "', ContactEmail='" . $group['ContactEmail'] . "', ContactTelephone='" . $group['ContactTelephone'] . "', GroupName='" . $group['GroupName'] . "', Address='" . $group['Address'] . "', City='" . $group['City'] . "', Province='" . $group['Province'] . "', PostalCode='" . $group['PostalCode'] . "', Telephone='" . $group['Telephone'] . "', TollFree='" . $group['TollFree'] . "', Teletype='" . $group['Teletype'] . "', Email='" . $group['Email'] . "', Url='" . $group['Url'] . "', Summary='" . $group['Summary'] . "', GroupType=" . $group['GroupType']. ", MeetingInfo='" . $group['MeetingInfo'] . "', MeetingLocation='" . $group['MeetingLocation'] . "', UpcomingEvent=" . $group['UpcomingEvent'] . ", UpcomingEventTitle='" . $group['UpcomingEventTitle'] . "', UpcomingEventDate='" . $group['UpcomingEventDate'] . "', UpcomingEventDesc='" . $group['UpcomingEventDesc'] . "', UpcomingEventEndDate='" . $group['UpcomingEventEndDate'] . "', Languages='" . $group['Languages'] . "', Fees=" . $group['Fees'] . ", FeeDescription='" . $group['FeeDescription'] . "', DisabilityAccess=" . $group['Access'] . ", AccessDescription='" . $group['AccessDescription'] . "', CallForVolunteers=" . $group['CallForVolunteers'] . ", VolunteerPositionTitle='" . $group['VolunteerPositionTitle'] . "', VolunteerPositionDesc='" . $group['VolunteerPositionDesc'] . "', VolunteerPositionEndDate='" . $group['VolunteerPositionEndDate'] . "', Comments='" . $group['Comments'] . "', DateUpdated=CURDATE(), Logged=NOW() WHERE GroupId='" . $group['GroupId'] . "'";

	return mysql_query($query);
}


// Full text search by the given keyword. Relevance
// score of each record is also returned with group id.
function search_vaughanlink_group_fulltext($keyword) {

	$query = "SELECT GroupId, GroupName, MATCH (GroupName, Summary, Comments, UpcomingEventDesc, UpcomingEventTitle, VolunteerPositionDesc, VolunteerPositionTitle, ContactName, City, MeetingInfo, Languages, AccessDescription) AGAINST ('$keyword') AS Relevance FROM CommunityGroups WHERE MATCH (GroupName, Summary, Comments, UpcomingEventDesc, UpcomingEventTitle, VolunteerPositionDesc, VolunteerPositionTitle, ContactName, City, MeetingInfo, Languages, AccessDescription) AGAINST ('$keyword') AND Live=1";

	return mysql_query($query);
}


// Full text search in table CommunityGroupType.
// Relevance score is returned with group id.
function search_vaughanlink_type_fulltext($keyword) {

	$query = "SELECT CommunityGroups.GroupId, CommunityGroups.GroupName, MATCH (CommunityGroupType.GroupType) AGAINST ('$keyword') AS Relevance FROM CommunityGroups, CommunityGroupType WHERE MATCH (CommunityGroupType.GroupType) AGAINST ('$keyword') AND CommunityGroups.GroupType=CommunityGroupType.GroupTypeId AND CommunityGroups.Live=1";

	return mysql_query($query);
}




/*************************************************
 *                                               *
 *          Recommended Reads Queries            *
 *                                               *
 *************************************************/

function search_books_for_bookclubs_by_level($level)
{
	$query = "SELECT * FROM Books_For_BookClubs WHERE Level='$level' ORDER BY Title";

	return mysql_query($query);
}

function search_books_for_bookclubs_by_id($id)
{
	$result = mysql_query("SELECT * FROM Books_For_BookClubs WHERE BookID='$id' ORDER BY Title");

	return mysql_fetch_array($result);
}







/*************************************************
 *                                               *
 *                    eproducts                  *
 *                                               *
 *************************************************/

function search_all_eproducts() {

	$result = mysql_query("SELECT * FROM Eproducts ORDER BY Name");
	return $result;
}


// later than subscription date and earlier than expiration date
function search_available_eproducts() {

	$result = mysql_query("SELECT * FROM Eproducts ORDER BY Name");
	return $result;
}

function search_eproducts_by_nameletter($start_ch, $end_ch) {

	$result = mysql_query("SELECT * FROM Eproducts WHERE SUBSTRING(Name,1,1)>='$start_ch' AND SUBSTRING(Name,1,1)<='$end_ch' ORDER BY Name");


	return $result;
}

function search_eproduct_by_id($productid) {
	$result = mysql_query("SELECT * FROM Eproducts WHERE EproductID='$productid'");
	return mysql_fetch_array($result);
}

function search_eproducts_by_area($areaid) {
	$result = mysql_query("SELECT Eproducts.EproductID, Eproducts.Name, Eproducts.Short, Eproducts.URL, Eproducts.Availability, Eproducts.Description, Eproducts.DateSubscripted, Eproducts.DateExpired FROM Eproducts, Eproduct_SiteArea WHERE Eproducts.EproductID=Eproduct_SiteArea.EproductID AND Eproduct_SiteArea.AreaID='$areaid' AND Eproducts.Live='1' ORDER BY Eproducts.Name");

	return $result;
}


function search_eproducts_all_categories() {

	$result = mysql_query("SELECT * FROM Eproducts_Categories ORDER BY CategoryName");
	return $result;
}


function search_eproducts_by_category($categoryID) {

	$result = mysql_query("SELECT Eproducts.EproductID, Eproducts.Name, Eproducts.Short, Eproducts.URL, Eproducts.Availability, Eproducts.Description, Eproducts.DateSubscripted, Eproducts.DateExpired FROM Eproducts, Eproduct_Category WHERE Eproducts.EproductID=Eproduct_Category.EproductID AND Eproduct_Category.CategoryID='$categoryID' ORDER BY Eproducts.Name");

	return $result;
}

function search_eproduct_category_by_categoryid($categoryID) {
	$result = mysql_query("SELECT * FROM Eproducts_Categories WHERE CategoryID='$categoryID'");

	return mysql_fetch_array($result);
}

/*************************************************
 *                                               *
 *          phplist eNewsletters Queries            *
 *                                               *
 *************************************************/

function search_enewsletters_by_issue($msgID) {
	$result = mysql_query("SELECT * FROM phplist_message WHERE id='$msgID'");

	return mysql_fetch_array($result);
}

?>