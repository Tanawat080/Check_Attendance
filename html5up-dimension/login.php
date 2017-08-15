<?php
session_start();
        if(isset($_REQUEST['uname'])){
				//connection
                  include("connectDB.php");
				//รับค่า user & password
                  $Username = $_REQUEST['uname'];
                  $Password = $_REQUEST['psw'];
				//query
                  $sql="SELECT * FROM user Where user='".$Username."' and password='".$Password."' ";

                  $result = mysqli_query($mysqli,$sql);

                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["uname"] = $row["user"];
                      $_SESSION["userID"] = $row["userID"];
                      //$_SESSION["User"] = $row["Firstname"]." ".$row["Lastname"];
                      $_SESSION["typeUser"] = $row["typeUser"];

                      if($_SESSION["typeUser"]=="ผู้ดูแลระบบ"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                        Header("Location: adminpage.php");

                      }

                      if ($_SESSION["typeUser"]=="อาจารย์"){  //ถ้าเป็น อาจารย์ ให้กระโดดไปหน้า user_page.php

                        Header("Location: teacherpage.php");

                      }
                      if ($_SESSION["typeUser"]=="ผู้บริหาร"){  //ถ้าเป็น ผู้อำนวยการ ให้กระโดดไปหน้า user_page.php

                        Header("Location: ceopage.php");

                      }

                  }else{
                  echo $sql;
                  echo "<script>";
                  echo "alert(\" ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง \");";

                  echo "window.history.back()";
                  echo "</script>";

                  }

        }else{


             Header("Location: index.html#Login"); //user & password incorrect back to login again

        }
?>
