<?php
@ini_set('display_errors', 'on');
include("includes/PdoClass.php");
$room = $_POST['room'];
$pwd = $_POST['pwd'];
$ok = '0';

//mysql_select_db('encrypter',$con);

$sql = "SELECT name, password from ninja_room WHERE name =  '".$room."' and `password` = '".$pwd."' ";
$stmt = $db->prepare($sql);
		   $stmt->execute();
		   
while($row = $stmt->fetch()) {
			$res_room = $row['name'];
			$res_pwd = $row['password'];

			$ok = '1';
			

}

echo $ok;
//mysql_query("INSERT INTO logs (`username` , `msg`) VALUES ('$uname','$msg')");

//$result1 = mysql_query("SELECT * FROM logs ORDER by id DESC");
/*
while($extract = mysql_fetch_array($result1)){
		echo "<span class='uname'>" . $extract['username'] . "</span>: <span class='msg'>" . $extract['msg'] . "</span><br>";
	}
*/



?>