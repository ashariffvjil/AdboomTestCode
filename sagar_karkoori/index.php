<?php 
/*	
	Coded by: Sagar.K
	Date:19/11/2014
	Functionality: Retrieve the config file data.
				   Display the uncommented lines with keys, values and datatype of the value.
*/
include "cfunctions.php"; //for calling methods
$fileName="php.ini"; //config file
$dataValues=getData($fileName); //getting the data in an array
?><html>
<head><link href="style.css" rel="stylesheet" type="text/css"></head>
<form id="frmConfig" method="post">
	<label><b>Select Key</b></label> 
	<select name="keys">
		<option value=''>All</option>
	<?php
		foreach($dataValues as $keyValues=>$keyVal){
			if($keyVal!=""){
				$selected=($keyValues==$_POST['keys'])?'selected':'';
				echo "<option value='".$keyValues."'".$selected.">".$keyValues."</option>";
			}
		}	?>
	</select> 
	<input type="submit" value="Search">
</form>
<h3>Output</h3>
<table width="60%" id="tblTotResult" class="gridtable" border="1px" cellspacing="0">
	<tr>
		<th>Key</th>
		<th>Value</th>
		<th>Data Type</th>
	</tr>
<?php 
	if($_POST['keys']!=""){ //displays selected record.
		$postedVal=$_POST['keys'];
		$valueType=returnDataType($dataValues[$postedVal]);//for getting the datatype of the value
		echo "<tr><td>".$postedVal."</td><td>".$dataValues[$postedVal]."</td><td>".$valueType."</td></tr>";
	} else { //displays all records
		foreach($dataValues as $keyValues=>$keyVal){
			$valueType=returnDataType($keyVal);//for getting the datatype of the value
			echo "<tr><td>".$keyValues."</td><td>".$keyVal."</td><td>".$valueType."</td></tr>";
		}
	}	?>
</table>
</html>