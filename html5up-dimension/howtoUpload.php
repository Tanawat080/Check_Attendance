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
				<br><hr>

		</div> <!-- จบล็อคเอ้าท์ -->

<div align="right">
	<a href="teacherpage.php"><button type="button" class="btn btn-primary"><font color="#000000">หน้าหลัก</font></button></a>	&nbsp;

</div>
    </div> <!-- จบล็อคเอ้าท์ -->
<br><br>
<form method="post" action="confirmStudents.php" enctype="multipart/form-data">
<center><h2>วิธีการเพิ่มรายชื่อนักเรียน</h2>


	<div class="w3-content" style="max-width:800px;position:relative">

	<img class="mySlides" src="images/ht1.png" width="546" height="307">
	<img class="mySlides" src="images/ht2.png" width="546" height="307">
	<img class="mySlides" src="images/ht3.png" width="546" height="307">
	<img class="mySlides" src="images/ht4.png" width="546" height="307">
	<img class="mySlides" src="images/ht1.png" width="546" height="307">

	<a class="w3-btn-floating" style="position:absolute;top:45%;left:0" onclick="plusDivs(-1)"><img src="left.png" width="30" height="30"></a>
	<a class="w3-btn-floating" style="position:absolute;top:45%;right:0" onclick="plusDivs(1)"><img src="right.png" width="30" height="30"></a>

	</div>
<br><a href="addstudents_form.php"><button type="button" class="btn btn-danger"><font color="#000000">ย้อนกลับ</font></button></a>
	<script>
	var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
	  showDivs(slideIndex += n);
	}

	function showDivs(n) {
	  var i;
	  var x = document.getElementsByClassName("mySlides");
	  if (n > x.length) {slideIndex = 1}
	  if (n < 1) {slideIndex = x.length} ;
	  for (i = 0; i < x.length; i++) {
	     x[i].style.display = "none";
	  }
	  x[slideIndex-1].style.display = "block";
	}
	</script>

</form>

	</body>

</html>
<?php }?>
