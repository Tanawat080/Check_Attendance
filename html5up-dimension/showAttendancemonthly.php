<?php session_start();?>
<?php

if (!$_SESSION["uname"]){  //check session

	  Header("Location: Login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form

}else{?>
<html>
	<head>
		<title>KSP CHECKING</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="/lib/w3.css"
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	</head>
	<style>
	div.abcd{
		font-family: "FontAwesome",sans-serif;

	}div.abcd img{
		border-radius:5px;
	}div.abcd h1,h2,h3,h4,h5{
		display: block;
		font-weight: 600;
		letter-spacing: 0.2rem;
		line-height: 1.5;
		margin: 0 0 1rem 0;
		text-transform: uppercase;
	}
	</style>
	<script>

function showUser(str) {
if (str=="") {
	document.getElementById("txtHint").innerHTML="";
	return;
}
if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
} else { // code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function() {
	if (this.readyState==4 && this.status==200) {
		document.getElementById("txtHint").innerHTML=this.responseText;
	}
}

xmlhttp.open("GET","showAttendancedaily2.php?q="+str,true);
xmlhttp.send();
}
</script>
<div class="abcd">
	<body background="/images/bg.jpg">

<!-- ล็อคเอ้าท์ -->
    <div align="right" class="a" ><br>
      <table border="1">
      		<td>
    		  <center> ลงชื่อเข้าใช้โดยรหัส :
    			<?php echo($_SESSION['userID']);?><br>
          ประเภทผู้ใช้งาน : <?php echo($_SESSION['typeUser']);?>
    			<?php //session_destroy();?>
    			<a href="logout.php"><font color="#CC0000">ออกจากระบบ</font></a></center>
        </td>
        </table>
				<br><hr>

		</div> <!-- จบล็อคเอ้าท์ -->

<div align="right">
	<a href="adminpage.php"><button type="button" class="btn btn-primary"><font color="#000000">หน้าหลัก</font></button></a>	&nbsp;

</div>
    </div> <!-- จบล็อคเอ้าท์ -->
<br><br>
<form name="" method="post" >
<?php

date_default_timezone_set("Asia/Bangkok");
include ("connectDB.php");


$strSQLclass = mysqli_query($mysqli,"SELECT * FROM class WHERE class='".$_GET['class']."'");
$objResultclass = mysqli_fetch_array($strSQLclass);

$strSQL = mysqli_query($mysqli,"SELECT * FROM `student` WHERE studentID='".$objResultclass['classID']."'");
$objResult = mysqli_fetch_array($strSQL);

// ทั้งหมด
$strSQLAll = mysqli_query($mysqli,"SELECT COUNT(typeattendanceID) as countAll,student.studentID,student.studentName,student.studentLastname
FROM checkattendance,student,class
WHERE student.studentID=checkattendance.studentID  and subjectID='".$_GET['subjectID']."'
and class.classID=student.classID and student.classID='".$objResultclass['classID']."'
group by student.studentID");


$strSQLBS = mysqli_query($mysqli,"SELECT count(typeattendanceID) as countAll
,(sum(IF(typeAttendanceID=10001,1,0))) as countPresent
,(sum(IF(typeAttendanceID=10002,1,0))) as countsick
,(sum(IF(typeAttendanceID=10003,1,0))) as countbs
,(sum(IF(typeAttendanceID=10004,1,0))) as countabsent
,student.studentID,studentName,studentLastname
FROM checkattendance,student,class
where student.studentID=checkattendance.studentID
and class.classID=student.classID
and student.classID='".$objResultclass['classID']."'
and subjectID='".$_GET['subjectID']."' GROUP BY studentID");

?>

</center>
<div class="table-responsive">
<table class="table table-hover" width="800" border="1" align="center" bordercolor="#666666">
<tr class='active'>
	<td width="50" align="center" bgcolor="#CCCCCC"><strong>ลำดับ</strong></td>
	<td width="100"align="center" bgcolor="#CCCCCC"><strong>รหัสนักเรียน</strong></td>
	<td width="300" align="center" bgcolor="#CCCCCC"><strong>ชื่อ - สกุล</strong></td>
	<td width="100" align="center" bgcolor="#CCCCCC"><strong>ห้อง</strong></td>
	<td width="50" align="center" bgcolor="#CCCCCC"><strong>ทั้งหมด</strong></td>
	<td width="50" align="center" bgcolor="#CCCCCC"><strong>มา</strong></td>
	<td width="50" align="center" bgcolor="#CCCCCC"><strong>ขาด</strong></td>
	<td width="50" align="center" bgcolor="#CCCCCC"><strong>ลาป่วย</strong></td>
	<td width="50" align="center" bgcolor="#CCCCCC"><strong>ลากิจ</strong></td>

</tr>
<?php
$i=1;
while($objResult = mysqli_fetch_array($strSQLBS)){

?>

<tr class='active'>
<td><div align="center"><?php echo $i;?></div></td>
	<td><center><?php echo $objResult["studentID"];?></center></td>
<td><?php echo $objResult["studentName"]."   ".$objResult["studentLastname"];?></center></td>
<td><center><?php echo $objResultclass["class"];?></center></td>
<td><center><?php echo $objResult["countAll"];?></center></td>
	<td><center><?php echo $objResult["countPresent"];?></center></td>
	<td><center><?php if ($objResult["countabsent"]>0){ ?> <font color="#CC0000" ><?php echo $objResult["countabsent"]; ?></font> <?php }else{echo $objResult["countabsent"];} ?></center></td>
	<td><center><?php if ($objResult["countsick"]>0){ ?> <font color="#CC0000" ><?php echo $objResult["countsick"]; ?></font> <?php }else{echo $objResult["countsick"];} ?></center></td>
	<td><center><?php if ($objResult["countbs"]>0){ ?> <font color="#CC0000" ><?php echo $objResult["countbs"]; ?></font> <?php }else{echo $objResult["countbs"];} ?></center></td>

</tr>

<?php
$i++;
}
?>


</table>

</div><br><center>
	<a href="teacherpage.php"><button type="button" class="btn btn-success"><font color="#000000">เสร็จสิ้น</font></button></a>	&nbsp;
	<a ><button type="button" onclick="javascript:window.print()" class="btn btn-warning"><font color="#000000">พิมพ์</font></button></a>	&nbsp;
</center>

</form>


</form>
	</body>

</html>
<?php }?>
