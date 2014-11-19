<?php 
/* @developed by    Asim Shariff
 * @package     	MVC config retrevial
 * @created on  	19/11/2014
 * @license     	VJIL Consulting Ltd.
 * @page			index.php
 * @description		Created for initalizing the MVC 
 */
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Test code for retrieval of configuartion details </title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
	<body>
		<?php  include "Controller.php";
			   $fileContents=new fileContent();
			   echo  $fileContents->index();		
		?>
	</body>
</html>
