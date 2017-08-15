<?php session_start();?>
<?php

if (!$_SESSION["uname"]){  //check session

	  Header("Location: Login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form

}else{?>
<?php
date_default_timezone_set("Asia/Bangkok");
$studentID=$_POST["studentID"];
$studentName=$_POST["studentName"];
$studentLastname=$_POST["studentLastname"];
$studentPhonenumber=$_POST["studentPhonenumber"];
$classID=$_POST["classID"];
include ("connectDB.php");

//$strSQL = mysqli_query($mysqli,"select * from teacher where userID='".$_SESSION['userID']."'");
//$objResult = mysqli_fetch_array($strSQL);

$strSQL2 = "INSERT INTO `student`(`studentID`, `studentName`, `studentLastname`, `studentPhonenumber`, `classID`)
            VALUES ('".$studentID."','".$studentName."','".$studentLastname."','".$studentPhonenumber."','".$classID."') ";
$objQuery2 = mysqli_query($mysqli,$strSQL2);
echo $strSQL2;

Header ("Location: checkattendance_check.php?subjectID=".$_GET['subjectID']."&class=".$_GET['class']."");
?>
<?php }?>
