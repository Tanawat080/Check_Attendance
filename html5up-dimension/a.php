<?php
  $a=$_POST['a'];
  echo $a;

  $note=$_POST['note'];
  echo $note;

  include ("connectDB.php");
  $strSQL = mysqli_query($mysqli,"select * from class where class='".$_GET['class']."'");
  $objResult = mysqli_fetch_array($strSQL);

  $strSLQ2 = "select * from student where classID='".$objResult['classID']."'";
  $result = mysqli_query($mysqli, $strSLQ2);
  while($row = mysqli_fetch_array($result))
  {
    echo $_POST['typeAttendance_'.$row['studentID'].''];
  }
?>
