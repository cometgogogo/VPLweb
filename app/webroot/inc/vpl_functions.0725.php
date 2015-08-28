<?php

/*
 * File: vpl_functions.php
 * Description: defines the general functions used in VPL site
 *
 * Date: June 14, 2005
 * Author: Yue Sun
 */

include_once("vpl_dbqueries.php");

function get_branches_selectlist()
{
	?>
	<select name="branch">
	<option value="0">Select a library branch</option>

	<?php
	$branches = get_all_public_branches();
	while ($mybranch = mysql_fetch_array($branches)) {

		echo "<option value=\"", $mybranch['BranchID'], "\">", $mybranch['BranchName'], "</option>";
	}
	?>

	</select>
	<?php
}


// generate a html select list of days of a week
// if $selected=1, that means this list is used in an edit
// form, and $selectVal is the selected value
function get_dayofweek_selectlist($selected, $selectVal) {

	$week = array("N/A", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

	$list = "";

	for ($i=0; $i<8; $i++) {

		$list .= "<option value=\"";
		$list .= $week[$i] . "\"";

		if ($selected && ($selectVal==$week[$i])) {
			$list .= " selected";
		}

		$list .= ">" . $week[$i] . "</option>";
	}
	$list .= "</select>";
	return $list;
}



function get_year_selectlist($selected, $selectVal) {

	$this_year = date('Y');
	$next_year = date('Y')+1;

	$list = "<option value=\"" . $this_year . "\"";

	if ($selected && ($selectVal==$this_year)) {
		$list .= " selected";
	}

	$list .= ">" . $this_year . "</option>";

	$list .= "<option value=\"" . $next_year . "\"";

	if ($selected && ($selectVal==$next_year)) {
		$list .= " selected";
	}

	$list .= ">" . $next_year . "</option>";

	return $list;
}


function get_monthnames_list($selected, $selectVal) {

	$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

	$list = "<option value=\"0\">--- Select ---</option>";

	for ($i=1; $i<=12; $i++) {

		$list .= "<option value=\"";
		$list .= $i . "\"";

		if ($selected && ($selectVal==$i)) {
			$list .= " selected";
		}

		$list .= ">" . $months[$i-1] . "</option>";
	}
	$list .= "</select>";
	return $list;
}



function get_months_selectlist($selected, $selectVal) {
	$list = "<option value=\"0\"> --- </option>";

	for ($i=1; $i<=12; $i++) {
		$monStr = "";
		if ($i<10) {
			$monStr .= "0";
		}
		$monStr .= $i;

		$list .= "<option value=\"";
		$list .= $i . "\"";

		if ($selected && ($selectVal==$i)) {
			$list .= " selected";
		}
		$list .= ">" . $monStr . "</option>";
	}

	return $list;
}


function get_dayofmonth_selectlist($selected, $selectVal) {

	$list = "<option value=\"0\"> --- </option>";

	for ($i=1; $i<=31; $i++) {
		$dayStr = "";
		if ($i<10) {
			$dayStr .= "0";
		}
		$dayStr .= $i;

		$list .= "<option value=\"";
		$list .= $i . "\"";

		if ($selected && ($selectVal==$i)) {
			$list .= " selected";
		}
		$list .= ">" . $dayStr . "</option>";
	}

	return $list;
}



/*
 * get_timeslots_selectlist_public
 *
 * return a list of time slot options
 * Starts from $first to $end, every $interval is
 * a slot. $first, $end, and $interval all in minutes
 * if $selected=1, it is in edit mode
 */
function get_timeslots_selectlist_public($first, $end, $interval, $selected, $selectVal) {

	$list = "<option value=0";
	if ($selected && ($selectVal==0)) {
		$list .= " selected";
	}
	$list .= ">N/A</option>";

	$time = $first;
	while ($time < $end) {

		$timeStr = format_time_webform($time);

		$list .= "<option value=\"" . $time . "\"";

		if ($selected && ($selectVal==$time)) {
			$list .= " selected";
		}

		$list .= ">" . $timeStr . "</option>";

		$time += $interval;
	}


	$list .= "<option value=\"" . $end . "\"";

	if ($selected && ($selectVal==$end)) {
		$list .= " selected";
	}

	$list .= ">" . format_time_webform($end) . "</option>";

	return $list;
}



/*
 * format_date_db:
 *
 * The given year, mon, day are formated to
 * yyyy-mm-dd
 * to be used while inserting into database
 */
function format_date_db($year, $mon, $day) {
	$date_str = $year."-";
	if ($mon < 10) {
		$date_str .= "0";
	}
	$date_str .= $mon."-";
	if ($day<10) {
		$date_str .= "0";
	}
	$date_str .= $day;

	return $date_str;
}


/*
 * format_time_webform:
 *
 * The given minutes are formated to
 * hh:mm am or pm, 0<=h<=12
 * to be used on online forms
 */
function format_time_webform($mins) {

	$timeStr = "";
	$minStr = "";
	$suffix = "";

	$hr = floor($mins / 60);
    $min = $mins - ($hr * 60);

    if ($hr >= 12) {
    	$suffix = " pm";
    } else {
    	$suffix = " am";
    }

    if ($min < 10) {
    	$minStr .= "0";
    }
    $minStr .= $min;

	if ($hr > 12) {
		$hr -= 12;
	}

	$timeStr .= $hr . ":" . $minStr . $suffix;


	return $timeStr;
}


/*
 * format_time_db:
 *
 * The given minutes are formated to
 * hh:mm:00, 0<=h<=24
 * to be used while inserting into database
 */
function format_time_db($mins) {

	$timeStr = "";
	$minStr = "";
	$hrStr = "";

	if ($mins == 1) { // by appointment
		$mins = 0;
	}

	$hr = floor($mins / 60);
    $min = $mins - ($hr * 60);

    if ($hr < 10) {
    	$hrStr .= "0";
    }
    $hrStr .= $hr;

    if ($min < 10) {
    	$minStr .= "0";
    }
    $minStr .= $min;

	$timeStr .= $hrStr . ":" . $minStr . ":00";


	return $timeStr;
}

function getDatesByDayOfWeek($dayofweek, $start, $end){
	$str="next ". $dayofweek;
	$startDate = strtotime( $str, strtotime($start) );
	$endDate= strtotime($end);
	$dates = array();
	// Output all Thursdays prior to our end date
	while ($startDate < $endDate) {

		array_push($dates, date('Y-m-d', $startDate ));

		// Get next Tuesday relative to last Tuesday
		$startDate = strtotime( $str, $startDate );
	}
	return $dates;
}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}

/***********************************************
 *                                             *
 *        Recpmmended Links Functions          *
 *                                             *
 ***********************************************
 */

function print_recommended_link($link) {

	echo "<p class=\"body-paragraph-text\">";

	echo "<span class=\"body-paragraph-text-bold\"><a href=\"".$link["UrlOfWebsite"]."\" class=\"body-link\" target=\"_blank\">".$link["TitleOfWebsite"]."</a></span><br/>";

	echo $link["Description"]."<br /><span class=\"body-paragraph-text-small\">Prepared By:&nbsp;".$link["WebsitePublisher"]."</span><br />";

	echo "<span class=\"body-paragraph-text-small\">Date Reviewed by VPL: ".$link["DateUpdated"]."</span></p>";
}


/***********************************************
 *                                             *
 *               ATL Functions                 *
 *                                             *
 ***********************************************
 */

function get_atl_registration_str($RegID, $RegDetail) {

	$reg_rqmt = "";

	switch ($RegID) {
		case 0:
			$reg_rqmt = "";
			break;

		case 1:
			$reg_rqmt .= "No registration required.";
			break;

		case 2:
			$reg_rqmt .= "Please pre-register " . $RegDetail . ".";
			break;

		case 3:
			$reg_rqmt .= "Please pick up tickets ". $RegDetail . ".";
			break;

		case 4:
			$reg_rqmt .= "Please contact the " . $RegDetail . " to book your appointment.";
			break;

		case 5:
			$reg_rqmt .= "Please pick up an application form ". $RegDetail . ".";
			break;
	}

	return $reg_rqmt;
}



