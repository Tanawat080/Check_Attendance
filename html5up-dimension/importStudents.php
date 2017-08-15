<?php
//ส่วนของการเชื่อมต่อฐานข้อมูล MySQL
include ("connectDB.php");

//ทำการเปิดไฟล์ CSV เพื่อนำข้อมูลไปใส่ใน MySQL
$objCSV = fopen("#.txt", "r");
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
        //นำข้อมูลใส่ในตาราง member
 $strSQL = "INSERT INTO student ";

        //ข้อมูลใส่ใน field ข้อมูลดังนี้
 $strSQL .="(`studentID`, `studentName`, `studentLastname`, `classID`) ";
 $strSQL .="VALUES ";

        //ข้อมูลตามที่อ่านได้จากไฟล์ลงฐานข้อมูล
 $strSQL .="('".$objArr[0]."','".$objArr[1]."','".$objArr[2]."' ";
 $strSQL .=",'".$objArr[3]."') ";

 //ให้ข้อมูลอยู่ในรูปแบบที่อ่านได้ใน phpmyadmin (By.SlayerBUU Credits พี่ไผ่)
 $mysqli->set_charset("utf8");
echo $strSQL;

 //เพิ่มข้อมูลลงฐานข้อมูล
 $objQuery = mysqli_query($mysqli,$strSQL);
}
fclose($objCSV);

echo "Import Done.";
?>
