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

    </div> <!-- จบล็อคเอ้าท์ -->
<br><br>
<form method="post" action="confirmStudents.php" enctype="multipart/form-data">

  <body>

  		<?php

  		if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"fileList/".$_FILES["fileUpload"]["name"])) // ย้ายจากไฟล์อัพโหลดไปเก็บใน folder pic
  {

  				//*** Insert Record ***//
  				include ("connectDB.php");
          $objCSV = fopen("fileList/".$_FILES["fileUpload"]["name"], "r");
          while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
                  //นำข้อมูลใส่ในตาราง member
           $strSQL = "INSERT INTO student ";

                  //ข้อมูลใส่ใน field ข้อมูลดังนี้
           $strSQL .="(`studentID`, `studentName`, `studentLastname`, `classID`) ";
           $strSQL .="VALUES ";

                  //ข้อมูลตามที่อ่านได้จากไฟล์ลงฐานข้อมูล
           $strSQL .="('".$objArr[0]."','".$objArr[1]."','".$objArr[2]."' ";
           $strSQL .=",'".$_POST['classID']."') ";

           //ให้ข้อมูลอยู่ในรูปแบบที่อ่านได้ใน phpmyadmin
           $mysqli->set_charset("utf8");
          //echo $strSQL;

           //เพิ่มข้อมูลลงฐานข้อมูล
           $objQuery = mysqli_query($mysqli,$strSQL);
          }
          fclose($objCSV);
            ?>
            <h2>เพิ่มรายชื่อนักเรียนเรียบร้อย</h2>
            <h2><a href="adminpage.php"><font color="#000000">กลับสู่หน้าหลัก</font><a></h2>
            <?php
  			}
  		?>

  </body>


</form>

	</body>

</html>
<?php }?>