function print_atl_event_public($eventid, $agegroup)
{

	// styles
	switch ($agegroup) {

		case 1:
			$link_style = "infozone-nav-link";
			$body_text_style = "infozone-content";
			$heading_style = "infozone-content-bold";
			break;

		case 2:
			$link_style = "teen_link";
			$body_text_style = "teen_body_paragraph_text";
			$heading_style = "teen_sub_heading";
			break;

		case 3:
			$link_style = "body-link";
			$body_text_style = "body-paragraph-text";
			$heading_style = "paragraph-heading";
			break;
	}

	$eventDesc = search_atl_eventdesc_by_eventid($eventid);

	if ($result = search_atl_eventtime_by_eventid($eventid)) {
		$dateTimeArray = get_atl_datetimearray($result);
	} else {
		$dateTimeArray = array();
	}

	if (($eventDesc['Registration']==2) || ($eventDesc['Registration']==3) || ($eventDesc['Registration']==5)) {
		// preregister, pick up tickets, application form

		$locations = explode(", ", $eventDesc['RegRequirement']);

		$location_row = search_atl_registration_location($locations[0]);

		if ($locations[0] == 5) { // elibrary
			$reg_detail .= "<a href=\"http://www.vaughanpl.info\" target=\"_blank\">" . $location_row['Location'] . "</a>";
		} else {
			$reg_detail = "at the ".$location_row['Location'];
		}

		for ($i=1; $i<count($locations); $i++) {

			$location_row = search_atl_registration_location($locations[$i]);
			$reg_detail .= " or ";

			if ($locations[$i] == 5) { // elibrary

				$reg_detail .= "<a href=\"http://www.vaughanpl.info\" target=\"_blank\" class=\"".$link_style."\">" . $location_row['Location'] . "</a>";
			} else {

				$reg_detail .= "at the ".$location_row['Location'];
			}
		}

	} else if ($eventDesc['Registration']==4) {


		switch ($eventDesc['RegRequirement']) {
			case 1:
			$reg_detail = "Adult Services Librarian";
			break;

			case 2:
			$reg_detail = "Youth Services Librarian";
			break;

			case 3:
			$reg_detail = "Business Services Librarian";
			break;
		}
		//$reg_detail = $eventDesc['RegRequirement'];

	} else {
		$reg_detail = "";
	}

	$reg_rqmt = get_atl_registration_str($eventDesc['Registration'], $reg_detail);

	?>

	<p>

	<?php
	echo "<span class=", $heading_style, "><a name=".$eventid.">", $eventDesc["ProgramName"], "</a></span><br/>";
	if (isset($eventDesc["BranchName"])) {
		echo "<span class=", $body_text_style, ">", $eventDesc["BranchName"], "</span><br/>";
	}

	$time_str = format_atl_date_time($dateTimeArray);
	if (!empty($time_str)) {
		echo "<span class=", $body_text_style, ">", format_atl_date_time($dateTimeArray), "</span>";
	}
	echo "<br/>";

	echo "<span class=", $body_text_style, ">";
	if (isset($eventDesc["Desc_Prefix"])) {
		echo $eventDesc["Desc_Prefix"], " ";
	}

	echo $eventDesc["Description"];

	if (isset($eventDesc["Desc_Suffix"])) {
		echo " ", $eventDesc["Desc_Suffix"];
	}

	echo "<br/><br/>";
	if (isset($eventDesc["Ages"])) {
		if ($eventDesc["Ages"]!="") {
			$eventDesc['Ages'] = ucfirst($eventDesc['Ages']);
		}
		if (($eventDesc["Ages"]!="") && (substr($eventDesc['Ages'], -1, 1) != ".")) {
			$eventDesc['Ages'] .= ".";
		}
		$reg_rqmt = $eventDesc["Ages"] . " " . $reg_rqmt;
	}

	if ($eventDesc['Fee'] > 0) {
		$reg_rqmt = "Admission is $" . $eventDesc['Fee'] . ". " . $reg_rqmt;
	}

	echo $reg_rqmt;

	if (isset($eventDesc["ProgramNotes"]) && ($eventDesc["ProgramNotes"]!="") && ($eventDesc["ProgramNotes"]!="N/A")) {

		if (!empty($reg_rqmt)) echo "<br/><br/>";

		echo "* <i>", $eventDesc["ProgramNotes"], "</i>";
	}
	if (isset($eventDesc["EventNotes"]) && ($eventDesc["EventNotes"]!="") && ($eventDesc["EventNotes"]!="N/A")) {

		if (!empty($eventDesc["ProgramNotes"])) {
			echo "<br/><br/>";
		} else if (!empty($reg_rqmt)) {
			echo "<br/><br/>";
		}

		echo "<i>", $eventDesc["EventNotes"], "</i>";
	}
	echo "</span>";
	?>

<!--
	<table width="100%">
		<tr><td class="<?php echo $heading_style; ?>"><?php echo $eventDesc["ProgramName"] ?></td></tr>
		<tr><td class="<?php echo $body_text_style; ?>"><?php echo $eventDesc["BranchName"] ?></td></tr>
		<tr><td class="<?php echo $body_text_style; ?>"><?php echo format_atl_date_time($dateTimeArray); ?></td></tr>

		<tr><td>&nbsp;</td></tr>

		<tr><td class="<?php echo $body_text_style; ?>">
		<?php
			if (isset($eventDesc["Desc_Prefix"])) {
				echo $eventDesc["Desc_Prefix"], " ";
			}

			echo $eventDesc["Description"];

			if (isset($eventDesc["Desc_Suffix"])) {
				echo " ", $eventDesc["Desc_Suffix"];
			}

			echo "<br/><br/>";
			if (isset($eventDesc["Ages"])) {
				echo $eventDesc["Ages"], " ";
			}

			if ($eventDesc['Fee'] == 0) {
				//echo "free. ";
				echo "";
			} else {
				echo "Admission is $", $eventDesc['Fee'], ". ";
			}

			echo $reg_rqmt;

			if (isset($eventDesc["ProgramNotes"]) && ($eventDesc["ProgramNotes"]!="")) {
				echo "<br/><br/>* <i>", $eventDesc["ProgramNotes"], "</i>";
			}
			if (isset($eventDesc["EventNotes"]) && ($eventDesc["EventNotes"]!="")) {
				echo "<br/><br/><i>", $eventDesc["EventNotes"], "</i>";
			}
		?>
		</td></tr>
	</table>
-->
	</p>
	<?php
}



function print_atl_event_detail($eventid)
{

	$output = "";

	$eventDesc = search_atl_eventdesc_by_eventid($eventid);


	// the date/time
	if ($result = search_atl_eventtime_by_eventid($eventid)) {
		$dateTimeArray = get_atl_datetimearray($result);
	} else {
		$dateTimeArray = array();
	}
	$time_str = format_atl_date_time($dateTimeArray);
	if (!empty($time_str)) {
		$output.= format_atl_date_time($dateTimeArray)."<br/>";
	}

	// the descriptions
	if (isset($eventDesc["Desc_Prefix"])) {
		$output.= $eventDesc["Desc_Prefix"]." ";
	}

	$output.= $eventDesc["Description"];

	if (isset($eventDesc["Desc_Suffix"])) {
		$output.= " ".$eventDesc["Desc_Suffix"];
	}


	// the registration/age requirements
	if (($eventDesc['Registration']==2) || ($eventDesc['Registration']==3) || ($eventDesc['Registration']==5)) {
		// preregister, pick up tickets, application form

		$locations = explode(", ", $eventDesc['RegRequirement']);

		$location_row = search_atl_registration_location($locations[0]);

		if ($locations[0] == 5) { // elibrary
			$reg_detail = "<a href=\"http://www.vaughanpl.info\" target=\"_blank\">" . $location_row['Location'] . "</a>";
		} else {
			$reg_detail = $location_row['Location'];
		}

		for ($i=1; $i<count($locations); $i++) {

			$location_row = search_atl_registration_location($locations[$i]);
			$reg_detail .= " or ";

			if ($locations[$i] == 5) { // elibrary

				$reg_detail .= "<a href=\"http://www.vaughanpl.info\" target=\"_blank\">" . $location_row['Location'] . "</a>";
			} else {

				$reg_detail .= $location_row['Location'];
			}
		}

	} else if ($eventDesc['Registration']==4) {


		switch ($eventDesc['RegRequirement']) {
			case 1:
			$reg_detail = "Adult Services Librarian";
			break;

			case 2:
			$reg_detail = "Youth Services Librarian";
			break;

			case 3:
			$reg_detail = "Business Services Librarian";
			break;
		}
		//$reg_detail = $eventDesc['RegRequirement'];

	} else {
		$reg_detail = "";
	}

	$reg_rqmt = get_atl_registration_str($eventDesc['Registration'], $reg_detail);

	if (isset($eventDesc["Ages"])) {
		if ($eventDesc["Ages"]!="") {
			$eventDesc['Ages'] = ucfirst($eventDesc['Ages']);
		}
		if (($eventDesc["Ages"]!="") && (substr($eventDesc['Ages'], -1, 1) != ".")) {
			$eventDesc['Ages'] .= ".";
		}
		$reg_rqmt = $eventDesc["Ages"] . " " . $reg_rqmt;
	}

	if ($eventDesc['Fee'] > 0) {
		$reg_rqmt = "Admission is $" . $eventDesc['Fee'] . ". " . $reg_rqmt;
	}

	$output .= " ".$reg_rqmt;

	if (isset($eventDesc["ProgramNotes"]) && ($eventDesc["ProgramNotes"]!="")) {

		if (!empty($reg_rqmt)) $output.= "<br/><br/>";

		$output.= "* <i>".$eventDesc["ProgramNotes"]."</i>";
	}
	if (isset($eventDesc["EventNotes"]) && ($eventDesc["EventNotes"]!="")) {

		if (!empty($eventDesc["ProgramNotes"])) {
			$output.= "<br/><br/>";
		} else if (!empty($reg_rqmt)) {
			$output.= "<br/><br/>";
		}

		$output.= "<i>".$eventDesc["EventNotes"]."</i>";
	}

	return $output;
}



