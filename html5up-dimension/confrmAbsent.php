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
    for ($i = 1; $i <= $_POST["hdLine"]; $i++) {
        if ($_POST["studentID_" . $i . ""] != "") {
            $strSQL = "INSERT INTO `checkinout` ";
            $strSQL .= "(`studentID`, `typeCheckInID`, `checkIn`,`dateCheckInOut`) ";
            $strSQL .= "VALUES ";
            $strSQL .= "('" . $_POST["studentID_" . $i . ""] . "','60004','" . $timeIn."', ";
            $strSQL .= "'" .$date."') ";
            $objQuery = mysqli_query($mysqli, $strSQL);
            //echo $strSQL;
        }
    }

    Header("Location: checkin.php");
    ?>
        </body>
    </html>
        <?php } ?>
