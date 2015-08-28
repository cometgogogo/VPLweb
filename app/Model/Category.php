<?php
/**
 * Model class for Event categories
 */
class Category extends AppModel
{
	var $name = 'Category';					// Name of the Model
	var $useTable = 'ATL_Categories';		// Table this Model is connected to
	var $primaryKey = 'CategoryID';			// Primary key column in table


	// One to many relationship from this Category to teh events
	// Event represents all events
	// Main event represents a shorter version (only the first five)
	var $hasMany = 	array(
							'Event' =>
								array(
									'className' => 'Event',
									'finderQuery' =>	'
														SELECT
															Event.StartDate AS date,
															Event.StartTime AS time,
															Event.DayOfWeek AS week,
															Details.Desc_Suffix AS comment,
															Library.BranchName AS name,
															Library.BranchShort AS short,
															Library.BranchID AS id ,
															Program.ProgramName AS name,
															Program.Description AS description,
															Program.ProgramID AS id
														FROM
															ATL_Program_Category,
															ATL_Programs AS Program,
															ATL_Events AS Details,
															ATL_Event_Time AS Event,
															ATL_Schedule AS Schedule,
															Branches AS Library
														WHERE
															Schedule.ScheduleID = Details.ScheduledFor AND
															Schedule.EndDate >= CURDATE() AND
															ATL_Program_Category.CategoryID={$__cakeID__$} AND
															Program.ProgramID = ATL_Program_Category.ProgramID AND
															Details.ProgramID = ATL_Program_Category.ProgramID AND
															Details.PublicityStatus = 1 AND
															Event.EventID = Details.EventID AND
															(IFNULL(Event.StartDate,"9999-01-01") >= CURDATE() OR DAYOFMONTH(Event.StartDate)<1 OR (Event.StartDate <> Event.EndDate AND MainEvent.EndDate>= CURDATE())) AND
															Library.BranchID = Details.BranchID
														ORDER BY
															Event.StartDate,
															Event.StartTime
														'
								)
							,
							'MainEvent' =>
								array(
									'className' => 'Event',
									'finderQuery' =>	'
														SELECT
															MainEvent.StartDate AS date,
															MainEvent.StartTime AS time,
															MainEvent.DayOfWeek AS week,
															Details.Desc_Suffix AS comment,
															Library.BranchName AS name,
															Library.BranchShort AS short,
															Library.BranchID AS id ,
															Program.ProgramName AS name,
															Program.Description AS description,
															Program.ProgramID AS id
														FROM
															ATL_Program_Category,
															ATL_Programs AS Program,
															ATL_Events AS Details,
															ATL_Event_Time AS MainEvent,
															ATL_Schedule AS Schedule,
															Branches AS Library
														WHERE
															Schedule.ScheduleID = Details.ScheduledFor AND
															Schedule.EndDate >= CURDATE() AND
															ATL_Program_Category.CategoryID={$__cakeID__$} AND
															Program.ProgramID = ATL_Program_Category.ProgramID AND
															Details.ProgramID = ATL_Program_Category.ProgramID AND
															Details.PublicityStatus = 1 AND
															MainEvent.EventID = Details.EventID AND
															(IFNULL(MainEvent.StartDate,Schedule.StartDate) >= CURDATE() OR DAYOFMONTH(MainEvent.StartDate)<1 OR (MainEvent.StartDate <> MainEvent.EndDate AND MainEvent.EndDate>= CURDATE())) AND
															Library.BranchID = Details.BranchID
														ORDER BY
															MainEvent.StartDate,
															MainEvent.StartTime
														Limit 5
														'
								)


					);




}
?>