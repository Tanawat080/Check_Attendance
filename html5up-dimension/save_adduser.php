<html>
		<head>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<center>
<?php
	$typeUser=$_POST['typeUser'];
		if($typeUser == "อาจารย์"){
	include("connectDB.php");
	
	if(trim($_POST["user"]) == "")
	{
		echo "<br><br><br>";
		echo "กรอกชื่อผู้ใช้งาน";
		echo "<br><a href='adduser.php'>ย้อนหลับ</a>";
		exit();	
	}
	
	if(trim($_POST["password"]) == "")
	{
		echo "<br><br><br>";
		echo "กรอกรหัสผ่าน";
		echo "<br><a href='adduser.php'>ย้อนหลับ</a>";
		exit();	
	}	
		
	if($_POST["password"] != $_POST["ConPassword"])
	{
		echo "<br><br><br>";
		echo "รหัส่ผ่านไม่ตรงกัน!";
		echo "<br><a href='adduser.php'>ย้อนหลับ</a>";
		exit();
	}

	
	
	$strSQL = "SELECT * FROM user WHERE user = '".trim($_POST['user'])."' ";
	$objQuery = mysqli_query($mysqli,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
		echo "<table>";
		    echo "<br><br><br>";
			echo "ลงทะเบียนผิดพลาด!";
			echo "<br><a href='adduser.php'>ย้อนหลับ</a>";
			echo "</table>";
	}
	else
	{	
		
		$strSQL = "INSERT INTO user (user,password,typeUser) VALUES ('".$_POST["user"]."', 
		'".$_POST["password"]."','".$_POST["typeUser"]."')";
		$objQuery = mysqli_query($mysqli,$strSQL);
		
		echo "<table>";
		echo "<br><br><br>";
		echo "ลงทะเบียนเสร็จสมบูรณ์!<br>";		
	
		echo "<br> Go to <a href='index.html'>หน้าแรก</a>";
		echo "</table>";
	}



			 header( "location: addteacher.php" );
		



		
		}else{



	include("connectDB.php");
	
	if(trim($_POST["user"]) == "")
	{
		echo "<br><br><br>";
		echo "กรอกชื่อผู้ใช้งาน";
		echo "<br><a href='adduser.php'>ย้อนหลับ</a>";
		exit();	
	}
	
	if(trim($_POST["password"]) == "")
	{
		echo "<br><br><br>";
		echo "กรอกรหัสผ่าน";
		echo "<br><a href='adduser.php'>ย้อนหลับ</a>";
		exit();	
	}	
		
	if($_POST["password"] != $_POST["ConPassword"])
	{
		echo "<br><br><br>";
		echo "รหัส่ผ่านไม่ตรงกัน!";
		echo "<br><a href='adduser.php'>ย้อนหลับ</a>";
		exit();
	}

	
	
	$strSQL = "SELECT * FROM user WHERE user = '".trim($_POST['user'])."' ";
	$objQuery = mysqli_query($mysqli,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
		echo "<table>";
		    echo "<br><br><br>";
			echo "ลงทะเบียนผิดพลาด!";
			echo "<br><a href='adduser.php'>ย้อนหลับ</a>";
			echo "</table>";
	}
	else
	{	
		
		$strSQL = "INSERT INTO user (user,password,typeUser) VALUES ('".$_POST["user"]."', 
		'".$_POST["password"]."','".$_POST["typeUser"]."')";
		$objQuery = mysqli_query($mysqli,$strSQL);
		
		echo "<table>";
		echo "<br><br><br>";
		echo "ลงทะเบียนเสร็จสมบูรณ์!<br>";		
	
		echo "<br> Go to <a href='index.html'>หน้าแรก</a>";
		echo "</table>";
	}
}
?>
</center>
</html>