function print_atl_event_adult($eventid)
{

	$eventDesc = search_atl_eventdesc_by_eventid($eventid);

	if ($result = search_atl_eventtime_by_eventid($eventid)) {
		$dateTimeArray = get_atl_datetimearray($result);
	} else {
		$dateTimeArray = array();
	}

	if (($eventDesc['Registration']==2) || ($eventDesc['Registration']==3) || ($eventDesc['Registration']==5)) {
		// preregister, pick up tickets, application form

		$locations = explode(", ", $eventDesc['RegRequirement']);

		$location_row = search_atl_registration_location($locations[0]);
		$reg_detail = $location_row['Location'];

		for ($i=1; $i<count($locations); $i++) {

			$location_row = search_atl_registration_location($locations[$i]);
			$reg_detail .= " or ";

			if ($locations[$i] == 5) { // elibrary

				$reg_detail .= "<a href=\"http://www.vaughanpl.info\" target=\"_blank\">" . $location_row['Location'] . "</a>";
			} else {

				$reg_detail .= $location_row['Location'];
			}
		}

	} else if ($eventDesc['Registration']==4) {

		/*
		switch ($eventDesc['RegRequirement']) {
			case 1:
			$reg_detail = "Adult Services Librarian";
			break;

			case 2:
			$reg_detail = "Youth Services Librarian";
			break;

			case 3:
			$reg_detail = "Business Services Librarian";
			break;
		}*/
		$reg_detail = $eventDesc['RegRequirement'];

	} else {
		$reg_detail = "";
	}

	$reg_rqmt = get_atl_registration_str($eventDesc['Registration'], $reg_detail);

	?>
	<!--
	<table width="100%">
		<tr><td class="paragraph-heading"><?php echo $eventDesc["ProgramName"] ?></td></tr>
		<tr><td class="paragraph-heading-small"><?php echo $eventDesc["BranchName"] ?></td></tr>
	</table>

	<?php echo format_atl_date_time($dateTimeArray, "body-paragraph-text"); ?>

	<br/>

	<table width="100%">
	-->

	<table width="100%">
		<tr><td class="paragraph-heading"><?php echo $eventDesc["ProgramName"] ?></td></tr>
		<tr><td class="paragraph-heading-small"><?php echo $eventDesc["BranchName"] ?></td></tr>
		<tr><td class="body-paragraph-text"><?php echo format_atl_date_time($dateTimeArray); ?></td></tr>

		<tr><td>&nbsp;</td></tr>

		<tr><td class="body-paragraph-text">
		<?php
			if (isset($eventDesc["Desc_Prefix"])) {
				echo $eventDesc["Desc_Prefix"], " ";
			}

			echo $eventDesc["Description"];

			if (isset($eventDesc["Desc_Suffix"])) {
				echo " ", $eventDesc["Desc_Suffix"];
			}

			echo "<br/><br/>";
			if (isset($eventDesc["Ages"])) {
				echo $eventDesc["Ages"], " ";
			}

			if ($eventDesc['Fee'] == 0) {
				//echo "free. ";
				echo "";
			} else {
				echo "Admission is $", $eventDesc['Fee'], ". ";
			}

			echo $reg_rqmt;

			if (isset($eventDesc["ProgramNotes"]) && ($eventDesc["ProgramNotes"]!="") && ($eventDesc["ProgramNotes"]!="N/A")) {
				echo "<br/><br/>* <i>", $eventDesc["ProgramNotes"], "</i>";
			}
			if (isset($eventDesc["EventNotes"]) && ($eventDesc["EventNotes"]!="") && ($eventDesc["EventNotes"]!="N/A")) {
				echo "<br/><br/><i>", $eventDesc["EventNotes"], "</i>";
			}
		?>
		</td></tr>
	</table>

	<?php
}



/*
 * event_closed:
 *
 * Return true if the given event has finished;
 * otherwise, return false.
 */
function event_closed($eventid) {
	$closed = 0;

	if ($result = search_atl_eventtime_by_eventid($eventid)) {
		// mytime is an array
		while ($mytime = mysql_fetch_array($result)) {
			if (($mytime['EndMon_Num']==0) && ($mytime['EndDayOfMonth']==0)) {
				$closed = 0;
				return false;
			}
			$timestamp_end = strtotime($mytime['EndDate']);

			$today = mktime(0, 0, 0, date("m"), date("d"), date("Y"));;

			if ($timestamp_end<$today) {
				$closed = 1;
			} else {
				$closed = 0;
				return false;
			}
		}
	}

	if ($closed == 1) return true;
	else return false;
}


/*
 * has_open_events:
 *
 * Return true if the given program has any open
 * events; otherwise, return false.
 */
function has_open_events($programid, $schedule) {
	$result = search_atl_events_by_program_schedule($programid, $schedule);

	while ($myevent = mysql_fetch_array($result)) {
		if (!event_closed($myevent['EventID'])) {
			return true;
		}
	}
	return false;
}


/*
 * branch_open_events:
 *
 * Return true if the given branch has any open
 * events in the given scheduled period; otherwise,
 * return false.
 */
function branch_open_events($branchid, $schedule) {
	$result = search_atl_events_by_branch_schedule($branchid, $schedule);

	while ($myevent = mysql_fetch_array($result)) {
		if (!event_closed($myevent['EventID'])) {
			if (($branchid==2) && ($schedule==1)) {
			echo "open ", $myevent['EventID'], "<br/>";
			}
			return true;
		}
	}
	return false;
}


/*
 * has_open_events_for_age:
 *
 * Return true if the given branch has any open
 * events for the given age group in the given
 * scheduled period; otherwise, return false.
 */
function has_open_events_for_age($branchid, $age, $schedule) {
	$result = search_atl_by_branch_age_schedule($branchid, $age, $schedule);

	while ($myevent = mysql_fetch_array($result)) {
		if (!event_closed($myevent['EventID'])) {
			return true;
		}
	}
	return false;
}


/*
 * format_atl_schedule_from_db:
 *
 * Format start date and end date that are retrieved
 * from the database table ATL_Schedule to be
 * displayed on the web page
 * params are strings yyyy-mm-dd
 * Return a string: start month name year - end month
 * name year, e.g., December 2005 - February 2006
 */
function format_atl_schedule_from_db($start, $end) {
	$start_mon = date('F', strtotime($start));
	$start_year = date('Y', strtotime($start));
	$end_mon = date('F', strtotime($end));
	$end_year = date('Y', strtotime($end));

	$str = $start_mon . " ";
	if ($start_year != $end_year) {
		$str .= $start_year . " ";
	}
	if ($start_mon != $end_mon) {
		$str .= "- ".$end_mon." ";
	}
	$str .= $end_year;

	return $str;
}


function get_atl_datetimearray($mysqlResult)
{
	$dateTimeArray = array();

	while ($myrow = mysql_fetch_array($mysqlResult)) {
		$dateTime = array(StartDate=>$myrow['StartDate'], EndDate=>$myrow['EndDate'], DayOfWeek=>$myrow['DayOfWeek'], StartDOM=>$myrow['StartDayOfMonth'], EndDOM=>$myrow['EndDayOfMonth'], StartYear=>$myrow['StartYear'], EndYear=>$myrow['EndYear'], StartMon=>$myrow['StartMonth'], StartMon_Num=>$myrow['StartMon_Num'], EndMon_Num=>$myrow['EndMon_Num'], EndMon=>$myrow['EndMonth'], StartHour=>$myrow['StartHour'], StartMin=>$myrow['StartMinute'], EndHour=>$myrow['EndHour'], EndMin=>$myrow['EndMinute'], ByApp=>$myrow['ByAppointment']);

		array_push($dateTimeArray, $dateTime);
	}

	return $dateTimeArray;
}


