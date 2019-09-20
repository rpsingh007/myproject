<?php
session_start();
$email=$_SESSION["email"];
$role=$_SESSION["role"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Restaurant</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
    <div id="header" style="background: none;border: none">
        <h1 style="font-size: 35px;float: left">WelCome&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br> <?php echo $role;?></h1>
        <h1 style="padding-top: 0px"><a href="#"><img src="images/logo.gif" alt="" /></a></h1>
        <ul id="nav" style="position: initial;width: auto;text-align: left;padding-left: 30px">
      <li><a href="AdminHome.php">HOME</a> &nbsp;|&nbsp; </li>
      <li><a href="foodcatogary.php">FOOD CATEGORY</a> &nbsp;|&nbsp; </li>
      <li><a href="fooditems.php">FOOD ITEMS</a> &nbsp;|&nbsp; </li>
      <li><a href="deliveryboylist.php">DELIVERY BOY LIST</a> &nbsp;|&nbsp; </li>
      <li><a href="adddeliveryboy.php">DELIVERY BOY</a> &nbsp;|&nbsp; </li>
      <li><a href="#">UPDATE</a> &nbsp;|&nbsp; </li>
      <li><a href="#">LOGOUT</a></li>
    </ul>
    <!-- end nav -->
    <div id="welcome">
      <h2><img src="images/title_welcome.gif" alt="Welcome to our Restaurant" /></h2>
      
    </div>
    <!-- end welcome -->
  </div>
  <!-- end header -->
  <div style="height: 500px" align="center">
      
      
  </div>
  <!-- end body -->
  
  <!-- end hotstuff -->
</div>
<!-- end wrapper -->
<div id="footer"> Powered by <a href="http://www.freewebsitetemplates.com">Free Website Templates</a> </div>
<!-- end footer -->
</body>
</html>
