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
<br>
<form method="post" action="confirmAddStudents.php?subjectID=<?php echo $_GET['subjectID']."&class=".$_GET['class'];?>">

	<div class="container1" >
<div class="col-xs-4" >
        <label for="ex3">รหัสนักเรียน</label>
        <input class="form-control"  type="text" name="studentID">

				<label for="ex3">ชื่อ</label>
				<input class="form-control"  type="text" name="studentName">
				<label for="ex3">นามสกุล</label>
				<input class="form-control"  type="text" name="studentLastname">
				<label for="ex3">เบอร์โทรศัพท์</label>
				<input class="form-control"  type="text" name="studentPhonenumber">
						<?php
							include ("connectDB.php");
							$strSQL = mysqli_query($mysqli,"SELECT * FROM class where class='".$_GET['class']."'");
							$objResult = mysqli_fetch_array($strSQL);
			 			?>
						<input class="form-control"  type="hidden" name="classID" value="<?php echo $objResult['classID']; ?>">
		 <br>
<button type="submit" class="btn btn-success"><font color="#000000">เพิ่ม</font></button>

			</div>

		</div>
</form>

	</body>

</html>
<?php }?>
