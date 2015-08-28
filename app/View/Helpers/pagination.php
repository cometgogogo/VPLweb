<?php
/**
 * Pagination Helper, responsible for managing the LINKS required for pagination.
 * ALL parameters are specified in the component.
 */
class PaginationHelper extends Helper
{
	var $helpers = array('Html');

	function pageLinks($page, $totalLinks, $paginationBaseUrl) {
		if ($totalLinks>10) {
			echo "<div id='pagination'>";

			$totalPages = ceil($totalLinks/10);

			$maxPage = min($totalPages, max($page + 3, 7));
			$minPage = max(min($page + 3, $maxPage-6), 1);

			if ($minPage > 1) {
				//$prevPage = $page-1;
				echo $this->Html->link("First page",$paginationBaseUrl . "/1") . "<div class='page_index_separator'>&nbsp;|&nbsp;</div><wbr>";
			}

			for ($i=$minPage; $i<=$maxPage; $i++)
			{
				if ($i == $page) {
					//echo $i . "<div class='page_index_separator'>&nbsp; | &nbsp;<wbr></div>";

					echo $i . "&nbsp;&nbsp;";

				} else {
					//echo $this->Html->link($i,$paginationBaseUrl . "/" . $i) . "<div class='page_index_separator'>&nbsp; | &nbsp; <wbr></div>";

					echo $this->Html->link($i,$paginationBaseUrl . "/" . $i)."&nbsp;&nbsp;";

				}
			}

			if ($maxPage < $totalPages) echo "...&nbsp;";



			if ($maxPage < $totalPages) {
				echo "<div class='page_index_separator'>| &nbsp;<wbr></div>" . $this->Html->link("Last page",$paginationBaseUrl . "/" . $totalPages) . "<div class='page_index_separator'>&nbsp;<wbr></div>";
			}
			echo "</div>";
		}
	}
}



?>