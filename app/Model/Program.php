<?php
class Program extends AppModel
{

	var $name = 'Program';
	var $useTable = 'ATL_Programs';
	var $primaryKey = 'ProgramID';
	var $recursive = 2;

	var $criteria;
	var $result;				//This variable holds the query result - instead of loading it into an array



	var $hasMany = 	array(
							'Event' =>
								array(
									'className' => 'Event',
									'finderQuery' => 	'
														SELECT
															Event.EventID AS id,
															Event.StartDate AS date,
															Event.StartTime AS time,
															Event.EndDate AS end_date,
															Event.EndTime AS end_time,
															Event.DayOfWeek AS day_of_week,
															Schedule.StartDate AS start_date,
															Schedule.EndDate AS end_date,
															Details.Desc_Prefix AS preffix,
															Details.Desc_Suffix AS suffix,
															Details.Image AS image,
															Details.Registration,
															Details.RegRequirement,
															Details.Ages,
															Details.SpecialNotes as notes,
															Library.BranchName AS name,
															Library.BranchID AS id
														FROM
															ATL_Events AS Details LEFT OUTER JOIN ATL_Event_Time AS Event ON Event.EventID = Details.EventID,
															ATL_Schedule AS Schedule,
															Branches AS Library
														WHERE
															Schedule.ScheduleID = Details.ScheduledFor AND
															Schedule.EndDate >= CURDATE() AND
															Schedule.StartDate <= CURDATE() AND
															Details.ProgramID={$__cakeID__$} AND
															Details.PublicityStatus = 1 AND Details.StatusInBranch = 2 AND
															(IFNULL(Event.StartDate,"9999-01-01") >= CURDATE() OR DAYOFMONTH(Event.StartDate)<1 OR (Event.StartDate <> Event.EndDate AND Event.EndDate>= CURDATE())) AND
															Library.BranchID = Details.BranchID
														ORDER BY
															IF(ISNULL(Event.StartDate) OR DAYOFMONTH(Event.StartDate)<1, "9999-01-01", Event.StartDate),
															Library.BranchName,
															Event.StartTime
														'
								)/*,
							'Category' =>
							array(
								'className' => 'Category',
								'foreignKey' => 'ProgramID'
							)*/
					);

	var $hasAndBelongsToMany = array('Category' =>
									array(	'className' => 'Category',
											'joinTable' => 'ATL_Program_Category',
											'foreignKey' => 'ProgramID',
											'associationForeignKey' => 'CategoryID',
											'conditions' => '',
											'order' => '',
											'limit' => '',
											'unique' => true,
											'finderQuery' => '',
											'deleteQuery' => '',
										),
									 'AgeGroup' =>
									array(	'className' => 'AgeGroup',
											'joinTable' => 'ATL_Program_AgeGroup',
											'foreignKey' => 'ProgramID',
											'associationForeignKey' => 'AgeGroupID',
											'conditions' => '',
											'order' => '',
											'limit' => '',
											'unique' => true,
											'finderQuery' => '',
											'deleteQuery' => '',
										)

									);




	function sameCategoryEvents ($categoryId) {
		//mysql_query("SET CHARACTER SET utf8");
		//mysql_query("SET NAMES utf8");

		$sql = 	"SELECT " .
				"	Event.StartDate AS date, " .
				"	Event.StartTime AS time, " .
				"	Program.ProgramName AS name, " .
				"	Program.ProgramID AS id, " .
				"	Library.BranchName AS name, " .
				"	Library.BranchShort AS short, " .
				"	Library.BranchID AS id " .
				"FROM " .
				"	ATL_Event_Time AS Event, " .
				"	ATL_Events, " .
				"	ATL_Programs AS Program, " .
				"	ATL_Program_Category, " .
				"	Branches AS Library " .
				"WHERE " .
				"	ATL_Events.EventID = Event.EventID AND " .
				"	Program.ProgramID = ATL_Events.ProgramID AND " .
				"	ATL_Program_Category.ProgramID = ATL_Events.ProgramID AND " .
				"	ATL_Program_Category.CategoryID = " . $categoryId . " AND " .
				"	Program.Status = 1 AND " .
				"	ATL_Events.PublicityStatus = 1 AND Details.StatusInBranch = 2 AND " .
				"	Library.BranchID = ATL_Events.BranchID AND " .
				"	Event.EndDate >= CURDATE() AND " .
				"	Event.EndTime >= CURTIME() " .
				"ORDER BY " .
				"	Event.StartDate, " .
				"	Event.StartTime " .
				"LIMIT 20";
		//echo $sql;
		return $this->query($sql);
	}


