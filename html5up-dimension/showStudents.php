<html>
<head>
  <title>Bootstrap Case</title>
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
$sql="SELECT * FROM `student`,class WHERE student.classID ='".$q."' and student.classID=class.classID ";

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

  <th width="150"> <div align="center">รหัสนักเรียน</div></th>
  <th width="450"> <div align="center">ชื่อ-สกุล</div></th>
  <th width="150"> <div align="center">ห้อง</div></th>
  <th width="100"> <div align="center"></div></th>

  </tr>
  <?php

  while($objResult = mysqli_fetch_array($result))
  {
  ?>

  <tr class='active'>
  <td><div align="center"><?php echo $objResult["studentID"];?></div></td>
  <td><?php echo $objResult["studentName"]."   ".$objResult["studentLastname"];?></center></td>
  <td><center><?php echo $objResult["class"];?></center></td>
  <td border="0"><center><a href="infoStudentsEdit.php?studentID=<?php echo $objResult["studentID"];?>">เเก้ไขข้อมูล</a></center></td>
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