// Format the given date time array to be displayed on public
// whats on pages
// Param dateTimeArray has elements: StartDate, EndDate,
// DayOfWeek, StartDOM, EndDOM, StartYear, EndYear,
// StartMon, EndMon, StartMon_Num, EndMon_Num, StartHour,
// StartMin, EndHour, EndMin, ByApp
function format_atl_date_time($dateTimeArray)
{
	$dateTimeStr = "";
	$len = count($dateTimeArray);

	for ($i=0; $i<$len; $i++) {

		$temp_str = "";

		// day of the week, if any
		if (isset($dateTimeArray[$i]['DayOfWeek']) && ($dateTimeArray[$i]['DayOfWeek']!="")) {
			$temp_str .= $dateTimeArray[$i]['DayOfWeek'];

			if (($dateTimeArray[$i]['StartDate'] != $dateTimeArray[$i]['EndDate']) || (($dateTimeArray[$i]['StartMon_Num']==0) && ($dateTimeArray[$i]['EndMon_Num']==0))){

				$temp_str .= "s";
			}

		}

		// start date and end date
		if (isset($dateTimeArray[$i]['StartMon']) && ($dateTimeArray[$i]['StartMon_Num']!=0)) {
			if ($temp_str!="") $temp_str .= ",&nbsp;";

			if (($dateTimeArray[$i]['EndMon_Num']==0) && ($dateTimeArray[$i]['EndDOM']==0)) {

				if ($temp_str!="") {
					$temp_str .= "starting ";
				} else {
					$temp_str .= "Starting ";
				}
			}
			$temp_str .= $dateTimeArray[$i]['StartMon'];
		}
		if (isset($dateTimeArray[$i]['StartDate']) && ($dateTimeArray[$i]['StartDOM']!=0)) {
			$temp_str .= " ";

			$temp_str .= $dateTimeArray[$i]['StartDOM'];

			/*
			// start year
			if (!isset($dateTimeArray[$i]['EndDate']) || ($dateTimeArray[$i]['StartYear']!=$dateTimeArray[$i]['EndYear']) || ($dateTimeArray[$i]['StartDate']==$dateTimeArray[$i]['EndDate'])) {
				$temp_str .= ", ".$dateTimeArray[$i]['StartYear'];
			}
			*/
		}

		if (isset($dateTimeArray[$i]['EndDate']) && ($dateTimeArray[$i]['StartDate'] != $dateTimeArray[$i]['EndDate']) && ($dateTimeArray[$i]['EndMon_Num']!=0)) {
			$temp_str .= " - ".$dateTimeArray[$i]['EndMon']." ".$dateTimeArray[$i]['EndDOM'];

			/*
			// end year
			$temp_str .= ", ".$dateTimeArray[$i]['EndYear'];
			*/
		}


		if ((isset($dateTimeArray[$i]['StartHour'])&& ($dateTimeArray[$i]['StartHour']!=0)) || ($dateTimeArray[$i]['ByApp'])) {

			if ($temp_str!="") $temp_str .= ",&nbsp;";

			if ($dateTimeArray[$i]['ByApp']) {

				$temp_str .= "By Appointment";

			} else if (isset($dateTimeArray[$i]['StartMin'])) {

				$temp_str .= format_atl_time($dateTimeArray[$i]['StartHour'], $dateTimeArray[$i]['StartMin']);

				if ($dateTimeArray[$i]['StartHour']<12) {
					if (!isset($dateTimeArray[$i]['EndHour']) || ($dateTimeArray[$i]['EndHour']>=12)) {
						$temp_str .= " a.m.";
					}
				}

				if (isset($dateTimeArray[$i]['EndHour']) && isset($dateTimeArray[$i]['EndMin']) && ($dateTimeArray[$i]['EndHour']!=0)) {

					$temp_str .= " - ".format_atl_time($dateTimeArray[$i]['EndHour'], $dateTimeArray[$i]['EndMin']);

					if ($dateTimeArray[$i]['EndHour']>=12) {
						$temp_str .= " p.m.";
					} else {
						$temp_str .= " a.m.";
					}
				} else if ($dateTimeArray[$i]['StartHour']>=12) {
					$temp_str .= " p.m.";
				}

			}

		}

		if (!empty($temp_str)) $temp_str .= "<br/>";

		$dateTimeStr .= $temp_str;

	}

	return $dateTimeStr;
}
//-------------------VPL NEW ------
function format_atl_date_time_ming($dateTimeArray)
{
	$dateTimeStr = "";
	$len = count($dateTimeArray);

	for ($i=0; $i<$len; $i++) {

		$temp_str = "";

		// day of the week, if any
		if (isset($dateTimeArray[$i]['DayOfWeek']) && ($dateTimeArray[$i]['DayOfWeek']!="")) {
			//$temp_str .= $dateTimeArray[$i]['DayOfWeek'];

			if (($dateTimeArray[$i]['StartDate'] != $dateTimeArray[$i]['EndDate']) || (($dateTimeArray[$i]['StartMon_Num']==0) && ($dateTimeArray[$i]['EndMon_Num']==0))){
				//$temp_str .= "s";

				$dates = getDatesByDayOfWeek($dateTimeArray[$i]['DayOfWeek'], '2013-09-01', '2013-11-30');
				echo sizeof($dates);
				for($i=0; $i < sizeof($dates); $i++){

					$temp_str .= $dates[$i];
					//echo "HERE: " . $dates[$i];
				}
			}

		}

		// start date and end date
		if (isset($dateTimeArray[$i]['StartMon']) && ($dateTimeArray[$i]['StartMon_Num']!=0)) {
			if ($temp_str!="") $temp_str .= ",&nbsp;";

			if (($dateTimeArray[$i]['EndMon_Num']==0) && ($dateTimeArray[$i]['EndDOM']==0)) {

				if ($temp_str!="") {
					$temp_str .= "starting ";
				} else {
					$temp_str .= "Starting ";
				}
			}
			$temp_str .= $dateTimeArray[$i]['StartMon'];
		}
		if (isset($dateTimeArray[$i]['StartDate']) && ($dateTimeArray[$i]['StartDOM']!=0)) {
			$temp_str .= " ";

			$temp_str .= $dateTimeArray[$i]['StartDOM'];

			/*
			// start year
			if (!isset($dateTimeArray[$i]['EndDate']) || ($dateTimeArray[$i]['StartYear']!=$dateTimeArray[$i]['EndYear']) || ($dateTimeArray[$i]['StartDate']==$dateTimeArray[$i]['EndDate'])) {
				$temp_str .= ", ".$dateTimeArray[$i]['StartYear'];
			}
			*/
		}

		if (isset($dateTimeArray[$i]['EndDate']) && ($dateTimeArray[$i]['StartDate'] != $dateTimeArray[$i]['EndDate']) && ($dateTimeArray[$i]['EndMon_Num']!=0)) {
			$temp_str .= " - ".$dateTimeArray[$i]['EndMon']." ".$dateTimeArray[$i]['EndDOM'];

			/*
			// end year
			$temp_str .= ", ".$dateTimeArray[$i]['EndYear'];
			*/
		}


		if ((isset($dateTimeArray[$i]['StartHour'])&& ($dateTimeArray[$i]['StartHour']!=0)) || ($dateTimeArray[$i]['ByApp'])) {

			if ($temp_str!="") $temp_str .= ",&nbsp;";

			if ($dateTimeArray[$i]['ByApp']) {

				$temp_str .= "By Appointment";

			} else if (isset($dateTimeArray[$i]['StartMin'])) {

				$temp_str .= format_atl_time($dateTimeArray[$i]['StartHour'], $dateTimeArray[$i]['StartMin']);

				if ($dateTimeArray[$i]['StartHour']<12) {
					if (!isset($dateTimeArray[$i]['EndHour']) || ($dateTimeArray[$i]['EndHour']>=12)) {
						$temp_str .= " a.m.";
					}
				}

				if (isset($dateTimeArray[$i]['EndHour']) && isset($dateTimeArray[$i]['EndMin']) && ($dateTimeArray[$i]['EndHour']!=0)) {

					$temp_str .= " - ".format_atl_time($dateTimeArray[$i]['EndHour'], $dateTimeArray[$i]['EndMin']);

					if ($dateTimeArray[$i]['EndHour']>=12) {
						$temp_str .= " p.m.";
					} else {
						$temp_str .= " a.m.";
					}
				} else if ($dateTimeArray[$i]['StartHour']>=12) {
					$temp_str .= " p.m.";
				}

			}

		}

		if (!empty($temp_str)) $temp_str .= "<br/>";

		$dateTimeStr .= $temp_str;

	}

	return $dateTimeStr;
}

