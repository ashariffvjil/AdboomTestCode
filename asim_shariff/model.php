<?php 
/* @developed by    Asim Shariff
 * @package     	MVC config retrevial
 * @created on  	19/11/2014
 * @license     	VJIL Consulting Ltd.
 * @page			model.php
 * @description		Created for retrieving the configuration details.
 */
?>
<?php
class modelData
{
	public function getFileContent($fileName)
	{
		$fileContent=file_get_contents($fileName); // retrieves file content into a variable 
		$contentArray = explode("\n",$fileContent); // breaks the file content into lines and assigns to array
		$getValues=array();
		foreach($contentArray as $desc=>$keyValues)
		{
			$findString = array();
			preg_match('/(;)/', $keyValues, $findString); // search for semi colon
			$strPosition = strpos($keyValues, $findString[0]);
			
			if(count($findString[0])==0 || $strPosition!=0)
			{
				$contentData=explode("=",trim($keyValues));
				if($contentData[0]!=""&& $contentData[1]!="")
				{
					$realValue=explode(";",$contentData[1]);
					$getValues[$contentData[0]]=$realValue[0];
				}
			} 
		}
		return $getValues;
	}	
}
?>