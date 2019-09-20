<?php

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
        mysqli_query($con, $query1);
        echo $query1;
        die();
?>