//-------------------VPL NEW ------
function format_atl_time_ming($dateTimeArray)
{
	$dateTimeStr = "";
	$len = count($dateTimeArray);

	for ($i=0; $i<$len; $i++) {

		$temp_str = "";


		if ((isset($dateTimeArray[$i]['StartHour'])&& ($dateTimeArray[$i]['StartHour']!=0)) || ($dateTimeArray[$i]['ByApp'])) {

			if ($temp_str!="") $temp_str .= ",&nbsp;";

			if ($dateTimeArray[$i]['ByApp']) {

				$temp_str .= "By Appointment";

			} else if (isset($dateTimeArray[$i]['StartMin'])) {

				$temp_str .= format_atl_time($dateTimeArray[$i]['StartHour'], $dateTimeArray[$i]['StartMin']);

				if ($dateTimeArray[$i]['StartHour']<12) {
					if (!isset($dateTimeArray[$i]['EndHour']) || ($dateTimeArray[$i]['EndHour']>=12)) {
						$temp_str .= " a.m.";
					}
				}

				if (isset($dateTimeArray[$i]['EndHour']) && isset($dateTimeArray[$i]['EndMin']) && ($dateTimeArray[$i]['EndHour']!=0)) {

					$temp_str .= " - ".format_atl_time($dateTimeArray[$i]['EndHour'], $dateTimeArray[$i]['EndMin']);

					if ($dateTimeArray[$i]['EndHour']>=12) {
						$temp_str .= " p.m.";
					} else {
						$temp_str .= " a.m.";
					}
				} else if ($dateTimeArray[$i]['StartHour']>=12) {
					$temp_str .= " p.m.";
				}

			}

		}

		if (!empty($temp_str)) $temp_str .= "<br/>";

		$dateTimeStr .= $temp_str;

	}

	return $dateTimeStr;
}

//-------------------VPL NEW ------
function get_atl_date_ming($dateTimeArray)
{
?>
<select name="regDate">
	<option value="0">Select a date</option>
<?php

	$dateTimeStr = "";
	$len = count($dateTimeArray);

	for ($i=0; $i<$len; $i++) {

		$temp_str = "";

		// day of the week, if any
		if (isset($dateTimeArray[$i]['DayOfWeek']) && ($dateTimeArray[$i]['DayOfWeek']!="")) {
			//$temp_str .= $dateTimeArray[$i]['DayOfWeek'];

			if (($dateTimeArray[$i]['StartDate'] != $dateTimeArray[$i]['EndDate']) || (($dateTimeArray[$i]['StartMon_Num']==0) && ($dateTimeArray[$i]['EndMon_Num']==0))){
				//$temp_str .= "s";

				$dates = getDatesByDayOfWeek($dateTimeArray[$i]['DayOfWeek'], '2013-09-01', '2013-11-30');
				echo sizeof($dates);
				for($i=0; $i < sizeof($dates); $i++){
					echo "<option value=\"" . $dates[$i] . "\">". $dates[$i] . "</option>";

				}
			}

		}

		// start date and end date
		if (isset($dateTimeArray[$i]['StartMon']) && ($dateTimeArray[$i]['StartMon_Num']!=0)) {
			//echo "<option value=\"" . $dateTimeArray[$i]['StartDate']. "\">". $dateTimeArray[$i]['StartDate'] . "</option>";
		}
		if (isset($dateTimeArray[$i]['StartDate']) && ($dateTimeArray[$i]['StartDOM']!=0)) {

			echo "<option value=\"" . $dateTimeArray[$i]['StartDate']. "\">". $dateTimeArray[$i]['StartDate'] . "</option>";
		}

}//end for
?>

</select>
<?php
}

function select_atl_date_ming($dateTimeArray)
{
	$dateTimeStr = "";
	$len = count($dateTimeArray);

	for ($i=0; $i<$len; $i++) {

		$temp_str = "";

		// day of the week, if any
		if (isset($dateTimeArray[$i]['DayOfWeek']) && ($dateTimeArray[$i]['DayOfWeek']!="")) {
			//$temp_str .= $dateTimeArray[$i]['DayOfWeek'];

			if (($dateTimeArray[$i]['StartDate'] != $dateTimeArray[$i]['EndDate']) || (($dateTimeArray[$i]['StartMon_Num']==0) && ($dateTimeArray[$i]['EndMon_Num']==0))){
				//$temp_str .= "s";

				$dates = getDatesByDayOfWeek($dateTimeArray[$i]['DayOfWeek'], '2013-09-01', '2013-11-30');
				echo sizeof($dates);
				for($i=0; $i < sizeof($dates); $i++){

					$temp_str .= $dates[$i];
					//echo "HERE: " . $dates[$i];
				}
			}

		}

		// start date and end date
		if (isset($dateTimeArray[$i]['StartMon']) && ($dateTimeArray[$i]['StartMon_Num']!=0)) {
			if ($temp_str!="") $temp_str .= ",&nbsp;";

			if (($dateTimeArray[$i]['EndMon_Num']==0) && ($dateTimeArray[$i]['EndDOM']==0)) {

				if ($temp_str!="") {
					$temp_str .= "starting ";
				} else {
					$temp_str .= "Starting ";
				}
			}
			$temp_str .= $dateTimeArray[$i]['StartMon'];
		}
		if (isset($dateTimeArray[$i]['StartDate']) && ($dateTimeArray[$i]['StartDOM']!=0)) {
			$temp_str .= " ";

			$temp_str .= $dateTimeArray[$i]['StartDOM'];

		}

		if (isset($dateTimeArray[$i]['EndDate']) && ($dateTimeArray[$i]['StartDate'] != $dateTimeArray[$i]['EndDate']) && ($dateTimeArray[$i]['EndMon_Num']!=0)) {
			$temp_str .= " - ".$dateTimeArray[$i]['EndMon']." ".$dateTimeArray[$i]['EndDOM'];

		}


		if (!empty($temp_str)) $temp_str .= "<br/>";

		$dateTimeStr .= $temp_str;

	}

	return $dateTimeStr;
}


//-----------------END VPL NEW
/*
function format_atl_date_time($dateTimeArray, $fontStyle)
{
	$dateTimeStr = "<table>";

	$len = count($dateTimeArray);

	for ($i=0; $i<$len; $i++) {

		$dateTimeStr .= "<tr><td align=\"left\" class=\"".$fontStyle."\">";

		// date column
		// day of the week, if any
		if (isset($dateTimeArray[$i]['DayOfWeek']) && ($dateTimeArray[$i]['DayOfWeek']!="")) {
			$dateTimeStr .= $dateTimeArray[$i]['DayOfWeek'];

			if ($dateTimeArray[$i]['StartDate'] != $dateTimeArray[$i]['EndDate']) {

				$dateTimeStr .= "s";
			}
			$dateTimeStr .= ", ";
		}


		// start date and end date
		if (isset($dateTimeArray[$i]['StartMon'])) {
			$dateTimeStr .= $dateTimeArray[$i]['StartMon'];
		}
		if (isset($dateTimeArray[$i]['StartDate']) && ($dateTimeArray[$i]['StartDate']!=0)) {
			$dateTimeStr .= " ".$dateTimeArray[$i]['StartDOM'];

			//
			// start year
			//if (!isset($dateTimeArray[$i]['EndDate']) || ($dateTimeArray[$i]['StartYear']!=$dateTimeArray[$i]['EndYear']) || ($dateTimeArray[$i]['StartDate']==$dateTimeArray[$i]['EndDate'])) {
			//	$dateTimeStr .= ", ".$dateTimeArray[$i]['StartYear'];
			//}
			//
		}

		if (isset($dateTimeArray[$i]['EndDate']) && ($dateTimeArray[$i]['StartDate'] != $dateTimeArray[$i]['EndDate'])) {
			$dateTimeStr .= " - ".$dateTimeArray[$i]['EndMon']." ".$dateTimeArray[$i]['EndDOM'];

			//
			// end year
			//$dateTimeStr .= ", ".$dateTimeArray[$i]['EndYear'];
			//
		}


		if ((isset($dateTimeArray[$i]['StartHour'])&& ($dateTimeArray[$i]['StartHour']!=0)) || ($dateTimeArray[$i]['ByApp'])) {

			$dateTimeStr .= ",</td><td>&nbsp;</td>";
				$dateTimeStr .= "<td class=\"".$fontStyle."\">";

			if ($dateTimeArray[$i]['ByApp']) {

				$dateTimeStr .= "By Appointment";

			} else if (isset($dateTimeArray[$i]['StartMin'])) {

				$dateTimeStr .= format_atl_time($dateTimeArray[$i]['StartHour'], $dateTimeArray[$i]['StartMin']);

				if (isset($dateTimeArray[$i]['EndHour']) && isset($dateTimeArray[$i]['EndMin']) && ($dateTimeArray[$i]['EndHour']!=0)) {

					$dateTimeStr .= " - ".format_atl_time($dateTimeArray[$i]['EndHour'], $dateTimeArray[$i]['EndMin']);
				}

			}

			$dateTimeStr .= "</td>";

		} else {
			$dateTimeStr .= "</td>";
		}

		$dateTimeStr .= "</tr>";
	}

	$dateTimeStr .= "</table>";

	return $dateTimeStr;
}
*/


