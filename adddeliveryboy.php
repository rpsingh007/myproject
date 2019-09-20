<?php
session_start();
$role=$_SESSION["role"];
$email=$_SESSION["email"];
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
  <div style="height: 600px" align="center">
      <h1 style="font-size: 40px">Registration</h1>
      <form method="post" enctype="multipart/form-data">
          <table style="height:200px;width: 500px; padding-top: 30px" >
                        <tr height="40" >
                            <td style="font-size: 20px">Name</td>
                            <td><input type="text" name="fnm" style="height:25px;width: 300px;font-size: 15px" required></td>
                        </tr>
                        <tr height="40">
                            <td style="font-size: 20px">Contact No</td>
                            <td><input type="text" name="mno" style="height:25px;width: 300px;font-size: 15px" required></td>
                        </tr>
                        <tr height="40">
                            <td style="font-size: 20px">Email-Id</td>
                            <td><input type="email" name="email" style="height:25px;width: 300px;font-size: 15px" required></td>
                        </tr>
                        <tr height="40">
                            <td style="font-size: 20px">Password</td>
                            <td><input type="password" name="pwd" style="height:25px;width: 300px;font-size: 15px" required></td>
                        </tr>
                        <tr height="40">
                            <td style="font-size: 20px">Address</td>
                            <td><input type="text" name="adres" style="height:25px;width: 300px;font-size: 15px" required></td>
                        </tr>
                        <tr height="40">
                            <td style="font-size: 20px">Location</td>
                            <td><input type="text" name="lcn" style="height:25px;width: 300px;font-size: 15px" required></td>
                        </tr>
                        <tr height="40">
                            <td style="font-size: 20px">City</td>
                            <td><input type="text" name="city" style="height:25px;width: 300px;font-size: 15px" required></td>
                        </tr>
                        <tr height="40">
                            <td style="font-size: 20px">Vahicle No</td>
                            <td><input type="text" name="vhno" style="height:25px;width: 300px;font-size: 15px" required></td>
                        </tr>
                        <tr height="40">
                            <td style="font-size: 20px">Doc Image</td>
                            <td><input type="file" name="docimg" style="height:25px;width: 300px;font-size: 15px" required></td>
                            <?php
                                if(isset($_FILES["docimg"]))
                                {
                                    $docimg=$_FILES["docimg"]["name"];
                                    $source=$_FILES["docimg"]["tmp_name"];
                                    $img= explode(".", $docimg);
                                    $newimg= time().".".$img[1];
                                    $dest="docimage/".$newimg;
                                    move_uploaded_file($source, $dest);
                                }
                            ?>
                        </tr>
                        
                        <tr height="60">    
                            <td colspan="2" align="center"><input type="submit" name="signup" value="Add Delivery Boy" style="height: 40px; width: 210px;font-size: 25px"></td>
                        </tr>
                        
                    </table>
                </form>
                    
                    <?php
                        if (isset($_REQUEST["signup"]))
                        {
                            extract($_REQUEST);
                            $role1="DeliveryBoy";
                            include './connection.php';
                            $query="select * from users where emailid='$email'";
                            $res=  mysqli_query($con, $query);
                            $n=  mysqli_num_rows($res);
                            if($n>0)
                            {
                                echo "<script>alert('email already registered');</script>";
                            }
                            $query1="insert into users values('$fnm',$mno,'$email','$pwd','$adres','$lcn','$city','$role1','$vhno','$dest')";
                            mysqli_query($con, $query1);
                            $m=  mysqli_affected_rows($con);
                            if($m>0)
                            {
                                echo "<script>alert('Delivery Boy Successfully Added');</script>";
                            }
                            else
                            {
                                echo "<script>alert('Ragistration Failed');</script>";
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
