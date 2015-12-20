<?php

$dbhost = getenv('IP');
$dbuser = getenv('C9_USER');
$dbpass = '';

$con = mysql_connect($dbhost, $dbuser, $dbpass);
	if (!$con) 
    {
		echo "Connection failed";
		return false;
	}

	
   
    $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password';";
    $results= mysqli_query($con,$sql);

    if (sizeof(mysqli_fetch_array($results))==0)
    {
    	echo "fail";
    }
    else
    {
    	setcookie('username',$username,time()+2000);
    	echo "pass";
    }

?>
