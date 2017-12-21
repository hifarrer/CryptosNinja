<?php
include("includes/PdoClass.php");
$room = $_REQUEST['room'];
$pwd = $_REQUEST['pwd'];

//mysql_select_db('encrypter',$con);

$sql = "INSERT INTO ninja_room (`name` , `password`) VALUES ('$room','$pwd')";
$stmt = $db->prepare($sql);
		   $stmt->execute();
		   


//mysql_query("INSERT INTO logs (`username` , `msg`) VALUES ('$uname','$msg')");

//$result1 = mysql_query("SELECT * FROM logs ORDER by id DESC");
/*
while($extract = mysql_fetch_array($result1)){
		echo "<span class='uname'>" . $extract['username'] . "</span>: <span class='msg'>" . $extract['msg'] . "</span><br>";
	}
*/



?>