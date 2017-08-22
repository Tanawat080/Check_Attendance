<?php session_start(); ?>
<?php
if (!$_SESSION["uname"]) {  //check session
    Header("Location: Login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form
} else {
    ?>
    <html>
        <head>
            <title>KSP CHECKING</title>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        </head>
        <style>
            div.abcd{
                font-family: "FontAwesome",sans-serif;

            }div.abcd img{
                border-radius:5px;
            }div.abcd h1,h2,h3,h4,h5{
                display: block;
                font-weight: 600;
                letter-spacing: 0.2rem;
                line-height: 1.5;
                margin: 0 0 1rem 0;
                text-transform: uppercase;
            }
        </style>
        <div class="abcd">
            <body background="/images/bg.jpg">
                <!-- ล็อคเอ้าท์ -->
                <div align="right" class="a" ><br>
                    <table border="1" bordercolor="#000000" cellpadding="5">
                        <tr>
                            <td>
                        <center><font color='#003366'> ลงชื่อเข้าใช้โดยรหัส :
    <?php echo($_SESSION['userID']); ?><br>
                            ประเภทผู้ใช้งาน : <?php echo($_SESSION['typeUser']); ?> </font>
                            <?php //session_destroy();?>
                            <a href="logout.php"><font color="#CC0000">ออกจากระบบ</font></a></center>
                        </tr></td>
                    </table>
                    <hr>

                </div> <!-- จบล็อคเอ้าท์ -->

                <div align="right">
                    <a href="teacherpage.php"><button type="button" class="btn btn-primary"><font color="#000000">หน้าหลัก</font></button></a>	&nbsp;

                </div>
                <br>
            <center><h3><font color='#003366'>รายงานการเข้าโรงเรียน</font></h3></center>
            <div class="table-responsive">
                <table class="table" width="800" border="1" align="center" bordercolor="#666666" >
                    <tr>
                        <td width="100" align="center" bgcolor="#CCCCCC"><strong><font color='#003366'>รหัสนักเรียน</font></strong></td>
                        <td width="200"align="center" bgcolor="#CCCCCC"><strong><font color='#003366'>ชื่อ - สกุล</font></strong></td>
                        <td width="200"align="center" bgcolor="#CCCCCC"><strong><font color='#003366'>ห้อง</font></strong></td>
                        <td width="200" align="center" bgcolor="#CCCCCC"><strong><font color='#003366'>เข้าโรงเรียน</font></strong></td>

                    </tr>
    <?php
//connect db
    include ("connectDB.php");
    $strSQL = mysqli_query($mysqli, "select * from teacher where userID='" . $_SESSION['userID'] . "'");
    $objResult = mysqli_fetch_array($strSQL);
    date_default_timezone_set("Asia/Bangkok");
    $date = date("Y-m-d");


    $strSLQ2 = "SELECT * from checkinout,student,typecheckinout,class where `dateCheckInOut` = '".$date."'
    and student.studentID=checkinout.studentID and student.classID='".$objResult['classID']."'
    and typecheckinout.typeCheckInID=checkinout.typeCheckInID
    and class.classID=student.classID
     ";

    //echo $strSLQ2;
    $result = mysqli_query($mysqli, $strSLQ2);  //เรียกข้อมูลมาแสดงทั้งหมด
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr class='active'>";
        echo "<td align='center'><font color='#จจ0000'>" . $row["studentID"] . "</font></font></td>";
        echo "<td align='center'><font color='#003366'>" . $row["studentName"] . "&nbsp" . $row['studentLastname'] . "</font></td>";
        echo "<td align='center'><font color='#จจ0000'>" . $row["class"] . "</font></td>";
        echo "<td align='center'><font color='#จจ0000'>" . $row["typeCheckIn"] . "</font></td>";
        echo "</tr>";
    }
    ?>
                </table>
            </div><div>
            <br><center>
            <a href="teacherpage.php"><button type="button" class="btn btn-success"><font color="#000000">เสร็จสิ้น</font></button></a>	&nbsp;
            <a ><button type="button" onclick="javascript:window.print()" class="btn btn-warning"><font color="#000000">พิมพ์</font></button></a>	&nbsp;
        </center></div><br><br>
        </body>
    </html>
<?php } ?>
