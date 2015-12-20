<table id="header">
	<tr>
		<th id ="header1">From</th>
		<th id ="header2">Subject</th>
		<th id ="header3">Body</th>
	</tr>

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

	if(isset($_COOKIE['username']))
	{
		$curr_user = $_COOKIE['username'];
		$idquery =  "SELECT id FROM user WHERE username = '$curr_user'";
		$res = mysqli_query($con,$idquery);

		while($row=mysqli_fetch_array($res))
		{
			$userid= $row['id'];
		}
		
		$message="SELECT * from message where recipient_ids = ".$userid.";";
		$mquery = mysqli_query($con,$message);

		while($row2=mysqli_fetch_array($mquery))
		{
		    $sendid= $row2['userid'];
		    
		    $sendstring =  "SELECT username FROM user WHERE id = '$sendid'";
		    $sendquery = mysqli_query($con,$sendstring);
		    while($row3=mysqli_fetch_array($sendquery))
		    {
		        $susername= $row3['username'];
		    }


			echo '<tr onclick="read();">';
			echo "<td>".$susername."</td>";
			echo "<td>".$row2['subject']."</td>";
			echo "<td>".$row2['body']."</td>";
			echo "</tr>";
		}
	}else
	{
	    echo "Not logged in";
	}
?>

</table>
