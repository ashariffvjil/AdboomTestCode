<?php 
/* @developed by    Asim Shariff
 * @package     	MVC config retrevial
 * @created on  	19/11/2014
 * @license     	VJIL Consulting Ltd.
 * @page			controller.php
 * @description		Created for retrival of configuration details and output data population.
 */
?>
<?php
include_once('model.php');  
include_once('view.php');
class fileContent
{  
	function index()
	{
		$fileContents=new modelData();
		$fileName="config.ini";
		$fileData=$fileContents->getFileContent($fileName); 
		
		$viewContents=new viewData();
		echo $viewContents->searchContent($fileData); 
		
		$postedValue=$_POST['dataValues'];
		echo $viewContents->outputSet($fileData,$postedValue); 
	}
}
?>