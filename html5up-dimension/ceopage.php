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
<<<<<<< HEAD
	}div.abcd{
		font-family: "FontAwesome",sans-serif;

	}div.abcd img{
		border-radius:5px;
=======
>>>>>>> ee2c198dec9fbd462203b6860cd316f8b071c28d
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
	<body background="images/bg.jpg">
<!-- ล็อคเอ้าท์ -->
<<<<<<< HEAD
    <div align="right" class="a" ><br>
      <table border="1">
=======
    <div align="right" class="a" >
      <table border="1" style="background-color:#E6E6FA" >
>>>>>>> ee2c198dec9fbd462203b6860cd316f8b071c28d
      		<td>
						<center> ลงชื่อเข้าใช้โดยรหัส :
	    			<?php echo($_SESSION['userID']);?><br>
	          ประเภทผู้ใช้งาน : <?php echo($_SESSION['typeUser']);?>
	    			<?php //session_destroy();?>
	    			<a href="logout.php"><font color="#CC0000">ออกจากระบบ</font></a></center>
        </td>
			</table>
	</div> <!-- จบล็อคเอ้าท์ -->
<br><br>
<<<<<<< HEAD
<center>
	<!-- <img src="images/ksp1.png"> -->
	<h2> KSP Checking </h2>
	<h3>ผู้บริหาร</h3>
	<hr><br>
		<div class="im">
			<a href="#" ><img src="images/image001.png" width="200" height="75"  ></a>	&nbsp;&nbsp;&nbsp;
			<a href="#"><img src="images/image002.png" width="200" height="75" ></a>	&nbsp;&nbsp;&nbsp;
			<a href="#"><img src="images/image003.png" width="200" height="75" ></a>	&nbsp;&nbsp;&nbsp;
			<a href="#"><img src="images/image004.png" width="200" height="75" ></a>	<br><br><br>
			<a href="#"><img src="images/image005.png" width="200" height="75" ></a>	&nbsp;&nbsp;&nbsp;
			<a href="#"><img src="images/image006.png" width="200" height="75" ></a>	&nbsp;&nbsp;&nbsp;
			<a href="#"><img src="images/image007.png" width="200" height="75" ></a>	&nbsp;&nbsp;&nbsp;
			<a href="#"><img src="images/image008.png" width="200" height="75" ></a>	<br><br><br>
=======
	<center>
		<!-- <img src="images/ksp1.png"> -->
		<h1> KSP Checking </h1>
		<h2>ผู้บริหาร</h2>
		<hr><br>
		<div class="im">
	<a href="checkattendance.php" ><img src="images/image001.png" width="200" height="75"  ></a>	&nbsp;&nbsp;&nbsp;
	<a href="#"><img src="images/image002.png" width="200" height="75" ></a>	&nbsp;&nbsp;&nbsp;
	<a href="#"><img src="images/image003.png" width="200" height="75" ></a>	&nbsp;&nbsp;&nbsp;
	<a href="#"><img src="images/image004.png" width="200" height="75" ></a>	<br><br><br>
	<a href="#"><img src="images/image005.png" width="200" height="75" ></a>	&nbsp;&nbsp;&nbsp;
	<a href="#"><img src="images/image006.png" width="200" height="75" ></a>	&nbsp;&nbsp;&nbsp;
	<a href="#"><img src="images/image007.png" width="200" height="75" ></a>	&nbsp;&nbsp;&nbsp;
	<a href="#"><img src="images/image008.png" width="200" height="75" ></a>	<br><br><br>

>>>>>>> ee2c198dec9fbd462203b6860cd316f8b071c28d
</div>
</div>
	</body>



</html>
<?php }?>
