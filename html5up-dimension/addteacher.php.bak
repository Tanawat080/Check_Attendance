<html>
		<head>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>

<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'attendance';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

/* Your query */
$result = $mysqli->query("SELECT * FROM `class` WHERE class;") or die($mysqli->error);
?>

<center>
<form name="form1" method="post" action="save_addteacher.php">
	<br><br>
  <h2>K S P CHECKING</h2>
  <h3>ลงทะเบียนสมาชิก สำหรับ อาจารย์</h3> <br>
  <table width="400" border="1" style="width: 400px">
    <tbody>
      <tr>
        <td width="125"> &nbsp;ชื่อ</td>
        <td width="180">
          <input name="teacherName" type="text" id="teacherName" size="20">
        </td>
      </tr>
      <tr>

	  <tr>
        <td> &nbsp; นามสกุล </td>
        <td>
          <input name="teacherLastname" type="text" id="teacherLastname" size="20">
        </td>
      </tr>
      <tr>

        <td> &nbsp;เบอร์โทรศัพท์</td>
        <td><input name="teacherPhone" type="text" id="teacherPhone">
        </td>
      </tr>
    

      
      <tr>
        <td> &nbsp;ครูประจำชั้นห้อง</td>
        <td>
          <select name="classID" id="classID">

		  <option>เลือก</option>
          <?php
          while ($row = mysqli_fetch_array($result)) {
          echo "<option value='".$row[0]."'>'".$row[1]."'</option>";

          }
          ?>        

          </select>
</td>
      </tr>
    </tbody>
  </table>
  <br>
  <input type="submit" name="Submit" value="บันทึก">
</form>

<center>
	</body>
</html>