function format_atl_time($hour, $min) {
	$timeStr = "";
	$h = $hour;
	if ($hour > 12) {
		$h = $hour - 12;
	}
	$timeStr .= $h;

	if ($min == 0) {
		$timeStr .= "";
	} else {
		$timeStr .= ":";

		if ($min < 10) {
			$timeStr .= "0";
		}
		$timeStr .= $min;
	}

	/*
	if ($hour < 12) {
		$timeStr .= " a.m.";
	} else {
		$timeStr .= " p.m.";
	}
	*/
	return $timeStr;
}



function get_atl_agegroups_selectlist($multiple, $selected, $selectValArray)
{
	if ($multiple==1) {
		?>
		<select name="age[]" size="3" multiple>
		<?php
	} else {
		?>
		<select name="age">
		<option value="0">Select an age group</option>
		<?php
	}
	?>

	<?php

	$result = get_atl_agegroups();
	while ($myrow = mysql_fetch_array($result)) {

		echo "<option value=\"", $myrow['GroupID'], "\"";
		if ($selected) {
			for ($i=0; $i<count($selectValArray); $i++) {
				if ($selectValArray[$i]==$myrow['GroupID']) {
					echo " selected";
				}
			}
		}

		echo ">", $myrow['GroupName'], "</option>";
	}
	?>
	</select>
	<?php
}


function get_atl_schedules_selectlist() {

	?>
	<select name="schedule">
	<option value="0">Select a period</option>

	<?php
	$result = search_atl_live_schedules();

	while ($myrow = mysql_fetch_array($result)) {
		$schedule = format_atl_schedule_from_db($myrow['StartDate'], $myrow['EndDate']);

		echo "<option value=\"", $myrow['ScheduleID'], "\">", $schedule, "</option>";
	}
	?>
	</select>
	<?php
}


/*
 * list_atl_by_branch:
 *
 * Return a string containing a list of events to
 * be held in the given branch.
 */
function list_atl_by_branch($branchid) {

	$list = "";
	$result1 = search_atl_live_schedules_by_branch($branchid);

	while ($myrow1 = mysql_fetch_array($result1)) {
		$schedule = format_atl_schedule_from_db($myrow1['StartDate'], $myrow1['EndDate']);

		$reg_date = "";

		if ($myrow1['ScheduleID']%4 == 0) {
			$reg_date = "winter";
		} else if ($myrow1['ScheduleID']%4 == 1) {
			$reg_date = "spring";
		} else if ($myrow1['ScheduleID']%4 == 2) {
			$reg_date = "summer";
		} else if ($myrow1['ScheduleID']%4 == 3) {
			$reg_date = "fall";
		}

		$has_events = 0;
		$sub_list = "<span class=\"body-paragraph-text\">";

		$result2 = search_atl_events_by_branch_schedule($branchid, $myrow1['ScheduleID']);

		while ($myrow2 = mysql_fetch_array($result2)) {

			if (!event_closed($myrow2['EventID'])) {
				$has_events = 1;

				$sub_list .= "<a href=\"".$PHP_SELF."?eventid=".$myrow2["EventID"]."\" class=\"body-link\">".$myrow2["ProgramName"]."</a><br />";
			}
		}

		if ($has_events) {
			$list .= "<p><span class=\"body-paragraph-text-bold-small\">" . $schedule . "</span><span class=body-paragraph-text-italics>&nbsp;&nbsp;&nbsp;(Registration starts in the " . $reg_date . ")</span><br/>";
			$list .= $sub_list."</span>";
			$list .= "</p>";
		}
	}

	if ($list == "") {
		$list = "<p class=\"body-paragraph-text\">Sorry, no records were found!</p>";
	}

	return $list;
}


/*
 * list_atl_by_age:
 *
 * Return a string containing a list of events for
 * the given age group.
 */
function list_atl_by_age($agegroup) {

	$list = "";
	$num_events = 0;

	$branches = get_all_public_branches();
	while ($mybranch = mysql_fetch_array($branches)) {

		$list .= "<p class=\"paragraph-heading\">" . $mybranch["BranchName"] . "</p>";

		$result1 = search_atl_live_schedules_by_branch($mybranch['BranchID']);

		while ($myrow1 = mysql_fetch_array($result1)) {

			$schedule = format_atl_schedule_from_db($myrow1['StartDate'], $myrow1['EndDate']);


			if (has_open_events_for_age($mybranch['BranchID'], $agegroup, $myrow1['ScheduleID'])) {

				$reg_date = "";

				if ($myrow1['ScheduleID']%4 == 0) {
					$reg_date = "winter";
				} else if ($myrow1['ScheduleID']%4 == 1) {
					$reg_date = "spring";
				} else if ($myrow1['ScheduleID']%4 == 2) {
					$reg_date = "summer";
				} else if ($myrow1['ScheduleID']%4 == 3) {
					$reg_date = "fall";
				}

				$list .= "<p><span class=\"body-paragraph-text-bold-small\">" . $schedule . "</span><span class=body-paragraph-text-italics>&nbsp;&nbsp;&nbsp;(Registration starts in the " . $reg_date . ")</span><br/><span class=\"body-paragraph-text\">";

				$result2 = search_atl_by_branch_age_schedule($mybranch['BranchID'], $agegroup, $myrow1['ScheduleID']);

				while ($myrow2 = mysql_fetch_array($result2)) {

					if (!event_closed($myrow2['EventID'])) {
						$num_events++;
						$list .= "<a href=\"".$PHP_SELF."?eventid=".$myrow2["EventID"]."\" class=\"body-link\">".$myrow2["ProgramName"]."</a><br />";
					}
				}
				$list .= "</span></p>";
			}
		}
		$list .= "<br/>";
	}

	if ($num_events == 0) {
		$list = "<p class=\"body-paragraph-text\">Sorry, no records were found!</p>";
	}
	return $list;
}


/*
 * list_atl_by_schedule:
 *
 * Return a string containing a list of events to
 * be held in the given scheduled period.
 */
function list_atl_by_schedule($schedule_id) {

	$list = "";
	$programs = search_atl_programs_by_schedule($schedule_id);

	while ($myprogram = mysql_fetch_array($programs)) {

		if (has_open_events($myprogram['ProgramID'],$schedule_id)) {

			$list .= "<span class=\"body-paragraph-text-bold-small\">".$myprogram['ProgramName']."</span><br />";

			$result = search_atl_events_by_program_schedule($myprogram['ProgramID'], $schedule_id);

			$list .= "<span class=\"body-paragraph-text\">";

			while ($myrow = mysql_fetch_array($result)) {

				if (!event_closed($myrow['EventID'])) {
					$list .= "<a href=\"".$PHP_SELF."?event=".$myrow['EventID']."\" class=\"body-link\">".$myrow['BranchName']."</a><br />";
				}
			}
			$list .= "<br/></span>";
		}
	}

	if ($list == "") {
		$list = "<p class=\"body-paragraph-text\">Sorry, no records were found!</p>";
	}

	return $list;
}




/***********************************************
 *                                             *
 *           VaughanLink Functions             *
 *                                             *
 ***********************************************
 */

