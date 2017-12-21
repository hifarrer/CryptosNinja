<?php
include("includes/PdoClass.php");
$uname = $_GET['uname'];
$msg = $_GET['msg'];


//mysql_select_db('encrypter',$con);

$sql = "INSERT INTO logs (`username` , `msg`) VALUES ('$uname','$msg')";
$stmt = $db->prepare($sql);
		   $stmt->execute();
		   
$sql = "SELECT * FROM logs ORDER by id DESC";
$stmt = $db->prepare($sql);
		   $stmt->execute();
		while($row = $stmt->fetch()) {
			$res_id = $row['id'];
			$res_username = $row['username'];
			$res_msg = $row['msg'];
			echo "<span class='uname'>" . $res_username . "</span>: <span class='msg'>" . $res_msg . "</span><br>";
			}

//mysql_query("INSERT INTO logs (`username` , `msg`) VALUES ('$uname','$msg')");

//$result1 = mysql_query("SELECT * FROM logs ORDER by id DESC");
/*
while($extract = mysql_fetch_array($result1)){
		echo "<span class='uname'>" . $extract['username'] . "</span>: <span class='msg'>" . $extract['msg'] . "</span><br>";
	}
*/



?>