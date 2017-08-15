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


	</head>
	<style>
	div.abcd{
		font-family: "FontAwesome",sans-serif;

	}div.abcd img{
		border-radius:5px;
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
	<center>
		<h2 style="
		display: block;
		font-weight: 600;
		letter-spacing: 0.2rem;
		line-height: 1.5;
		margin: 0 0 1rem 0;
		text-transform: uppercase;">KSP Checking </h2>
		<div class="im">
	<a href="#" ><img src="images/pic01.jpg" width="200" height="75"  ></a>	&nbsp;&nbsp;&nbsp;
	<a href="#"><img src="#" width="200" height="75" border='1'></a>	&nbsp;&nbsp;&nbsp;
	<a href="#"><img src="#" width="200" height="75" border='1'></a>	&nbsp;&nbsp;&nbsp;
	<a href="#"><img src="#" width="200" height="75" border='1'></a>	<br><br>
	<a href="#"><img src="#" width="200" height="75" border='1'></a>	&nbsp;&nbsp;&nbsp;
	<a href="#"><img src="#" width="200" height="75" border='1'></a>	&nbsp;&nbsp;&nbsp;
	<a href="#"><img src="#" width="200" height="75" border='1'></a>	&nbsp;&nbsp;&nbsp;
	<a href="#"><img src="#" width="200" height="75" border='1'></a>	<br><br>
	<a href="#"><img src="#" width="200" height="75" border='1'></a>	&nbsp;&nbsp;&nbsp;
	<a href="#"><img src="#" width="200" height="75" border='1'></a>	&nbsp;&nbsp;&nbsp;
	<a href="#"><img src="#" width="200" height="75" border='1'></a>	&nbsp;&nbsp;&nbsp;
	<a href="google.com"><img src="#" width="200" height="75" border='1'></a>
</div>
</div>
	</body>

</html>
<?php }?>
