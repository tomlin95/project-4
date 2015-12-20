<?php


session_start();



$dbhost = getenv('IP');
$dbuser = getenv('C9_USER');
$dbpass = '';

$rec = $_POST["recipient"];
$subj= $_POST["subject"];
$body = $_POST["body"];

$con = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$con) 
{
	echo "Connection failed";
	return false;
}

if(isset($_SESSION['username']))
{
    $idquery =  "SELECT id FROM User WHERE name = '$_SESSION[username]'; ";
    $recidquery =  "SELECT id FROM User WHERE name = '$recipient'; ";
    $userres = mysqli_query($con,$idquery);
    $res = mysqli_query($con,$recidquery);
    if(mysql_fetch_array($res)==0)
    {
        echo "Invalid Recipient Username";
        
    }
    else
    {
    
        while($row=mysql_fetch_array($userres))
        {
            while($row2=mysql_fetch_array($res))
            {
                $sql = "INSERT INTO message (body,subject,user_id,recipient_id) VALUES ($body,$subject,'$row[id]','$row2[id]');";
            
                if (!mysqli_query($con,$sql))
  				    {
  					    die('Error!: ' . mysqli_error($con));
  				    }
              else
              {
				        echo "Record Added";
  				    }
            }
        }
    }
}
else
{
    echo "Session not set";
}
  








?>