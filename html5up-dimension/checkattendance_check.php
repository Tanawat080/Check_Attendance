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
    		  <center> ลงชื่อเข้าใช้โดยรหัส :
    			<?php echo($_SESSION['userID']);?><br>
          ประเภทผู้ใช้งาน : <?php echo($_SESSION['typeUser']);?>
    			<?php //session_destroy();?>
    			<a href="logout.php"><font color="#CC0000">ออกจากระบบ</font></a></center>
        </tr></td>
        </table>
				<hr>

    </div> <!-- จบล็อคเอ้าท์ -->

<div align="right">
	<a href="teacherpage.php"><button type="button" class="btn btn-primary"><font color="#000000">หน้าหลัก</font></button></a>	&nbsp;
	<a href="addstudents.php?subjectID=<?php echo $_GET['subjectID']."&class=".$_GET['class'];?>"><button type="button" class="btn btn-danger"><font color="#000000">เพิ่มชื่อนักเรียน</font></button></a> &nbsp;&nbsp;
</div>
<br>
<form method="post" action="confirmcheckattendance.php?subjectID=<?php echo $_GET['subjectID']."&class=".$_GET['class'];?>" >
<center><h3>รายวิชาที่สอน</h3>
<h4>รหัสวิชา <?php echo $_GET['subjectID']; echo "  -    ห้อง  "; echo $_GET['class'];  ?></h4>
</center>
<div class="table-responsive">
<table class="table table-hover" width="800" border="1" align="center" bordercolor="#666666">
	<tr>
		<td width="50" align="center" bgcolor="#CCCCCC"><strong>ลำดับ</strong></td>
		<td width="100"align="center" bgcolor="#CCCCCC"><strong>รหัสนักเรียน</strong></td>
		<td width="300" align="center" bgcolor="#CCCCCC"><strong>ชื่อ - สกุล</strong></td>
		<td width="100" align="center" bgcolor="#CCCCCC"><strong>ห้อง</strong></td>
		<td width="50" align="center" bgcolor="#CCCCCC"><strong>มา</strong></td>
		<td width="50" align="center" bgcolor="#CCCCCC"><strong>ขาด</strong></td>
		<td width="50" align="center" bgcolor="#CCCCCC"><strong>ลาป่วย</strong></td>
		<td width="50" align="center" bgcolor="#CCCCCC"><strong>ลากิจ</strong></td>
</tr>
<?php
//connect db
include ("connectDB.php");
$strSQL = mysqli_query($mysqli,"select * from class where class='".$_GET['class']."'");
$objResult = mysqli_fetch_array($strSQL);

$strSLQ2 = "select * from student,class where student.classID=class.classID and student.classID='".$objResult['classID']."' order by studentID";
$result = mysqli_query($mysqli, $strSLQ2);  //เรียกข้อมูลมาแสดงทั้งหมด
$i=1;

while($row = mysqli_fetch_array($result))
{
	echo "<tr class='active'>";
	echo "<td align='center'>" .$i. "</td>";
echo "<td align='center'>" .$row['studentID']. "</td>"; ?>
<input class="form-control"  type="hidden" name="studentID_<?php echo $i; ?>" value="<?php echo $row['studentID']; ?>">
<?php
echo "<td align='center'>" .$row['studentName']."&nbsp&nbsp".$row['studentLastname']. "</td>";
echo "<td align='center'>" .$row['class']. "</td>";
echo "<td align='center'><input type='radio' name='typeAttendance_".$i."' value='10001'></td>";
echo "<td align='center'><input type='radio' name='typeAttendance_".$i."' value='10002'></td>";
echo "<td align='center'><input type='radio' name='typeAttendance_".$i."' value='10003'></td>";
echo "<td align='center'><input type='radio' name='typeAttendance_".$i."' value='10004'></td>";
echo "</tr>";
echo "<input type='hidden' name='a' value='".$i."'>";
$i=$i+1;
}

?>

</table></div><br>
<input class="form-control"  type="hidden" name="hdLine" value="<?php echo $i-1; ?>">
<div class="container"align="center">
  <label >หมายเหตุ:</label>
 <textarea class="form-control" rows="5" name="note" style="width: 600px"></textarea>
	<br>
	<button type="submit" class="btn btn-success"><font color="#000000">บันทึก</font></button>
	<a href="checkattendance.php"><button type="button" class="btn btn-danger"><font color="#000000">ยกเลิก</font></button></a>
</div>

</form>
	</body>

</html>
<?php }?>
