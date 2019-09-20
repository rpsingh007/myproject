
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Restaurant</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
  <div id="header">
    <h1><a href="#"><img src="images/logo.gif" alt="" /></a></h1>
    <ul id="nav">
      <li><a href="#">HOME</a> &nbsp;|&nbsp; </li>
      <li><a href="#">RESTAURANT</a> &nbsp;|&nbsp; </li>
      <li><a href="#">MENUS</a> &nbsp;|&nbsp; </li>
      <li><a href="#">RESERVATIONS</a> &nbsp;|&nbsp; </li>
      <li><a href="#">EVENTS</a> &nbsp;|&nbsp; </li>
      <li><a href="#">CONTACT US</a></li>
    </ul>
    <!-- end nav -->
    <div id="welcome">
      <h2><img src="images/title_welcome.gif" alt="Welcome to our Restaurant" /></h2>
      <form method="post">
          <table align="center" cellspacing="10px">
              <tr>
                  <td style="font-size: 20px">Email-Id</td>
                  <td><input type="email" name="email" required style="font-size: 20px"></td>
              </tr>
              <tr>
                  <td style="font-size: 20px">Password</td>
                  <td><input type="password" name="pwd" required style="font-size: 20px"></td>
              </tr>
              <tr>
                  <td colspan="2" align="center" style="font-size: 20px"><input type="submit" name="login" value="Login" style="font-size: 20px;">
                          &nbsp;&nbsp;&nbsp;<a href="registration.php" style="color: white">Sign Up</a>
                  </td>
              </tr>
          </table>
      </form>
      <?php
        if (isset($_REQUEST["login"]))
            {
            extract($_REQUEST);
            require_once './connection.php';
            $query="select role from users where emailid='$email' and pwd='$pwd'";
            $res= mysqli_query($con, $query);
            $n= mysqli_num_rows($res);
            $a= mysqli_fetch_array($res);
            $role=$a[0];
            session_start();
            $_SESSION["email"]=$email;
            $_SESSION["pwd"]=$pwd;
            $_SESSION["role"]=$role;
            $page=$role."Home.php";
            if($n>0)
            {
                header("location:$page");
            }
            else 
            {
            header("location:registration.php");
            }
        }
      ?>
</div>      
    <!-- end welcome -->
  </div>
  <!-- end header -->
  <div id="body">
    <?php
        include './midcontent.php';
    ?>
  </div>
  <!-- end body -->
  <div id="hotstuff">
    <?php
        include './lastcontent.php';
    ?>
  </div>
  <!-- end hotstuff -->
</div>
<!-- end wrapper -->
<div id="footer"> Powered by <a href="http://www.freewebsitetemplates.com">Free Website Templates</a> </div>
<!-- end footer -->
</body>
</html>
