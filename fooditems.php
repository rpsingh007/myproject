<?php
ob_start();
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
    <div id="header" style="background: none;border: none; height: 200px">
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
    <div id="welcome" style="height: 40px">
      <h2><img src="images/title_welcome.gif" alt="Welcome to our Restaurant" /></h2>
      
    </div>
    <!-- end welcome -->
  </div>
  <!-- end header -->
  <div style="height: 500px" align="center">
      
      <form method="post" enctype="multipart/form-data">
          <table cellspacing="10px"  style="color:white">
              <tr>
              <td>Category Name</td>
              <td>
                  <select name="ctgid">
                      <option value="0">Select Category</option>
                      <?php
                      require_once './connection.php';
                      $query="select * from foodcategory";
                      $res= mysqli_query($con, $query);
                      $n= mysqli_num_rows($res);
                      if($n>0)
                      {
                          while ($d= mysqli_fetch_array($res))
                          {?>
                                <option value="<?php echo $d[0];?>"><?php echo $d[1];?></option>
                          <?php
                          }
                      }
                      ?>
                  </select>
              </td>
              </tr>
              <tr>
                  <td style="font-size: 20px">Food-Code</td>
                  <td><input type="text" name="fdcode" required></td>
              </tr>
              <tr>
                  <td style="font-size: 20px">Food-Name</td>
                  <td><input type="text" name="fdname" required></td>
              </tr>
              <tr>
                  <td style="font-size: 20px">Food-Image</td>
                  <td><input type="file" name="fdimg"  required></td>
                  
                  <?php
                  if(isset($_FILES["fdimg"]))
                  { 
                    $fdimg=$_FILES["fdimg"]["name"];
                    $source=$_FILES["fdimg"]["tmp_name"];
                    $img=explode(".", $fdimg);
                    $newimg= time().".".$img[1];
                    $dest="fdimage/".$newimg;      
                    move_uploaded_file($source, $dest);
                  }
                  ?>
                      
                 
              </tr>
              <tr>
                  <td style="font-size: 20px">Price</td>
                  <td><input type="text" name="fdprice" required></td>
              </tr>
              <tr>
                  <td style="font-size: 20px">Short-Desc</td>
                  <td><input type="text" name="fddesc" required></td>
              </tr>
              <tr>
                  <td colspan="2" align="center"><input type="submit" name="addfood" value="Add Food Item">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="foodlist.php" style="font-size: 20px;color: blue"> Food List</a></td>
              </tr>
          </table>
      </form>
      
      <?php
        if(isset($_REQUEST["addfood"]))
        {
            extract($_REQUEST);
            
            $query1="select * from fooditem where foodcode='$fdcode'";
            $query2="insert into fooditem(ctgid,foodcode,foodname,price,foodimg,shortdesc) values ($ctgid,'$fdcode','$fdname',$fdprice,'$dest','$fddesc')";
            $res= mysqli_query($con, $query1);
            $m= mysqli_num_rows($res);
            if($m>0)
            {
                die("<script>alert('FoodItem Already Exist');</script>");
            }
            mysqli_query($con, $query2);
            $mn= mysqli_affected_rows($con);
            if($mn>0)
            {
                echo "<script>alert('FoodItem Added');</script>";
            }
            else 
            {
                echo "<script>alert('FoodItem Not Added');</script>";
            }
        }
      
      ?>
  </div>
  <!-- end body -->
  
  <!-- end hotstuff -->
</div>
<!-- end wrapper -->
<div id="footer"> Powered by <a href="http://www.freewebsitetemplates.com">Free Website Templates</a> </div>
<!-- end footer -->
</body>
</html>
