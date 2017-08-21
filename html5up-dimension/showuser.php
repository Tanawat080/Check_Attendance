<html>
<head>

  <meta charset="utf-8">
  <link href="h.css" rel="stylesheet" >
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>
  <form name="" method="post" >
<?php
$q = $_GET['q'];

$con = mysqli_connect("localhost", "root", "", "attendance");
$con->set_charset("utf8");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}



mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM `user`,teacher,class WHERE typeUser ='".$q."' and user.userID=teacher.userID and teacher.classID=class.classID ";

$result = mysqli_query($con,$sql);


//$sql2="select * from status_improve where status_ip_ID='".$row['status_ip_ID']."'";
//$result2 = mysqli_query($con,$sql2);
//$row2 = mysqli_fetch_array($result2);

//$sql3="select * from type where type_ID='".$row['type_ID']."'";
//$result3 = mysqli_query($con,$sql3);
//$row3 = mysqli_fetch_array($result3);


?>

  <div class="table-responsive">
  <table class="table table-hover" width="800" border="1" align="center" bordercolor="#666666">
  <tr class='active'>

  <th width="150"> <div align="center">รหัสผู้ใช้</div></th>
  <th width="450"> <div align="center">ชื่อ-สกุล</div></th>
  <th width="150"> <div align="center">รหัสอาจารย์</div></th>
  <th width="100"> <div align="center">เบอร์โทรศัพท์</div></th>
  <th width="100"> <div align="center">ห้อง</div></th>
  <th width="100"> <div align="center"></div></th>

  </tr>
  <?php

  while($objResult = mysqli_fetch_array($result))
  {
  ?>

  <tr class='active'>
  <td><div align="center"><?php echo $objResult["userID"];?></div></td>
  <td><?php echo $objResult["teacherName"]."   ".$objResult["teacherLastname"];?></center></td>
  <td><center><?php echo $objResult["teacherID"];?></center></td>
  <td><center><?php echo $objResult["teacherPhone"];?></center></td>
  <td><center><?php echo $objResult["class"];?></center></td>
  <td border="0"><center><a href="infoEdit.php?userID=<?php echo $objResult["userID"];?>&typeUser=<?php echo $q; ?>">เเก้ไขข้อมูล</a></center></td>
  </tr>
  <?php
  }
  ?>
  </table>
  </div>


  </form>


<?php
mysqli_close($con);
?>
</form>
</body>
</html>
