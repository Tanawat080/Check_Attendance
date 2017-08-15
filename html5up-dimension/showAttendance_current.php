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
      <table border="1">
      		<td>
    		  <center> ลงชื่อเข้าใช้โดยรหัส :
    			<?php echo($_SESSION['userID']);?><br>
          ประเภทผู้ใช้งาน : <?php echo($_SESSION['typeUser']);?>
    			<?php //session_destroy();?>
    			<a href="logout.php"><font color="#CC0000">ออกจากระบบ</font></a></center>
        </td>
        </table>
				<hr>

		</div> <!-- จบล็อคเอ้าท์ -->

<div align="right">
	<a href="teacherpage.php"><button type="button" class="btn btn-primary"><font color="#000000">หน้าหลัก</font></button></a>	&nbsp;

</div>
    </div> <!-- จบล็อคเอ้าท์ -->
<br><br>
<form method="post" action="">
	<?php

		?>
		<center><h2>ผลการเช็คชื่อ ประจำวันที่ <?php echo date("Y-m-d"); ?></h2></center>
		<table width="800" border="1" align="center" bordercolor="#666666">
			<tr>
				<td width="50" align="center" bgcolor="#CCCCCC"><strong>ลำดับ</strong></td>
				<td width="100"align="center" bgcolor="#CCCCCC"><strong>รหัสนักเรียน</strong></td>
				<td width="300" align="center" bgcolor="#CCCCCC"><strong>ชื่อ - สกุล</strong></td>
				<td width="100" align="center" bgcolor="#CCCCCC"><strong>ห้อง</strong></td>
				<td width="200" align="center" bgcolor="#CCCCCC"><strong>สถานะ</strong></td>

		</tr>
		<?php
		//connect db
		date_default_timezone_set("Asia/Bangkok");
		include ("connectDB.php");
		$strSQL = mysqli_query($mysqli,"SELECT * FROM `teacher` WHERE userID='".$_SESSION['userID']."'");
		$objResult = mysqli_fetch_array($strSQL);

		$strSQLclass = mysqli_query($mysqli,"SELECT * FROM class WHERE class='".$_GET['class']."'");
		$objResultclass = mysqli_fetch_array($strSQLclass);

		$strSQL2 = "SELECT * FROM checkattendance,student,typeattendance where student.studentID=checkattendance.studentID
		and typeattendance.typeAttendanceID=checkattendance.typeAttendanceID
		and classID = '".$objResultclass['classID']."'
		and subjectID ='".$_GET['subjectID']."'
		and teacherID ='".$objResult['teacherID']."'
		and attendanceDate='".date("Y-m-d")."'";

		//echo $strSQL2;


		$result = mysqli_query($mysqli,$strSQL2);  //เรียกข้อมูลมาแสดงทั้งหมด
		$i=1;

		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td align='center'>" .$i. "</td>";
		echo "<td align='center'>" .$row['studentID']. "</td>"; ?>
		<input class="form-control"  type="hidden" name="studentID_<?php echo $i; ?>" value="<?php echo $row['studentID']; ?>">
		<?php
		echo "<td align='center'>" .$row['studentName']."&nbsp&nbsp".$row['studentLastname']. "</td>";
		echo "<td align='center'>" .$_GET['class']. "</td>";
		echo "<td align='center'>".$row['typeAttendance']."</td>";

		$i=$i+1;
		}

		?>

	</table><br><center>
		<a href="teacherpage.php"><button type="button" class="btn btn-success"><font color="#000000">เสร็จสิ้น</font></button></a>	&nbsp;
		<a ><button type="button" onclick="javascript:window.print()" class="btn btn-warning"><font color="#000000">พิมพ์</font></button></a>	&nbsp;
</center>
</form>

	</body>

</html>
<?php }?>
