<?php

include "config.php";
if(!empty($_POST['ccName'])){


	$country = $_POST['ccName'];
	$sql_statement = "SELECT * FROM CargoCompany WHERE ccName = \"$name\"";
	$result = mysqli_query($db, $sql_statement);
	while ($row = $result->fetch_assoc()) {
    echo $row['ccName'] ."  " .$row['ccCost'] . "<br>";
}
}


?>