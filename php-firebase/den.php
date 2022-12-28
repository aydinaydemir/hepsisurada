<?php
include "../config.php";
$sql_commandx = "SELECT COUNT(*) FROM users WHERE uid < 0";
$result = mysqli_query($db, $sql_commandx);
$row = mysqli_fetch_array($result);
$users = $row['COUNT(*)'];
echo $users;

?>
