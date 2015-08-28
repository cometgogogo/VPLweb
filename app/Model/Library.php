<?php
class Library extends AppModel
{
	var $name = 'Library';
	var $useTable = 'Branches';
	var $primaryKey = 'BranchID';
	var $recursive = 3;

	/*

	var $hasMany = 	array(	'Event' =>
							array(
								'className' => 'Event',
								'conditions' => array("atl_events.BranchID"=>3)
							)
					);
	*/

	var $hasMany = 	array(	'Event' =>
							array(
								'className' => 'Event',
								'finderQuery' => 'SELECT Event.StartDate AS date, Event.StartTime AS time, Program.ProgramName AS name, Program.ProgramID AS id, Library.BranchName AS name, Library.BranchShort AS short, Library.BranchID AS id FROM ATL_Event_Time AS Event, ATL_Events, ATL_Programs AS Program, Branches AS Library WHERE ATL_Events.BranchID = {$__cakeID__$} AND ATL_Events.EventID = Event.EventID AND Program.ProgramID = ATL_Events.ProgramID AND Program.Status = 1 AND ATL_Events.PublicityStatus = 1 AND Library.BranchID = ATL_Events.BranchID AND Event.EndDate >= CURDATE() AND Event.EndTime >= CURTIME() ORDER BY Event.StartDate, Event.StartTime'
							)
					);


	// Many to many relationship to the LibraryFeature model
	var $hasAndBelongsToMany = array('LibraryFeature' =>array(
									'finderQuery' => 'SELECT
														LibraryFeature.BranchFeatureID,
														LibraryFeature.Name,
														LibraryFeature.Image,
														LibraryFeature.PageURL
													FROM
														BranchFeature AS LibraryToFeature JOIN BranchFeatures AS LibraryFeature ON LibraryFeature.BranchFeatureID = LibraryToFeature.BranchFeatureID
													WHERE LibraryToFeature.BranchID = {$__cakeID__$}
													ORDER BY LibraryFeature.Name'
										)
						);



	function nextEvents () {
		$sql = "SELECT
					Event.StartDate AS date,
					Event.StartTime AS time,
					Program.ProgramName AS name,
					Program.ProgramID AS id,
					Library.BranchName AS name,
					Library.BranchShort AS short,
					Library.BranchID AS id ,
					Schedule.StartDate AS start_date,
					Schedule.EndDate AS end_date
				FROM
					ATL_Event_Time AS Event,
					ATL_Events,
					ATL_Schedule AS Schedule,
					ATL_Programs AS Program,
					Branches AS Library
				WHERE
					Schedule.ScheduleID = ATL_Events.ScheduledFor AND (Schedule.StartDate <= '" . date("Y-m-d") . "' OR DAYOFMONTH(Schedule.StartDate)<1) AND (Schedule.EndDate >= '" . date("Y-m-d") . "' OR DAYOFMONTH(Schedule.EndDate)<1) AND
					ATL_Events.BranchID = " . $this->id . " AND
					ATL_Events.EventID = Event.EventID AND
					Program.ProgramID = ATL_Events.ProgramID AND
					Program.Status = 1 AND
					ATL_Events.PublicityStatus = 1 AND
					Library.BranchID = ATL_Events.BranchID AND
					(IFNULL(Event.StartDate,'9999-01-01') >= '" . date("Y-m-d") . "' OR DAYOFMONTH(Event.StartDate)<1)
				ORDER BY
					IF(ISNULL(Event.StartDate) OR DAYOFMONTH(Event.StartDate)<1, '9999-01-01', Event.StartDate),
					IF(ISNULL(Event.StartDate) OR DAYOFMONTH(Event.StartDate)<1, '00:00:00', Event.StartTime)
				LIMIT 20";
		return $this->query($sql);
	}

