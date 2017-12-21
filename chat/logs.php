<?php
include("../includes/PdoClass.php");
$sql = "SELECT * FROM logs ORDER by id DESC";
$stmt = $db->prepare($sql);
		   $stmt->execute();
		while($row = $stmt->fetch()) {
			$res_id = $row['id'];
			$res_username = $row['username'];
			$res_msg = $row['msg'];
			echo "<span class='uname'>" . $res_username . "</span>: <span class='msg'>" . $res_msg . "</span><br>";
			}



?>