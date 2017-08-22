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
        //echo $timeIn;
        $sql = mysqli_query($mysqli,"select * from typecheckout");

        while ($objResult = mysqli_fetch_array($sql)) {
          if ($timeIn > $objResult['time'] && $objResult['typeCheckOutID']=='20001'){
            $strSQLupdate = "UPDATE `checkinout` SET `checkOut` = '" .$timeIn. "'
            ,`typeCheckOutID`='20001'
            where studentID='".$_GET['studentID']."'";
            $objQueryupdate = mysqli_query($mysqli, $strSQLupdate);
            //echo $strSQLupdate;
            Header("Location: checkin.php");
          } elseif (($timeIn < $objResult['time'] && $objResult['typeCheckOutID']=='20002')){
            $strSQLupdate2 = "UPDATE `checkinout` SET `checkOut` = '" .$timeIn. "'
            ,`typeCheckOutID`='20002'
            where studentID='".$_GET['studentID']."'";
            $objQueryupdate2 = mysqli_query($mysqli, $strSQLupdate2);
            //echo $strSQLupdate2;
            Header("Location: checkin.php");
          }
        }
    ?>
        </body>
    </html>
        <?php } ?>
