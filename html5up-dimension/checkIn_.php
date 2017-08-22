<?php session_start(); ?>
<?php
if (!$_SESSION["uname"]) {  //check session
    Header("Location: Login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form
} else {
    ?>
    <html>

        <body>
    <?php
    date_default_timezone_set("Asia/Bangkok");
      include ("connectDB.php");
        $timeIn = date("G:i:s");
        $date = date("Y-m-d");
        //echo $timeIn;
        $sql = mysqli_query($mysqli,"select * from typecheckinout");

        while ($objResult = mysqli_fetch_array($sql)) {
          if ($timeIn < $objResult['time'] && $objResult['typeCheckInID']=='60001'){
            $sqlInsert="INSERT INTO `checkinout`(`studentID`, `typeCheckInID`, `checkIn`,`dateCheckInOut`)
            VALUES ('".$_GET['studentID']."','60001','".$timeIn."','".$date."')";
            //echo $sqlInsert;
            $objQuery = mysqli_query($mysqli, $sqlInsert);
            Header("Location: checkin.php");
          } elseif (($timeIn > $objResult['time'] && $objResult['typeCheckInID']=='60002')){
            $sqlInsert2="INSERT INTO `checkinout`(`studentID`, `typeCheckInID`, `checkIn`,`dateCheckInOut`)
            VALUES ('".$_GET['studentID']."','60002','".$timeIn."','".$date."')";
            $objQuery2 = mysqli_query($mysqli, $sqlInsert2);
            //echo $sqlInsert2;
            Header("Location: checkin.php");
          }
        }
    ?>
        </body>
    </html>
        <?php } ?>