function print_vaughanlink_group_info($groupid)
{

	$myrow = search_vaughanlink_group_by_id($groupid);

	?>

	<table width="100%">
	<tr>
	<td class="database-output-heading" colspan="2"><?php echo $myrow["GroupName"] ?></td>
	</tr>

	<tr><td colspan="2">&nbsp;</td></tr>

	<tr>
	<td class="database-output-heading" colspan="2">Contact Information</td>
	</tr>

	<tr><td class="database-output-table-head" width="140">Address:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["Address"]) && ($myrow["Address"]!="")) {
			echo $myrow["Address"];
		} else {
			echo "N/A";
		}
	?>
	</td></tr>

	<tr><td class="database-output-table-head" width="140">City:</td><td class="database-output-table-content" width="175"><?php echo $myrow["City"] ?></td></tr>

	<tr><td class="database-output-table-head" width="140">Province:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["Province"]) && ($myrow["Province"]!="")) {
			echo $myrow["Province"];
		} else {
			echo "N/A";
		}
	?>
	</td></tr>

	<tr><td class="database-output-table-head" width="140">Postal Code:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["PostalCode"]) && ($myrow["PostalCode"]!="")) {
			echo $myrow["PostalCode"];
		} else {
			echo "N/A";
		}
	?>
	</td></tr>

	<tr><td class="database-output-table-head" width="140">Telephone Number:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["Telephone"]) && ($myrow["Telephone"]!="")) {
			echo $myrow["Telephone"];
		} else {
			echo "N/A";
		}
	?>
	</td></tr>

	<tr><td class="database-output-table-head" width="140">Toll Free Number:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["TollFree"]) && ($myrow["TollFree"]!="")) {
			echo $myrow["TollFree"];
		} else {
			echo "N/A";
		}
	?>
	</td></tr>

	<tr><td class="database-output-table-head" width="140">Teletype:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["Teletype"]) && ($myrow["Teletype"]!="")) {
			echo $myrow["Teletype"];
		} else {
			echo "N/A";
		}
	?>
	</td></tr>

	<tr><td class="database-output-table-head" width="140">Email Address:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["Email"]) && ($myrow["Email"]!="")) {
			echo "<a class=body-link href=\"mailto:", $myrow["Email"], "\">", $myrow["Email"], "</a>";
		} else {
			echo "N/A";
		}
	?>
	</td></tr>

	<tr><td class="database-output-table-head" width="140">Web Site Address:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["Url"]) && ($myrow["Url"]!="") && ($myrow["Url"]!="N/A")) {
			echo "<a class=body-link href=\"", $myrow["Url"], "\">", $myrow["Url"], "</a>";
		} else {
			echo "N/A";
		}
	?>

	</td></tr>

	<tr><td colspan="2">&nbsp;</td></tr>

	<tr>
	<td class="database-output-heading" colspan="2">Group Description &amp; Information</td>
	</tr>


	<tr><td class="database-output-table-head" width="140">Group Type:</td><td class="database-output-table-content" width="175">
	<?php
		$grouptype = search_vaughanlink_grouptype_by_id($myrow["GroupType"]);
		if (isset($grouptype)) {
			echo $grouptype;
		} else {
			echo "N/A";
		}
	?>
	</td></tr>

	<tr><td class="database-output-table-head" width="140" valign="top">Description:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["Summary"]) && ($myrow["Summary"]!="")) {
			echo $myrow["Summary"];
		} else {
			echo "N/A";
		}
	?>
	</td></tr>

	<tr><td colspan="2">&nbsp;</td></tr>

	<tr>
	<td class="database-output-heading" colspan="2">Meeting &amp; Event Information</td>
	</tr>


	<tr><td class="database-output-table-head" width="140"valign="top">Meeting Information:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["MeetingInfo"]) && ($myrow["MeetingInfo"]!="")) {
			echo $myrow["MeetingInfo"];
		} else {
			echo "N/A";
		}
	?>
	</td></tr>

	<tr><td class="database-output-table-head" width="140"valign="top">Meeting Location:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["MeetingLocation"]) && ($myrow["MeetingLocation"]!="")) {
			echo $myrow["MeetingLocation"];
		} else {
			echo "N/A";
		}
	?>
	</td></tr>

	<tr><td colspan="2">&nbsp;</td></tr>

	<tr>
	<td class="database-output-heading" colspan="2">Upcoming Event Information</td>
	</tr>


	<tr><td class="database-output-table-head" width="140">Upcoming Event:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["UpcomingEvent"]) && ($myrow["UpcomingEvent"]==1)) {
			echo "Yes";
			?>
			</td></tr>

			<tr><td class="database-output-table-head" width="140"valign="top">Title of Event:</td><td class="database-output-table-content" width="175"><?php echo $myrow["UpcomingEventTitle"] ?></td></tr>

			<tr><td class="database-output-table-head" width="140">Date of Event:</td><td class="database-output-table-content" width="175">
			<?php
				if (isset($myrow["UpcomingEventDate"]) && ($myrow["UpcomingEventDate"]!="0000-00-00")) {
					echo $myrow["UpcomingEventDate"];
				} else {
					echo "N/A";
				}
			?>
			</td></tr>

			<tr><td class="database-output-table-head" width="140"valign="top">Description of Event:</td><td class="database-output-table-content" width="175">
			<?php
				if (isset($myrow["UpcomingEventDesc"]) && ($myrow["UpcomingEventDesc"]!="")) {
					echo $myrow["UpcomingEventDesc"];
				} else {
					echo "N/A";
				}
			?>
			</td></tr>

			<tr><td class="database-output-table-head" width="140">Upcoming Event Date Over:</td><td class="database-output-table-content" width="175">
			<?php
				if (isset($myrow["UpcomingEventEndDate"]) && ($myrow["UpcomingEventEndDate"]!="0000-00-00")) {
					echo $myrow["UpcomingEventEndDate"];
				} else {
					echo "N/A";
				}
			?>
			</td></tr>

		<?php
		} else {
			echo "N/A";
			echo "</td></tr>";
		}
	?>

	<tr><td colspan="2">&nbsp;</td></tr>

	<tr>
	<td class="database-output-heading" colspan="2">Other Information</td>
	</tr>

	<tr><td class="database-output-table-head" width="140">Language(s) Spoken Other than English:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["Languages"]) && ($myrow["Languages"]!="")) {
			echo $myrow["Languages"];
		} else {
			echo "N/A";
		}
	?>
	</td></tr>

	<tr><td class="database-output-table-head" width="140">Fees:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["Fees"]) && ($myrow["Fees"]==1)) {
			echo "Yes";
		} else {
			echo "No";
		}
	?>
	</td></tr>

	<tr><td class="database-output-table-head" width="140"valign="top">Fee Description:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["FeeDescription"]) && ($myrow["FeeDescription"]!="")) {
			echo $myrow["FeeDescription"];
		} else {
			echo "N/A";
		}
	?>
	</td></tr>

	<tr><td class="database-output-table-head" width="140">Disability Access:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["DisabilityAccess"]) && ($myrow["DisabilityAccess"]==1)) {
			echo "Yes";
			?>
			</td></tr>

			<tr><td class="database-output-table-head" width="140"valign="top">Access Description:</td><td class="database-output-table-content" width="175">
			<?php
				if (isset($myrow["AccessDescription"]) && ($myrow["AccessDescription"]!="")) {
					echo $myrow["AccessDescription"];
				} else {
					echo "N/A";
				}
			?>
			</td></tr>
		<?php
		} else {
			echo "No";
			echo "</td></tr>";
		}
	?>

	<tr><td colspan="2">&nbsp;</td></tr>

	<tr>
	<td class="database-output-heading" colspan="2">Call for Volunteers</td>
	</tr>

	<tr><td class="database-output-table-head" width="140">Looking for Volunteers:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["CallForVolunteers"]) && ($myrow["CallForVolunteers"]==1)) {
			echo "Yes";
			?>
			</td></tr>

			<tr><td class="database-output-table-head" width="140"valign="top">Volunteer Position Title(s):</td><td class="database-output-table-content" width="175"><?php echo $myrow["VolunteerPositionTitle"] ?></td></tr>

			<tr><td class="database-output-table-head" width="140"valign="top">Description of Position(s):</td><td class="database-output-table-content" width="175">
			<?php
				if (isset($myrow["VolunteerPositionDesc"]) && ($myrow["VolunteerPositionDesc"]!="")) {
					echo $myrow["VolunteerPositionDesc"];
				} else {
					echo "N/A";
				}
			?>
			</td></tr>

			<tr><td class="database-output-table-head" width="140">Date No Longer Needed:</td><td class="database-output-table-content" width="175">
			<?php
				if (isset($myrow["VolunteerPositionEndDate"]) && ($myrow["VolunteerPositionEndDate"]!="0000-00-00")) {
					echo $myrow["VolunteerPositionEndDate"];
				} else {
					echo "N/A";
				}
			?>
			</td></tr>
		<?php
		} else {
			echo "N/A";
			echo "</td></tr>";
		}
	?>


	<tr><td colspan="2">&nbsp;</td></tr>

	<tr>
	<td class="database-output-heading" colspan="2">Additional Comments About the Group</td>
	</tr>


	<tr><td class="database-output-table-head" width="140"valign="top">Comments:</td><td class="database-output-table-content" width="175">
	<?php
		if (isset($myrow["Comments"]) && ($myrow["Comments"]!="")) {
			echo $myrow["Comments"];
		} else {
			echo "N/A";
		}
	?>
	</td></tr>

	<tr><td class="database-output-table-head" width="140">Last Updated:</td><td class="database-output-table-content" width="175"><?php echo $myrow["DateUpdated"] ?></td></tr>

	</table>

	<?php
}


