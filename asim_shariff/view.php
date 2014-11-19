<?php 
/* @developed by    Asim Shariff
 * @package     	MVC config retrevial
 * @created on  	19/11/2014
 * @license     	VJIL Consulting Ltd.
 * @page			view.php
 * @description		Created for displaying HTML content.
 */
?>
<?php class viewData
{
  function searchContent($fetchData) //Method to populate the search form
	{
          $searchHtml="<form id='contentForm' method='post'><select name='dataValues'><option value=''>Select Value</option>";	   
		   foreach($fetchData as $keyValues=>$keyVal){		       
		    if($keyVal!=""){
			    $selected=($keyValues==$_POST['dataValues'])?'selected':'';
				$searchHtml.="<option value='".$keyValues."' ".$selected.">".$keyValues."</option>";
			}
		   }	
	     $searchHtml.="</select> <input type='submit' value='Search'></form>";
		 return $searchHtml;		    
	}
		  
    function outputSet($fetchData,$values)
	{
          $stringType=$this->getCorrectVariable($fetchData[$values]);
		  $displayResult="<h3>Search Result</h3>";
		  $displayResult.="<table class='gridtable'><tr><th>Selected Value</th> <th>Value</th> <th>Data Type</th></tr>";
		  if($values!="")
		  {
			$displayResult.="<tr><td>".$values."</td><td>".$fetchData[$values]."</td><td>".gettype($stringType)."</td></tr>";
		  }
		  else 
		  {
		    foreach($fetchData as $keyValues=>$keyVal)
			{
			  $stringType=$this->getCorrectVariable($keyVal);
			  $displayResult.="<tr><td>".$keyValues."</td><td>".$keyVal."</td><td>".gettype($stringType)."</td></tr>";
			}
		  }
		  $displayResult.="</table>";
		 return $displayResult;
		    
	}
				
	function getCorrectVariable($string){
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