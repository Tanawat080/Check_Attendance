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
<form method="post" action="showAttendancedaily2.php?subjectID=<?php echo $_GET['subjectID'];?>&class=<?php echo $_GET['class'];?>" enctype="multipart/form-data">


							<div class="form-group" style="position:relative; left:477px;">
							<?php include ("connectDB.php"); ?>
              <label for="sel1">วันที่ :</label>

		  			<select class="form-control" name="attendanceDate"  style="width:400px;">
										<option >เลือกวันที่</option>
		                  <?php

		                      $strSQL3=mysqli_query($mysqli,"select DISTINCT(attendanceDate) as attendanceDaily,subject,teacher.teacherID,checkattendance.subjectID from checkAttendance,teacher,subject,user
		                                                      where checkAttendance.teacherID=teacher.teacherID and checkAttendance.subjectID=subject.subjectID
		                                                      and user.userID=teacher.userID and teacher.userID='".$_SESSION['userID']."' and checkattendance.subjectID='".$_GET['subjectID']."'");
		                      while($objResult3 = mysqli_fetch_array($strSQL3)){
		                    ?>
		                <option value="<?php echo $objResult3["attendanceDaily"]; ?>"><?php echo $objResult3["attendanceDaily"]; ?></option>
		                <?php } ?>
		              </select>

            </div>
<center>
  <button type="submit" name="Submit" class="btn btn-success"><font color="#000000">ตกลง</font></button>
</center>
</form>
	</body>

</html>
<?php }?>
