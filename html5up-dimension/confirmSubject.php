<?php session_start();?>
<?php

if (!$_SESSION["uname"]){  //check session

	  Header("Location: Login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form

}else{?>
<?php
date_default_timezone_set("Asia/Bangkok");
$class=$_POST["class"];
$subjectID=$_POST["subjectID"];
$subject=$_POST["subject"];
include ("connectDB.php");

$strSQL = mysqli_query($mysqli,"select * from teacher where userID='".$_SESSION['userID']."'");
$objResult = mysqli_fetch_array($strSQL);

$strSQL2 = "INSERT INTO subject (`subjectID`, `subject`,class, `teacherID`,`update`)
            VALUES ('".$subjectID."','".$subject."','".$class."','".$objResult['teacherID']."','".date("Y-m-d G:i:s")."') ";
$objQuery2 = mysqli_query($mysqli,$strSQL2);
echo $strSQL2;

Header ("Location: checkattendance.php");
?>
<?php }?>
