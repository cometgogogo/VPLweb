  <?php
/**
 * Model class for Database (eproduct) Category
 */
class DatabaseCategory extends AppModel
{
	var $name = 'DatabaseCategory';				// Name of the Model
	var $useTable = 'Eproducts_Categories';		// Table this Model is connected to
	var $primaryKey = 'CategoryID';				// Primary key column in table

	// One to many relationship from this Category to the first four databases
	// (only used in "Browse Databases in Categories" page to show a few databases as a sample
	/*var $hasMany = 	array(
							'SampleDatabases' =>
								array(
									'className' => 'Database',
									'finderQuery' =>	'
														SELECT
															SampleDatabases.EproductID,
															SampleDatabases.Name,
															SampleDatabases.Short
														FROM
															Eproduct_Category,
															Eproducts AS SampleDatabases
														WHERE
															Eproduct_Category.CategoryID={$__cakeID__$} AND
															SampleDatabases.EproductID = Eproduct_Category.EproductID AND
															SampleDatabases.Live=\'1\'
														ORDER BY
															SampleDatabases.Name
														LIMIT 4
														'
								)
					);*/

	function findSampleDatabases($categoryID) {

		$sql = "SELECT SampleDatabases.EproductID, SampleDatabases.Name, SampleDatabases.Short FROM Eproduct_Category, Eproducts AS SampleDatabases WHERE SampleDatabases.EproductID = Eproduct_Category.EproductID AND SampleDatabases.Live='1' AND Eproduct_Category.CategoryID = '$categoryID' ORDER BY SampleDatabases.Name LIMIT 4";

		return $this->query($sql);

	}


}
?>