/*************************************************
 *                                               *
 *          Recommended Reads                    *
 *                                               *
 *************************************************/

function print_books_for_bookclubs($level) {

	?>
	<table width="100%">
		<tr>
		<td class="body-paragraph-text-bold-small" width="200">Title</td>
		<td class="body-paragraph-text-bold-small">Author</td>
		<td class="body-paragraph-text-bold-small" align="right" width="20">Num Copies</td>
		</tr>

	<?php
	$result = search_books_for_bookclubs_by_level($level);
	while ($myrow = mysql_fetch_array($result)) {

		echo "<tr><td class=\"body-paragraph-text\" valign=\"top\">", $myrow['Title'], "</td>";
		echo "<td class=\"body-paragraph-text\" valign=\"top\">", $myrow['Author'], "</td>";
		echo "<td class=\"body-paragraph-text\" align=\"right\" valign=\"top\">";

		if ($myrow['NumCopies']==0) {
			echo "N/A";
		} else {
			echo $myrow['NumCopies'];
		}
		echo "</td>";
	}

	echo "</table>";

}


function get_books_for_bookclubs_selectlist($level)
{
	?>
	<select name="title">
	<option value="0">Select a book title</option>

	<?php
	$titles = search_books_for_bookclubs_by_level($level);
	while ($mytitle = mysql_fetch_array($titles)) {

		echo "<option value=\"", $mytitle['BookID'], "\">", $mytitle['Title'], "</option>";
	}
	?>

	</select>
	<?php
}



/*************************************************
 *                                               *
 *          Recommended Links functions          *
 *                                               *
 *************************************************/
function list_links_katrina() {

	$result = search_links_katrina();

	$list = "";

	while ($myrow = mysql_fetch_array($result)) {
		$list .= "<p class=\"body-paragraph-text\">";

		$list .= "<span class=\"body-paragraph-text-bold\"><a href=\"".$myrow["UrlOfWebsite"]."\" class=\"body-link\" target=\"_blank\">".$myrow["TitleOfWebsite"]."</a></span><br/>";

		$list .= $myrow["Description"]."</span><br /><span class=\"body-paragraph-text-small\">Prepared By:&nbsp;".$myrow["WebsitePublisher"];

		$list .= "</span><br />";

		$list .= "<span class=\"body-paragraph-text-small\">Date Reviewed by VPL: ".$myrow["DateUpdated"]."</span></p>";

		$list .- "<br/>";
	}

	return $list;
}


function list_links_serviceontario() {

	$result = search_links_serviceontario();

	$list = "";

	while ($myrow = mysql_fetch_array($result)) {
		$list .= "<p class=\"body-paragraph-text\">";

		$list .= "<span class=\"body-paragraph-text-bold\"><a href=\"".$myrow["UrlOfWebsite"]."\" class=\"body-link\" target=\"_blank\">".$myrow["TitleOfWebsite"]."</a></span><br/>";

		$list .= $myrow["Description"]."</span><br /><span class=\"body-paragraph-text-small\">Prepared By:&nbsp;".$myrow["WebsitePublisher"];

		$list .= "</span><br />";

		$list .= "<span class=\"body-paragraph-text-small\">Date Reviewed by VPL: ".$myrow["DateUpdated"]."</span></p>";

		$list .- "<br/>";
	}

	return $list;
}

function get_rl_targetgroup_str_for_link($linkid) {
	$targetGroupStr = "";
	$result = search_rl_targetgroups_by_link($linkid);

	while ($myrow = mysql_fetch_array($result)) {

		if ($myrow['TargetGroupID'] >= 3) {
			$targetGroupStr .= $myrow['TargetGroupID'] - 2;
		} else if ($myrow['TargetGroupID'] == 2) {
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


// a multiple choices list of recommended links -
// target groups
function get_rl_targetgroup_list($area, $selectArray) {

	$groups = search_rl_targetgroups_by_area($area);
	$num = mysql_num_rows($groups);
	$num++;

	$list = "<select name=\"grade[]\"";

	if (isset($selectArray)) {
		$list .= " size=\"" . $num . "\"";
	}
	$list .= " multiple>";

	$list .= "<option value=\"0\" default>Select one or more</option>";

	while ($mygroup = mysql_fetch_array($groups)) {

		$list .= "<option value=\"";
		$list .= $mygroup['TargetGroupID'] . "\"";

		if (isset($selectArray)) {
			for ($i=0; $i<count($selectArray); $i++) {
				if ($selectArray[$i]==$mygroup['TargetGroupID']) {
					$list .= " selected";
				}
			}
		}

		$list .= ">" . $mygroup['TargetGroupName'] . "</option>";
	}

	$list .= "</select>";
	return $list;
}



/***********************************************
 *                                             *
 *            eproducts Functions              *
 *                                             *
 ***********************************************
 */
function print_eproduct($productid) {

	$eproduct = search_eproduct_by_id($productid);

	?>

	<p class="body-paragraph-text">
	<span class="body-paragraph-text-bold">
	<a name="<?php echo $eproduct['ShortName']; ?>"></a>
	<a href="<?php echo $eproduct['URL']; ?>" target="_blank"><?php echo $eproduct['Name']; ?></a>
	</span>
	<br />
	<a href="<?php echo $eproduct['URL']; ?>" target="_blank" class="body-link"><?php echo $eproduct['Availability']; ?></a>
	<br />
	<?php echo $eproduct['Description']; ?>
	</p>

	<?php
}


function print_eproduct_kidzone($productid) {

	$eproduct = search_eproduct_by_id($productid);

	?>

	<p class="homeworkzone-content">

	<a name="<?php echo $eproduct['ShortName']; ?>"></a>
	<a href="<?php echo $eproduct['URL']; ?>" class="homeworkzone-content-link" target="_blank"><?php echo $eproduct['Name']; ?></a>

	<br />
	<?php echo $eproduct['Description']; ?>
	</p>

	<?php
}


function set_eproducts_array() {

	$eproducts = array();
	$result = search_available_eproducts();

	while ($myrow = mysql_fetch_array($result)) {

		array_push($eproducts, $myrow);
	}

	return $eproducts;
}

/***********************************************
 *                                             *
 *            Multilingual Functions           *
 *                                             *
 ***********************************************
 */

 function get_lan_shortName($lan) {

 	/*switch($lan){
 	 case "Chinese":
 	 	$shortName = "chi";
 	 	break;
 	 case "Farsi":
	  	$shortName = "far";
 	 	break;
	case "Gujarati":
		$shortName = "guj";
		break;
	case "Hebrew":
		$shortName = "heb";
		break;
	case "Hindi":
		$shortName = "hin";
		break;
	case "Italian":
		$shortName = "ita";
		break;
	case "Korean":
		$shortName = "kor";
		break;
	case "Malayalam":
		$shortName = "mal";
		break;
	case "Punjabi":
		$shortName = "pan";
		break;
	case "Russian":
		$shortName = "rus";
		break;
	case "Spanish":
		$shortName = "spa";
		break;
	 case "Tamil":
 		$shortName = "tam";
 		break;
 	case "Urdu":
 		$shortName = "urd";
 		break;
 	}
 	*/
 	$shortName="hello world";
 	return $shortName;
 }


?>