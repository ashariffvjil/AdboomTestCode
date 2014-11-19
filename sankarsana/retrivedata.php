<?php 
/*################################################################ 
   Developer: sankarshana 
   Date: 11-19-2014  
   Get file content and displays search form and data 
   ###################################################################*/

class getFile_Contents
{
	function getFileContent($fileName)  // retrieves file, removes blank, commented lines and formats data, variables into array
	{
            $fileContent=file_get_contents($fileName); // retrieves file content into a variable 
            $contentArray = explode("\n",$fileContent); // breaks the file content into lines and assigns into array
            $getValues=array();
				foreach($contentArray as $desc=>$keyValues)
				{
					$findstring = array();
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
		  
	function searchContent($fetchData) // retrieves file data variables into select box
    {
          $sreachHtml="<form id='contentForm' method='post'><select name='dataValues'><option value=''>All Options</option>";	   
		   foreach($fetchData as $keyValues=>$keyVal){		       
		    if($keyVal!=""){
			    $selected=($keyValues==$_POST['dataValues'])?'selected':'';
				$sreachHtml.="<option value='".$keyValues."' ".$selected.">".$keyValues."</option>";
			}
		   }	
	     $sreachHtml.="</select> <input type='submit' value='Search'></form>";
		 return $sreachHtml;		    
    }
		  
    function resultSet($fetchData,$values)  // Displays file variables and values in Grid
	{
          $stringtype=$this->getCorrectVariable($fetchData[$values]);		  
		  $displayResult="<h3>Search Result</h3>";		  
		  $displayResult.="<table class='gridtable'><tr><th>Key</th><th>Value</th><th>Data Type</th></tr>";		  
		  if($values!="")
		  {
	         $displayResult.="<tr><td>".$values."</td><td>".$fetchData[$values]."</td><td>".gettype($stringtype)."</td></tr>";
		  }
		  else 
		  {
		    foreach($fetchData as $keyValues=>$keyVal)
			{
			  $stringtype=$this->getcorrectvariable($keyVal);
			  $displayResult.="<tr><td>".$keyValues."</td><td>".$keyVal."</td><td>".gettype($stringtype)."</td></tr>";
			}
		  }
		  $displayResult.="</table>";		  
		  return $displayResult;		    
	}
		 	
    function getCorrectVariable($string) // checks for the correct data type from file content
	{
		$string=trim($string);
    if(empty($string)) return "";
    else if(!preg_match("/[^-10-9.]+/",$string)){
        if(preg_match("/[.]+/",$string)){
            return (double)$string;
        }else{
            return (int)$string;
        }
    }
	else if(preg_match("/on/",strtolower($string))||preg_match("/off/",strtolower($string))||preg_match("/true/",strtolower($string))||preg_match("/false/",strtolower($string))){
              return (boolean)$string;
			}
	if($string=="true") return true;
    if($string=="false") return false;
    return (string)$string;
    }	
}

?>