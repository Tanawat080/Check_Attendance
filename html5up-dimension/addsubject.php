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
    <div align="right" class="a" >
      <table border="1">
      		<td>
    		  <center> ลงชื่อเข้าใช้โดยรหัส :
    			<?php echo($_SESSION['userID']);?><br>
          ประเภทผู้ใช้งาน : <?php echo($_SESSION['typeUser']);?>
    			<?php //session_destroy();?>
    			<a href="logout.php">ออกจากระบบ</a></center>
        </td>
        </table>
    </div> <!-- จบล็อคเอ้าท์ -->
<br><br>
<form method="post" action="confirmSubject.php">
			<div class="col-xs-4">
        <label for="ex3">รหัสวิชา</label>
        <input class="form-control"  type="text">
				<label for="ex3">วิชา</label>
				<input class="form-control"  type="text">
				<label for="ex3">ห้องเรียน</label>
				<select class="form-control" name="class" style="width: 200px">
					<option value="">เลือกห้องเรียน</option>
						<?php
							include ("connectDB.php");
							$strSQL = mysqli_query($mysqli,"SELECT * FROM class");
							//$objResult = mysqli_fetch_array($strSQL);
									while($objResult = mysqli_fetch_array($strSQL)){
						?>
					<option value="<?php echo $objResult["classID"];?>"><?php echo "ม.".$objResult["class"];?></option>
			 <?php
			 }
			 ?>
		 </select> <br>
				<button type="submit" class="btn btn-default">ตกลง</button>

			</div>
</form>


	</body>

</html>
<?php }?>
