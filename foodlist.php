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
    <div id="header" style="background: none;border: none;height: 200px">
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
    <div id="welcome" style="height: 50px;">
        <h2 style="font-size: 30px;text-align: left"><u>Food List</u></h2>
      
    </div>
    <!-- end welcome -->
  </div>
  <!-- end header -->
  <div style="height: 500px" align="center">
      
      <table border="1" cellspacing="none" style="text-align: center">
          <tr>
            <th style="font-size:20px">Sr no.</th>
            <th style="font-size:20px">Category Name</th>
            <th style="font-size:20px">Food Code</th>
            <th style="font-size:20px">Food Name</th>
            <th style="font-size:20px">Price</th>
            <th style="font-size:20px">Image</th>
            <th style="font-size:20px">ShorDesc</th>
            <th style="font-size:20px">Option</th>
          </tr>
      <?php
      require_once './connection.php';
      $query="select fd.srno,ctg.ctgnm,fd.foodcode,fd.foodname,fd.price,fd.foodimg,fd.shortdesc from fooditem as fd inner join foodcategory as ctg on fd.ctgid=ctg.ctgid";
      $res= mysqli_query($con, $query);
      $n= mysqli_num_rows($res);
      if ($n>0)
      {
          while ($d= mysqli_fetch_array($res))
          {?>
          <tr>
                <td style="font-size: 15px;font-weight: bold"><?php echo $d[0] ; ?></td>
                <td style="font-size: 15px;font-weight: bold"><?php echo $d[1] ; ?></td>
                <td style="font-size: 15px;font-weight: bold"><?php echo $d[2] ; ?></td>
                <td style="font-size: 15px;font-weight: bold"><?php echo $d[3] ; ?></td>
                <td style="font-size: 15px;font-weight: bold"><?php echo $d[4] ; ?></td>
                <td style="font-size: 15px;font-weight: bold"><img src="<?php echo $d[5] ; ?>" height="30px" width="50px"></td>
                <td style="font-size: 15px;font-weight: bold"><?php echo $d[6] ; ?></td>
                <td><a href="#" style="font-size: 20px;color: blue">Edit</a></td>
          </tr>
      <?php
          }
      }
      ?>
      </table>
  </div>
  <!-- end body -->
  
  <!-- end hotstuff -->
</div>
<!-- end wrapper -->
<div id="footer"> Powered by <a href="http://www.freewebsitetemplates.com">Free Website Templates</a> </div>
<!-- end footer -->
</body>
</html>
