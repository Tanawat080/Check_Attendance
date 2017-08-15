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
    			<a href="logout.php"><font color="#CC0000">ออกจากระบบ</font></a></center>
        </td>
        </table>
    </div> <!-- จบล็อคเอ้าท์ -->
<br><br>

<form name="form1" method="post" action="subject_edit2.php?subjectID=<?php echo $_GET["subjectID"];?>&class=<?php echo $_GET["class"];?>" enctype="multipart/form-data">
        <?php
        include ("connectDB.php");
        $strSQL = mysqli_query($mysqli,"SELECT * FROM subject WHERE subjectID='".$_GET["subjectID"]."' and class='".$_GET["class"]."'");
        $objResult = mysqli_fetch_array($strSQL);
        ?>
        <div class="form-group">
          <div class="col-xs-4">
          <label for="idPD">รหัสวิชา : </label>
          <input class="form-control"  type="text" name="subjectID" value="<?php echo $objResult["subjectID"];?>">
          <label for="idPD">วิชา : </label>
          <input class="form-control"  type="text" name="subject" value="<?php echo $objResult["subject"];?>">
          <label for="idPD">ห้อง : </label>
          <input class="form-control"  type="text" name="class" value="<?php echo $objResult["class"];?>">
          <br>
          <button type="submit" class="btn btn-default">บันทึก</button>
        </div>

        </div>
	</body>

</html>
<?php }?>