	function findByCriteria($date, $libraryId, $ageGroupId, $categoryId, $areaId, $textSearch, $scheduleId, $date_end = null) {

		//mysql_query("SET CHARACTER SET utf8");
		//mysql_query("SET NAMES utf8");
		//mysql_set_charset("utf8");

		$library_name = null;
		$agegroup_name = null;
		$category_name = null;
		$schedule_name = null;
		$schedule_start = null;


		$live_schedules = array();

		foreach ($this->query("SELECT * FROM ATL_Schedule WHERE EndDate>=CURDATE()") as $row) {

			$live_schedules[] = array("id"=>$row['ATL_Schedule']['ScheduleID'], "start_date"=>$row['ATL_Schedule']['StartDate'], "end_date"=>$row['ATL_Schedule']['EndDate']);

		}

		if (!isset($scheduleId)) {

			foreach ($live_schedules as $live_schedule) {


				if (($date>=$live_schedule['start_date']) && ($date<=$live_schedule['end_date'])) {
					$scheduleId = $live_schedule['id'];

				}
			}
		}


		foreach ($live_schedules as $live_schedule) {

			if ($scheduleId == $live_schedule['id']) {
				$schedule_name = date_format(new DateTime($live_schedule['start_date']), "F j, Y") . " to " . date_format(new DateTime($live_schedule['end_date']), "F j, Y");
				$schedule_start = $live_schedule['start_date'];
			}
		}


		$curr_schedule_id = $live_schedules[0]['id'];

		if(isset($libraryId)) {

			$library_rows = $this->query("SELECT BranchName from Branches WHERE BranchID = '$libraryId'");
			$library_name = $library_rows[0]['Branches']['BranchName'];
		}

		if(isset($ageGroupId)) {

			$age_rows = $this->query("SELECT GroupName from ATL_AgeGroups WHERE GroupID = '$ageGroupId'");
			$agegroup_name = $age_rows[0]['ATL_AgeGroups']['GroupName'];
		}

		if(isset($categoryId)) {

			$category_rows = $this->query("SELECT CategoryName from ATL_Categories WHERE CategoryID = '$categoryId'");
			$category_name = $category_rows[0]['ATL_Categories']['CategoryName'];
		}

		$this->criteria = array(
								"date" => $date,
								"library"=>array("id"=>$libraryId,"shortName"=>$library_name),
								"ageGroup"=>array("id"=>$ageGroupId,"name"=>$agegroup_name),
								"category"=>array("id"=>$categoryId,"name"=>$category_name),
								"area"=>array("id"=>$areaId,"name"=>null),
								"schedule"=>array("id"=>$scheduleId,"name"=>$schedule_name),
								"textSearch"=>array("id"=>null,"name"=>$textSearch)
								);

		if (empty($date)) $date = date("Y-m-d");

		$sql = 	"SELECT
					DATEDIFF(IFNULL(Event.StartDate,'" . $date . "'), '" . $date . "'),
					Event.StartDate AS event_start_date,
					Event.StartTime AS event_start_time,
					Event.EndDate AS event_end_date,
					Event.EndTime AS event_end_time,
					Event.DayOfWeek AS event_day_of_week,
					Event.SlotID AS event_slot,
					Schedule.StartDate AS schedule_start_date,
					Schedule.EndDate AS schedule_end_date,
					Details.EventID AS event_id,
					Program.ProgramName AS program_name,
					Program.Description AS program_description,
					Program.SpecialNotes AS program_notes,
					Program.Image AS program_image,
					Program.ProgramID AS program_id,
					Library.BranchName AS library_name,
					Library.BranchShort AS library_short,
					Library.BranchID AS library_id ,
					Details.Desc_Prefix AS details_preffix,
					Details.Desc_Suffix AS details_suffix,
					Details.SpecialNotes AS details_notes,
					Details.Image AS details_image,
					Category.CategoryName AS category_name,
					Category.CategoryID AS category_id,
					Category.visible AS category_visible,
					AgeGroup.GroupName AS age_group_name,
					AgeGroup.GroupID AS age_group_id
				FROM
					ATL_Events AS Details LEFT OUTER JOIN ATL_Event_Time AS Event ON Event.EventID = Details.EventID,
					ATL_Schedule AS Schedule,
					ATL_Programs AS Program,
					ATL_Program_Category,
					ATL_Program_AgeGroup,
					ATL_Categories AS Category,
					ATL_AgeGroups AS AgeGroup,
					Branches AS Library
				WHERE
					Schedule.ScheduleID = ". $scheduleId. " AND Schedule.ScheduleID = Details.ScheduledFor AND (Schedule.EndDate >= '" . $date . "' OR DAYOFMONTH(Schedule.EndDate)<1) AND
					Program.ProgramID = Details.ProgramID AND
					ATL_Program_Category.ProgramID = Details.ProgramID AND
					ATL_Program_AgeGroup.ProgramID = Details.ProgramID AND
					Program.Status = 1 AND
					Details.PublicityStatus = 1 AND Details.StatusInBranch = 2 AND
					Library.BranchID = Details.BranchID AND Category.visible=1 AND
					Category.CategoryID = ATL_Program_Category.CategoryID AND
					AgeGroup.GroupID = ATL_Program_AgeGroup.AgeGroupID AND
					(IFNULL(Event.StartDate,'9999-01-01') >= '" . $date . "' OR DAYOFMONTH(Event.StartDate)<1 OR Event.StartDate<>Event.EndDate)
				";
		if (isset($date_end)) {
			//$sql .= "AND (Event.StartDate >= '" . $date . "' AND Event.EndDate <= '" . $date_end . "' ) ";
			//$sql .= "AND (Event.EndDate <= '" . $date_end . "' ) ";
			$sql .= "AND ((IFNULL(Event.StartDate,'9999-01-01') >= '" . $date . "' AND IFNULL(Event.EndDate,'0000-01-01') <= '" . $date_end . "') OR (Event.EndDate >= '" . $date . "' AND Event.StartDate <= '" . $date_end . "' ) OR DAYOFMONTH(Event.EndDate)<1) ";
		}
/*
		if (empty($libraryId) && empty($ageGroupId) && empty($categoryId) && empty($areaId)) {

			if ($curr_schedule_id != $scheduleId) {

				$sql .= " AND (DATEDIFF(IFNULL(Event.StartDate,'" . $schedule_start . "'), '" . $schedule_start . "') < 14 OR DAYOFMONTH(Event.StartDate)<1)";

			} else {

				$sql .= " AND (DATEDIFF(IFNULL(Event.StartDate,'" . $date . "'), '" . $date . "') < 14 OR DAYOFMONTH(Event.StartDate)<1)";
			}
		}
*/
		if (isset($libraryId)) $sql .= " AND Details.BranchID = " . $libraryId;
		if (isset($ageGroupId)) $sql .= " AND ATL_Program_AgeGroup.AgeGroupID = " . $ageGroupId;
		if (isset($categoryId)) $sql .= " AND ATL_Program_Category.CategoryID = " . $categoryId;
		if ($areaId == 12) $sql .= " AND Program.Keywords LIKE '%family literacy%'";
		if ($areaId == 4) $sql .= " AND (Program.Keywords LIKE '%black history month%' or Program.Description LIKE '%black history month%' or Details.Desc_Prefix LIKE '%black history month%' or Details.Desc_suffix LIKE '%black history month%')";
		if ($areaId == 3) $sql .= " AND ATL_Program_Category.CategoryID=6";
		if ($areaId == 16) $sql .= " AND (Program.SpecialNotes LIKE '%winterlight%' OR Program.Keywords LIKE '%winterlight%' OR Details.SpecialNotes LIKE '%winterlight%')";
		if (isset($textSearch)) $sql .= " AND (Program.ProgramName LIKE '%" . $textSearch . "%' OR Program.Description LIKE '%" . $textSearch . "%' OR Program.Keywords LIKE '%" . $textSearch . "%')";

		$sql .=	" ORDER BY Details.ScheduledFor,
					IF (ISNULL(Event.StartDate) OR DAYOFMONTH(Event.StartDate)<1 OR Event.StartDate<>Event.EndDate,
						IF ('" . $date . "'<='" . $date . "',
							'" . $date . "',
							'" . $date . "'
						),
						IF (Event.StartDate = '" . $date . "',
						Event.StartDate - INTERVAL 10 YEAR,
						Event.StartDate
						)
					),
					IF(ISNULL(Event.StartDate) OR DAYOFMONTH(Event.StartDate)<1 OR Event.StartDate<>Event.EndDate, '00:00:00', Event.StartTime),
					Program.ProgramName,
					Program.ProgramID,
					Library.BranchName,
					Details.EventID,
					Category.CategoryID,
					AgeGroup.GroupID
				";

		//if (empty($libraryId) && empty($ageGroupId) && empty($categoryId) && empty($areaId)) //$sql .= "LIMIT 15";

		// Change start
		$config = new DATABASE_CONFIG();
		$connection = mysql_connect($config->default["host"], $config->default["login"], $config->default["password"]);
		mysql_select_db($config->default["database"], $connection);

		//mysql_query("SET CHARACTER SET utf8", $connection);
		//mysql_query("SET NAMES utf8", $connection);
//echo $sql;
		$this->result = mysql_query($sql, $connection);
		$this->categoryProgram = mysql_fetch_assoc($this->result);

		//echo $sql, "<br/>";

		return;
		// Change end


	}


