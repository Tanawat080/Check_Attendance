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
            <link rel="stylesheet" href="/lib/w3.css"
                  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script>

                function showUser(str) {
                    if (str == "") {
                        document.getElementById("txtHint").innerHTML = "";
                        return;
                    }
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else { // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    }
                    xmlhttp.open("GET", "checkin_student.php?studentID=" + str, true);
                    xmlhttp.send();
                }
            </script>
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
                    <table border="1">
                        <td>
                        <center> ลงชื่อเข้าใช้โดยรหัส :
                            <?php echo($_SESSION['userID']); ?><br>
                            ประเภทผู้ใช้งาน : <?php echo($_SESSION['typeUser']); ?>
                            <?php //session_destroy();?>
                            <a href="logout.php"><font color="#CC0000">ออกจากระบบ</font></a></center>
                        </td>
                    </table>
                    <br><hr>

                </div> <!-- จบล็อคเอ้าท์ -->

                <div align="right">
                    <a href="adminpage.php"><button type="button" class="btn btn-primary"><font color="#000000">หน้าหลัก</font></button></a>	&nbsp;
                    <a href="absent.php"><button type="button" class="btn btn-danger"><font color="#000000">เช็คขาด</font></button></a>
                </div>
        </div> <!-- จบล็อคเอ้าท์ -->
        <br><br>
          <script language="JavaScript1.2">
          <!--
          function local_date(now_time) {
              current_local_time = new Date();
              local_time.innerHTML = current_local_time.getDate() + "/" + (current_local_time.getMonth()+1) + "/" + (current_local_time.getYear()-100)
               + " " + current_local_time.getHours() + ":" + current_local_time.getMinutes() + ":" +current_local_time.getSeconds();
              setTimeout("local_date()",1000);
          }
          setTimeout("local_date()",1000);
          //-->
          </script>
            <center>

              <table width="1260">
                <tr>
                  <td width="450"></td>
                  <td width="360"><h3>เช็คชื่อนักเรียน เข้า - ออก</h3></td>
                    <td width="450"><h2 align="right"><div id="local_time">&nbsp;</div></h2></td>
                </tr>
              </table>
              <!--_______________________________________________________________________________________________ -->
                <table >
                  <tr>
                    <td><label for="sel1">กรอกรหัสนักเรียน : &nbsp;</label></td>
                    <td><input class="form-control"  type="text" name="studentID" value="" onchange="showUser(this.value)" style="width:400px;" placeholder="กรอกรหัสนักเรียน"></td>
                  </tr>
              </table>
            </center>
             <div id="txtHint"></div>
         </body>
         </html>
     <?php } ?>
