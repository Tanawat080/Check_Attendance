<html>
		<head>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>

<center>
<form name="form1" method="post" action="save_adduser.php">
	<br><br>
  <h2>K S P CHECKING</h2>
  <h3>ลงทะเบียนสมาชิก</h3> <br>
  <table width="400" border="1" style="width: 400px">
    <tbody>
      <tr>
        <td width="125"> &nbsp;ชื่อผู้ใช้งาน</td>
        <td width="180">
          <input name="user" type="text" id="user" size="20">
        </td>
      </tr>
      <tr>
        <td> &nbsp;รหัสผ่าน</td>
        <td><input name="password" type="password" id="password">
        </td>
      </tr>
      <tr>
        <td> &nbsp;ยืนยันรหัสผ่าน</td>
        <td><input name="ConPassword" type="password" id="ConPassword">
        </td>
      </tr>
      
      <tr>
        <td> &nbsp;สถานะ</td>
        <td>
          <select name="typeUser" id="typeUser">
		  <option>เลือก</option>
		    <option value="ผู้บริหาร">ผู้บริหาร</option>
            <option value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option>
            <option value="อาจารย์">อาจารย์</option>
			
          </select>
</td>
      </tr>
    </tbody>
  </table>
  <br>

  <input type="submit" name="Submit" value="บันทึก">
 
<meta charset="utf-8">

</form>

<center>
	</body>
</html>