	function getNextProgram() {

		//mysql_query("SET CHARACTER SET utf8");
		//mysql_query("SET NAMES utf8");
		//mysql_set_charset("utf8");

		if ($this->categoryProgram === false) return false;

		$currentProgramId = $this->categoryProgram["program_id"];
		$currentEventId = $this->categoryProgram["event_id"];
		$currentEventStartDate = $this->categoryProgram["event_start_date"];

		$program = array();

		$program["Schedule"] = array("start_date"=>$this->categoryProgram["schedule_start_date"],"end_date"=>$this->categoryProgram["schedule_end_date"]);


		$program["Program"] = array("name"=>$this->categoryProgram["program_name"],"description"=>$this->categoryProgram["program_description"],"image"=>$this->categoryProgram["program_image"],"id"=>$this->categoryProgram["program_id"], "notes"=>$this->categoryProgram["program_notes"]);

		$program["Library"] = array("name"=>$this->categoryProgram["library_name"],"short"=>$this->categoryProgram["library_short"],"id"=>$this->categoryProgram["library_id"]);

		$program["Event"] = array("date"=>$this->categoryProgram["event_start_date"],"time"=>$this->categoryProgram["event_start_time"],"end_date"=>$this->categoryProgram["event_end_date"],"end_time"=>$this->categoryProgram["event_end_time"],"day_of_week"=>$this->categoryProgram["event_day_of_week"],"slot"=>$this->categoryProgram["event_slot"]);

		//$program["Details"] = array("id"=>$this->categoryProgram["event_id"],"preffix"=>$this->categoryProgram["details_preffix"],"suffix"=>$this->categoryProgram["details_suffix"], "notes"=>$this->categoryProgram["details_notes"],"image"=>$this->categoryProgram["details_image"],"day_of_week"=>$this->categoryProgram["event_day_of_week"],"slot"=>$this->categoryProgram["event_slot"]);

		$program["Details"] = array("id"=>$this->categoryProgram["event_id"],"preffix"=>$this->categoryProgram["details_preffix"],"suffix"=>$this->categoryProgram["details_suffix"],"notes"=>$this->categoryProgram["details_notes"],"image"=>$this->categoryProgram["details_image"]);


		/*
		$program = $this->categoryProgram;
		unset($program["Category"]);
		unset($program["AgeGroup"]);
		*/

		$program["Categories"] = array();
		$program["AgeGroups"] = array();
		$program["EventSlots"] = array();

		$currentCategoryIds = array();
		$currentAgeGroupIds = array();
		$currentEventSlots = array();





		//while (!($this->categoryProgram===false) && $this->categoryProgram["program_id"] == $currentProgramId && $this->categoryProgram["event_id"] == $currentEventId ) {

		while (!($this->categoryProgram===false) && $this->categoryProgram["program_id"] == $currentProgramId && $this->categoryProgram["event_id"] == $currentEventId && $this->categoryProgram["event_start_date"] == $currentEventStartDate) {

			if (
				!empty($this->criteria["library"]["id"]) &&
				!isset($this->criteria["library"]["shortName"])	&&
				$this->categoryProgram["library_id"] == $this->criteria["library"]["id"]
				) $this->criteria["library"]["shortName"] = $this->categoryProgram["library_name"];
			if (
				!empty($this->criteria["ageGroup"]["id"]) &&
				!isset($this->criteria["ageGroup"]["name"])	&&
				$this->categoryProgram["age_group_id"] == $this->criteria["ageGroup"]["id"]
				) $this->criteria["ageGroup"]["name"] = $this->categoryProgram["age_group_name"];
			if (
				!empty($this->criteria["category"]["id"]) &&
				!isset($this->criteria["category"]["name"])	&&
				$this->categoryProgram["category_id"] == $this->criteria["category"]["id"]
				) $this->criteria["category"]["name"] = $this->categoryProgram["category_name"];


			if ($this->categoryProgram["category_visible"]==1 && !in_array($this->categoryProgram["category_id"], $currentCategoryIds)) {

				$currentCategoryIds[] = $this->categoryProgram["category_id"];

				$temp1 = array("name"=>$this->categoryProgram["category_name"], "id"=>$this->categoryProgram["category_id"], "visible"=>$this->categoryProgram["category_visible"]);

				//$program["Categories"][] = array("name"=>$this->categoryProgram["category_name"], "id"=>$this->categoryProgram["category_id"], "visible"=>$this->categoryProgram["category_visible"]);	//$this->categoryProgram["Category"];

				array_push($program["Categories"], $temp1);
				unset($temp1);
			}
			if (!in_array($this->categoryProgram["age_group_id"], $currentAgeGroupIds)) {
				$currentAgeGroupIds[] = $this->categoryProgram["age_group_id"];
				$temp2 = array("name"=>$this->categoryProgram["age_group_name"], "id"=>$this->categoryProgram["age_group_id"]);
				//$program["AgeGroups"][] = array("name"=>$this->categoryProgram["age_group_name"], "id"=>$this->categoryProgram["age_group_id"]);

				array_push($program["AgeGroups"], $temp2);
				unset($temp2);
			}

			if (!in_array($this->categoryProgram["event_slot"], $currentEventSlots)) {

				//echo "***". $this->categoryProgram["event_id"]. " ", $this->categoryProgram["event_slot"]. "****<br/>";
				$currentEventSlots[] = $this->categoryProgram["event_slot"];
				$temp3 = array("date"=>$this->categoryProgram["event_start_date"],"time"=>$this->categoryProgram["event_start_time"],"end_date"=>$this->categoryProgram["event_end_date"],"end_time"=>$this->categoryProgram["event_end_time"],"day_of_week"=>$this->categoryProgram["event_day_of_week"],"slot"=>$this->categoryProgram["event_slot"]);

				array_push($program["EventSlots"], $temp3);
				unset($temp3);

				//$program["EventSlots"][] = array("date"=>$this->categoryProgram["event_start_date"],"time"=>$this->categoryProgram["event_start_time"],"end_date"=>$this->categoryProgram["event_end_date"],"end_time"=>$this->categoryProgram["event_end_time"],"day_of_week"=>$this->categoryProgram["event_day_of_week"],"slot"=>$this->categoryProgram["event_slot"]);
			}

			$this->categoryProgram = mysql_fetch_assoc($this->result);


		}

		unset($currentCategoryIds);
		unset($currentAgeGroupIds);
		unset($currentEventSlots);


		return $program;

	}

