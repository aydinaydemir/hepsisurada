<?php

include "config.php";
if(!empty($_POST['pcName'])){


	$country = $_POST['pcName'];
	$sql_statement = "SELECT * FROM ProductCompany WHERE pcName = \"$name\"";
	$result = mysqli_query($db, $sql_statement);
	while ($row = $result->fetch_assoc()) {
    echo $row['pcNation'] . "<br>";
}
}


?>