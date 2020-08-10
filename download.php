 <?php
	include 'config.php';

  $res = $_GET[res];
	$ip = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
	$medlink = '2016_manual.pdf';
	$highlink = '2016_manual_HQ.pdf';
	if ($res==1) {
	$dbc = mysqli_connect($host, $user, $password, $db) or die('Error connecting to MySQL server.');
	$query = "INSERT INTO downloads2016 (low_res, high_res, ip) VALUES (NOW(),NULL,'$ip')";
	$result = mysqli_query($dbc, $query) or die('Error querying database.');
	mysqli_close($dbc);
	header("Location: $medlink");	
	}
	else if ($res==2) {
	$dbc = mysqli_connect($host, $user, $password, $db) or die('Error connecting to MySQL server.');
	$query = "INSERT INTO downloads2016  (low_res, high_res, ip) VALUES (NULL,NOW(),'$ip')";
	$result = mysqli_query($dbc, $query) or die('Error querying database.');
	mysqli_close($dbc);
	header("Location: $medlink");	
	}
	else {
	echo 'Not Specific download';	
	}
?>