	function getDetails () {
		$ret = array();
		switch ($this->id) {
			case 1:	//Ansley Grove
			    $ret["coordinator"]["name"] = "Farida Shaikh";
			    $ret["coordinator"]["email"] = "Farida.Shaikh@vaughan.ca";
				$ret["internet_access"] = true;
				$ret["features"]["internet_cafe"] = true;
				$ret["reference_resources"] = false;
				$ret["multilingual"] = "Hindi, Italian, and Panjabi";
				$ret["special_collections"] = false;
				$ret["elibrary"] = false;
				$ret["business"] = true;
				$ret["hours"]["Monday"] = "Closed";
				$ret["hours"]["Tuesday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Wednesday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Thursday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Friday"] = "10:00 AM to 6:00 PM";
				$ret["hours"]["Saturday"] = "10:00 AM to 5:00 PM";
				$ret["hours"]["Sunday"] = "1:00 PM to 5:00 PM";
				$ret["pictures"][] = array("picture"=>"an-entry-big.jpg","caption"=>"Welcome to Ansley Grove Library");
				$ret["pictures"][] = array("picture"=>"an-anf-big.jpg","caption"=>"Caption missing");
				$ret["pictures"][] = array("picture"=>"an-internet-big.jpg","caption"=>"Internet stations");
				$ret["pictures"][] = array("picture"=>"an-kids-room-big.jpg","caption"=>"Children&acute;s area");
				$ret["pictures"][] = array("picture"=>"an-leisure-big.jpg","caption"=>"Relax with a good book");
				$ret["pictures"][] = array("picture"=>"an-videos-big.jpg","caption"=>"A great selection of videos for all ages");
				$ret["gmaploc"]="!1m24!1m12!1m3!1d5759.680899606509!2d-79.56762804017876!3d43.79692365084849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!1i0!3e0!4m0!4m5!1s0x882b2562e2db015b%3A0x8debca6f3a2d0f29!2s350+Ansley+Grove+Rd%2C+Woodbridge%2C+ON+L4L!3m2!1d43.796915999999996!2d-79.5630039!5e0!3m2!1sen!2sca!4v1416951863650";
				break;
			case 2:	//Bathurst Clark
				$ret["coordinator"]["name"] = "Nick Wesson";
			    $ret["coordinator"]["email"] = "nick.wesson@vaughan.ca";
			   $ret["manager"]["name"] = "Lisa McDonough ";
			   $ret["manager"]["email"] = "Lisa.McDonough@vaughan.ca";
				$ret["internet_access"] = true;
				$ret["features"]["internet_cafe"] = true;
				$ret["reference_resources"] = true;
				$ret["multilingual"] = "Chinese, Farsi, Hebrew, Hindi, Italian, Korean, Panjabi, Russian and Spanish";
				$ret["special_collections"] = false;
				$ret["elibrary"] = false;
				$ret["business"] = true;
				$ret["hours"]["Monday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Tuesday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Wednesday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Thursday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Friday"] = "10:00 AM to 6:00 PM";
				$ret["hours"]["Saturday"] = "10:00 AM to 5:00 PM";
				$ret["hours"]["Sunday"] = "10:00 AM to 5:00 PM";
				$ret["pictures"][] = array("picture"=>"bc-welcome-big.jpg","caption"=>"Welcome to Bathurst Clark Reference Library");
				$ret["pictures"][] = array("picture"=>"bc-info-desk-big.jpg","caption"=>"Information retrieval expertise");
				$ret["pictures"][] = array("picture"=>"bc-internet-big.jpg","caption"=>"Internet stations");
				$ret["pictures"][] = array("picture"=>"bc-centre-big.jpg","caption"=>"Plenty of room to study");
				$ret["pictures"][] = array("picture"=>"bc-study-room-big.jpg","caption"=>"Private study rooms");
				$ret["pictures"][] = array("picture"=>"bc-business-big.jpg","caption"=>"Staff to help you");
				$ret["gmaploc"]="!1m24!1m12!1m3!1d5759.071429027959!2d-79.4570668401776!3d43.803246250028025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!1i0!3e0!4m0!4m5!1s0x882b2c36bca89181%3A0x3c8e59f6bedc7de1!2s900+Clark+Ave+W%2C+Vaughan%2C+ON!3m2!1d43.8032386!2d-79.45244269999999!5e0!3m2!1sen!2sca!4v1416950833903";
				break;
			case 3:	//Dufferin Clark

			$ret["coordinator"]["name"] = "Miranda Yu";
			   $ret["coordinator"]["email"] = "miranda.yu@vaughan.ca";
			  //$ret["coordinator"]["name"] = "Jessica Chapman";
			  // $ret["coordinator"]["email"] = "Jessica.Chapman@vaughan.ca";
				$ret["internet_access"] = true;
				$ret["features"]["internet_cafe"] = true;
				$ret["reference_resources"] = false;
				$ret["multilingual"] = "Chinese, Gujarati, Hebrew, Hindi, Italian, Panjabi, Russian and Spanish";
				$ret["special_collections"] = false;
				$ret["elibrary"] = false;
				$ret["business"] = true;
				$ret["hours"]["Monday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Tuesday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Wednesday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Thursday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Friday"] = "Closed";
				$ret["hours"]["Saturday"] = "10:00 AM to 5:00 PM";
				$ret["hours"]["Sunday"] = "1:00 PM to 5:00 PM";
				$ret["pictures"][] = array("picture"=>"dc-welcome-big.jpg","caption"=>"Welcome to Dufferin Clark Library");
				$ret["pictures"][] = array("picture"=>"dc-fiction-big.jpg","caption"=>"Helpful staff");
				$ret["pictures"][] = array("picture"=>"dc-homework-big.jpg","caption"=>"Resources for school assignments");
				$ret["pictures"][] = array("picture"=>"dc-magazines-big.jpg","caption"=>"The latest magazines on many topics");
				$ret["pictures"][] = array("picture"=>"dc-study-big.jpg","caption"=>"Large, comfortable study area");
				$ret["pictures"][] = array("picture"=>"dc-web-help-big.jpg","caption"=>"Internet stations");
				$ret["gmaploc"]="!1m24!1m12!1m3!1d5759.621812197433!2d-79.47501544017867!3d43.79753665076875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!1i0!3e0!4m0!4m5!1s0x882b2e7f8758909d%3A0xbb045bf6087baeb6!2s1441+Clark+Ave+W%2C+Thornhill%2C+ON+L4J+7R5!3m2!1d43.797529!2d-79.4703913!5e0!3m2!1sen!2sca!4v1416953647309";
				break;
			case 4:	//eLibrary
				$ret["internet_access"] = false;
				$ret["reference_resources"] = false;
				$ret["multilingual"] = false;
				$ret["special_collections"] = false;
				$ret["elibrary"] = true;
				$ret["business"] = false;
				break;
			case 5:	//Kleinburg
				$ret["coordinator"]["name"] = "Tim Pate";
				$ret["coordinator"]["email"] = "tim.pate@vaughan.ca";
				//$ret["manager"]["name"] = "Miranda Yu";
			   // $ret["manager"]["email"] = "miranda.yu@vaughan.ca";
				$ret["manager"]["name"] = "Melanie Raymond";
			    $ret["manager"]["email"] = "melanie.raymond@vaughan.ca";
			    //$ret["manager"]["name"] = "Lisa McDonough";
			    //$ret["manager"]["email"] = "lisa.mcDonough@vaughan.ca";
				$ret["internet_access"] = true;
				$ret["features"]["internet_cafe"] = true;
				$ret["reference_resources"] = false;
				$ret["multilingual"] = false;
				$ret["special_collections"] = false;
				$ret["elibrary"] = false;
				$ret["business"] = true;
				$ret["hours"]["Monday"] = "1:00 PM to 8:00 PM";
				$ret["hours"]["Tuesday"] = "10:00 AM to 5:00 PM";
				$ret["hours"]["Wednesday"] = "1:00 PM to 8:00 PM";
				$ret["hours"]["Thursday"] = "1:00 PM to 8:00 PM";
				$ret["hours"]["Friday"] = "Closed";
				$ret["hours"]["Saturday"] = "1:00 PM to 5:00 PM";
				$ret["hours"]["Sunday"] = "1:00 PM to 5:00 PM";;
				$ret["pictures"][] = array("picture"=>"kb-welcome-big.jpg","caption"=>"Welcome to Kleinburg Library");
				$ret["pictures"][] = array("picture"=>"kb-child-mom-big.jpg","caption"=>"Family-oriented storytime");
				$ret["pictures"][] = array("picture"=>"kb-info-big.jpg","caption"=>"Helpful staff");
				$ret["pictures"][] = array("picture"=>"kb-webhelp-big.jpg","caption"=>"Internet stations");
				$ret["gmaploc"]="!1m24!1m12!1m3!1d5755.504921268197!2d-79.62943064017107!3d43.840230345227894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!1i0!3e0!4m0!4m5!1s0x882b243cfdaf39c3%3A0xf1ff86b714676822!2s10341+Islington+Ave%2C+Kleinburg%2C+ON+L0J!3m2!1d43.8402227!2d-79.62480649999999!5e0!3m2!1sen!2sca!4v1416953708514";
				break;
			case 6:	//Maple
				$ret["manager"]["name"] = "June Orrell";
			    $ret["manager"]["email"] = "june.orrell@vaughan.ca";
				$ret["internet_access"] = true;
				$ret["features"]["internet_cafe"] = true;
				$ret["reference_resources"] = false;
				$ret["multilingual"] = "Hindi, Italian, Panjabi, Tamil and Urdu";
				$ret["special_collections"] = false;
				$ret["elibrary"] = false;
				$ret["business"] = true;
				$ret["hours"]["Monday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Tuesday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Wednesday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Thursday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Friday"] = "10:00 AM to 6:00 PM";
				$ret["hours"]["Saturday"] = "10:00 AM to 5:00 PM";
				$ret["hours"]["Sunday"] = "1:00 PM to 5:00 PM";
				$ret["pictures"][] = array("picture"=>"ma-welcome-big.jpg","caption"=>"Welcome to Maple Library");
				$ret["pictures"][] = array("picture"=>"ma-contact-big.jpg","caption"=>"Here to help");
				$ret["pictures"][] = array("picture"=>"ma-ebook-big.jpg","caption"=>"Borrow an e-book");
				$ret["pictures"][] = array("picture"=>"ma-india-big.jpg","caption"=>"Multilingual collections");
				$ret["pictures"][] = array("picture"=>"ma-storytime-big.jpg","caption"=>"Captivating programs for all ages");
				$ret["pictures"][] = array("picture"=>"ma-study-big.jpg","caption"=>"Study areas");
				$ret["pictures"][] = array("picture"=>"ma-webhelp-big.jpg","caption"=>"Internet stations");
				$ret["gmaploc"]="!1m24!1m12!1m3!1d5753.631684775178!2d-79.51828424016762!3d43.85964554270669!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!1i0!3e0!4m0!4m5!1s0x882b29203c9836d5%3A0x520207dad5ef37cd!2s10190+Keele+St%2C+Maple%2C+ON+L6A+3Y9!3m2!1d43.859637899999996!2d-79.5136601!5e0!3m2!1sen!2sca!4v1416953769247";
				break;
			case 7:	//Pierre Berton
				$ret["coordinator"]["name"] = "Tim Pate";
				$ret["coordinator"]["email"] = "tim.pate@vaughan.ca";
				//$ret["manager"]["name"] = "Lisa McDonough";
			    //$ret["manager"]["email"] = "lisa.mcDonough@vaughan.ca";
			    $ret["manager"]["name"] = "Melanie Raymond";
			    $ret["manager"]["email"] = "melanie.raymond@vaughan.ca";
			    //$ret["manager"]["name"] = "Miranda Yu";
			   // $ret["manager"]["email"] = "miranda.yu@vaughan.ca";
				$ret["internet_access"] = true;
				$ret["features"]["internet_cafe"] = true;
				$ret["reference_resources"] = true;
				$ret["multilingual"] = "Chinese, Gujarati, Hindi, Italian, Panjabi, Spanish and Urdu";
				$ret["special_collections"] = false;
				$ret["elibrary"] = false;
				$ret["business"] = true;
				$ret["hours"]["Monday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Tuesday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Wednesday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Thursday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Friday"] = "10:00 AM to 6:00 PM";
				$ret["hours"]["Saturday"] = "10:00 AM to 5:00 PM";
				$ret["hours"]["Sunday"] = "10:00 AM to 5:00 PM";
				$ret["pictures"][] = array("picture"=>"pb-outside-1.JPG","caption"=>"Needs caption");
				$ret["pictures"][] = array("picture"=>"pb-outside-2.JPG","caption"=>"Needs caption");
				$ret["gmaploc"]="!1m24!1m12!1m3!1d92122.95513187147!2d-79.67000047459861!3d43.817629400699516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!1i0!3e0!4m0!4m5!1s0x882b25af11b38525%3A0xa4a86f5efcd5690e!2s4921+Rutherford+Rd%2C+Woodbridge%2C+ON+L4L+1A6!3m2!1d43.8175294!2d-79.5960114!5e0!3m2!1sen!2sca!4v1416953819248";
				break;
			case 8:	//Woodbridge
				//$ret["coordinator"]["name"] = "Jennifer Stephen";
				//$ret["coordinator"]["email"] = "jennifer.stephen@vaughan.ca";
				$ret["coordinator"]["name"] = "Jessica Chapman";
			    $ret["coordinator"]["email"] = "Jessica.Chapman@vaughan.ca";
				$ret["internet_access"] = true;
				$ret["features"]["internet_cafe"] = true;
				$ret["reference_resources"] = false;
				$ret["multilingual"] = "Italian";
				$ret["special_collections"] = false;
				$ret["elibrary"] = false;
				$ret["business"] = true;
				$ret["hours"]["Monday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Tuesday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Wednesday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Thursday"] = "10:00 AM to 9:00 PM";
				$ret["hours"]["Friday"] = "Closed";
				$ret["hours"]["Saturday"] = "10:00 AM to 5:00 PM";
				$ret["hours"]["Sunday"] = "1:00 PM to 5:00 PM";
				$ret["pictures"][] = array("picture"=>"wo-welcome-big.jpg","caption"=>"Welcome to Woodbrige Library");
				$ret["pictures"][] = array("picture"=>"wo-anf-big.jpg","caption"=>"End of bay displays feature new arrivals");
				$ret["pictures"][] = array("picture"=>"wo-internet-big.jpg","caption"=>"Internet stations");
				$ret["pictures"][] = array("picture"=>"wo-italian-big.jpg","caption"=>"Large collection of books in Italian");
				$ret["pictures"][] = array("picture"=>"wo-music-big.jpg","caption"=>"Videos, CDs and DVDs");
				$ret["pictures"][] = array("picture"=>"wo-study-big.jpg","caption"=>"Bright, comfortable study area");
				$ret["gmaploc"]="!1m24!1m12!1m3!1d5760.858972604142!2d-79.59828094018098!3d43.784700352434044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!1i0!3e0!4m0!4m5!1s0x882b253ad690afd1%3A0x7e324717302832ef!2s150+Woodbridge+Ave%2C+Woodbridge%2C+ON+L4L+2S7!3m2!1d43.7846927!2d-79.59365679999999!5e0!3m2!1sen!2sca!4v1416953850551";
				break;
		case 10:	//Pleasant Ridge Library
						$ret["coordinator"]["name"] = "Jennifer Stephen";
						$ret["coordinator"]["email"] = "jennifer.stephen@vaughan.ca";
						//$ret["coordinator"]["name"] = "Jessica Chapman";
					    //$ret["coordinator"]["email"] = "Jessica.Chapman@vaughan.ca";
						$ret["internet_access"] = true;
						$ret["features"]["internet_cafe"] = true;
						$ret["reference_resources"] = false;
						$ret["multilingual"] = false;
						$ret["special_collections"] = false;
						$ret["elibrary"] = false;
						$ret["business"] = true;
						$ret["hours"]["Monday"] = "10:00 AM to 9:00 PM";
						$ret["hours"]["Tuesday"] = "10:00 AM to 9:00 PM";
						$ret["hours"]["Wednesday"] = "10:00 AM to 9:00 PM";
						$ret["hours"]["Thursday"] = "10:00 AM to 9:00 PM";
						$ret["hours"]["Friday"] = "Closed";
						$ret["hours"]["Saturday"] = "10:00 AM to 5:00 PM";
						$ret["hours"]["Sunday"] = "1:00 PM to 5:00 PM";
						$ret["pictures"][] = array("picture"=>"wo-welcome-big.jpg","caption"=>"Welcome to Woodbrige Library");
						$ret["pictures"][] = array("picture"=>"wo-anf-big.jpg","caption"=>"End of bay displays feature new arrivals");
						$ret["pictures"][] = array("picture"=>"wo-internet-big.jpg","caption"=>"Internet stations");
						$ret["pictures"][] = array("picture"=>"wo-italian-big.jpg","caption"=>"Large collection of books in Italian");
						$ret["pictures"][] = array("picture"=>"wo-music-big.jpg","caption"=>"Videos, CDs and DVDs");
						$ret["pictures"][] = array("picture"=>"wo-study-big.jpg","caption"=>"Bright, comfortable study area");
				$ret["gmaploc"]="!1m24!1m12!1m3!1d5756.235764653401!2d-79.47900174017244!3d43.83265364621152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!1i0!3e0!4m0!4m5!1s0x882b2ea966e8d6b1%3A0x138715ef4dce7ef0!2s300+Pleasant+Ridge+Ave%2C+Thornhill%2C+ON+L4J!3m2!1d43.832646!2d-79.4743776!5e0!3m2!1sen!2sca!4v1416953923369";
				break;
		}
		return $ret;
	}







}
?>