	function hasLiveEvents($scheduleId) {

		//mysql_query("SET CHARACTER SET utf8");
		//mysql_query("SET NAMES utf8");
		//mysql_set_charset("utf8");

		$result = mysql_query("SELECT ATL_Events.EventID FROM ATL_Programs, ATL_Events WHERE ATL_Events.PublicityStatus=1 AND ATL_Events.StatusInBranch = 2 AND ATL_Programs.Status = 1 AND ATL_Programs.ProgramID=ATL_Events.ProgramID AND ATL_Events.ScheduledFor='$scheduleId'");

		if (mysql_num_rows($result) > 0) return true;
		else return false;
	}


/*
	function extractProgramCategories ($categoryPrograms) {
		$ret = array();
		$currentProgramId = -9999;
		$currentEventId = -9999;
		$currentCategoryIds = array();
		$currentAgeGroupIds = array();

		foreach ($categoryPrograms as $categoryProgram) {

			if (
				!empty($this->criteria["library"]["id"]) &&
				!isset($this->criteria["library"]["shortName"])	&&
				$categoryProgram["Library"]["id"] == $this->criteria["library"]["id"]
				) $this->criteria["library"]["shortName"] = $categoryProgram["Library"]["name"];
			if (
				!empty($this->criteria["ageGroup"]["id"]) &&
				!isset($this->criteria["ageGroup"]["name"])	&&
				$categoryProgram["AgeGroup"]["id"] == $this->criteria["ageGroup"]["id"]
				) $this->criteria["ageGroup"]["name"] = $categoryProgram["AgeGroup"]["name"];
			if (
				!empty($this->criteria["category"]["id"]) &&
				!isset($this->criteria["category"]["name"])	&&
				$categoryProgram["Category"]["id"] == $this->criteria["category"]["id"]
				) $this->criteria["category"]["name"] = $categoryProgram["Category"]["name"];


			if ($categoryProgram["Program"]["id"] != $currentProgramId || $categoryProgram["Details"]["id"] != $currentEventId) {
				$currentProgramId = $categoryProgram["Program"]["id"];
				$currentEventId = $categoryProgram["Details"]["id"];
				if (isset($program)) $ret[] = $program;
				$program = $categoryProgram;
				unset($program["Category"]);
				unset($program["AgeGroup"]);

				$program["Categories"] = array();
				$program["AgeGroups"] = array();
				$program["EventSlots"] = array();

				$currentCategoryIds = array();
				$currentAgeGroupIds = array();
				$currentEventSlots = array();

			}
			if ($categoryProgram["Category"]["visible"] && !in_array($categoryProgram["Category"]["id"], $currentCategoryIds)) {
				$currentCategoryIds[] = $categoryProgram["Category"]["id"];
				$program["Categories"][] = $categoryProgram["Category"];
			}
			if (!in_array($categoryProgram["AgeGroup"]["id"], $currentAgeGroupIds)) {
				$currentAgeGroupIds[] = $categoryProgram["AgeGroup"]["id"];
				$program["AgeGroups"][] = $categoryProgram["AgeGroup"];
			}

			if (!in_array($categoryProgram["Event"]["slot"], $currentEventSlots)) {
				$currentEventSlots[] = $categoryProgram["Event"]["slot"];
				$program["EventSlots"][] = $categoryProgram["Event"];
			}


		}
		if (isset($program)) $ret[] = $program;
		return $ret;
	}
*/
	function findByTag_Orig($date, $libraryId, $ageGroupId, $categoryId, $areaId, $textSearch, $scheduleId, $date_end = null) {

		//mysql_query("SET CHARACTER SET utf8");
		//mysql_query("SET NAMES utf8");
		//mysql_set_charset("utf8");

		$library_name = null;
		$agegroup_name = null;
		$category_name = null;
		$schedule_name = null;
		$schedule_start = null;


		$live_schedules = array();

		foreach ($this->query("SELECT * FROM ATL_Schedule WHERE EndDate>=CURDATE()") as $row) {

			$live_schedules[] = array("id"=>$row['ATL_Schedule']['ScheduleID'], "start_date"=>$row['ATL_Schedule']['StartDate'], "end_date"=>$row['ATL_Schedule']['EndDate']);

		}

		if (!isset($scheduleId)) {

			foreach ($live_schedules as $live_schedule) {


				if (($date>=$live_schedule['start_date']) && ($date<=$live_schedule['end_date'])) {
					$scheduleId = $live_schedule['id'];

				}
			}
		}


		foreach ($live_schedules as $live_schedule) {

			if ($scheduleId == $live_schedule['id']) {
				$schedule_name = date_format(new DateTime($live_schedule['start_date']), "F j, Y") . " to " . date_format(new DateTime($live_schedule['end_date']), "F j, Y");
				$schedule_start = $live_schedule['start_date'];
			}
		}


		$curr_schedule_id = $live_schedules[0]['id'];

		if(isset($libraryId)) {

			$library_rows = $this->query("SELECT BranchName from Branches WHERE BranchID = '$libraryId'");
			$library_name = $library_rows[0]['Branches']['BranchName'];
		}

		if(isset($ageGroupId)) {

			$age_rows = $this->query("SELECT GroupName from ATL_AgeGroups WHERE GroupID = '$ageGroupId'");
			$agegroup_name = $age_rows[0]['ATL_AgeGroups']['GroupName'];
		}

		if(isset($categoryId)) {

			$category_rows = $this->query("SELECT CategoryName from ATL_Categories WHERE CategoryID = '$categoryId'");
			$category_name = $category_rows[0]['ATL_Categories']['CategoryName'];
		}

		$this->criteria = array(
								"date" => $date,
								"library"=>array("id"=>$libraryId,"shortName"=>$library_name),
								"ageGroup"=>array("id"=>$ageGroupId,"name"=>$agegroup_name),
								"category"=>array("id"=>$categoryId,"name"=>$category_name),
								"area"=>array("id"=>$areaId,"name"=>null),
								"schedule"=>array("id"=>$scheduleId,"name"=>$schedule_name),
								"textSearch"=>array("id"=>null,"name"=>$textSearch)
								);

		if (empty($date)) $date = date("Y-m-d");

		$sql = 	"SELECT
					DATEDIFF(IFNULL(Event.StartDate,'" . $date . "'), '" . $date . "'),
					Event.StartDate AS event_start_date,
					Event.StartTime AS event_start_time,
					Event.EndDate AS event_end_date,
					Event.EndTime AS event_end_time,
					Event.DayOfWeek AS event_day_of_week,
					Event.SlotID AS event_slot,
					Schedule.StartDate AS schedule_start_date,
					Schedule.EndDate AS schedule_end_date,
					Details.EventID AS event_id,
					Program.ProgramName AS program_name,
					Program.Description AS program_description,
					Program.SpecialNotes AS program_notes,
					Program.Image AS program_image,
					Program.ProgramID AS program_id,
					Library.BranchName AS library_name,
					Library.BranchShort AS library_short,
					Library.BranchID AS library_id ,
					Details.Desc_Prefix AS details_preffix,
					Details.Desc_Suffix AS details_suffix,
					Details.SpecialNotes AS details_notes,
					Details.Image AS details_image,
					Category.CategoryName AS category_name,
					Category.CategoryID AS category_id,
					Category.visible AS category_visible,
					AgeGroup.GroupName AS age_group_name,
					AgeGroup.GroupID AS age_group_id
				FROM
					ATL_Events AS Details LEFT OUTER JOIN ATL_Event_Time AS Event ON Event.EventID = Details.EventID,
					ATL_Schedule AS Schedule,
					ATL_Programs AS Program,
					ATL_Program_AgeGroup,
					ATL_AgeGroups AS AgeGroup,
					ATL_Categories AS Category,
					Branches AS Library
				WHERE
					Schedule.ScheduleID >= ". $scheduleId. " AND Schedule.ScheduleID = Details.ScheduledFor AND (Schedule.EndDate >= '" . $date . "' OR DAYOFMONTH(Schedule.EndDate)<1) AND
					Program.ProgramID = Details.ProgramID AND
					ATL_Program_AgeGroup.ProgramID = Details.ProgramID AND
					Program.Status = 1 AND Category.visible=1 AND
					Category.CategoryID = ATL_Program_Category.CategoryID AND
					Details.PublicityStatus = 1 AND Details.StatusInBranch = 2 AND
					Library.BranchID = Details.BranchID AND
					AgeGroup.GroupID = ATL_Program_AgeGroup.AgeGroupID AND
					(IFNULL(Event.StartDate,'9999-01-01') >= '" . $date . "' OR DAYOFMONTH(Event.StartDate)<1 OR Event.StartDate<>Event.EndDate)
				";
		if (isset($date_end)) {
			//$sql .= "AND (Event.StartDate >= '" . $date . "' AND Event.EndDate <= '" . $date_end . "' ) ";
			//$sql .= "AND (Event.EndDate <= '" . $date_end . "' ) ";
			$sql .= "AND ((IFNULL(Event.StartDate,'9999-01-01') >= '" . $date . "' AND IFNULL(Event.EndDate,'0000-01-01') <= '" . $date_end . "') OR (Event.EndDate >= '" . $date . "' AND Event.StartDate <= '" . $date_end . "' ) OR DAYOFMONTH(Event.EndDate)<1) ";
		}
/*
		if (empty($libraryId) && empty($ageGroupId) && empty($categoryId) && empty($areaId)) {

			if ($curr_schedule_id != $scheduleId) {

				$sql .= " AND (DATEDIFF(IFNULL(Event.StartDate,'" . $schedule_start . "'), '" . $schedule_start . "') < 14 OR DAYOFMONTH(Event.StartDate)<1)";

			} else {

				$sql .= " AND (DATEDIFF(IFNULL(Event.StartDate,'" . $date . "'), '" . $date . "') < 14 OR DAYOFMONTH(Event.StartDate)<1)";
			}
		}
*/
		if (isset($libraryId)) $sql .= " AND Details.BranchID = " . $libraryId;
		if (isset($ageGroupId)) $sql .= " AND ATL_Program_AgeGroup.AgeGroupID = " . $ageGroupId;
		if ($areaId == 12) $sql .= " AND Program.Keywords LIKE '%family literacy%'";
		if ($areaId == 4) $sql .= " AND (Program.Keywords LIKE '%black history month%' or Program.Description LIKE '%black history month%' or Details.Desc_Prefix LIKE '%black history month%' or Details.Desc_suffix LIKE '%black history month%')";
		if ($areaId == 16) $sql .= " AND (Program.SpecialNotes LIKE '%winterlight%' OR Program.Keywords LIKE '%winterlight%' OR Details.SpecialNotes LIKE '%winterlight%')";

if (isset($textSearch)) $sql .= " AND (Program.ProgramName LIKE '%" . $textSearch . "%' OR Program.Keywords LIKE '%" . $textSearch . "%')";

/*		$count = count($textSearches);echo "-----". $count.$textSearches;
		if ($count > 0) {
			$sql .= " AND (";
			$sql .= "Program.ProgramName LIKE '%" . $textSearches[0] . "%' OR Program.Keywords LIKE '%" . $textSearches[0] . "%'";
			for($i=1; $i < $count; $i++) {

				$sql .= " OR Program.ProgramName LIKE '%" . $textSearches[i] . "%' OR Program.Keywords LIKE '%" . $textSearches[i] . "%' ";

			}
			$sql .= ")";
		}




		$sql .=	" ORDER BY Details.ScheduledFor,
					IF (ISNULL(Event.StartDate) OR DAYOFMONTH(Event.StartDate)<1 OR Event.StartDate<>Event.EndDate,
						IF ('" . $date . "'<='" . $date . "',
							'" . $date . "',
							'" . $date . "'
						),
						IF (Event.StartDate = '" . $date . "',
						Event.StartDate - INTERVAL 10 YEAR,
						Event.StartDate
						)
					),
					IF(ISNULL(Event.StartDate) OR DAYOFMONTH(Event.StartDate)<1 OR Event.StartDate<>Event.EndDate, '00:00:00', Event.StartTime),
					Program.ProgramName,
					Program.ProgramID,
					Library.BranchName,
					Details.EventID,
					Category.CategoryID,
					AgeGroup.GroupID
				";
*/
		$sql .=	" ORDER BY Program.ProgramName,
					Program.ProgramID,
					Library.BranchName,
					Details.EventID,
					AgeGroup.GroupID
				";
		//if (empty($libraryId) && empty($ageGroupId) && empty($categoryId) && empty($areaId)) //$sql .= "LIMIT 15";

		// Change start
		$config = new DATABASE_CONFIG();
		$connection = mysql_connect($config->default["host"], $config->default["login"], $config->default["password"]);
		mysql_select_db($config->default["database"], $connection);

		//mysql_query("SET CHARACTER SET utf8", $connection);
		//mysql_query("SET NAMES utf8", $connection);
//echo $sql;
		$this->result = mysql_query($sql, $connection);
		$this->categoryProgram = mysql_fetch_assoc($this->result);

		//echo $sql, "<br/>";

		return;
		// Change end


	}


