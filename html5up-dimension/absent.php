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
                        <center> ลงชื่อเข้าใช้โดยรหัส :
    <?php echo($_SESSION['userID']); ?><br>
                            ประเภทผู้ใช้งาน : <?php echo($_SESSION['typeUser']); ?>
                            <?php //session_destroy();?>
                            <a href="logout.php"><font color="#CC0000">ออกจากระบบ</font></a></center>
                        </tr></td>
                    </table>
                    <hr>

                </div> <!-- จบล็อคเอ้าท์ -->

                <div align="right">
                    <a href="adminpage.php"><button type="button" class="btn btn-primary"><font color="#000000">หน้าหลัก</font></button></a>	&nbsp;
                </div>
                <br>
                <form name="frmMain" method="post"  action="confrmAbsent.php" >

                    <div class="table-responsive">
                        <table class="table table-hover" width="800" border="1" align="center" bordercolor="#666666">
                            <tr>
                                <td width="50" align="center" bgcolor="#CCCCCC"><strong>ลำดับ</strong></td>
                                <td width="100"align="center" bgcolor="#CCCCCC"><strong>รหัสนักเรียน</strong></td>
                                <td width="300" align="center" bgcolor="#CCCCCC"><strong>ชื่อ - สกุล</strong></td>
                                <td width="100" align="center" bgcolor="#CCCCCC"><strong>ห้อง</strong></td>

                            </tr>
                            <?php
//connect db
                            include ("connectDB.php");

                            $strSLQ2 = "SELECT studentID,studentName,studentLastname,class
                                          FROM student,class
                                          WHERE
                                          (
                                          studentID IN ( SELECT studentID FROM student  where class.classID=student.classID)
                                          AND
                                          studentID NOT IN ( SELECT studentID FROM checkinout  )
                                          )
                                          order by studentID DESC;";
                            $result = mysqli_query($mysqli, $strSLQ2);  //เรียกข้อมูลมาแสดงทั้งหมด
                            $i = 1;

                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr class='active'>";
                                echo "<td align='center'>" . $i . "</td>";
                                echo "<td align='center'>" . $row['studentID'] . "</td>";
                                ?>
                                <input class="form-control"  type="hidden" name="studentID_<?php echo $i; ?>" value="<?php echo $row['studentID']; ?>">
                                <?php
                                echo "<td align='left'>" . $row['studentName'] . "&nbsp&nbsp" . $row['studentLastname'] . "</td>";
                                echo "<td align='center'>" . $row['class'] . "</td>";
                                echo "</tr>";
                                echo "<input type='hidden' name='a' value='" . $i . "'>";
                                $i = $i + 1;
                            }
                            ?>

                        </table>

<input class="form-control"  type="hidden" name="hdLine" value="<?php echo $i - 1; ?>">
                        <div class="container"align="center">


                            <br>
                            <button type="submit" name="Submit" class="btn btn-success"><font color="#000000">ตกลง</font></button>

                        </div>

                </form>
            </body>

    </html>
<?php } ?>
