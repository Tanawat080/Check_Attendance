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
<div class="abcd">
	<body background="/images/bg.jpg">
<!-- ล็อคเอ้าท์ -->
    <div align="right" class="a" ><br>
      <table border="1" bordercolor="#000000" cellpadding="5">
				<tr>
      		<td>
    		  <center><font color='#003366'> ลงชื่อเข้าใช้โดยรหัส :
    			<?php echo($_SESSION['userID']);?><br>
          ประเภทผู้ใช้งาน : <?php echo($_SESSION['typeUser']);?> </font>
    			<?php //session_destroy();?>
    			<a href="logout.php"><font color="#CC0000">ออกจากระบบ</font></a></center>
        </tr></td>
        </table>
				<hr>

    </div> <!-- จบล็อคเอ้าท์ -->

<div align="right">
	<a href="teacherpage.php"><button type="button" class="btn btn-primary"><font color="#000000">หน้าหลัก</font></button></a>	&nbsp;
	<a href="addsubject.php"><button type="button" class="btn btn-danger"><font color="#000000">เพิ่มรายวิชา</font></button></a> &nbsp;&nbsp;
</div>
<br>
<center><h3><font color='#003366'>รายวิชาที่สอน</font></h3></center>
<div class="table-responsive">
<table class="table" width="800" border="1" align="center" bordercolor="#666666" >
	<tr>
		<td width="100" align="center" bgcolor="#CCCCCC"><strong><font color='#003366'>รหัสวิชา</font></strong></td>
		<td width="200"align="center" bgcolor="#CCCCCC"><strong><font color='#003366'>วิชา (ห้อง)</font></strong></td>
		<td width="200" align="center" bgcolor="#CCCCCC"><strong><font color='#003366'>อัพเดทล่าสุด</font></strong></td>
</tr>
<?php
//connect db
include ("connectDB.php");
$strSQL = mysqli_query($mysqli,"select * from teacher where userID='".$_SESSION['userID']."'");
$objResult = mysqli_fetch_array($strSQL);

$strSLQ2 = "select * from subject where teacherID='".$objResult['teacherID']."'";
$result = mysqli_query($mysqli, $strSLQ2);  //เรียกข้อมูลมาแสดงทั้งหมด
while($row = mysqli_fetch_array($result))
{
echo "<tr class='active'>";
echo "<td align='center'><font color='#003366'><a href='showAttendance_current.php?subjectID=".$row["subjectID"]."&class=".$row['class']."'>" . $row["subjectID"] . "</a></font></td>";
echo "<td align='center'><font color='#003366'>" . $row["subject"] ."&nbsp" .$row['class']. "</font></td>";
echo "<td align='center'><font color='#CC0000'>" . $row["update"] . "</font></td>";
echo "</tr>";
}
?>
</table>
</div>
	</body>

</html>
<?php }?>
