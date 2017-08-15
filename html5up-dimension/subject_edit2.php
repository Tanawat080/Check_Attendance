<html>
<head>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
date_default_timezone_set("Asia/Bangkok");

		//*** Update Record ***//
		include ("connectDB.php");

		$strSQL = "UPDATE `subject` SET `subjectID`='".$_POST["subjectID"]."',`subject`='".$_POST["subject"]."',`class`='".$_POST["class"]."',
		`update` = '".date("Y-m-d G:i:s")."' WHERE `subjectID` = '".$_GET["subjectID"]."' and `class` = '".$_GET["class"]."' ; ";
		$objQuery = mysqli_query($mysqli,$strSQL);
		echo $strSQL;
 		Header("Location: checkattendance.php");?>


</body>
</html>
