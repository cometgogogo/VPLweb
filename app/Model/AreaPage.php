<?php
/**
 * Model class for Pages an Area of the site has
 * for example: the Area "Access Kyoto Collection" has 4 associated pages: links, databses, guides and email librarian
 */
class AreaPage extends AppModel
{
	var $name = 'AreaPage';			// Name of the Model
	var $useTable = 'Area_pages';	// Table this Model is connected to
}
?>