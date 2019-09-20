<?php
    session_start();
    $email=$_SESSION["email"];
    $otp=$_SESSION["otp"];
    $mno=$_SESSION["mno"];
    
    $fnm=$_REQUEST["fnm"];
    $mno=$_REQUEST["mno"];
    $email=$_REQUEST["email"];
    $pwd=$_REQUEST["pwd"];
    $adrs=$_REQUEST["adres"];
    $lcn=$_REQUEST["location"];
    $city=$_REQUEST["cty"];
    $role="Customer";
    
    require './connection.php';
    $query1="insert into users(fnm,mno,emailid,pwd,address,location,city,role) values('$fnm',$mno,'$email','$pwd','$adrs','$lcn','$city','$role')";
    
    
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
      <form method="post">
          <table style="height:200px;width: 500px; padding-top: 30px" >
                        <tr height="40" >
                            <td style="font-size: 20px">Enter Your Otp</td>
                            <td><input type="text" name="otp1" style="height:25px;width: 300px;font-size: 15px" required></td>
                        </tr>
                        
                        <tr height="60">    
                            <td colspan="2" align="center"><input type="submit" name="continue" value="Continue" style="height: 30px; width: 120px;font-size: 25px"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center" style="font-size: 20px;color: white"><a style="color: blue" name="resend">Resend Otp</a></td>
                        </tr>
                    </table>
                </form>
                    
                    <?php
                        if (isset($_REQUEST["continue"]))
                        {
                            
                            
                                
                                 
                            die();
                            $otp1=$_REQUEST["otp1"];
                            if($otp==$otp1)
                            {
                                
                                $m=  mysqli_affected_rows($con);
                                if($m>0)
                                {
                                    header("location:index.php");
                                }
                            }
                            else
                            {
                                echo "Wrong Otp Entered";
                              
                            }
                        
                        if(isset($_REQUEST["resend"]))
                        {
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
                           
                        }
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
