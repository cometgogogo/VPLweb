<?php
/**
 * List Helper, provides various useful lists.
 * ALL parameters are specified in the component.
 */
class ListHelper extends AppHelper
{

	function months() {
		$ret = array();
		$ret[] = "--Select--";
		$ret[] = "January";
		$ret[] = "February";
		$ret[] = "March";
		$ret[] = "April";
		$ret[] = "March";
		$ret[] = "May";
		$ret[] = "June";
		$ret[] = "August";
		$ret[] = "September";
		$ret[] = "October";
		$ret[] = "November";
		$ret[] = "December";
		return $ret;
	}

	function days() {
		$ret = array();
		$ret[] = "--";
		for ($i=1; $i<=31; $i++)
		{
		  $ret[] = $i;
		}
		return $ret;
	}


	function years() {
		return array("----",date('Y'), date('Y')+1);
	}





}



?>