	function findByTag($date, $libraryId, $ageGroupId, $categoryId, $areaId, $textSearches, $scheduleId, $date_end = null) {
		//mysql_query("SET CHARACTER SET utf8");
				//mysql_query("SET NAMES utf8");
				//mysql_set_charset("utf8");

				$library_name = null;
				$agegroup_name = null;
				$category_name = null;
				$schedule_name = null;
				$schedule_start = null;


				$live_schedules = array();

				foreach ($this->query("SELECT * FROM ATL_Schedule WHERE EndDate>=CURDATE()") as $row) {

					$live_schedules[] = array("id"=>$row['ATL_Schedule']['ScheduleID'], "start_date"=>$row['ATL_Schedule']['StartDate'], "end_date"=>$row['ATL_Schedule']['EndDate']);

				}

				if (!isset($scheduleId)) {

					foreach ($live_schedules as $live_schedule) {


						if (($date>=$live_schedule['start_date']) && ($date<=$live_schedule['end_date'])) {
							$scheduleId = $live_schedule['id'];

						}
					}
				}


				foreach ($live_schedules as $live_schedule) {

					if ($scheduleId == $live_schedule['id']) {
						$schedule_name = date_format(new DateTime($live_schedule['start_date']), "F j, Y") . " to " . date_format(new DateTime($live_schedule['end_date']), "F j, Y");
						$schedule_start = $live_schedule['start_date'];
					}
				}


				$curr_schedule_id = $live_schedules[0]['id'];

				if(isset($libraryId)) {

					$library_rows = $this->query("SELECT BranchName from Branches WHERE BranchID = '$libraryId'");
					$library_name = $library_rows[0]['Branches']['BranchName'];
				}

				if(isset($ageGroupId)) {

					$age_rows = $this->query("SELECT GroupName from ATL_AgeGroups WHERE GroupID = '$ageGroupId'");
					$agegroup_name = $age_rows[0]['ATL_AgeGroups']['GroupName'];
				}

				if(isset($categoryId)) {

					$category_rows = $this->query("SELECT CategoryName from ATL_Categories WHERE CategoryID = '$categoryId'");
					$category_name = $category_rows[0]['ATL_Categories']['CategoryName'];
				}

				$this->criteria = array(
										"date" => $date,
										"library"=>array("id"=>$libraryId,"shortName"=>$library_name),
										"ageGroup"=>array("id"=>$ageGroupId,"name"=>$agegroup_name),
										"category"=>array("id"=>$categoryId,"name"=>$category_name),
										"area"=>array("id"=>$areaId,"name"=>null),
										"schedule"=>array("id"=>$scheduleId,"name"=>$schedule_name),
										"textSearch"=>array("id"=>null,"name"=>$textSearches)
										);

				if (empty($date)) $date = date("Y-m-d");

				$sql = 	"SELECT
							DATEDIFF(IFNULL(Event.StartDate,'" . $date . "'), '" . $date . "'),
							Event.StartDate AS event_start_date,
							Event.StartTime AS event_start_time,
							Event.EndDate AS event_end_date,
							Event.EndTime AS event_end_time,
							Event.DayOfWeek AS event_day_of_week,
							Event.SlotID AS event_slot,
							Schedule.StartDate AS schedule_start_date,
							Schedule.EndDate AS schedule_end_date,
							Details.EventID AS event_id,
							Program.ProgramName AS program_name,
							Program.Description AS program_description,
							Program.SpecialNotes AS program_notes,
							Program.Image AS program_image,
							Program.ProgramID AS program_id,
							Library.BranchName AS library_name,
							Library.BranchShort AS library_short,
							Library.BranchID AS library_id,
							Category.CategoryName AS category_name,
							Category.CategoryID AS category_id,
							Category.visible AS category_visible,
							Details.Desc_Prefix AS details_preffix,
							Details.Desc_Suffix AS details_suffix,
							Details.SpecialNotes AS details_notes,
							Details.Image AS details_image,
							AgeGroup.GroupName AS age_group_name,
							AgeGroup.GroupID AS age_group_id
						FROM
							ATL_Events AS Details LEFT OUTER JOIN ATL_Event_Time AS Event ON Event.EventID = Details.EventID,
							ATL_Schedule AS Schedule,
							ATL_Programs AS Program,
							ATL_Program_AgeGroup,
							ATL_Categories AS Category,
							ATL_Program_Category,
							ATL_AgeGroups AS AgeGroup,
							Branches AS Library
						WHERE
							Schedule.ScheduleID >= ". $scheduleId. " AND Schedule.ScheduleID = Details.ScheduledFor AND (Schedule.EndDate >= '" . $date . "'OR DAYOFMONTH(Schedule.EndDate)<1) AND

							Program.ProgramID = Details.ProgramID AND
							ATL_Program_AgeGroup.ProgramID = Details.ProgramID AND
							Program.Status = 1 AND Category.visible=1 AND Details.ProgramID = ATL_Program_Category.ProgramID AND
					Category.CategoryID = ATL_Program_Category.CategoryID  AND
							Details.PublicityStatus = 1 AND Details.StatusInBranch = 2 AND
							Library.BranchID = Details.BranchID AND
							AgeGroup.GroupID = ATL_Program_AgeGroup.AgeGroupID AND
							(IFNULL(Event.StartDate,'9999-01-01') >= '" . $date . "' OR DAYOFMONTH(Event.StartDate)<1 OR Event.StartDate<>Event.EndDate)
						";
				if (isset($date_end)) {
					//$sql .= "AND (Event.StartDate >= '" . $date . "' AND Event.EndDate <= '" . $date_end . "' ) ";
					//$sql .= "AND (Event.EndDate <= '" . $date_end . "' ) ";
					$sql .= "AND ((IFNULL(Event.StartDate,'9999-01-01') >= '" . $date . "' AND IFNULL(Event.EndDate,'0000-01-01') <= '" . $date_end . "') OR (Event.EndDate >= '" . $date . "' AND Event.StartDate <= '" . $date_end . "' ) OR DAYOFMONTH(Event.EndDate)<1) ";
				}
		/*
				if (empty($libraryId) && empty($ageGroupId) && empty($categoryId) && empty($areaId)) {

					if ($curr_schedule_id != $scheduleId) {

						$sql .= " AND (DATEDIFF(IFNULL(Event.StartDate,'" . $schedule_start . "'), '" . $schedule_start . "') < 14 OR DAYOFMONTH(Event.StartDate)<1)";

					} else {

						$sql .= " AND (DATEDIFF(IFNULL(Event.StartDate,'" . $date . "'), '" . $date . "') < 14 OR DAYOFMONTH(Event.StartDate)<1)";
					}
				}
		*/
				if (isset($libraryId)) $sql .= " AND Details.BranchID = " . $libraryId;
				if (isset($ageGroupId)) $sql .= " AND ATL_Program_AgeGroup.AgeGroupID = " . $ageGroupId;
				if ($areaId == 12) $sql .= " AND Program.Keywords LIKE '%family literacy%'";
				if ($areaId == 4) $sql .= " AND (Program.Keywords LIKE '%black history month%' or Program.Description LIKE '%black history month%' or Details.Desc_Prefix LIKE '%black history month%' or Details.Desc_suffix LIKE '%black history month%')";
				if ($areaId == 16) $sql .= " AND (Program.SpecialNotes LIKE '%winterlight%' OR Program.Keywords LIKE '%winterlight%' OR Details.SpecialNotes LIKE '%winterlight%')";

				$count = count($textSearches);

				//echo "-----". $count.$textSearches . "---------";

				if ($count > 0) {
					$sql .= " AND (";
					$sql .= "Program.ProgramName LIKE '%" . $textSearches[0] . "%' OR Program.Keywords LIKE '%" . $textSearches[0] . "%'";
					for($i=1; $i < $count; $i++) {

						$sql .= " OR Program.ProgramName LIKE '%" . $textSearches[$i] . "%' OR Program.Keywords LIKE '%" . $textSearches[$i] . "%' ";

					}
					$sql .= ")";
				}


		/*		if (isset($textSearch)) $sql .= " AND (Program.ProgramName LIKE '%" . $textSearch . "%' OR Program.Keywords LIKE '%" . $textSearch . "%')";

				$sql .=	" ORDER BY Details.ScheduledFor,
							IF (ISNULL(Event.StartDate) OR DAYOFMONTH(Event.StartDate)<1 OR Event.StartDate<>Event.EndDate,
								IF ('" . $date . "'<='" . $date . "',
									'" . $date . "',
									'" . $date . "'
								),
								IF (Event.StartDate = '" . $date . "',
								Event.StartDate - INTERVAL 10 YEAR,
								Event.StartDate
								)
							),
							IF(ISNULL(Event.StartDate) OR DAYOFMONTH(Event.StartDate)<1 OR Event.StartDate<>Event.EndDate, '00:00:00', Event.StartTime),
							Program.ProgramName,
							Program.ProgramID,
							Library.BranchName,
							Details.EventID,
							Category.CategoryID,
							AgeGroup.GroupID
						";
		*/
				$sql .=	" ORDER BY Program.ProgramName,
							Program.ProgramID,
							Library.BranchName,
							Details.EventID,
							AgeGroup.GroupID
						";

				// Change start
				$config = new DATABASE_CONFIG();
				$connection = mysql_connect($config->default["host"], $config->default["login"], $config->default["password"]);
				mysql_select_db($config->default["database"], $connection);


		//echo $sql;

				$this->result = mysql_query($sql, $connection);
				$this->categoryProgram = mysql_fetch_assoc($this->result);



				return;
				// Change end

	}

