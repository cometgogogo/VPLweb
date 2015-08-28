<?php 
/**
 * Book Helper, provides ...
 * ...
 */
class BookHelper extends Helper 
{

	function bookReference($title = null, $author) {
		$ret
		return $ret;
	}
	
	
	
	function getBookInfo($title, $author) {
	
	
	
	}
	
	
	
	function getPage($URL)
	{
		$handle = @fopen ($URL, "r");
		if ($handle === false) return false;
		$buffer = "";
		while (!feof ($handle)) {
			$buffer .= fgets($handle, 4096);
		}
		fclose ($handle);
		return $buffer;
	}
	
	

}



?>