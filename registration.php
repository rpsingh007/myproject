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
      
    </div>
    <!-- end welcome -->
  </div>
  <!-- end header -->
  <div style="height: 500px" align="center">
      <h1 style="font-size: 40px">Registration</h1>
      <form method="post" action="otpcheck.php">
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
                            <td><input type="text" name="location" style="height:25px;width: 300px;font-size: 15px" required></td>
                        </tr>
                        <tr height="40">
                            <td style="font-size: 20px">City</td>
                            <td><input type="text" name="cty" style="height:25px;width: 300px;font-size: 15px" required></td>
                        </tr>
                        <tr height="60">    
                            <td colspan="2" align="center"><input type="submit" name="signup" value="Sign Up" style="height: 30px; width: 100px;font-size: 25px"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center" style="font-size: 20px;color: white">If you already registered. &nbsp;&nbsp;<a href="index.php" style="color: blue">Sign In</a></td>
                        </tr>
                    </table>
                </form>
                    
                    <?php
                        if (isset($_REQUEST["signup"]))
                        {
                            $fnm=$_REQUEST["fnm"];
                            $mno=$_REQUEST["mno"];
                            $email=$_REQUEST["email"];
                            $pwd=$_REQUEST["pwd"];
                            $adrs=$_REQUEST["adres"];
                            $lcn=$_REQUEST["location"];
                            $city=$_REQUEST["cty"];
                            $role="Customer";
                            
                            
                            
                            include './connection.php';
                            $query="select * from users where emailid='$email'";
                            $res=  mysqli_query($con, $query);
                            $n=  mysqli_num_rows($res);
                            if($n>0)
                            {
                                echo "<script>alert('email alrrady registered');</script>";
                            }
                
                            $num=rand(1000,10000);
                            $ch = curl_init();
                            $user="singhkamina486@gmail.com:112233";
                            $receipientno="$mno"; 
                            $senderID="TEST SMS"; 
                            $msgtxt="Your Otp Is : $num"; 
                            curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
                            $buffer = curl_exec($ch);
                             
                            curl_close($ch);
            
                            
                            session_start();
                            $_SESSION["email"]=$email;
                            $_SESSION["otp"]=$num;
                            $_SESSION["mno"]=$mno;
                                
                            
                           
                           
                        }
                        
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
