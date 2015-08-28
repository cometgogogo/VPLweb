<?php

$broadSubjects = "";
$subjects = "";


$processedBroadSubjectID = null;
$processedSubjectID = null;
//print_r($relevantSubjects);

foreach ($relevantSubjects as $relevantSubject) {



	if ($relevantSubject["RL_BroadSubjects"]["BroadSubjectID"] != $processedBroadSubjectID) {
		$processedBroadSubjectID = $relevantSubject["RL_BroadSubjects"]["BroadSubjectID"];
		
		if ($processedBroadSubjectID == $currentBroadSubjectID) {
			$broadSubjects .= "<li class='subject_item_current'>";
			$broadSubjects .= $relevantSubject["RL_BroadSubjects"]["BroadSubjectName"];
		} else {
			$broadSubjects .= "<li class='subject_item'>";
			$broadSubjects .= $this->Html->link($relevantSubject["RL_BroadSubjects"]["BroadSubjectName"], "/links/index/broad_subject/" . $processedBroadSubjectID);
		}
		$broadSubjects .= "</li>";
	}
	if (isset($relevantSubject[0]["ApplicableSpecificSubjectID"])) {
		if ($relevantSubject[0]["ApplicableSpecificSubjectID"] != $processedSubjectID) {
			$processedSubjectID = $relevantSubject[0]["ApplicableSpecificSubjectID"];
			
			if ($processedSubjectID == $currentSubjectID) {
				$broadSubjects .= "<li class='subject_item_2_current'>";
				$broadSubjects .= $relevantSubject[0]["ApplicableSpecificSubjectName"] . " (".$relevantSubject[0]["HowMany"].")";
			} else {
				$broadSubjects .= "<li class='subject_item_2'>";
				$broadSubjects .= $this->Html->link($relevantSubject[0]["ApplicableSpecificSubjectName"] . " (".$relevantSubject[0]["HowMany"].")", "/links/index/subject/" . $processedSubjectID);
			}
			$broadSubjects .= "</li>";
		}
	}
}

?>


				<div class="entry framed_micro">
					<div class="opening"></div>
					<div class="details">



						<h3>Subjects:</h3>
						<ul class="subject_list">
						<?php echo $broadSubjects; ?>
						</ul>


					</div>
					<div class="closing"></div>
					<div class="section_end">
				</div>
