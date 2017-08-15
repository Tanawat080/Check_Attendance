<?php session_start();?>
<?php

if (!$_SESSION["uname"]){  //check session

	  Header("Location: Login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form

}else{?>
<html>

<body>
<?php
date_default_timezone_set("Asia/Bangkok");
	include ("connectDB.php");
	$strSQL = mysqli_query($mysqli,"SELECT * FROM `teacher` WHERE userID='".$_SESSION['userID']."'");
	$objResult = mysqli_fetch_array($strSQL);

	for($i=1;$i<=$_POST["hdLine"];$i++)
	{
		if($_POST["studentID_".$i.""] != "")
		{
			$strSQL = "INSERT INTO `checkattendance` ";
			$strSQL .="(`studentID`,`subjectID`, `typeAttendanceID`, `attendanceDate`, `attendanceTime`, `attendanceNote`,`teacherID`) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$_POST["studentID_".$i.""]."','".$_GET["subjectID"]."','".$_POST["typeAttendance_".$i.""]."', ";
			$strSQL .="'".date("Y-m-d")."' ";
			$strSQL .=",'".date("G:i:s")."','".$_POST["note"]."','".$objResult['teacherID']."') ";
			$objQuery = mysqli_query($mysqli,$strSQL);
			echo $strSQL;
		}
	}

	$strSQLupdate = "UPDATE `subject` SET `update` = '".date("Y-m-d G:i:s")."'
	WHERE `subjectID` = '".$_GET["subjectID"]."' and `class` = '".$_GET["class"]."' ; ";
	$objQueryupdate = mysqli_query($mysqli,$strSQLupdate);

	Header ("Location: showAttendance_current.php?subjectID=".$_GET['subjectID']."&class=".$_GET['class']."");


?>
</body>
</html>
<?php }?>
