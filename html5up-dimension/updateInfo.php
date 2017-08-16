<html>

<body>
<?php

		//*** Update Record ***//
		include ("connectDB.php");

		$strSQL = "UPDATE `user` SET `user`='".$_POST["user"]."',`password`='".$_POST["password"]."' where userID='".$_POST['userID']."'; ";
		$objQuery = mysqli_query($mysqli,$strSQL);

    $strSQL2 = "UPDATE `teacher` SET `teacherName`='".$_POST["teacherName"]."',`teacherLastname`='".$_POST["teacherLastname"]."',`classID`='".$_POST["classID"]."' where userID='".$_POST['userID']."'; ";
		$objQuery2 = mysqli_query($mysqli,$strSQL2);

    Header("Location: teacherInfo.php");
?>

</body>
</html>
