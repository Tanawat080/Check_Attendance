<?php
session_start();
session_destroy();
echo 'เกิดข้อผิดพลาด';
 Header("Location: index.html");
?>
