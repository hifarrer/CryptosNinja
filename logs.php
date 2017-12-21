<?php
include("includes/PdoClass.php");
$room = $_REQUEST['room'];

//delete previous messages older than 5 min
$sql = "DELETE from ninja_chat WHERE TIMESTAMPDIFF(MINUTE,now(),date_created) < -5";
$stmt = $db->prepare($sql);
		   $stmt->execute();

$sql = "SELECT * FROM ninja_chat where room_name = '$room' ORDER by id DESC";
$stmt = $db->prepare($sql);
		   $stmt->execute();
		while($row = $stmt->fetch()) {
			$res_id = $row['id'];
			$res_username = $row['username'];
			$res_msg = $row['msg'];
			echo "<span class='uname'>" . $res_username . "</span>: <span class='msg'>" . $res_msg . "</span><br>";
			}



?>