	function getCriteria() {
			return $this->criteria;
	}

function findByCriteriaSenior($date, $libraryId, $ageGroupId, $categoryId, $areaId, $textSearch, $scheduleId, $date_end = null) {

		//mysql_query("SET CHARACTER SET utf8");
		//mysql_query("SET NAMES utf8");
		//mysql_set_charset("utf8");

		$library_name = null;
		$agegroup_name = null;
		$category_name = null;
		$schedule_name = null;
		$schedule_start = null;


		$live_schedules = array();

		foreach ($this->query("SELECT * FROM ATL_Schedule WHERE EndDate>=CURDATE()") as $row) {

			$live_schedules[] = array("id"=>$row['ATL_Schedule']['ScheduleID'], "start_date"=>$row['ATL_Schedule']['StartDate'], "end_date"=>$row['ATL_Schedule']['EndDate']);

		}

		if (!isset($scheduleId)) {

			foreach ($live_schedules as $live_schedule) {


				if (($date>=$live_schedule['start_date']) && ($date<=$live_schedule['end_date'])) {
					$scheduleId = $live_schedule['id'];

				}
			}
		}


		foreach ($live_schedules as $live_schedule) {

			if ($scheduleId == $live_schedule['id']) {
				$schedule_name = date_format(new DateTime($live_schedule['start_date']), "F j, Y") . " to " . date_format(new DateTime($live_schedule['end_date']), "F j, Y");
				$schedule_start = $live_schedule['start_date'];
			}
		}


		$curr_schedule_id = $live_schedules[0]['id'];

		if(isset($libraryId)) {

			$library_rows = $this->query("SELECT BranchName from Branches WHERE BranchID = '$libraryId'");
			$library_name = $library_rows[0]['Branches']['BranchName'];
		}

		if(isset($ageGroupId)) {

			$age_rows = $this->query("SELECT GroupName from ATL_AgeGroups WHERE GroupID = '$ageGroupId'");
			$agegroup_name = $age_rows[0]['ATL_AgeGroups']['GroupName'];
		}

		if(isset($categoryId)) {

			$category_rows = $this->query("SELECT CategoryName from ATL_Categories WHERE CategoryID = '$categoryId'");
			$category_name = $category_rows[0]['ATL_Categories']['CategoryName'];
		}

		$this->criteria = array(
								"date" => $date,
								"library"=>array("id"=>$libraryId,"shortName"=>$library_name),
								"ageGroup"=>array("id"=>$ageGroupId,"name"=>$agegroup_name),
								"category"=>array("id"=>$categoryId,"name"=>$category_name),
								"area"=>array("id"=>$areaId,"name"=>null),
								"schedule"=>array("id"=>$scheduleId,"name"=>$schedule_name),
								"textSearch"=>array("id"=>null,"name"=>$textSearch)
								);

		if (empty($date)) $date = date("Y-m-d");

		$sql = 	"SELECT
					DATEDIFF(IFNULL(Event.StartDate,'" . $date . "'), '" . $date . "'),
					Event.StartDate AS event_start_date,
					Event.StartTime AS event_start_time,
					Event.EndDate AS event_end_date,
					Event.EndTime AS event_end_time,
					Event.DayOfWeek AS event_day_of_week,
					Event.SlotID AS event_slot,
					Schedule.StartDate AS schedule_start_date,
					Schedule.EndDate AS schedule_end_date,
					Details.EventID AS event_id,
					Program.ProgramName AS program_name,
					Program.Description AS program_description,
					Program.SpecialNotes AS program_notes,
					Program.Image AS program_image,
					Program.ProgramID AS program_id,
					Library.BranchName AS library_name,
					Library.BranchShort AS library_short,
					Library.BranchID AS library_id ,
					Details.Desc_Prefix AS details_preffix,
					Details.Desc_Suffix AS details_suffix,
					Details.SpecialNotes AS details_notes,
					Details.Image AS details_image,
					Category.CategoryName AS category_name,
					Category.CategoryID AS category_id,
					Category.visible AS category_visible,
					AgeGroup.GroupName AS age_group_name,
					AgeGroup.GroupID AS age_group_id
				FROM
					ATL_Events AS Details LEFT OUTER JOIN ATL_Event_Time AS Event ON Event.EventID = Details.EventID,
					ATL_Schedule AS Schedule,
					ATL_Programs AS Program,
					ATL_Program_Category,
					ATL_Program_AgeGroup,
					ATL_Categories AS Category,
					ATL_AgeGroups AS AgeGroup,
					Branches AS Library
				WHERE
					Schedule.ScheduleID = ". $scheduleId. " AND Schedule.ScheduleID = Details.ScheduledFor AND (Schedule.EndDate >= '" . $date . "' OR DAYOFMONTH(Schedule.EndDate)<1) AND
					Program.ProgramID = Details.ProgramID AND
					ATL_Program_Category.ProgramID = Details.ProgramID AND
					ATL_Program_AgeGroup.ProgramID = Details.ProgramID AND
					Program.Status = 1 AND
					Details.PublicityStatus = 1 AND Details.StatusInBranch = 2 AND
					Library.BranchID = Details.BranchID AND Category.visible=1 AND
					Category.CategoryID = ATL_Program_Category.CategoryID AND
					AgeGroup.GroupID = ATL_Program_AgeGroup.AgeGroupID AND
					(IFNULL(Event.StartDate,'9999-01-01') >= '" . $date . "' OR DAYOFMONTH(Event.StartDate)<1 OR Event.StartDate<>Event.EndDate)
				";
		if (isset($date_end)) {
			//$sql .= "AND (Event.StartDate >= '" . $date . "' AND Event.EndDate <= '" . $date_end . "' ) ";
			//$sql .= "AND (Event.EndDate <= '" . $date_end . "' ) ";
			$sql .= "AND ((IFNULL(Event.StartDate,'9999-01-01') >= '" . $date . "' AND IFNULL(Event.EndDate,'0000-01-01') <= '" . $date_end . "') OR (Event.EndDate >= '" . $date . "' AND Event.StartDate <= '" . $date_end . "' ) OR DAYOFMONTH(Event.EndDate)<1) ";
		}
/*
		if (empty($libraryId) && empty($ageGroupId) && empty($categoryId) && empty($areaId)) {

			if ($curr_schedule_id != $scheduleId) {

				$sql .= " AND (DATEDIFF(IFNULL(Event.StartDate,'" . $schedule_start . "'), '" . $schedule_start . "') < 14 OR DAYOFMONTH(Event.StartDate)<1)";

			} else {

				$sql .= " AND (DATEDIFF(IFNULL(Event.StartDate,'" . $date . "'), '" . $date . "') < 14 OR DAYOFMONTH(Event.StartDate)<1)";
			}
		}
*/
		if (isset($libraryId)) $sql .= " AND Details.BranchID = " . $libraryId;
		if (isset($ageGroupId)) $sql .= " AND ATL_Program_AgeGroup.AgeGroupID = " . $ageGroupId;
		if (isset($categoryId)) $sql .= " AND ATL_Program_Category.CategoryID = " . $categoryId;
		if ($areaId == 12) $sql .= " AND Program.Keywords LIKE '%family literacy%'";
		if ($areaId == 4) $sql .= " AND (Program.Keywords LIKE '%black history month%' or Program.Description LIKE '%black history month%' or Details.Desc_Prefix LIKE '%black history month%' or Details.Desc_suffix LIKE '%black history month%')";
		if ($areaId == 3) $sql .= " AND ATL_Program_Category.CategoryID=6";
		if ($areaId == 16) $sql .= " AND (Program.SpecialNotes LIKE '%winterlight%' OR Program.Keywords LIKE '%winterlight%' OR Details.SpecialNotes LIKE '%winterlight%')";
		if (isset($textSearch)) $sql .= " AND (Program.ProgramName LIKE '%" . $textSearch . "%' OR Program.Description LIKE '%" . $textSearch . "%' OR Program.Keywords LIKE '%" . $textSearch . "%')";

		$sql .=	" ORDER BY Program.ProgramName,
					Details.ScheduledFor,
					IF (ISNULL(Event.StartDate) OR DAYOFMONTH(Event.StartDate)<1 OR Event.StartDate<>Event.EndDate,
						IF ('" . $date . "'<='" . $date . "',
							'" . $date . "',
							'" . $date . "'
						),
						IF (Event.StartDate = '" . $date . "',
						Event.StartDate - INTERVAL 10 YEAR,
						Event.StartDate
						)
					),
					IF(ISNULL(Event.StartDate) OR DAYOFMONTH(Event.StartDate)<1 OR Event.StartDate<>Event.EndDate, '00:00:00', Event.StartTime),
					Program.ProgramID,
					Library.BranchName,
					Details.EventID,
					Category.CategoryID,
					AgeGroup.GroupID
				";

		//if (empty($libraryId) && empty($ageGroupId) && empty($categoryId) && empty($areaId)) //$sql .= "LIMIT 15";

		// Change start
		$config = new DATABASE_CONFIG();
		$connection = mysql_connect($config->default["host"], $config->default["login"], $config->default["password"]);
		mysql_select_db($config->default["database"], $connection);

		//mysql_query("SET CHARACTER SET utf8", $connection);
		//mysql_query("SET NAMES utf8", $connection);
//echo $sql;
		$this->result = mysql_query($sql, $connection);
		$this->categoryProgram = mysql_fetch_assoc($this->result);

		//echo $sql, "<br/>";

		return;
		// Change end


	}



}
?>