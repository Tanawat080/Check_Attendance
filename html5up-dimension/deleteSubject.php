<?php

echo '<form method="post" >';
include ("connectDB.php");
$subjectID= $_GET['subjectID'];
$sql = 'DELETE FROM `subject` WHERE subjectID ="'.$subjectID.'";';
$result = mysqli_query($mysqli,$sql);
	if($result){

		Header ("Location: checkattendance.php");
	}else{
		echo 'no complete';

	}

?>
