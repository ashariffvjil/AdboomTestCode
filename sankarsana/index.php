<?php 
/*################################################################ 
   Developer: sankarshana 
   Date: 11-19-2014  
   Get the file content variables, values and display in grid
 ###################################################################*/?>
<html>
<head>
	<link href="datatable.css" rel="stylesheet" type="text/css">
</head>
	<body>      
<?php require_once('retrivedata.php'); //includes the class file
$filename="config.ini"; //config file path name
$fileContent= new getFile_Contents(); // initializes the object of the class
$fileData=$fileContent->getFileContent($filename);// get file content with each key and variables avoiding blank lines and commented lines
echo $fileContent->searchContent($fileData); // gets key from select box and search button 
echo $fileContent->resultSet($fileData,$_POST['dataValues']); // displaying resultset  key values and data of the config file
?>
</body>
</html>



