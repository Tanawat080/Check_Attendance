<html>

<body>
<?php

		//*** Update Record ***//
		include ("connectDB.php");
    $strSQL2 = "UPDATE `student` SET `studentName`='".$_POST["studentName"]."',`studentLastname`='".$_POST["studentLastname"]."',`classID`='".$_POST["classID"]."' where studentID='".$_POST['studentID']."'; ";
		$objQuery2 = mysqli_query($mysqli,$strSQL2);
		Header("Location: studentInfo.php");
?>

</body>
</html>
