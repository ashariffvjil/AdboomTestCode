<?php 
/*	
	Coded by: Sagar.K
	Date:19/11/2014
	These methods used in index.php file
*/
//This function retuns the array with keys and values
function getData($fileName){
	$file = @fopen($fileName, "r"); //open and read the file
	// adds each line to an array
	if ($file) {
	   $contentData = explode("\n", fread($file, filesize($fileName)));
	}
	$dataValues=array();
	foreach($contentData as $desc=>$keys){
		$matches = array();
		preg_match('/(;)/', $keys, $matches); // search for ; and store in $matches array
		$position = strpos($keys, $matches[0]); // finds the position of ;
		if(count($matches[0])==0 || $position!=0)// for uncommented lines
		{
			$data=explode("=",trim($keys)); //split into keys and values
			if($data[0]!="" && $data[1]!=""){
				$onlyValues=explode(";", $data[1]); //removes commented code after the value 
				$dataValues[$data[0]]=$onlyValues[0];
			}
		} 
	}
	return $dataValues;
}
//This function returns the datatype
function returnDataType($value){
	$dataType='String';
	$str1=filter_var($value, FILTER_VALIDATE_INT);
	$str2=filter_var($value, FILTER_VALIDATE_FLOAT);
	$str3=filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
	if($str1)
		$dataType=gettype($str1);
	else if($str2)
		$dataType=gettype($str2);
	else if($str3!== NULL) 
		$dataType=gettype($str3);	
	return $dataType;
}
?>