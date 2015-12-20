<?php



$dbhost = getenv('IP');
$dbuser = getenv('C9_USER');
$dbpass = '';

$mID = $_REQUEST['id'];
$mSender = $_REQUEST['sender'];
$flag = $_REQUEST['flag'];

$con = mysql_connect($dbhost, $dbuser, $dbpass);
    if (!$con) {
    	echo "Connection failed";
    	return false;
    }
 

    if(isset($_COOKIE['username']))
    {
		$curr_user = $_COOKIE['username'];
		$mQuery =  "SELECT * FROM message WHERE id = '$mID'";
		$mInfo = mysqli_query($con,$mQuery);
		while($row=mysqli_fetch_array($mInfo))
		{
			$body= $row['body'];
			$subject= $row['subject'];
		    
		    echo "<div class='readme'>";
		    echo "<div id='subject2'>".$subject."</div>"; 
		    echo "<hr id='hr2'>";
		    echo "<div id='from'><strong>From: </strong>".$mSender."</div>";
		    echo "<p id='body'>".$body."</p>";
		    echo "</div>";
		}
		if($flag == 0)
		{
		    $useridstring=  "SELECT id FROM user WHERE username = '$curr_user'";
		    $useridquery = mysqli_query($con,$useridstring);
		    while($row2=mysqli_fetch_array($useridquery))
		    {
		        $date = date("Y/m/d");
		        $userid=$row2['id'];
		        $sql= "INSERT INTO message_read (message_id,reader_id,date) VALUES ('$mID','$userid','$date');";
		        if (!mysqli_query($con,$sql))
		        {
  					    echo "ERROR!!!";
  				}

		    }
		    
		}
	}
	else
	{   
	    echo "Not logged in";
	}


?>
