<html>
    <head>

        <meta charset="utf-8">
        <link href="h.css" rel="stylesheet" >
        <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    </head>

    <body>
        <form name="" method="post" >
            <?php
            $studentID = $_GET['studentID'];

            $con = mysqli_connect("localhost", "root", "", "attendance");
            $con->set_charset("utf8");
            if (!$con) {
                die('Could not connect: ' . mysqli_error($con));
            }

            mysqli_select_db($con, "ajax_demo");
            date_default_timezone_set("Asia/Bangkok");
            $date = date("Y-m-d");
            $sql = "SELECT * FROM `student`,class WHERE studentID ='" . $studentID . "'
            and student.classID=class.classID ";
            $result = mysqli_query($con,$sql);
            $objResult = mysqli_fetch_array($result);
            if($objResult){
            ?>
            <br>
            <div class="table-responsive">
              <table align="center" width=50% style="border:3px dashed plum;" cellspacing="5" bgcolor="plum" cellpadding="5">
                <tr>
                  <td style="border:3px dashed white;" bgcolor="white">
                <table   align="center" >
                    <tr class='active'>
                        <td width="110"> <div ><label for="sel1">รหัสนักเรียน : &nbsp;</label></div></td>
                        <td width="75"><div ><?php echo $objResult["studentID"]; ?></div></td>
                      </tr>
                      <tr>
                        <td width="150"> <div><label for="sel1">ชื่อ-สกุล : &nbsp;</label></div></td>
                        <td width="200"><?php echo $objResult["studentName"] . "    " . $objResult["studentLastname"]; ?></center></td>
                      </tr>
                      <tr>
                        <td width="50"> <div><label for="sel1">ห้อง : &nbsp;</label></div></td>
                        <td width="50"><?php echo $objResult["class"]; ?></td>
                    </tr>
                </table>
                </td>
              </tr>
            </table>
            <br>

            <center>
              <a href="checkIn_.php?studentID=<?php echo $objResult['studentID']; ?>"><button type="button" class="btn btn-success"><font color="#000000">เช็คเข้า</font></button></a>
              &nbsp;
              <a href="checkOut_.php?studentID=<?php echo $objResult['studentID']; ?>"><button type="button" class="btn btn-danger"><font color="#000000">เช็คออก</font></button></a>
            </center>
            </div>
          <?php }else{ ?>
            <br>
            <table align="center" width=50% style="border:3px dashed plum;" cellspacing="5" bgcolor="plum" cellpadding="5">
              <tr>
                <td style="border:3px dashed white;" bgcolor="white">
          <?php
            echo "<center><br><h4>ไม่พบข้อมูลนักเรียน</h4></center>"; ?>
            </td>
          </tr>
        </table>
        <?php  } ?>
        </form>
        <?php
        mysqli_close($con);
        ?>
    </form>
</body>
</html>
